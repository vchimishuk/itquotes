<h1>Edit quote</h1>

<?=$this->renderPartial('_form', array(
	'quote' => $quote,
	'authors' => $authors,
	'create' => false,
))?>