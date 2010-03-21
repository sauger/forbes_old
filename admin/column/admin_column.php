<?php
	require_once('../../frame.php');
	require_role('admin');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php	
		css_include_tag('admin','colorbox');
		use_jquery();
		js_include_tag('jquery.cookie.js', 'pubfun','jquery.colorbox-min');
  ?>
</head>
<body style="background:url(/images/admin/bg.jpg) repeat-x;">
	<div id=admin_body>
		<div id=part1>
			<div id=nav style="width:360px;">欢迎你：  <?php echo $_SESSION["admin_nick_name"]; ?> [<a href="/login/logout.post.php">退出</a>]</div>
			<div id=title><?php echo $site_name; ?>后台管理</div>
		</div>
		<div id=part2>
			<div class="menu1">
				<a href="/admin/column/news_list.php" target="admin_iframe">文章管理</a>
			</div>
			<div class="menu1">
				<a href="/admin/image/image_list.php" target="admin_iframe">图片管理</a>
			</div>
			<div class="menu1">
				<a href="/admin/user/modify_user_info.php" target="admin_iframe">个人信息维护</a>
			</div>
		</div>
		<div id=part3>
		  <iframe id=admin_iframe name="admin_iframe" scrolling="yes" frameborder="0" src="/admin/column/news_list.php" width="99%" height="1000px"></iframe>
		</div>		
	</div>
</body>
</html>



