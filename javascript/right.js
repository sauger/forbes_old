$(function(){
	$(".left_top_title").hover(function(){
		$(".left_top_title").css({background:'none',color:'#999'});
		$(this).css({
			background: 'url(/images/html/news/background1.jpg)',
			color: '#000'
		});
		$(".left_top").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
	
	$(".left_bottom_title").hover(function(){
		$(".left_bottom_title").css({background:'none',color:'#999'});
		$(this).css({
			background: 'url(/images/html/news/background2.jpg)',
			color:'#000'
		});
		$(".left_bottom").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
});
