$(document).ready(function(){
	$(".tabs > ul").tabs();
	$.tablesorter.defaults.sortList = [[1,0]];
	$("table").tablesorter({
		headers: {
			0: { sorter: false },
			7: { sorter: false }
		}
	});
});