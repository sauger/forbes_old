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
		js_include_tag('category_class.js','admin_pub');
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_fh');
	if($id!=''){
		$record->find($id);
	}
	$sql_fh_gs = "select * from fb_fh a,fb_gs b,fb_fh_gs c where c.fh_id = a.id and c.gs_id = b.id and c.fh_id ='".$id."'";
	$record2 = $db-> query($sql_fh_gs);
	$sql_gs = "select * from fb_gs";
	$gs_id = $db->query($sql_gs);
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
		

		<?php $len = count($record2); for ($i=0;$i< $len;$i++) { ?>
		<tr class=tr4 id=<?php echo $record2[$i]->id;?>>	
			<td width="130">公司</td><td width="200" align="left"><?php echo $record2[$i]->mc; ?><input type="button" value= "删除" class="del" name="<?php echo $record2[$i]->id;?>"></td> 
		</tr>
		<input type="hidden" id="db_table" value="fb_fh_gs">
		<?php } ?>
		<tr class=tr4>
			<td width="130">公司</td>
			<td align="left">
				<select id="gsid" name="gsid" style="width:90px" class="">
					<option value="">请选择</option>
					<?php $len1 = count($gs_id); for ($i=0;$i< $len1;$i++) { ?>
					<option value="<?php echo $gs_id[$i]->id; ?>"><?php echo $gs_id[$i]->mc; ?></option>
					<?php } ?>
				</select><input type="submit" value="添加">
			</td>
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