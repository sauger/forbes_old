<?php
include('../frame.php');
$db=get_db();
if ($_POST["type"]=="tgcan")
{
	$StrSql='update smg_tg set isadopt=0 where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";
}
if ($_POST["type"]=="tgpub")
{

	$StrSql='update smg_tg set isadopt=1 where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";

}
if ($_POST["type"]=="tgdel")
{
	$StrSql='delete from smg_tg where id='.$_POST['id'];
	$Record = $db->execute($StrSql);
	echo "OK";
}
if ($_POST["type"]=="deltg")
{

	$strsql='delete from smg_tg_signup where id='.$_POST['id']; 
	$Record = $db->execute($strsql);
	echo "OK";
}
if ($_POST["type"]=="shopdel")
{
	$StrSql='delete from smg_shop where id='.$_POST["id"];
	$Record = $db->execute($StrSql);
	$StrSql='delete from smg_shop_signup where tg_id='.$_POST["id"]; 
	$Record = $db->execute($StrSql);
	$StrSql='delete from smg_comment where resource_id='.$_POST["id"].' and resource_type="shop"'; 
	$Record = $db->execute($StrSql);
	echo "OK";
}

if ($_POST["type"]=="shopcan")
{
	$StrSql='update smg_shop set isadopt=0 where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";
}
if ($_POST["type"]=="shoppub")
{

	$StrSql='update smg_shop set isadopt=1 where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";

}
if($_POST["type"]=="addleaderuser")
{
	$userid=$db->query('select id from smg_user_real where loginname="'.$_POST['userid'].'"');
	$StrSql='insert into smg_leader_role(user_id,rights,createtime) value ('.$userid[0]->id.',"'.$_POST['right'].'",now())'; 
	$Record = $db->execute($StrSql);
	echo "OK";
}
if($_POST["type"]=="delleaderuser")
{
	$StrSql='delete from smg_leader_role where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";
}
?>
