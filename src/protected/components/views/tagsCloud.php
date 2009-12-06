<? foreach($tags as $tag): ?>
<?=CHtml::link("{$tag->name} ({$tag->approvedQuotesCount})", array("site/tag", 'tag' => CHtml::encode($tag->name)))?>,<br />
<? endforeach; ?>