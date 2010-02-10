<?php
	require_once('../../frame.php');
	judge_role();
	$id = $_REQUEST['id'];
	if($id!=''){
		$record = new table_class('fb_gs');
		$record->find($id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>公司编辑</title>
	<?php 
		css_include_tag('admin','thickbox');
		use_jquery();
		validate_form("news_edit");
		js_include_tag('category_class.js', 'admin/news_pub', 'admin/news_edit');
	?>
</head>
<body style="background:#E1F0F7">
	<form id="gsgl_edit" enctype="multipart/form-data" action="gsgl.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　编辑公司</td>
		</tr>
		<tr class=tr4>
			<td width="130">公司名称</td>
			<td width="695" align="left"><input id="gs_mc" type="text" name="gs_mc" value="<?php echo $record->mc;?>">
		</tr>
		<tr class=tr4>
			<td>省份</td>
			<td width="695" align="left"><input id="gs_sf" type="text" name="gs_sf" value="<?php echo $record->sf;?>">
		</tr>
		<tr class=tr4>
			<td>城市</td>
			<td width="695" align="left"><input id="gs_cs" type="text" name="gs_cs" value="<?php echo $record->cs;?>">
		</tr>
		<tr class=tr4>
			<td>地址</td>
			<td width="695" align="left"><input id="gs_dz" type="text" name="gs_dz" value="<?php echo $record->dz;?>">
		</tr>
		<tr class=tr4>
			<td>网址</td>
			<td width="695" align="left"><input id="gs_wz" type="text" name="gs_wz" value="<?php echo $record->wz;?>">
		</tr>
		<tr id=newsshow1 class="normal_news tr4">
			<td height=265>介绍</td><td><?php show_fckeditor('gs_js','Admin',true,"265",$record->js);?></td>
		</tr>
		<tr class=tr4>
			<td>上市公司代码</td>
			<td width="695" align="left"><input id="gs_ssdm" type="text" name="gs_ssdm" value="<?php echo $record->ssdm;?>">
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id"  value="<?php echo $record->id; ?>">
	</form>
</body>
</html>