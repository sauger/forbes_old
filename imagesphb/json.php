<?php
include "../frame.php";
$id = intval($_GET['id']);
$db = get_db();
$list = new table_class('fb_custom_list_type');
		$list->find($id);
		if($list->id <= 0 || $list->list_type != 4){
			alert('非法操作');
			redirect('/');
		}
		$list_item = new table_class('fb_picture_list_items');
		$items = $db->query("select name,image,comment from fb_picture_list_items where list_id ={$list->id}");
		$len = $db->record_count;
		for($i=0;$i<$len;$i++){
			$tmp['name'] = $items[$i]->name;
			$tmp['image'] = $items[$i]->image;
			$tmp['comment'] = str_replace("\r\n","",$items[$i]->comment);
			$tmp['comment'] = str_replace("\t","",$tmp['comment']);
			$litems[] = $tmp;
		}
		echo json_encode($litems);