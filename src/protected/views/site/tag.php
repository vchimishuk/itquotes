<h3>Tag: <?=$tag->nameEn?></h3>

<? foreach($tag->quotes as $quote): ?>
	<table>
		<tr>
			<td><?=CHtml::encode($quote->textEn)?></td>
		</tr>
		<tr>
			<td><?=CHtml::encode($quote->textRu)?></td>
		</tr>

		<? if($quote->author): ?>
		<tr>
			<td>Author: <?=CHtml::encode($quote->author)?></td>
		</tr>
		<? endif; ?>

		<? if($quote->tags): ?>
		<tr>
			<td>
				Tags:
				<? foreach($quote->tags as $tag): ?>
					<?=CHtml::encode($tag->nameEn)?>,
				<? endforeach; ?>
			</td>
		</tr>
		<? endif; ?>
	</table>
	<br /><br /><br />
<? endforeach; ?>