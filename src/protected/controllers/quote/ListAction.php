<?php
class ListAction extends CAction
{
	public function run()
	{
		$session = Yii::app()->session;
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		$cookies = Yii::app()->request->cookies;

		// If referrer is not our controller delete search parameters from session.
		if(strpos(Yii::app()->request->urlReferrer, '/quote/list') === false)
			unset($session['search']);

		if(!empty($_POST['search']) && is_array($_POST['search'])) {
			$search = $_POST['search'];
			$session['search'] = $search;
		} else {
			if(!empty($session['search']))
				$search = $session['search'];
			else
				$search = array(
					'text' => '',
					'author' => '',
					'approved' => 'all',
				);
		}


		$criteria = new CDbCriteria();
		$criteria->condition = '(textRu LIKE :text OR textEn LIKE :text) AND author LIKE :author '
				     . ($search['approved'] == 'approved' ? 'AND approvedTime ' : '')
				     . ($search['approved'] == 'unApproved' ? 'AND (approvedTime IS NULL OR approvedTime = 0)' : '');
		$criteria->params = array(
			':text' => "%{$search['text']}%",
			':author' => "%{$search['author']}%",
		);
		$criteria->order = 'nameEn';


		$criteria->order = 'id DESC';

		$pages = new CPagination(Quote::model()->count($criteria));
		$config->applyTo($pages);
		$pages->applyLimit($criteria);

		$quotes = Quote::model()->with('tags')->findAll($criteria);
		
		$showSearchForm = !empty($cookies['showSearchForm']) && $cookies['showSearchForm']->value ? true : false;
				
		$this->controller->render('list', array(
			'quotes' => $quotes,
			'pages' => $pages,
			'search' => $search,
			'showSearchForm' => $showSearchForm,
		));
	}
}