<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>IPO设置</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
	?>
</head>

<?php
	$db = get_db();
	$record = new table_class('fb_ipo_info');
	$record->find('first');
?>

<body>
	<div id=icaption>
    <div id=title>IPO设置</div>
</div>
	<form id="ipo_edit" action="ipo_config.post.php"  method="post"> 
<div id=itable>
		<table cellspacing="1"  align="center">
		<tr class=tr4 id="list_name">
			<td class=td1 width=15%>公司名称</td>
			<td width="85%">
				<input type="text" name="ipo[comany_name]" value="<?php echo $record->comany_name;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>股票代码</td>
			<td><input type="text" name="ipo[stock_code]" value="<?php echo $record->stock_code?>"></input>(请加上交易所代码，上海SS，深圳SZ)</td>
		</tr>
		<tr class="tr4">
			<td class=td1>持股数</td>
			<td>			
				<input type="text" name="ipo[stock_count]" value="<?php echo $record->stock_count?>" />
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>货币种类</td>
			<td>
				<select id="currency_id" name="ipo[currency_id]">
					<?php $db =get_db();
						$currency = $db->query("select name,id from fb_currency");
						foreach($currency as $val){
					?>
					<option value="<?php echo $val->id?>"><?php echo $val->name;?></option>
					<?php }?>
				</select>
				<script>
					$('#currency_id').val("<?php echo $record->currency_id;?>");
				</script>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>开始时间</td>
			<td>
				<input type="text" name="ipo[start_time]" value="<?php echo $record->start_time;?>" />
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>结束时间</td>
			<td>
				<input type="text" name="ipo[end_time]" value="<?php echo $record->end_time;?>" />
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>时间间隔</td>
			<td>
				<input type="text" name="ipo[intval]" value="<?php echo $record->intval;?>" />分钟
			</td>
		</tr>
		<tr class="btools">
			<td colspan="10" align="center"><input id="submit" type="submit" value="保　　　存"> 		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>"></td>
		</tr>
	</table>
</div>
	</form>
</body>
</html>