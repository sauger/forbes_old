<?php 
	require "../../frame.php";
	$record = new table_class('fb_fh_gs');
	$record->fh_xm = $_GET['xm'];
	$record->gs_mc = $_GET['mc'];
	$record->save();
	redirect('edit.php?id='.$id.'');
?>