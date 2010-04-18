<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>IPO设置</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_custom_list_type');
	if ($id)
	{
		$record->find($id);
	}
?>

<body>
	<div id=icaption>
    <div id=title>IPO设置</div>
</div>
	<form id="ipo_edit" action="edit.post.php"  method="post"> 
<div id=itable>
		<table cellspacing="1"  align="center">
		<tr class=tr4 id="list_name">
			<td class=td1 width=15%>公司名称</td>
			<td width="85%">
				<input type="text" name="mlist[name]" value="<?php echo $record->name;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>股票代码</td>
			<td><input type="text" name="mlist[year]" value="<?php echo $record->year?>"></input>(四位年，如：2010,可选)</td>
		</tr>
		<tr class="tr4">
			<td class=td1>持股数</td>
			<td>			
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>货币种类</td>
			<td><input type="text" name="mlist[recommend_priority]"></input></td>
		</tr>
		<tr class="btools">
			<td colspan="10" align="center"><input id="submit" type="submit" value="保　　　存"> 		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>"></td>
		</tr>
	</table>
</div>
	</form>
</body>
</html>