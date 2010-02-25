<?php
include_once "../../frame.php";
/*
 * only handle ajax method
 */
class Company{
	var $id;
	var $value;
}

if(is_ajax()){
	$limit = $_REQUEST['limit'] ? $_REQUEST['limit'] : 6;
	if(!$_REQUEST['name']){
		return "";	
	}
	$db = get_db();
	$sql = "select id, year from fb_mrb where year like '%{$_REQUEST['name']}%' limit $limit";
	$list = $db->query($sql);
	if(empty($list)){
		return "";
	}
	$a = Array();
	foreach ($list as $v) {
		$c = new Company();
		$c->id = $v->id;
		$c->value= $v->year;
		array_push($a, $c);

	}
	$result = Array("results" => $a);
	echo json_encode($result);;
	//var_dump($company);	
	$db->close();
}