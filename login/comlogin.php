﻿<?php
	require_once('../frame.php');
	common_login_State();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-cn>
		<title>福布斯-登陆</title>
		<?php
			use_jquery();
			css_include_tag('comlogin');
			validate_form('form_login');
		?>
	</head>
	<body>
	 <div style="width:1002px; margin:0 auto;">			
		<div id=top>
			<div id=topp></div>
			<div id=topt1><a href="">福布斯中文网首页</a></div>
			<div id=topt2><a href="">设为首页</a></div>	
	  </div>
	  <div id=title>
	  	<div class=top-title1><a href="">首页</a></div>
	  	<div class=top-title2><a href="">榜单</a></div>
	  	<div class=top-title2><a href="">符号</a></div>
	  	<div class=top-title2><a href="">创业</a></div>
	  	<div class=top-title2><a href=""><font color=#FFFF00>商业</font></a></div>
	  	<div class=top-title2><a href="">科技</a></div>
	  	<div class=top-title2><a href="">投资</a></div>
	  	<div class=top-title2><a href="">评论</a></div>
	  	<div class=top-title2><a href="">生活</a></div>
	  	<div class=top-title2><a href="">福布斯论坛FORUM</a></div>
	  	<div class=top-title3><a href="">专栏</a></div>
	  </div>
	  <div id="left">
	  <form name="login" id="form_login" action="comlogin.post.php" method="post">
	  	<div id=leftp>
	  		<div>
	  		 <div id=left-font1>用户名：</div>
	  		 <input type="text" id=font1 class="required"  name="name"></input>
	  		</div>
	  		<div>
	  		 <div id=left-font2>密　码：</div>
	  		 <input type="password" class=font2 class="required" name="password"></input>
	  		</div>
	  		<div>
	  		 <div id=left-font3>期　限：</div>
	  		 <select type="text" class="font2" name="time">
	  		 <option></option>
	  		 <option value="1">一天</option>
	  		 <option value="7">一周</option>
	  		 <option value="30">一月</option>
	  		 <option value="365">一年</option>
	  		 </select>
	  		</div>
	  		<div><input type="submit"  id="login" value="登录"></button></div>
	  		<div style="width:300px;">
	  		  <div id=left-bottom1><a href="">新用户注册</a></div>
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
	  <div id=bottom>
	  	<div id=bottomp>
			  <div class=bottom-title1><a href="">关于福布斯中文网</a></div>
			  <div class=bottom-title2><a href="">新闻动态</a></div>
			  <div class=bottom-title2><a href="">广告合作</a></div>
			  <div class=bottom-title2><a href="">诚聘英才</a></div>
			  <div class=bottom-title2><a href="">友情链接</a></div>
			  <div class=bottom-title2><a href="">会员活动</a></div>
			  <div class=bottom-title2><a href="">隐私声明</a></div>
			  <div class=bottom-title2><a href="">网站申明</a></div>
			  <div class=bottom-title2><a href="">联系我们</a></div>
			  <div class=bottom-title2><a href="">网站地图</a></div>
	  	</div>
	  	<div id=bottom-font>Copyright © 1998-2010 Tencent lnc.All Right Reserved 福布斯公司 版权所有</div>
	  </div>
	 </div>
	</body>
</html>

<?php
	function common_login_State()
	{
		$db = get_db();
		if(($_COOKIE['name']!='')&&($_COOKIE['password']!=''))
		{
			$_SESSION['name']=$_COOKIE['name'];
			$_SESSION['password']=$_COOKIE['password'];
		}
		if(($_SESSION['name']!='')&&($_SESSION['password']!=''))
		{
			$name=$_SESSION['name'];
			$password=$_SESSION['password'];
			
			$sql = "select * from fb_yh where name = '{$name}' and password = '{$password}'";
			$record = $db->query($sql);
			if(count($record)==1)
			{
				redirect('test.php');
			}
		}
	}
?>  		