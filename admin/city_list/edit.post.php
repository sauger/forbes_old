<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$c_list = new table_class('fb_city_list');
	if($id!=''){
		$c_list->find($id);
	}
	$c_list->name = $_POST['name'];
	$c_list->save();
	
	for($i=0;$i<count($_POST['attr_name']);$i++){
		$list_attr = new table_class('fb_city_list_attribute');
		$list_attr->list_id = $c_list->id;
		$list_attr->name = $_POST['attr_name'][$i];
		$list_attr->priority = $_POST['attr_priority'][$i];
		$list_attr->save();
	}
	
	for($i=0;$i<count($_POST['old_id']);$i++){
		$list_attr = new table_class('fb_city_list_attribute');
		$list_attr->find($_POST['old_id'][$i]);
		$list_attr->name = $_POST['old_attr_name'][$i];
		$list_attr->priority = $_POST['old_attr_priority'][$i];
		$list_attr->save();
	}
	redirect('index.php');
?>