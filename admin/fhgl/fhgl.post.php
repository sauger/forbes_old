<?php 
	require "../../frame.php";
	$fh_id = $_POST['id'] ? $_POST['id'] : 0;
	//var_dump($_POST);
	//exit;
	$record = new table_class('fb_fh');
	if($fh_id!=0){
		$record->find($fh_id);
	}
	$record->xm = $_POST['fh_xm'];
	$record->xb = $_POST['fh_xb'];
	$record->sr = $_POST['fh_sr'];
	$record->grjl = $_POST['fh_grjl'];
	$record->save();
	redirect('fhgl_list.php');
?>