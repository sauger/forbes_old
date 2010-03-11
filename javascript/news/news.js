$(function(){
	$(".left_top_title").hover(function(){
		$(".left_top_title").css('background','');
		$(this).css('background','url(/images/html/news/background1.jpg)');
		$(".left_top").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
});
