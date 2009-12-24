function onAuthorsListChange(list)
{
	var authorCustom = $("#Quote_authorCustomName");

	if(parseInt(list.value, 10)) {
		var name = list.options[list.selectedIndex].text;
		authorCustom.val(name).attr("readonly", true);
	} else {
		authorCustom.val("").removeAttr("readonly");
	}
}