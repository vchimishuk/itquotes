<?php
class AboutAction extends CAction
{
	public function run()
	{
		$this->controller->render('about', array(
		));
	}
}