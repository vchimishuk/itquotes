<?php

class Tag extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Tag':
	 * @var integer $id
	 * @var string $nameRu
	 * @var string $nameEn
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
			array('nameRu', 'length', 'max' => 255),
			array('nameRu', 'required'),
			array('nameEn', 'length', 'max' => 255),
			array('nameEn', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'quotesCount' => array(self::STAT, 'Quote', 'QuoteTag(tagId, quoteId)'),
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
			'nameRu' => 'Name Ru',
			'nameEn' => 'Name En',
		);
	}

	/**
	 * This list of attributes can be changed by $model->attributes = array(...) expression.
	 * @return array attributes list
	 */	
	public function safeAttributes()
	{
		return array('nameRu', 'nameEn');
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
	
	/**
	 * Returns list of all tags.
	 * I use this function with CHtml::checkBoxList.
	 * @return array tags list
	 */
	public static function getAllChtml()
	{
		$tags = array();

		$criteria = new CDbCriteria();
		$criteria->order = 'nameEn ASC';
		
		foreach(Tag::model()->findAll($criteria) as $tag)
			$tags[$tag->id] = $tag->nameEn;
		
		return $tags;
	}
}