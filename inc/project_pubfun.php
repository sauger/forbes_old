<?php
function get_news_by_pos($pos) {
	$pos = add_slashes($pos);
	$sql ="select * from fb_position where name='{$pos}'";
	if($db->query($sql)) return false;
	if($record = $db->move_first()===false) return false;
	if($record[0]->type=="category")
	{
		$category_id=$record[0]->category_id;
		$sql = 'select n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline from fb_news n left join fb_category c on n.category_id=c.id where n.is_adopt=1 and n.language_tag=0 and c.id='.$category_id.' and c.category_type="news" order by n.priority asc,n.created_at desc limit '.$record[0]->position_limit;
	}
	if($record[0]->type=="news")
	 {
	 	$sql='select f.*,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline from fb_position_relation f left join fb_news n on f.news_id=n.id where  n.is_adopt=1 and f.position_id='.$record[0]->id.' order by f.priority limit '.$record[0]->position_limit;
	 }
		
	return $db -> query($sql); 
	
} 
