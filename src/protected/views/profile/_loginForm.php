<?=CHtml::beginForm()?>
	<? if(CHtml::errorSummary($loginForm)):?>
		<?=CHtml::errorSummary($loginForm)?>
	<? endif; ?>
	
	<p>
	<?=CHtml::label('Login', 'LoginForm[username]')?><br />
	<?=CHtml::textField('LoginForm[username]', '', array(
		'class' => 'small',
	))?>
	<br /><br />
	
	<?=CHtml::label('Password', 'LoginForm[password]')?><br />
	<?=CHtml::passwordField('LoginForm[password]', '', array(
		'class' => 'small',
	))?>
	<br /><br />
	
	<?/*
	<?=CHtml::checkBox('LoginForm[rememberMe]', true)?> Remember me next time
	*/?>
	</p>
	
	<?=CHtml::submitButton('Login', array(
		'class' => 'button',
	))?>
<?=CHtml::endForm()?>
