<h3>Search quote</h3>

 <?=CHtml::beginForm($this->createUrl('search'))?>
	<?=CHtml::activeLabelEx($form, 'text')?><br />
	<?=CHtml::activeTextField($form, 'text', array(
		'maxlength' => 255,
	))?>
        <br /><br />

	<?=CHtml::activeLabelEx($form, 'author')?><br />
	<?=CHtml::activeTextField($form, 'author', array(
		'maxlength' => 255,
	))?>
        <br /><br />
	
	<?=CHtml::submitButton('Search', array())?>
<?=CHtml::endForm()?>


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
