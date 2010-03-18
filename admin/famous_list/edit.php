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
		$list = new table_class('fb_mrb');
		$list->find($f_bd->bd_id);
	}else{
		if($year!=''){
			$list = new table_class('fb_mrb');
			$list->find($year);
		}
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
		css_include_tag('admin','autocomplete');
		use_jquery();
		validate_form("fbd_edit");
		js_include_tag('admin/famous/edit','autocomplete.jquery','../ckeditor/ckeditor.js');
	?>
</head>
<body style="background:#E1F0F7">
	<form id="fbd_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!=''){echo "编辑名人榜单";}else{echo "添加名人榜单";}?>
			<?php if ($f_id != ''){?><a href="/admin/famous/index.php" style="cursor:pointer">返回列表</a>	<?php }?>
			<?php if ($year != ''){?><a href="detail.php?year=<?php echo $year; ?>" style="cursor:pointer">返回<?php echo $list->year?></a>	<?php }?>		
			<?php if ($id != ''){?><a href="index.php" style="cursor:pointer">返回榜单列表</a>	<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">姓名</td>
			<td width="695" align="left">
				<?php if ($year == ''){ echo $famous->name; ?>
				<input type="hidden" name="bd[mr_id]" id="mr_id" value="<?php echo $famous->id;?>">
				<?php } else { ?>
				<input value="<?php echo $famous->name;?>" id="mr_id"><span id="error"></span>
				<input type="hidden" name="bd[mr_id]" value="<?php echo $f_bd->mr_id;?>" id="h_mr_id">
				<input type="hidden" id="f_type" value="1">
				<!-- 
				<select name="bd[mr_id]">
					<?php 
						$sql = "select * from fb_mr where id not in (select mr_id from fb_mrbd a,fb_mrb b where a.bd_id = b.id and year = '{$year}')";
						$record = $db->query($sql);
						$count = count($record);
						for($i=0;$i< $count;$i++){ 
					?>
					<option value="<?php echo $record[$i]->id?>"><?php echo $record[$i]->name; ?></option>
					<?php }?>
				</select>
				-->
				<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td>榜单名称</td>
			<td align="left">
				<?php if ($year == '') { ?>
				<!-- 
				<select name="bd[bd_id]" id="bd[bd_id]">
					<?php 
						if($f_id=='')
						{
							$temp = new table_class('fb_mrbd');
							$temp->find($id);
							$f_id=$temp->mr_id;
						}
						$sql = "select * from fb_mrb where id not in (select bd_id from fb_mrbd where mr_id = '{$f_id}' and id != '{$id}') order by year asc";
						$record = $db->query($sql);
						$count = count($record);
						for($i=0;$i< $count;$i++){
					?>
					<option <?php if($f_bd->bd_id==$record[$i]->id)echo 'selected="selected"';?> value="<?php echo $record[$i]->id?>"><?php echo $record[$i]->year?></option>
					<?php }?>
				</select>
				-->
				<input id="bd_id"><span id="error"></span>
				<input type="hidden" name="bd[bd_id]" id="h_bd_id">
				<input type="hidden" id="f_type" value="2">
				<?php } else { ?>
					<?php echo $list->year;?><input type="hidden" id="bd_id" name="bd[bd_id]" value="<?php echo $year;?>"> 
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
			<td width="130">收入(万人民币)</td>
			<td align="left">
				<input type="text" name="bd[sr]" value="<?php echo $f_bd->sr;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">曝光率</td>
			<td align="left">
				<input type="text" name="bd[bgl]" value="<?php echo $f_bd->bgl;?>" class="number">
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
			<td colspan="2" width="795" align="center"><input id="finish" type="button" value="完成"></td>
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