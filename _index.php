<?php
		$catename=$db->query('SELECT name FROM fb_category where id='.$cid); ?>
		<div id=bread><a href="#"><?php echo $catename[0]->name; ?></div>
		<div id=bread_line></div>
		<div id=l>
			<div id=common_head_title pos="<?php $pos_name = $pos.'hl'; echo $pos_name;?>"><?php show_page_href($pos_items,$pos_name);?></div>
			<div id=common_head_title_pic>
				<?php show_page_img($pos_items,$pos_name)?>
			</div>
			<div id=common_head_r>
				<div id=common_head_description><?php show_page_desc($pos_items,$pos_name)?></div>
				<div id=common_head_list>
					<?php for($i=0; $i<4;$i++){ $pos_name = $pos_name.'_r'.$i?>
						<div class=common_head_list pos="<?php echo $pos_name;?>"><?php show_page_href($pos_items,$pos_name);?></div>
					<?php } ?>
				</div>
			</div>
			
			
			<div class=common_box>
				<div class=caption>
					<div class=captions><?php echo $catename[0]->name; ?>文章</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php for($i=0;$i<5;$i++){ $pos_name = $pos.'acticle'.$i;?>
					<div class=common_article_lis1 pos="<?php echo $pos_name;?>"><?php show_page_href($pos_items,$pos_name);?></div>
					<div class=common_article_description1><?php show_page_desc($pos_items,$pos_name);?></div>
				<? }?>
				
	
				<div class=caption>
					<div class=captions style="width:30px;">文章</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php  for($i=5;$i<15;$i++){ $pos_name = $pos.'acticle'.$i;?>
					<div class=common_article_lis2 pos="<?php echo $pos_name;?>"><?php show_page_href($pos_items,$pos_name);?></div>
				<?php } ?>
			</div>
			
			<div id=common_dash></div>
			
			<div class=common_box2 >
				<div class=caption>
					<div class=captions><?php echo $catename[0]->name; ?>专题</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php for($i=0;$i<2;$i++){ $pos_name = $pos."them".$i;?>
				<div class=common_subject pos="<?php echo $pos_name;?>">
					<div class=common_subject_pic><?php show_page_img($pos_items,$pos_name)?></div>
					<div class=common_subject_list><?php show_page_href($pos_items,$pos_name)?></div>
					<div class=common_subject_description><?php show_page_desc($pos_items,$pos_name)?></div>
				</div>
				<?php }?>
				
				<?php for($i=2;$i<8;$i++){ $pos_name = $pos."them".$i;?>
					<div class=common_article_lis2 pos="<?php echo $pos_name;?>"><?php show_page_href($pos_items,$pos_name)?></div>
				<?php }?>
				
				<div class=caption style="margin-top:20px;">
					<div class=captions><?php echo $catename[0]->name; ?>专栏</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php for($i=0;$i<3;$i++){ $pos_name = $pos."column".$i;?>
				<div class=common_list3 pos="<?php echo $pos_name;?>"><?php show_page_href($pos_items,$pos_name)?></div>
				<div class=common_description3><?php echo $pos_items->$pos_name->description;?></div>
				<div class=common_writer>——<?php echo $pos_items->$pos_name->alias?></div>
				<?php } ?>
			</div>
		</div>
		
		
		<div id=right>
				<div id="right_inc" style="margin-top:10px;">
		  		<?php include "../right/ad.php";?>
		  		<?php include "../right/investment_list.php"?>
		  		<?php include "../right/favor.php"?>
		  		<?php include "../right/activities.php"?>
		  		<?php include "../right/article.php";?>
		  		
		  		
		 	</div>
			
		</div>
