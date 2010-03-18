<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$f_mrb = new table_class('fb_fhb');
	if($id!=''){
		$f_mrb->find($id);
	}
	$f_mrb->update_attributes($_POST['fhb'],false);
	if($_FILES['image_src']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		if(!$upload_name = $upload->handle('image_src','filter_pic')){
			alert('上传图片失败！');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		};		
		$f_mrb->image_src = '/upload/news/' .$upload_name;		
	}
	$f_mrb->save();
	redirect('index.php');
?>