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

<body style="background:#E1F0F7">
	<div id="div_tab">
		<ul>
			<li><a href="#tabs-1">基本信息管理</a></li>
			<li><a href="#tabs-2">富豪公司管理</a></li>
			<li><a href="#tabs-3">富豪财富管理</a></li>
		</ul>
		<div id="tabs-1">
			<form id="fhgl_edit" enctype="multipart/form-data" action="post.php" method="post"> 
			<table width="775" border="0">
				<tr class=tr1>
					<td colspan="2" width="795">　　编辑富豪 <a href="javascript:history.go(-1)"><img src="/images/btn_back.png" border=0></a></td>
				</tr>
				<tr class=tr4>
					<td width="130">姓名</td><td width="695" align="left"><input type="text" name="fh[name]" value="<?php echo $record->name;?>" class="required">
				</tr>
				<tr class=tr4>
					<td width="130">拼音</td><td width="695" align="left"><input type="text" name="fh[chinese_name]" value="<?php echo $record->chinese_name;?>">
				</tr>
				<tr class=tr4>
					<td>性别</td>
					<td align="left" id="fh_xb">
						<input type="radio" name="fh[gender]" value="0" <?php if($record->gender==0){ ?>checked="checked"<?php } ?>>女
						<input type="radio" name="fh[gender]" value="1" <?php if($record->gender==1){ ?>checked="checked"<?php } ?>>男
					</td>
				</tr>
				<tr class=tr4>
					<td>国籍</td>
					<td align="left">
						<input type="text" size="20" name="fh[country]" value="<?php echo $record->country;?>">
				</tr>
				<tr class=tr4>
					<td>出生年份</td>
					<td align="left">
						<input type="text" size="20" name="fh[birthday]"  id="fh_birthday"  value="<?php echo $record->birthday;?>">
				</tr>
				<tr class=tr4>
					<td>今日排名</td>
					<td align="left">
						<?php echo $record->jrpm;?>
				</tr>
				<tr class=tr4>
					<td width="130">上传照片</td>
					<td align="left">
						<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
						<input type="file" name="fh[image]" id="photo" >（请上传小于2M的照片）<?php if($id!=''){?><a target="_blank" href="<?php echo $record->fh_zp?>">点击查看照片</a><?php }?>
					</td>
				</tr>
				<tr id=newsshow1 class="normal_news tr4">
					<td height=265>个人经历</td><td><?php show_fckeditor('fh[comment]','Admin',true,"265",$record->comment);?></td>
				</tr>
				<tr class="tr3">
					<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
				</tr>	
				</table>
				<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
			</form>
		</div>
		
		<div id="tabs-2">
		<?php 
		  if(!$id){
		?>
		请先保存富豪基本信息
		<?php }else{
			$sql = "select a.id,a.company_id,b.name,b.stock_code,a.stock_count from fb_rich_company a left join fb_company b on a.company_id = b.id where a.rich_id = {$id}";
			$company = $db->query($sql);
			if(empty($company)) $company = array();?>
		<table width="775" border="0" id="table_rich">
			<tr class="tr2">
				<td width="130">公司名称</td><td>上市代码</td><td>持股数</td><td>操作</td>
			</tr>
			<?php foreach ($company as $v) {?>
			<tr class="tr4">
				<td><?php echo $v->name;?></td>
				<td><?php echo $v->stock_code?></td>
				<td><input type="text"  value="<?php echo $v->stock_count;?>"></input></td>
				<td>
					<a href="<?php echo $v->id?>" class="a_delete"><img src="/images/btn_delete.png" border="0"></a>
					<input type="hidden" value="<?php echo $v->id;?>"></input>
					<input type="hidden" value="<?php echo $v->company_id;?>"></input>
				</td>
			</tr>	
			<?php }?>
			<tr class="tr3">
				<td colspan="4" align="center">
				<button id="btn_add">添　　加</button>
				<button id="btn_save">保　　存</button>
				</td>
			</tr>
		</table> 
		<div id="company_filter" style="margin-top:10px; border:1px dotted;display:none;">
			<?php include 'filter_company.php';?>
		</div>		
		<?php }?>
		</div>
		<div id="tabs-3">table3</div>
	</div>
	
</body>
</html>