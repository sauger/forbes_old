<?php
	require_once('../../frame.php');
	judge_role();
	
	$title = $_REQUEST['title'];
	$type = $_REQUEST['type'];
	$db = get_db();
	$sql = "select * from fb_fh";
	$record = $db->query($sql);
	if($title!= '')
	{
		if($type == '1')
		{
			$sql = "select * from fb_fh where xm like '%".trim($title)."%'";
			$record = $db->query($sql);
		}
		else if ($type == '0')
		{
			if ($title == '男')
			{
				$sql = "select * from fb_fh where xb = '1'";
				$record = $db->query($sql);
			}
			else if ($title == '女')
			{
				$sql = "select * from fb_fh where xb = '0'";
				$record = $db->query($sql);
			}
		}
	}
	//var_dump($c)
	//var_dump($sql)
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
	?>
	<script src="fhgl_search.js" type="text/javascript"></script>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">
				　<a href="fhgl_edit.php">添加富豪</a>　　　搜索　
				<input id=title type="text" value="<? echo $_REQUEST['title']?>"><select id="type" style="width:90px" class="">
					<option value="1" <? if($_REQUEST['type']=="1"){?>selected="selected"<? }?> >姓名</option>
					<option value="0" <? if($_REQUEST['type']=="0"){?>selected="selected"<? }?> >性别</option>
				</select>
				<input type="button" value="搜索" id="search_fh" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="115">姓名</td><td width="110">性别</td><td width="130">生日</td><td width="230">个人经历</td><td width="210">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><a href="<?php echo $url;?>" target="_blank"><?php echo strip_tags($record[$i]->xm);?></a></td>
					<td>
						<?php if($record[$i]->xb==0) {echo 女;} else if($record[$i]->xb==1) {echo 男;} else {echo 未知;} ?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->sr);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->grjl);?>
					</td>
					<td>
						<a href="fhgl_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_fh">
		<?php
			}
			//--------------------
		?>
	</table>
</body>
</html>