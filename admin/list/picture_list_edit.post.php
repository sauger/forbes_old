<?php 
include '../../frame.php';
$post_type = intval($_POST['mlist']['list_type']);
$id = intval($_POST['id']);
$list_type = new table_class('fb_custom_list_type');
if($id){
	$list_type->find($id);	
}
$list_type->update_attributes($_POST['mlist'],false);
$list_type->table_name = 'fb_picture_list_items';
if($_FILES['image_src']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		if(!$upload_name = $upload->handle('image_src','filter_pic')){
			alert('上传图片失败！');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		};		
		$list_type->image_src = '/upload/news/' .$upload_name;		
	}
$list_type->save();
redirect('picture_list_list.php');