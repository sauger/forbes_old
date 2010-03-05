<?php
	require_once('../../frame.php');
	$title = urldecode($_REQUEST['title']);
	$is_adopt = $_REQUEST['is_adopt'];
	$ggw = $_REQUEST['ggw'];
	$db = get_db();
	$sql = "select t1.id,t1.name,t1.code,t2.name as g_name,t1.created_at,t1.is_adopt from fb_ad t1 join fb_ad_ggw t2 on t1.ggw_id=t2.id where 1=1";
	
	
	if($title!=''){
		$sql .= " and t1.name like '%{$title}%' or t1.code like '%{$title}%'";
	}
	if($is_adopt!=''){
		$sql .= " and t1.is_adopt=$is_adopt";
	}
	if($ggw!=''){
		$sql .= " and t1.ggw_id=$ggw";
	}
	$sql .= " order by t1.priority,t1.created_at desc";
	$record = $db->query($sql);
	$count_record = count($record);
	
	$ggw = $db->query("select id,name from fb_ad_ggw");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>广告列表</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>

</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="6">
				　<a href="ad_edit.php">添加广告</a>　搜索　<input id="title" type="text" value="<? echo $title;?>"><select id=ggw style="width:120px">
					<option value="">广告位</option>
					<?php for($i=0;$i<count($ggw);$i++){?>
					<option value="<?php echo $ggw[$i]->id; ?>" <?php if($ggw[$i]->id==$_REQUEST['ggw']){?>selected="selected"<? }?>><?php echo $ggw[$i]->name;?></option>
					<? }?>
				</select><span id="span_category"></span><select id=ad_adopt style="width:120px">
					<option value="">发布状况</option>
					<option value="1" <? if($_REQUEST['is_adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
					<option value="0" <? if($_REQUEST['is_adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
				</select>
				<input type="button" value="搜索" id="search_ad" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">

			<td width="225">广告名</td><td width="100">广告位</td><td width="100">广告代码</td><td width="170">发布时间</td><td width="200">操作</td>
		</tr>
		<?php
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->g_name;?></td>
					<td><?php echo $record[$i]->code;?></td>
					<td><?php echo $record[$i]->created_at;?></td>								
					<td><?php if($record[$i]->is_adopt=="1"){?>
							<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>">撤消</span>
						<?php }elseif($record[$i]->is_adopt=="0"){?>
							<span style="color:#0000FF;cursor:pointer" class="publish" param="<?php echo $record[$i]->phone;?>" name="<?php echo $record[$i]->id;?>">发布</span>
						<?php }?>
						<a href="ad_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
		?>
		<iframe id="senddx" style="display:none;"></iframe>
		<tr class="tr3">
			<td colspan=6><?php paginate();?><button id=clear_priority>清空优先级</button><button id=edit_priority>编辑优先级</button></td>
		</tr>
		<input type="hidden" id="db_table" value="fb_ad">

	</table>
</body>
</html>

<script>
	$(function(){
		$("#search_ad").click(function(){
			search()
		})
		
		$("#title").keypress(function(event){
				if (event.keyCode == 13) {
					search()
				}
		});
	})
	
	function search(){
		window.location.href="?title="+encodeURI($("#title").val()+"&is_adopt="+$("#ad_adopt").val()+"&ggw="+$("#ggw").val());
	}
</script>