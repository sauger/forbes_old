<?php
	require_once('../../frame.php');
	
	$db = get_db();
	$sql = "select * from fb_mr";
	$record = $db->query($sql);
	$count = count($record);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">
				　<a href="edit.php">添加名人</a>　　　搜索　
				<input id="title" type="text" value="<? echo $_REQUEST['title']?>"><select id="type" style="width:90px" class="">
					<option value="1" <? if($_REQUEST['type']=="1"){?>selected="selected"<? }?> >姓名</option>
					<option value="0" <? if($_REQUEST['type']=="0"){?>selected="selected"<? }?> >性别</option>
				</select>
				<input type="button" value="搜索" id="search_fh" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="215">姓名</td><td width="210">职业</td><td width="130">性别</td><td width="210">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->zy;?></td>
					<td><?php echo $record[$i]->xb;?></td>
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_mr">
		<?php
			}
		?>
	</table>
</body>
</html>