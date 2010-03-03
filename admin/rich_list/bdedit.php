<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin','thickbox');
		use_jquery();
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_fhb');
	if ($id != '')
	{
		$record->find($id);
	}
?>

<body style="background:#E1F0F7">
	<form id="fhgl_edit" enctype="multipart/form-data" action="bdedit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　编辑榜单</td>
		</tr>
		<tr class=tr4>
			<td width="130">榜单名称</td><td width="695" align="left"><input id="fhb_year" type="text" name="fhb[year]" value="<?php echo $record->year;?>"></td>
		</tr>
		<tr class=tr4>
			<td width="130">财富单位</td><td width="695" align="left"><select name="fhb[unit]"><option value="亿人民币">亿人民币</option><option value="亿美元"<?php if($record->unit == '亿美元') echo " selected='selected'"?> >亿美元</option></select></td>
		</tr>
		<tr class=tr4>
			<td width="130">榜单年份</td><td width="695" align="left"><input type="text" name="fhb[publish_year]" value="<?php echo $record->publish_year?>"></input>(四位年，如：2010)</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
	</form>
</body>
</html>