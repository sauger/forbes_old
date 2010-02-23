<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$industry = new table_class('fb_industry');
	if($id!=''){
		$industry->find($id);
	}
	$industry->name = $_POST['name'];
	$industry->save();
	redirect('index.php');
?>