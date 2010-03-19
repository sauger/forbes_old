<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$postion = new table_class('fb_postion');
	if($id!=''){
		$postion->find($id);
	}
	$postion->category_id = $_POST['category'];
	$postion->type = "category";
	$postion->save();
	redirect('index.php');
?>