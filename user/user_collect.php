<?php
include "../frame.php";
$method = strtolower($_SERVER['REQUEST_METHOD']);
if(is_ajax()){
	if(require_login(false)===false){
		echo '请先登录!';
		die();
	}	
}
$resource_type = $_REQUEST['resource_type'];
$resource_id = $_REQUEST['resource_id'];
$db = get_db();
$db->query("select count(*) from fb_collection where resource_type='{$resource_type}' and resource_id='{$resource_id}'");
$db->move_first();
if($db->field_by_index(0) > 0){
	if(is_ajax()){
		echo '请不要重复收藏！';
	}else{
		alert('请不要重复收藏！');
		redirect('/user/user.php?id=3');
	}
	die();
}

if($method == 'get'){
	require_login();
	
}
$collection = new table_class('fb_collection');
$collection->resource_type = $resource_type;
$collection->resource_id = $resource_id;
$collection->user_id = $_SESSION['user_id'];
$collection->created_at = now();
if($collection->save()){
	if(is_ajax()){
		echo '收藏成功！';
	}else{
		alert('收藏失败！');
		redirect('/user/user.php?id=3');
	}
}else{
	if(is_ajax()){
		echo '收藏失败！';
	}else{
		alert('收藏失败！');
		redirect('/user/user.php?id=3');
	}
}