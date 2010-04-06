<?php
class LoginAction extends CAction
{
	public function run()
	{
		$loginForm = new LoginForm();
		
		if(!empty($_POST['LoginForm']) && is_array($_POST['LoginForm'])) {
			$loginForm->attributes = $_POST['LoginForm'];

			if($loginForm->validate()) {
				$this->controller->redirect(array('quote/list'));
				//Yii::app()->request->redirect(Yii::app()->user->returnUrl);
			} else {
				$loginForm->username = '';
				$loginForm->password = '';
			}
		}
		
		$this->controller->render('login', array('loginForm' => $loginForm));
	}
}