<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$level = $_REQUEST['level'];
	$db = get_db();
	$sql = "select * from fb_city where 1=1";
	if($search!=''){
		$sql .= " and (name like '%{$search}%' or province_name like '%{$search}%')";
	}
	if($level!=''){
		$sql .=" and level=$level";
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
		js_include_tag('admin_pub');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="4">
				　城市管理 <a href="edit.php">添加城市</a>   搜索　
				 <input id="search" type="text" value="<? echo $_REQUEST['search']?>">　
				 <select id="level">
				 	<option value=""></option>
					<option <?php if($level==1)echo 'selected="selected"';?> value="1">直辖市</option>
					<option <?php if($level==2)echo 'selected="selected"';?> value="2">省会城市</option>
					<option <?php if($level==3)echo 'selected="selected"';?> value="3">计划单列市</option>
					<option <?php if($level==4)echo 'selected="selected"';?> value="4">地级市</option>
					<option <?php if($level==5)echo 'selected="selected"';?> value="5">县级市</option>
				 </select>
				<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="200">城市名称</td><td width="200">所属省份</td><td width="150">行政级别</td><td width="200">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->province_name;?></td>
					<td>
						<?php
							switch($record[$i]->level){
								case 1:echo "直辖市";break;
								case 2:echo "省会城市";break;
								case 3:echo "计划单列市";break;
								case 4:echo "地级市";break;
								case 5:echo "县级市";break;
								default:echo "其他";
							}
						?>
					</td>
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_city">
		<?php
			}
		?>
			<tr class="tr3">
				<td colspan=4><?php paginate();?></td>
			</tr>
		</table>	

	</body>
</html>
<script>
$(function(){
	$("#search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_b').click(function(){
		search();
	})
})

function search(){
	window.location.href="?search="+encodeURI($("#search").attr('value'))+"&level="+$("#level").val();
}
</script>