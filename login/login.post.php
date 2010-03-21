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
				$_SESSION["admin_user_name"] = $record[0]->name;
				$_SESSION["admin_user_id"] = $record[0]->id;
				$_SESSION["admin_nick_name"] = $record[0]->nick_name;
				$_SESSION["role_name"] = $record[0]->role_name;
				$_SESSION['role_level'] = $record[0]->role_level;
				if($last_url == '/index.php' && ($_SESSION['role_level'] == 1 || $_SESSION['role_level'])){
					$last_url = '/admin/admin.php';
				}
				if($record[0]->role_name=='author'||$record[0]->role_name=='journalist'){
					$last_url = '/admin/column/admin_column.php';
				}
				redirect($last_url);
			}else{
				
				alert("用户名或密码不对，请重新输入！");
				redirect('login.php?last_url=' . $last_url);
			}			
			
		?>
	</body>
</html>