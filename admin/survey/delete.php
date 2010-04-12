<?php
	require_once('../../frame.php');
    $type = $_REQUEST['post_type'];
	$id = $_REQUEST['del_id'];
	
	$db = get_db();
	if($type=='problem'){
		$db->execute("delete from fb_survey where id=$id");
		$db->execute("delete from fb_survey_item where survey_id=$id");
		$db->execute("delete from fb_survey_question where survey_id=$id");
	}else{
		$db->execute("delete from fb_survey_item where question_id=$id");
		$db->execute("delete from fb_survey_question where id=$id");
	}
?>