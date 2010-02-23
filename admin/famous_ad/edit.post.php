<?php 
	require "../../frame.php";
	
	//var_dump($_FILES);
	//var_dump($_POST);
	
	if($_FILES['photo']['name']!=''){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/famous_ad/";
		$img = $upload->handle('photo','filter_pic');
	}
	//var_dump($img);
	for($i=0;$i<count($_POST['title']);$i++){
		if($_POST['title'][$i]!=''){
			$famous = new table_class('fb_famous_ad');
			$famous->title = $_POST['title'][$i];
			$famous->famous_id = $_POST['id'];
			if($_FILES['photo']['name'][$i]!=''){
				if($img[$i]['result'] === false){
					alert('上传照片'.($i+1).'失败!');
					redirect($_SERVER['HTTP_REFERER']);
				}
				$famous->photo = "/upload/famous_ad/" .$img[$i]['name'];
			}
			$famous->save();		
		}
	}
	//var_dump($_FILES);
	if($_FILES['old_photo']['name']!=''){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/famous_ad/";
		$o_img = $upload->handle('old_photo','filter_pic');
	}
	//var_dump($o_img);
	for($i=0;$i<count($_POST['old_title']);$i++){
		if($_POST['old_title'][$i]!=''){
			$famous = new table_class('fb_famous_ad');
			$famous->find($_POST['old_id'][$i]);
			$famous->title = $_POST['old_title'][$i];
			if($_FILES['old_photo']['name'][$i]!=''){
				if($o_img[$i]['result'] === false){
					alert('上传照片'.($i+1).'失败!');
					redirect($_SERVER['HTTP_REFERER']);
				}
				$famous->photo = "/upload/famous_ad/" .$o_img[$i]['name'];
			}
			$famous->save();		
		}
	}
	redirect('/admin/famous/index.php');
?>