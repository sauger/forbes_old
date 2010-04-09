<?php 
	require_once('../frame.php');
	require_login();
	$db = get_db();
	$uid = $_SESSION['user_id'];
	$yh_xx = $db->query("select id from fb_yh_xx where yh_id=$uid");
	$user = new table_class('fb_yh_xx');
	$user->find($yh_xx[0]->id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-用户</title>
	<?php
		use_jquery();
		js_include_tag('public','user/user','jquery.colorbox-min');
		css_include_tag('html/user/user','public','html/user/register_user','colorbox');
	?>
</head>
<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>用户中心</div>
			<div id=title1><a style="color:#626262;" href="">个人中心</a> > <a href="" style="color:#246BB0;">个人基本信息</a> </div>
			<div id=line></div>
		</div>
		<div id=left>
			<div id=left_top>
				用户中心导航
			</div>
			<div class="left_list2">
				<div class="iconb">
					<img style="display:none" src="/images/html/user/c1a.gif">
					<img style="display:inline" src="/images/html/user/c1b.gif">
				</div>
				<div class="left_text"><a href="user_info.php">个人基本信息</div></a>
				<div class="icon2" style="display:inline"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c2a.gif">
					<img style="display:none" src="/images/html/user/c2b.gif">
				</div>
				<div class="left_text"><a href="user_order.php">订阅信息</a></div>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c3a.gif">
					<img style="display:none" src="/images/html/user/c3b.gif">
				</div>
				<div class="left_text"><a href="user_favorites.php">我的收藏</a></div>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c4a.gif">
					<img style="display:none" src="/images/html/user/c4b.gif">
				</div>
				<div class="left_text"><a href="user_password.php">修改登录密码</a></div>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
		</div>
		<div class=right>
			<div class=right_title>
				<span style="float:left;display:inline">个人基本信息</span>
				<?php $log = $db->query("select * from fb_yh_log where yh_id=$uid order by id desc limit 2");?>
				<span class="r_t_right">亲爱的<?php echo $_SESSION['name'];?>：您上次登录的时间是 <?php if($db->record_count==2) echo $log[1]->time;else echo $log[0]->time;?></span>
			</div>
			<div class="right_text">
				<div id=register>
					<div id=person>
						完善您的个人信息，就有机会获得《福布斯》中文版杂志赠阅机会！<br/>
						个人资料　（请全部用中文填写完整，所填事项不完整及填写家庭地址恕不受理）<br>
					</div>
					<form action="user_info.post.php" method="post" enctype="multipart/form-data">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td class=td1>姓　　名：</td>
							<td class=td3><input class="txt" value="<?php echo htmlspecialchars($user->xm);?>" name="post[xm]" type="text"></td>
							<td colspan=2></td>
						</tr>
						<tr>
							<td class=td1>性　　别：</td>
							<td class=td3>
								<div class=td4><input type="radio" <?php if($user->xb=='男')echo 'checked="checked"'?> value="男" name="post[xb]">男</div>
								<div class=td4><input type="radio" <?php if($user->xb=='女')echo 'checked="checked"'?> value="女" name="post[xb]">女</div>
							</td>
							<td class=td11>学　　历：</td>
							<td class=td3>
								<SELECT  class=sel1 name="post[xl]">
									<option value=""></option>
									<OPTION <?php if($user->xl=="1.博士"){?>selected="selected"<?php }?> value=1.博士>1.博士</OPTION> 
									<OPTION <?php if($user->xl=="2.硕士"){?>selected="selected"<?php }?> value=2.硕士>2.硕士</OPTION> 
									<OPTION <?php if($user->xl=="3.大学本科 大学专科"){?>selected="selected"<?php }?> value="3.大学本科 大学专科">3.大学本科/大学专科</OPTION> 
									<OPTION <?php if($user->xl=="4.高中 中专"){?>selected="selected"<?php }?> value="4.高中 中专">4.高中/中专</OPTION> 
									<OPTION <?php if($user->xl=="5.其他"){?>selected="selected"<?php }?> value=5.其他>5.其他</OPTION>
								</SELECT>
							</td>
						</tr>
						<tr>
							<td class=td1>行　　业：</td>
							<td class=td3>
								<select name="post[hy]" class=sel1>
									<option value=""></option>
									<OPTION <?php if($user->hy=="1.制造业"){?>selected="selected"<?php }?> value=1.制造业>1.制造业</OPTION> 
									<OPTION <?php if($user->hy=="2.进出口贸易"){?>selected="selected"<?php }?> value=2.进出口贸易>2.进出口贸易</OPTION> 
									<OPTION <?php if($user->hy=="3.批发 零售分销"){?>selected="selected"<?php }?> value="3.批发 零售分销">3.批发/零售/分销</OPTION> 
									<OPTION <?php if($user->hy=="4.产品代理"){?>selected="selected"<?php }?> value=4.产品代理>4.产品代理</OPTION> 
									<OPTION <?php if($user->hy=="5.银行 金融"){?>selected="selected"<?php }?> value="5.银行 金融">5.银行/金融</OPTION> 
							        <OPTION <?php if($user->hy=="6.保险业"){?>selected="selected"<?php }?> value=6.保险业>6.保险业</OPTION>
									<OPTION <?php if($user->hy=="7.电信服务业"){?>selected="selected"<?php }?> value=7.电信服务业>7.电信服务业</OPTION> 
									<OPTION <?php if($user->hy=="8.邮政服务"){?>selected="selected"<?php }?> value=8.邮政服务>8.邮政服务</OPTION> 
							        <OPTION <?php if($user->hy=="9.网络 信息服务 电子商务"){?>selected="selected"<?php }?> value="9.网络 信息服务 电子商务">9.网络/信息服务/电子商务</OPTION> 
									<OPTION <?php if($user->hy=="10.公用事业"){?>selected="selected"<?php }?> value=10.公用事业>10.公用事业</OPTION> 
									<OPTION <?php if($user->hy=="11.酒店 旅游"){?>selected="selected"<?php }?> value="11.酒店 旅游">11.酒店/旅游</OPTION> 
									<OPTION <?php if($user->hy=="12.房地产"){?>selected="selected"<?php }?> value=12.房地产>12.房地产</OPTION> 
							        <OPTION <?php if($user->hy=="13.建筑"){?>selected="selected"<?php }?> value=13.建筑>13.建筑</OPTION> 
									<OPTION <?php if($user->hy=="14.政府机构"){?>selected="selected"<?php }?> value=14.政府机构>14.政府机构</OPTION> 
									<OPTION <?php if($user->hy=="15.文化 教育 培训"){?>selected="selected"<?php }?> value="15.文化 教育 培训">15.文化/教育/培训</OPTION> 
									<OPTION <?php if($user->hy=="16.交通运输 航空 船务 铁路 货运等 "){?>selected="selected"<?php }?> value="16.交通运输 航空 船务 铁路 货运等 ">16.交通运输(航空，船务，铁路，货运等)</OPTION> 
									<OPTION <?php if($user->hy=="17.法律 会计"){?>selected="selected"<?php }?> value="17.法律 会计">17.法律/会计</OPTION> 
									<OPTION <?php if($user->hy=="18.商业咨询 顾问服务"){?>selected="selected"<?php }?> value="18.商业咨询 顾问服务">18.商业咨询/顾问服务</OPTION> 
									<OPTION <?php if($user->hy=="19.媒体 公关 出版 广播 广告等 "){?>selected="selected"<?php }?> value="19.媒体 公关 出版 广播 广告等 ">19.媒体/公关（出版，广播，广告等）</OPTION> 
									<OPTION <?php if($user->hy=="20.其他"){?>selected="selected"<?php }?> value=20.其他>20.其他</OPTION>
								</select>
							</td>
							<td class=td11>职　　位：</td>
							<td class=td3>
								<select name="post[zw]" class=sel1>
									<option value=""></option>
									<OPTION <?php if($user->zw=="1.董事长 总裁 行政总裁 首席执行官 董事"){?>selected="selected"<?php }?> value="1.董事长 总裁 行政总裁 首席执行官 董事">1.董事长/总裁/行政总裁/首席执行官/董事</OPTION> 
									<OPTION <?php if($user->zw=="2.副总裁 执行董事"){?>selected="selected"<?php }?> value="2.副总裁 执行董事">2.副总裁/执行董事</OPTION> 
									<OPTION <?php if($user->zw=="3.总经理 副总经理 厂长 副厂长"){?>selected="selected"<?php }?> value="3.总经理 副总经理 厂长 副厂长">3.总经理/副总经理/厂长/副厂长</OPTION> 
									<OPTION <?php if($user->zw=="4.企业所有人 企业合伙人"){?>selected="selected"<?php }?> value="4.企业所有人 企业合伙人">4.企业所有人/企业合伙人</OPTION> 
									<OPTION <?php if($user->zw=="5.财务总监 总会计师"){?>selected="selected"<?php }?> value="5.财务总监 总会计师">5.财务总监/总会计师</OPTION> 
									<OPTION <?php if($user->zw=="6.信息系统总监 首席信息官"){?>selected="selected"<?php }?> value="6.信息系统总监 首席信息官">6.信息系统总监/首席信息官</OPTION> 
									<OPTION <?php if($user->zw=="7.人事经理 行政经理"){?>selected="selected"<?php }?> value="7.人事经理 行政经理">7.人事经理/行政经理</OPTION> 
									<OPTION <?php if($user->zw=="8.总工程师 高级工程师"){?>selected="selected"<?php }?> value="8.总工程师 高级工程师">8.总工程师/高级工程师</OPTION> 
									<OPTION <?php if($user->zw=="9.市场营销 销售总监"){?>selected="selected"<?php }?> value="9.市场营销 销售总监">9.市场营销/销售总监</OPTION> 
									<OPTION <?php if($user->zw=="10.部门经理"){?>selected="selected"<?php }?> value=10.部门经理>10.部门经理</OPTION> 
									<OPTION <?php if($user->zw=="11.专业人士 会计师 律师 经济师 教授等"){?>selected="selected"<?php }?> value="11.专业人士 会计师 律师 经济师 教授等">11.专业人士（会计师，律师，经济师，教授等）</OPTION> 
									<OPTION <?php if($user->zw=="12.政府机构官员"){?>selected="selected"<?php }?> value=12.政府机构官员>12.政府机构官员</OPTION> 
									<OPTION <?php if($user->zw=="13.其他"){?>selected="selected"<?php }?> value=13.其他>13.其他</OPTION>
								</select>
							</td>
						</tr>
						<tr>
							<td class=td1>工作单位：</td>
							<td colspan=3 class=td2><input class="txt1" value="<?php echo htmlspecialchars($user->gzdw);?>" name="post[gzdw]" type="text"></td>
						</tr>
						<tr>
							<td class=td1>所在部门：</td>
							<td colspan=3 class=td2><input class="txt1" value="<?php echo htmlspecialchars($user->szbm);?>" name="post[szbm]" type="text"></td>
						</tr>
						<tr>
							<td class=td1>公司性质：</td>
							<td class=td3>
								<select name="post[gsxz]" class=sel1>
									<option value=""></option>
									<option <?php if($user->gsxz=="1.国有/国有控股企业"){?>selected="selected"<?php }?> value="1.国有/国有控股企业">1.国有/国有控股企业</option>
									<option <?php if($user->gsxz=="2.事业单位"){?>selected="selected"<?php }?> value="2.事业单位">2.事业单位</option>
									<option <?php if($user->gsxz=="3.民营企业"){?>selected="selected"<?php }?> value="3.民营企业">3.民营企业</option>
									<option <?php if($user->gsxz=="4.外商独资企业"){?>selected="selected"<?php }?> value="4.外商独资企业">4.外商独资企业</option>
									<option <?php if($user->gsxz=="5.中外合资/合作企业"){?>selected="selected"<?php }?> value="5.中外合资/合作企业">5.中外合资/合作企业</option>
									<option <?php if($user->gsxz=="6.其他（请说明）"){?>selected="selected"<?php }?> value="6.其他（请说明）">6.其他（请说明）</option>
								</select>
							</td>
							<td class=td1>公司员工规模：</td>
							<td class=td3>
								<select name="post[gsgm]" class=sel1>
									<option value=""></option>
									<OPTION <?php if($user->gsgm=="1.100人以下"){?>selected="selected"<?php }?> value=1.100人以下>1.100人以下</OPTION> 
									<OPTION <?php if($user->gsgm=="2.101 - 250"){?>selected="selected"<?php }?> value="2.101 - 250">2.101 - 250</OPTION> 
							    	<OPTION <?php if($user->gsgm=="251 - 500"){?>selected="selected"<?php }?> value="3.251 - 500">3.251 - 500</OPTION> 
									<OPTION <?php if($user->gsgm=="501 - 1000"){?>selected="selected"<?php }?> value="4.501 - 1000">4.501 - 1,000</OPTION> 
									<OPTION <?php if($user->gsgm=="1001 - 5000"){?>selected="selected"<?php }?> value="5.1001 - 5000">5.1001 - 5,000</OPTION> 
									<OPTION <?php if($user->gsgm=="5001 - 10000"){?>selected="selected"<?php }?> value="6.5001 - 10000">6.5,001 - 10,000</OPTION> 
									<OPTION <?php if($user->gsgm=="10000以上"){?>selected="selected"<?php }?> value=7.10000以上>7.10,000以上</OPTION>
								</select>
							</td>
						</tr>
						<tr>
							<td class=td1>公司是否上市公司：</td>
							<td class=td3>
								<select name="post[sfss]" class=sel1>
									<option value=""></option>
									<OPTION <?php if($user->sfss=="1"){?>selected="selected"<?php }?> value=1>1.是</OPTION>
									<OPTION <?php if($user->sfss=="0"){?>selected="selected"<?php }?> value=0>2.否</OPTIN>
								</select>
							</td>
							<td class=td1>公司制造的产品：</td>
							<td class=td3>
								<select name="post[gscp]" class=sel1>
									<option value=""></option>
									<OPTION <?php if($user->gscp=="1.电脑 电脑配件及外设"){?>selected="selected"<?php }?> value="1.电脑 电脑配件及外设">1.电脑、电脑配件及外设</OPTION> 
							        <OPTION <?php if($user->gscp=="2.电子元器件 电阻 电容 半导体等零部件 "){?>selected="selected"<?php }?> value="2.电子元器件 电阻 电容 半导体等零部件 ">2.电子元器件（电阻、电容、半导体等零部件）</OPTION> 
							        <OPTION <?php if($user->gscp=="3.电子消费类产品"){?>selected="selected"<?php }?> value=3.电子消费类产品>3.电子消费类产品</OPTION> 
									<OPTION <?php if($user->gscp=="4.通讯 电力 网络等硬件设备"){?>selected="selected"<?php }?> value="4.通讯 电力 网络等硬件设备">4.通讯、电力、网络等硬件设备</OPTION> 
									<OPTION <?php if($user->gscp=="5.汽车及汽车用品"){?>selected="selected"<?php }?> value=5.汽车及汽车用品>5.汽车及汽车用品</OPTION> 
									<OPTION <?php if($user->gscp=="6.工业机械设备"){?>selected="selected"<?php }?> value=6.工业机械设备>6.工业机械设备</OPTION> 
									<OPTION <?php if($user->gscp=="7.建筑及家居装饰材料"){?>selected="selected"<?php }?> value=7.建筑及家居装饰材料>7.建筑及家居装饰材料</OPTION> 
									<OPTION <?php if($user->gscp=="8.纸业 包装印刷及包装印刷器材"){?>selected="selected"<?php }?> value="8.纸业 包装印刷及包装印刷器材">8.纸业、包装印刷及包装印刷器材</OPTION> 
									<OPTION <?php if($user->gscp=="9.五金制品"){?>selected="selected"<?php }?> value=9.五金制品>9.五金制品</OPTION> 
									<OPTION <?php if($user->gscp=="10.食品 食品加工及饲料"){?>selected="selected"<?php }?> value="10.食品 食品加工及饲料">10.食品、食品加工及饲料</OPTION> 
									<OPTION <?php if($user->gscp=="11.化工产品"){?>selected="selected"<?php }?> value=11.化工产品>11.化工产品</OPTION> 
									<OPTION <?php if($user->gscp=="12.日用化工 化妆品 香料 肥皂类及其它)"){?>selected="selected"<?php }?> value="12.日用化工 化妆品 香料 肥皂类及其它)">12.日用化工(化妆品、香料、肥皂类及其它)</OPTION> 
									<OPTION <?php if($user->gscp=="13.生物工程 药品及医疗器械"){?>selected="selected"<?php }?> value="13.生物工程 药品及医疗器械">13.生物工程、药品及医疗器械</OPTION> 
									<OPTION <?php if($user->gscp=="14.服装及饰品 纺织 皮革"){?>selected="selected"<?php }?> value="14.服装及饰品 纺织 皮革">14.服装及饰品、纺织、皮革</OPTION> 
									<OPTION <?php if($user->gscp=="15.钟表 相机及精密仪表"){?>selected="selected"<?php }?> value="15.钟表 相机及精密仪表">15.钟表、相机及精密仪表</OPTION> 
									<OPTION <?php if($user->gscp=="16.礼品 玩具 珠宝及文教体育用品"){?>selected="selected"<?php }?> value="16.礼品 玩具 珠宝及文教体育用品">16.礼品、玩具、珠宝及文教体育用品</OPTION> 
									<OPTION <?php if($user->gscp=="17.其他"){?>selected="selected"<?php }?> value=17.其他>17.其他</OPTION>
								</select>
							</td>
						</tr>
						<tr>
							<td class=td1>公司年营业额：</td>
							<td class=td3>
								<select name="post[gsyye]" class=sel1>
									<option value=""></option>
									<OPTION <?php if($user->gsyye=="1.500万以下"){?>selected="selected"<?php }?> value=1.500万以下>1.500万以下</OPTION> 
									<OPTION <?php if($user->gsyye=="2.501万--1000万"){?>selected="selected"<?php }?> value=2.501万--1000万>2.501万--1,000万</OPTION> 
									<OPTION <?php if($user->gsyye=="3.1001万--5000万"){?>selected="selected"<?php }?> value=3.1001万--5000万>3.1,001万--5,000万</OPTION> 
									<OPTION <?php if($user->gsyye=="4.5001万--1亿"){?>selected="selected"<?php }?> value=4.5001万--1亿>4.5,001万--1亿</OPTION> 
									<OPTION <?php if($user->gsyye=="5.1亿零1万--50亿"){?>selected="selected"<?php }?> value=5.1亿零1万--50亿>5.1亿零1万--50亿</OPTION> 
									<OPTION <?php if($user->gsyye=="6.50亿零1万--100亿"){?>selected="selected"<?php }?> value=6.50亿零1万--100亿>6.50亿零1万--100亿</OPTION> 
									<OPTION <?php if($user->gsyye=="7.100亿以上"){?>selected="selected"<?php }?> value=7.100亿以上>7.100亿以上</OPTION>
								</select>
							</td>
							<td class=td1>您的个人年收入：</td>
							<td class=td3>
								<select name="post[grsr]" class=sel1>
									<OPTION value=""></OPTION> 
									<OPTION <?php if($user->grsr=="1.10万元人民币以内"){?>selected="selected"<?php }?> value="1.10万元人民币以内">1. 10万元人民币以内</OPTION> 
							        <OPTION <?php if($user->grsr=="2.10万-299999元人民币"){?>selected="selected"<?php }?> value="2.10万-299999元人民币">2. 10万-299,999元人民币</OPTION> 
									<OPTION <?php if($user->grsr=="3.30万-499999元人民币"){?>selected="selected"<?php }?> value="3.30万-499999元人民币">3. 30万-499,999元人民币</OPTION> 
									<OPTION <?php if($user->grsr=="4.50万-999999元人民币"){?>selected="selected"<?php }?> value="4.50万-999999元人民币">4. 50万-999,999元人民币</OPTION> 
									<OPTION <?php if($user->grsr=="5.100万人民币及以上"){?>selected="selected"<?php }?> value="5.100万人民币及以上">5. 100万人民币及以上</OPTION>
								</select>
							</td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td class=td1><span style="color:red;">*</span>所在区域：</td>
							<td class=td3><select id="province" name="post[sf]" class=sel1>
								<option value=""></option>
								<?php
									$province = $db->query("select * from fb_chinafar where region_type=1");
									for($i=0;$i<count($province);$i++){
								?>
								<option <?php if($user->sf==$province[$i]->id)echo 'selected="selected"';?> value="<?php echo $province[$i]->id;?>"><?php echo $province[$i]->name;?></option>
								<?php 
									}
								?>
							</select></td>
							<td class=td3><select id="city" name="post[cs]" class=sel1>
								<option value=""></option>
								<?php 
									if($user->sf!=''){
										$city = $db->query("select * from fb_chinafar where parent_id={$user->sf}");
										for($i=0;$i<count($city);$i++){
								?>
								<option <?php if($user->cs==$city[$i]->id)echo 'selected="selected"';?> value="<?php echo $city[$i]->id;?>"><?php echo $city[$i]->name;?></option>
								<?php 
										}
									}
								?>
							</select></td>
						</tr>
					</table>
					<table cellpadding="0" style="margin-top:0" cellspacing="0">
						<tr>
							<td class=td1>您的通讯地址：</td>
							<td colspan=3 class=td2><input value="<?php echo htmlspecialchars($user->txdz);?>" class="txt1" name="post[txdz]" type="text"></td>
						</tr>
						<tr>
							<td class=td1>邮　　编：</td>
							<td colspan=3 class=td2><input value="<?php echo htmlspecialchars($user->yb);?>" class="txt1" name="post[yb]" type="text"></td>
						</tr>
						<tr>
							<td class=td1>您的固定电话：</td>
							<td class=td2><input class="txt2" value="<?php echo $user->gddh1?>" name="post[gddh1]" type="text"></td>
							<td class=td2><input class="txt2" value="<?php echo $user->gddh2?>" name="post[gddh2]" type="text"></td>
							<td class=td2><input class="txt2" value="<?php echo $user->gddh3?>" name="post[gddh3]" type="text"></td>
						</tr>
						<tr>
							<td class=td1>手　　机：</td>
							<td colspan=3 class=td2><input class="txt1" value="<?php echo htmlspecialchars($user->sj);?>" name="post[sj]" type="text"></td>
						</tr>
						<tr>
							<td class=td1>M　S　N：</td>
							<td colspan=3 class=td2><input class="txt1" value="<?php echo htmlspecialchars($user->msn);?>" name="post[msn]" type="text"></td>
						</tr>
						<tr>
							<td class=td1>Ｑ　　Ｑ：</td>
							<td colspan=3 class=td2><input class="txt1" value="<?php echo htmlspecialchars($user->qq);?>" name="post[qq]" type="text"></td>
						</tr>
						<tr >
							<td class=td1>您的头像：</td>
							<td colspan=3 class=td2><input class="file" name="tx" type="file"><?php if($user->tx!=''){?><a href="<?php echo $user->tx?>" title="查看头像" class="color_box">点击查看</a><?php }?></td>
						</tr>
					</table>
					<div id="submit"><button type="submit">提交并保存个人信息</button></div>
					</form>
				</div>
			</div>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>

<script>
	$(function(){
		$(".color_box").colorbox();
	})
</script>