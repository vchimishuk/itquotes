<?php
class TagAction extends CAction
{
	public function run()
	{
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		$connection = Yii::app()->db;
		$tag = Tag::model()->findByAttributes(array('name' => $_GET['tag']));
		
		if($tag === null)
			throw new CHttpException(404, 'Tag not found');

		/*
		 * Get total number of approved quotes for this tag.
		 */
		$countSql = "SELECT COUNT(*) AS totalCount FROM `Quote`
                             LEFT JOIN QuoteTag
                             ON Quote.id = QuoteTag.quoteId
                             WHERE approvedTime AND tagId = {$tag->id}";
		
		$command = $connection->createCommand($countSql);
		$reader = $command->query();
		$reader->next();
		$row = $reader->current();
		$totalCount = $row['totalCount'];

		$pages = new CPagination($totalCount);
		$config->applyTo($pages);
		
		/*
		 * Get IDs of current page quotes.
		 */
		$offset = $pages->pageSize * $pages->currentPage;
		$limit = $pages->pageSize;
		$quotesIdSql = "SELECT id FROM Quote
                                LEFT JOIN QuoteTag
                                ON Quote.id = QuoteTag.quoteId
                                WHERE approvedTime AND tagId = {$tag->id}
                                GROUP BY quoteId
                                ORDER BY approvedTime DESC
                                LIMIT {$offset}, {$limit}";

		$command = $connection->createCommand($quotesIdSql);
		$reader = $command->query();
		$ids = array();
		foreach($reader as $row)
			$ids[] = $row['id'];

		$criteria = new CDbCriteria();
		//$criteria->condition = 'approvedTime';
		$criteria->addInCondition('id', $ids);
		$criteria->order = 'approvedTime DESC';

		$quotes = Quote::model()->findAll($criteria);
		
		/*
		foreach($quotes as $quote)
			echo $quote->id, ",";

		return;
		*/
		/*
		$tagName = $_GET['tag'];
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'name = :name';
		$criteria->params = array(':name' => $tagName);

		/*
		 * Find total count of this tag quotes.
		 *
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT COUNT(*) AS totalCount FROM QuoteTag WHERE tagId = (
                                                           SELECT id FROM Tag WHERE `name` = '{$tagName}' LIMIT 1
                                                       )");
		$reader = $command->query();
		$row = $reader->read();
		$quotesCount = $row['totalCount'];

		$pages = new CPagination($quotesCount);
		$config->applyTo($pages);
		//$pages->applyLimit($criteria);

		$tag = Tag::model()->with(array('quotes' => array(
							'condition' => 'approvedTime',
							'order' => 'approvedTime DESC',
							'offset' => 0,
							'limit' => 1,
						)))->find($criteria);
		
		if($tag === null)
			throw new CHttpException(404, 'Tag not found');
		*/

		$this->controller->render('tag', array(
						  'tag' => $tag,
						  'quotes' => $quotes,
						  'pages' => $pages,
					  ));
	}
}
