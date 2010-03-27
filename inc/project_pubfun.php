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
		$sql = 'select n.id as news_id,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline,n.category_id from fb_news n left join fb_category c on n.category_id=c.id where n.is_adopt=1 and n.language_tag=0 and c.id in('.$all_category_ids.') and c.category_type="news" order by n.created_at desc limit '.$record[0]->position_limit;
	}
	if($record[0]->type=="news")
	 {
	 	$sql='select f.*,n.id as news_id,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline,n.author_id from fb_position_relation f left join fb_news n on f.news_id=n.id where  n.is_adopt=1 and f.type="news" and f.position_id='.$record[0]->id.' order by f.priority limit '.$record[0]->position_limit;
	 }
	 if($record[0]->type=="list"){
	 	$sql = "select n.id,n.name,n.image_src,n.comment from fb_position_relation f join fb_custom_list_type n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='list' order by f.priority limit {$record[0]->position_limit}";
	 }
	 if($record[0]->type=="image"){
	 	$sql = "select n.* from fb_position_relation f join fb_images n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='image' and n.is_adopt=1 order by f.priority limit {$record[0]->position_limit}";
	 }
	return $db->query($sql); 
	
} 
?>