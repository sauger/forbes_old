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
			$image = new table_class('fb_life_flash');
			if($_POST['id']!=''){
				$image->find($_POST['id']);
			}else{
				$image->created_at = date("Y-m-d H:i:s");
			}
			//var_dump($_POST);
			/*if($_POST['image']['type']<>"news")
			{
				if($_FILES['image']['name']!=null){
					$upload = new upload_file_class();
					$upload->save_dir = "/upload/images/";
					$img = $upload->handle('image','filter_pic');
					
					if($img === false){
						alert('上传文件失败 !');
						redirect($_SERVER['HTTP_REFERER']);
					}
					$image->src = "/upload/images/{$img}";
					//$image->create_thumb('middle',50);
					//$image->create_thumb('small',170,70);
				}
			}*/
			if($_POST['image']['type']<>"news")
			{
				$image->update_file_attributes2('image','/life');
			}
			if($_POST['image']["priority"]==null){$image->update_attribute("priority","100");}
			$image->update_attributes($_POST['image']);
				redirect('list.php?type='.$_POST['image']['type']);
		?>
	</body>
</html>