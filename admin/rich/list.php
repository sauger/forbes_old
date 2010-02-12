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
		js_include_tag('admin_pub','category_class','admin/gl/search');
	?>
</head>

<?php
	$content = $_REQUEST['content'];
	$type = $_REQUEST['type'];
	$db = get_db();
	if($content!= '')
	{
		if($type == '1')
		{
			$sql = "select * from fb_fh where xm like '%".trim($content)."%'";
		}
		else if ($type == '0')
		{
			if ($content == '男')
			{
				$sql = "select * from fb_fh where xb = '1'";
			}
			else if ($content == '女')
			{
				$sql = "select * from fb_fh where xb = '0'";
			}
		}
	}
	else
	{
		$sql = "select * from fb_fh";
	}
  $record = $db->paginate($sql,15);
?>

<body>
	<table width="800" border="0" id="list">
		<tr class="tr1">
			<td colspan="11">
				　<a href="edit.php">添加富豪</a>　　　搜索　
				<input id="content" type="text" value="<? echo $_REQUEST['content']?>"><select id="type" style="width:90px" class="">
					<option value="1" <?php if($_REQUEST['type']=="1"){?>selected="selected"<? }?> >姓名</option>
					<option value="0" <?php if($_REQUEST['type']=="0"){?>selected="selected"<? }?> >性别</option>
				</select>
				<input type="button" value="搜索" id="search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="115">姓名</td><td width="50">性别</td><td width="50">年龄</td><td width="85">国籍</td><td width="130">生日</td><td width="130">年度排名</td><td width="130">今日排名</td><td width="130">个人财富</td><td width="130">拥有公司</td><td width="230">个人经历</td><td width="210">操作</td>
		</tr>
		<?php
			//--------------------
			$len = count($record);
			for($i=0;$i< $len ;$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><a href="<?php echo $url;?>" target="_blank"><?php echo strip_tags($record[$i]->xm);?></a></td>
					<td>
						<?php if($record[$i]->xb==0) {echo 女;} else if($record[$i]->xb==1) {echo 男;} else {echo 未知;} ?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->nl);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->gj);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->sr);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->ndpm);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->jrpm);?>
					</td>
					<td>
						<?php
								  $sql1 = "select * from fb_fh_grcf where fh_id = '".$record[$i]->id."' order by jzrq desc";
  								$record1 = $db->query($sql1);
									echo strip_tags($record1[0]->zc);
						?>
					</td>
					<td>
						<?php 
									$sql2 = "select * from fb_fh_gs a,fb_gs b where a.gs_id= b.id and a.fh_id = '".$record[$i]->id."'";
									$record2 = $db->query($sql2);
									$len1 = count($record2);
									echo strip_tags($record2[0]->mc);
									for ($k=1;$k< $len1;$k++)
									{
										echo ",".strip_tags($record2[$k]->mc);
									}
						?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->grjl);?>
					</td>
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_fh">
		<?php
			}
		?>
		<tr><td colspan="5" align="right"><?php paginate(); ?></td></tr>
	</table>
</body>
</html>