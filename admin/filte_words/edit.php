<?php
	require_once('../../frame.php');
	judge_role();
	$id=intval($_REQUEST['id']);
	$table = new table_class('fb_filte_words');
	if($id)	{
		$table = $table->find($id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网-敏感词管理</title>
	<?
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("user_form");
?>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo "修改";}else{echo "添加";}?>敏感词</div>
	  <a href="list.php" id=btn_back></a>
	</div>
<div id=itable>
	<table cellspacing="1"  align="center">
	<form id="user_form" method="post" action="post.php">
		<tr class=tr3>
			<td width=200>敏感词：(多个词之间可以用|分割)</td>
			<td width=645 align="left"><input type="text" name="post[text]" value="<?php echo $table->text;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
	</table>
</div>
</body>
</html>
