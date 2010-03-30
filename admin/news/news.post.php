<?php 
	require "../../frame.php";
	$news_id = $_POST['id'] ? $_POST['id'] : 0;
	$news = new table_class($tb_news);
	if($news_id!=0){
		$news->find($news_id);
	}
	$old_pdf_src = $news->pdf_src;
	$old_video_photo_src = $news->video_photo_src;
	$news->update_attributes($_POST['news'],false);
	#var_dump($news);	
	/*
	$news->content = str_replace("'",'\"',$news->content); //mysql_escape_string($news->content);
	$news->description = str_replace("'",'\"',$news->description);//$news->description = mysql_escape_string($news->description);
	$news->keywords = str_replace('　',' ',$news->keywords);
	$news->top_info = str_replace("'",'\"',$news->top_info);
	*/
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
		$news->publisher = $_SESSION['admin_user_id'];
		$news->click_count = 0;					
		$news->save();
	}else{
		//update news
		if(!$news->publisher){
			$news->publisher = $_SESSION['admin_user_id'];			
		}
		$news->publisher = $_SESSION['admin_user_id'];
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
	if(isset($_POST['publish_schedule_date'])){
		$schedule = new table_class('fb_publish_schedule');
		if($id){
			$schedule->find_by_resource_id($id);
		}
		if($_POST['publish_schedule_date']){
			$schedule->publish_date = $_POST['publish_schedule_date'];
			$schedule->resource_id = $news->id;
			$schedule->resource_type= 'news';
			$schedule->save();
		}else{
			if($schedule->id){
				$schedule->delete();
			}
		}
	}
	$db->query("select group_concat(a.industry_id SEPARATOR ',') as ids from fb_news_industry a left join fb_industry b on a.industry_id = b.id where a.news_id={$news->id}");
	if($db->move_first()){
		$news_industry = $db->field_by_name('ids');
	}
	$news_industry = explode(',',$news_industry);
	$selected_industry = explode(',',$_POST['related_industry']);
	$new_in = array_diff($selected_industry,$news_industry);
	if(!empty($new_in)){
		foreach ($new_in as $in) {
			if(!empty($in)){
				$db->execute("insert into fb_news_industry (news_id,industry_id) values({$news->id},{$in})");				
			}
		}
	}
	$delete_in = array_diff($news_industry,$selected_industry);
	if(!empty($delete_in)){
		$delete_ids = implode(',',$delete_in);
		if(!empty($delete_ids)){
			$db->execute("delete from fb_news_industry where industry_id in ({$delete_ids}) and news_id={$news_id}");
		}
	}
		
	if($_POST['copy_news']){
		$news->id = 0;
		$news->category_id = intval($_POST['copy_news']);
		$news->save();
	}
	if($_SESSION["role_name"]=='author'||$_SESSION["role_name"]=='journalist')$href="/admin/column/news_list.php";else $href="news_list.php";
	//redirect($href.'?category='.$_POST['news']['category_id']);
	#var_dump($news);
	
?>