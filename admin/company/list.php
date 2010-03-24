<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/gl/search');
	?>
</head>

<?php
	$content = $_REQUEST['content'];
	$type = $_REQUEST['type'];
	$db = get_db();
	if($content!= '')
	{
		$sql = "select * from fb_company where ".$type." like '%".trim($content)."%'";
	}
	else
	{
		$sql = "select * from fb_company";
	}
	$record = $db->paginate($sql,15);
?>

<body>
	<table width="800" border="0" id="list">
		<tr class="tr1">
			<td colspan="11">
				　<a href="edit.php">添加公司</a>　　　搜索　
				<input id="content" type="text" value="<? echo $_REQUEST['content']?>"><select id="type" style="width:90px" class="">
					<option value="name" <? if($_REQUEST['type']=="name"){?>selected="selected"<? }?> >名称</option>
					<option value="province" <? if($_REQUEST['type']=="province"){?>selected="selected"<? }?> >省份</option>
					<option value="city" <? if($_REQUEST['type']=="city"){?>selected="selected"<? }?> >城市</option>
					<option value="address" <? if($_REQUEST['type']=="address"){?>selected="selected"<? }?> >地址</option>
					<option value="website" <? if($_REQUEST['type']=="website"){?>selected="selected"<? }?> >网址</option>
					<option value="stock_code" <? if($_REQUEST['type']=="stock_code"){?>selected="selected"<? }?> >上市公司代码</option>
				</select>
				<input type="button" value="搜索" id="search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="100">名称</td><td width="40">国家</td><td width="100">股票代码</td><td width="50">交易所</td><td width="60">货币种类</td><td width="70">操作</td>
		</tr>
		<?php
			$len = count($record);
			for($i=0;$i< $len;$i++){
		?>
				<tr class="tr3" id=<?php echo $record[$i]->id;?> >
					<td><a href="<?php echo $url;?>" target="_blank"><?php echo strip_tags($record[$i]->name);?></a></td>
					<td align="center">
						<?php echo strip_tags($record[$i]->country);?>
					</td>
					<td align="center">
						<?php echo strip_tags($record[$i]->stock_code);?>
					</td>
					<td align="center">
						<?php
								switch ($record[$i]->stock_place_code)
									{
										case SS:
  										echo "上海";
  										break;  
										case SZ:
  										echo "深圳";
  										break;  
										case HK:
  										echo "香港";
  										break;  
										case SI:
  										echo "新加坡";
  										break;
  									case KS:
  										echo "韩国";
  										break;  
  									case PA:
  										echo "法国";
  										break;
  									case L:
  										echo "英国";
  										break;   
  									case DE:
  										echo "德国";
  										break;   
  									case JP:
  										echo "日本";
  										break;
  									default:
											echo "";
									}
						?>
					</td>
					<td align="center">
						<?php
							$hbzl = new table_class('fb_currency');
							if ($record[$i]->hbid != '')
							{
								$hbzl->find($record[$i]->hbid);
								echo $hbzl->name;
							}	
						?>
					</td>
					<td align="center">
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_gs">
		<?php
			}
		?>
		<tr><td colspan="8" align="right"><?php paginate(); ?></td></tr>
	</table>
</body>
</html>