<?php
class AddQuoteForm extends CFormModel
{
	public $textEn;
	public $textRu;
	public $author;
	public $notes;
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
		return array('textRu', 'textEn', 'author', 'notes', 'verifyCode');
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'textRu' => 'Текст (рус.)',
			'textEn' => 'Текст (англ.)',
			'author' => 'Автор',
			'notes' => 'Комментарий',
			'verifyCode' => '',
		);
	}

	public function validateText($attribute, $params)
	{
		if(empty($this->textEn) && empty($this->textRu))
			$this->addError('textEn', 'Хотя бы одно текстовое поле должно быть заполненно');
	}
}
