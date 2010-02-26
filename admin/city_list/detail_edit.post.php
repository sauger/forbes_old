<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	if($id!=''){
		for($i=0;$i<count($_POST['old_attr_value']);$i++){
			$content = new table_class('fb_city_list_content');
			$content->find($_POST['content_id'][$i]);
			$content->city_id = $_POST['city_id'];
			$content->value = $_POST['old_attr_value'][$i];
			$content->save();
		}
		for($i=0;$i<count($_POST['attr_id']);$i++){
			$content = new table_class('fb_city_list_content');
			$content->city_id = $_POST['city_id'];
			$content->list_id = $_POST['list_id'];
			$content->attribute_id = $_POST['attr_id'][$i];
			$content->value = $_POST['attr_value'][$i];
			$content->save();
		}
	}else{
		$content = new table_class('fb_city_list_content');
		$content->city_id = $_POST['city_id'];
		$content->list_id = $_POST['list_id'];
		$content->save();
		for($i=0;$i<count($_POST['attr_value']);$i++){
			$content = new table_class('fb_city_list_content');
			$content->city_id = $_POST['city_id'];
			$content->list_id = $_POST['list_id'];
			$content->attribute_id = $_POST['attr_id'][$i];
			$content->value = $_POST['attr_value'][$i];
			$content->save();
		}
	}
	
	redirect('detail.php?id='.$_POST['list_id']);
?>

