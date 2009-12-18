<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Hanging
Description: A three-column, fixed-width blog design.
Version    : 1.0
Released   : 20091030
-->
<!--
Original was modified by Viacheslav Chumushuk <voice@root.ua>
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title><?=Yii::app()->name?> :: <?=$this->action->id?></title>
  <meta name="keywords" content="programing, quotes, programming languages, java, perl, python, linux, unix" />
  <meta name="description" content="famous programming quotes" />
  <link href="<?=$this->createAbsoluteUrl('/static/css/site/default.css')?>" rel="stylesheet" type="text/css" media="screen" />
  <link title="rss itquotes.org" type="application/rss+xml" rel="alternate" href="<?=$this->createAbsoluteUrl('rss')?>" />
</head>
<body>
<div id="wrapper">
  <!-- start header -->
  <div id="header-wrapper">
    <div id="header">
      <div id="logo">
        <h1><a href="<?=$this->createAbsoluteUrl('/')?>"><span>ITQuotes</span></a></h1>
        <p>Great computer programming quotes</p>
      </div>
    </div>
  </div>
  <div id="menu-wrapper">
    <div id="menu">
      <? $this->widget('application.components.Menu'); ?>
    </div>
  </div>
  <!-- end header -->
  <!-- start page -->
  <div id="page">
    <div id="page-bgtop">
      <div id="page-bgbtm">
	<!-- start content -->
	<div id="content">
	  <?=$content?>
	</div>
      </div>
      <!-- end content -->
      <!-- start sidebars -->
      <div id="sidebar2" class="sidebar">
	<div class="tags-cloud">
	  <? $this->widget('application.components.TagsCloud'); ?>
	</div>
      </div>
      <!-- end sidebars -->
      <div style="clear: both;">&nbsp;</div>
    </div>
  </div>
  <!-- end page -->
  <div id="footer-wrapper">
    <div id="footer">
      <p class="copyright">
	&copy; 2009 <a href="<?=$this->createAbsoluteUrl('/')?>">itquotes.org</a><br />
	Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>
      </p>
      
      <? $this->renderPartial('_statistics'); ?>
    </div>
  </div>
</html>
