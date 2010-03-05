<?php
    require "../../frame.php";
	
	$id = $_REQUEST['id'];
	$table = $_REQUEST['table'];
	
	$table = new table_class($table);
	$table->find($id);
	show_video_player(400,300,$image='',$table->video,$autostart = "false")
?>
