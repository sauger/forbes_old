$(function(){
	$(".nav").hover(function(){
		var num=$(this).attr("param1");
		$(".n_content").css('display','none');
		$("#nav"+num).css('display','inline');
		$(".nav").parent().css("background","none");
		$(this).parent().css('background',"url('/images/index/dh1_bg.jpg') repeat-x");
	});
	$(".nav").click(function(){
		location.href=$(this).attr("param");
	});
});