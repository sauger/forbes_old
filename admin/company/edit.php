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
		js_include_tag('category_class.js');
	?>
</head>

<?php
	$id = $_REQUEST['id'];
	if($id!=''){
		$record = new table_class('fb_gs');
		$record->find($id);
	}
	$db = get_db();
	$sql = "select * from fb_hbgl";
	$hbzl = $db->query($sql);
?>

<body style="background:#E1F0F7">
	<form id="gsgl_edit" enctype="multipart/form-data" action="post.php" method="post"> 
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="2" width="795">　　编辑公司</td>
		</tr>
		<tr class="tr4">
			<td width="130">公司名称</td>
			<td width="695" align="left"><input id="gs_mc" type="text" name="gs[mc]" class="required "value="<?php echo $record->mc;?>">
		</tr>
		<tr class="tr4">
			<td>国家</td>
			<td width="695" align="left"><input id="gs_gj" type="text" name="gs[gj]" value="<?php echo $record->gj;?>">
		</tr>
		<tr class="tr4">
			<td>省份</td>
			<td width="695" align="left"><input id="gs_sf" type="text" name="gs[sf]" value="<?php echo $record->sf;?>">
		</tr>
		<tr class="tr4">
			<td>城市</td>
			<td width="695" align="left"><input id="gs_cs" type="text" name="gs[cs]" value="<?php echo $record->cs;?>">
		</tr>
		<tr class="tr4">
			<td>地址</td>
			<td width="695" align="left"><input id="gs_dz" type="text" name="gs[dz]" value="<?php echo $record->dz;?>">
		</tr>
		<tr class="tr4">
			<td>网址</td>
			<td width="695" align="left"><input id="gs_wz" type="text" name="gs[wz]" value="<?php echo $record->wz;?>">
		</tr>
		<tr id="newsshow1" class="normal_news tr4">
			<td height=265>介绍</td><td><?php show_fckeditor('gs[js]','Admin',true,"265",$record->js);?></td>
		</tr>
		<tr class="tr4">
			<td>上市公司代码</td>
			<td width="695" align="left"><input id="gs_ssdm" type="text" name="gs[ssdm]" value="<?php echo $record->ssdm;?>">
		</tr>
		<tr class="tr4">
			<td>交易所</td>
			<td width="695" align="left">
				<select id="gs_jys" name="gs[jys]" value="<?php echo $record->jys;?>" style="width:90px" class="">
					<option value="">交易所</option>
					<option value="SS" <? if($record->jys=="SS"){?>selected="selected"<? }?> >上海</option>
					<option value="SZ" <? if($record->jys=="SZ"){?>selected="selected"<? }?> >深圳</option>
					<option value="HK" <? if($record->jys=="HK"){?>selected="selected"<? }?> >香港</option>
					<option value="SI" <? if($record->jys=="SI"){?>selected="selected"<? }?> >新加坡</option>
					<option value="KS" <? if($record->jys=="KS"){?>selected="selected"<? }?> >韩国</option>
					<option value="PA" <? if($record->jys=="PA"){?>selected="selected"<? }?> >法国</option>
					<option value="L" <? if($record->jys=="L"){?>selected="selected"<? }?> >英国</option>
					<option value="DE" <? if($record->jys=="DE"){?>selected="selected"<? }?> >德国</option>
					<option value="JP" <? if($record->jys=="JP"){?>selected="selected"<? }?> >日本</option>
				</select>
		</tr>
		<tr class="tr4">
			<td>货币种类</td>
			<td width="695" align="left">
				<select id="gs_hbid" name="gs[hbid]" value="<?php echo $record->hbid;?>" style="width:90px" class="">
					<option value="">货币种类</option>
					<?php $len = count($hbzl); for ($i=0;$i< $len;$i++) { ?>
					<option value="<?php echo $hbzl[$i]->id; ?>" <? if($record->hbid==$hbzl[$i]->id){?>selected="selected"<? }?>><?php echo $hbzl[$i]->hb_nc; ?></option>
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