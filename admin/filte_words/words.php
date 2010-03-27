<?php
include '../../frame.php';
$db = get_db();
$db->query("select group_concat(text SEPARATOR '|') as words from fb_filte_words");
if($db->move_first()){
	echo $db->field_by_name('words');
}