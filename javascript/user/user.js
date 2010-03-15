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
		$(".right-text").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
	
	$("#order_b").click(function(){
		$.post('set_order.php',$('input:checkbox').serializeArray(),function(data){
			alert('修改成功！');
			window.location.reload();
		});
	});
	
	$("#pass_b").click(function(){
		var flag = true;
		$(".right_text").find('input').each(function(){
			if($(this).val()==''){
				alert('请输入密码');
				$(this).focus();
				flag = false;
				return false;
			}else{
				if($(this).val().length<4||$(this).val().length>20){
					alert("请输入合法密码");
					$(this).focus();
					flag = false;
					return false;
				}
			}
		});
		if(!flag) return false;
		if($("#new_pass").val()!=$("#rnew_pass").val()){
			alert("请重新确认新密码");
			$("#rnew_pass").focus();
			return false;
		}else{
			$.post('update_password.php',{'o_p':$("#old_pass").val(),'n_p':$("#new_pass").val()},function(data){
				if(data=='ok'){
					alert('修改成功');
					window.location.reload();
				}else if(data=='wrong'){
					alert("原密码输入错误，请重新输入");
					$("#old_pass").focus();
				}
			})
		}
	});
	
	$("#checkbox1").click(function(){
		if($(this).attr('checked')==true){
			$("#checkbox2").attr('checked',false);
		}
	});
	
	$("#checkbox2").click(function(){
		if($(this).attr('checked')==true){
			$("#checkbox1").attr('checked',false);
		}
	});
	
	$("#province").change(function(){
		$.post("show_city.php",{'id':$(this).val()},function(data){
			$("#city").html(data);
		})
	});
	
});
