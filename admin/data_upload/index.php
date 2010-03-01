<?php require_once('../../frame.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/data');
		validate_form("data_upload");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="data_upload" enctype="multipart/form-data" action="post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="6" width="795">　　数据导入</td>
		</tr>
		<tr id="table_select" class=tr3>
			<td width="130">请选择要导入的表</td>
			<td width="695" align="left">
				<select name="table" id="table">
					<option value="">---请选择---</option>
					<option value="fb_fh">导入富豪</option>
					<option value="fb_mr">导入名人</option>
					<option value="rich_list">导入富豪榜单</option>
					<option value="famous_list">导入名人榜单</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布"></td>
		</tr>
	</table>
	</form>
</body>
</html>