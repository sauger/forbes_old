<?php
    require "../../frame.php";
	
	$id = $_POST['id'];
	$fb_gs = new table_class('fb_city_list_attribute');
	$fb_gs->delete($id);
?>