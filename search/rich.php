<?php 
	require_once( '../frame.php');
	$db = get_db();
	
	$name = $_GET['name'];
	$year = $_GET['year'];
	$asset = $_GET['asset'];
	$nationality = $_GET['nationality'];
	$indust = intval($_GET['industry']);
	if(strlen($name)>20){
		$name = '';
	}
	if(strlen($year)>20){
		$year = '';
	}
	if(strlen($asset)>20){
		$asset = '';
	}
	if(strlen($nationality)>20){
		$nationality = '';
	}
	if($indust==0){
		$indust = '';
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-富豪检索</title>
	<?php
		use_jquery();
		js_include_tag('public','right','search/rich');
		css_include_tag('search/rich','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>富豪检索</div>
			<div id=title1><a href="/">福布斯中文网</a> > <a style="color:#246BB0;">富豪检索结果</a></div>
			<div id=line></div>
		</div>
		<div id="left">
			<div id="left_top">
				<span class="div1">富豪姓名</span>
				<span class="div2"><input id="name" value="<?php echo $name;?>" type="text"></span>
				<span class="div3">年龄段</span>
				<span class="div2">
					<select id="year">
						<option value=""></option>
					</select>
				</span>
				<span class="div1">资产规模</span>
				<span class="div2">
					<select id="asset">
						<option value=""></option>
					</select>
				</span><br>
				<span class="div1">　国　籍</span>
				<span class="div2">
					<select id="nationality">
						<option value=""></option>
						<?php 
							$country = $db->query("select country from fb_rich group by country");
							$count = $db->record_count;
							for($i=0;$i<$count;$i++){
						?>
						<option value="<?php echo $country[$i]->country;?>"><?php echo $country[$i]->country;?></option>
						<?php }?>
					</select></span>
				<span class="div3">行　业</span>
				<span class="div2">
					<select id="industry">
						<option value=""></option>
						<?php 
							$industry = $db->query("select * from fb_industry");
							$count = $db->record_count;
							for($i=0;$i<$count;$i++){
						?>
						<option value="<?php echo $industry[$i]->id;?>"><?php echo $industry[$i]->name;?></option>
						<?php }?>
					</select>
				</span>
				<button id="search"></button>
				<script>
					$(function(){
						$("#year").val("<?php echo $year;?>");
						$("#asset").val("<?php echo $asset;?>");
						$("#nationality").val("<?php echo $nationality;?>");
						$("#industry").val("<?php echo $indust;?>");
					});
				</script>
			</div>
			<div id="info">搜索结果如下</div>
			<div id="result">
				<table width="600" border="0" cellspacing="0" cellpadding="0">
				<?php 
					$sql = "select f.name,group_concat(n.name),group_concat(n.id) FROM fb_rich f join fb_rich_company m on f.id=m.rich_id join fb_company n on m.company_id=n.id group by f.name "
				?>
					<tr>
						<td valign="middle" width="5%"><img src="/images/search/icon.gif"></td>
						<td valign="middle" width="15%">刘用好</td>
						<td valign="middle" width="15%">60岁</td>
						<td valign="middle" width="15%">150亿</td>
						<td valign="middle" width="10%">中国</td>
						<td valign="middle" width="15%">房地产</td>
						<td valign="middle" width="15%">希望</td>
					</tr>
				</table>
			</div>
		</div>
		<div id="right_inc">
			<?php include "../right/ad.php";?>
			<?php include "../right/favor.php";?>
			<?php include "../right/four.php";?>
			<?php include "../right/forum.php";?>
			<?php include "../right/magazine.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>
</html>