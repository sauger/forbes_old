<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>		
	</head>
	<body>
		
	</body>
</html>
<?php    
	$dbname = $_POST['db_name'];
	$dbcharset = $_POST['db_charset'];
	$name = $_POST['db_user_name'];
	$password = $_POST['db_password'];
	$db_prex = $_POST['db_prex_name'];
	$db_server_name = $_POST['db_server_name'];
	$site_name = $_POST['site_name'];
	if(empty($dbname)){
		die('数据库名称不能为空!');
	}
	$fp = fopen('../config/config.php', 'r');
	$configfile = fread($fp, filesize('../config/config.php'));
	fclose($fp);
	$configfile = preg_replace("/[$]db_database_name\s*\=\s*[\"'].*?[\"'];/is", "\$db_database_name = '$dbname';", $configfile);
	$configfile = preg_replace("/[$]db_user_name\s*\=\s*[\"'].*?[\"'];/is", "\$db_user_name = '$name';", $configfile);
	$configfile = preg_replace("/[$]db_password\s*\=\s*[\"'].*?[\"'];/is", "\$db_password = '$password';", $configfile);
	$configfile = preg_replace("/[$]dbname\s*\=\s*[\"'].*?[\"'];/is", "\$dbname = '$dbname';", $configfile);
	$configfile = preg_replace("/[$]db_code\s*\=\s*[\"'].*?[\"'];/is", "\$db_code = '$dbcharset';", $configfile);
	$configfile = preg_replace("/[$]table_prex\s*\=\s*[\"'].*?[\"'];/is", "\$table_prex = '$db_prex';", $configfile);
	$configfile = preg_replace("/[$]db_server_name\s*\=\s*[\"'].*?[\"'];/is", "\$db_server_name = '$db_server_name';", $configfile);	
	$configfile = preg_replace("/[$]site_name\s*\=\s*[\"'].*?[\"'];/is", "\$site_name = '$site_name';", $configfile);	
	$fp = fopen('../config/config.php', 'w');
	fwrite($fp, trim($configfile));
	fclose($fp);	
	include "../frame.php";
	if(check_db($db_server_name,$name,$password)===false){
		alert('数据库登录失败,请检查配置');
		redirect("index.php?step=3&site_name={$site_name}&db_server_name={$db_server_name}&db_name={$dbname}&db_prex_name={$db_prex}&db_charset={$dbcharset}&db_user_name={$name}");
		exit;
	}
	$db = get_db();
	if(mysql_get_server_info() > '4.1') {
		$db->execute("CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET $dbcharset");
		echo $db->get_error();
	} else {
		$db->execute("CREATE DATABASE IF NOT EXISTS `$dbname`");
	}
	
	include '../data/dbscript.php';
	foreach ($db_script_array as $v) {
		if($v)
		$db->execute($v);
	}
	
	if($db->get_error()){
		display_error($db->get_error());
		exit();
	}else{
		write_to_file('../data/install.lock','');
		redirect("index.php?step=4");
	}
?>