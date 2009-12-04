<html>
<head>
	<title><?=Yii::app()->name?> :: <?=$this->id?> :: <?=$this->action->id?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
  <table>
    <tr>
      <td colspan="2">
	<!-- menu start -->
	<? $this->widget('application.components.Menu'); ?>
	<!-- menu end -->
      </td>
    </tr>
    <tr>
      <td width="80%">
	<!-- content start -->
	<?=$content?>
	<!-- content end -->
      </td>
      <td>
	Tags cloud:<br />
	<? $this->widget('application.components.TagsCloud'); ?>
      </td>
    </tr>
  </table>

</body>
</html>
