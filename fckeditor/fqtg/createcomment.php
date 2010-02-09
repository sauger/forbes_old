<?php
  require_once('../libraries/tableobject_class.php');
  require_once('../inc/pubfun.inc.php');
  $cookie=(isset($_COOKIE['smg_username'])) ? $_COOKIE['smg_username'] : 0;
  echo $cookie;
  $commenter=$_REQUEST['commenter'];
  $vowels = array("~", "!", "@", "#", "$", "%", "^", "&", "*", "(",")");
  $commenter=str_replace($vowels,"",$commenter);
  if($commenter=="小番茄"||$commenter=="番茄小编")
  {
  		if($cookie!="01004660"&&$cookie!="01004645")
  		{
  			echo '<script language=javascript>alert("特殊名字仅番茄网管理员才能使用！")</script>';
				echo '<script language=javascript>window.location.href="/fqtg/fqtg.php?id='.$_REQUEST['tgid'].';</script>';
				exit;	
  		}
  }
  $comment = new TableObject('smg_tg_comment');
  $comment->commenter = $_REQUEST['commenter'];
  $comment->content = $_REQUEST['content'];
  $comment->createtime = Date('Y-m-d H:i:s');
  $comment->ip = getenv('REMOTE_ADDR');
  $comment->tg_id = $_REQUEST['tgid'];
  //print_r($comment);
  if (!$comment->Insert('id'))
  die(mysql_error());
  redirecturl("/fqtg/fqtg.php?id=".$_REQUEST['tgid']);
?>