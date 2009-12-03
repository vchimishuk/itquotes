jQuery(document).ready(function() {
	$("#toggleSearchForm").bind("click", function () {
		$("#searchForm").toggle(400, function () {
			$.cookie(
				"showSearchForm",
				$(this).is(":hidden") ? 0 : 1,
				{path: '/'}
			);
		});
	});
});
