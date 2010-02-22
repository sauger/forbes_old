<?php 
	require "../frame.php";
	
	//var_dump($_POST);
	
	$user = new table_class('fb_yh');
	$user->update_attributes($_POST['user']);
	//echo $user->id;
	
	$order = new table_class('fb_yh_dy');
	$order->yh_id = $user->id;
	
	if($_POST['jhtj']=='on'){
		$order->jhtj=1;
	}else{
		$order->jhtj=0;
	}
	
	if($_POST['fh']=='on'){
		$order->fh=1;
	}else{
		$order->fh=0;
	}
	if($_POST['cy']=='on'){
		$order->cy=1;
	}else{
		$order->cy=0;
	}
	if($_POST['sy']=='on'){
		$order->sy=1;
	}else{
		$order->sy=0;
	}
	if($_POST['kj']=='on'){
		$order->kj=1;
	}else{
		$order->kj=0;
	}
	if($_POST['tz']=='on'){
		$order->tz=1;
	}else{
		$order->tz=0;
	}
	if($_POST['sh']=='on'){
		$order->sh=1;
	}else{
		$order->sh=0;
	}
	$order->save();
	//redirect('index.php');
?>