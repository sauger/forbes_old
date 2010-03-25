<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
	include '../../frame.php';
	require_role('admin');
	use_jquery();
	css_include_tag('admin','thickbox');
	$rich_id = intval($_REQUEST['rich_id']);
	if(!$rich_id){
		alert('invalid request!');
		redirect('list.php');
		die();
	}
	$rich = new table_class('fb_rich');
	$rich->find($rich_id);
	$db = get_db();
	$lists = $db->query("select id,name from fb_custom_list_type where list_type = 2");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="gsgl_edit" enctype="multipart/form-data" action="add_to_list.post.php" method="post"> 
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="2" width="795">加入年度富豪榜<a href="list.php" style="cursor:pointer">返回列表</a></td>
		</tr>
		<tr class="tr4">
			<td width="130">富豪名称</td>
			<td width="695" align="left"><?php echo $rich->name;?><input type="hidden" name="item[name]" value="<?php echo $rich->name;?>"></td>
		</tr>
		<tr class=tr4>
			<td width="130">榜单名称</td>
			<td align="left">
				<select name="item[list_id] style="width:90px">
					<?php 
						$len = count($lists);
						for ($i=0;$i<$len;$i++) { ?>
					<option value="<?php echo $lists[$i]->id;?>"><?php echo $lists[$i]->name; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		
		<tr class="tr4">
			<td width="130">年龄</td>
			<td align="left">
				<input type="text" name="item[age]" value="<?php echo intval(date('Y')) - $rich->birthday;?>"></input>
			</td>
		</tr>
		<tr class="tr4">
			<td width="130">性别</td>
			<td align="left">
				<input type="text" name="item[gender]" value="<?php echo $rich->gender;?>"></input>
			</td>
		</tr>
		<tr class=tr4>
			<td>综合排名</td>
			<td align="left">
				<input type="text" name="item[overall_order]" value="0" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">个人财富</td>
			<td align="left">
				<input type="text" name="item[fortune]" value="0" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">公司</td>
			<td align="left">
				<input type="text" name="item[company]" value="" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">资产来源</td>
			<td align="left">
				<input type="text" name="item[industry]" value="" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">地区</td>
			<td align="left">
				<input type="text" name="item[zone]" value="">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">上传照片</td>
			<td align="left">
				<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
				<input type="file" name="item[image]">（请上传小于2M的照片）<?php if($item->image){?><a target="_blank" href="<?php echo $item->image?>">点击查看照片</a><?php }?>
			</td>
		</tr>
		<tr class="tr4">
			<td height=265>上榜理由</td>
			<td align="left">
				<textarea rows="10" cols="60" name="item[reason]"></textarea>
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="item[rich_id]"  value="<?php echo $rich_id?>">
	</form>
</body>
</html>
