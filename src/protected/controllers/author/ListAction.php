<?php
class ListAction extends CAction
{
	public function run()
	{
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		$session = Yii::app()->session;
		$cookies = Yii::app()->request->cookies;
		
		$criteria = new CDbCriteria();
		$criteria->order = 'name';
		
		$pages = new CPagination(Author::model()->count($criteria));
		$config->applyTo($pages);
		$pages->applyLimit($criteria);

		$authors = Author::model()->with('quotesCount')->findAll($criteria);
		
		$this->controller->render('list', array(
						  'authors' => $authors,
						  'pages' => $pages,
					  ));
	}
}
