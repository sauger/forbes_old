<?php 
	session_start();
	include("../frame.php"); 
	$last_url = !empty($_REQUEST['lasturl']) ? $_POST['lasturl'] : '/admin/admin.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
	</head>
	<body>
		<?php		
			$db = get_db();
			if($_POST['nickname']=='on'){
				$sql = "select * from $tb_user where nick_name='{$_POST['login_text']}' and password='{$_POST['password_text']}'";
			}else{				
				$sql = "select * from $tb_user where name='{$_POST['login_text']}' and password='{$_POST['password_text']}'";
			}
			$record = $db->query($sql);		
			if(count($record)==1){
				$db->execute("insert into fb_user_log (user_id,datetime) values ({$record[0]->id},'".date("Y-m-d H:i:s")."')");
				
				
				$_SESSION["admin_user_name"] = $record[0]->name;
				$_SESSION["admin_user_id"] = $record[0]->id;
				$_SESSION["admin_nick_name"] = $record[0]->nick_name;
				$_SESSION["role_name"] = $record[0]->role_name;
				$db->query("select id from fb_role where name = '{$_SESSION['role_name']}'");
				$db->move_first();
				$role_id = $db->field_by_name('id');
				$rights = $db->query("select b.* from fb_role_rights a left join fb_rights b on a.rights_id = b.id where role_id = {$role_id}");
				$len = count($rights);
				for($i=0;$i<$len;$i++){
					if($rights[$i]->type == 2){
						$menu_rights["{$rights[$i]->id}"] ="{$rights[$i]->name}";
					}else{
						$system_rights["{$rights[$i]->id}"] ="{$rights[$i]->name}";
					}
				}
				$_SESSION['admin_menu_rights'] = $menu_rights;
				$_SESSION['admin_system_rights'] = $system_rights;
				$_SESSION['role_level'] = $record[0]->role_level;
				if($last_url == '/index.php'){
					$last_url = '/admin/admin.php';
				}
				redirect($last_url);
			}else{
				
				alert("用户名或密码不对，请重新输入！");
				redirect('login.php?last_url=' . $last_url);
			}			
			
		?>
	</body>
</html>