<?php
include '../../frame.php';
if(!$_POST['params']){
	die();
}
$ids = array();
$params = explode(',',$_POST['params']);
foreach ($params as $param) {
	$table = new table_class('fb_rich_company');
	$value = explode('|',$param);
	$table->id = $value[0];
	$table->rich_id = $_POST['rich_id'];
	$table->stock_count = intval($value[1]);
	$table->company_id = $value[2];
	$table->save();
	array_push($ids, $table->id);
}
$ids = implode(',', $ids);
	echo $ids;