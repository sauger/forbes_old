<?php 
	require "../../frame.php";
	$id = intval($_POST['id']);
	$pid = intval($_POST['pid']);
	
	$position = new table_class('fb_position');
	if($id!=''){
		$position->find($id);
	}else{
		$position->page_id = '0';
	}
	if($pid!=''){
		$position->page_id = $pid;
	}
	
	$position->name = $_POST['name'];
	$position->position_limit = $_POST['position_limit'];
	$position->type = $_POST['type'];
	
	$position->save();
	redirect('index.php');
?>