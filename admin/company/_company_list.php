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
	$sql = "select id, mc from fb_gs where mc like '%{$_REQUEST['name']}%' limit $limit";
	$company = $db->query($sql);
	if(empty($company)){
		return "";
	}
	$a = Array();
	foreach ($company as $v) {
		$c = new Company();
		$c->id = $v->id;
		$c->value= $v->mc;
		array_push($a, $c);

	}
	$result = Array("results" => $a);
	echo json_encode($result);;
	//var_dump($company);	
	$db->close();
}