$(function(){
	$(".article_list").hover(function(){
		$(".article_list").removeClass('selected');
		$(this).addClass('selected');
		$(".left_top").hide();
		$("#"+$(this).attr('name')).show();
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
	
	$("#order_news").click(function(){
		$("#news_order").attr("disabled",false);
	});
	
	$("#news_order").click(function(){
		$.post('/right/set_order.php',{'type':'news'},function(data){
			if(data=='wrong'){
				alert('请先登录后再定制');
			}else if(data=='success'){
				alert('定制成功');
			}
		});
	});
	
	$(".order_article").click(function(){
		$flag = false;
		$(".order_article").each(function(){
			if($(this).attr('checked')){
				$flag = true;
			}
		});
		if($flag){
			$("#article_order").attr('disabled',false);
		}else{
			$("#article_order").attr('disabled','disabled');
		}
	});
	
	$("#article_order").click(function(){
		var order = $('.order_article').serializeArray();
		$.post('/right/set_order.php',order,function(data){
			if(data=='wrong'){
				alert('请先登录后再定阅');
			}else if(data=='success'){
				alert('定阅成功');
			}
		});
	});
});
