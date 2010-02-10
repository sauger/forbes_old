<?php
	require_once('../../frame.php');
	judge_role();
	$db = get_db();
	$id = $_REQUEST['id'];
	if($id!=''){
		$record = new table_class('fb_fh');
		$record->find($id);
	}
	$xm = $record->xm;
	$sql = "select * from fb_fh_gs where fh_xm = '".$xm."'";
	$fh_gs = $db->query($sql);
	$sql_gs = "select * from fb_gs";
	$fh_gs_mc = $db->query($sql_gs);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		css_include_tag('admin','thickbox');
		use_jquery();
		validate_form("news_edit");
		js_include_tag('category_class.js', 'admin/news_pub', 'admin/news_edit');
	?>
	<script src="fhgl_fh_gs.js" type="text/javascript"></script>
</head>
<body style="background:#E1F0F7">
	<form id="fhgl_edit" enctype="multipart/form-data" action="fhgl.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　编辑富豪</td>
		</tr>
		<tr class=tr4>
			<td width="130">姓名</td><td width="695" align="left"><input id="fh_xm" type="text" name="fh_xm" value="<?php echo $record->xm;?>">
		</tr>
		<tr class=tr4>
			<td>性别</td>
			<td align="left" id="fh_xb">
				<input type="radio" name="fh_xb" value="0" <?php if($record->xb==0){ ?>checked="checked"<?php } ?>>女
				<input type="radio" name="fh_xb" value="1" <?php if($record->xb==1){ ?>checked="checked"<?php } ?>>男
			</td>
		</tr>
		<tr class=tr4>
			<td>生日</td>
			<td align="left">
				<input type="text" size="20" name="fh_sr"  id="fh_sr"  value="<?php echo $record->sr;?>">(YYYY-MM-DD)
		</tr>
		<?php for ($i=0;$i<count($fh_gs);$i++) { ?>
		<tr class=tr4>	
			<td width="130">公司</td><td width="200" align="left"><?php echo $fh_gs[$i]->gs_mc; ?><input type="button" class="del" id="gs_del" value="删除" name="<?php echo $fh_gs[$i]->id;?> "></td>
		</tr>
		<input type="hidden" id="db_table" value="fb_fh_gs">
		<?php } ?>
		<tr class=tr4>
			<td width="130">公司</td>
			<td align="left">
				<select id="gsmc" style="width:90px" class="">
					<option value="">请选择</option>
					<?php for ($i=0;$i<count($fh_gs_mc);$i++) { ?>
					<option value="<?php echo $fh_gs_mc[$i]->mc; ?>"><?php echo $fh_gs_mc[$i]->mc; ?></option>
					<?php } ?>
				</select><input type="button" id="gs_add" value="添加">
			</td>
		</tr>
		<tr id=newsshow1 class="normal_news tr4">
			<td height=265>个人经历</td><td><?php show_fckeditor('fh_grjl','Admin',true,"265",$record->grjl);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
	</form>
</body>
</html>