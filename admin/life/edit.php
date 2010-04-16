<?php
	require_once('../../frame.php');
	judge_role();
	$id = $_REQUEST['id'];
	$type=$_REQUEST['type'];
	if($id!='')	{
		$image = new table_class('fb_life_flash');
		$image->find($id);
	}
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
		js_include_tag('category_class.js');
	?>
</head>
<?php 
//initialize the categroy;
	$category = new category_class('image');
	$category->echo_jsdata();
?>
<body>
<div id=icaption>
    <div id=title><? if($id){if($type<>"news"){echo "编辑图片";}else{ echo "编辑新闻";}}else{if($type<>"news"){echo "添加图片";}else{ echo "添加新闻";}} ?></div>
	  <a href="list.php?type=<?php echo $type; ?>" id=btn_back></a>
</div>	
	
<div id=itable>
	<table cellspacing="1"  align="center">
	<form id="picture_edit" enctype="multipart/form-data" action="image.post.php" method="post"> 
		<tr class=tr4>
			<td width="15%" class=td1>标　题</td>
			<td width="85%"><input id="title" type="text" name="image[title]" value="<?php echo $image->title;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>优先级</td>
			<td><input type="text" size="10" id="priority" name="image[priority]" value="<?php if($image->priority!=100){echo $image->priority;}?>">(1-100)</td>
		</tr>
		<tr class=tr4>
			<td class=td1><?php if($type<>"news"){ ?>图片<?php } ?>链接</td>
			<td><input type="text" size="50" name="image[url]" id="online" value="<?php echo $image->url;?>"></td>
		</tr>
		<?php if($type<>"news"){ ?>
		<tr class=tr4>
			<td class=td1>选择图片</td>
			<td><input type="hidden" name="MAX_FILE_SIZE1" value="2097152"><input name="image[src]" id="upfile" type="file">(请上传小于2M的图片，格式支持jpg、gif、png)<?php if($image->src!=''){?><a href="<?php echo $image->src;?>" target="_blank" style="color:#0000FF">点击查看图片</a><?php } ?></td>
		</tr><tr class=tr4>
			<td class=td1>缩略图</td>
			<td><input type="hidden" name="MAX_FILE_SIZE2" value="2097152"><input name="image[src2]" id="upfile" type="file">(请上传小于2M的图片，格式支持jpg、gif、png)<?php if($image->src2!=''){?><a href="<?php echo $image->src2;?>" target="_blank" style="color:#0000FF">点击查看图片</a><?php } ?></td>
		</tr>
		<?php } ?>
		<tr class="btools">
			<td colspan="10">
				<input id="submit" type="submit" value="发布">
				<input type="hidden" name="image[type]" id="type" value="<?php echo $type;?>">
				<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="image[is_adopt]" value="1">
			</td>
		</tr>	
	</table>
	</form>
</div>	
</body>
</html>

<script>
	$(function(){
		
		$("#submit").click(function(){
			var title = $(input "#title").val();
			if(title==""){
				alert("请输入标题！");
				return false;
			}
		
			
			if($("#upfile").val()!=''){
				var upfile1 = $("#upfile").val();
				var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
				if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
					alert("上传图片类型错误");
					return false;
				}
			}else{
				if($("#id").val()==''){
					alert("请上传一个图片!");
					return false;
				}
			}
		}); 
	})
	
</script>