<?php
	require_once('../../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
	$f_id = $_REQUEST['f_id'];
	$year = $_REQUEST['year'];
	if($id!=''){
		$f_bd = new table_class('fb_mrbd');
		$f_bd->find($id);
		$famous = new table_class('fb_mr');
		$famous->find($f_bd->mr_id);
	}
	if($f_id!=''){
		$famous = new table_class('fb_mr');
		$famous->find($f_id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>编辑</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form("fbd_edit");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="fbd_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!=''){echo "编辑名人榜单";}else{echo "添加名人榜单";}?></td>
		</tr>
		<tr class=tr4>
			<td width="130">姓名</td>
			<td width="695" align="left">
				<?php if ($year == ''){ echo $famous->name; ?>
				<input type="hidden" name="bd[mr_id]" value="<?php echo $famous->id;?>">
				<?php } else { ?>
				<select name="bd[mr_id]">
					<?php 
						$sql = "select * from fb_mr where id not in (select mr_id from fb_mrbd where year = '{$year}')";
						$record = $db->query($sql);
						$count = count($record);
						for($i=0;$i< $count;$i++){ 
					?>
					<option value="<?php echo $record[$i]->id?>"><?php echo $record[$i]->name; ?></option>
					<?php }?>
				</select>
				<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td>年份</td>
			<td align="left">
				<?php if ($year == '') { ?>
				<select name="bd[year]" id="bd[year]">
					<?php 
						$sql = "select * from fb_mrb where year not in (select year from fb_mrbd where mr_id = '{$f_id}') order by year asc";
						$record = $db->query($sql);
						$count = count($record);
						for($i=0;$i< $count;$i++){
					?>
					<option <?php if($f_bd->year==$record[$i]->year)echo 'selected="selected"';?> value="<?php echo $record[$i]->year?>"><?php echo $record[$i]->year?></option>
					<?php }?>
				</select>
				<?php } else { ?>
					<?php echo $year;?><input type="hidden" name="bd[year]" value="<?php echo $year;?>"> 
				<?php }?>
				
			</td>
		</tr>
		<tr class=tr4>
			<td>综合排名</td>
			<td align="left">
				<input type="text" name="bd[pm]" value="<?php echo $f_bd->pm;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">收入</td>
			<td align="left">
				<input type="text" name="bd[sr]" value="<?php echo $f_bd->sr;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">曝光率</td>
			<td align="left">
				<input type="text" name="bd[bgl]" value="<?php echo $f_bd->bgl;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">上传照片</td>
			<td align="left">
				<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
				<span id="use_mr" style="cursor:pointer;">使用名人照片</span>
				<input type="file" name="photo" id="photo"  >（请上传小于2M的照片）<?php if($id!=''){?><a target="_blank" href="<?php echo $f_bd->zp?>">点击查看照片</a><?php }?>
				<input type="hidden" value="<?php echo $f_bd->zp;?>" id="bd_zp" name="bd[zp]">
			</td>
		</tr>
		<tr class="tr4">
			<td height=265>上榜理由</td><td><?php show_fckeditor('bd[sbly]','Admin',true,"265",$f_bd->sbly);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
</body>
</html>

<script>
	$(function(){
		$("#use_mr").click(function(){
			$("#bd_zp").attr('value','<?php echo $famous->mr_zp;?>');
			$(this).next().remove();
		});
	});
</script>