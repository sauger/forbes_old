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
			<div class="nav1_menu"  param_href="/admin/column/news_list.php">文章管理</div>
			<div class="nav1_menu"  param_href="/admin/image/image_list.php">图片管理</div>
			<div class="nav1_menu"  param_href="/admin/list/">常规榜单</div>
			<div class="nav1_menu"  param_href="/admin/list/picture_list_list.php">图片榜单</div>
			<div class="nav1_menu"  param_href="/admin/list/file_list_list.php">文章榜单</div>
			<div class="nav1_menu"  param_href="/admin/company/list.php">公司管理</div>
			<div class="nav1_menu"  param_href="/admin/rich/list.php">富豪管理</div>
			<div class="nav1_menu"  param_href="/admin/filte_words/list.php">敏感词</div>
			<div class="nav1_menu"  param_href="/admin/user/modify_user_info.php">个人信息</div>
		</div>
		<div id="admin_content">
		  <iframe id=admin_iframe name="admin_iframe" scrolling="no" frameborder="0" src="/admin/column/news_list.php" width="1046" height="1200px"></iframe>
		</div>
</div>
</body>
</html>
<script>
$(function(){
	$(".nav1_menu").click(function(e){
		 $(".nav1_menu").css("font-weight","normal");
		 $(".nav1_menu").css("border-left","1px solid #ffffff");
		 $(".nav1_menu").css("border-right","1px solid #d8d8d8");
		 $(".nav1_menu").css("background","#f0f0f0");

		 $(this).css("font-weight","bold");
		 $(this).css("border-left","1px solid #E7EDDF");
		 $(this).css("border-right","1px solid #E7EDDF");
		 $(this).css("background","#E7EDDF");

		 var param_href=$(this).attr("param_href");
		 $("#admin_iframe").attr("src",param_href);

	});


	
	

});
</script>


