<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$postion = new table_class('fb_position');
	if($id!=''){
		$position->find($id);
	}
	$position->category_id = $_POST['category'];
	$position->type = "category";
	$position->save();
	redirect('index.php');
?>