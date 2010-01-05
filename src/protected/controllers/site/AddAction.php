<?php
class AddAction extends CAction
{
	public function run()
	{
		$form = new AddQuoteForm();

		if(!empty($_POST['AddQuoteForm']) && is_array($_POST['AddQuoteForm'])) {
			$form->attributes = $_POST['AddQuoteForm'];
			if($form->validate()) {
				$quote = new Quote();
				$quote->textEn = $form->textEn;
				$quote->textRu = $form->textRu;
				$quote->authorId = 0;
				$quote->notes = $form->author . ' : ' . $form->notes;
				
				if($quote->save()) {
					/*
					 * Send emaiil with notification to admin.
					 */
					$email = Yii::app()->email;
					$email->type = 'text/plain';
					$email->to = Yii::app()->params['adminEmail'];
					$email->subject = 'New quote request.';
					$email->message = $this->controller->renderPartial('_emailAdd', array(
												   'quote' => $quote,
											   ), true);
					$email->send();

					$this->controller->redirect(array('addThanks'));
				}
			}
		}
		
		$this->controller->render('add', array(
			'form' => $form,
		));
	}		
}