<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=Yii::app()->name?> :: Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl?>/static/css/admin/main.css" />
	<link rel="shortcut icon" type="image/ico" href="<?=Yii::app()->request->baseUrl?>/static/img/favicon.ico" />
</head>
<body>
	<div class="header">
		<div class="h_top">
			<h1><?=Yii::app()->name?></h1>
			<p>Administration panel</p>
		</div>
	</div>

	<?=$content?>

	<!-- footer start -->
	<div class="footer">
		<p><?=Yii::powered()?></p>
	</div>
	<!-- footer end -->
</body>
</html>