$(function(){
	var next = true;
	var prev = false;
	$("#next").click(function(){
		if (next) {
			var ob = $(".top_picture:visible");
			$(ob).next().show();
			$(ob).hide();
			prev = true;
			$("#prev").css('background', 'url(/images/html/magazine/prev2.gif)')
			if ($(ob).next().next().attr('class') != 'top_picture') {
				$("#next").css('background', 'url(/images/html/magazine/next2.gif)')
				next = false;
			}
		}
	});
	
	$("#prev").click(function(){
		if (prev) {
			var ob = $(".top_picture:visible");
			$(ob).prev().show();
			$(ob).hide();
			next = true;
			$("#next").css('background', 'url(/images/html/magazine/next.jpg)')
			if ($(ob).prev().prev().attr('class') != 'top_picture') {
				$("#prev").css('background', 'url(/images/html/magazine/prev.jpg)')
				prev = false;
			}
		}
	});
});
