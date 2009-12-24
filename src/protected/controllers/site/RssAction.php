<?php
class RssAction extends CAction
{
	public function run()
	{
		$this->controller->layout = 'rss';
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		
		$criteria = new CDbCriteria();
		$criteria->order = 'approvedTime DESC';
		$criteria->condition = 'approvedTime';
		$criteria->limit = $config['pageSize'];
		
		$quotes = Quote::model()->with('author')->findAll($criteria);

		$this->controller->render('rss', array(
			'quotes' => $quotes,
			'config' => $config,
		));
	}
}