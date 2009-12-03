<?=CHtml::beginForm()?>
	<? if(CHtml::errorSummary($form)):?>
		<?=CHtml::errorSummary($form)?>
	<? endif; ?>
	
	<p class="help_hint">Star marked fields are required.</p>
	
	<p>
	<?=CHtml::activeLabelEx($form, 'currentPassword')?><br />
	<?=CHtml::passwordField('ChangePasswordForm[currentPassword]', '', array(
		'class' => 'small',
	))?>
	<br /><br />
	
	<?=CHtml::activeLabelEx($form, 'newPassword')?><br />
	<?=CHtml::passwordField('ChangePasswordForm[newPassword]', '', array(
		'class' => 'small',
	))?>
	<br /><br />

	<?=CHtml::activeLabelEx($form, 'newPasswordConfirm')?><br />
	<?=CHtml::passwordField('ChangePasswordForm[newPasswordConfirm]', '', array(
		'class' => 'small',
	))?>
	</p>

	<?=CHtml::submitButton('Set password', array(
		'class' => 'button',
	))?>
<?=CHtml::endForm()?>
