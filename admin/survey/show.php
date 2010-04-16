<?php
	require_once('../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
	$key = $_REQUEST['key'];
	$sql = "select * from hoau_question_record where 1=1 and problem_id=$id";
	$sql = $sql." order by created_at";
	$record = $db->query($sql);
	$count = count($record);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>问卷调查</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
		rights($_SESSION["hoaurights"],'7');
	?>
</head>
<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="5" width="795">
			 <a href="result.php">返回</a>
			</td>
		</tr>
		<tr class="tr2">
			<td width="400">创建时间</td><td width="350">操作</td>
		</tr>
		<? for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $record[$i]->id;?>">
			<td><?php echo date_format($record[$i]->created_at,'Y-m-d');?></td>
			<td>
				<a href="info.php?id=<?php echo $id;?>&r_id=<?php echo $record[$i]->id?>" style="color:#000000; text-decoration:none">查看</a>
			</td>
		</tr>
		<?  }?>
	</table>
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>

<script>
	
	$("#project_search").click(function(){
				window.location.href="?key="+$("#search_text1").attr('value');
	});
	
	$('#search_text1').keydown(function(e){
		if(e.keyCode == 13){
			window.location.href="?key="+$("#search_text1").attr('value');
		}
	});
	
</script>