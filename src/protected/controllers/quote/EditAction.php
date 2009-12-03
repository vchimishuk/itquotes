<?php
class EditAction extends CAction
{
	public function run()
	{
		if($this->id == 'edit') {
			$id = !empty($_GET['id']) ? $_GET['id'] : 0;
			$quote = Quote::model()->with('tags')->findByPk($id);
			
			if($quote === null)
				throw new CHttpException(404, 'Quote not found');
		} else { // add action
			$quote = new Quote();
		}
			
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
		
		$this->controller->render('edit', array('quote' => $quote));	
	}
}