<?php
	require_once('../../frame.php');
	$db = get_db();
	$id = intval($_REQUEST['id']);
	$key = $_REQUEST['search'];
	$problem = new table_class('fb_survey');
	$problem->find($id);
	$sql = "select * from fb_survey_question where 1=1 and survey_id=$id";
	if(!empty($key)){
		$sql = $sql." and name like '%{$key}%'";
	}
	$sql = $sql." order by priority";
	$record = $db->query($sql);
	$count = $db->record_count;
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
	?>
</head>
<body>
<div id=icaption>
    <div id=title><?php echo $problem->name;?></div>
	<a href="edit2.php?p_id=<?php echo $id;?>" id=btn_add></a>
	<a href="index.php" id=btn_back></a>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['search']?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="50%">题目名称</td><td width="10%">优先级</td><td width="40%">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $record[$i]->id;?>">
			<td><?php echo $record[$i]->name;?></td>
			<td><input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;"></td>
			<td>
				<a href="edit2.php?id=<?php echo $record[$i]->id;?>&p_id=<?php echo $id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/btn_edit.png" border="0"></a>
				<span style="cursor:pointer" class="del_problem" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<?php }?>
	</table>
	<input type="hidden" id="db_table" value="fb_survey_question">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><button id=clear_priority>清空优先级</button><button id=edit_priority>编辑优先级</button></td>
			</tr>
		</table>
	</div>
</body>
</html>

<script>
$(function(){
	$(".del_problem").click(function(){
		if(!window.confirm("确定要删除吗"))
			{
				return false;
			}
			else
			{
				$.post("delete.php",{'del_id':$(this).attr('name'),'post_type':'question'},function(data){
				});
				$(this).parent().parent().remove();
			}
	});
	
	$(".sau_search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_button').click(function(){
		search();
	});
});

function search(){
	window.location.href="?search="+encodeURI($(".sau_search").attr('value'))+"&id=<?php echo $id;?>";
}
</script>