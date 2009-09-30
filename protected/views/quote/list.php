<h1>Quotes list</h1>

<?=CHtml::beginForm()?>

<?=$this->renderPartial('/admin/successSummary')?>

<p>
<?=CHtml::label('Text', 'search[text]')?><br />
<?=CHtml::textField('search[text]', $search['text'], array(
	'class' => 'small',
))?><br /><br />

<?=CHtml::label('Author', 'search[author]')?><br />
<?=CHtml::textField('search[author]', $search['author'], array(
	'class' => 'small',
))?><br /><br />

<?/*
<?=CHtml::checkBox('search[approved]', $search['approved'])?> 
<?=CHtml::label('Approved', 'search[approved]')?>

<?=CHtml::checkBox('search[unApproved]', $search['unApproved'])?> 
<?=CHtml::label('Unapproved', 'search[unApproved]')?>
*/?>

<?=CHtml::radioButtonList('search[approved]', $search['approved'], array(
		'all' => 'All',
		'approved' => 'Approved',
		'unApproved' => 'Unapproved'
	),
	array('separator' => '')
)?>

</p>

<?=CHtml::submitButton('Search', array(
	'class' => 'button',
))?>

<table>
	<tr>
		<th>Id</th>
		<th>text</th>
		<th>author</th>
		<th>actions</th>
	</tr>

	<? $rowClasses = array('', 'line'); ?>
	<? foreach($quotes as $quote): ?>
		<tr class="<?=$rowClasses[0]?>">
			<td class="bottom"><?=$quote->id?></td>
			<td class="bottom">
				<?=CHtml::encode($quote->textEn)?>
				<? if($quote->textRu && $quote->textRu): ?>
					<hr />
				<? endif; ?>
				<?=CHtml::encode($quote->textRu)?>
			</td>
			<td class="bottom"><?=CHtml::encode($quote->author)?></td>
			<td class="bottom">
				<?=CHtml::link('Edit', array('edit', 'id' => $quote->id))?>
				<?=CHtml::link('Delete', array('delete', 'id' => $quote->id), array(
					'onclick' => 'return confirm(\'Do you really want to delete this quote?\')'
				))?>
			</td>
		</tr>
	<? $rowClasses = array_reverse($rowClasses); ?>
	<? endforeach ?>
</table>

<? $this->widget('CLinkPager', array(
	'pages' => $pages,
	'cssFile' => Yii::app()->request->baseUrl . '/static/css/admin/pager.css',
	'header' => false,
)); ?>

<?=CHtml::endForm()?>