<?php
include '../../frame.php';
$table = new table_class('fb_rich_list_items');
$table->update_file_attributes('item');
$table->update_attributes($_POST['item']);
redirect('list.php');