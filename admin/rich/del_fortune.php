<?php
    include_once('../../frame.php');
	
	$id = $_POST['id'];
	
	$fortune = new table_class('fb_rich_fortune');
	$fortune->delete($id);
?>