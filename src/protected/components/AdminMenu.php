<?php
class AdminMenu extends CWidget
{
	public function run()
	{
		$this->render('adminMenu', array(
			'controller' => $this->controller->id,
			'action' => $this->controller->action->id,
		));
	}
}