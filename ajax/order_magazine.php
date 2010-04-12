<?php
    include_once('../frame.php');
	
    if(!$_SESSION['user_id']){
    	echo "wrong";
    	die();
    }
    
    $user_id = intval($_SESSION['user_id']);
    $magazine_id = intval($_POST['id']);
	
    $db = get_db();
    $db->query("select * from fb_magazine_order where user_id={$user_id} and magazine_id={$magazine_id}");\
    
    if($db->record_count>0){
    	echo "full";
    }else{
	    $order = new table_class("fb_magazine_order");
	    $order->user_id = $user_id;
	    $order->magazine_id = $magazine_id;
	    $order->created_at = now();
	    if($order->save()){
	    	echo "success";
	    }
    }
   