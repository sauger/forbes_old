<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$info = new table_class('fb_yh_xx');
	if($id!=''){
		$info->find($id);
	}
	$info->update_attributes($_POST['info'],false);
	if($_FILES['tx']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/user/";
		$img = $upload->handle('tx','filter_pic');
		
		if($img === false){
			alert('上传文件失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$info->tx = "/upload/user/{$img}";
	}
	$info->save();
	redirect('index.php');
?>