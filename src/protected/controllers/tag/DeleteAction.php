<?php
class DeleteAction extends CAction
{
	public function run()
	{
		$id = !empty($_GET['id']) ? $_GET['id'] : 0;
		$tag = Tag::model()->findByPk($id);
		
		if($tag === null)
			throw new CHttpException(404, 'Tag not found');
			
		$tag->delete();
		Yii::app()->user->setFlash('generalMessage', 'Tag was deleted successfully.');
		$this->controller->redirect(array('list'));
	}
}