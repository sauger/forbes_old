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
		css_include_tag('index','top','bottom','select2css');
	?>
</head>
<body>
	<div id=ibody>
		<? require_once('inc/top.inc.php');?>
		<div id=t_l_t>
			<div id=t_l_t_t>
				<div id=t_l_t_t_l><a href=""><img border=0 src="images/index/l_t_t_img.jpg"></a></div>
				<div id=t_l_t_t_r>
					<div id=title><a href="">今早在意大利法庭判宣判谷</a></div>
					<div id=content><a href="">据意大利安克罗诺斯通讯社报道，当庭被宣布定罪的3人当庭被宣布定罪的3人包括括谷歌高...</a></div>
					<div class=cl><a href="">·　瑞银与高盛领跑AIG香港领跑</a></div>
					<div class=cl><a href="">·　瑞银与高盛领跑AIG香港领跑</a></div>
					<div class=cl><a href="">·　瑞银与高盛领跑AIG香港领跑</a></div>
					<div id=more><a href="">查看更多</a></div>
					<div id=btn>
						<a href=""><img border=0 src="images/index/slideshow_back.gif"></a>
						<a href=""><img border=0 src="images/index/slideshow_active.gif"></a>
						<a href=""><img border=0 src="images/index/slideshow_unactive.gif"></a>
						<a href=""><img border=0 src="images/index/slideshow_unactive.gif"></a>
						<a href=""><img border=0 src="images/index/slideshow_unactive.gif"></a>
						<a href=""><img border=0 src="images/index/slideshow_next.gif"></a>	
					</div>
				</div>
			</div>
			<div id=t_l_t_l>
				<div id=title><a href="">陆家嘴早餐</a></div>
					<div id=content1><a href=""><img border=0 src="images/index/t_l_t_l_content.jpg"> 瑞银与高盛领跑AIG香港领跑AIG香港领跑AIG香港上市业务</a></div>
					<div id=content2><a href=""><img border=0 src="images/index/t_l_t_l_content.jpg"> 瑞银与高盛领跑AIG香港领跑AIG香港领跑AIG香港上市业务</a></div>
					<div id=content3><a href=""><img border=0 src="images/index/t_l_t_l_content.jpg"> 瑞银与高盛领跑AIG香港领跑AIG香港领跑AIG香港上市业务</a></div>
					<div id=coffee></div>
			</div>
			<div id=t_l_t_r>
				<div id=left><img style="cursor:pointer;" border=0 src="images/index/t_l_t_r_left.jpg"></div>
				<?php for($i=0;$i<3;$i++){ ?>
					<div class=content>
						<div class=pic><a href=""><img border=0 src="images/index/one.jpg"></a></div>
						<div class=cl><a href="">后危机时更</a></div>
					</div>
				<?php } ?>
				<div id=right><img style="cursor:pointer;" border=0 src="images/index/t_l_t_r_right.jpg"></div>
			</div>
		</div>
		<div id=t_r_t>
			<div class=title style="background:url('images/index/t_r_t_title1.jpg') no-repeat; font-weight:bold; color:#000000;">实时财富</div>
			<div class=title>财富过山车</div>	
			<div class=title>名人榜</div>	
			<div class=title>城市榜</div>
			<div id=phb>
				<div id=ph>　排名　　 　 姓名　　　　 财富（亿）　　 变动</div>
				<div id=phname>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">1.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">2.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">3.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">4.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">5.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">6.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">7.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">8.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">9.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　<span style="color:#000000; font-weight:bold;">10.</span><a style="margin-left:48px;" href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
				</div>
				<div id=bottom>
					<div id=title>实时财富动态</div>
					<?php for($i=0;$i<2;$i++){ ?>
						<div class=content><img border=0 src="images/index/t_l_t_l_content.jpg"> 瑞银与高盛领跑AIG香港上市业务</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class=c_l>
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>创业　</div>
				<div class=line>|</div>
				<div class=more><a href=""><img border=0 src="images/index/more.jpg"></a></div>
			</div>
			<div class=content1>
				<div class=piccontent>
					<div class=p_title><a href="">安东尼·波顿中国基金揭秘</a></div>
					<div class=p_content><a href="">这位明星基金经理将面对私人投资者推出一个迄今规的投资信托，希望募资6.3亿...</a></div>
				</div>
				<?php for($i=0;$i<3;$i++){ ?>
					<div class=cl><a href=""><img border=0 src="images/index/point1.jpg">　创业投资中国经济的泡沫有多大？</a></div>
				<?php } ?>
			</div>
			<div class=dash></div>
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>商业</div>
				<div class=line>|</div>
				<div class=more><a href=""><img border=0 src="images/index/more.jpg"></a></div>
			</div>
			<div class=content1>
				<div class=piccontent>
					<div class=p_title><a href="">安东尼·波顿中国基金揭秘</a></div>
					<div class=p_content><a href="">这位明星基金经理将面对私人投资者推出一个迄今规的投资信托，希望募资6.3亿...</a></div>
				</div>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=cl><img border=0 src="images/index/point1.jpg">　<a href="">创业投资中国经济的泡沫有多大？</a></div>
				<?php } ?>	
			</div>
			<div class=dash></div>
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>科技</div>
				<div class=line>|</div>
				<div class=more><a href=""><img border=0 src="images/index/more.jpg"></a></div>
			</div>
			<div class=content1>
				<div class=piccontent>
					<div class=p_title><a href="">安东尼·波顿中国基金揭秘</a></div>
					<div class=p_content><a href="">这位明星基金经理将面对私人投资者推出一个迄今规的投资信托，希望募资6.3亿...</a></div>
				</div>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=cl><img border=0 src="images/index/point1.jpg">　<a href="">创业投资中国经济的泡沫有多大？</a></div>
				<?php } ?>	
			</div>
			<div class=dash></div>
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>专栏</div>
				<div class=line>|</div>
				<div class=more><a href=""><img border=0 src="images/index/more.jpg"></a></div>
			</div>
			<div class=content1>
				<div id=left><img style="cursor:pointer;" border=0 src="images/index/left_zhuanlan.jpg"></div>
				<?php for($i=0;$i<3;$i++){ ?>
					<div class=content>
						<div class=cpic><a href=""><img border=0 src="images/index/one.jpg"></a></div>
						<div class=ccl><a href="">后危机时更</a></div>
					</div>
				<?php } ?>
				<div id=right><img style="cursor:pointer;" border=0 src="images/index/right_zhuanlan.jpg"></div>
				<div class=cltitle><a href="">送没摸的专栏</a></div>
				<?php for($i=0;$i<3;$i++){ ?>
					<div class=cl><a href=""><img border=0 src="images/index/point1.jpg">　创业投资中国经济的泡沫有多大？</a></div>
				<?php } ?>
				<div id=ck><a href="">查看更多此人专栏>></a></div>
			</div>
			<div class=dash></div>
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>读者高见</div>
				<div class=line>|</div>
				<div class=more><a href=""><img border=0 src="images/index/more.jpg"></a></div>
			</div>
			<div class=context><a href="">中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口保... ...</a></div>
			<div class=context1><a href="">孙尤其</a>　|　<a href="">中信保险以来长存</a></div>
			<div class=context><a href="">中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口保... ...</a></div>
			<div class=context1><a href="">孙尤其</a>　|　<a href="">中信保险以来长存</a></div>
			<div class=context><a href="">中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口保... ...</a></div>
			<div class=context1><a href="">孙尤其</a>　|　<a href="">中信保险以来长存</a></div>
			<div class=context><a href="">中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口保... ...</a></div>
			<div class=context1><a href="">孙尤其</a>　|　<a href="">中信保险以来长存</a></div>
		</div>
		
		<div class=c_l style="margin-left:15px;">
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>投资</div>
				<div class=line>|</div>
				<div class=more><a href=""><img border=0 src="images/index/more.jpg"></a></div>	
			</div>
			<div class=content3>
				<div id=content3_title><a href="">中国本土私人股本基金挑战</a></div>
				<div class=piccontent1>
					<a class=pic href=""><img border=0 src="images/index/two.jpg"></a><a href="">直到资集团仍把持着中国约80%的私人股本市场，但如仍把持着把持着把持着把持中国约80%的私人股本市场，但如今中国已涌现出国已涌现出国已涌现出众多团...</a>
				</div>
				<?php for($i=0;$i<5;$i++){ ?>
					<div class=cl><img border=0 src="images/index/point1.jpg">　<a href="">创业投资中国经济的泡沫有多大？</a></div>
				<?php } ?>
			</div>
			<div class=dash style="margin-top:20px;"></div>
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>奢华</div>
				<div class=line>|</div>
				<div class=more><a href=""><img border=0 src="images/index/more.jpg"></a></div>	
			</div>
			<div class=content3>
					<div class=image><a href=""><img border=0 src="images/index/car.jpg"></a></div>
					<div class=image_content>
						<div class=image_title><a href="">2011款R8敞篷车</a></div>
						<div class=image_context><a href="">奥迪汽车在09年的美国洛杉基国际车将他</a></div>
					</div>
					<div class=image_content style="margin-top:20px;">
						<div class=image_title><a href="">2011款R8敞篷车</a></div>
						<div class=image_context><a href="">奥迪汽车在09年的美国洛杉基国际车将他</a></div>
					</div>
					<div class=image style="margin-top:20px; margin-left:5px;"><a href=""><img border=0 src="images/index/car.jpg"></a></div>
			</div>
		</div>
		<div id=c_r>
			<div id=gg>
				<div id=gg_t>
					<div id=gg_t_l><a href="">财经魔鬼词典</a></div>
					<div id=gg_t_r><a href="">实用商业词汇</a>  |  <a href="">实用财经词汇</a></div>
				</div>
				<div id=gg_b_l><a href="">股指期货</a></div>
				<div id=gg_b_r><a href="">future 	index</a></div>
			</div>
			<div id=c_r_t>
				<div id=title>
					<div id=wz>论坛活动</div>
					<div id=more><a href=""><img border=0 src="images/index/c_r_t_more.gif"></a></div>
				</div>
				<div id=c_r_t_left></div>
				<div id=c_r_t_content>
					<div id=images><img src="images/index/three.jpg"></div>
					<div id=context>
						<span style="font-size:13px; color:#333333">2010福布斯中国经济发展论坛</span><br>举办日期：3月18日
					</div>
					<div id=address>地点：上海</div><div id=info><a href="">查看详细</a></div>	
				</div>
				<div id=c_r_t_right></div>
			</div>
			<div class=c_r_m>
				<div class=c_r_m_left></div>
				<div class=c_r_m_content>
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
						<div class=c_r_m_b_l><a href="">我要报名</a></div><div class=c_r_m_b_r><a style="color:#000000;" href="">VC/PE/天使人投资人数据库</a></div>	
					</div>
				</div>
				<div class=c_r_m_right></div>
			</div>
			<div class=c_r_m>
				<div class=c_r_m_left></div>
				<div class=c_r_m_content>
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
						<div class=c_r_m_b_l><img class=image src="images/index/c_r_m_t.gif"><a href="">城市榜</a></div><div class=c_r_m_b_r><a style="color:#000000;" href="">太仓：被低估的商业城市</a></div>	
					</div>
				</div>
				<div class=c_r_m_right></div>
			</div>
		</div>
		<div class=c_r_img>
			<a href=""><img border=0 src="images/index/bannwe-for.jpg"></a>
		</div>
		<div class=c_b_t>
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>最受欢迎　</div>
				<div class=line>|</div>
				<div class=more><a href="">编辑推荐</a></div>
			</div>
			<div class=content>
				<div class=cl style="margin-top:20px;"><a href=""><img border=0 src="images/index/point.jpg">　创业投资中国经济的泡沫有多大？</a></div>
				<?php for($i=1;$i<6;$i++){ ?>
					<div class=cl><a href=""><img border=0 src="images/index/point.jpg">　创业投资中国经济的泡沫有多大？</a></div>
				<?php } ?>
			</div>
			<div class=dash></div>
			
		</div>
		<div id=r_b_t>
			<div class=title><div id=wz>在线调查</div><div id=more><a href=""><img border=0 src="images/index/c_r_t_more.gif"></a></div></div>
			<div id=r_b_t_left></div>
			<div id=r_b_t_content>
				<div class=r_b_t_context>
					<a href=""><img border=0 src="images/index/jiantou.jpg">　<span style="font-weight:bold">中国顶尖的NBA问卷调查</span><br>参与调查者有机会获得全年《福布斯》杂志<br>参与调查者有机会获得全年《福布斯》杂志<br><button>进入调查</button></a>	
				</div>
				<div id=r_b_t_dash></div>
				<div class=r_b_t_context>
					<a href=""><img border=0 src="images/index/jiantou.jpg">　<span style="font-weight:bold">中国顶尖的NBA问卷调查</span><br>参与调查者有机会获得全年《福布斯》杂志<br>参与调查者有机会获得全年《福布斯》杂志<br><button>进入调查</button></a>	
				</div>
			</div>
			<div id=r_b_t_right></div>
		</div>
		<div class=c_l style="margin-left:15px;">
			<div class=title>
				<div class=t_pic><img border=0 src="images/index/square.jpg"></div>
				<div class=wz>采编智库　</div>
				<div class=line>|</div>
				<div class=more><a href=""><img border=0 src="images/index/more.jpg"></a></div>	
			</div>
			<div class=content1>
				<?php for($i=0;$i<8;$i++){ ?>
					<div class=context2>
						<div class=c_context_t>
							<a href=""><img border=0 src="images/index/seven.jpg"></a>	
						</div>
						<div class=c_context_b>
							<a href="">
								<span style="font-weight:bold;">康健</span><br>
								康桥健笔
							</a>	
						</div>	
					</div>
				<?php } ?>
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
				<div id=r_b_b_dash></div>
				<div id=search>往期杂志查阅</div>
				<div id=sel><select></select>　<select></select></div>
				<button id="btnonline"></button><button id="sq"></button>
				<div id=ck><a href="">查看杂志列表>></a></div>
		</div>
		<? require_once('inc/bottom.inc.php');?>
	</div>
</body>
</html>