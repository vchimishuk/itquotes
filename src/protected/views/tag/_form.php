<?=CHtml::beginForm()?>
	<? if(CHtml::errorSummary($tag)):?>
		<?=CHtml::errorSummary($tag)?>
	<? endif; ?>

	<p class="help_hint">Star marked fields are required.</p>
	
	<p>
	<?=CHtml::activeLabelEx($tag, 'name')?><br />
	<?=CHtml::activeTextField($tag, 'name', array(
		'maxlength' => 255,
		'class' => 'small',
	))?>
	</p>
	
	<?=CHtml::submitButton($create ? 'Add' : 'Update', array(
		'class' => 'button',
	))?>
<?=CHtml::endForm()?>
