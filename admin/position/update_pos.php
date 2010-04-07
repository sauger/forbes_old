<?php
include_once "../../frame.php";
include "_listindex.php";



function update_pos($category_name,$limit,$position_name,$is_parent=false){
	$db = get_db();
	$category = new category_class();
	if($is_parent){
		$category_id = $category->find_by_name($category_name)->id;
		if(!$category_id){
			return false;
		}
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
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->short_title;
					$pos->title = $news[$i]->title;
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
				$pos->display = $news[$i]->short_title;
				$pos->title = $news[$i]->title;
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
	$db = get_db();
	if($type=='author'){
		$author_type = 2;
	}else if($type == 'journalist'){
		$author_type = 1;
	}
	$sql = "select t1.* from fb_user t1 join fb_news t2 on t1.id=t2.author_id where t1.role_name='{$type}' and t2.author_type={$author_type} group by t1.id order by t2.created_at limit {$limit}";
	$column = $db->query($sql);
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		for($j=0;$j<$limit;$j++){
			$pos_name = $position_name.$j;
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					if(!$column[$i]->column_name){
						$pos->display = $column[$i]->nick_name.'专栏';
					}else{
						$pos->display = $column[$i]->column_name.'专栏';
					}
					$pos->title = $column[$i]->nick_name;
					$pos->image1 = $column[$i]->image_src;
					$pos->description = $column[$i]->description;
					$pos->href = '/column/column.php?id='.$column[$i]->id;
					$pos->static_href = '/column/column.php?id='.$column[$i]->id;
					$pos->save();
					break;
				}
			}else{
				$pos = new table_class('fb_page_pos');
				$pos->name = $pos_name;
				$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
				$pos->end_time = $end_time;
				if(!$column[$i]->column_name){
					$pos->display = $column[$i]->nick_name.'专栏';
				}else{
					$pos->display = $column[$i]->column_name.'专栏';
				}
				$pos->title = $column[$i]->nick_name;
				$pos->image1 = $column[$i]->image_src;
				$pos->description = $column[$i]->description;
				$pos->href = '/column/column.php?id='.$column[$i]->id;
				$pos->static_href = '/column/column.php?id='.$column[$i]->id;
				$pos->save();
				break;
			}
		}
	}
	
	if($news_limit!=''&&$news_position!=''){
		for($k=0;$k<$count;$k++){
			$sql = "select id,title,short_title,created_at,description,video_photo_src from fb_news where 1=1 and is_adopt=1 and author_type={$author_type} and author_id={$column[$k]->id} order by created_at desc limit {$news_limit}";
			$news = $db->query($sql);
			$news_count = $db->record_count;
			for($i=0;$i<$news_count;$i++){
				for($j=0;$j<$news_limit;$j++){
					$pos_name = $position_name.$k.$news_position.$j;
					$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
					if($db->record_count==1){
						if($record[0]->end_time>now()){
						}else{
							$pos = new table_class('fb_page_pos');
							$pos->find($record[0]->id);
							$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
							$pos->end_time = $end_time;
							$pos->display = $news[$i]->short_title;
							$pos->title = $news[$i]->title;
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
						$pos->display = $news[$i]->short_title;
						$pos->title = $news[$i]->title;
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
	}
}

function update_click($limit,$position_name){
	$db = get_db();
	$sql = "select id,title,short_title,created_at,description,video_photo_src from fb_news where 1=1 and is_adopt=1 order by click_count asc,created_at desc limit {$limit}";
	$news = $db->query($sql);
	$news_count = $db->record_count;
	for($i=0;$i<$news_count;$i++){
		for($j=0;$j<$limit;$j++){
			$pos_name = $position_name.$j;
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->short_title;
					$pos->title = $news[$i]->title;
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
				$pos->display = $news[$i]->short_title;
				$pos->title = $news[$i]->title;
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

function update_news_column($category_name,$limit,$type,$position_name){
	if($type=='author'){
		$author_type = 2;
	}else if($type == 'journalist'){
		$author_type = 1;
	}
	$db = get_db();
	$category = new category_class();
	$category_id = $category->find_by_name($category_name)->id;
	if(!$category_id){
		return false;
	}
	$ids = $category->children_map($category_id);
	$ids = implode(",",$ids);
	$sql = "select t1.id,t1.title,t1.short_title,t1.created_at,t1.description,t1.video_photo_src,t2.nick_name,t2.image_src,t2.column_name from fb_news t1 join fb_user t2 on t1.author_id=t2.id where 1=1 and t1.is_adopt=1 and t1.author_type={$author_type} and t1.category_id in ($ids) and t2.role_name={$type} order by t1.created_at desc";
	$news = $db->query($sql);
	$news_count = $db->record_count;
	for($i=0;$i<$news_count;$i++){
		for($j=0;$j<$limit;$j++){
			$pos_name = $position_name.$j;
			$record = $db->query("select id,end_time from fb_page_pos where name='{$pos_name}'");
			if($db->record_count==1){
				if($record[0]->end_time>now()){
				}else{
					$pos = new table_class('fb_page_pos');
					$pos->find($record[0]->id);
					$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
					$pos->end_time = $end_time;
					$pos->display = $news[$i]->short_title;
					$pos->title = $news[$i]->title;
					$pos->image1 = $news[$i]->video_photo_src;
					$pos->image2 = $news[$i]->image_src;
					if(!$news[$i]->column_name){
						$pos->alias = $news[$i]->nick_name.'专栏';
					}else{
						$pos->alias = $news[$i]->column_name.'专栏';
					}
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
				$pos->display = $news[$i]->short_title;
				$pos->title = $news[$i]->title;
				$pos->image1 = $news[$i]->video_photo_src;
				$pos->image2 = $news[$i]->image_src;
				if(!$news[$i]->column_name){
					$pos->alias = $news[$i]->nick_name.'专栏';
				}else{
					$pos->alias = $news[$i]->column_name.'专栏';
				}
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

include "./_index.php";
include "./_investindex.php";