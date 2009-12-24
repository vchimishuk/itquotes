<h1>Add new quote</h1>

<?=$this->renderPartial('_form', array(
	'quote' => $quote,
	'authors' => $authors,
	'create' => true,
))?>