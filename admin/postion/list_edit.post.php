<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$position = new table_class('fb_position');
	if($id!=''){
		$position->find($id);
	}
	$position->category_id = $_POST['category'];
	$position->type = "category";
	$position->save();
	redirect('index.php');
?>