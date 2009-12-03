Tags cloud: <br />

<? foreach($tags as $tag): ?>
	<?=$tag->name?> (<?=$tag->quotesCount?>),
<? endforeach; ?>