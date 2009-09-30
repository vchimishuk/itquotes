<h1>Tags list</h1>
<?=CHtml::beginForm()?>

<?=$this->renderPartial('/admin/successSummary')?>

<p>
<?=CHtml::label('Name', 'search[name]')?><br />
<?=CHtml::textField('search[name]', $search['name'], array(
	'class' => 'small',
))?>
</p>
<?=CHtml::submitButton('Search', array(
	'class' => 'button',
))?>

<table>
	<tr>
		<th>id</th>
		<th>name (En)</th>
		<th>name (Ru)</th>
		<th>quotes</th>
		<th>actions</th>
	</tr>
	<? $rowClasses = array('', 'line'); ?>
	<? foreach($tags as $tag): ?>
		<tr class="<?=$rowClasses[0]?>">
			<td class="bottom"><?=$tag->id?></td>
			<td class="bottom"><?=CHtml::encode($tag->nameEn)?></td>
			<td class="bottom"><?=CHtml::encode($tag->nameRu)?></td>
			<td class="bottom"><?=$tag->quotesCount?></td>
			<td class="bottom">
				<?=CHtml::link('Edit', array('edit', 'id' => $tag->id))?>
				<?=CHtml::link('Delete', array('delete', 'id' => $tag->id), array(
					'onclick' => 'return confirm(\'Do you really want to delete this tag?\')'
				))?>
			</td>
		</tr>
	<? $rowClasses = array_reverse($rowClasses); ?>
	<? endforeach ?>
</table>

<div class="center">
<? $this->widget('CLinkPager', array(
	'pages' => $pages,
	'cssFile' => Yii::app()->request->baseUrl . '/static/css/admin/pager.css',
	'header' => false,
)); ?>
</div>
<?=CHtml::endForm()?>
