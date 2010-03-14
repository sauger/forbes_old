<?php
    include_once('../frame.php');
	
	$uid = $_SESSION['user_id'];
	$sql = "update fb_yh_dy set";
	if(isset($_POST['jhtj'])){
		$sql .= " jhtj=1";
	}
	if(isset($_POST['jhtj2'])){
		$sql .= " jhtj=0";
	}
	if(isset($_POST['fh'])){
		$sql .= ",fh=1";
	}else{
		$sql .= ",fh=0";
	}
	if(isset($_POST['cy'])){
		$sql .= ",cy=1";
	}else{
		$sql .= ",cy=0";
	}
	if(isset($_POST['sy'])){
		$sql .= ",sy=1";
	}else{
		$sql .= ",sy=0";
	}
	if(isset($_POST['kj'])){
		$sql .= ",kj=1";
	}else{
		$sql .= ",kj=0";
	}
	if(isset($_POST['tz'])){
		$sql .= ",tz=1";
	}else{
		$sql .= ",tz=0";
	}
	if(isset($_POST['sh'])){
		$sql .= ",sh=1";
	}else{
		$sql .= ",sh=0";
	}
	$db = get_db();
	$db->execute($sql);
	close_db();
?>