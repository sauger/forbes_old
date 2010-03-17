<?php
	require_once('../frame.php');
	$lasturl = isset($_REQUEST['last_url']) ? $_REQUEST['last_url'] : '';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>福布斯中文网后台管理</title>
		<?php
			use_jquery();
			css_include_tag('login');
		?>
	</head>
	<body>
		<form name="login" id="form_login" action="login.post.php" method="post" style="width:100%; height:550px;background:url(/images/bg/admin_bg1.jpg) repeat-x;margin-top:0px;">
			<div id=main>
					<div id="login"  style="background:none">
						<div id=title>系统登录    </div>
						<span style="color:#FF0000"> <? echo $_REQUEST['errorstr'];?></span>
						<div id=box style="border:1px solid #0066FF">
							<div id="name">用户名　　<input type="text" id=login_text name=login_text style="width:145px; height:17px;" class="required"></div>
							<div id="pwd">密　码　　<input type="password" id=password_text name=password_text style="width:145px; height:17px;"></div>
							<div id="btn"><input type="button" value="登录" id="login_btn" class="botton"></div>	
							<input type="hidden" name="lasturl" value="<?php echo $lasturl;?>">
							<input type="hidden" name="user_type" value="login">						
						</div>				
					</div>			
			</div>		
		</form>
	</body>
</html>

<script>
$(function(){
		$("#login_btn").click(function(){
			login();
		});
		
		$('#password_text').keypress(function(e){
			if(e.keyCode == 13){login();}
		});
		
		function login()
		{
			var login_text=$("#login_text").val();
			var password_text=$("#password_text").val();
			if(login_text==""||password_text=="")
			{
				alert("用户名或密码不能为空");
				return false;
			}
			else
			{

				$("#form_login").submit();
			}		
		}
		
		
});
</script>