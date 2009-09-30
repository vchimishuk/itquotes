<?php
class LoginAction extends CAction
{
	public function run()
	{
		$loginForm = new LoginForm();
		
		if(!empty($_POST['LoginForm']) && is_array($_POST['LoginForm'])) {
			$loginForm->attributes = $_POST['LoginForm'];
			
			if($loginForm->validate()) {
				$user = Yii::app()->user;
				
				//$user->setFlash('generalMessage', 'You was logged in successfully.');
				$this->controller->redirect(array('quote/list'));
			} else {
				$loginForm->username = '';
				$loginForm->password = '';
			}
		}
		
		$this->controller->render('login', array('loginForm' => $loginForm));
	}
}