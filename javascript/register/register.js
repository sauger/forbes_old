$(function(){
	
	$("#user_name").blur(function(){
		userName();
	});
	
	$("#user_email").blur(function(){
		userEmail();
	});
	
	$("#user_pass").blur(function(){
		userPassword();
	});
	
	$("#password2").blur(function(){
		userPassword2();
	});
	
	$("#order1").click(function(){
		if($(this).attr('checked')==true){
			$("#order2").attr('checked',false);
		}
	});
	
	$("#order2").click(function(){
		if($(this).attr('checked')==true){
			$("#order1").attr('checked',false);
		}
	});
	
	$("#chang_pic").click(function(){
		$("#pic").attr('src','yz.php?reload='+Math.round(Math.random()*10000));
	})
	
	$("#tj").click(function(){
		if($("#user_name").val()=='') {
			alert('请输入用户名');
			$("#user_name").focus();
			return false;
		}else{
			
		}
		if($("#user_email").val()=='') {
			alert('请输入邮箱地址');
			$("#user_email").focus();
			return false;
		}else{
			if(!userEmail()){
				$("#user_email").focus();
				return false;
			}
		}
		if($("#user_pass").val()==''){
			alert('请输入密码');
			$("#user_pass").focus();
			return false;
		}else{
			if(!userPassword()){
				$("#user_pass").focus();
				return false;
			}
		}
		if($("#password2").val()==''){
			alert('请输入确认密码');
			$("#password2").focus();
			return false;
		}else{
			if(!userPassword2()){
				$("#password2").focus();
				return false;
			}
		}
		if(!($("#order1").attr('checked')||$("#order2").attr('checked'))){
			alert('请选择是否愿意订阅福布斯精华推荐');
			$("#order1").focus();
			return false;
		}
		if($("#rvcode").val()==''){
			alert('请输入验证码');
			$("#rvcode").focus();
			return false;
		}else{
			$.post('check_session.php',{'rvcode':$("#rvcode").val()},function(data){
				if(data == '0'){
					alert('验证码错误！');
					return false;
				}else{
					$("#re_form").submit();
				}
			});
		}
	});
	
	$("#sure_check").click(function(){
		$("#tj").attr('disabled',!$("#tj").attr('disabled'));
	});
});

function userName(){
	if($("#user_name").val()!=''){
		if($("#user_name").val().length<4||$("#user_name").val().length>20){
			$(".name_check").css('display','none');
			$("#user4").css('display','inline');
			return false;
		}else{
			if(!isNumberOrLetter($("#user_name").val())){
				$(".name_check").css('display','none');
				$("#user5").css('display','inline');
				return false;
			}
			$.post('check_name.php',{'name':$("#user_name").val()},function(data){
				if(data==1){
					$(".name_check").css('display','none');
					$("#user3").css('display','inline');
					return false;
				}else if(data==0){
					$(".name_check").css('display','none');
					$("#user2").css('display','inline');
					return true;
				}
			});
		}
	}else{
		$(".user_check").css('display','none');
		$("#user1").css('display','inline');
	}
}

function userEmail(){
	if($("#user_email").val()!=''){
		if(!isEmail($("#user_email").val())){
			$(".email_check").css('display','none');
			$("#email3").css('display','inline');
			return false;
		}else{
			$(".email_check").css('display','none');
			$("#email2").css('display','inline');
			return true;
		}
	}else{
		$(".email_check").css('display','none');
		$("#email1").css('display','inline');
	}
}

function userPassword(){
	if($("#user_pass").val()!=''){
		if($("#user_pass").val().length<4||$("#user_pass").val().length>20){
			$(".pass_check").css('display','none');
			$("#pass4").css('display','inline');
			return false;
		}
		
		if(!isNumberOrLetter2($("#user_pass").val())){
			$(".pass_check").css('display','none');
			$("#pass3").css('display','inline');
			return false;
		}else{
			$(".pass_check").css('display','none');
			$("#pass2").css('display','inline');
			return true;
		}
	}else{
		$(".pass_check").css('display','none');
		$("#pass1").css('display','inline');
	}
	if($("#password2").val()!=''&&$("#user_pass").val()!=''){
		if($("#password2").val()==$("#user_pass").val()){
			$(".pass_check2").css('display','none');
			$("#check_pass1").css('display','inline');
			return true;
		}else{
			$(".pass_check2").css('display','none');
			$("#check_pass2").css('display','inline');
			return false;
		}
	}else{
		$(".pass_check2").css('display','none');
	}
}

function userPassword2(){
	if($("#password2").val()!=''&&$("#user_pass").val()!=''){
		if($("#password2").val()==$("#user_pass").val()){
			$(".pass_check2").css('display','none');
			$("#check_pass1").css('display','inline');
			return true;
		}else{
			$(".pass_check2").css('display','none');
			$("#check_pass2").css('display','inline');
			return false;
		}
	}else{
		$(".pass_check2").css('display','none');
	}
}

function isNumberOrLetter(s){//判断是否是数字或字母 
	var regu = "^[0-9a-zA-Z]+$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
	}
}

function isNumberOrLetter2(s){//判断是否是数字或字母及少量特殊符号
	var regu = "^[0-9a-zA-Z.!@#$%^&*]+$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
	}
}


function isEmail( str ){ 
	var myReg = /^[-_A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/; 
	if(myReg.test(str)) return true; 
	return false; 
} 