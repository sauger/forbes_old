<?php
include_once "../../frame.php";




function update_pos($category_name,$limit,$position_name,$is_parent=false){
	$db = get_db();
	$category = new category_class();
	if($is_parent){
		$category_id = $category->find_by_name($category_name)->id;
		$ids = $category->children_map($category_id);
		$ids = implode(",",$ids);
		$sql = "select id,title,short_title,created_at,description,video_photo_src from fb_news where 1=1 and is_adopt=1 and category_id in ($ids) order by created_at desc";
	}else{
		$category_id = $category->find_by_name($category_name)->id;
		$sql = "select id,title,short_title,created_at,description,video_photo_src from fb_news where 1=1 and is_adopt=1 and category_id={$category_id} order by created_at desc";
	}
	//echo $sql;
	$news = $db->query($sql);
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		for($j=0;$j<$limit;$j++){
			$pos_name = $position_name.$j;
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			echo "select id,end_time from fb_page_pos where name='{$pos_name}'";
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->short_title;
					$pos->title = $news[$i]->titile;
					$pos->image1 = $news[$i]->video_photo_src;
					$pos->description = $news[$i]->description;
					$pos->href = dynamic_news_url($news[$i]);
					$pos->static_href = static_news_url($news[$i]);
					$pos->save();
					break;
				}
			}else{
				$pos = new table_class('fb_page_pos');
				$pos->name = $pos_name;
				$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
				$pos->end_time = $end_time;
				$pos->display = $news[$i]->short_titile;
				$pos->title = $news[$i]->titile;
				$pos->image1 = $news[$i]->video_photo_src;
				$pos->description = $news[$i]->description;
				$pos->href = dynamic_news_url($news[$i]);
				$pos->static_href = static_news_url($news[$i]);
				$pos->comment = $category_name.$i;
				$pos->save();
				break;
			}
		}
	}
}

function update_column($type,$limit,$position_name,$news_limit='',$news_position=''){
	if($type=='author'){
		$author_type = 2;
	}else if($type == 'journalist'){
		$author_type = 1;
	}
	$sql = "select t1.* from fb_user t1 join fb_news t2 on t1.id=t2.author_id where t1.role_name='{$type}' and t2.author_type={$author_type} group by t1.id order by t2.created_at limit {$limit}";
	$column = $db->query($sql);
	$count = $db->record_count;
}

include "./_index.php";