<?php
	require_once('../frame.php');
	
	
	if(isset($_SESSION['user_id'])){
		$comment = new table_class('fb_comment');
		$comment->echo_sql = true;
		$comment->resource_type = "news";
		$comment->resource_id = intval($_POST['news_id']);
		$comment->comment = htmlspecialchars($_POST['content']);
		$comment->created_at = now();
		$comment->nick_name = $_POST['nick_name'];
		$comment->ip = $_SERVER['REMOTE_ADDR'];
		$comment->user_id = $_SESSION['user_id'];
		$comment->save();
	}else{
		die();
	}
	
?>
