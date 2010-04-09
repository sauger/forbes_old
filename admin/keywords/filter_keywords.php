<?php
include_once "../../frame.php";
$name = $_GET['term'];
$db = get_db();
$sql = "select * from fb_news_keywords";
if($name){
	$sql .= " where name like '%{$name}%'";
}
$items = $db->query($sql);
$len = count($items);
for($i=0;$i<$len; $i++){
	$result[]['value'] = $items[$i]->name;
}
echo json_encode($result);