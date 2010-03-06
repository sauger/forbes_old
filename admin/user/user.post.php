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
			$user = new table_class($tb_user);
			if($_POST['id']!=''){
				$user -> find($_POST['id']);
				if($user->name!=$_POST['post']['name']){
					$db = get_db();
					$record = $db->query("select * from ".$tb_user." where name='".$_POST['post']['name']."'");
					if(count($record)==0){
						if($user->update_attributes($_POST['post'])){
							redirect('user_list.php');
						}else{
							display_error('修改用户失败');
							echo '<a href="user_list.php">返回</a>';
						}
					}else{
						alert("您注册的用户名已经存在，请重新注册！");
						redirect($_SERVER['HTTP_REFERER']);
					}
				}else{
					if($user->update_attributes($_POST['post'])){
						redirect('user_list.php');
					}else{
						display_error('修改用户失败');
						echo '<a href="user_list.php">返回</a>';
					}
				}
			}else{
				$db = get_db();
				$record = $db->query("select * from ".$tb_user." where name='".$_POST['post']['name']."'");
				if(count($record)==0){
					if($user->update_attributes($_POST['post'])){
						redirect('user_list.php');
					}else{
						display_error('修改用户失败');
						echo '<a href="user_list.php">返回</a>';
					}
				}else{
					alert("您注册的用户名已经存在，请重新注册！");
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			
			
		?>
	</body>
</html>