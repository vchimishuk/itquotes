<?php
class ListAction extends CAction
{
	public function run()
	{
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		$session = Yii::app()->session;
		
		// If referrer is not our controller delete search parameters from session.
		if(strpos(Yii::app()->request->urlReferrer, '/tag/list') === false)
			unset($session['search']);
		
		if(!empty($_POST['search']) && is_array($_POST['search'])) {
			$search = $_POST['search'];
			$session['search'] = $search;
			$resetCurrentPage = true;
		} else {
			$search = $session['search'];
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'nameEn LIKE :name  OR nameRu LIKE :name';
		$criteria->params = array(':name' => "%{$search['name']}%");
		$criteria->order = 'nameEn';
		
		$pages = new CPagination(Tag::model()->count($criteria));
		if(isset($resetCurrentPage))
			$pages->currentPage = 0;
		$config->applyTo($pages);
		$pages->applyLimit($criteria);

		$tags = Tag::model()->with('quotesCount')->findAll($criteria);
		
		$this->controller->render('list', array(
			'tags' => $tags,
			'pages' => $pages,
			'search' => $search,
		));
	}
}
