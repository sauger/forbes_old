<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
		<?php 
			include("../../frame.php"); 
		?>
	</head>
	<body>
		<?php
			$video = new table_class($tb_video);
			if($_POST['id']!=''){
				$video->find($_POST['id']);
			}else{
				$video->created_at = date("Y-m-d H:i:s");
				$video->publisher = $_SESSION["admin"];
			}
			//var_dump($_POST);
			if($_POST['video']['online_url']==null){
					$upload = new upload_file_class();
					if($_FILES['image']['name']!=null){
						$upload->save_dir = "/upload/images/";
						$img = $upload->handle('image','filter_pic');
						if($img === false){
							alert('上传图片失败 !');
							redirect($_SERVER['HTTP_REFERER']);
						}
						$video->photo_url = "/upload/images/" .$img;
					}
					if($_FILES['video']['name']!=null){
						$upload->save_dir = "/upload/video/";
						$vid = $upload->handle('video','filter_video');
						if($vid === false){
							alert('上传视频失败 !');
							redirect($_SERVER['HTTP_REFERER']);
						}
						$video->video_url = "/upload/video/" .$vid;
					}
			}else{
					$upload = new upload_file_class();
					if($_FILES['image']['name']!=null){
						$upload->save_dir = "/upload/images/";
						$img = $upload->handle('image','filter_pic');
						if($img === false){
							alert('上传图片失败 !');
							redirect($_SERVER['HTTP_REFERER']);
						}
						$video->photo_url = "/upload/images/" .$img;
					}
			}
			if($_POST['video']["priority"]==null){$video->priority=100;}
			$video->update_attributes($_POST['video']);
			if($video->category_id!=''){
				redirect('video_list.php?category=' .$video->category_id);
			}else{
				redirect('video_list.php');
	
			}
		?>
	</body>
</html>