<?php
	require_once('../frame.php');
	$db =get_db();
	$_SESSION['get_pwd'] = rand_str();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-cn>
		<title>福布斯-密码找回</title>
		<?php
			use_jquery();
			js_include_tag('public');
			css_include_tag('comlogin','public');
			validate_form('form_login');
		?>
</head>
<body>
<div id=ibody>		
	 <?php include "../inc/top.inc.php";?>
	 <div id=bread><span>密码找回</span></div>
	 <div id=bread_line></div>
	 <div id="left">
	 	<?php
	 	$verify = $_GET['verify'];
		if(empty($verify)){
			echo "<div id='error'>您的申请不合法或者已经过期</div>";
		}else{
			$db->query("select * from fb_get_pwd where verify='$verify' and now()<end_time");
			if($db->record_count==0){
				echo "<div id='error'>您的申请不合法或者已经过期</div>";
			}else{
	 ?>
	  <form name="login" id="form_login" action="getpwd2.post.php" method="post">
	  	<div id=leftp>
	  		<div style="float:left; display:inline">
	  		 <div id=left-font1>新密码：</div>
	  		 <input type="password" id=font1 class="required"  name="password1"></input>
	  		</div>
	  		<div style="float:left; display:inline">
	  		 <div id=left-font2>重复密码：</div>
	  		 <input type="password" class="required font2" name="password2"></input>
	  		</div>
	  		<div><input type="submit"  id="login" value="提交"></button></div>
	  	</div>
		<input type="hidden" name="session" value="<?php echo $_SESSION['get_pwd'];?>">
	  </form>
	</div>
	  <div id=right>
	  	<div id=rightp>
	  		 <div id=right-title>欢迎您登陆福布斯中文网！</div>
	  		 <div id=right-font>《福布斯》杂志的前瞻性报道为企业高层决策者引导投资方向，提供商业机会，被誉为“美国经济的晴雨表”。</div>
	  	</div>
	  </div>
	<?php
	}
		}
		include "../inc/bottom.inc.php";
	?>
</div>
</body>
</html>
