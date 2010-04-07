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
		css_include_tag('admin');
		use_jquery();
  ?>
</head>
<body style="background:url(/images/admin/bg.jpg);">
<div id=ibody>
		<div id=top>
			<div id=site><?php echo $site_name; ?>后台管理</div>
			<div id=login>欢迎你：  <?php echo $_SESSION["admin_nick_name"]; ?> [<a href="/login/logout.post.php">退出</a>]</div>
		</div>
		<div id=nav1>
			<div class="nav1_menu">
				<a href="/admin/column/news_list.php" target="admin_iframe">文章管理</a>
			</div>
			<div class="nav1_menu">
				<a href="/admin/image/image_list.php" target="admin_iframe">图片管理</a>
			</div>
			<div class="nav1_menu">
				<a href="/admin/list/picture_list_list.php" target="admin_iframe">常规榜单管理</a>
			</div>
			<div class="nav1_menu">
				<a href="/admin/list/file_list_list.php" target="admin_iframe">图片榜单管理</a>
			</div>
			<div class="nav1_menu">
				<a href="/admin/list" target="admin_iframe">文章榜单管理</a>
			</div>
			<div class="nav1_menu">
				<a href="/admin/company/list.php" target="admin_iframe">公司管理</a>
			</div>
			<div class="nav1_menu">
				<a href="/admin/rich/list.php" target="admin_iframe">富豪管理</a>
			</div>
			<div class="nav1_menu">
				<a href="/admin/filte_words/list.php" target="admin_iframe">敏感词管理</a>
			</div>
			<div class="nav1_menu">
				<a href="/admin/user/modify_user_info.php" target="admin_iframe">个人信息维护</a>
			</div>
		</div>
		<div id="admin_content">
		  <iframe id=admin_iframe name="admin_iframe" scrolling="no" frameborder="0" src="/admin/column/news_list.php" width="996" height="1200px"></iframe>
		</div>
</div>
</body>
</html>



