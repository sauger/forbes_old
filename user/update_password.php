<?php
     include_once('../frame.php');
	 
	 $user = new table_class("fb_yh");
	 $user->find($_SESSION['user_id']);
	 if($user->password==md5($_POST['o_p'])){
	 	$user->password = md5($_POST['n_p']);
		$user->save();
		echo "ok";
	 }else{
	 	echo "wrong";
	 }
?>