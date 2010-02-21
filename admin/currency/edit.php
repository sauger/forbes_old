<?php
	require_once('../../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
	if($id!=''){
		$coin = new table_class('fb_currency');
		$coin->find($id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form("coin_edit");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="coin_edit" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　编辑货币</td>
		</tr>
		<tr class=tr4>
			<td width="130">名称</td>
			<td width="695" align="left">
				<input type="text" name="coin[hb_nc]" value="<?php echo $coin->hb_nc;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">单位</td>
			<td width="695" align="left">
				<input type="text" name="coin[hb_dv]" value="<?php echo $coin->hb_dv;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">国家</td>
			<td width="695" align="left">
				<input type="text" name="coin[hb_gj]" value="<?php echo $coin->hb_gj;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">汇率</td>
			<td width="695" align="left">
				<input type="text" name="coin[hb_hl]" value="<?php echo $coin->hb_hl;?>" class="number required">
				请以人民币汇率为准
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
</body>
</html>