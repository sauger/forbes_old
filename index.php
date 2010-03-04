<?php 
	session_start();
	require_once('frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯首页</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('index','select2css');
	?>
</head>
<body>
	<div id="ibody">
		<?php include "inc/top.inc.php";?>
		<div id=t_l_t>
			<img src="/images/index/google.jpg">
			<div id=t_l_t_l>
				<div id=title><a href="">陆家嘴早餐</a></div>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=content><a href=""><img border=0 src="images/index/t_l_t_l_content.jpg"> 瑞银与高盛领跑AIG香港领跑AIG香港领跑AIG香港上市业务</a></div>
				<?php } ?>
			</div>
			<div id=t_l_t_r>
				<div id=title><a href="">专题</a></div>
				<div id=left><img style="cursor:pointer;" border=0 src="images/index/t_l_t_r_left.jpg"></div>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=content>
						<div class=pic><a href=""><img border=0 src="images/index/one.jpg"></a></div>
						<div class=cl><a href="">后危机时更</a></div>
					</div>
				<?php } ?>
				<div id=right><img style="cursor:pointer;" border=0 src="images/index/t_l_t_r_right.jpg"></div>
			</div>
		</div>
		<div id=t_r_t>
			<div class=title style="background:url('images/index/t_t_t_title1.jpg') no-repeat;">富豪榜</div>
			<div class=title>公司榜</div>	
			<div class=title>名人榜</div>
			<div id=phb>
				<div id=ph>　排名　　 姓名　　　财富（亿）</div>
				<div id=phname>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">1.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">2.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">3.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">4.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">5.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">6.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">7.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">8.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">9.</span><a href="">刘永行</a>　　　304.0</div>
					<div class=content>　<span style="color:#000000; font-weight:bold;">10.</span><a href="">刘永行</a>　　　304.0</div>
				</div>
				<div id=bottom>
					<div id=title>动态富豪榜</div>
					<?php for($i=0;$i<3;$i++){ ?>
						<div class=content><img border=0 src="images/index/t_l_t_l_content.jpg"> 瑞银与高盛领跑AIG香港上市业务</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div id=c_l>
			<div class=title>
				<div class=wz><img border=0 src="images/index/square.jpg"> 创业</div>
			</div>
			<div class=content1>
				<div class=pic><a href=""><img border=0 src="images/index/one.jpg"></a></div>
				<div class=piccontent>
					<div class=p_title><a href="">安东尼·波顿中国基金揭秘</a></div>
					<div class=p_content><a href="">这位明星基金经理将面对私人投资者推出一个迄今规的投资信托，希望募资6.3亿...</a></div>
				</div>
				<?php for($i=0;$i<3;$i++){ ?>
					<div class=cl><a href=""><img border=0 src="images/index/jia.gif">　【创业投资】中国经济的泡沫有多大？</a></div>
				<?php } ?>
			</div>
			<div class=title>
				<div class=wz><img border=0 src="images/index/square.jpg"> 投资</div>
				<div class=more><a href="">more <span style="color:#0099FF">+</span></a></div>
			</div>
			<div class=content2>
				<div class=pic><a href=""><img border=0 src="images/index/one.jpg"></a></div>
				<div class=piccontent>
					<div class=p_title><a href="">安东尼·波顿中国基金揭秘</a></div>
					<div class=p_content><a href="">这位明星基金经理将面对私人投资者推出一个迄今规的投资信托，希望募资6.3亿...</a></div>
				</div>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=cl><a href=""><img border=0 src="images/index/jia.gif">　【创业投资】中国经济的泡沫有多大？</a></div>
				<?php } ?>	
			</div>
			<div class=title>
				<div class=wz><img border=0 src="images/index/square.jpg"> 商业</div>
				<div class=more><a href="">more <span style="color:#0099FF">+</span></a></div>
			</div>
			<div class=content2>
				<div class=pic><a href=""><img border=0 src="images/index/one.jpg"></a></div>
				<div class=piccontent>
					<div class=p_title><a href="">安东尼·波顿中国基金揭秘</a></div>
					<div class=p_content><a href="">这位明星基金经理将面对私人投资者推出一个迄今规的投资信托，希望募资6.3亿...</a></div>
				</div>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=cl><a href=""><img border=0 src="images/index/jia.gif">　【创业投资】中国经济的泡沫有多大？</a></div>
				<?php } ?>	
			</div>
			<div class=title>
				<div class=wz><img border=0 src="images/index/square.jpg"> 科技</div>
				<div class=more><a href="">more <span style="color:#0099FF">+</span></a></div>
			</div>
			<div class=content2>
				<div class=pic><a href=""><img border=0 src="images/index/one.jpg"></a></div>
				<div class=piccontent>
					<div class=p_title><a href="">安东尼·波顿中国基金揭秘</a></div>
					<div class=p_content><a href="">这位明星基金经理将面对私人投资者推出一个迄今规的投资信托，希望募资6.3亿...</a></div>
				</div>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=cl><a href=""><img border=0 src="images/index/jia.gif">　【创业投资】中国经济的泡沫有多大？</a></div>
				<?php } ?>	
			</div>
			<div id=l_b>
				<div class=title>
					<div id=wz>读者高见</div>
					<div id=more><a href=""><img border=0 src="images/index/c_r_t_more.gif"></a></div>
				</div>
				<div class=content1>
					<div class=context><a href="">XXXDDD说：<br>中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>	
				</div>
				<div class=content2>
					<div class=context><a href="">XXXDDD说：<br>中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>	
				</div>
				<div class=content1>
					<div class=context><a href="">XXXDDD说：<br>中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>	
				</div>
				<div class=content2>
					<div class=context><a href="">XXXDDD说：<br>中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>	
				</div>
			</div>
		</div>
		
		<div id=c_c>
			<div class=title>专栏</div>
			<div class=content>
				<div class=context>
					<div class=cleft>
						<div class=pic>
								<a href=""><img border=0 src="images/index/two.jpg"></a>
						</div>
						<div class=piccl><a href="">送没摸</a></div>
					</div>
					<div class=piccontent>
						<div class=p_title><a href="">送没摸的专栏</a></div>
						<div class=p_content><a href="">在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</a></div>
					</div>
				</div>
				<div class=context>
					<div class=cleft>
						<div class=pic>
								<a href=""><img border=0 src="images/index/two.jpg"></a>
						</div>
						<div class=piccl><a href="">送没摸</a></div>
					</div>
					<div class=piccontent>
						<div class=p_title><a href="">送没摸的专栏</a></div>
						<div class=p_content><a href="">在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</a></div>
					</div>
				</div>
			</div>
			<div class=c_c_b>
					<?php for($i=0;$i<6;$i++){ ?>
						<div class=cl><a href=""><img border=0 src="images/index/jia.gif">　比尔盖茨的专栏</a></div>
					<?php } ?>
			</div>
			<div class=title>采编专栏</div>
			<div class=content>
				<div class=context>
					<div class=cleft>
						<div class=pic>
								<a href=""><img border=0 src="images/index/two.jpg"></a>
						</div>
						<div class=piccl><a href="">送没摸</a></div>
					</div>
					<div class=piccontent>
						<div class=p_title><a href="">送没摸的专栏</a></div>
						<div class=p_content><a href="">在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</a></div>
					</div>
				</div>
				<div class=context>
					<div class=cleft>
						<div class=pic>
								<a href=""><img border=0 src="images/index/two.jpg"></a>
						</div>
						<div class=piccl><a href="">送没摸</a></div>
					</div>
					<div class=piccontent>
						<div class=p_title><a href="">送没摸的专栏</a></div>
						<div class=p_content><a href="">在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</a></div>
					</div>
				</div>
			</div>
			<div class=c_c_b>
					<?php for($i=0;$i<5;$i++){ ?>
						<div class=cl><img border=0 src="images/index/jia.gif">　<a href="">比尔盖茨的专栏</a></div>
					<?php } ?>
					<div class=cl><a style="color:#336699;" href="">更多专栏>></a></div>
			</div>
		</div>
		<div id=c_r>
			<div id=c_r_t>
				<div id=title>
					<div id=wz>论坛活动</div>
					<div id=more><a href=""><img border=0 src="images/index/c_r_t_more.gif"></a></div>
				</div>
				<div id=content>
					<img src="images/index/three.jpg"><br>
					<span style="font-size:13px; color:#333333">　2010福布斯中国经济发展论坛</span><br>
					　举办日期：3月18日
					　<div id=address>地点：上海</div><div id=info><a href="">查看详细</a></div>
				</div>
			</div>
			<div class=c_r_m>
				<div class=c_r_m_t>
					<div class=title>增长俱乐部</div>
					<div class=content>
						<div class=pic>
							<a href=""><img border=0 src="images/index/one.jpg"></a>	
						</div>	
						<div class=pictitle>
							<a href="">沪二手房议价空间议价</a>
						</div>
						<div class=piccontent>
							<a href="">　2月初，因受贿罪和滥用职权罪，中国出口信用保险公司......</a>
						</div>
					</div>
				</div>
				<div class=c_r_m_b>
					<a href="">我要报名</a>　<a style="color:#000000;" href="">VC/PE/天使人投资人数据库</a>	
				</div>
			</div>
			<div class=c_r_m>
				<div class=c_r_m_t>
					<div class=title>城市</div>
					<div class=content>
						<div class=pic>
							<a href=""><img border=0 src="images/index/one.jpg"></a>	
						</div>	
						<div class=pictitle>
							<a href="">沪二手房议价空间议价</a>
						</div>
						<div class=piccontent>
							<a href="">　2月初，因受贿罪和滥用职权罪，中国出口信用保险公司......</a>
						</div>
					</div>
				</div>
				<div class=c_r_m_b>
					<div class="image"><img border=0 src="images/index/c_r_m_t.gif"></div><a href="">城市榜</a>　<a style="color:#000000;" href="">太仓：被低估的商业城市</a>	
				</div>
			</div>
		</div>
		<div class=c_r_img>
			<a href=""><img border=0 src="images/index/bannwe-for.jpg"></a>
		</div>
		<div class=c_b_t>
				<div class=title>奢华</div>
				<div class=c_b_t_top><a href=""><img border=0 src="images/index/c_b_t_top.jpg"></a></div>
				<div class=c_b_t_content>
					<div class=top>
						<div class=pic><a href=""><img border=0 src="images/index/four.jpg"></a></div>
						<div class=piccontent>
							<div class=pictitle><a href="">中国经济的泡沫多大？</a></div>
							<div class=content><a href="">在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</a></div>
						</div>
					</div>
					<div class=top style="margin-top:20px;">
						<div class=pic><a href=""><img border=0 src="images/index/four.jpg"></a></div>
						<div class=piccontent>
							<div class=pictitle><a href="">中国经济的泡沫多大？</a></div>
							<div class=content><a href="">在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</a></div>
						</div>
					</div>
				</div>
				<div class=c_b_t_bottom><a href=""><img border=0 src="images/index/c_b_t_bottom.jpg"></a></div>	
		</div>
		<div id=r_b_t>
			<div class=title><div id=wz>在线调查</div><div id=more><a href=""><img border=0 src="images/index/c_r_t_more.gif"></a></div></div>
			<div class=content>
				<a href=""><img border=0 src="images/index/jiantou.jpg">　<span style="font-weight:bold">中国顶尖的NBA问卷调查</span><br>参与调查者有机会获得全年《福布斯》杂志<br><button>进入调查</button></a>	
			</div>
			<div class=content>
				<a href=""><img border=0 src="images/index/jiantou.jpg">　<span style="font-weight:bold">中国顶尖的NBA问卷调查</span><br>参与调查者有机会获得全年《福布斯》杂志<br><button>进入调查</button></a>	
			</div>
		</div>
		<div id=r_b_b>
				<div class=title><div id=wz>福布斯杂志</div><div id=more><a href=""><img border=0 src="images/index/c_r_t_more.gif"></a></div></div>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="images/index/five.jpg"></a></div>
					<div class=piccontent>
						<div class=pictitle>福布斯2010/1</div>
						<div class=context>在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</div>	
					</div>
				</div>
				<div id=search>往期杂志查阅</div>
				<div id=sel><select></select>　<select></select></div>
				<button id="btnonline"></button><button id="sq"></button>
				<div id=ck><a href="">查看杂志列表>></a></div>
		</div>
		<div id=c_b_b>
			<div class=title1>最受欢迎</div>
			<div class=title2>编辑推荐</div>
			<?php for($i=0;$i<7;$i++){ ?>
				<div class=cl><a href=""><img border=0 src="images/index/bitmap.jpg">　中国的出口优势不在汇不在汇不在率中国的出口汇率</a></div>
			<?php } ?>
		</div>
		<?php include "inc/bottom.inc.php";?>
	</div>
</body>
</html>