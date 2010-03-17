<?php 
	require_once('../frame.php');
	$cid = intval($_REQUEST['cid']);
	if(empty($cid)){
		redirect('error.html');
		die();
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-新闻列表</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('html/culture/culture','top','bottom','select2css','paginate');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>文章列表</div>
			<?php
				$category = new category_class('news');
				$parent_ids = $category->tree_map($cid);
			?>
			<div id=title1>
				<a href="/">福布斯中文网</a>
				<?php
					$len = count($parent_ids);
					for($i=$len-1;$i>0;$i--){
						$item = $category->find($parent_ids[$i]);
				?>>
				<a href="news_list.php?cid=<?php echo $parent_ids[$i];?>"><?php echo $item->name;?></a>
				<?php
					}
					$item = $category->find($parent_ids[0]);
				?>
				><span style="color:#246BB0; margin-left:8px;"><?php echo $item->name;?></span>
			</div>
			<div id=line></div>
		</div>
		<div id=l>
			<div id=l_t>
				<div id=l_t_t>
					<div id=l_t_t1>
						文化娱乐
					</div>
				</div>
				<div id=l_t_m>
					<div id=picture>
					</div>
					<div id=l_t_m_r>
						<div id=l_t_m_r_t1>
							<a href="">李宁公司网络营销渠道建设案例分析</a>
						</div>
						<div id=l_t_m_r_t2>
							1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
						</div>
						<div id=l_t_m_r_t3>
							<a href="">详细>></a>
						</div>
					</div>
					<div id=l_t_b>
						《福布斯》  记者：小妹   发布与：2010-1-25
					</div>
				</div>
				<div id=l_m>
					<div id=l_m_t>
						<div id=l_m_t1>
							<div id=l_m_t2>
								李宁公司网络营销渠道建设案例分析
							</div>
							<div id=l_m_t3>
								《福布斯》  记者：小妹   发布与：2010-1-25
							</div>
							<div id=l_m_t4>
								导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
							</div>
						</div>
					</div>
					<div id=l_m_t>
						<div id=l_m_t1>
							<div id=l_m_t2>
								李宁公司网络营销渠道建设案例分析
							</div>
							<div id=l_m_t3>
								《福布斯》  记者：小妹   发布与：2010-1-25
							</div>
							<div id=l_m_t4>
								导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
							</div>
						</div>
					</div><div id=l_m_t>
						<div id=l_m_t1>
							<div id=l_m_t2>
								李宁公司网络营销渠道建设案例分析
							</div>
							<div id=l_m_t3>
								《福布斯》  记者：小妹   发布与：2010-1-25
							</div>
							<div id=l_m_t4>
								导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
							</div>
						</div>
					</div><div id=l_m_t>
						<div id=l_m_t1>
							<div id=l_m_t2>
								李宁公司网络营销渠道建设案例分析
							</div>
							<div id=l_m_t3>
								《福布斯》  记者：小妹   发布与：2010-1-25
							</div>
							<div id=l_m_t4>
								导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
							</div>
						</div>
					</div><div id=l_m_t>
						<div id=l_m_t1>
							<div id=l_m_t2>
								李宁公司网络营销渠道建设案例分析
							</div>
							<div id=l_m_t3>
								《福布斯》  记者：小妹   发布与：2010-1-25
							</div>
							<div id=l_m_t4>
								导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
							</div>
						</div>
					</div><div id=l_m_t>
						<div id=l_m_t1>
							<div id=l_m_t2>
								李宁公司网络营销渠道建设案例分析
							</div>
							<div id=l_m_t3>
								《福布斯》  记者：小妹   发布与：2010-1-25
							</div>
							<div id=l_m_t4>
								导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
							</div>
						</div>
					</div><div id=l_m_t>
						<div id=l_m_t1>
							<div id=l_m_t2>
								李宁公司网络营销渠道建设案例分析
							</div>
							<div id=l_m_t3>
								《福布斯》  记者：小妹   发布与：2010-1-25
							</div>
							<div id=l_m_t4>
								导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
							</div>
						</div>
					</div><div id=l_m_t>
						<div id=l_m_t1>
							<div id=l_m_t2>
								李宁公司网络营销渠道建设案例分析
							</div>
							<div id=l_m_t3>
								《福布斯》  记者：小妹   发布与：2010-1-25
							</div>
							<div id=l_m_t4>
								导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。
							</div>
						</div>
					</div>
					<div id=page>
						<div id=prev>
						</div>
						<div id=num>
							123456789
						</div>
						<div id=num1>
							10
						</div>
					</div>
					<div id=next>
					</div>			
				</div>		
			</div>
		</div>
		<div id=r>
			<div id=ad>
			</div>
			<div id=r_m_d1>
				<div id=r_m_d1_t>
					<div id=r_m_d1_t1>
						最受欢迎
					</div>
					<div id=r_m_d1_t2>
						编辑推荐
					</div>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3 style="border-style:none;">
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
			</div>
			<div id=r_m_d2>
				<div id=r_m_d2_t1>
					创业
				</div>
				<div id=r_m_d2_t2>
					科技
				</div>
				<div id=r_m_d2_t2 style="margin-left:0px;">
					商业
				</div>
				<div id=r_m_d2_t4>
					投资
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3 style="border-style:none;">
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
			</div>
			<div id=r_m_d3>
				<div id=r_m_d3_t>
					<a href="">更多>></a>
				</div>
				<div id=picture1>
				</div>
				<div id=r_m_d3_t1>
					后危机时代更需要包机时代更需要包容与方巾
				</div>
				<div id=r_m_d3_t2>
					<a href="">最佳投资人榜单资人榜单资人榜单资人榜单资人榜单</a>
				</div>
				<div id=r_m_d3_t2 style="margin-top:4px;">
					<a href="">最佳投资人榜单资人榜单资人榜单资人榜单资人榜单</a>
				</div>
			</div>
			<div id=r_m_d4>
				<div id=r_m_d4_t>
					福布斯杂志
				</div>
				<div id=r_m_d4_t1>
					<div id=picture2>
					</div>
					<div id=r_m_d4_t2>
						<div id=r_m_d4_t3>
							福布斯2010年1月刊
						</div>
						<div id=r_m_d4_t4>
							宇星科技、搜房网、聚光科技夺得新能源等行业表现抢眼
						</div>
						<div id=r_m_d4_t4>
							宇星科技、搜房网、聚光科技夺得新能源等行业表现抢眼
						</div>
						<input type="button" id=button2><input type="button" id=button3>
					</div>
					<div id=r_m_d4_t5>
						<div id=r_m_d4_t6>
							往期杂志查阅
						</div>
						<div id=d_s1>
							<select style="width:113px; height:19px; "></select>
						</div>
						<div id=r_m_d4_t7>
							<a href="">杂志列表</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>
<html>