<?php 
	require "../../frame.php";
	$nid = intval($_POST['nid']);
	$pid = intval($_POST['pid']);
	$type = $_POST['type'];
	$p_type = $_POST['p_type'];
	$db = get_db();
	
	if($pid!='0'){
		$position = new table_class("fb_position");
		$position->find($pid);
	}
	if($type=='publish'){
		if(isset($position)){
			$count = $db->query("select count(*) as num from fb_position_relation where type='$p_type' and position_id=$pid");
			if($count[0]->num>=$position->position_limit){
				echo "full";
				die();
			}
		}
		$pos = new table_class("fb_position_relation");
		$pos->position_id = $pid;
		$pos->news_id = $nid;
		$pos->type = $p_type;
		$pos->save();
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
			if($priority_str[$i]){
				$sql="update fb_position_relation set ".$priority."=".$priority_str[$i]." where id=".$id_str[$i];
			}else{
				$sql="update fb_position_relation set priority=null where id=".$id_str[$i];
			}
			$db->execute($sql);
		}
	}
?>