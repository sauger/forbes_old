<?php

function update_news_pos($pos){
	$db = get_db();
	$category = new category_class('news');
	if($pos == 1){
		$category_id = $category->find_by_name('富豪报道');
		$category_id = $category_id->id;
		$typd = 'rich';
	}else{
		$category_id = $category->find_by_name('创富者说');
		$category_id = $category_id->id;
	}
	$table = new table_class('fb_page_pos');
	$type = pos_type($pos);
	$items = $db->query("select name,comment,image_src from fb_custom_list_type where position = {$pos} order by created_at desc limit 4");
	$exist_items = $table->find('all',array('conditions' => "name like 'listindex_{$type}%' and (end_time <= now() or end_time is null)",'order' =>"$name"));
	
	$len = empty($exist_items)? 0 : count($exist_items);
	for($i=0;$i<$len; $i++){
		$exist_items[$i]->display = $items[$i]->name;
		$exist_items[$i]->description = $items[$i]->comment;
		$exist_items[$i]->href= '/list/list.php?id' .$items[$i]->id;
		$exist_items[$i]->image1 = $items[$i]->image_src;
		$exist_items[$i]->title = $items[$i]->name;
		$exist_items[$i]->end_time = dt_increase(1,'h',$exist_itmes->end_time);
		$exist_items[$i]->save();
	}
	
}