<?php 
	include 'frame.php';
	$db = get_db();
	$items = $db->query("select * from fb_admin_menu where parent_id != 0");
	$len = count($items);
	for($i=0;$i<$len;$i++){
		$rights = new table_class('fb_rights');
		$rights->type = 2;
		$rights->name = $items[$i]->id;
		$rights->nick_name = $items[$i]->name;
		$rights->save();
	}
	
?>