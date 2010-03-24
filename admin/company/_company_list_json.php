<?php
$s_text = $_REQUEST['s_text'];
include '../../frame.php';
if($s_text){
	$conditons =array('conditions' => " name like '%{$s_text}%'");
}
$db = get_db();
$table = new table_class('fb_company');
$items = $table->find('all',$conditons);
$result = array();
if(!$items) $items = array();
foreach ($items as $item) {
	unset($temp);
	foreach ($item->fields as $field) {
		$name = $field->name;
		$temp->$name = $field->value;
	}
	$result[] = $temp;
}
echo json_encode($result);
