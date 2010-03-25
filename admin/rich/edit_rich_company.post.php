<?php
include '../../frame.php';
if(!$_POST['params']){
	die();
}
$ids = array();
$params = explode(',',$_POST['params']);
$table = new table_class('fb_rich_company');
foreach ($params as $param) {
	$value = explode('|',$param);
	$table->id = $value[0];
	$table->rich_id = $_POST['rich_id'];
	if($value[1]){
		$table->stock_count = $value[1];
	}
	$table->company_id = $value[2];
	$table->save();
	array_push($ids, $table->id);
}
$ids = implode(',', $ids);
	echo $ids;