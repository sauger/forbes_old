	<div id=top_banner>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="778" height="90">
        <param name="movie" value="/flash/banner.swf">
        <param name="quality" value="high">
        <PARAM NAME="WMode" VALUE="Opaque">
        <embed src="/flash/banner.swf" quality="high" WMode="Opaque" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="778" height="90"></embed>
     </object>
	</div>
	<div id=top_function>
			<div class=user_btn>
				<?php init_page_items(); if(!$_SESSION['name']){?>
				<a href="/login">登陆</a>　<a href="/register/">注册</a>
				<?php }else{?>
				<div id="uname_span"><?php echo $_SESSION['name'];?>,你好</div>
				<a href="javascript:void(0)" id="logout">登出</a>
				<a href="/user" id="">会员中心</a>
				<?php }?>
			</div>
			<div class=user_btn><a href="javascript:void(0)" onclick="myhomepage()" name="homepage">设为首页</a>　<a href="javascript:void(0)" onclick="addfavorite()">收藏本页</a></div>
			<div id=magazine_title>本期杂志介绍</div>
			<?php 
				$pos_name = "top_magazine";
			?>
			<div id=magazine_pic <?php show_page_pos($pos_name)?>><?php show_page_img($pos_items,$pos_name,1,75,95)?></div>
			<div id=magazine_description><span class=font1><?php echo $pos_items->$pos_name->display;?></span><br><?php echo $pos_items->$pos_name->description;?></div>
			<div id=magazine_btn><a href="<?php echo $pos_items->$pos_name->href;?>"><img src="/images/public/magazine_btn.jpg" border=0></a></div>

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
				<a href="<?php echo $countnav[1]->href; ?>"><div class="nav" param1="<?php echo $countnav[1]->id; ?>" id=piclist></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="富豪"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[2]->href; ?>"><div class="nav" param1="<?php echo $countnav[2]->id; ?>" id=picbillinaires></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu" <?php if($navigation[0]->name=="投资"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[3]->href; ?>"><div class="nav" param1="<?php echo $countnav[3]->id; ?>" id=picinvestment></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="商业"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[5]->href; ?>"><div class="nav" param1="<?php echo $countnav[5]->id; ?>" id=picbusiness></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="创业"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[4]->href; ?>"><div class="nav" param1="<?php echo $countnav[4]->id; ?>" id=picinitiate></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="科技"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[6]->href; ?>"><div class="nav" param1="<?php echo $countnav[6]->id; ?>" id=pictech></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="城市"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[7]->href; ?>"><div class="nav" param1="<?php echo $countnav[7]->id; ?>" id=piccity></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="奢华"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[8]->href; ?>"><div class="nav" param1="<?php echo $countnav[8]->id; ?>" id=piclife></div></a>
			</div>
			<div class=vertical></div>
			<div class="menu"  <?php if($navigation[0]->name=="专栏"){?>style="background:url('/images/public/bg_menu.jpg') repeat-x;"<?php } ?>>
				<a href="<?php echo $countnav[9]->href; ?>"><div class="nav" param1="<?php echo $countnav[9]->id; ?>" id=piccolumn></div></a>
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