<?php
include '../../frame.php';
$table = new table_class('fb_filte_words');
$id = intval($_POST['id']);
if($id){
	$table->find($id);
}
$table->update_attributes($_POST['post']);
redirect('list.php');