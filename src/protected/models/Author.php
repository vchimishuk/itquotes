<?php

class Author extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Author':
	 * @var integer $id
	 * @var string $name
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
		return 'Author';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name','length','max'=>255),
			array('name', 'required'),
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
			'quotesCount' => array(self::STAT, 'Quote', 'authorId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
		);
	}

	/**
	 * This method will be called after deleting object.
	 */
	protected function afterDelete()
	{
		$connection = Yii::app()->db;
		$cmd = $connection->createCommand("UPDATE `Quote` SET authorId = 0 WHERE `authorId` = {$this->id}");
		$cmd->execute();
	}
}