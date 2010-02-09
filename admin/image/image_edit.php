<?php
	require_once('../../frame.php');
	judge_role();
	$id = $_REQUEST['id'];
	if($id!='')	{
		$image = new table_class($tb_images);
		$image->find($id);
		$category_id = $image->category_id;
	}else{
		$category_id = -1;
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
<body style="background:#E1F0F7">
	<form id="picture_edit" enctype="multipart/form-data" action="image.post.php" method="post"> 
	<table width="795" border="0">
		<tr bgcolor="#f9f9f9" height="25px;" style="font-weight:bold; font-size:13px;">
			<td colspan="2" width="795">　　<?php if($id){echo "修改图片";}else{echo "添加图片";}?></td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td width="100">标　题</td><td width="695" align="left"><input id="title" type="text" name="image[title]" value="<?php echo $image->title;?>"></td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td>优先级</td><td align="left"><input type="text" size="10" id="priority" name="image[priority]" value="<?php if($image->priority!=100){echo $image->priority;}?>">(1-100)</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td>关键词</td><td align="left"><input type="text" size="50" name="image[keywords]" value="<?php echo $image->keywords;?>">(请用空格或者","分隔开关键词,比如:高考 升学)</td>
		</tr>
		
		
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td>分　类</td>
			<td align="left">
			<span id="span_category"></span>
			</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;" id=newsshow3 >
			<td>图片链接</td><td align="left"><input type="text" size="50" name="image[url]" id="online" value="<?php echo $image->url;?>"></td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;" id=newsshow3 >
			<td>选择图片</td><td align="left"><input type="hidden" name="MAX_FILE_SIZE1" value="2097152"><input name="image" id="upfile" type="file">(请上传小于2M的图片，格式支持jpg、gif、png)<?php if($image->src!=''){?><a href="<?php echo $image->src;?>" target="_blank" style="color:#0000FF">点击查看图片</a><?php } ?></td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="150px;" id=newsshow1>
			<td>简短描述</td><td align="left"><textarea cols="80" rows="8" name="image[description]" class="required" ><?php echo $image->description;?></textarea></td>
		</tr>

		<tr bgcolor="#f9f9f9" height="30px;">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布图片"></td>
		</tr>	
	</table>
	<input type="hidden" name="image[category_id]" id="category_id" value="<?php echo $image->category_id;?>">
	<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
	<input type="hidden" name="image[is_adopt]" value="1">
	</form>
</body>
</html>

<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
		});
		
		$("#submit").click(function(){
			var title = $("#title").val();
			if(title==""){
				alert("请输入标题！");
				return false;
			}
			
			category_id = $('.category_select:last').attr('value');
			if(category_id == -1){
				alert('请选择分类!');
				return false;
			}
			$('#category_id').attr('value',category_id);
			
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
			if($("#description").val()==''){
				alert('请输入简短描述！');
				return false;
			}
		}); 
	})
	
</script>