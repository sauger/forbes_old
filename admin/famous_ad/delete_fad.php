<?php
    require "../../frame.php";
	
	$id = $_POST['id'];
	$fb_gs = new table_class('fb_famous_ad');
	$fb_gs->delete($id);
?>