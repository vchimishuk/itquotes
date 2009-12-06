<?php

class Tag extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Tag':
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
		return 'Tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name', 'length', 'max' => 255),
			array('name', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'quotesCount' => array(self::STAT, 'Quote', 'QuoteTag(tagId, quoteId)'),
			'approvedQuotesCount' => array(self::STAT, 'Quote', 'QuoteTag(tagId, quoteId)', 'condition' => 'approvedTime'),
			'quotes' => array(self::MANY_MANY, 'Quote', 'QuoteTag(tagId, quoteId)'),
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
	 * This list of attributes can be changed by $model->attributes = array(...) expression.
	 * @return array attributes list
	 */	
	public function safeAttributes()
	{
		return array('name');
	}
	
	/**
	 * This method will be called after deleting object.
	 */
	protected function afterDelete()
	{
		$connection = Yii::app()->db;
		$cmd = $connection->createCommand("DELETE FROM `QuoteTag` WHERE `tagId` = {$this->id}");
		$cmd->execute();
	}
}