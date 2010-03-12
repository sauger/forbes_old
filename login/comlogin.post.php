<?php
	$name=$_POST['name'];
	$password=$_POST['password'];
	include("../frame.php");
	if(strlen($name)>20 || strlen($password)>20){
		alert("用户名或密码错误");
		redirect('index.php'); 
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
			setcookie("id",$record[0]->id,time()+$limit);
			setcookie("name",$name,time()+$limit);
			setcookie("password",$_POST['password'],time()+$limit);
		}
		$_SESSION['id']=$record[0]->id;
		$_SESSION['name']=$name;
		redirect('/html/forbesuser/user.html','header');
	}
	else
	{
		alert("用户名或密码错误");
		redirect('index.php');
	}
?>