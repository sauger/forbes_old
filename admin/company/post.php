<?php 
	require "../../frame.php";
	$gs_id = $_POST['id'] ? $_POST['id'] : 0;
	$record = new table_class('fb_gs');
	if($gs_id!=0){
		$record->find($gs_id);
	}
	$record->update_attributes($_POST['gs']);
	redirect('list.php');
?>