<?php
include '../../frame.php';
$id = intval($_POST['id']);
if(!$id) die('invalid request');
$db = get_db();
if(!$db->execute("delete from fb_rich_company where id={$id}")){
	echo "fail to delete";
}