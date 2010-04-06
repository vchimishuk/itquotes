<?php
class SelectableTagsCloud extends CWidget
{
	private $_name = 'tags';
	private $_selectedTags = array();
	private $_cols = 4;

	public function getName()
	{
		return $this->_name;
	}

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function getSelectedTags()
	{
		return $this->_selectedTags;
	}

	public function setSelectedTags($tags)
	{
		$this->_selectedTags = $tags;
	}

	public function getCols()
	{
		return $this->_cols;
	}

	public function setCols($cols)
	{
		$this->_cols = $cols;
	}

	public function run()
	{
		$selectedTagsIds = array();

		foreach ($this->_selectedTags as $tag) {
			$selectedTagsIds[] = $tag->id;
		}

		$criteria = new CDbCriteria();
		$criteria->order = 'name';
		$tags = Tag::model()->findAll($criteria);

		$this->render('selectableTagsCloud', array(
				      'tags' => $tags,
				      'selectedTagsIds' => $selectedTagsIds,
				      'name' => $this->_name,
				      'cols' => $this->_cols,
		));
	}
}