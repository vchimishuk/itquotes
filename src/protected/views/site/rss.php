<atom:link href="<?=Yii::app()->createAbsoluteUrl('site/rss')?>" rel="self" type="application/rss+xml" />
<title><?=Yii::app()->name?></title>
<link><?=Yii::app()->createAbsoluteUrl('')?></link>
<description><?=$config['description']?></description>

<? foreach($quotes as $quote): ?>
	<item>
		<title>Quote #<?=$quote->id?></title>
		<link><?=Yii::app()->createAbsoluteUrl('site/quote',array('id' => $quote->id))?></link>
		<guid><?=Yii::app()->createAbsoluteUrl('site/quote',array('id' => $quote->id))?></guid>
		<description>
		  <?=CHtml::encode(strip_tags(!empty($quote->textEn) ? $quote->textEn : $quote->textRu))?>
		  <? if($quote->author): ?>
		    (<?=$quote->author->name?>)
		  <? endif; ?>
		</description>
		<pubDate><?=date('r', $quote->approvedTime)?></pubDate>
	</item>
<? endforeach; ?>
