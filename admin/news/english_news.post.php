<?php 
	require "../../frame.php";
	$news_id = $_POST['id'] ? $_POST['id'] : 0;
	$ch_id = $_POST['chinese_id'];
	if(!$ch_id){
		alert('invalid post!');
		die();
	}
	#var_dump($_POST);
	#exit;
	$news = new table_class($tb_news);
	if($news_id!=0){
		$news->find($news_id);
	}else{
		$news->language_tag = 1;
	}
	
	$news->update_attributes($_POST['news'],false);
	$news->is_adopt = 1;
	$news->content = str_replace("'",'\"',$news->content); //mysql_escape_string($news->content);
	$news->description = str_replace("'",'\"',$news->description);//$news->description = mysql_escape_string($news->description);
	$news->top_info = str_replace("'",'\"',$news->top_info);
	$news->keywords = str_replace('　',' ',$news->keywords);
	
	$pos = strpos(strtolower($news->content), '<img ');
	if($pos !== false){
		$pos_end = strpos(strtolower($news->content), '>',$pos);
		$imgstr = substr($news->content, $pos,$pos_end -$pos +1);
		#alert($pos_end .';'.$imgstr);
		$imgstr = str_replace('\"', '"', $imgstr);
		$pos = strpos($imgstr, 'src="');
		$pos_end = strpos($imgstr, '"',$pos + 5);
		$src = substr($imgstr, $pos+5,$pos_end - $pos - 5);
		$news->photo_src = $src;
		$news->is_photo_news = 1;
	}else{
		$news->is_photo_news = 0;
		$news->photo_src = "";
	}
	if ($news->priority == ""){
		$news->priority = 100;
	}
	
	if($_FILES['video_src']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/video/';
		$upload_name = $upload->handle('video_src','filter_video');
		$news->video_src = '/upload/video/' .$upload_name;		
		$news->video_flag = 1;		
	}
	if($_FILES['video_pic']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/video/';
		$news->video_photo_src = '/upload/video/' .$upload->handle('video_pic','filter_pic');
	}
	
	if($_FILES['file_name']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/file/';
		$upload_name = $upload->handle('file_name');
		$news->file_name = '/upload/file/' .$upload_name;	
	}
	$table_change = array('<p>'=>'');
	$table_change += array('</p>'=>'');
		
	if($news_id == ''){
		//insert news
		$news->created_at = date("Y-m-d H:i:s");
		$news->last_edited_at = date("Y-m-d H:i:s");
		$news->publisher_id = $_SESSION['admin'];
		$news->click_count = 0;					
		$news->is_adopt = 1;
		$news->save();
	}else{
		//update news
		$news->last_edited_at = date("Y-m-d H:i:s");
		$news->save();
	}
	
	if(empty($news_id)){
		$db = get_db();
		$db->execute("insert into fb_news_relationship (chinese_news_id,english_news_id) values ('$ch_id','{$news->id}')");
	}
	
	redirect('news_edit.php?id='.$news->id);
	#var_dump($news);
	
?>