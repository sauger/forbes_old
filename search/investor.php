<?php 
	require_once( '../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-投资人检索</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('html/investor/investor','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>投资人检索</div>
			<div id=title1><a href="/">福布斯中文网</a> > <a style="color:#246BB0;">投资人检索结果</a></div>
			<div id=line></div>
		</div>
		<div id="left">
			<div id=l_t>
				<div class=l_t_t>
					<div id=l_t_t1>
						点击按字母排序：
					</div>
					<div id=l_t_t2>
						<a href="">A</a><a href="">B</a><a href="">C</a><a href="">D</a><a href="">E</a><a href="">F</a><a href="">G</a><a href="">H</a><a href="">I</a><a href="">J</a><a href="">K</a><a href="">L</a><a href="">M</a><a href="">N</a><a href="">O</a><a href="">P</a><a href="">Q</a><a href="">R</a><a href="">S</a><a href="">T</a><a href="">U</a><a href="">V</a><a href="">W</a><a href="">X</a><a href="">Y</a><a href="">Z</a>
					</div>
				</div>
				<div class=l_t_t>
					<div id=l_t_t3>
						按照投资行业索引：
					</div>
					<div id=d_s>
						<select style="width:293px; height:21px;"></select>
					</div>
					<div id=d_b1>
						<input type="button" id="button1">
					</div>
				</div>
			</div>
			<div id=l_m>
				<div id=l_m_t>
					以“<font color="#246bb0">Z</font>”位字母排序的投资人共有<font color="#246bb0">25</font>位
				</div>
				<div id=l_m_t1>
					<div class=picture>
					</div>
					<div id=l_m_r>
						<div id=l_m_t2 style="font-size:14px; font-weight:bold; color:#246BB0;">
							张默默
						</div>
						<div id=l_m_t2>
							北极光风险投资       合伙人
						</div>
						<div id=l_m_t2>
							投资方向：生物医药    电子商务    制造
						</div>
						<div id=l_m_t2>
							投资动态：
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
					</div>
				</div>
				<div id=l_m_t1>
					<div class=picture>
					</div>
					<div id=l_m_r>
						<div id=l_m_t2 style="font-size:14px; font-weight:bold; color:#246BB0;">
							张默默
						</div>
						<div id=l_m_t2>
							北极光风险投资       合伙人
						</div>
						<div id=l_m_t2>
							投资方向：生物医药    电子商务    制造
						</div>
						<div id=l_m_t2>
							投资动态：
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
					</div>
				</div>
				<div id=l_m_t1>
					<div class=picture>
					</div>
					<div id=l_m_r>
						<div id=l_m_t2 style="font-size:14px; font-weight:bold; color:#246BB0;">
							张默默
						</div>
						<div id=l_m_t2>
							北极光风险投资       合伙人
						</div>
						<div id=l_m_t2>
							投资方向：生物医药    电子商务    制造
						</div>
						<div id=l_m_t2>
							投资动态：
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
					</div>
				</div>
				<div id=l_m_t1>
					<div class=picture>
					</div>
					<div id=l_m_r>
						<div id=l_m_t2 style="font-size:14px; font-weight:bold; color:#246BB0;">
							张默默
						</div>
						<div id=l_m_t2>
							北极光风险投资       合伙人
						</div>
						<div id=l_m_t2>
							投资方向：生物医药    电子商务    制造
						</div>
						<div id=l_m_t2>
							投资动态：
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
					</div>
				</div>
				<div id=l_m_t1>
					<div class=picture>
					</div>
					<div id=l_m_r>
						<div id=l_m_t2 style="font-size:14px; font-weight:bold; color:#246BB0;">
							张默默
						</div>
						<div id=l_m_t2>
							北极光风险投资       合伙人
						</div>
						<div id=l_m_t2>
							投资方向：生物医药    电子商务    制造
						</div>
						<div id=l_m_t2>
							投资动态：
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
					</div>
				</div>
				<div id=l_m_t1 style="border-style:none;">
					<div class=picture>
					</div>
					<div id=l_m_r>
						<div id=l_m_t2 style="font-size:14px; font-weight:bold; color:#246BB0;">
							张默默
						</div>
						<div id=l_m_t2>
							北极光风险投资       合伙人
						</div>
						<div id=l_m_t2>
							投资方向：生物医药    电子商务    制造
						</div>
						<div id=l_m_t2>
							投资动态：
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
						</div>
						<div id=l_m_t2>
							曹国伟酸雨不算精准把握；曹国伟酸雨不算精准把握
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