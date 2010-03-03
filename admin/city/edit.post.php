<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
</head>
<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	
	$city = new table_class('fb_city');
	if($id!=''){
		$city->find($id);
	}
	if($_FILES['city_photo']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/city/";
		$img = $upload->handle('city_photo','filter_pic');
		
		if($img === false){
			alert('上传文件失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$city->photo = "/upload/city/{$img}";
	}
	
	if(!$city->update_attributes($_POST['city'])){
		alert('城市已存在或执行错误！');
		redirect($_SERVER['HTTP_REFERER']);
	}
	redirect('index.php');
?>
</html>