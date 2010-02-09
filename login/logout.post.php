<?php
	include "../frame.php";
	unset($_SESSION['user_name']);
	unset($_SESSION['id']);
	unset($_SESSION['nick_name']);
	unset($_SESSION['role_name']);
	unset($_SESSION['role_level']);
	redirect('/login/login.php');
?>