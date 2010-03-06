<?php
	require_once('../../frame.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>smg</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','total');
	?>

</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="6">
				　<a href="ad_edit.php">添加广告</a>　搜索　<input id=title1 type="text" value="<? echo $title;?>"><select id=dept style="width:120px">
					<option value="">广告位</option>
					<?php for($i=0;$i<count($rows_dept);$i++){?>
					<option value="<?php echo $rows_dept[$i]->id; ?>" <?php if($rows_dept[$i]->id==$_REQUEST['dept']){?>selected="selected"<? }?>><?php echo $rows_dept[$i]->name;?></option>
					<? }?>
				</select><span id="span_category"></span><select id=adopt1 class="select_new"  style="width:120px">
					<option value="">发布状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
				</select><select id="news_tag" style="display:none" >
					<option value="">选择标签</option>
				<?php
				$tags = get_config('g_news_tags');
				foreach ($tags as $v) {
					echo "<option value='{$v}'"; 
					if($v == $flag)
					echo " selected='selected'";
					
					echo ">$v</option>";
				}
				?>
				</select>
				<input type="button" value="搜索" id="search_new1" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">

			<td width="225">广告名</td><td width="100">广告位</td><td width="100">类别</td><td width="170">发布时间</td><td width="200">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<?php 
						$var_name = $record[$i]->dept_id != 7 ? "back_news[]" : "delete_news[]";
					?>
					<?php
						$cate_name = category_name_by_id($record[$i]->category_id);
						$platform = $record[$i]->platform ? $record[$i]->platform : 'news';
						if($cate_name == '大头条' || $cate_name == '小头条'){
							$url = "/$platform/news/news_head.php?id={$record[$i]->id}";
						}else if($platform == 'show'){
							$url = "/$platform/article.php?id={$record[$i]->id}";
						}else{
							$url="/$platform/news/news.php?id={$record[$i]->id}";
						}
					?>
					<td><a href="<?php echo $url;?>" target="_blank"><?php echo strip_tags($record[$i]->short_title);?></a></td>
					<td>
						<a href="?dept=<?php echo $record[$i]->dept_id;?>" style="color:#0000FF"><?php echo get_dept_info($record[$i]->dept_id)->name;?></a>
					</td>
					<td>
						<a href="?category=<?php echo $record[$i]->category_id;?>" style="color:#0000FF">
							<?php echo $category->find($record[$i]->category_id)->name; ?>
						</a>
					</td>
					<td>
						<?php echo $record[$i]->created_at; ?>
					</td>								
					<td><?php if($record[$i]->is_adopt=="1"){?>
							<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>">撤消</span>
						<?php }?>
						<?php if($record[$i]->is_adopt=="0"){?>
							<span style="color:#0000FF;cursor:pointer" class="publish" param="<?php echo $record[$i]->phone;?>" name="<?php echo $record[$i]->id;?>">发布</span>
						<?php }?>
						<a href="news_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<?php if($record[$i]->dept_id!="7"&&$record[$i]->category_id!=4){?>
							<span style="cursor:pointer;color:#FF0000" class="return" name="<?php echo $record[$i]->id;?>">删除</span>
						<?php }else{?>
							<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
						<?php }?>
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<iframe id="senddx" style="display:none;"></iframe>
		<tr class="tr3">
			<td colspan=6><?php paginate();?><button id=clear_priority>清空优先级</button><button id=edit_priority>编辑优先级</button></td>
		</tr>
		<input type="hidden" id="db_talbe" value="smg_a">

	</table>
</body>
</html>

