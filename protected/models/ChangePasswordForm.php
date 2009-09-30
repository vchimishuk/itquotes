<?php
class ChangePasswordForm extends CFormModel
{
	public $currentPassword;
	public $newPassword;
	public $newPasswordConfirm;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('currentPassword, newPassword, newPasswordConfirm', 'required'),
			array('currentPassword', 'checkCurrentPassword'),
			array('newPassword', 'length', 'min' => 6),
			array('newPassword', 'compare', 'compareAttribute' => 'newPasswordConfirm'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'currentPassword' => 'Current password',
			'newPassword' => 'New password',
			'newPasswordConfirm' => 'Confirm new password',
		);
	}
	
	public function checkCurrentPassword($attribute, $params)
	{
		$user = User::model()->findByAttributes(array('username' => Yii::app()->user->name));
		
		if($user === null)
			throw new CException('User not found.');
		
		if($user->password !== md5($this->currentPassword))
			$this->addError('currentPassword', 'Current password is incorrect.');
	}
}
