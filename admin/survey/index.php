<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from fb_survey";
	if($search!=''){
		$sql .= " where name like '%".$search."%'";
	}
	$sql .= " order by priority asc,created_at desc";
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
<div id=icaption>
    <div id=title>问卷管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['search']?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="50%">问卷名称</td><td width="20%">发布时间</td><td width="10%">优先级</td><td width="20%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td><input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>"></td>
					<td>
						<?php if($record[$i]->is_adopt=="1"){?>
						<span style="cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/btn_apply.png" border="0"></span>
						<?php }?>
						<?php	if($record[$i]->is_adopt=="0"){?>
						<span style="cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/btn_unapply.png" border="0"></span>
						<?php }	?>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/btn_edit.png" border="0"></a>
						<a href="edit2.php?p_id=<?php echo $record[$i]->id;?>" title="添加题目"><img src="/images/btn_add.png" border="0"></a>
						<a href="list.php?id=<?php echo $record[$i]->id;?>" title="查看题目"><img src="/images/btn_config2.png" border="0"></a>
						<span style="cursor:pointer" class="del_problem" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/btn_delete.png" border="0"></span>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority>清空优先级</button>
				<button id=edit_priority>编辑优先级</button>
				<input type="hidden" id="db_table" value="fb_survey">
			</td>
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
				$.post("delete.php",{'del_id':$(this).attr('name'),'post_type':'problem'},function(data){
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
	})
})

function search(){
	window.location.href="?search="+encodeURI($(".sau_search").attr('value'));
}
</script>