<?php
class AuthorAction extends CAction
{
	public function run()
	{
		$config = new CConfiguration(Yii::app()->basePath . '/config/pager.php');
		$author = Author::model()->findByPk($_GET['authorId']);
		
		if($author === null)
			throw new CHttpException(404, 'Author not found');


		$criteria = new CDbCriteria();
		$criteria->condition = 'authorId = :authorId';
		$criteria->params = array(
			':authorId' => $author->id,
		);
		
		$pages = new CPagination(Quote::model()->count($criteria));
		$config->applyTo($pages);
		$pages->applyLimit($criteria);

		$quotes = Quote::model()->findAll($criteria);

		$this->controller->render('author', array(
						  'author' => $author,
						  'quotes' => $quotes,
						  'pages' => $pages,
					  ));
	}
}
