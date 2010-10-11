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
		$req->ip = Yii::app()->request->userHostAddress;
		$req->requestTime = time();
		$req->userAgent = Yii::app()->request->userAgent;
		$req->os = ''; // TODO: Parse UA string and get OS details from it.
		$req->save();

		$this->controller->render('rss', array(
			'quotes' => $quotes,
			'config' => $config,
		));
	}
}
