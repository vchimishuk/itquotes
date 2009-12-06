<?php
class ListAction extends CAction
{
	public function run()
	{
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		$session = Yii::app()->session;
		$cookies = Yii::app()->request->cookies;
		
		// If referrer is not our action delete search parameters from session.
		if(strpos(Yii::app()->request->urlReferrer, '/tag/list') === false)
			unset($session['search']);
		
		if(!empty($_POST['search']) && is_array($_POST['search'])) {
			$search = $_POST['search'];
			$session['search'] = $search;
		} else {
			if(!empty($session['search']))
				$search = $session['search'];
			else
				$search = array(
					'name' => '',
				);
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'name LIKE :name';
		$criteria->params = array(':name' => "%{$search['name']}%");
		$criteria->order = 'name';
		
		$pages = new CPagination(Tag::model()->count($criteria));
		$config->applyTo($pages);
		$pages->applyLimit($criteria);

		$tags = Tag::model()->with('quotesCount')->findAll($criteria);
		
		$showSearchForm = !empty($cookies['showSearchForm']) && $cookies['showSearchForm']->value ? true : false;

		$this->controller->render('list', array(
			'tags' => $tags,
			'pages' => $pages,
			'search' => $search,
			
			'showSearchForm' => $showSearchForm,
		));
	}
}
