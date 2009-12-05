<?php
class TagAction extends CAction
{
	public function run()
	{
		//throw new CHttpException(404, 'How can I select all approved tag quotes?');
		
		//$tag = Tag::model()->find($criteria);
		$tag = Tag::model()->with('quotes')->findByAttributes(array(
			'name' => $_GET['tag'],
		));
		if($tag === null)
			throw new CHttpException(404, 'Tag not found');

		echo $tag->name;
			
		//$this->controller->render('tag', array('tag' => $tag));		
	}
}