<?php
class EditAction extends CAction
{
	public function run()
	{
		if($this->id == 'edit') {
			$id = !empty($_GET['id']) ? $_GET['id'] : 0;
			$quote = Quote::model()->with('tags', 'author')->findByPk($id);
			
			if($quote === null)
				throw new CHttpException(404, 'Quote not found');
		} else { // add action
			$quote = new Quote();
		}

		if(!$quote->author)
			$quote->author = new Author();

		if(!empty($_POST['Quote']) && is_array($_POST['Quote'])) {
			$quote->attributes = $_POST['Quote'];

			/*
			 * Process approved time.
			 */
			$approved = !empty($_POST['Quote']['approvedTime']);
			if(!$quote->approvedTime && $approved)
				$quote->approvedTime = time();
			elseif(!$approved)
				$quote->approvedTime = 0;

			/*
			 * Process author.
			 */
			if($_POST['Quote']['authorId']) {
				// Existing author.
				$author = Author::model()->findByPk($_POST['Quote']['authorId']);
				if($author === null)
					throw new CException("Author with \"{$_POST['Quote']['authorId']}\" not found.");
			} else {
				// New author.
				$authorName = $_POST['Quote']['authorCustomName'];

				// At first try to find author with the same name.
				$criteria = new CDbCriteria();
				$criteria->condition = 'name = :name';
				$criteria->params = array(
					':name' => $authorName,
				);
				$author = Author::model()->find($criteria);
				if($author === null) {
					$author = new Author();
					$author->name = $authorName;
					$author->save();
				}
			}
			$quote->authorId = $author->id;

			/*
			 * Process tags.
			 */
			if(!empty($_POST['tags']) && is_array($_POST['tags']))
				$tags = $_POST['tags'];
			else
				$tags = array();

			$tagsObj = array();
			foreach($tags as $tag)
				$tagsObj[] = Tag::model()->findByPk($tag);
				
			$quote->tags = $tagsObj;
			
			
			if($quote->save()) {
				Yii::app()->user->setFlash('generalMessage', 'Quote was saved successfully.');
				$this->controller->redirect(array('list'));
			}
		}

		$criteria = new CDbCriteria();
		$criteria->order = 'name';
		$authors = Author::model()->findAll($criteria);
		
		$this->controller->render('edit', array(
						  'quote' => $quote,
						  'authors' => $authors,
					  ));	
	}
}