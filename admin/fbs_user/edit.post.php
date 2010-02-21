<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$user = new table_class('fb_yh');
	if($id!=''){
		$user->find($id);
	}
	$user->password = $_POST['user']['password'];
	$user->save();
	redirect('index.php');
?>