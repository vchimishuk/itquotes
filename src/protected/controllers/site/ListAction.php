<?php
class ListAction extends CAction
{
	public function run()
	{
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');

		$criteria = new CDbCriteria();
		$criteria->order = 'approvedTime DESC';
		$criteria->condition = 'approvedTime';

		$pages = new CPagination(Quote::model()->count($criteria));
		$config->applyTo($pages);
		$pages->applyLimit($criteria);

		$quotes = Quote::model()->with('tags')->findAll($criteria);

		$this->controller->render('list', array(
			'quotes' => $quotes,
			'pages' => $pages,
		));
	}
}