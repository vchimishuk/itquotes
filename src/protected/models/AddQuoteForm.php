<?php
class AddQuoteForm extends CFormModel
{
	public $textEn;
	public $textRu;
	public $author;
	public $verifyCode;

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
			array('textEn', 'validateText'),
			array('verifyCode', 'captcha', 'allowEmpty' => false),
		);
	}
	
	public function safeAttributes()
	{
		return array('textRu', 'textEn', 'author', 'verifyCode');
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'textRu' => 'Text (RU)',
			'textEn' => 'Text (EN)',
			'verifyCode' => '',
		);
	}

	public function validateText($attribute, $params)
	{
		if(empty($this->textEn) && empty($this->textRu))
			$this->addError('textEn', 'You must fill at least one text field');
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
//	public function authenticate($attribute, $params)
//	{
//		// We only want to authenticate when no input errors.
//		if(!$this->hasErrors()) { 
//			$identity = new UserIdentity($this->username, $this->password);
//			
//			$identity->authenticate();
//			
//			switch($identity->errorCode) {
//				case UserIdentity::ERROR_NONE:
//					$duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
//					Yii::app()->user->login($identity, $duration);
//					break;
//					
//				case UserIdentity::ERROR_USERNAME_INVALID:
//				case UserIdentity::ERROR_PASSWORD_INVALID:
//					$this->addError('password', 'Password is incorrect.');
//					break;
//			}
//		}
//	}
}
