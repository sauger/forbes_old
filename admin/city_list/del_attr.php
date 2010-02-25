<?php
    require "../../frame.php";
	
	$id = $_POST['id'];
	$attr = new table_class('fb_city_list_attribute');
	$attr->delete($id);
	
	$db = get_db();
	$db->execute("delete from fb_city_list_content where attribute_id=".$id);
	close_db();
?>