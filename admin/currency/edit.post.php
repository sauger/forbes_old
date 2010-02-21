<?php 
	require "../../frame.php";
	$currency = new table_class('fb_currency');
	$currency->find($_POST['id']);
	$currency->name = $_POST['val'];
	$currency->save();
?>