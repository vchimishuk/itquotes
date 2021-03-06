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
			
			$tags = Tag::model()->with('quotesCount')->findAll();
			
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

			$staistics['popularTags'] = array_slice($tags, 0, 10);
		} elseif($this->controller->id == 'author') {
			$staistics['totalCount'] = Author::model()->count();
			
			$authors = Author::model()->with('quotesCount')->findAll();
			
			// Delete authors with empty quotesCount (With PHP > 5.3 e can use closure here).
			// TODO: Rewrite this code for PHP 5.3 when it will be avaliable.
			function authorsFilter($author)
			{
				return (boolean)$author->quotesCount;
			}
			$authors = array_filter($authors, 'authorsFilter');
			
			// Sort tags by their weights (quotesCount).
			function authorsSort($a, $b)
			{
				if($a->quotesCount == $b->quotesCount)
					return 0;
	
				return ($a->quotesCount > $b->quotesCount) ? -1 : 1;
			}
			usort($authors, 'authorsSort');

			$staistics['popularAuthors'] = array_slice($authors, 0, 10);
		}
		
		return $staistics;
	}
}