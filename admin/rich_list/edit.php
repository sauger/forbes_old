<?php
	require_once('../../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
	$f_id = $_REQUEST['f_id'];
	$year = $_REQUEST['year'];
	if($id!=''){
		$f_bd = new table_class('fb_fhbd');
		$f_bd->find($id);
		$famous = new table_class('fb_fh');
		$famous->find($f_bd->fh_id);
	}
	if($f_id!=''){
		$famous = new table_class('fb_fh');
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
			<td colspan="2" width="795">　　<?php if($id!=''){echo "编辑富豪榜单";}else{echo "添加富豪榜单";}?>
			<?php if ($f_id != ''){?><a href="/admin/rich/list.php" style="cursor:pointer">返回列表</a>	<?php }?>
			<?php if ($year != ''){?><a href="detail.php?year=<?php echo $year; ?>" style="cursor:pointer">返回列表</a>	<?php }?>	
			<?php if ($id != ''){?><a href="index.php" style="cursor:pointer">返回列表</a>	<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">姓名</td>
			<td width="695" align="left">
				<?php if ($year == ''){ echo $famous->name; ?>
				<input type="hidden" name="fh[fh_id]" value="<?php echo $famous->id;?>">
				<?php } else { ?>
				<select name="fh[fh_id]">
					<?php 
						$sql = "select * from fb_fh where id not in (select fh_id from fb_fhbd a,fb_fhb b where a.bd_id = b.id and year = '{$year}')";
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
			<td>榜单名称</td>
			<td align="left">
				<?php if ($year == '') { ?>
				<select name="fh[bd_id]" id="fh[bd_id]">
					<?php 
						if($f_id=='')
						{
							$temp = new table_class('fb_fhbd');
							$temp->find($id);
							$f_id=$temp->fh_id;
						}
						$sql = "select * from fb_fhb where id not in (select bd_id from fb_fhbd where fh_id = '{$f_id}' and id != '{$id}') order by year asc";
						$record = $db->query($sql);
						$count = count($record);
						for($i=0;$i< $count;$i++){
					?>
					<option <?php if($f_bd->bd_id==$record[$i]->id)echo 'selected="selected"';?> value="<?php echo $record[$i]->id?>"><?php echo $record[$i]->year?></option>
					<?php }?>
				</select>
				<?php } else { ?>
					<?php echo $year;?><input type="hidden" name="fh[bd_id]" value="<?php $sql1 = "select * from fb_fhb where year='".$year."'";$record1 = $db->query($sql1);echo $record1[0]->id;?>"> 
				<?php }?>
				
			</td>
		</tr>
		<tr class=tr4>
			<td>综合排名</td>
			<td align="left">
				<input type="text" name="fh[pm]" value="<?php echo $f_bd->pm;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">收入</td>
			<td align="left">
				<input type="text" name="fh[sr]" value="<?php echo $f_bd->sr;?>" class="number required">(亿元)
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">曝光率</td>
			<td align="left">
				<input type="text" name="fh[bgl]" value="<?php echo $f_bd->bgl;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">上传照片</td>
			<td align="left">
				<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
				<span id="use_fh" style="cursor:pointer;">使用名人照片（默认）</span>
				<input type="file" name="photo" id="photo"  >（请上传小于2M的照片）<?php if( $id != '') { ?><a target="_blank" href="<?php echo $f_bd->zp; ?>" >点击查看照片</a><?php }?>
				<input type="hidden" value="<?php echo $f_bd->zp;?>" id="bd_zp" name="fh[zp]">
			</td>
		</tr>
		<tr class="tr4">
			<td height=265>上榜理由</td><td><?php show_fckeditor('fh[sbly]','Admin',true,"265",$f_bd->sbly);?></td>
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
		$("#use_fh").click(function(){
			$("#bd_zp").attr('value','<?php echo $famous->fh_zp;?>');
			$(this).next().remove();
		});
	});
</script>