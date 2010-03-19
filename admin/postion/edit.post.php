<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	$pid = $_POST['pid'];
	
	$postion = new table_class('fb_postion');
	if($id!=''){
		$postion->find($id);
	}else{
		$postion->page_id = '0';
	}
	if($pid!=''){
		$postion->page_id = $pid;
	}
	
	$postion->name = $_POST['name'];
	$postion->postion_limit = $_POST['postion_limit'];
	
	$postion->save();
	redirect('index.php');
?>