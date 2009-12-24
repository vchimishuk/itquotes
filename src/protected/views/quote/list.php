<h1>Quotes list</h1>

<?=CHtml::beginForm($this->createUrl('list'))?>

<?=$this->renderPartial('/admin/successSummary')?>

<br />
<!-- search form start -->
<?=CHtml::link('Hide/show search form', '#', array(
	'id' => 'toggleSearchForm',
	'class' => 'tools_link',
))?>
<?=Yii::app()->clientScript->registerScriptFile(
	Yii::app()->request->baseUrl . '/static/js/admin/toggleSearchForm.js',
	CClientScript::POS_HEAD
)?>
<div id="searchForm" class="<?=$showSearchForm ? '' : 'hidden'?>">
<p>
<?=CHtml::label('Text', 'search[text]')?><br />
<?=CHtml::textField('search[text]', $search['text'], array(
	'class' => 'small',
))?><br /><br />

<?=CHtml::label('Author', 'search[authorId]')?><br />
<?=CHtml::dropDownList('search[authorId]', $search['authorId'], array(0 => '-- All --') + CHtml::listData($authors, 'id', 'name'), array(
        'class' => 'small',
))?><br /><br />

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
<?=CHtml::resetButton('Reset', array(
	'class' => 'button',
))?>
</div>
<!-- search form start -->

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
				<? if($quote->textEn && $quote->textRu): ?>
					<hr />
				<? endif; ?>
				<?=CHtml::encode($quote->textRu)?>
			</td>
			<td class="bottom">
	                        <? if($quote->author): ?>
	                                <?=CHtml::link($quote->author->name, array('author/edit', 'id' => $quote->author->id))?>
	                        <? endif; ?>
	                </td>
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