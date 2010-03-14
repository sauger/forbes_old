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
		css_include_tag('hyjlb','top','bottom','right');
	?>
</head>
<body>
	<div id=ibody>
		<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a style="color:#666666;" href="">杂志　＞　</a><a href="">2010年第5期</a></div>
		<div id=cyline></div>
		<div id=hy_left>
			<div id=hy_l_t>
				<img src="/images/hyjlb/one.jpg">
				<div id=fd>
				</div>
				<div id=fd_l>会员俱乐部——他是一个冷酷无情的人，嗜酒如命且毒瘾甚深，有好几次差点把命都给送了，就因为在酒吧里看不顺眼一位酒保而犯下杀人罪，目前被判终身监禁。</div>
				<div id=fd_r><a href="">了解详情>></a></div>
			</div>
			<div class=hy_l_title_left></div>
			<div class=hy_l_title_center>
				<div class=wz>读者调查</div>
				<div class=more><a href="">more>></a></div>
			</div>
			<div class=hy_l_title_right></div>
			<div id="hy_l_content1_left"></div>
			<div id="hy_l_content1_center">
				<div class=content>
					<div class=content_l>
						<a href=""><img border=0 src="/images/hyjlb/two.jpg"></a>	
					</div>
					<div class=content_r>
						<div class=title><a href="">创造与毁灭的力量（安东尼罗宾）教学参考</a></div>
						<div class=context><a href="">有两位年届七十岁的老太太，对于未来也因不同的信念而有了不同的人生。一位认为到了这个年纪可算是人生的尽头，于是便开始料理后事；然而另一位却认为一个人能做什么事不在于年龄的大小，而在于是怎么个想法......</a></div>
						<div class=dc><a href="">开始调查>></a></div>
					</div>
				</div>
				<div class=content>
					<div class=content_l>
						<a href=""><img border=0 src="/images/hyjlb/two.jpg"></a>	
					</div>
					<div class=content_r>
						<div class=title><a href="">创造与毁灭的力量（安东尼罗宾）教学参考</a></div>
						<div class=context><a href="">有两位年届七十岁的老太太，对于未来也因不同的信念而有了不同的人生。一位认为到了这个年纪可算是人生的尽头，于是便开始料理后事；然而另一位却认为一个人能做什么事不在于年龄的大小，而在于是怎么个想法......</a></div>
						<div class=dc><a href="">开始调查>></a></div>
					</div>
				</div>
			</div>
			<div id="hy_l_content1_right"></div>
			<div class=hy_l_title_left></div>
			<div class=hy_l_title_center>
				<div class=wz>礼品兑换</div>
				<div class=more><a href="">more>></a></div>
			</div>
			<div class=hy_l_title_right></div>
			<div id="hy_l_content2_left"></div>
			<div id="hy_l_content2_center">
				<?php for($i=0;$i<8;$i++){ ?>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="/images/hyjlb/three.jpg"></a></div>
					<div class=pictitle><a href="">积分兑换</a></div>	
				</div>
				<?php } ?>
			</div>
			<div id="hy_l_content2_right"></div>
			<div id="hy_l_b"><a href=""><img border=0 src="/images/hyjlb/four.jpg"></a></div>
		</div>
		<div id=hy_right>
			<div class=hy_right_title_top></div>
			<div id=hy_r_t>
				<div class=hy_r_t_t>
					<div class=wz>会员公告</div>
				</div>
				<div id=hy_r_t_c>
					<div id=pic><a href=""><img border=0 src="/images/index/one.jpg"></a></div>
					<div id=pictitle><a href="">中国最富有的女富豪</a></div>
					<div id=piccontent><a href="">其加薪理由是在危机期间未接作家沃尔夫各央行应将通胀目标从2%提高至4%...</a></div>
				</div>
				<div class="hy_dash"></div>
				<div id=hy_r_t_b>
					<div class=cl>
						<div class=cl_l></div>
						<div class=cl_r>
							<a href="">中国的出口优势不在汇势不在汇不在汇不在率中</a>	
						</div>	
					</div>
					<div class=cl>
						<div class=cl_l></div>
						<div class=cl_r>
							<a href="">中国的出口优势不在汇势不在汇不在汇不在率中</a>	
						</div>	
					</div>
					<div class=cl>
						<div class=cl_l></div>
						<div class=cl_r>
							<a href="">中国的出口优势不在汇势不在汇不在汇不在率中</a>	
						</div>	
					</div>
				</div>
			</div>
			<div class=hy_right_content_bottom></div>
			<div id=zy>
				<div id=btn><button></button></div>	
			</div>
			<div class=hy_right_title_top></div>
			<div id="hy_r_c">
				<div class=hy_r_t_t>
					<div class=wz>获奖名单</div>
				</div>
				<div id="hy_r_c_t">
					<?php for($i=0;$i<3;$i++){ ?>
					<div class=content>
						<div class=pic>
							<a href=""><img border=0 src="/images/hyjlb/five.jpg"></a>	
						</div>
						<div class=pictitle>
							<a href="">后机时代更</a>	
						</div>
						<div class=piccontent>
							<a href="">其加薪理由是在危机期间未...</a>	
						</div>
					</div>
					<?php } ?>
				</div>
				<div class=hy_right_title_top2></div>
				<div class=hy_r_t_t>
					<div class=wz>读者高见</div>
				</div>
				<div class=hy_r_t_c>
					<div class=hy_r_c_c>
						<div class=hy_r_c_c_t><a href="">中信保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>
						<div class=hy_r_c_c_b><a href="">--XXXDDD</a></div>
					</div>
					<div class="hy_r_c_dash"></div>
					<div class=hy_r_c_c>
						<div class=hy_r_c_c_t><a href="">中信保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>
						<div class=hy_r_c_c_b><a href="">--XXXDDD</a></div>
					</div>
					<div class="hy_r_c_dash"></div>
					<div class=hy_r_c_c>
						<div class=hy_r_c_c_t><a href="">中信保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>
						<div class=hy_r_c_c_b><a href="">--XXXDDD</a></div>
					</div>
					<div class="hy_r_c_dash"></div>
					<div class=hy_r_c_c>
						<div class=hy_r_c_c_t><a href="">中信保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>
						<div class=hy_r_c_c_b><a href="">--XXXDDD</a></div>
					</div>
				</div>
			</div>
			<div class=hy_right_content_bottom></div>
			<div id=hy_r_b_title>
				<div id=wz>评论定制</div>
				<div id=more><a href=""><img border=0 src="/images/index/c_r_t_more.gif"></a></div>	
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