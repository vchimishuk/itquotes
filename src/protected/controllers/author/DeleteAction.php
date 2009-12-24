<?php
class DeleteAction extends CAction
{
	public function run()
	{
		$id = !empty($_GET['id']) ? $_GET['id'] : 0;
		$author = Author::model()->findByPk($id);
		
		if($author === null)
			throw new CHttpException(404, 'Author not found');
			
		$author->delete();
		Yii::app()->user->setFlash('generalMessage', 'Author was deleted successfully.');
		$this->controller->redirect(array('list'));
	}
}