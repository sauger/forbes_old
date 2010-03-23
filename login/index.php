<?php
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-cn>
		<title>福布斯-登陆</title>
		<?php
			use_jquery();
			css_include_tag('comlogin','top','bottom');
			validate_form('form_login');
		?>
	</head>
	<body>
	 <div style="width:1002px; margin:0 auto;">		
	 	<?php include "../inc/top.inc.php";?>	
	  <div id="left">
	  <form name="login" id="form_login" action="comlogin.post.php" method="post">
	  	<div id=leftp>
	  		<div style="float:left; display:inline">
	  		 <div id=left-font1>用户名：</div>
	  		 <input type="text" id=font1 class="required"  name="name" value="<?php echo $_COOKIE['name'];?>"></input>
	  		</div>
	  		<div style="float:left; display:inline">
	  		 <div id=left-font2>密　码：</div>
	  		 <input type="password" class=font2 class="required" name="password" value="<?php echo $_COOKIE['password'];?>"></input>
	  		</div>
	  		<div>
	  		 <div id=left-font3>期　限：</div>
	  		 <select type="text" class="font2" name="time">
	  		 <option value="0">不保存</option>
	  		 <option value="1">一天</option>
	  		 <option value="7">一周</option>
	  		 <option value="30" selected="selected">一月</option>
	  		 <option value="365">一年</option>
	  		 </select>
	  		 <?php if($_REQUEST['last_url']){?>
	  		 <input type="hidden" name="last_url" value="<?php echo $_REQUEST['last_url'];?>"></input>
	  		 <?php }?>
	  		</div>
	  		<div><input type="submit"  id="login" value="登录"></button></div>
	  		<div style="width:300px;">
	  		  <div id=left-bottom1><a href="../register/register.php">新用户注册</a></div>
	  		  <div id=left-bottom2><a href="">忘记密码？</a></div>
	  		</div>  	 
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
