<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$famous = new table_class('fb_mr');
	if($id!=''){
		$famous->find($id);
	}
	$famous->update_attributes($_POST['mr'],false);
	if($_FILES['photo']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/famous_images/";
		$img = $upload->handle('photo','filter_pic');
		
		if($img === false){
			alert('上传文件失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$famous->mr_zp = "/upload/famous_images/{$img}";
	}
	$famous->save();
	redirect('index.php');
?>