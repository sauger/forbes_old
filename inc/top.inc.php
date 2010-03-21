	<?php 
		$path = dirname(__FILE__) .'/';
	    include_once($path ."../frame.php");
	    js_include_tag('select2css','top');
	    css_include_tag('top','select2css');
	?>
	<div id=banner><a href="#"><img border=0 src="/images/index/top_banner.jpg"></a></div>
		<div id=top_login>
			<div class=login_title><a href="">·登陆</a><a href="">·注册</a></div>
			<div class=login_title><a href="">·设为首页</a><a href="">·收藏本页</a></div>
			<div id=jieshao_title>
				<div id=pic></div>
			</div>
			<div id=cleft></div>
			<div id=ccenter>
					<div id=cpic><a href=""><img border=0 src="/images/index/six.jpg"></a></div>
					<div id=context>
						<div id=title><a href="">福布斯中文版VOL.22</a></div>
						<div id=content><a href="">版杂志知案例荟萃丰富的福布斯中文版杂志知识及案例...</a></div>
						<div id=ck><button></button></div>
					</div>
			</div>	
			<div id=cright></div>	
		</div>
		
		<div id=itop>
			<div id=itop_l></div>
			<div id=itop_r>
				<div id=logo></div>
				<div class="tm2008style">
					<select name="selsearch" class="iselect">
						<option>榜单</option>
						<option>富豪</option>
						<option>文章</option>
					</select>
				</div>
				<input class="iinput">
				<button class=search>查 询</button>
			</div>
		</div>
		<?php
		$db=get_db();
		if($nav=="")
		{
			$nav=3;	
		}
		$countnav=$db->query("select * from fb_navigation where parent_id=0 and (type='both' or type='top') order by priority asc");
		$navigation=$db->query('select name,id from fb_navigation where id='.$nav);
	?>
		<div id=navigation>
			<div class="content" <?php if($navigation[0]->name=="首页"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[0]->href; ?>" param1="<?php echo $countnav[0]->id; ?>" id=picindex></div>
			</div>
			<div class=vertical></div>
			<div class="content"  <?php if($navigation[0]->name=="榜单"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[1]->href; ?>" param1="<?php echo $countnav[1]->id; ?>" id=picbangdan></div>
			</div>
			<div class=vertical></div>
			<div class="content"  <?php if($navigation[0]->name=="富豪"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[2]->href; ?>" param1="<?php echo $countnav[2]->id; ?>" id=picfuhao></div>
			</div>
			<div class=vertical></div>
			<div class="content" <?php if($navigation[0]->name=="投资"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[3]->href; ?>" param1="<?php echo $countnav[3]->id; ?>" id=pictouzi></div>
			</div>
			<div class=vertical></div>
			<div class="content"  <?php if($navigation[0]->name=="创业"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[4]->href; ?>" param1="<?php echo $countnav[4]->id; ?>" id=picchuangye></div>
			</div>
			<div class=vertical></div>
			<div class="content"  <?php if($navigation[0]->name=="商业"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[5]->href; ?>" param1="<?php echo $countnav[5]->id; ?>" id=picshangye></div>
			</div>
			<div class=vertical></div>
			<div class="content"  <?php if($navigation[0]->name=="科技"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[6]->href; ?>" param1="<?php echo $countnav[6]->id; ?>" id=pickeji></div>
			</div>
			<div class=vertical></div>
			<div class="content"  <?php if($navigation[0]->name=="城市"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[7]->href; ?>" param1="<?php echo $countnav[7]->id; ?>" id=picchengshi></div>
			</div>
			<div class=vertical></div>
			<div class="content"  <?php if($navigation[0]->name=="奢华"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[8]->href; ?>" param1="<?php echo $countnav[8]->id; ?>" id=picshehua></div>
			</div>
			<div class=vertical></div>
			<div class="content"  <?php if($navigation[0]->name=="专栏"){?>style="width:90px; background:url('/images/index/dh1_bg.jpg') repeat-x;"<?php } ?>>
				<div class="nav" param="<?php echo  $countnav[9]->href; ?>" param1="<?php echo $countnav[9]->id; ?>" id=piczhuanlan></div>
			</div>
			<div class=vertical></div>
			<div id=hyzq>
				<div id=zqhy></div>
				<div id=zzzs></div>
			</div>
		</div>
		<div id=navigation2>
			<?php for($i=0;$i<count($countnav);$i++){ 
				$navigation2=$db->query('select name,target,href from fb_navigation where parent_id='.$countnav[$i]->id.' and (type="both" or type="top") order by priority asc'); ?>	
				<div class="n_content" <?php if($countnav[$i]->id==$nav){?>style="display:inline;"<?php }?> id="nav<?php echo $countnav[$i]->id; ?>">
					<?php for($j=0;$j<count($navigation2);$j++){ ?><a target="<?php echo $navigation2[$i]->target; ?>" href="<?php echo $navigation2[$i]->href; ?>"><?php echo $navigation2[$j]->name; ?></a><?php if($j<(count($navigation2)-1)){ ?>　|　<?php }} ?>
				</div>
			<?php } ?>
		</div>