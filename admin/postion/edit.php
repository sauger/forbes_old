<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
		validate_form("industry");
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$pid = $_REQUEST['pid'];
	$record = new table_class('fb_position');
	if ($id != '')
	{
		$record->find($id);
	}
?>

<body style="background:#E1F0F7">
	<form id="industry" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　 <?php if($id!='')echo "编辑页面";else echo "添加页面";?> <a href="index.php"><img src="/images/btn_back.png" border=0></a></td>
		</tr>
		<tr class=tr4>
			<td class=td1>页面名称</td>
			<td width="665" align="left"><input type="text" name="name" value="<?php echo $record->name;?>">
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center">
				<input id="submit" type="submit" value="完成">
				<input type="hidden" name="id" id="id"  value="<?php echo $record->id;?>">
				<input type="hidden" name="pid"  value="<?php echo $pid;?>">
			</td>
		</tr>	
	</table>

	</form>
</body>
</html>