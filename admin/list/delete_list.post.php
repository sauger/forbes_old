<?php
$id = intval($_POST['id']);
if(empty($id)) die("invalid request!");
include "../../frame.php";
$list = new table_class('fb_custom_list_type');
$list->find($id);
$errro ='fail to delete list';
$db = get_db();
if($list->list_type == 1){
	$table_name = $list->table_name;
	if(false === $db->execute("drop table `{$table_name}`")) die($errro);
}else if($list->list_type == 2){
	if($db->execute("delete from fb_rich_list_items where list_id={$list->id}")===false) die($errro);
}else if($list->list_type == 3){
	if($db->execute("delete from fb_famous_list_items where list_id={$list->id}")===false) die($errro);
}

if($list->delete()===false){
		echo $errro;
}