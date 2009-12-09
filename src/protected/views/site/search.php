<div class="content">
<?=CHtml::beginForm($this->createUrl('search'))?>
<table>
  <tr>
    <td><?=CHtml::activeLabelEx($form, 'text')?>:</td>
    <td>
      <?=CHtml::activeTextField($form, 'text', array(
				       'maxlength' => 255,
      ))?>
    </td>
  <tr>
    <td><?=CHtml::activeLabelEx($form, 'author')?>:</td>
    <td>
      <?=CHtml::activeTextField($form, 'author', array(
				       'maxlength' => 255,
      ))?>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <?=CHtml::submitButton('Искать', array())?>
    </td>
  </tr>
</table>
<?=CHtml::endForm()?>
<br />

<?=$this->renderPartial('_list', array(
  'quotes' => $quotes,
  'pages' => $pages,
))?>
</div>
