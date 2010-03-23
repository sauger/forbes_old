<?php 
	require "../../frame.php";
	$news_id = $_POST['id'] ? $_POST['id'] : 0;
	$news = new table_class('fb_file_list_items');
	if($news_id!=0){
		$news->find($news_id);
	}
	$old_pdf_src = $news->pdf_src;
	$old_video_photo_src = $news->video_photo_src;
	$news->update_attributes($_POST['news'],false);
	$news->is_adopt = 1;
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
	
	if($_FILES['pdf_src']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		if(!$upload_name = $upload->handle('pdf_src','filter_pdf')){
			alert('上传PDF失败！');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		};		
		$news->pdf_src = '/upload/news/' .$upload_name;		
	}
	if($_FILES['news_pic']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		$news->video_photo_src = '/upload/news/' .$upload->handle('news_pic','filter_pic');
	}
	if($_FILES['author_image']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		$news->author_image = '/upload/news/' .$upload->handle('author_image','filter_pic');
	}
	$table_change = array('<p>'=>'');
	$table_change += array('</p>'=>'');
	$news->title = strtr($news->title,$table_change);
	$news->short_title = strtr($news->short_title,$table_change);	
	$news->news_type= 1;
	if($news_id == ''){
		//insert news
		$news->created_at = date("Y-m-d H:i:s");
		$news->last_edited_at = date("Y-m-d H:i:s");
		$news->publisher_id = $_SESSION['admin_user_id'];
		$news->click_count = 0;					
		$news->is_adopt = 1;
		$news->save();
	}else{
		//update news
		$news->last_edited_at = date("Y-m-d H:i:s");
		$news->save();
		if($old_pdf_src && $old_pdf_src != $news->pdf_src){
			unlink(ROOT_DIR .$old_pdf_src);
		}
		
		if($old_video_photo_src && $old_video_photo_src != $news->video_photo_src){
			unlink(ROOT_DIR .$old_video_photo_src);
		}
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
	
	if($_POST['copy_news']){
		$news->id = 0;
		$news->category_id = intval($_POST['copy_news']);
		$news->save();
	}
	if($_SESSION["role_name"]=='author'||$_SESSION["role_name"]=='journalist')$href="/admin/column/news_list.php";else $href="news_list.php";
	redirect('file_list_items_list.php?id='.$news->list_id);
	#var_dump($news);
	
?>