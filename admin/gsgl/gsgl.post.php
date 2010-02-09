<?php 
	require "../../frame.php";
	$gs_id = $_POST['id'] ? $_POST['id'] : 0;
	//var_dump($_POST);
	//exit;
	$record = new table_class('fb_gs');
	if($gs_id!=0){
		$record->find($gs_id);
	}
	$record->mc = $_POST['gs_mc'];
	$record->sf = $_POST['gs_sf'];
	$record->cs = $_POST['gs_cs'];
	$record->dz = $_POST['gs_dz'];
	$record->wz = $_POST['gs_wz'];
	$record->js = $_POST['gs_js'];
	$record->ssdm = $_POST['gs_ssdm'];
	$record->save();
	redirect('gsgl_list.php');
?>