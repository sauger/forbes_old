<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin','thickbox');
		use_jquery();
		js_include_tag('category_class.js');
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_fh');
	if($id!=''){
		$record->find($id);
	}
?>

<body style="background:#E1F0F7">
	<form id="fhgl_edit" enctype="multipart/form-data" action="post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　编辑富豪</td>
		</tr>
		<tr class=tr4>
			<td width="130">姓名</td><td width="695" align="left"><input id="fh_xm" type="text" name="fh[xm]" value="<?php echo $record->xm;?>">
		</tr>
		<tr class=tr4>
			<td>性别</td>
			<td align="left" id="fh_xb">
				<input type="radio" name="fh[xb]" value="0" <?php if($record->xb==0){ ?>checked="checked"<?php } ?>>女
				<input type="radio" name="fh[xb]" value="1" <?php if($record->xb==1){ ?>checked="checked"<?php } ?>>男
			</td>
		</tr>
		<tr class=tr4>
			<td>年龄</td>
			<td align="left">
				<input type="text" size="20" name="fh[nl]"  id="fh_nl"  value="<?php echo $record->nl;?>">
		</tr>
		<tr class=tr4>
			<td>国籍</td>
			<td align="left">
				<input type="text" size="20" name="fh[gj]"  id="fh_gj"  value="<?php echo $record->gj;?>">
		</tr>
		<tr class=tr4>
			<td>生日</td>
			<td align="left">
				<input type="text" size="20" name="fh[sr]"  id="fh_sr"  value="<?php echo $record->sr;?>">(YYYY-MM-DD)
		</tr>
		<tr class=tr4>
			<td>年度排名</td>
			<td align="left">
				<input type="text" size="20" name="fh[ndpm]"  id="fh_ndpm"  value="<?php echo $record->ndpm;?>">
		</tr>
		<tr class=tr4>
			<td>今日排名</td>
			<td align="left">
				<input type="text" size="20" name="fh[jrpm]"  id="fh_jrpm"  value="<?php echo $record->jrpm;?>">
		</tr>
		<tr class=tr4>
			<td>个人财富</td>
			<td align="left">
				<input type="text" size="20" name="zc"  id="zc"  value="
				<?php
						$sql = "select * from fb_fh_grcf where fh_id = '".$record->id."' order by jzrq desc";
  					$record1 = $db->query($sql);
						echo strip_tags($record1[0]->zc);
				?>">
		</tr>
		<tr id=newsshow1 class="normal_news tr4">
			<td height=265>个人经历</td><td><?php show_fckeditor('fh[grjl]','Admin',true,"265",$record->grjl);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
	</form>
</body>
</html>