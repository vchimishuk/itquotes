<?php
class SearchAction extends CAction
{
	public function run()
	{
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');

		$form = new SearchForm();
		// If referrer is not our action delete search parameters from session.
		if(strpos(Yii::app()->request->urlReferrer, '/site/search') === false) {
			Yii::app()->session->remove('siteSearch');
		} else {
			if(!empty(Yii::app()->session['SearchForm'])) {
				$siteSearch = Yii::app()->session['SearchForm'];
				
				$form->text = $siteSearch['text'];
				$form->author = $siteSearch['author'];
			}
		}


		if(!empty($_POST['SearchForm']) && is_array($_POST['SearchForm'])) {
			$form->attributes = $_POST['SearchForm'];
			Yii::app()->session['SearchForm'] = array(
				'text' => $form->text,
				'author' => $form->author,
			);
		}


		$criteria = new CDbCriteria();
		$criteria->order = 'approvedTime DESC';
		$criteria->condition = "approvedTime AND (textRu LIKE :text OR textEn LIKE :text) AND (author LIKE :author)";
		$criteria->params = array(
			':text' => "%{$form->text}%",
			':author' => "%{$form->author}%",
		);

		$pages = new CPagination(Quote::model()->count($criteria));
		$config->applyTo($pages);
		$pages->applyLimit($criteria);

		$quotes = Quote::model()->with('tags')->findAll($criteria);
		
		$this->controller->render('search', array(
			'quotes' => $quotes,
			'pages' => $pages,
			'form' => $form,
		));
	}
}