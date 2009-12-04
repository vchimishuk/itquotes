<?php
class DeleteAction extends CAction
{
	public function run()
	{
		$id = !empty($_GET['id']) ? $_GET['id'] : 0;
		$quote = Quote::model()->findByPk($id);
		
		if($quote === null)
			throw new CHttpException(404, 'Quote not found');
			
		$quote->delete();
		Yii::app()->user->setFlash('generalMessage', 'Quote was deleted successfully.');
		$this->controller->redirect(array('list'));
	}
}