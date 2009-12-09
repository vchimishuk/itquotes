<?=CHtml::beginForm()?>

<? if(CHtml::errorSummary($form)):?>
  <?=CHtml::errorSummary($form)?>
<? endif; ?>

<table>
  <tr>
    <td><?=CHtml::activeLabelEx($form, 'textEn')?>:</td>
    <td>
      <?=CHtml::activeTextArea($form, 'textEn', array(
				      'class' => 'add',
      ))?>
    </td>
  </tr>
  <tr>
    <td><?=CHtml::activeLabelEx($form, 'textRu')?>:</td>
    <td>
      <?=CHtml::activeTextArea($form, 'textRu', array(
				      'class' => 'add',
      ))?>
    </td>
  </tr>
  <tr>
    <td><?=CHtml::activeLabelEx($form, 'author')?>:</td>
    <td>
      <?=CHtml::activeTextField($form, 'author')?>
    </td>
  </tr>
  <tr>
    <td><?=CHtml::activeLabelEx($form, 'notes')?>:</td>
    <td>
      <?=CHtml::activeTextField($form, 'notes')?>
    </td>
  </tr>
  <tr>
    <td>
      <? $this->widget('CCaptcha', array(
        'showRefreshButton' => false,
      )); ?>
    </td>
    <td>
      <?=CHtml::textField('AddQuoteForm[verifyCode]', '', array(
						      'size' => 10,
      ))?>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <?=CHtml::submitButton('Добавить', array(
				    'class' => 'button',
      ))?>
    </td>
  </tr>
</table>
<?=CHtml::endForm()?>
