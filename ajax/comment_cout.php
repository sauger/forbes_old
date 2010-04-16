<?php 
	require_once('../frame.php');
	$db = get_db();
	$news_id = intval($_POST['news_id']);
	$comment_id = intval($_POST['comment_id']);
	$count = $db->query("select count(id) as num from fb_comment where is_approve=1 and resource_id=$news_id");
	$count = $count[0]->num;
	if($count>3)echo "(评论数:".$count.")";
?>
