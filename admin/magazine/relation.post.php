<?php 
	require "../../frame.php";
	$nid = intval($_POST['nid']);
	$pid = intval($_POST['pid']);
	$type = $_POST['type'];
	$db = get_db();
	
	
	if($type=='publish'){
		$relation = new table_class("fb_magazine_relation");
		$relation->magazine_id = $pid;
		$relation->resource_id = $nid;
		$relation->save();
	}
	elseif($type=='revocation'){
		$relation = new table_class("fb_magazine_relation");
		$relation->delete($nid);
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
			$sql="update fb_magazine_relation set ".$priority."=".$priority_str[$i]." where id=".$id_str[$i];
			$db->execute($sql);
		}
	}
?>