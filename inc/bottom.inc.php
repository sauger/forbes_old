		<?php 
			$path = dirname(__FILE__) .'/';
	    	include_once($path ."../frame.php");
	    	css_include_tag('bottom');
	    	js_include_tag('bottom');
		?>
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
				<?php 
				$bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="商业" and parent_id=0) and (type="both" or type="bottom") order by priority asc');
				$count=count($bd);
				for($i=0;$i<ceil($count/5); $i++){ ?>
				<div class=td1 id="<?php echo 'sy'.$i;?>" <?php if($i>0){ ?>style="display:none;"<?php } ?>><a style="font-weight:bold;" href="">[商业]</a><br><?php for($j=($i*5);$j<($i*5+5);$j++){ ?><a target="<?php echo $bd[$j]->target; ?>" href="<?php echo $bd[$j]->href; ?>"><?php echo $bd[$j]->name; ?></a><br><?php } ?><?php if($i==0){ ?><span style="color:#ffffff; cursor:pointer;" class="next" param="<?php echo $i;?>">下一页>></span><?php }else if($i==(ceil($count/5)-1)){ ?><span style="color:#ffffff; cursor:pointer;" class="prev" param="<?php echo $i;?>"><<上一页</span><?php } else{ ?><span class="prev" param="<?php echo $i;?>" style="color:#ffffff; cursor:pointer;"><<</span>　　<span class="next" style="color:#ffffff; cursor:pointer;" param="<?php echo $i;?>">>></span><?php } ?></div>
				<?php } ?>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="科技" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[科技]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="城市" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[城市]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="奢华" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[奢华]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="增长俱乐部" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td2><a style="font-weight:bold;" href="">[增长俱乐部]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="专栏" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td1><a style="font-weight:bold;" href="">[专栏]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
				<div class=b_v></div>
				<?php $bd=$db->query('select name,href,target from fb_navigation where parent_id in (select id from fb_navigation where name="会员俱乐部" and parent_id=0) and (type="both" or type="bottom") order by priority asc'); ?>
				<div class=td2><a style="font-weight:bold;" href="">[会员俱乐部]</a><br><?php for($i=0;$i<count($bd);$i++){ ?><a target="<?php echo $bd[$i]->target; ?>" href="<?php echo $bd[$i]->href; ?>"><?php echo $bd[$i]->name; ?></a><?php if($i<(count($bd)-1)){ ?><br><?php }} ?></div>
			</div>
			<div id=td5><a href="">关于福布斯中文网</a> - <a href="">新闻动态</a> - <a href="">广告服务</a> - <a href="">诚聘英才</a> - <a href="">友情连接</a> - <a href="">会员活动</a> - <a href="">隐私声明</a> - <a href="">网站声明</a> - <a href="">联系我们</a> - <a href="">网站地图</a></div>
		</div>
		<div class=ibabout>Copyright @ 2010 Forbes.com Inc. 福布斯公司 版权所有<br><br>备案号：沪ICP备000000号</div>