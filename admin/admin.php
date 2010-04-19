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
		css_include_tag('admin','colorbox');
		use_jquery();
		js_include_tag('jquery.colorbox-min.js');
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
				if($_SESSION['admin_menu_rights']){
					$sub_menu_ids = implode(',',$_SESSION['admin_menu_rights']);
					$sub_menus = $db->query("select * from fb_admin_menu where id in({$sub_menu_ids}) order by parent_id, priority asc");
				}
				$main_menus = $db->query("select * from fb_admin_menu where parent_id =0 order by priority asc");
				$main_menu_id = $_REQUEST['main_menu_id'] ? $_REQUEST['main_menu_id'] : $main_menus[0]->id;
				$sub_menu_id = $_REQUEST['sub_menu_id'] ? $_REQUEST['sub_menu_id'] : $sub_menus[0]->id;
				$i=0;
				$j=0;
				foreach($main_menus as $val){
			?>
			<div class="nav1_menu <?php if($i==0){echo 'selected'; $j=$val->id;}?>" param_id="<?php echo $val->id;?>"><?php echo $val->name;?></div>
			<?php 
				$i++;
				}
			?>		
		</div>
		<div id=nav2>
			<?php 
				foreach($sub_menus as $val){	
			?>
			<div class="nav2_menu nav2_menu_<?php echo $val->parent_id;?>" <?php if($j==$val->parent_id){echo 'style="display:inline"';}?> param_href="<?php echo $val->href;?>"><a href="<?php echo $val->href;?>" target="<?php echo $val->target;?>"><?php echo $val->name;?></a></div>
			<?php 
				}
			?>
			<div id=nav2_index><a href="/index.php" target="_blank">动态首页</a></div>
		</div>
		<div id="admin_content">
		  <iframe id=admin_iframe name="admin_iframe" scrolling="auto" frameborder="0" src="/admin/welcome.php" width="1046" height="1300px"></iframe>
		</div>
	</div>
</body>
<script>
$(function(){
	$(".nav1_menu").each(function(){
		if($('div .nav2_menu_' + $(this).attr('param_id')).length <= 0){
			$(this).remove();
		}
	});
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