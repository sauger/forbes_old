<?php 
	require "../../frame.php";
	$nid = $_POST['nid'];
	$pid = $_POST['pid'];
	$type = $_POST['type'];
	$db = get_db();
	
	if($type=='publish'){
		$postion = new table_class("fb_postion");
		$postion->find($pid);
		$count = $db->query("select count(*) as num from fb_postion_relation where postion_id=$pid");
		if($count[0]->num==$postion->postion_limit){
			echo "full";
			die();
		}
		$pos = new table_class("fb_postion_relation");
		$pos->postion_id = $pid;
		$pos->news_id = $nid;
		$pos->save();
		$postion->type='news';
		$postion->save();
	}
	elseif($type=='revocation'){
		$pos = new table_class("fb_postion_relation");
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
			$sql="update fb_postion_relation set ".$priority."=".$priority_str[$i]." where id=".$id_str[$i];
			$db->execute($sql);
		}
	}
?>