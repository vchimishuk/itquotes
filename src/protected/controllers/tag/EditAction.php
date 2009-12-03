<?php
class EditAction extends CAction
{
	public function run()
	{
		if($this->id == 'edit') {
			$id = !empty($_GET['id']) ? $_GET['id'] : 0;
			$tag = Tag::model()->findByPk($id);
			
			if($tag === null)
				throw new CHttpException(404, 'Tag not found');
		} else { // add action
			$tag = new Tag();
		}
		
		if(!empty($_POST['Tag']) && is_array($_POST['Tag'])) {
			// Form was submitted.
			$tag->attributes = $_POST['Tag'];
			
			if($tag->save()) {
				Yii::app()->user->setFlash('generalMessage', 'Tag was saved successfully.');	
				$this->controller->redirect(array('list'));
			}
		}

		$this->controller->render('edit', array('tag' => $tag));		
	}
}