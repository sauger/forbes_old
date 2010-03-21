<?php
    include("../../frame.php"); 
	
	$id = intval($_POST['id']);
	$category = new category_class();	
	
	$ids = $category->children_map($id);
	for($i=0;$i<count($ids);$i++){
		$cate = new table_class("fb_category");
		$cate->delete($ids[$i]);
	}
	
?>