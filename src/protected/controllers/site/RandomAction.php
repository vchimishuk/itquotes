<?php
class RandomAction extends CAction
{
	public function run()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand('SELECT id FROM Quote ORDER BY id DESC LIMIT 1');
		$reader = $command->query();
		$row = $reader->read();
		$maxId = $row['id'];

		mt_srand();
		$id = mt_rand(0, $maxId);

		$criteria = new CDbCriteria();
		$criteria->condition = 'approvedTime AND id >= :id';
		$criteria->params = array(
			':id' => $id,
		);
		$criteria->limit = 1;

		$quote = Quote::model()->find($criteria);

		$this->controller->redirect(array('quote', 'id' => $quote->id));
	}
}
