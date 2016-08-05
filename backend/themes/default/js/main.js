$(function() {
	
	$("#scroll").hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$("#scroll").fadeIn();
		} else {
			$("#scroll").fadeOut();
		}
	});
	$("#scroll").click(function () {
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	$("#body").on("click", ".external", function() {
		var target = $(this).attr("href");
		window.open(target);
		return false;
	});
	
	$('.selectpicker').selectpicker({
		style: 'btn-default',
	});
	
});



