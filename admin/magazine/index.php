<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$year = $_REQUEST['year'];
	$db = get_db();
	$sql = "select * from fb_magazine";
	if($search!=''){
		$sql .= " where name like '%".$search."%'";
	}
	$sql .= " order by publish_data desc";
	$record = $db->paginate($sql,15);
	$count = count($record);
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
		js_include_tag('admin_pub','admin/magazine/index');
	?>
</head>

<body>
<div id=icaption>
    <div id=title>杂志管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>	

<div id=isearch>
		<input id="search" type="text" value="<? echo $_REQUEST['search']?>">
		<input type="button" value="搜索" id="search_button">
</div>

<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="50%">杂志名称</td><td width="25%">发布时间</td><td width="25%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
		<tr class="tr3" id="<?php echo $record[$i]->id;?>">
			<td><?php echo $record[$i]->name;?></td>
			<td><?php echo substr($record[$i]->publish_data,0,10);?></td>
			<td>
			<?php if($record[$i]->is_adopt=="1"){?>
			<span style="cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>" title="取消设为最新"><img src="/images/btn_apply.png" border="0"></span>
			<?php }?>
			<?php if($record[$i]->is_adopt=="0"){?>
			<span style="cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="设为最新"><img src="/images/btn_unapply.png" border="0"></span>
			<?php }?>
			<a href="img_list.php?id=<?php echo $record[$i]->id;?>" title="管理图片"><img src="/images/btn_add.png" border="0"></a>
			<a href="list_edit.php?id=<?php echo $record[$i]->id;?>" title="关联文章"><img src="/images/btn_config2.png" border="0"></a>
			<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" title="编辑" style="cursor:pointer"><img src="/images/btn_edit.png" border="0"></a>
			<span style="cursor:pointer;color:#FF0000" class="del" title="删除" name="<?php echo $record[$i]->id;?>"><img src="/images/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<?php
			}
		?>
		<tr class="btools">
				<td colspan=10>
					<?php paginate("",null,"page",true);?>
					<input type="hidden" id="db_table" value="fb_magazine">
				</td>
		</tr>
	</table>	
</div>		
</body>
</html>