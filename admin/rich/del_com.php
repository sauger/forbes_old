<?php
    require "../../frame.php";
	
	$id = $_POST['id'];
	$fb_gs = new table_class('fb_fh_gs');
	$fb_gs->delete($id);
?>