<?php
class QuoteAction extends CAction
{
	public function run()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'approvedTime';
		$quote = Quote::model()->findByPk($_GET['id'], $criteria);
		if($quote === null)
			throw new CHttpException(404, 'Quote not found');
			
		$this->controller->render('quote', array('quote' => $quote));		
	}
}