<?php 
	require "../../frame.php";
	$fh_id = $_POST['id'] ? $_POST['id'] : 0;
	$record = new table_class('fb_fh');
	if($fh_id!=0){
		$record->find($fh_id);
	}
	$record->update_attributes($_POST['fh'],false);
	if ($_POST['fh[sr]'] == '')
	{
		$record->sr = '0000-00-00';
	}
	$record->save();
	redirect('list.php');
?>