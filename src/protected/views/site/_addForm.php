<?=CHtml::beginForm()?>
	<? if(CHtml::errorSummary($form)):?>
		<?=CHtml::errorSummary($form)?>
	<? endif; ?>

	<?=CHtml::activeLabelEx($form, 'textEn')?><br />
	<?=CHtml::activeTextArea($form, 'textEn', array(
		'class' => 'large',
	))?>
	<br /><br />
	
	<?=CHtml::activeLabelEx($form, 'textRu')?><br />
	<?=CHtml::activeTextArea($form, 'textRu', array(
		'class' => 'large',
	))?>
	<br /><br />
	
	<?=CHtml::activeLabelEx($form, 'author')?><br />
	<?=CHtml::activeTextField($form, 'author')?>
	<br /><br />
	
	<? $this->widget('CCaptcha', array(
		'showRefreshButton' => false,
	)); ?><br />
	<?=CHtml::textField('AddQuoteForm[verifyCode]', '')?>
	<br /><br />
	
	<?=CHtml::submitButton('Add', array(
		'class' => 'button',
	))?>
<?=CHtml::endForm()?>
