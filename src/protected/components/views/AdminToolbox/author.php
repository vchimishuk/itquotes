<div class="right_block">
	<h2>Administrator toolbox</h2>
	
	<ul>
		<li><?=CHtml::link('Author list', array('list'))?></li>
	</ul>	

	<br />

	<h2>Authors statistics</h2>
	<ul>
		<li>Total count: <?=$statistics['totalCount']?></li>
		<li>
			Most popular: 
	            	<?foreach($statistics['popularAuthors'] as $author): ?>
				<?=CHtml::link("{$author->name} ({$author->quotesCount})",
					array('edit', 'id' => $author->id)
				)?>
			<? endforeach; ?>
		</li>
	</ul>
</div>