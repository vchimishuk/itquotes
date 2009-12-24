<?php
class EditAction extends CAction
{
	public function run()
	{
		$id = !empty($_GET['id']) ? $_GET['id'] : 0;
		$author = Author::model()->findByPk($id);
			
		if($author === null)
			throw new CHttpException(404, 'Author not found');
		
		if(!empty($_POST['Author']) && is_array($_POST['Author'])) {
			// Form was submitted.
			$author->attributes = $_POST['Author'];
			
			if($author->save()) {
				Yii::app()->user->setFlash('generalMessage', 'Author was saved successfully.');	
				$this->controller->redirect(array('list'));
			}
		}
		
		$this->controller->render('edit', array('author' => $author));
	}
}