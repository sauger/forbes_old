<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$f_mrb = new table_class('fb_fhb');
	if($id!=''){
		$f_mrb->find($id);
	}
	$f_mrb->update_attributes($_POST['fhb']);
	redirect('index.php');
?>