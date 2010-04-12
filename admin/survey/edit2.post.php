<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
</head>
<?php
	require_once('../../frame.php');
	$question = new table_class('fb_survey_question');
	$id = intval($_POST['id']);
	
	
	if(!empty($_POST['id'])){
		$question->find($_POST['id']);
	}else{
		$question->survey_id = $_POST['p_id'];
	}
	$question->update_attributes($_POST['post']);
	
	for($i=0;$i<count($_POST['item']['id']);$i++){
		$item = new table_class('fb_survey_item');
		$item->find($_POST['item']['id'][$i]);
		if(empty($_POST['item']['name'][$i])){
			$item->delete($_POST['item']['id'][$i]);
		}else{
			$item->name = $_POST['item']['name'][$i];
			$item->save();
		}
	}
	
	for($i=0;$i<count($_POST['item']['new_name']);$i++){
		$item = new table_class('fb_survey_item');
		if($_POST['item']['new_name'][$i]!=''){
			$item->name = $_POST['item']['new_name'][$i];
			$item->question_id = $question->id;
			$item->survey_id = $question->survey_id;
			$item->save();
		}
	}
	redirect('list.php?id='.$question->survey_id);
?>
</html>