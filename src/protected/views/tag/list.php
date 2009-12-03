<h1>Tags list</h1>
<?=CHtml::beginForm()?>

<?=$this->renderPartial('/admin/successSummary')?>

<br />
<!-- search form start -->
<?=CHtml::link('Hide/show search form', '#', array(
	'id' => 'toggleSearchForm',
))?>
<?=Yii::app()->clientScript->registerScriptFile(
	Yii::app()->request->baseUrl . '/static/js/admin/toggleSearchForm.js',
	CClientScript::POS_HEAD
)?>
<div id="searchForm" class="<?=$showSearchForm ? '' : 'hidden'?>">
<p>
<?=CHtml::label('Name', 'search[name]')?><br />
<?=CHtml::textField('search[name]', $search['name'], array(
	'class' => 'small',
))?>
</p>
<?=CHtml::submitButton('Search', array(
	'class' => 'button',
))?> 
<?=CHtml::resetButton('Reset', array(
	'class' => 'button',
))?>
</div>
<!-- search form start -->

<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>quotes</th>
		<th>actions</th>
	</tr>
	<? $rowClasses = array('', 'line'); ?>
	<? foreach($tags as $tag): ?>
		<tr class="<?=$rowClasses[0]?>">
			<td class="bottom"><?=$tag->id?></td>
			<td class="bottom"><?=CHtml::encode($tag->name)?></td>
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
