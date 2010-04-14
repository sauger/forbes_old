<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		include_once('../../frame.php');
		judge_role();
		css_include_tag('admin','thickbox','autocomplete','jquery_ui');
		use_jquery();
		js_include_tag('autocomplete.jquery','admin/rich/main_edit','../ckeditor/ckeditor.js','jquery-ui-1.7.2.custom.min.js');
		validate_form("fhgl_edit");
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_rich');
	if($id!=''){
		$record->find($id);
	}
?>
<body style="background:#C8E4F0">
	<div id="div_tab" style="margin:0px;padding:0px; border:0;">
			<ul style="margin:0;padding:0; border:0;">
				<li><a href="#tabs-1">基本信息管理</a></li>
				<li><a href="#tabs-2">富豪公司管理</a></li>
				<li><a href="#tabs-3">富豪财富管理</a></li>
			</ul>
		<div id="tabs-1" style="margin:0px; padding:0px; background:#C8E4F0; border:0;">
		<div id=icaption>
		    <div id=title>基本信息管理</div>
			  <a href="list.php" id=btn_back></a>
		</div>
		<div id="itable">
			<form id="fhgl_edit" enctype="multipart/form-data" action="post.php" method="post"> 
			<table cellspacing="1"  align="center">
				<tr class=tr4>
					<td class=td1 width=15%>姓名</td>
					<td width=85%><input type="text" name="fh[name]" value="<?php echo $record->name;?>" class="required">
				</tr>
				<tr class=tr4>
					<td class=td1>拼音</td><td width=665><input type="text" name="fh[chinese_name]" value="<?php echo $record->chinese_name;?>">
				</tr>
				<tr class=tr4>
					<td class=td1>性别</td>
					<td id="fh_xb">
						<input style="width:40px;" type="radio" name="fh[gender]" value="0" <?php if($record->gender=='0'){ ?>checked="checked"<?php } ?>>女<br>
						<input style="width:40px;" type="radio" name="fh[gender]" value="1" <?php if($record->gender==1){ ?>checked="checked"<?php } ?>>男
					</td>
				</tr>
				<tr class=tr4>
					<td class=td1>国籍</td>
					<td>
						<input type="text" size="20" name="fh[country]" value="<?php echo $record->country;?>">
				</tr>
				<tr class=tr4>
					<td class=td1>出生年份</td>
					<td>
						<input type="text" size="20" name="fh[birthday]"  id="fh_birthday"  value="<?php echo $record->birthday;?>">
				</tr>
				<tr class=tr4>
					<td class=td1>今日排名</td>
					<td>
						<?php echo $record->jrpm;?>
				</tr>
				<tr class=tr4>
					<td class=td1>上传照片</td>
					<td>
						<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
						<input type="file" name="fh[image]" id="photo" >（请上传小于2M的照片）<?php if($id!=''){?><a target="_blank" href="<?php echo $record->fh_zp?>">点击查看照片</a><?php }?>
					</td>
				</tr>
				<tr id=newsshow1 class="normal_news tr4">
					<td  class=td1 height=265>个人经历</td><td><?php show_fckeditor('fh[comment]','Admin',false,"200",$record->comment);?></td>
				</tr>
				<tr id=newsshow1 class="normal_news tr4">
					<td class=td1 height=265>慈善事业</td><td><?php show_fckeditor('fh[philanth]','Admin',false,"200",$record->philanth);?></td>
				</tr>
				<tr class="btools">
					<td colspan="10" align="center"><input id="submit" type="submit" value="完成">				<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>"></td>
				</tr>	
				</table>
			</form>
		</div>
		</div>
		<div id="tabs-2"  style="margin:0px; padding:0px; background:#C8E4F0;">
		<div id=icaption>
		    <div id=title>富豪公司管理</div>
			  <a href="list.php" id=btn_back></a>
		</div>
		<div id="itable">
		<?php 
		  if(!$id){
		?>
		请先保存富豪基本信息
		<?php }else{
			$sql = "select a.id,a.company_id,b.name,b.stock_code,a.stock_count from fb_rich_company a left join fb_company b on a.company_id = b.id where a.rich_id = {$id}";
			$company = $db->query($sql);
			if(empty($company)) $company = array();?>
			<table cellspacing="1"  align="center" id="table_rich">
			<tr class="itable_title">
				<td width=55%>公司名称</td><td width=15%>上市代码</td><td width=15%>持股数</td><td width=15%>操作</td>
			</tr>
			<?php foreach ($company as $v) {?>
			<tr class="tr3">
				<td><?php echo $v->name;?></td>
				<td><?php echo $v->stock_code?></td>
				<td><input type="text"  value="<?php echo $v->stock_count;?>"></input></td>
				<td>
					<a style="cursor:pointer;" class="a_delete"><img src="/images/btn_delete.png" border="0"></a>
					<input type="hidden" class="c_hidden" value="<?php echo $v->id;?>"></input>
					<input type="hidden" value="<?php echo $v->company_id;?>"></input>
				</td>
			</tr>	
			<?php }?>
			<tr class="btools">
				<td colspan="10" align="center">
				<button id="btn_add">添　　加</button>
				<button id="btn_save">保　　存</button>
				</td>
			</tr>
		</table> 
		<div id="company_filter" style="margin-top:10px; display:none;">
			<?php include 'filter_company.php';?>
		</div>		
		<?php }?>
		</div>
		</div>
		<div id="tabs-3"  style="margin:0px; padding:0px; background:#C8E4F0;">
		<div id=icaption>
		    <div id=title>富豪财富管理</div>
			  <a href="list.php" id=btn_back></a>
		</div>
		<div id="itable">
			<?php 
			  if(!$id){
			?>
			请先保存富豪基本信息
			<?php }else{
				$sql = "select * from fb_rich_fortune where rich_id={$id}";
				$fortune = $db->query($sql);
				if(empty($fortune)) $fortune = array();
			?>
			<table cellspacing="1"  align="center" id="table_fortune">
				<tr class="itable_title" id="fortune_box">
					<td width=55%>个人财富</td><td width=15%>所属年份</td><td width=15%>财富排名</td><td width=15%>操作</td>
				</tr>
				<?php foreach ($fortune as $v) {?>
				<tr class="tr4">
					<td><input type="text" class="fortune" value="<?php echo $v->fortune;?>"></input></td>
					<td><input type="text" class="fortune_class" value="<?php echo $v->fortune_year;?>"></input></td>
					<td><input type="text" class="fortune_order" value="<?php echo $v->fortune_order;?>"></input></td>
					<td>
						<a style="cursor:pointer;" class="f_delete"><img src="/images/btn_delete.png" border="0"></a>
						<input type="hidden" value="<?php echo $v->id;?>"></input>
					</td>
				</tr>	
				<?php }?>
				<tr class="btools">
					<td colspan="10" align="center">
					<button id="fortune_add">添　　加</button>
					<button id="fortune_save">保　　存</button>
					</td>
				</tr>
			</table> 
			<?php
			}
			?>
		</div>
		</div>
	</div>
	
</body>
</html>