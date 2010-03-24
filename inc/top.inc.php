<?php
		require_once(dirname(__FILE__).'/../frame.php');
		$db=get_db();
?>
<div id=top_>
	<div id=top_banner><a href="#"><img border=0 src="/images/other/top_banner.jpg"></a></div>
	<div id=top_function>
			<div class=user_btn><a href="">登陆</a>　<a href="">注册</a></div>
			<div class=user_btn><a href="">设为首页</a>　<a href="">收藏本页</a></div>
			<div id=magazine_title>本期杂志介绍</div>
			<div id=magazine_pic><a href=""><img border=0 src="/images/other/six.jpg"></a></div>
			<div id=magazine_description><span class=font1>福布斯中文版VOL.22</span><br>版杂志知案例荟萃丰富的福布斯中文版杂志知识及案例...</div>
			<div id=magazine_btn><a href=""><img src="/images/public/magazine_btn.jpg" border=0></a></div>
	</div>
  <div id=top_logo>
			<div id=border></div>
			<div id=logo></div>
			<div class=forbes_search>
					<select name="selsearch" class="iselect">
						<option>榜单</option>
						<option>富豪</option>
						<option>文章</option>
					</select>
			</div>
			<input class="input">
			<button class=search>查 询</button>			
  </div>	
	
	<?php
		if($nav==""){	$nav=3;	}
		$countnav=$db->query("select * from fb_navigation where parent_id=0 and (type='both' or type='top') order by priority asc");
		$navigation=$db->query('select name,id from fb_navigation where id='.$nav);
	?>
  <div id=navigation>
			<div class="menu" <?php if($navigation[0]->name=="首页"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[0]->href; ?>"><div class="nav" param1="<?php echo $countnav[0]->id; ?>" id=picindex></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="榜单"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[1]->href; ?>"><div class="nav" param1="<?php echo $countnav[1]->id; ?>" id=picbangdan></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="富豪"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[2]->href; ?>"><div class="nav" param1="<?php echo $countnav[2]->id; ?>" id=picfuhao></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu" <?php if($navigation[0]->name=="投资"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[3]->href; ?>"><div class="nav" param1="<?php echo $countnav[3]->id; ?>" id=pictouzi></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="创业"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[4]->href; ?>"><div class="nav" param1="<?php echo $countnav[4]->id; ?>" id=picchuangye></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="商业"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[5]->href; ?>"><div class="nav" param1="<?php echo $countnav[5]->id; ?>" id=picshangye></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="科技"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[6]->href; ?>"><div class="nav" param1="<?php echo $countnav[6]->id; ?>" id=pickeji></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="城市"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[7]->href; ?>"><div class="nav" param1="<?php echo $countnav[7]->id; ?>" id=picchengshi></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="奢华"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[8]->href; ?>"><div class="nav" param1="<?php echo $countnav[8]->id; ?>" id=picshehua></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="专栏"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[9]->href; ?>"><div class="nav" param1="<?php echo $countnav[9]->id; ?>" id=piczhuanlan></div></a>
			</div>
			<div id=top_function2>
				<div id=member></div>
				<div id=magazine></div>
			</div>
	</div>
	<div id=navigation2>
			<?php for($i=0;$i<count($countnav);$i++){ 
				$navigation2=$db->query('select name,target,href from fb_navigation where parent_id='.$countnav[$i]->id.' and (type="both" or type="top") order by priority asc'); ?>	
				<div class="nav2" <?php if($countnav[$i]->id==$nav){?>style="display:inline;"<?php }?> id="nav<?php echo $countnav[$i]->id; ?>">
					<?php for($j=0;$j<count($navigation2);$j++){ ?><a target="<?php echo $navigation2[$i]->target; ?>" href="<?php echo $navigation2[$i]->href; ?>"><?php echo $navigation2[$j]->name; ?></a><?php if($j<(count($navigation2)-1)){ ?>　|　<?php }} ?>
				</div>
			<?php } ?>
	</div>
</div>		
		