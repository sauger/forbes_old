<?php
    include_once('../frame.php');
	
    if(!$_SESSION['user_id']){
    	echo "wrong";
    	die();
    }
    
    $type = $_POST['type'];
	$uid = $_SESSION['user_id'];
	$sql = "update fb_yh_dy set ";
	
	if($type=='news'){
		$sql .= "jhtj=1";
	}else{
		$article = array();
		if(isset($_POST['business'])){
			array_push($article,'sy=1');
		}
		if(isset($_POST['create'])){
			array_push($article,'cy=1');
		}
		if(isset($_POST['invest'])){
			array_push($article,'tz=1');
		}
		if(isset($_POST['life'])){
			array_push($article,'sh=1');
		}
		if(isset($_POST['rich'])){
			array_push($article,'fh=1');
		}
		$sql .= implode(',',$article);
	}
	$sql .= " where yh_id=".$uid;
	$db = get_db();
	if($db->execute($sql)){
		echo "success";
	}
	close_db();
?>