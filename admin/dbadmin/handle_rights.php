<?php
include "../../frame.php";
$db = get_db();
$menus = $db->query("select * from fb_admin_menu where parent_id > 0 ");
foreach($menus as $menu){
	$right = new table_class('fb_rights');
	$right->find('first',array('conditions' => "name='{$menu->id}' and type=2"));
	$right->name = $menu->id;
	$right->type = 2;
	$right->nick_name = $menu->name;
	$right->save();
}