<? foreach($tags as $tag): ?>
<?=CHtml::link($tag->name, array("site/tag", 'tag' => CHtml::encode($tag->name)), array(
  'style' => 'font-size: 100%;',
))?>&nbsp;
<? endforeach; ?>