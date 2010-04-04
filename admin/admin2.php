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
		css_include_tag('admin2','colorbox');
		use_jquery();
		js_include_tag('jquery.cookie.js', 'pubfun','jquery.colorbox-min','admin/admin2');
		$db = get_db();
		$main_menus = $db->query("select * from fb_admin_menu where parent_id =0 order by priority asc");
		$sub_menus = $db->query("select * from fb_admin_menu where parent_id !=0 order by parent_id, priority asc");
  ?>
</head>
<body>
	<div id=ibody >
		<div id=top>
			<div id=site><?php echo $site_name; ?>后台管理</div>
			<div id=login>欢迎你：  <?php echo $_SESSION["admin_nick_name"]; ?> [<a href="/login/logout.post.php">退出</a>]</div>
		</div>
		<div id=nav1>
			<?php 
				//get the menu id and sub menu_id
				$main_menu_id = $_REQUEST['main_menu_id'] ? $_REQUEST['main_menu_id'] : $main_menus[0]->id;
				$sub_menu_id = $_REQUEST['sub_menu_id'] ? $_REQUEST['sub_menu_id'] : $sub_menus[0]->id;
				foreach($main_menus as $val){
			?>
			<div class="nav1_menu" id="menu_item_<?php echo $val->id;?>"><?php echo $val->name;?></div>
			<?php }?>		
			<input type="hidden" id="main_menu_id" value="<?php echo $main_menu_id;?>"></input>
		</div>
		<div id=nav2>
			<?php 
				foreach($sub_menus as $val){
			?>
				<div class="nav2_menu" parent_id="<?php echo $val->parent_id;?>" id="menu_item_<?php echo $val->id;?>"><a href="<?php echo $val->href;?>"><?php echo $val->name;?></a></div>
			<?php }?>
			<input type="hidden" id="sub_menu_id" value="<?php echo $sub_menu_id;?>"></input>		
		</div>
		<div id="admin_content">
		
		</div>
	</div>
</body>
</html>