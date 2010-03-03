<?php
    require "../../frame.php";
	
	$id = $_POST['del_id'];
	$list = new table_class('fb_city_list');
	$list->delete($id);
	
	$db = get_db();
	$db->execute("delete from fb_city_list_attribute where list_id=".$id);
	$db->execute("delete from fb_city_list_content where list_id=".$id);
	close_db();
	echo $id;
?>