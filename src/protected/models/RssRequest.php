<?php

class RssRequest extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'RssRequest':
	 * @var integer $id
	 * @var integer $requestTime
	 * @var string $userAgent
	 * @var string $os
	 * @var string $ip
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'RssRequest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('userAgent','length','max'=>255),
			array('os','length','max'=>255),
			array('ip','length','max'=>15),
			array('requestTime', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'requestTime' => 'Request Time',
			'userAgent' => 'User Agent',
			'os' => 'Os',
			'ip' => 'Ip',
		);
	}
}