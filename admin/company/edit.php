<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>公司编辑</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin','thickbox');
		use_jquery();
		validate_form("gsgl_edit");
		js_include_tag('admin/company','../ckeditor/ckeditor.js');
	?>
</head>

<?php
	$id = $_REQUEST['id'];
	if($id!=''){
		$record = new table_class('fb_company');
		$record->find($id);
	}
	$db = get_db();
	$sql = "select * from fb_currency";
	$hbzl = $db->query($sql);
?>

<body style="background:#E1F0F7">
	<form id="gsgl_edit" enctype="multipart/form-data" action="post.php" method="post"> 
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="2" width="795">　　编辑公司 <a href="list.php" style="cursor:pointer">返回列表</a></td>
		</tr>
		<tr class="tr4">
			<td width="130">公司名称</td>
			<td width="695" align="left"><input id="gs_mc" type="text" name="gs[name]" class="required "value="<?php echo $record->name;?>">
		</tr>
		<tr class=tr4 id="a_com">
			<td width="130">行业</td>
			<td align="left">
				<select id="ind_id" style="width:90px">
					<option value="">请选择</option>
					<?php 
						$records = $db->query("select * from fb_industry");
						for ($i=0;$i<count($records);$i++) { ?>
					<option value="<?php echo $records[$i]->id;?>"><?php echo $records[$i]->name; ?></option>
					<?php } ?>
				</select><input type="button" id="add_company" value="添加">
			</td>
		</tr>
		<?php
			if($id!=''){
				$records = $db->query("select t1.name,t1.id as t1_id,t2.id as t2_id from fb_industry t1 join fb_company_industry t2 on t1.id=t2.industry_id where t2.company_id=".$id);
				$count = count($records); 
				for ($i=0;$i<$count;$i++) { 
		?>
		<tr class=tr4>	
			<td width="130">关联行业</td>
			<td width="200" align="left">
				<?php echo $records[$i]->name;?>
				<button class="del_old" type="button">删除</button>
				<input type="hidden" value="<?php echo $records[$i]->t2_id;?>">
				<input type="hidden" class="o_industry" value="<?php echo $records[$i]->t1_id;?>">
			</td> 
		</tr>
		<?php }}?>
		<tr class="tr4">
			<td>国家</td>
			<td width="695" align="left"><input id="gs_gj" type="text" name="gs[country]" value="<?php echo $record->country;?>">
		</tr>
		<tr class="tr4">
			<td>省份</td>
			<td width="695" align="left"><input id="gs_sf" type="text" name="gs[province]" value="<?php echo $record->province;?>">
		</tr>
		<tr class="tr4">
			<td>城市</td>
			<td width="695" align="left"><input id="gs_cs" type="text" name="gs[city]" value="<?php echo $record->city;?>">
		</tr>
		<tr class="tr4">
			<td>地址</td>
			<td width="695" align="left"><input id="gs_dz" type="text" name="gs[address]" value="<?php echo $record->address;?>">
		</tr>
		<tr class="tr4">
			<td>网址</td>
			<td width="695" align="left"><input id="gs_wz" type="text" name="gs[website]" value="<?php echo $record->website;?>">
		</tr>
		<tr id="newsshow1" class="normal_news tr4">
			<td height=265>介绍</td><td><?php show_fckeditor('gs[comment]','Admin',true,"265",$record->comment);?></td>
		</tr>
		<tr class="tr4">
			<td>上市公司代码</td>
			<td width="695" align="left"><input id="gs_ssdm" type="text" name="gs[stock_code]" value="<?php echo $record->stock_code;?>">
		</tr>
		<tr class="tr4">
			<td>交易所</td>
			<td width="695" align="left">
				<select id="gs_jys" name="gs[stock_place_code]" value="<?php echo $record->stock_place_code;?>" style="width:90px" class="">
					<option value="">交易所</option>
					<option value="SS" <? if($record->stock_place_code=="SS"){?>selected="selected"<? }?> >上海</option>
					<option value="SZ" <? if($record->stock_place_code=="SZ"){?>selected="selected"<? }?> >深圳</option>
					<option value="HK" <? if($record->stock_place_code=="HK"){?>selected="selected"<? }?> >香港</option>
					<option value="SI" <? if($record->stock_place_code=="SI"){?>selected="selected"<? }?> >新加坡</option>
					<option value="KS" <? if($record->stock_place_code=="KS"){?>selected="selected"<? }?> >韩国</option>
					<option value="PA" <? if($record->stock_place_code=="PA"){?>selected="selected"<? }?> >法国</option>
					<option value="L" <? if($record->stock_place_code=="L"){?>selected="selected"<? }?> >英国</option>
					<option value="DE" <? if($record->stock_place_code=="DE"){?>selected="selected"<? }?> >德国</option>
					<option value="JP" <? if($record->stock_place_code=="JP"){?>selected="selected"<? }?> >日本</option>
				</select>
		</tr>
		<tr class="tr4">
			<td>货币种类</td>
			<td width="695" align="left">
				<select id="gs_hbid" name="gs[hbid]" value="<?php echo $record->hbid;?>" style="width:90px" class="">
					<option value="">货币种类</option>
					<?php $len = count($hbzl); for ($i=0;$i< $len;$i++) { ?>
					<option value="<?php echo $hbzl[$i]->id; ?>" <? if($record->hbid==$hbzl[$i]->id){?>selected="selected"<? }?>><?php echo $hbzl[$i]->name; ?></option>
					<?php } ?>
				</select>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id"  value="<?php echo $record->id; ?>">
	</form>
</body>
</html>