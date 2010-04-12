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
		$.post('/ajax/set_order.php',{'type':'news'},function(data){
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
		$.post('/ajax/set_order.php',order,function(data){
			if(data=='wrong'){
				alert('请先登录后再定阅');
			}else if(data=='success'){
				alert('定阅成功');
			}
		});
	});
	
	$("#old_magazine").change(function(){
		$.post('/ajax/show_magazine.php',{'year':$("#old_magazine").val()},function(data){
			$("#show_magazine").html(data);
			$("#btnonline").removeAttr('href');
			$("#sq").removeAttr('href');
		});
	});
	
	$("#show_magazine").live('change',function(){
		if($("#show_magazine option:selected").attr('url')==''){
			$("#btnonline").removeAttr('href');
			$("#sq").removeAttr('href');
		}else{
			$("#btnonline").attr('href',$("#show_magazine option:selected").attr('url'));
			$("#sq").attr('href','javascript:void(0)');
			$("#sq").attr('name',$("#show_magazine option:selected").val());
		}
	});
	
	$("#sq").click(function(){
		if($("#sq").attr('name')!=''){
			$.post('/ajax/order_magazine.php',{'id':$("#sq").attr('name')},function(data){
				if(data=='wrong'){
					alert("请先登录再申请赠阅");
				}else if(data=='success'){
					alert("已申请，请等待管理员审批");
				}else if(data=='full'){
					alert("请不要重复申请");
				}
			});
		}
	});
});
