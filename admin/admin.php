<?php
	require_once('../frame.php');
	require_role('admin');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>Manage : Forbeschina</title>
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
			<?php 
				$db = get_db();
				$main_menus = $db->query("select * from fb_admin_menu where parent_id =0 order by priority asc");
				$sub_menus = $db->query("select * from fb_admin_menu where parent_id !=0 order by parent_id, priority asc");
				$main_menu_id = $_REQUEST['main_menu_id'] ? $_REQUEST['main_menu_id'] : $main_menus[0]->id;
				$sub_menu_id = $_REQUEST['sub_menu_id'] ? $_REQUEST['sub_menu_id'] : $sub_menus[0]->id;
				foreach($main_menus as $val){
			?>
			<div class="nav1_menu" param_id="<?php echo $val->id;?>" param_href="<?php echo $val->href;?>" param_target="<?php echo $val->target;?>"><?php echo $val->name;?></div>
			<?php }?>		
		</div>
		<div id=nav2>
			<?php foreach($sub_menus as $val){	?>
			<div class="nav2_menu nav2_menu_<?php echo $val->parent_id;?>" param_href="<?php echo $val->href;?>"><?php echo $val->name;?></div>
			<?php }?>
		</div>
		<div id="admin_content">
		  <iframe id=admin_iframe name="admin_iframe" scrolling="no" frameborder="0" src="/admin/news/news_list.php" width="996" height="1200px"></iframe>
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

		 $("#nav2").hide();
		 $(".nav2_menu").hide();
		 
		 var param_id=$(this).attr("param_id");
		 var param_href=$(this).attr("param_href");
		 var param_target=$(this).attr("param_target");

		 if(param_target=="#")
		 {
			 $("#nav2").show();
			 $(".nav2_menu_"+param_id).show();
	 	
		 };
		 
		 if(param_target!="#")
		 {
			 $("#admin_iframe").attr("src",param_href);
	 	
		 };
	});

	$(".nav2_menu").click(function(e){
		 $(".nav2_menu").css("color","#0000ff");
		 $(this).css("color","#ff0000");

		 var param_href=$(this).attr("param_href");

		 $("#admin_iframe").attr("src",param_href);

	});
	
	

});
</script>
