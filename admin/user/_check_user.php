<?php
include '../../frame.php';
$db = get_db();
$db->query("select * from fb_user where role_name='{$_POST['role_name']}' and nick_name = '{$_POST['name']}'");
if ($db->record_count <= 0 ){
	echo 0;
}else{
	$db->move_first();
	echo ($db->field_by_name('id'));
}