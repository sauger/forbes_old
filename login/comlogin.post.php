<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	</head>
	<body>
<?php
	if($_SESSION['login']!=$_POST['session']){
		die();
	}
	$name=$_POST['name'];
	$password=$_POST['password'];
	include("../frame.php");
	$suess_url =   $_POST['last_url'] ? $_POST['last_url'] :'/user/user_info.php';
	$fail_url = $_POST['last_url'] ?"index.php?last_url=" .$_POST['last_url'] :"index.php";
	if(strlen($name)>20 || strlen($password)>20){
		alert("用户名或密码错误");
		redirect($fail_url); 
	}
	$password = md5($password);
	$db = get_db();
	$sql = "select * from fb_yh where name = '{$name}' and password = '{$password}'";
	$record = $db->query($sql);
	if($db->record_count==1)
	{
		if($_POST['time']!='')
		{
			$limit=$_POST['time']*3600*24;
			setcookie("name",$name,time()+$limit,'/');
			setcookie("password",$_POST['password'],time()+$limit,'/');
		}
		$_SESSION['user_id']=$record[0]->id;
		$_SESSION['name']=$name;
		$db->execute("insert into fb_yh_log (yh_id,time) values ({$_SESSION['user_id']},now())");
		$last_url = $suess_url;
		redirect($last_url);
	}
	else
	{
		alert("用户名或密码错误");
		redirect($fail_url);
	}
?>
	</body>
</html>