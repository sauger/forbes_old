<?php
include "../../frame.php";
$db = get_db();
$db->query("select id from fb_fhb where year = '{$_POST['name']}'");
if ($db->move_first()){
	$id = $db->field_by_index(0);
	$db->query("select count(id) as num from fb_fhbd where bd_id={$id} and fh_id={$_POST['id']}");
	if($db->field_by_index(0)>0){
		echo 'has';
	}else{
		echo $id;
	}
}else{
	echo 'no';
}
$db->close();
?>