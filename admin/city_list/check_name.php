<?php
    require_once('../../frame.php');
	
	$name = $_POST['name'];
	$db = get_db();
	$record = $db->query("select id from fb_city where name='".$name."'");
	if(count($record)>0){
		$record2 = $db->query("select count(id) as num from fb_city_list_content where city_id=".$record[0]->id." and list_id=".$_POST['list_id']);
		if($record2[0]->num>0){
			echo "has_data";
		}else{
			echo $record[0]->id;
		}
	}else{
		echo 'no_data';
	}
?>