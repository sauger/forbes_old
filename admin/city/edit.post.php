<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$city = new table_class('fb_city');
	if($id!=''){
		$city->find($id);
	}
	$city->update_attributes($_POST['city']);
	redirect('index.php');
?>