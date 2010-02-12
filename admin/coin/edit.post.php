<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$coin = new table_class('fb_hbgl');
	if($id!=''){
		$coin->find($id);
	}
	$coin->update_attributes($_POST['coin'],false);
	$coin->created_at = date("Y-m-d H:i:s");
	$coin->save();
	
	redirect('index.php');
?>