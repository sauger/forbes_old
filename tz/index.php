<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-投资首页</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('tz','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　<a href="">投资首页</a></div>
		<div id=cyline></div>
		<div id=tz_left>
			<div id=tz_l_t_title><a href="">迟福林：提升消费率可以改变经济增长</a></div>
			<div id=tz_l_t_pic>
				<a href=""><img border=0 src="/images/tz/one.jpg"></a>	
			</div>
			<div id=tz_l_t_r>
				<div id=tz_l_t_r_t><a href="">让人民币升值对世界将是一件好事。这倒不是因为缩小中国贸易盈余将提振全球需求，而是因为这将遏制又一场廉价信贷“海啸”。重要得多的是，这将有利于中国。</a></div>
				<div id=tz_l_t_r_b><a href="">·两会释放的人民币升值信号</a>　<a href="">·周小川：“特殊”汇率政策迟早要退出</a><br><a href="">·两会释放的人民币升值信号</a></div>
			</div>
			<div id=tz_l_b_l>
				<div class=l_b_l_title>
					<div class=pic></div>
					<div class=wz>投资新闻</div>
					<div class=l_b_sx>|</div>
					<div class=more><a href=""><img border=0 src="/images/index/more.jpg"></a></div>
				</div>
				<?php for($i=0;$i<5;$i++){ ?>
					<div class=tz_l_b_l_t_title><a href="">深航总裁李昆涉嫌经济犯罪接调查</a></div>
					<div class=tz_l_b_l_t_content><a href="">深圳航空有限责任公司总裁的任中国南方航空股份有限公司常务副总经理，接掌深航仅3...</a></div>
				<?php } ?>
				<div class=l_b_l_title>
					<div class=pic></div>
					<div class=wz>文章</div>
					<div class=l_b_sx>|</div>
					<div class=more><a href=""><img border=0 src="/images/index/more.jpg"></a></div>
				</div>
				<?php for($i=0;$i<10;$i++){ ?>
					<div class=tz_l_b_l_b_content><a href="">·希腊成功发行50亿欧元国债</a></div>
				<?php } ?>
			</div>
			<div id=tz_l_dash></div>
			<div id=tz_l_b_r>
				<div class=l_b_l_title>
					<div class=pic></div>
					<div class=wz>投资专题</div>
					<div class=l_b_sx>|</div>
					<div class=more><a href=""><img border=0 src="/images/index/more.jpg"></a></div>
				</div>
				<div class="tz_l_b_r_content">
					<div class=tz_l_b_r_pic><a href=""><img border=0 src="/images/tz/two.jpg"></a></div>
					<div class=tz_l_b_r_pictitle><a href="">深航总裁李昆涉嫌经济犯罪接受调查</a></div>
					<div class=tz_l_b_r_piccontent><a href="">深圳航空有限责任公司总裁的李昆国南方航空股份有限公司常务副总经理，接掌深航仅3...</a></div>
				</div>
				<div class="tz_l_b_r_content">
					<div class=tz_l_b_r_pic><a href=""><img border=0 src="/images/tz/two.jpg"></a></div>
					<div class=tz_l_b_r_pictitle><a href="">深航总裁李昆涉嫌经济犯罪接受调查</a></div>
					<div class=tz_l_b_r_piccontent><a href="">深圳航空有限责任公司总裁的李昆国南方航空股份有限公司常务副总经理，接掌深航仅3...</a></div>
				</div>
				<?php for($i=0;$i<6;$i++){ ?>
					<div class=tz_l_b_l_b_content><a href="">·希腊成功发行50亿欧元国债</a></div>
				<?php } ?>
				<div class=l_b_l_title style="margin-bottom:5px;">
					<div class=pic></div>
					<div class=wz>投资专栏</div>
					<div class=l_b_sx>|</div>
					<div class=more><a href=""><img border=0 src="/images/index/more.jpg"></a></div>
				</div>
				<div class=tz_l_b_r_b>
					<a href=""><span style="color:#003899; font-size:14px; font-weight:bold;">网络业的水模式</span><br>FT 中文网专栏作家程苓峰：水有“真诚，清净，平等，觉悟，慈悲”五性。水能承载，与万物相安，体现于商业。</a>	
				</div>
				<div class=tz_l_b_r_b_zl>——康桥健笔专栏</div>
				<div class=tz_l_b_r_b>
					<a href=""><span style="color:#003899; font-size:14px; font-weight:bold;">网络业的水模式</span><br>FT 中文网专栏作家程苓峰：水有“真诚，清净，平等，觉悟，慈悲”五性。水能承载，与万物相安，体现于商业。</a>	
				</div>
				<div class=tz_l_b_r_b_zl>——康桥健笔专栏</div>
				<div class=tz_l_b_r_b>
					<a href=""><span style="color:#003899; font-size:14px; font-weight:bold;">网络业的水模式</span><br>FT 中文网专栏作家程苓峰：水有“真诚，清净，平等，觉悟，慈悲”五性。水能承载，与万物相安，体现于商业。</a>	
				</div>
				<div class=tz_l_b_r_b_zl>——康桥健笔专栏</div>
			</div>
		</div>
		<div id=right>
			<a style="margin:0px; float:right; display:inline;" href=""><img border=0 width=317 height=265 src="/images/right/one.jpg"></a>
			<div id=r_t_title>
				<div id=wz>投资榜单</div>
				<div id=more><a href=""><img border=0 src="/images/index/c_r_t_more.gif"></a></div>	
			</div>
			<div id=r_t_l></div>
			<div id=r_t_c>
				<?php for($i=0; $i<4; $i++){ ?>
					<div class=content><a href="">·2009年度中国最佳投资企业榜单查看详细</a></div>
				<?php } ?>
			</div>
			<div id=r_t_r></div>
			<div id=r_title>
				<div class=title1>最受欢迎</div><div class=title2>编辑推荐</div>
			</div>
			<div id=r_content_left></div>
			<div id=r_content>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
			</div>
			<div id=r_content_right></div>
			<div id=r_c_title>投资活动</div>
			<div id=r_c_l></div>
			<div id=r_c_c>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="/images/tz/three.jpg"></a></div>
					<div class=pictitle><a href="">希腊总理：我们没有向<br>中国寻求援助</a></div>
				</div>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="/images/tz/three.jpg"></a></div>
					<div class=pictitle><a href="">希腊总理：我们没有向<br>中国寻求援助</a></div>
				</div>
			</div>
			<div id=r_c_r></div>
			<div id=hy_r_b_title>
				<div id=wz>福布斯精华文章定制</div>	
			</div>
			<div id=hy_r_b_left></div>
			<div id=hy_r_b_center>
				<div id=content>
					<div id=content_t>
						<div id=content_t_l>
							订阅福布斯快闻　<input type="radio"><span style="font-size:12px; font-weight:normal; color:#666666;">我要定制</span>	
						</div>
						<div id=content_t_r>
							<button>定制</button>	
						</div>	
					</div>
					<div id=content_b>
						<div id=content_b_l>
							<span style="font-size:14px; color:#11579e; font-weight:bold;">订阅分类文章</span>
							<div class=cl><input type="radio">富豪　<input type="radio">创业　<input type="radio">商业</div>
							<div class=cl><input type="radio">投资　<input type="radio">生活</div>
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