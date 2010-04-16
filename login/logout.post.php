<?php
	include "../frame.php";
	unset($_SESSION['admin_user_name']);
	unset($_SESSION['admin_user_id']);
	unset($_SESSION['admin_nick_name']);
	unset($_SESSION['role_name']);
	unset($_SESSION['role_level']);
	redirect('/login/login.php');
?>