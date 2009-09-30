<?php
class ChangePasswordAction extends CAction
{
	public function run()
	{
		$this->controller->layout = 'admin';
		
		$form = new ChangePasswordForm();

		if(!empty($_POST['ChangePasswordForm']) && is_array($_POST['ChangePasswordForm'])) {
			$form->attributes = $_POST['ChangePasswordForm'];
			
			if($form->validate()) {
				$loggedUser = Yii::app()->user;
				
				/*
				 * Save new password.
				 */
				$user = User::model()->findByAttributes(array('username' => $loggedUser->name));
				
				if($user === null)
					throw new CException('User not found.');
					
				$user->password = md5($form->newPassword);
				$user->save();
					
					
				$loggedUser->setFlash('generalMessage', 'New password was set successfully.');
				$this->controller->refresh();	
			} else {
				$form->currentPassword = '';
				$form->newPassword = '';
				$form->newPasswordConfirm = '';
			}
		}
		
		$this->controller->render('changePassword', array('form' => $form));
	}
}