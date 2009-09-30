<h1>Change password</h1>

<?=$this->renderPartial('/admin/successSummary')?>

<?=$this->renderPartial('_changePasswordForm', array(
	'form' => $form,
))?>