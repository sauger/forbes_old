$(function(){
	var count = 4;
	$("#add").click(function(){
		if(count<10){
			$(this).parent().before('<div class="share_line"><div class="share_mail"><span>好友邮件'+count+':</span><input name="mail[]" class="input1" type="text"></div><div class="share_name"><span>好友昵称'+count+'：</span><input name="name[]" class="input2" type="text"></div></div>')
			count++;
		}
	});
});
