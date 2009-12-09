<? foreach($quotes as $quote): ?>
  <?=$this->renderPartial('_quote', array(
    'quote' => $quote,
  ))?>
<? endforeach; ?>

<div class="pagerContainer">
<? $this->widget('CLinkPager', array(
  'pages' => $pages,
  'cssFile' => Yii::app()->request->baseUrl . '/static/css/site/pager.css',
  'header' => false,
)); ?>
</div>