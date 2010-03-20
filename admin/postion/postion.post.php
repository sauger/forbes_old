<?php 
	require "../../frame.php";
	$nid = $_POST['nid'];
	$pid = $_POST['pid'];
	$type = $_POST['type'];
	$db = get_db();
	
	
	$position = new table_class("fb_position");
	$position->find($pid);
	if($type=='publish'){
		$count = $db->query("select count(*) as num from fb_position_relation where position_id=$pid");
		if($count[0]->num==$position->position_limit){
			echo "full";
			die();
		}
		$pos = new table_class("fb_position_relation");
		$pos->position_id = $pid;
		$pos->news_id = $nid;
		$pos->save();
		$position->type='news';
		$position->save();
	}
	elseif($type=='revocation'){
		$pos = new table_class("fb_position_relation");
		$pos->delete($nid);
	}
	elseif("edit_priority"==$type)
	{
		$id_str=explode("|",$_POST['id_str']); 
		$priority_str=explode("|",$_POST['priority_str']); 
		$id_str_num=sizeof($id_str)-1;
		$priority = 'priority';
		for($i=$id_str_num-1;$i>=0;$i--)
		{
			if($priority_str[$i]==""){$priority_str[$i]="";}
			$db = get_db();
			$sql="update fb_position_relation set ".$priority."=".$priority_str[$i]." where id=".$id_str[$i];
			$db->execute($sql);
		}
		$position->type='news';
		$position->save();
	}
?>