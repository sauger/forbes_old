<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-投资人首页</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('tzr_index','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网＞<a href="">富豪检索结果</a></div>
		<div id=cyline></div>
			<div id=tzr_left>
			<div id=l_t_top></div>
			<div id=l_t_mid>
				<div id=title>
					<div id=wz>人物信息</div>	
				</div>
				<div id=t_l>
					<div id=pic><a href=""><img border=0 src="/images/tz/four.jpg"></a></div>	
				</div>
				<div id=t_r>
					<span style="color:#246bb0; font-size:14px; font-weight:bold;">姓名：沈南鹏</span><br><br>
					<span style="color:#333333; font-weight:bold;">所在公司：</span>红杉资本<br>
					<span style="color:#333333; font-weight:bold;">身份：</span>创始投资人<br>
					<span style="color:#333333; font-weight:bold;">投资方向：</span>互联网、生物、高科技、服务业<br><br>
					<span style="color:#333333; font-weight:bold;">个人介绍：</span><br>
					<div id=js>1999年沈南鹏担任携程旅行网的创始人及董事，并曾长期担任公司总裁及首席财务官职位。携程旅行网(Nasdaq: CTRP)是中国最大的旅行服务公司，2003年底在纳斯达克上市。他也是如家连锁酒店(Nasdaq: HMIN)的创始人及联席董事长，如家连锁酒店是中国经济型连锁酒店的龙头企业，2006年成功登陆纳斯达克。他也是中国最大的户外媒体企业分众传媒(Nasdaq: FMCN), 中国最大的房地产服务公司易居中国</div>
				</div>
				<div class=t_l_title>投资项目</div>
				<table>
					<tr class=tr1 align=center>
						<td width=200>公司名称</td>
						<td width=100>投资类别</td>
						<td width=100>行业</td>
						<td width=99>投资金额</td>
					</tr>
					<?php for($i=0;$i<4;$i++){ ?>
					<tr class=tr2 align=center>
						<td width=200>MasaMaso</td>
						<td width=100>VC</td>
						<td width=100>电子商务</td>
						<td width=99>3000万美元</td>
					</tr>
					<?php } ?>
				</table>
				<div class=dash></div>
				<div class=t_l_title>职业生涯</div>
				<table>
					<tr class=tr1 align=center>
						<td width=200>所在企业</td>
						<td width=100>担任职务</td>
						<td width=199>起止时间</td>
					</tr>
					<?php for($i=0;$i<2;$i++){ ?>
					<tr class=tr2 align=center>
						<td width=200>红杉资本</td>
						<td width=100>投资顾问</td>
						<td width=199>2005.9—— </td>
					</tr>
					<?php } ?>
				</table>
				<div class=dash></div>
				<div class=t_l_title style="margin-top:40px;">投资动态</div>
				<div id=l_t_b>
					<?php for($i=0;$i<7;$i++){ ?>
					<div class=cl><a href="">·最佳投资人榜单资人榜单资人榜单资人榜单资人榜单</a></div>
					<?php } ?>
				</div>
			</div>
			<div id=l_t_bottom></div>
			<div id=l_b_top></div>
			<div id=l_b_mid>
				<div class=l_b_l>点击按字母排序</div>
				<div class=l_b_r><a href="">A</a><a href="">B</a><a href="">C</a><a href="">D</a><a href="">E</a><a href="">F</a><a href="">G</a><a href="">H</a><a href="">I</a><a href="">J</a><a href="">K</a><a href="">L</a><a href="">M</a><a href="">N</a><a href="">O</a><a href="">P</a><a href="">Q</a><a href="">R</a><a href="">S</a><a href="">T</a><a href="">U</a><a href="">V</a><a href="">W</a><a href="">X</a><a href="">Y</a><a href="">Z</a></div>
				<div class=l_b_l>按照投资行业索引</div>
				<div class=l_b_r>
					<select></select>
					<button></button>	
				</div>
			</div>
			<div id=l_b_bottom></div>
		</div>
		<div id=right>
			<a style="margin:0px; float:right; display:inline;" href=""><img border=0 width=322 height=267 src="/images/right/one.jpg"></a>
			<div id=bm>
				<button></button>	
			</div>
			<div class=hy_r_b_title>
				<div class=wz>投资人动态</div>
			</div>
			<div id=r_c_left></div>
			<div id=r_c_center>
				<table width=100% >
					<tr class=tr1 align="center">
						<td width=50>人物</td>
						<td width=80>投资人类别</td>
						<td width=90>最近投资企业</td>
						<td width=75>涉及金额</td>
					</tr>
					<?php for($i=0;$i<10;$i++){ ?>
					<tr class=tr2 align="center">
						<td width=50>小雨成</td>
						<td width=80>VC</td>
						<td width=90>徐福记</td>
						<td width=75>1.35亿美元</td>
					</tr>
					<?php } ?>
				</table>	
			</div>
			<div id=r_c_right></div>
			<div class=hy_r_b_title>
				<div class=wz>福布斯精华文章定制</div>
			</div>
			<div id=hy_r_b_left></div>
			<div id=hy_r_b_center>
				<div id=content>
					<div id=content_t>
						<div id=content_t_l>
							订阅福布斯快闻<input type="radio"><span style="font-size:12px; font-weight:normal; color:#666666;">我要定制</span>	
						</div>
						<div id=content_t_r>
							<button>定制</button>	
						</div>	
					</div>
					<div id=content_b>
						<div id=content_b_l>
							<span style="font-size:14px; color:#11579e; font-weight:bold;">订阅分类文章</span>
							<div class=cl><input type="radio">富豪<input type="radio">创业<input type="radio">商业</div>
							<div class=cl><input type="radio">投资<input type="radio">生活</div>
						</div>
						<div id=content_b_r>
							<button>定制</button>	
						</div>	
					</div>	
				</div>	
			</div>
			<div id=hy_r_b_right></div>
		</div>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>