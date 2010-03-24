<?php
	require_once('../../frame.php');
	judge_role();
	
	$id = $_REQUEST['id'];
	$page = new table_class("fb_position");
	$page->find($id);
	
	if($page->type=="news"){
		include "news_edit.php";
	}elseif($page->type=="category"){
		include "category_edit.php";
	}elseif($page->type=="image"){
		include "image_edit.php";
	}elseif($page->type=="column"){
		include "column_edit.php";
	}elseif($page->type=="list"){
		include "list2_edit.php";
	}
?>