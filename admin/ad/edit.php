<?php
	require_once('../../frame.php');
	$role = judge_role();
	$id = $_REQUEST['id'];
	if($id!=''){
		$ad = new table_class('fb_ad_ggw');
		$ad->find($id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		validate_form("ad");
	?>
</head>
<body>
	<table width="795" border="0" id="list">
	<form id="ad" method="post" action="/pub/pub.post.php">
		<tr class=tr1>
			<td colspan="2">　<?php if($id!='')echo '编辑广告位';else echo '添加广告位';?></td>
		</tr>
		<tr class=tr3>
			<td width=150>名称：</td>
			<td width=645 align="left"><input type="text" name="post[name]" class="required" value="<?php echo $ad->name;?>"></td>
		</tr>
		<tr class=tr3>
			<td width=150>选择频道：</td>
			<td width=645 align="left">
				<select name="post[pd_id]" class="required" value="<?php echo $ad->name;?>">
					<option value=''>请选择</option>
					<?php
						$db = get_db();
						$record = $db->query("select * from fb_ad_pd");
						for($i=0;$i<count($record);$i++){
					?>
					<option value="<?php echo $record[$i]->id;?>"><?php echo $record[$i]->name;?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td>描述：</td>
			<td align="left"><input type="text" name="post[description]"  value="<?php echo $ad->description?>"></td>
		</tr>
		<tr class=tr3>
			<td>优先级：</td>
			<td align="left"><input type="text" name="post[priority]" class="number"  value="<?php echo $ad->priority?>"></td>
		</tr>
		<tr class=tr3>
			<td>像素大小：</td>
			<td align="left"><input type="text" name="post[size]" value="<?php echo $ad->size;?>">格式宽*高，单位是像素，例如800*600</td>
		</tr>

		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="db_table" value="fb_ad_ggw">
		<input type="hidden" name="url" value="/admin/ad/list.php">
		<input type="hidden" name="post_type" value="edit">
	</form>
	</table>
</body>
</html>
