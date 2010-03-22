<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>自定义榜单编辑</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/list/edit');
		validate_form("list_edit");
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

<body style="background:#E1F0F7">
	<form id="list_edit" action="edit.post.php" enctype="multipart/form-data"  method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id){echo '编辑榜单';}else{echo '添加榜单';}?>　<button type="button" id="add_attribute" <?php if($record->list_type != 1) echo "style='display:none;'"?>>添加一列</button></td>
		</tr>
		<tr class=tr4 id="list_name">
			<td width="130">榜单名称</td>
			<td width="695" align="left">
				<input type="text" name="mlist[name]" value="<?php echo $record->name;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">榜单年份</td><td width="695" align="left"><input type="text" name="mlist[year]" value="<?php echo $record->year?>"></input>(四位年，如：2010,可选)</td>
		</tr>
		<tr class="tr4">
			<td width="130">榜单类型</td>
			<td align="left">
			
				<select name="mlist[list_type]" id="list_type"  <?php if($id) echo "disabled=true";?>>
					<option value="1">自定义榜单</option>
					<option value="2">年度富豪榜</option>
					<option value="3">年度名人榜</option>
				</select>
				<script type="text/javascript">$('#list_type').val('<?php echo $record->list_type;?>');</script>
				<?php if($id){?>
				<input name="mlist[list_type]" value="<?php echo $record->list_type;?>" type="hidden"></input>
				<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">推荐优先级</td><td width="695" align="left"><input type="text" name="mlist[recommend_priority]"></input></td>
		</tr>
		<tr class=tr4>
			<td width="130">榜单图片</td>
			<td width="695" align="left"><input type="file" name="image_src"></input><?php if($record->image_src){?> <a href="<?php echo $record->image_src;?>" target="_blank" style="color:blue;">查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td width="130">榜单位置</td>
			<td width="695" align="left">
				<select name="mlist[position]" id="list_position" value="<?php echo $record->position;?>">
					<option value="1">富豪</option>
					<option value="2">投资</option>
					<option value="3">公司</option>
					<option value="4">城市</option>
					<option value="5">名人</option>
					<option value="6">体育</option>
					<option value="7">科技</option>
					<option value="8">教育</option>
				</select>
				<script type="text/javascript">$('#list_position').val('<?php echo $record->position;?>');</script>
			</td>
		</tr>
		<tr class=tr4 <?php if($record->list_type=='1') echo "style='display:none;'"?>>
			<td width="130">财富单位</td><td width="695" align="left"><select name="mlist[unit]"><option value="亿人民币">亿人民币</option><option value="亿美元"<?php if($record->unit == '亿美元') echo " selected='selected'"?> >亿美元</option></select></td>
		</tr>
		<tr class=tr3>
			<td width="130">说明</td><td width="695" align="left"><textarea rows="10" cols="60" name="mlist[comment]"><?php echo $record->comment;?></textarea> </td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="保　　　存"></td>
		</tr>
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
	</form>
</body>
</html>