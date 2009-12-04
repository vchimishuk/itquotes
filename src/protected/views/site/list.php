<h3>Quotes list</h3>

<? foreach($quotes as $quote): ?>
<table>
  <tr>
    <td><?=CHtml::link('#', array('quote', 'id' => $quote->id))?></td>
  </tr>
  <tr>
    <td><i><?=CHtml::encode($quote->textEn)?></i></td>
  </tr>
  <tr>
    <td><i><?=CHtml::encode($quote->textRu)?></i></td>
  </tr>
  
  <? if($quote->author): ?>
  <tr>
    <td><b>Author:</b> <?=CHtml::encode($quote->author)?></td>
  </tr>
  <? endif; ?>

  <? if($quote->notes): ?>
  <tr>
    <td><b>Notes:</b> <?=CHtml::encode($quote->notes)?></td>
  </tr>
  <? endif; ?>
  
  <? if($quote->tags): ?>
  <tr>
    <td>
      <b>Tags:</b>
      <? foreach($quote->tags as $tag): ?>
        <?=CHtml::encode($tag->name)?>,
      <? endforeach; ?>
    </td>
  </tr>
  <? endif; ?>
</table>
<br /><br /><br />
<? endforeach; ?>

<? $this->widget('CLinkPager', array(
  'pages' => $pages,
  'cssFile' => Yii::app()->request->baseUrl . '/static/css/admin/pager.css',
  'header' => false,
)); ?>
