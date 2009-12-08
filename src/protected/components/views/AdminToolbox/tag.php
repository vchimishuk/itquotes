<div class="right_block">
	<h2>Administrator toolbox</h2>
	
	<ul>
		<li><?=CHtml::link('New tag', array('add'))?></li>
		<li><?=CHtml::link('Tags list', array('list'))?></li>
	</ul>	

	<br />

	<h2>Tags statistics</h2>
	<ul>
		<li>Total count: <?=$statistics['totalCount']?></li>
		<li>
			Most popular:
			<? foreach($statistics['popularTags'] as $tag): ?>
				<?=CHtml::link("{$tag->name} ({$tag->quotesCount})",
					array('edit', 'id' => $tag->id)
				)?>
			<? endforeach; ?>
		</li>
	</ul>
</div>