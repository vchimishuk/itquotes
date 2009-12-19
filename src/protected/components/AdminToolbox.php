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
			// Get number of unapproved quotes.
			$criteria = new CDbCriteria();
			$criteria->condition = 'NOT approvedTime';
			$staistics['unapprovedCount'] = Quote::model()->count($criteria);
		} elseif($this->controller->id == 'tag') {
			$staistics['totalCount'] = Tag::model()->count();
			
			$criteria = new CDbCriteria();
			$criteria->order = 'name';
			$criteria->limit = 10;
			$tags = Tag::model()->with('quotesCount')->findAll($criteria);
			
			// Delete tags with empty quotesCount (With PHP > 5.3 e can use closure here).
			// TODO: Rewrite this code for PHP 5.3 when it will be avaliable.
			function tagsFilter($tag)
			{
				return (boolean)$tag->quotesCount;
			}
			$tags = array_filter($tags, 'tagsFilter');
			
			// Sort tags by their weights (quotesCount).
			function tagsSort($a, $b)
			{
				if($a->quotesCount == $b->quotesCount)
					return 0;
	
				return ($a->quotesCount > $b->quotesCount) ? -1 : 1;
			}
			usort($tags, 'tagsSort');

			$staistics['popularTags'] = $tags;			
		}
		
		return $staistics;
	}
}