<?php
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			//array('username, password', 'required'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe' => 'Remember me next time',
		);
	}

	public function safeAttributes()
	{
		return array('username', 'password', 'rememberMe');
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute, $params)
	{
		// We only want to authenticate when no input errors.
		if(!$this->hasErrors()) {
			$identity = new UserIdentity($this->username, $this->password);

			$identity->authenticate();
			
			switch($identity->errorCode) {
				case UserIdentity::ERROR_NONE:
					if (!empty($this->rememberMe)) {
						$duration = Yii::app()->params['persistentLoginTime'] * 24 * 60 * 60;
					} else {
						$duration = 0;
					}

					Yii::app()->user->login($identity, $duration);
					break;
					
				case UserIdentity::ERROR_USERNAME_INVALID:
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError('password', 'Password is incorrect.');
					break;
			}
		}
	}
}
