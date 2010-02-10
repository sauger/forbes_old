<?
include('../inc/db.inc.php');
require_once('../libraries/tableobject_class.php');

if ($_POST["tg"]<>"")
{
	$PostStr = $_POST["tg"];
	$PostStr = iconv("utf-8","gbk",$PostStr);
	$strsql='update smg_tg_signup set state=1 where id='.$PostStr; 
	$Record = mysql_query($strsql) or die ("update error");
	echo "OK";
}

CloseDB();
?>