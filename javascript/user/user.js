$(function(){
	$('.left_list').hover(function(){
		$(".left_list").css('background','');
		$(".left_list").find('a').css('color','#5B5B5B');
		$(this).css('background','#2F75B9');
		$(this).find('a').css('color','#fff');
		$(".left_list").find('img:first').css('display','inline');
		$(".left_list").find('img:eq(1)').css('display','none');
		$(this).find('img:first').css('display','none');
		$(this).find('img:eq(1)').css('display','inline');
		$(".left_list").find('.icon2').css('display','none');
		$(this).find('.icon2').css('display','inline');
	});
	
	$('.left_list2').hover(function(){
		$(".left_list").css('background','');
		$(".left_list").find('a').css('color','#5B5B5B');
		$(".left_list").find('img:first').css('display','inline');
		$(".left_list").find('img:eq(1)').css('display','none');
		$(".left_list").find('.icon2').css('display','none');
	});
	
	$("#left").mouseleave(function(){
		$(".left_list").css('background','');
		$(".left_list").find('a').css('color','#5B5B5B');
		$(".left_list").find('img:first').css('display','inline');
		$(".left_list").find('img:eq(1)').css('display','none');
		$(".left_list").find('.icon2').css('display','none');
	})
	
	$(".right-title4").hover(function(){
		$(".right-title4").css('background','');
		$(".right-title4").css('color','#fff');
		$(this).css('background','url(/images/html/user/right_title.jpg)');
		$(this).css('color','#055C99');
	});
});
