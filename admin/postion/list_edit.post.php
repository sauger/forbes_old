<?php 
	require "../../frame.php";
	$id = intval($_POST['id']);
	
	$position = new table_class('fb_position');
	if($id!=''){
		$position->find($id);
	}
	if($_POST['category']=='-1'){
		$position->category_id = '0';
	}else{
		$position->category_id = $_POST['category'];
	}
	
	$position->type = "category";
	$position->save();
	redirect('index.php');
?>