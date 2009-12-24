<?php

class Quote extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Quote':
	 * @var integer $id
	 * @var string $textRu
	 * @var string $textEn
	 * @var integer $author
	 * @var string $notes
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
		return 'Quote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('notes','length','max'=>255),
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
			'tags' => array(self::MANY_MANY, 'Tag', 'QuoteTag(quoteId, tagId)', 'order' => 'name'),
			'author' => array(self::BELONGS_TO, 'Author', 'authorId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',        
			'textRu' => 'Text Ru',
			'textEn' => 'Text En',
			'author' => 'Author',
			'authorId' => 'Author',
			'notes' => 'Notes',
			'createdTime' => 'Added',
			'approvedTime' => 'Approved',
		);
	}

	/**
	 * This list of attributes can be changed by $model->attributes = array(...) expression.
	 * @return array attributes list
	 */	
	public function safeAttributes()
	{
		return array('textRu', 'textEn', 'notes');
	}
	
	/**
	 * This method will be called after deleting object.
	 */
	protected function afterDelete()
	{
		$connection = Yii::app()->db;
		$cmd = $connection->createCommand("DELETE FROM `QuoteTag` WHERE `quoteId` = {$this->id}");
		$cmd->execute();
	}
	
	protected function beforeSave()
	{
		if($this->isNewRecord)
			$this->createdTime = time();
		
		return true;
	}
	
	protected function afterSave()
	{
		if(!empty($this->tags)) {
			$sql = 'INSERT INTO QuoteTag '
			     . '(quoteId, tagId) '
			     . 'VALUES ';
			    
			$length = count($this->tags);
			for($i = 0; $i < $length; $i++) {
				$sql .= "({$this->id}, {$this->tags[$i]->id}) ";
				if($i < $length - 1)
					$sql .= ',';
			}
		} else {
			$sql = false;
		}
		
		$connection = Yii::app()->db;
		$transaction = $connection->beginTransaction();
		try {
		    $connection->createCommand("DELETE FROM QuoteTag WHERE quoteId = {$this->id}")->execute();
		    if($sql)
			    $connection->createCommand($sql)->execute();
		    $transaction->commit();
		} catch(Exception $e) {
		    $transaction->rollBack();
		}
	}
}