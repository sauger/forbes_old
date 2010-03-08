<?php
include "../../frame.php";
$table_name = $_POST['table_name'];
$id = intval($_POST['id']);
$table = new table_class($table_name);
if($id > 0){
	$table->find($id);
}
$table->update_attributes($_POST['list']);
redirect("custom_list_item_list.php?id={$_POST['list_id']}");