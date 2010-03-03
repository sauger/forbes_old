<?php
    require "../../frame.php";
	
	$id = $_POST['del_id'];
	$city = new table_class('fb_city');
	$city->delete($id);
	
	$db = get_db();
	$db->execute("delete from fb_city_list_content where city_id=".$id);
	close_db();
	echo $id;
?>