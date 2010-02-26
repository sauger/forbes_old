<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	$f_bd = new table_class('fb_fhbd');
	if($id!=''){
		$f_bd->find($id);
	}
	
	$f_bd->update_attributes($_POST['bd'],false);
	
	if($_FILES['photo']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/rich_images/";
		$img = $upload->handle('photo','filter_pic');
		
		if($img === false){
			alert('上传文件失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$f_bd->zp = "/upload/rich_images/{$img}";
	}
	$f_bd->save();
	
	redirect("detail.php?year=".$f_bd->bd_id);
?>