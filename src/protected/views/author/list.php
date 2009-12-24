<h1>Authors list</h1>
<?=CHtml::beginForm($this->createUrl('list'))?>

<?=$this->renderPartial('/admin/successSummary')?>

<br />

<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>quotes count</th>
		<th>actions</th>
	</tr>
	<? $rowClasses = array('', 'line'); ?>
	<? foreach($authors as $author): ?>
		<tr class="<?=$rowClasses[0]?>">
			<td class="bottom"><?=$author->id?></td>
			<td class="bottom"><?=CHtml::encode($author->name)?></td>
	                <td class="bottom"><?=$author->quotesCount?></td>
			<td class="bottom">
				<?=CHtml::link('Edit', array('edit', 'id' => $author->id))?>
				<?=CHtml::link('Delete', array('delete', 'id' => $author->id), array(
					'onclick' => 'return confirm(\'Do you really want to delete this author?\')'
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
