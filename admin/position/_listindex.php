<?php
include_once('../../frame.php');
$db = get_db();
for($i=1;$i<9;$i++){
	update_list_pos($i);	
}
function pos_type($p){
		$p = intval($p);
		switch ($p) {
			case 1:
				return 'rich';
			break;
			case 2:
				return 'invest';
			break;
			case 3:
				return 'company';
			break;
			case 4:
				return 'city';
			break;
			case 5:
				return 'famous';
			break;
			case 6:
				return 'sport';
			break;
			case 7:
				return 'tech';
			break;
			case 8:
				return 'edu';
			break;
			default:
				;
			break;
		}
	}

function update_list_pos($pos){
	global $db;
	$table = new table_class('fb_page_pos');
	$type = pos_type($pos);
	$items = $db->query("select name,comment,image_src from fb_custom_list_type where position = {$pos} order by created_at desc limit 4");
	$exist_items = $table->find('all',array('conditions' => "name like 'listindex_{$type}%' and (end_time <= now() or end_time is null)",'order' =>"name"));
	
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