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
		js_include_tag('jquery.colorbox-min');
  ?>
</head>
<body style="background:url(/images/admin/bg.jpg);">
<div id=ibody>
		<div id=top>
			<div id=site><?php echo $site_name; ?>后台管理</div>
			<div id=login>欢迎你：  <?php echo $_SESSION["admin_nick_name"]; ?> [<a href="/login/logout.post.php">退出</a>]</div>
		</div>
		<?php if($_SESSION['role_name'] == 'lister'){?>
		<div id=nav1>
			<div class="nav1_menu" param_id="1">内容管理</div>
			<div class="nav1_menu" param_id="2">榜单管理</div>
			<div class="nav1_menu" param_id="3"  param_href="/admin/user/modify_user_info.php">个人信息</div>
		</div>
		<div id=nav2>
			<div class="nav2_menu nav2_menu_1"><a href="/admin/company/list.php" target="admin_iframe" style="color:#0000ff">公司管理</a></div>
			<div class="nav2_menu nav2_menu_1"><a href="/admin/rich/list.php" target="admin_iframe" style="color:#0000ff">富豪管理</a></div>
			<div class="nav2_menu nav2_menu_2"><a href="/admin/list/" target="admin_iframe" style="color:#0000ff">常规榜单管理</a></div>
			<div class="nav2_menu nav2_menu_2"><a href="/admin/list/picture_list_list.php" target="admin_iframe" style="color:#0000ff">图片榜单管理</a></div>
			<div class="nav2_menu nav2_menu_2"><a href="/admin/list/file_list_list.php" target="admin_iframe" style="color:#0000ff">文件榜单管理</a></div>
			<div class="nav2_menu nav2_menu_3"><a href="/admin/user/modify_user_info.php" target="admin_iframe" style="color:#0000ff">编辑个人信息</a></div>
			<div id=nav2_index><a href="/index.php" target="_blank">动态首页</a></div>
		</div>
		<div id="admin_content">
		  <iframe id=admin_iframe name="admin_iframe" scrolling="no" frameborder="0" src="/admin/list/" width="1046" height="1300px"></iframe>
		</div>
		

		<?php }else{?>
		<div id=nav1>
			<div class="nav1_menu" param_id="1">内容管理</div>
			<div class="nav1_menu" param_id="2">榜单管理</div>
			<?php 
			if($_SESSION['admin_user_name'] == 'editor1' or $_SESSION['admin_user_name'] == 'editor2' or $_SESSION['admin_user_name'] == 'editor3'){
			?>
			<div class="nav1_menu" param_id="24">页面管理</div>
			<?php }?>
			<div class="nav1_menu" param_id="3"  param_href="/admin/user/modify_user_info.php">个人信息</div>
		</div>
		<div id=nav2>
			<?php 
				if($_SESSION['admin_user_name'] == 'editor1' or $_SESSION['admin_user_name'] == 'editor2' or $_SESSION['admin_user_name'] == 'editor3'){
					$news_list = "/admin/news/news_list.php";
				}else{
					$news_list = "/admin/column/news_list.php";
				}
			?>
			<div class="nav2_menu nav2_menu_1"><a href="<?php echo $news_list;?>" target="admin_iframe" style="color:#0000ff">文章管理</a></div>
			<div class="nav2_menu nav2_menu_1"><a href="/admin/image/image_list.php" target="admin_iframe" style="color:#0000ff">图片管理</a></div>
			<div class="nav2_menu nav2_menu_1"><a href="/admin/company/list.php" target="admin_iframe" style="color:#0000ff">公司管理</a></div>
			<div class="nav2_menu nav2_menu_1"><a href="/admin/rich/list.php" target="admin_iframe" style="color:#0000ff">富豪管理</a></div>
			<div class="nav2_menu nav2_menu_1"><a href="/admin/filte_words/list.php" target="admin_iframe" style="color:#0000ff">敏感词管理</a></div>
			<div class="nav2_menu nav2_menu_2"><a href="/admin/list/" target="admin_iframe" style="color:#0000ff">常规榜单管理</a></div>
			<div class="nav2_menu nav2_menu_2"><a href="/admin/list/picture_list_list.php" target="admin_iframe" style="color:#0000ff">图片榜单管理</a></div>
			<div class="nav2_menu nav2_menu_2"><a href="/admin/list/file_list_list.php" target="admin_iframe" style="color:#0000ff">文件榜单管理</a></div>
			<div class="nav2_menu nav2_menu_3"><a href="/admin/user/modify_user_info.php" target="admin_iframe" style="color:#0000ff">编辑个人信息</a></div>
			<?php 
			if($_SESSION['admin_user_name'] == 'editor1' or $_SESSION['admin_user_name'] == 'editor2' or $_SESSION['admin_user_name'] == 'editor3'){
			?>
			<div class="nav2_menu nav2_menu_24" param_href="/admin/position/page.php?page=index"><a href="/admin/position/page.php?page=index" target="admin_iframe" style="color:#0000ff">网站首页</a></div>
			<div class="nav2_menu nav2_menu_24" param_href="/admin/position/page.php?page=list/index"><a href="/admin/position/page.php?page=list/index" target="admin_iframe" style="color:#0000ff">榜单首页</a></div>
			<div class="nav2_menu nav2_menu_24" param_href="/admin/position/page.php?page=billinaires/index"><a href="/admin/position/page.php?page=billinaires/index" target="admin_iframe" style="color:#0000ff">富豪首页</a></div>
			<div class="nav2_menu nav2_menu_24" param_href="/admin/position/page.php?page=investment/index"><a href="/admin/position/page.php?page=investment/index" target="admin_iframe" style="color:#0000ff">投资首页</a></div>
			<div class="nav2_menu nav2_menu_24" param_href="/admin/position/page.php?page=initiate/index"><a href="/admin/position/page.php?page=initiate/index" target="admin_iframe" style="color:#0000ff">创业首页</a></div>
			<div class="nav2_menu nav2_menu_24" param_href="/admin/position/page.php?page=business/index"><a href="/admin/position/page.php?page=business/index" target="admin_iframe" style="color:#0000ff">商业首页</a></div>
			<div class="nav2_menu nav2_menu_24" param_href="/admin/position/page.php?page=tech/index"><a href="/admin/position/page.php?page=tech/index" target="admin_iframe" style="color:#0000ff">科技首页</a></div>
			<div class="nav2_menu nav2_menu_24" param_href="/admin/position/page.php?page=city/index"><a href="/admin/position/page.php?page=city/index" target="admin_iframe" style="color:#0000ff">城市首页</a></div>
			<?php }?>
			<div id=nav2_index><a href="/index.php" target="_blank">动态首页</a></div>
		</div>
		<div id="admin_content">
		  <iframe id=admin_iframe name="admin_iframe" scrolling="no" frameborder="0" src="<?php echo $news_list;?>" width="1046" height="1300px"></iframe>
		</div>
		<?php }?>
</div>
</body>
<script>
$(function(){
	$(".nav1_menu").click(function(e){
		 $(".nav1_menu").removeClass('selected');
		 $(this).addClass('selected');

		 $(".nav2_menu").hide();
		 $(".nav2_menu").css("color","#0000ff");
		 
		 var param_id=$(this).attr("param_id");
		 $(".nav2_menu_"+param_id).show();
	});

	$(".nav2_menu a").click(function(e){
		 $(".nav2_menu a").css("color","#0000ff");
		 $(this).css("color","#ff0000");
	});
});
</script>
</html>