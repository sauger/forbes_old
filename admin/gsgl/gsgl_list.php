<?php
	require_once('../../frame.php');
	judge_role();
	
	$db = get_db();
	$c = array();
	$sql = "select * from fb_gs";
	$record = $db->paginate($sql,5);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','category_class');
		$category = new category_class('news');
		$category->echo_jsdata();		
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="8">
				　<a href="gsgl_edit.php">添加公司</a>　　　搜索　
				<input id=title type="text" value="<? echo $_REQUEST['title']?>"><span id="span_category"></span><select id=adopt style="width:90px" class="select_new">
					<option value="">姓名</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>性别</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>生日</option>
				</select>
				<span id="span_category"></span>
				<input type="button" value="搜索" id="search_new" style="border:1px solid #0000ff; height:21px">
				<input type="hidden" value="<?php echo $category_id;?>" id="category">
			</td>
		</tr>
		<tr class="tr2">
			<td width="100">名称</td><td width="40">省份</td><td width="40">城市</td><td width="100">地址</td><td width="80">网址</td><td width="80">介绍</td><td width="100">上市公司代码</td><td width="50">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><a href="<?php echo $url;?>" target="_blank"><?php echo strip_tags($record[$i]->mc);?></a></td>
					<td>
						<?php echo strip_tags($record[$i]->sf); ?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->cs);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->dz);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->wz);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->js);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->ssdm);?>
					</td>
					<td>
						<a href="gsgl_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_gs">
		<?php
			}
			//--------------------
		?>
	</table>
</body>
</html>