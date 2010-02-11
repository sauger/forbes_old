<?php 
	require "../../frame.php";
	$fh_id = $_POST['id'] ? $_POST['id'] : 0;
	$record = new table_class('fb_fh');
	$record1 = new table_class('fb_fh_grcf');
	$record2 = new table_class('fb_fh_gs');
	if($fh_id!=0){
		$record->find($fh_id);
	}
	$record->update_attributes($_POST['fh'],false);
	if ($_POST['fh[sr]'] == '')
	{
		$record->sr = '0000-00-00';
	}
	$record->save();
	$record1->fh_id = $fh_id;
	$record1->zc = $_POST['zc'];
	$record1->jzrq = date("Y-m-d H:i:s");
	$record1->save();
	redirect('list.php');
?>