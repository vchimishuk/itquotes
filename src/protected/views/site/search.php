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
      <?=CHtml::dropDownList('SearchForm[authorId]', $form->authorId, array(0 => '-- All ---') + CHtml::listData($authors, 'id', 'name'), array(
        'class' => 'small',
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
