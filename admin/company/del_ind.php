<?php
    require "../../frame.php";
	
	$id = $_POST['id'];
	$fb_gs = new table_class('fb_company_industry');
	$fb_gs->delete($id);
?>