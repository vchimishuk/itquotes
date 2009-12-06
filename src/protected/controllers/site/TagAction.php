<?php
class TagAction extends CAction
{
	public function run()
	{
		$tagName = $_GET['tag'];
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'name = :name';
		$criteria->params = array(':name' => $tagName);

		/*
		 * Find total count of this tag quotes.
		 */
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

		$this->controller->render('tag', array(
						  'tag' => $tag,
						  'quotes' => $tag->quotes,
						  'pages' => $pages,
					  ));
	}
}
