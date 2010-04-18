<?php
	require_once('../frame.php');
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
	  <form name="login" id="form_login" action="getpwd.post.php" method="post">
	  	<div id=leftp>
	  		<div style="float:left; display:inline">
	  		 <div id=left-font1>用户名：</div>
	  		 <input type="text" id=font1 class="required"  name="u_name" value=""></input>
	  		</div>
	  		<div style="float:left; display:inline">
	  		 <div id=left-font2>邮　箱：</div>
	  		 <input type="text" class="required font2" name="email" value=""></input>
	  		</div>
	  		<div style="float:left; display:inline">
	  		 <div id=left-font3>验证码：</div>
			 <input type="text" class="input3" name="yzm">
			 <img id="yz_img" src="yz.php">
	  		</div>
	  		<div><input type="submit"  id="login" value="提交"></button></div>
	  	</div>
	  </form>
	</div>
	  <div id=right>
	  	<div id=rightp>
	  		 <div id=right-title>欢迎您登陆福布斯中文网！</div>
	  		 <div id=right-font>《福布斯》杂志的前瞻性报道为企业高层决策者引导投资方向，提供商业机会，被誉为“美国经济的晴雨表”。</div>
	  	</div>
	  </div>
	<?php 
		include "../inc/bottom.inc.php";
	?>
</div>
</body>
</html>
