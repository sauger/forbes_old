<?php
include "../../frame.php";
$ipo = new table_class("fb_ipo_info");
$ipo->find("first");
$ipo->update_attributes($_POST['ipo']);
redirect('ipo_config.php');