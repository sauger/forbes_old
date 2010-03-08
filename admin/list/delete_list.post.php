<?php
$id = intval($_POST['id']);
if(empty($id)) die("非法操作");
include "../../frame.php";
$list = new table_class('fb_custom_list_type');
$list->find($id);
$table_name = $list->table_name;
$db = get_db();
if(false === $db->execute("drop table `{$table_name}`")) die("删除失败!");
if($list->delete()===false){
	echo "删除失败!";
}