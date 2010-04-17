<?php
    require_once('../frame.php');
	
	if(!is_post()){
		die();
	}
	if($_SESSION['news_share']!=$_POST['session']){
		die();
	}
	
?>