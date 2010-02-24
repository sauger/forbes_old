<?php
	$name=$_POST['name'];
	$password=$_POST['password'];
	include("../frame.php");
	session_start();
	$db = get_db();
	$sql = "select * from fb_yh where name = '{$name}' and password = '{$password}'";
	$record = $db->query($sql);
	if(count($record)==1)
	{
		if($_POST['time']!='')
		{
			$limit=$_POST['time']*3600*24;
			setcookie("id",$record[0]->id,time()+$limit);
			setcookie("name",$name,time()+$limit);
			setcookie("password",$password,time()+$limit);
		}
		$_SESSION['id']=$record[0]->id;
		$_SESSION['name']=$name;
		$_SESSION['password']=$password;
		redirect('test.php');
	}
	else
	{
		alert("用户名或密码错误");
		redirect('comlogin.php');
	}
?>