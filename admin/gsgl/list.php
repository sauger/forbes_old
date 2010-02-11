<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/gl/search');
	?>
</head>

<?php
	$content = $_REQUEST['content'];
	$type = $_REQUEST['type'];
	$db = get_db();
	if($content!= '')
	{
		$sql = "select * from fb_gs where ".$type." like '%".trim($content)."%'";
	}
	else
	{
		$sql = "select * from fb_gs";
	}
	$record = $db->paginate($sql,15);
?>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="8">
				　<a href="edit.php">添加公司</a>　　　搜索　
				<input id="content" type="text" value="<? echo $_REQUEST['content']?>"><select id="type" style="width:90px" class="">
					<option value="mc" <? if($_REQUEST['type']=="mc"){?>selected="selected"<? }?> >名称</option>
					<option value="sf" <? if($_REQUEST['type']=="sf"){?>selected="selected"<? }?> >省份</option>
					<option value="cs" <? if($_REQUEST['type']=="cs"){?>selected="selected"<? }?> >城市</option>
					<option value="dz" <? if($_REQUEST['type']=="dz"){?>selected="selected"<? }?> >地址</option>
					<option value="wz" <? if($_REQUEST['type']=="wz"){?>selected="selected"<? }?> >网址</option>
					<option value="ssdm" <? if($_REQUEST['type']=="ssdm"){?>selected="selected"<? }?> >上市公司代码</option>
				</select>
				<input type="button" value="搜索" id="search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="100">名称</td><td width="40">国家</td><td width="40">省份</td><td width="40">城市</td><td width="100">地址</td><td width="80">网址</td><td width="80">介绍</td><td width="100">上市公司代码</td><td width="50">操作</td>
		</tr>
		<?php
			$len = count($record);
			for($i=0;$i< $len;$i++){
		?>
				<tr class="tr3" id=<?php echo $record[$i]->id;?> >
					<td><a href="<?php echo $url;?>" target="_blank"><?php echo strip_tags($record[$i]->mc);?></a></td>
					<td>
						<?php echo strip_tags($record[$i]->gj);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->sf);?>
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
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_gs">
		<?php
			}
		?>
		<tr><td colspan="8" align="right"><?php paginate(); ?></td></tr>
	</table>
</body>
</html>