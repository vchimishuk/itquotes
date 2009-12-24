<? if(Yii::app()->user->hasFlash('generalMessage')): ?>
	<div class="successSummary">
		<?=Yii::app()->user->getFlash('generalMessage')?>
	</div>

	<? Yii::app()->clientScript->registerScript(
	         'myHideEffect',
		 '$(".successSummary").animate({opacity: 0.1}, 3000).slideUp("slow");',
		 CClientScript::POS_READY
	); ?>
<? endif; ?>
