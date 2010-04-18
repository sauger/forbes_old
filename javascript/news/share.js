$(function(){
	var count = 4;
	$("#add").click(function(){
		if(count<10){
			$(this).parent().before('<div class="share_line"><div class="share_mail"><span>好友邮件'+count+':</span><input name="mail[]" class="input1" type="text"></div><div class="share_name"><span>好友昵称'+count+'：</span><input name="name[]" class="input2" type="text"></div></div>')
			count++;
		}
	});
	
	$("#share_submit").click(function(){
		var input1 = false;
		var input2 = false;
		$(".input1").each(function(){
			if($(this).val().length>30){
				alert("邮件名太长！");
				return false;
			}else{
				if($(this).val()!=''){
					if(!isEmail($(this).val())){
						alert("邮件格式有误！");
						return false;
					}
					input1 = true;
				}
			}
		});
		$(".input2").each(function(){
			if($(this).val().length>20){
				alert("昵称太长！");
				return false;
			}else{
				if($(this).val()!=''){
					input2 = true;
				}
			}
		});
		
		if(input1&input2){
			$("form").submit();
		}
	});
});

function isEmail( str ){ 
	var myReg = /^[-_A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/; 
	if(myReg.test(str)) return true; 
	return false; 
} 
