<?=Yii::app()->clientScript->registerScriptFile(
	Yii::app()->request->baseUrl . '/static/js/admin/quote/_form.js',
	CClientScript::POS_HEAD
)?>

<?=CHtml::beginForm()?>
	<? if(CHtml::errorSummary($quote)):?>
		<?=CHtml::errorSummary($quote)?>
	<? endif; ?>

	<p class="help_hint">Star marked fields are required.</p>
	
	<p>
	<?=CHtml::activeLabelEx($quote, 'textEn')?><br />
	<?=CHtml::activeTextArea($quote, 'textEn', array(
		'class' => 'large',
	))?>
	<br /><br />
	
	<?=CHtml::activeLabelEx($quote, 'textRu')?><br />
	<?=CHtml::activeTextArea($quote, 'textRu', array(
		'class' => 'large',
	))?>
	<br /><br />

	<?=CHtml::activeLabelEx($quote, 'authorId')?><br />
	<?=CHtml::dropDownList('Quote[authorId]', $quote->author->id, array(0 => 'new...') + CHtml::listData($authors, 'id', 'name'), array(
	        'onchange' => 'onAuthorsListChange(this)',
	        'class' => 'small',
	))?>
	<?=CHtml::textField('Quote[authorCustomName]', $quote->author->name,
	        $quote->author->id ? array('readonly' => true) : array()
	)?>
	<br /><br />

	<?=CHtml::activeLabelEx($quote, 'Notes')?><br />
	<?=CHtml::activeTextField($quote, 'notes')?>
	<br /><br />
	

	<?=CHtml::activeLabelEx($quote, 'tags')?>
	<? $this->widget('application.components.SelectableTagsCloud', array(
 	  'selectedTags' => $quote->tags,
  	  'name' => 'tags',
          'cols' => 5,
	)); ?>
	<br /><br />
	
	<? if($quote->createdTime): ?>
		 <?=CHtml::activeLabelEx($quote, 'createdTime')?><br />
		 <?=CTimestamp::formatDate('d.m.Y H:i', $quote->createdTime)?>
		 <br /><br />
	<? endif; ?>
	
	<?=CHtml::activeLabelEx($quote, 'approvedTime')?><br />
	<?=CHtml::checkBox('Quote[approvedTime]', $quote->approvedTime)?>
		 <? if($quote->approvedTime): ?>
		 (<?=CTimestamp::formatDate('d.m.Y H:i', $quote->approvedTime)?>)
		 <? endif; ?>
	<br /><br />
	</p>

	<?=CHtml::submitButton($create ? 'Add' : 'Update', array(
		'class' => 'button',
	))?>
<?=CHtml::endForm()?>
