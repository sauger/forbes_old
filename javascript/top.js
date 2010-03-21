$(function(){
	$(".nav").hover(function(){
		var num=$(this).attr("param1");
		$(".nav2").css('display','none');
		$("#nav"+num).css('display','inline');
		$(".nav").parent().parent().css("background","none");
		$(this).parent().parent().css('background',"url('/images/top/bg_menu.jpg') repeat-x");
	});

	
	
	
	

	
});