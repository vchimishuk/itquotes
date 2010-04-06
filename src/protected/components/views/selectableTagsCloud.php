<?
$rows = array_chunk($tags, $cols);
?>

<table id="Quote_tags" style="border: none; background-color: #FFFFFF; width: 100%; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;">
  <? foreach ($rows as $row): ?>
    <tr style="padding: 0px 0px 0px 0px;">
	<? foreach ($row as $tag): ?>
	  <td style="padding: 5px 5px 5px 5px;">
	    <input type="checkbox" value="<?=$tag->id?>" name="<?=$name?>[]" id="tag_<?=$tag->id?>"
	      <?=(in_array($tag->id, $selectedTagsIds) ? 'checked="checked"' : '')?> />

	    <label for="tag_<?=$tag->id?>"><?=$tag->name?></label>
          </td>
        <? endforeach; ?>
	
	<? $emptyCells = $cols - count($row); ?>
	<? for ($i = 0; $i < $emptyCells; $i++): ?>
  	  <td>&nbsp;</td>
	<? endfor; ?>
    </tr>
  <? endforeach; ?>
</table>