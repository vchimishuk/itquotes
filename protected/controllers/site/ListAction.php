<?php
class ListAction extends CAction
{
	public function run()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'id DESC';
		$criteria->condition = 'approvedTime';
		
		$quotes = Quote::model()->with('tags')->findAll($criteria);
		
		$this->controller->render('list', array(
			'quotes' => $quotes,
		));
	}
}