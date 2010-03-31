<?php
function get_news_by_pos($pos,$page='') {
	$db = get_db();
	$pos = addslashes($pos);
	$sql ="select * from fb_position where name='{$pos}'";
	if($page){
		$page = $db->query("select id from fb_position where name='{$page}' and page_id=0");
		$page_id = $page[0]->id;
		$sql .= " and page_id=$page_id";
	}
	if($page === false) return false;
	$record = $db->query($sql);
	if($record === false) return false;
	
	if($record[0]->type=="category")
	{
		$category = new category_class('news');
		$category_id=$record[0]->category_id;
		$all_category_ids = $category->children_map($category_id);
		$all_category_ids = implode(',',$all_category_ids);
		$sql = 'select n.created_at,n.id as id,n.id as news_id,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline,n.category_id from fb_news n left join fb_category c on n.category_id=c.id where n.is_adopt=1 and n.language_tag=0 and c.id in('.$all_category_ids.') and c.category_type="news" order by n.created_at desc limit '.$record[0]->position_limit;
	}
	elseif($record[0]->type=="news")
	 {
	 	$sql='select n.created_at,n.id as id,n.id as news_id,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline,n.author_id from fb_position_relation f left join fb_news n on f.news_id=n.id where  n.is_adopt=1 and f.type="news" and f.position_id='.$record[0]->id.' order by f.priority limit '.$record[0]->position_limit;
	 }
	 elseif($record[0]->type=="list"){
	 	$sql = "select n.id,n.name,n.image_src,n.comment from fb_position_relation f join fb_custom_list_type n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='list' order by f.priority limit {$record[0]->position_limit}";
	 }
	 elseif($record[0]->type=="image"){
	 	$sql = "select n.* from fb_position_relation f join fb_images n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='image' and n.is_adopt=1 order by f.priority limit {$record[0]->position_limit}";
	 }
	 else{
	 	return false;
	 }
	 
	return $db->query($sql); 
	
} 

function static_news_url($news,$index = 1){
	$date = date('Ym',strtotime($news->created_at));
	$dir  = "/review/{$date}";
	if($index > 1){
		$file = $dir ."/{$news->id}_{$index}.html";
	}else{
		$file = $dir ."/{$news->id}.html";	
	}
	
	return $file;
}

function static_index() {
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/index_static.php");
	return write_to_file("{$static_dir}/index.html",$content,'w');
}

function static_news($news,$symbol='fck_pageindex'){
	if(!$news){
		return false;
	};
	global $static_dir;
	global $static_url;
	$url = "{$static_url}/news/static_news.php?id={$news->id}";
	$content = file_get_contents($url);
	$date = date('Ym',strtotime($news->created_at));
	$dir  = "{$static_dir}/review/{$date}";
	if(!is_dir($dir)){
		mkdir($dir);
	}
	$file = $dir ."/{$news->id}.html";
	if(!write_to_file($file,$content,'w')){
		return false;
	}
	$page_count = get_fck_page_count($news->content);
	if ($page_count > 1){
		for($i=2;$i<= $page_count;$i++){
			$url = "{$static_url}/news/static_news.php?id={$news->id}&{$symbol}={$i}";
			$content = file_get_contents($url);
			$file = "$dir/{$news->id}_{$i}.html";
			if(!write_to_file($file,$content,'w')){
				return false;
			}
		}
	}
	return true;
}

?>