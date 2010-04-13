<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		require_once('../../frame.php');
		css_include_tag('admin');
		use_jquery();
		js_include_tag('../ckeditor/ckeditor.js');
		validate_form("city_edit");
	?>
</head>

<?php
	$id = $_REQUEST['id'];
	$city = new table_class('fb_city');
	if ($id != '')
	{
		$city->find($id);
	}
?>

<body>
<div id=icaption>
    <div id=title><?php if($id!=''){echo '编辑城市';}else{echo '添加城市';}?></div>
	  <a href="index.php" id=btn_back></a>
</div>
	<form id="city_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1>中文名称</td>
			<td width=665><input type="text" class="required" name="city[name]" value="<?php echo $city->name;?>">
		</td>
		</tr>
		<tr class=tr4>
			<td class=td1>英文名称</td>
			<td>
				<input type="text" name="city[e_name]" value="<?php echo $city->e_name;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>城市别名</td>
			<td>
				<input type="text" name="city[name2]" value="<?php echo $city->name2;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>所属省份</td><td><input type="text" class="required" name="city[province_name]" value="<?php echo $city->province_name;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>行政级别</td><td>
				<select class="required" name="city[level]" style="width:155px;">
				 	<option value=""></option>
					<option <?php if($city->level==1)echo 'selected="selected"';?> value="1">直辖市</option>
					<option <?php if($city->level==2)echo 'selected="selected"';?> value="2">省会城市</option>
					<option <?php if($city->level==3)echo 'selected="selected"';?> value="3">计划单列市</option>
					<option <?php if($city->level==4)echo 'selected="selected"';?> value="4">地级市</option>
					<option <?php if($city->level==5)echo 'selected="selected"';?> value="5">县级市</option>
				 </select>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>面积</td>
			<td>
				<input type="text" name="city[area]" value="<?php echo $city->area;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>人口</td>
			<td>
				<input type="text"  name="city[population]" value="<?php echo $city->population;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>机场</td>
			<td>
				<input type="text"  name="city[airdrome]" value="<?php echo $city->airdrome;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>所属地区</td>
			<td>
				<input type="text" name="city[territory]" value="<?php echo $city->territory;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>火车站</td>
			<td>
				<input type="text"  name="city[railway]" value="<?php echo $city->railway;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>地理位置</td>
			<td>
				<input type="text" name="city[position]" value="<?php echo $city->position;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>城市GDF</td>
			<td>
				<input type="text" name="city[gdf]" value="<?php echo $city->gdf;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>城市照片</td>
			<td>
				<input type="file" name="city_photo" <?php if($id==''){?>class=""<?php }?>><?php if($id!=''){?><a href="<?php echo $city->photo?>" target="_blank">点击查看<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>城市简介</td>
			<td>
				<?php show_fckeditor('city[description]','Admin',false,"265",$city->description);?>
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成">		<input type="hidden" name="id" value="<?php echo $city->id; ?>"></td>
		</tr>	
	</table>
</div>
	</form>
</body>
</html>