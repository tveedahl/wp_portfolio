$(document).ready(function() {
	$('.navbar-toggle').click(function(){
		if ($(".navbar-toggle").attr("aria-expanded") == "false") {
		    $('.site-content').css("padding-top", "170px");
		} else {
		    $('.site-content').css("padding-top", "0");
		}
	});
});