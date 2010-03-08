<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
	</head>
	<body>
<?php
    require_once('../../frame.php');

	if(empty($_POST)){
		alert('提交失败，可能是上传文件过大或发生未知错误，请检查后再提交');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	
	
	$id = $_REQUEST['id'];
	$ad = new table_class('fb_ad');
	if($id!=''){
		$ad->find($id);
		$ad->update_attributes($_POST['ad'],false);
	}else{
		$ad->update_attributes($_POST['ad'],false);
		$ad->is_adopt = 1;
		$ad->created_at = date("Y-m-d H:i:s");
	}
	if($_FILES['image']['name']!=null){
		if($_FILES['image']['size']>2000000){
			alert('上传图片不得大于2M，请重新上传 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/ad/";
		$img = $upload->handle('image','filter_pic');
		
		if($img === false){
			alert('上传图片失败 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$ad->image = "/upload/ad/{$img}";
	}
	if($_FILES['video']['name']!=null){
		var_dump($_FILES);
		if($_FILES['video']['size']>5000000){
			alert('上传视频不得大于5M，请重新上传 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/ad/";
		$vid = $upload->handle('video','filter_video');
		
		if($vid === false){
			alert('上传视频失败 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$ad->video = "/upload/ad/{$vid}";
	}
	if($_FILES['flash']['name']!=null){
		if($_FILES['flash']['size']>2000000){
			alert('上传flash不得大于2M，请重新上传 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/ad/";
		$flash = $upload->handle('flash');
		
		if($flash === false){
			alert('上传flash失败 !');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}
		$ad->flash = "/upload/ad/{$flash}";
	}
	$ad->save();
	redirect('index.php');
?>
</body>
</html>