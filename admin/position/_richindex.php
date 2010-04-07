<?php
update_news_pos(1);
update_news_pos(2);

function update_news_pos($pos){
	$db = get_db();
	$category = new category_class('news');
	if($pos == 1){
		$category_id = $category->find_by_name('富豪报道');
		$category_id = $category_id->id;
		$type = 'richindex_news_';
	}else{
		$category_id = $category->find_by_name('创富者说');
		$category_id = $category_id->id;
		$type = 'richindex_news1_';
	}
	$table = new table_class('fb_page_pos');
	$db->echo_sql = true;
	$items = $db->query("select id,title,created_at,description,author from fb_news where category_id={$category_id} order by created_at desc limit 6");
	$exist_items = $table->find('all',array('conditions' => "name like '{$type}%' and (end_time <= now() or end_time is null)",'order' =>"name"));
	$db->echo_sql = false;
	$len = empty($exist_items)? 0 : count($exist_items);
	for($i=0;$i<$len; $i++){
		$exist_items[$i]->display = $items[$i]->title;
		$exist_items[$i]->description = $items[$i]->description;
		$exist_items[$i]->href= dynamic_news_url($items[$i]);
		$exist_items[$i]->statci_href = static_news_url($items[$i]);
		$exist_items[$i]->title = $items[$i]->title;
		$exist_items[$i]->alias = $items[$i]->author;
		$exist_items[$i]->end_time = dt_increase(1,'h',$exist_itmes->end_time);
		$exist_items[$i]->save();
	}
	
}