<?php
class AdminToolbox extends CWidget
{
	public $items = array();
	
	public function run()
	{
		$items = array();
		$controller = $this->controller;
		$action = $controller->action;
		
		foreach($this->items as $item)
			if(empty($item['hide']))
				$items[] = $item;
		
		$this->render("AdminToolbox/{$controller->id}", array(
			'statistics' => $this->getStatistics(),
		));
	}

	protected function isActive($pattern, $controllerID, $actionID)
	{
		return true;
	}
	
	private function getStatistics()
	{
		$staistics = array();
		
		if($this->controller->id == 'quote') {
			// Quotes total count.
			$staistics['totalCount'] = Quote::model()->count();
		} elseif($this->controller->id == 'tag') {
			// Tags total count.
			$staistics['totalCount'] = Tag::model()->count();
			
			// Get most popular tags.
			$sql = 'SELECT COUNT(*) AS quotesCount, tagId, nameEn, nameRu '
			     . 'FROM QuoteTag, Tag '
			     . 'WHERE Tag.id = QuoteTag.tagId '
			     . 'GROUP BY tagId '
			     . 'ORDER BY quotesCount DESC '
			     . 'LIMIT 10 ';
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$dataReader = $command->query();			
			
			$staistics['popular'] = array();
			foreach($dataReader as $row) {
				$staistics['popular'][] = array(
					'id' => $row['tagId'],
					'nameEn' => $row['nameEn'],
					'nameRu' => $row['nameRu'],
					'quotesCount' => $row['quotesCount'],
				);
			}
		}
		
		return $staistics;
	}
}