<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>编辑</title>
	<?php 
		require_once('../../frame.php');
		$db = get_db();
		$id = intval($_REQUEST['id']);
		$list_id = intval($_REQUEST['list_id']);
		if(!$list_id){
			alert('invalid request!');
			redirect('index.php');
			die();
		}
		css_include_tag('admin','autocomplete');
		use_jquery();
		validate_form("fbd_edit");
		js_include_tag('admin/rich/edit','autocomplete.jquery','../ckeditor/ckeditor.js');
		$list = new table_class('fb_custom_list_type');
		$list->find($list_id);
		$item = new table_class('fb_rich_list_items');
		if($id){
			$item->find($id);
		}		
	?>
</head>
<body style="background:#E1F0F7">
	<form id="fbd_edit" enctype="multipart/form-data" action="rich_list_item.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id){echo "编辑富豪榜单";}else{echo "添加富豪榜单";}?> <a href="javascript:history.go(-1)"><img src="/images/btn_back.png" border=0></a></td>
		</tr>
		<tr class=tr4>
			<td width="130">姓名</td>
			<td width="695" align="left">
				<input type="text" name="item[name]" value="<?php echo $item->name;?>"></input>
			</td>
		</tr>
		<tr class="tr4">
			<td width="130">年龄</td>
			<td align="left">
				<input type="text" name="item[age]" value="<?php echo $item->age;?>"></input>
			</td>
		</tr>
		<tr class="tr4">
			<td width="130">性别</td>
			<td align="left">
				<input type="text" name="item[gender]" value="<?php echo $item->gender;?>"></input>
			</td>
		</tr>
		<tr class=tr4>
			<td>综合排名</td>
			<td align="left">
				<input type="text" name="item[overall_order]" value="<?php echo $item->overall_order;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">个人财富</td>
			<td align="left">
				<input type="text" name="item[fortune]" value="<?php echo $item->fortune;?>" class="number required">(<?php echo $list->unit;?>)
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">公司</td>
			<td align="left">
				<input type="text" name="item[company]" value="<?php echo $item->company;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">资产来源</td>
			<td align="left">
				<input type="text" name="item[industry]" value="<?php echo $item->industry;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">地区</td>
			<td align="left">
				<input type="text" name="item[zone]" value="<?php echo $item->zone;?>">
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
				<textarea rows="10" cols="60" name="item[reason]"><?php echo $item->reason;?></textarea>
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="finish" type="submit" value="保存"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="list_id" value="<?php echo $list_id;?>"></input>
	</form>
</body>
</html>