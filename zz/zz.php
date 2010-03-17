<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-文化娱乐</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('zz','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a style="color:#666666;" href="">奢华　＞　</a><a href="">文化娱乐</a></div>
		<div id=cyline></div>
		<div id=zzleft>
			<div class=l_t_top></div>
			<div id=l_t_content>
				<div class=l_title>
					<div class=wz>奢侈品列表信息</div>	
				</div>
				<div class=l_pic>
					<a href=""><img border=0 src="/images/zz/zz_forbes.jpg"></a>	
				</div>
				<div id=r_t>
					<div id=title><a href="">2010年第5期</a></div>
					<div id=content><a href="">出版日期：2010年3月10日<br>封面专题</a></div>
				</div>
				<div class=r_b>
					<div class=title>
						<div class=jt></div>
						<div class=wz><a href="">细看典藏版劳力士蚝式表的表面</a></div>
					</div>
					<div class=content>
						<a href="">　　四个简洁的英文字跃现眼前：Superlative Chronometer Officially Certified....</a>	
					</div>
					<div class=r_b_dash></div>
				</div>
				<div class=r_b>
					<div class=title>
						<div class=jt></div>
						<div class=wz><a href="">细看典藏版劳力士蚝式表的表面</a></div>
					</div>
					<div class=content>
						<a href="">　　四个简洁的英文字跃现眼前：Superlative Chronometer Officially Certified....</a>	
					</div>
					<div class=r_b_dash></div>
				</div>
				<div class=r_b>
					<div class=title>
						<div class=jt></div>
						<div class=wz><a href="">细看典藏版劳力士蚝式表的表面</a></div>
					</div>
					<div class=content>
						<a href="">　　四个简洁的英文字跃现眼前：Superlative Chronometer Officially Certified....</a>	
					</div>
				</div>
				<div class="l_b">
					<div class="btn_ck"></div>
					<div class="btn_readonline"></div>
				</div>
			</div>
			<div class=l_t_bottom></div>
			<a style="margin-top:10px; float:left; display:inline;" href=""><img border=0 src="/images/zz/one.jpg"></a>
			<div class=l_t_top></div>
			<div id=l_b_content>
				<div class=l_title>
					<div class=wz>奢侈品列表信息</div>	
				</div>
				<?php for($i=0;$i<8;$i++){ ?>
				<div class=imgandtitle>
					<div class=pic>
						<a href=""><img border=0 src="/images/zz/two.jpg"></a>	
					</div>
					<div class=pictitle><a href="">2010年第5期</a></div>
					<div class=piccontent>
						<a href="">·中国最佳商佳商业城市</a>
					</div>
					<div class=piccontent>
						<a href="">·中国最佳商佳商业城市</a>
					</div>
					<div class=piccontent>
						<a href="">·中国最佳商佳商业城市</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class=l_t_bottom></div>
		</div>
		<div id=right>
			<a style="margin:0px; float:right; display:inline;" href=""><img border=0 width=317 height=265 src="/images/right/one.jpg"></a>
			<div class=r_b_b_t></div>
			<div id=r_b_b_m>
				<div class=r_b_title>杂志搜索</div>
				<div id=b_b>
					往期杂志查阅　<select></select>　<select></select><br>
					<button class=btn1></button>
					<button class=btn2>查看</button>	
				</div>
			</div>
			<div class=r_b_b_b></div>
			<a style="margin-top:20px; margin-bottom:10px; float:right; display:inline;" href=""><img border=0 width=322 height=100 src="/images/zz/three.jpg"></a>
			<div class=r_b_b_t></div>
			<div id=r_b_b>
				<div class=r_b_title>读者来函</div>
				<?php for($i=0;$i<8;$i++){ ?>
					<div class=content><a href="">中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口保... ...<br><span style="color:#999999;">孙尤其　｜　中信保险以来长存</span></a></div>
					<?php if($i<7){ ?>
						<div class=dash></div>
					<?php } ?>
				<?php } ?>
			</div>
			<div class=r_b_b_b></div>
		</div>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>