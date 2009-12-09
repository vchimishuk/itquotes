<?php
class TagsCloud extends CWidget
{
	public function run()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'name';
		$tags = Tag::model()->with('approvedQuotesCount')->findAll($criteria);

		// Delete tags with empty quotesCount (With PHP > 5.3 e can use closure here).
		// TODO: Rewrite this code for PHP 5.3 when it will be avaliable.
		/*
		 * PHP > 5.3 version.
		 * 
		 * $tags = array_filter($tags, function ($t) { 
		 * 	return (boolean)$t->quotesCount; 
		 * }); 
		 */
		function tagsFilter($tag)
		{
			return (boolean)$tag->quotesCount;
		}
		$tags = array_filter($tags, 'tagsFilter');
		
		// Sort tags by their weights (quotesCount).
		/*function tagsSort($a, $b)
		{
			if($a->quotesCount == $b->quotesCount)
				return 0;

			return ($a->quotesCount > $b->quotesCount) ? -1 : 1;
		}
		usort($tags, 'tagsSort');*/


		/*
		 * Calculate tags weights.
		 *
		 * Algorythm from http://en.wikipedia.org/wiki/Tag_cloud
		 */
		function tagsLimits($acc, $tag)
		{
			if($tag->approvedQuotesCount > $acc['max'])
				$acc['max'] = $tag->approvedQuotesCount;

			if(!$acc['min'] || $acc['min'] > $tag->approvedQuotesCount)
				$acc['min'] = $tag->approvedQuotesCount;

			return $acc;
		}
		
		$tagWeights = array();
		$limits = array_reduce($tags, 'tagsLimits', array('min' => 0, 'max' => 0));
		$fontSizeMin = 100; // %
		$fontSizeMax = 200;

		foreach($tags as $tag) {
			if($tag->approvedQuotesCount > $limits['min'])
				$tagWeights[$tag->id] = ($fontSizeMax * ($tag->approvedQuotesCount - $limits['min'])) / $limits['max'] - $limits['min'];
			else
				$tagWeights[$tag->id] = 1;
		}

			
		$this->render('tagsCloud', array(
				      'tags' => $tags,
				      'tagWeights' => $tagWeights,
			      ));
	}
}