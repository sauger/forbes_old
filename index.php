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
	<div id=ibody>
		<div id=banner><a herf="#"><img border=0 src="images/index/top_banner.jpg"></a></div>
		<div id=itop>
			<div class="tm2008style">
				<select name="selsearch" class="iselect">
					<option>榜单</option>
					<option>富豪</option>
					<option>文章</option>
				</select>
			</div>
			<input class="iinput">
			<button class=search>查 询</button>
			<button class=login>登 陆</button>
			<a herf="">注册</a>
		</div>
		<div id=navigation>
			<div class="content" style="background:#336699;">首页</div>
			<div class="content">榜单</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">富豪</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">城市</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">创业</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">商业</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">科技</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">投资</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">评论</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">奢华</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">forum</div><div class=vertical><img width=1 height=25px; src="/images/index/vertical.gif"></div>
			<div class="content">专栏</div>
		</div>
		<div id=navigation2>
			<div class="content">
				<a style="text-decoration:none;" herf="">能源重工</a> |　<a herf="">汽车</a> |　<a herf="">快速消费品</a> |　<a herf="">健康产业</a> |　<a herf="">房产</a> |　<a herf="">物流零售</a> |　<a herf="">金融</a> | <a herf="">3C</a> | <a herf="">文化媒体</a> | <a herf="">旅游酒店</a> | <a style="text-decoration:none;" herf="">领导力</a> | <a style="text-decoration:none;" herf="">职场</a> |
			</div>
			<div id=hyzq><a style="margin-left:40px;" href="">会员专区</a><a style="margin-left:60px;" href="">杂志赠送</a></div>
		</div>
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
		<div id=ibottom>
				<div class=td1><a style="font-weight:bold;" href="">[榜单]</a><br><a href="">富豪榜</a><br><a href="">城市榜</a><br><a href="">公司榜</a><br><a href="">体育榜</a><br><a href="">名人榜</a><br><a href="">教育榜</a></div>
				<div class=td1><a style="font-weight:bold;" href="">[富豪]</a><br><a href="">富豪榜</a><br><a href="">富豪报道</a><br><a href="">富豪对话</a><br><a href="">图片富豪榜</a></div>
				<div class=td1><a style="font-weight:bold;" href="">[城市]</a><br><a href="">城市报道<br><a href="">城市资料</a><br><a href="">城市活动</a><br><a href="">城市列表</a><br><a href="">城市特辑</a><br><a href="">城市评论</a></div>
				<div class=td4><a style="font-weight:bold;" href="">[创业]</a><br><a href="">创业故事</a><br><a href="">创业投资</a><br><a href="">创业人物</a></div>
				<div class=td1><a style="font-weight:bold;" href="">[商业]</a><br><a href="">能源重工</a><br><a href="">汽车</a><br><a href="">快速消费品</a><br><a href="">健康产业</a><br><a href="">房产</a><br><a href="">下一页>></a></div>
				<div class=td1><a style="font-weight:bold;" href="">[科技]</a><br><a href="">创新</a><br><a href="">能源</a><br><a href="">生物</a><br><a href="">医药</a><br><a href="">TNT</a></div>
				<div class=td1><a style="font-weight:bold;" href="">[投资]</a><br><a href="">慈善</a><br><a href="">保险</a><br><a href="">基金</a><br><a href="">股票</a><br><a href="">收藏</a></div>
				<div class=td1><a style="font-weight:bold;" href="">[评论]</a><br><a href="">新闻</a><br><a href="">宏观</a><br><a href="">市场</a><br><a href="">商业</a><br><a href="">金融</a></div>
				<div class=td4><a style="font-weight:bold;" href="">[奢侈]</a><br><a href="">奢侈品</a><br><a href="">旅游</a><br><a href="">社交圈</a><br><a href="">礼仪课堂</a></div>
				<div class=td2><a style="font-weight:bold;" href="">[增长俱乐部]</a><br><a href="">创业创富</a><br><a href="">公司/产业研究报告</a><br><a href="">投融资行业分析报告</a><br><a href="">VC/PE/投资人数据库</a><br><a href="">项目创业者数据库</a></div>
				<div class=td1><a style="font-weight:bold;" href="">[奢侈]</a><br><a href="">特约记者</a><br><a href="">记者专栏</a></div>
				<div class=td3><a style="font-weight:bold;" href="">[会员俱乐部]</a><br><a href="">会员俱乐部介绍</a><br><a href="">读者调查</a><br><a href="">申请赠阅</a><br><a href="">会员公告</a><br><a href="">读者来函</a><br><a href="">礼品兑换</a></div>
				<div id=td5><a href="">关于福布斯中文网</a> - <a href="">新闻动态</a> - <a href="">广告服务</a> - <a href="">诚聘英才</a> - <a href="">友情连接</a> - <a href="">会员活动</a> - <a href="">隐私声明</a> - <a href="">网站声明</a> - <a href="">联系我们</a> - <a href="">网站地图</a></div>
		</div>
	</div>
</body>
</html>