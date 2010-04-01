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
		 * Calculate tags weights algorythm from http://en.wikipedia.org/wiki/Tag_cloud
		 */

		// Find minimum and maximum weights.
		$minWeight = $maxWeight = 0;
		foreach($tags as $tag) {
			if($tag->approvedQuotesCount > $maxWeight)
				$maxWeight = $tag->approvedQuotesCount;

			if(!$minWeight || $minWeight > $tag->approvedQuotesCount)
				$minWeight = $tag->approvedQuotesCount;
		}


		$fontSizeMin = 100; // Minimum tag font size (in percents).
		$fontSizeMax = 200; // Maximum tag font size (in percents).

		$tagWeights = array();
		foreach($tags as $tag) {
			if($tag->approvedQuotesCount > $minWeight)
				$tagWeights[$tag->id] = (int)(($fontSizeMax * ($tag->approvedQuotesCount - $minWeight)) / $maxWeight - $minWeight);
			else
				$tagWeights[$tag->id] = 1;
		}

			
		$this->render('tagsCloud', array(
				      'tags' => $tags,
				      'tagWeights' => $tagWeights,
			      ));
	}
}