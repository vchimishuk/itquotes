<?php
class Menu extends CWidget
{
	public function run()
	{
		$this->render('menu', array(
				      'controller' => $this->controller->id,
				      'action' => $this->controller->action->id,
			      ));
	}
}
