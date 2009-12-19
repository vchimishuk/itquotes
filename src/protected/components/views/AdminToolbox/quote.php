<div class="right_block">
	<h2>Administrator toolbox</h2>
	<ul>
		<li><?=CHtml::link('New quote', array('add'))?></li>
		<li><?=CHtml::link('Quotes list', array('list'))?></li>
	</ul>	

	<br />

	<h2>Quotes statistics</h2>
	<ul>
		<li>Total count: <?=$statistics['totalCount']?></li>
		<li>Unapproved count: <?=$statistics['unapprovedCount']?></li>
	</ul>
</div>
