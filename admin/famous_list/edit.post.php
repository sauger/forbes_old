<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$f_bd = new table_class('fb_mrbd');
	if($id!=''){
		$f_bd->find($id);
	}
	$f_bd->update_attributes($_POST['bd'],false);
	if($_FILES['photo']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/famous_images/";
		$img = $upload->handle('photo','filter_pic');
		
		if($img === false){
			alert('上传文件失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$f_bd->zp = "/upload/famous_images/{$img}";
	}
	$f_bd->save();
	redirect('index.php');
?>