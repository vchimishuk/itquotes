<h3>Quotes list for "<?=$tag->name?>" tag.</h3>

<? foreach($quotes as $quote): ?>
  <?=$this->renderPartial('_quote', array(
    'quote' => $quote,
  ))?>
  <br /><br /><br />
<? endforeach; ?>

<? $this->widget('CLinkPager', array(
  'pages' => $pages,
  'cssFile' => Yii::app()->request->baseUrl . '/static/css/admin/pager.css',
  'header' => false,
)); ?>
