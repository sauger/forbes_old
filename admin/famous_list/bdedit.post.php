<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$f_mrb = new table_class('fb_mrb');
	if($id!=''){
		$f_mrb->find($id);
	}
	$f_mrb->update_attributes($_POST['mrb']);
	redirect('index.php');
?>