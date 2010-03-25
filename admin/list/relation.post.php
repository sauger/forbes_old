<?php 
	require "../../frame.php";
	$nid = intval($_POST['nid']);
	$pid = intval($_POST['pid']);
	$type = $_POST['type'];
	$db = get_db();
	
	
	if($type=='publish'){
		$pos = new table_class("fb_list_relation");
		$pos->list_id = $pid;
		$pos->rela_id = $nid;
		$pos->save();
	}
	elseif($type=='revocation'){
		$pos = new table_class("fb_list_relation");
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
			$sql="update fb_list_relation set ".$priority."=".$priority_str[$i]." where id=".$id_str[$i];
			$db->execute($sql);
		}
	}
?>