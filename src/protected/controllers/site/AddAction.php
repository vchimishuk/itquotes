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
				$quote->author = $form->author;
				
				if($quote->save()) {
					// TODO: Redirect to thanks page.
					echo "Quote was added successfully."; 
					return;
				}
			}
		}
		
		$this->controller->render('add', array(
			'form' => $form,
		));
	}		
}