<?php
include '../../frame.php';
$role = new table_class('fb_role');
$id = intval($_POST['id']);
$has_rights = array();
$modify_rights = $_POST['rights'] ? $_POST['rights'] :array();
$db = get_db();
if($id){
	$role->find($id);
	$hr = $db->query("select * from fb_role_rights where role_id={$id}");
	foreach ($hr as $v) {
		$has_rights[] = $v->id;
	}
} 
$role->update_attributes($_POST['role']);
/* handle the deleted rights
 * 
 */
$deleted = array_diff($has_rights,$modify_rights);
if(!empty($deleted)){
	$ids = implode(',',$deleted);
	$sql = "delete from fb_role_rights where role_id={$id} and rights_id in({$ids})";
	$db->execute($sql);
}
$added = array_diff($modify_rights,$has_rights);
if(!empty($added)){
	$ids = implode(',',$added);
	foreach ($added as $v){
		$db->execute("insert into fb_role_rights (role_id,rights_id) values ({$id},{$v})");
	}
}
redirect('index.php');
