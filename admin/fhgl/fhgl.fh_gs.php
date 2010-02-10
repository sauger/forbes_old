<?php 
	require "../../frame.php";
	$id = $_GET['id'];
	$record = new table_class('fb_fh_gs');
	$record->fh_xm = $_GET['xm'];
	$record->gs_mc = $_GET['mc'];
	$record->save();
	redirect('fhgl_edit.php?id='.$id.'');
?>