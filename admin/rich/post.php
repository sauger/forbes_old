<?php 
	require "../../frame.php";
	#var_dump($_POST);
	$rich = new table_class('fb_rich');
	$id = intval($_POST['id']);
	if($id){
		$rich->find($id);
	}
	$rich->update_file_attributes('fh');
	$rich->update_attributes($_POST['fh']);
	redirect('list.php');
		
?>