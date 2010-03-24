<?php
include '../../frame.php';
if(!$_POST['params']){
	die();
}
$params = explode(',',$_POST['params']);
$table = new table_class('fb_rich_company');
foreach ($params as $param) {
	$value = explode('|',$param);
	$table->id = $value[0];
	$table->rich_id = $_POST['rich_id'];
	$table->stock_count = $value[1];
	$table->company_id = $value[2];
	$table->save();
}