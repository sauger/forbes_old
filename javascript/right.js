$(function(){
	$(".article_list").hover(function(){
		$(".article_list").css({background:'none',color:'#999'});
		$(this).css({
			background: 'url(/images/right/background1.jpg)',
			color: '#000'
		});
		$(".left_top").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
	
	$(".column_list").hover(function(){
		$(".column_list").css({background:'none',color:'#999'});
		$(this).css({
			background: 'url(/images/right/background1.jpg)',
			color: '#000'
		});
		$(".left_top").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
	
	$(".left_bottom_title").hover(function(){
		$(".left_bottom_title").css({background:'none',color:'#999'});
		$(this).css({
			background: 'url(/images/right/background2.jpg)',
			color:'#000'
		});
		$(".left_bottom").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
	
	
	$("#r_c_r").click(function(){
		if($("#r_c_c").find(".content:visible:eq(0)").next().next().attr('class')=='content'){
			$("#r_c_c").find(".content:visible:eq(0)").hide('slow');
		}
	});
	
	$("#r_c_l").click(function(){
		$("#r_c_c").find(".content:visible:eq(0)").prev().show('slow');
	});
});
