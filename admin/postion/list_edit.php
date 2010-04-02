<?php
	require_once('../../frame.php');
	judge_role();
	
	$id = $_REQUEST['id'];
	$page = new table_class("fb_position");
	$page->find($id);
	
	if($page->type=="news"){
		include "news_edit.php";
	}else if($page->type=="category"){
		include "category_edit.php";
	}else if($page->type=="image"){
		include "image_edit.php";
	}else if($page->type=="column"){
		include "column_edit.php";
	}else if($page->type=="list"){
		include "list2_edit.php";
	}else if($page->type=="journalist"){
		include "journalist_edit.php";
	}else if($page->type=="magazine"){
		include "magazine_edit.php";
	}else if($page->type=="activity"){
		include "activity_edit.php";
	}
?>