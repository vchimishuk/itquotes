<?=Yii::app()->clientScript->registerScriptFile(
	Yii::app()->request->baseUrl . '/assets/697e102a/jquery.cookie.js',
	CClientScript::POS_HEAD
)?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=Yii::app()->name?> :: <?=$this->id?> :: <?=$this->action->id?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" type="image/ico" href="<?=Yii::app()->request->baseUrl?>/static/img/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl?>/static/css/admin/main.css" />
</head>
<body>
	<!-- header start -->
	<div class="header">
		<div class="h_top">
			<div class="h_right"> 
				Logged in as <?=Yii::app()->user->name?>,
				<?=CHtml::link('Logout?', array('profile/logout'))?>
			</div>
			<h1><a href="/" class="home_link"><?=Yii::app()->name?></a></h1>
			<p>Administration panel</p>
			<div class="clear"></div>
		</div>
		<!-- menu start -->
		<? $this->widget('application.components.AdminMenu'); ?>
		<!-- menu end -->
	</div>
	<!-- header end -->
	
	<div class="main">
		<!-- right sidebar start -->
		<? $this->widget('application.components.AdminToolbox'); ?>
		<!-- right sidebar end -->
		
		<!-- content start -->
		<div class="main_block">
			<?=$content?>
		</div>
		<!-- content end -->
		<div class="clear">
		</div>
	</div>

	<!-- footer start -->
	<div class="footer">
		<p><?=Yii::powered()?></p>
	</div>
	<!-- footer end -->
</body>
</html>
