<? foreach($tags as $tag): ?>
<?=CHtml::link("{$tag->name} ({$tag->quotesCount})", array("site/tag/" . CHtml::encode($tag->name)))?>,<br />
<? endforeach; ?>