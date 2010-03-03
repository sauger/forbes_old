<?php
include "../../frame.php";
$db = get_db();
$db->query("select id from fb_gs where mc = '{$_POST['name']}'");
if ($db->move_first()){
	echo $db->field_by_index(0);
}else{
	echo '0';
}
$db->close();