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

		// Save statistics.
		$req = new RssRequest();
		$req->ip = '127.0.0.1';
		$req->requestTime = time();
		$req->userAgent = 'ua';
		$req->os = 'os';
		$req->save();

		$this->controller->render('rss', array(
			'quotes' => $quotes,
			'config' => $config,
		));
	}
}