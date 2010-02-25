<?php
    require_once('../../frame.php');
	if($_POST['post_type']=="del"){
		$post = new table_class("fb_comment");
		$post -> delete($_POST['comment_id']);
		echo $_POST['comment_id'];
	}else{
	}
	
?>