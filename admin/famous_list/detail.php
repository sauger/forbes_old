<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$year = $_REQUEST['year'];
	$searchyear = $_REQUEST['searchyear'];
	$db = get_db();
	$sql = "select a.id,name,year,pm,sr,bgl from fb_mrbd a,fb_mr b where b.id=a.mr_id and year ='".$year."' order by pm asc";
	if($search!=''){
		$sql ="select a.id,name,year,pm,sr,bgl from fb_mrbd a,fb_mr b where a.mr_id=b.id and name like '%{$search}%' ";
	}
	if($searchyear!=''){
		$sql .=" and year=".$searchyear;
	}
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
		js_include_tag('admin_pub','admin/famous/famous_list');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="6">
				 <?php if ($year != ''){ ?><a href="edit.php?year=<?php echo $year; ?>">添加名人</a> <?php } ?>  搜索　
				 <input id="search" type="text" value="<? echo $_REQUEST['search']?>">
				 年份<select id="searchyear">
				 	<option value=""></option>
					<?php 
						$sql1 = "select * from fb_mrb order by year asc";
						$record1 = $db->paginate($sql1,15);
						$count1 = count($record1);
						for($k=0;$k< $count1;$k++){
					?>
					<option <?php if($searchyear==$record1[$k]->year)echo 'selected="selected"';?> value="<?php echo $record1[$k]->year;?>"><?php echo $record1[$k]->year;?></option>
					<?php }?>
				</select>　
				<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="115">姓名</td><td width="100">年份</td><td width="110">排名</td><td width="130">收入</td><td width="100">曝光率</td><td width="210">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->year;?></td>
					<td><?php echo $record[$i]->pm;?></td>
					<td><?php echo $record[$i]->sr;?></td>
					<td><?php echo $record[$i]->bgl;?></td>
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_mrbd">
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan=6><?php paginate();?></td>
		</tr>
	</table>
</body>
</html>