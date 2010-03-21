<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
</head>
</html>
<?php
include '../../frame.php';
$user = new table_class('fb_user');
$user = $user->find($_SESSION['admin_user_id']);
if($_POST['new_password']){
	if($_POST['old_password'] != $user->password){
		alert('原有密码错误！请重新输入！');
		redirect('modify_user_info.php');
		die();
	}
	$user->password = $_POST['new_password'];
	$changed = true;	
}
if($_FILES['image_src']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		$user->image_src = '/upload/news/' .$upload->handle('image_src','filter_pic');
		$changed = true;
}

if($_POST['description']!=$user->description){
	$user->description = $_POST['description'];
	$changed = true;
}


if($changed){
	if($user->save()){
		alert('修改成功！');
	}else{
		alert('修改失败！');
	};
	
}
redirect('modify_user_info.php');
