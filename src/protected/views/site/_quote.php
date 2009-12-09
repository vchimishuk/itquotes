<div class="post">
  <a href="<?=$this->createAbsoluteUrl('quote', array('id' => $quote->id))?>" class="quote-title">Цитата #<?=$quote->id?></a>
  <? if($quote->textEn): ?>
    <p class="entry">&quot;<?=CHtml::encode($quote->textEn)?>&quot;</p>
  <? endif; ?>
  <? if($quote->textRu): ?>
    <p class="entry">&quot;<?=CHtml::encode($quote->textRu)?>&quot;</p>
  <? endif; ?>
  <p>
    <? if($quote->author): ?>
      <span class="author-title">Author:</span> <span class="author-name"><?=$quote->author?></span><br />
    <? endif; ?>
    <? if($quote->tags): ?>
      <span class="tags-title">Tags:</span>
      <span class="tags-name">
	<? $len = count($quote->tags); ?>
	<? for($i = 0; $i < $len; $i++): ?>
          <a href="<?=$this->createAbsoluteUrl('tag', array('tag' => $quote->tags[$i]->name))?>"><?=CHtml::encode($quote->tags[$i]->name)?></a>
	  <?=($i < $len - 1 ? ',' : '')?>
	<? endfor; ?>
      </span>
    <? endif; ?>
  </p>
</div>
