<?php
include '../../frame.php';
$list_id = intval($_POST['list_id']);
if(!$list_id){
	alert('invalid request!');
	redirect('picture_list_list.php');
	die();
}
$id = intval($_POST['id']);
$item = new table_class('fb_picture_list_items');
if($id){
	$item->find($id);
} 
$item->update_attributes($_POST['item'],false);
$item->list_id = $list_id;

$item->update_file_attributes('item');
if(!$item->save()){
	alert('fail to update!');
};
redirect("picture_list_items_list.php?id={$list_id}");