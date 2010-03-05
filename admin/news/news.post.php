<?php 
	require "../../frame.php";
	$news_id = $_POST['id'] ? $_POST['id'] : 0;
	//var_dump($_POST);
	//exit;
	$news = new table_class($tb_news);
	if($news_id!=0){
		$news->find($news_id);
	}
	
	$news->update_attributes($_POST['news'],false);
	$news->is_adopt = 1;
	$news->content = str_replace("'",'\"',$news->content); //mysql_escape_string($news->content);
	$news->description = str_replace("'",'\"',$news->description);//$news->description = mysql_escape_string($news->description);
	$news->keywords = str_replace('　',' ',$news->keywords);
	$news->top_info = str_replace("'",'\"',$news->top_info);
	
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
		//if it has english new, should update the english news's category_id, news_type and so on.
		$db = get_db();
		$db->query("select english_news_id from fb_news_relationship where chinese_news_id={$news->id}");
		
		if($db->move_first()){
			$e_id = $db->field_by_index(0);
			$english_news = new table_class($tb_news);
			$english_news->find($e_id);
			$english_news->category_id = $news->category_id;
			$english_news->news_type = $news->news_type;
			$english_news->save();
		}
	}
	
	redirect('news_list.php?category='.$_POST['news']['category_id']);
	#var_dump($news);
	
?>