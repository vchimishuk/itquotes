<?=CHtml::beginForm()?>
	<? if(CHtml::errorSummary($author)):?>
		<?=CHtml::errorSummary($author)?>
	<? endif; ?>

	<p class="help_hint">Star marked fields are required.</p>
	
	<p>
	<?=CHtml::activeLabelEx($author, 'name')?><br />
	<?=CHtml::activeTextField($author, 'name', array(
		'maxlength' => 255,
		'class' => 'small',
	))?>
	</p>
	
	<?=CHtml::submitButton($create ? 'Add' : 'Update', array(
		'class' => 'button',
	))?>
<?=CHtml::endForm()?>
