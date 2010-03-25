		<div id=ibottom>
			<div id=b_top >
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="榜单" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[榜单]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="富豪" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[富豪]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="投资" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[投资]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="创业" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[创业]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="商业" and parent_id=0) and (type="both" or type="bottom") order by priority asc');	?>
				<div class=td1><a style="font-weight:bold;" href="">[商业]</a><br><?php for($i=0;$i<6;$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<div class=td1><br><?php for($i=6;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="科技" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[科技]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="奢华" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[奢华]</a><br><?php for($i=0;$i<6;$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<div class=td1><br><?php for($i=6;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="专栏" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[专栏]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="会员专区" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td2><a style="font-weight:bold;" href="">[会员专区]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
			</div>
			<div id=td5><a href="">关于福布斯中文网</a> - <a href="">新闻动态</a> - <a href="">广告服务</a> - <a href="">诚聘英才</a> - <a href="">友情连接</a> - <a href="">会员活动</a> - <a href="">隐私声明</a> - <a href="">网站声明</a> - <a href="">联系我们</a> - <a href="">网站地图</a></div>
		</div>
		<div class=ibabout>Copyright @ 2010 Forbes.com Inc. 福布斯公司 版权所有<br><br>备案号：沪ICP备000000号</div>
		