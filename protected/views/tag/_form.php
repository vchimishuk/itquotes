<?=CHtml::beginForm()?>
	<? if(CHtml::errorSummary($tag)):?>
		<?=CHtml::errorSummary($tag)?>
	<? endif; ?>

	<p class="help_hint">Star marked fields are required.</p>
	
	<p>
	<?=CHtml::activeLabelEx($tag, 'nameEn')?><br />
	<?=CHtml::activeTextField($tag, 'nameEn', array(
		'maxlength' => 255,
		'class' => 'small',
	))?>
	<br /><br />	
	
	<?=CHtml::activeLabelEx($tag, 'nameRu')?><br />
	<?=CHtml::activeTextField($tag, 'nameRu', array(
		'maxlength' => 255,
		'class' => 'small',
	))?>
	</p>
	
	<?=CHtml::submitButton($create ? 'Add' : 'Update', array(
		'class' => 'button',
	))?>
<?=CHtml::endForm()?>
