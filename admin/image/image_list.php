<?php
	require_once('../../frame.php');
	judge_role();
	
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	$db = get_db();
	$c = array();
	if($title!= ''){
		array_push($c, "title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%'");
	}
	if($category_id > 0){
		array_push($c, "category_id=$category_id");
	}
	if($is_adopt!=''){
		array_push($c, "is_adopt=$is_adopt");
	}
	$image = new table_images_class();
	$images = $image->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'priority asc,created_at desc'),12);
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
		$category = new category_class('image');
		$category->echo_jsdata();		
	?>
</head>
<body>
<div id=icaption>
    <div id=title>图片管理</div>
	  <a href="image_edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id=title type="text" value="<? echo $_REQUEST['title']?>"><span id="span_category"></span>
		<select id=adopt style="width:100px" class="select_new">
					<option value="">发布状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
		</select>
		<input type="hidden" value="<?php echo $category_id;?>" id="category">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="35%">图片</td><td width="35%">名称</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php for($i=0;$i<count($images);$i++){?>
		<tr class=tr3 id=<?php echo $images[$i]->id;?>>
			<td  height=60><a href="<?php echo $images[$i]->src;?>" target="_blank"><img src="<?php echo $images[$i]->src_path('middle');?>" width="50" height="50" border="0"></a></td>
			<td><?php echo $images[$i]->title;?></td>
			<td><?php echo $images[$i]->created_at;?></td>
			<td>
				<?php if($images[$i]->is_adopt=="1"){?>
					<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $images[$i]->id;?>">撤消</span>
				<?php }?>
				<?php if($images[$i]->is_adopt=="0"){?>
					<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $images[$i]->id;?>">发布</span>
				<?php }?>
				<a href="image_edit.php?id=<?php echo $images[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="cursor:pointer; color:#FF0000" class="del" name="<?php echo $images[$i]->id;?>">删除</span>
				<input type="hidden" class="priority" name="<?php echo $images[$i]->id;?>" value="<?php if($images[$i]->priority!=100){echo $images[$i]->priority;}?>" style="width:40px;">
				<input type="hidden" id="priorityh<? echo $p;?>" value="<?php echo $images[$i]->id;?>" style="width:40px;">	
			</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority style="display:none">清空优先级</button>
				<button id=edit_priority  style="display:none">编辑优先级</button>
				<input type="hidden" id="db_table" value="<?php echo $tb_images;?>">
				<input type="hidden" id="relation" value="image">
			</td>
		</tr>
  </table>
</div>	
</body>
</html>

<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){
			$('#category').val(id);
			category_id = $('.category_select:last').val();
			if (id == -1) {
				window.location.href = "?title=" + $("#title").attr('value') +  "&category=&adopt=" + $("#adopt").attr('value');
			}
			if (category_id != -1) {
				window.location.href = "?title=" + $("#title").attr('value') +  "&category=" + $("#category").attr('value') + "&adopt=" + $("#adopt").attr('value');
			}
		})
	});
</script>

