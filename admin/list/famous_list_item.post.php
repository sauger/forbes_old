<?php
include '../../frame.php';
$list_id = intval($_POST['list_id']);
if(!$list_id){
	alert('invalid request!');
	redirect('index.php');
	die();
}
$id = intval($_POST['id']);
$item = new table_class('fb_famous_list_items');
if($id){
	$item->find($id);
} 
$item->update_attributes($_POST['item'],false);
$item->list_id = $list_id;
$db = get_db();
$db->query("select id from fb_mr where name='{$item->name}'");
if($db->move_first()){
	$item->famous_id = $db->field_by_name('id');
}

$item->update_file_attributes('item');
if(!$item->save()){
	alert('fail to update!');
};
redirect("famous_list_items_list.php?id={$list_id}");