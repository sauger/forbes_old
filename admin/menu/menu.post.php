<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
		<?php 
			include("../../frame.php"); 
		?>
	</head>
	<body>
		<?php		
			$menu = new table_class($tb_menu);
			if($_POST['id']){
				$menu->find($_POST['id']);
			}
			$menu->update_attributes($_POST['post'],false);
			if($menu->parent_id){
				$p_menu = new table_class($tb_menu);
				$p_menu->find($menu->parent_id);
				$menu->role_level = $p_menu->role_level;
			}			
			if($menu->save()){
				//update the rights table
				if($menu->parent_id > 0){
					$right = new table_class('fb_rights');
					$right->find('first',array('conditions' => "name='{$menu->id}' and type=2"));
					$right->name = $menu->id;
					$right->type = 2;
					$right->nick_name = $menu->name;
					$right->save();
				}
				redirect('menu_list.php');
			}else{
				display_error('修改菜单失败');
				echo '<a href="menu_list.php">返回</a>';
			}
			
			
		?>
	</body>
</html>