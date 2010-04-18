<?php
	require_once(dirname(__FILE__).'/../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-专栏</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('column','right_inc','public');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
		<? require_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=bread><a href="#">专栏</a></div>
		<div id=bread_line></div>
		<div id=column_left>
			<div class=column_left_top>
				<div class=column_special>
					<div class="t">
						<div class="t_title">特约专栏</div><a href="" class=more></a>
					</div>
					<div class=column_special_top <?php show_page_pos('column_special_t');?>>
						<div class=t1 >
							<?php show_page_href($pos_items,'column_special_t'); ?>
						</div>
						<div class=t2 >
							<?php show_page_desc($pos_items,'column_special_t'); ?>
						</div>
					</div>
					<?php
						for($i=0;$i<4;$i++){
							
					?>
					<div class=column_recommend>
						<div class=column_recommend_top>
							<div class=column_recommend_top_l>
								<div class=picture <?php show_page_pos('column_recommend_top_l_'.$i);?>>
									<? show_page_img($pos_items,'column_recommend_top_l_'.$i); ?>
								</div>
								<div class=n <?php show_page_pos('column_recommend_top_n_'.$i);?>>
									<? $posname='column_recommend_top_n_'.$i; echo $pos_items->$posname->display; ?>
								</div>
							</div>
							<div class=column_recommend_top_r>
								<div class=t1>
									<?php echo $pos_items->$posname->display;?>专栏
								</div>
								<div class=t2 <?php show_page_pos('column_recommend_top_t2_0');?>>
									<?php show_page_href($pos_items,'column_recommend_top_t2_0'); ?>
								</div>
								<div class=t3>
									<?php show_page_desc($pos_items,'column_recommend_top_t2_0'); ?>
								</div>
							</div>
						</div>
						<?php
							for($j=1;$j<3;$j++){
						?>
						<div class=column_recommend_b <?php show_page_pos('column_recommend_b_'.$i.'_'.$j); ?>>
							<?php show_page_href($pos_items,'column_recommend_b_'.$i.'_'.$j); ?>
						</div>
						<?php }?>
					</div>
					<?php }?>
					
				</div>
				<div id=column_edit>
					<div class="t">
						<div style="width:120px;float:left; display:inline;">专栏文章推荐</div><a class=more></a>
					</div>
					<?php
						for($i=0;$i<3;$i++){
					?>
					<div class=column_edit_t>
						<div class=t1>
							<div class=t2 <?php show_page_pos('column_edit_t'.$i); ?>>
								<?php show_page_href($pos_items,'column_edit_t'.$i);?>
							</div>
							<div class=t3 <?php show_page_pos('column_edit_author_'.$i); ?>>
								——<?php $posname='column_edit_author_'.$i; echo $pos_items->$posname->display;?>
							</div>
						</div>
						<div class=t4>
							<?php show_page_desc($pos_items,'column_edit_desc_'.$i);?>
						</div>
					</div>
					<?php }?>
					<div id=column_edit_recommend>
						<?php
							for($i=0;$i<8;$i++){
						?>
						<div class=t1>
							<div class=t2 <? show_page_pos('column_edit_recommend_'.$i); ?>>
								<?php show_page_href($pos_items,'column_edit_recommend_'.$i); ?>
							</div>
							<div class=t3 <? show_page_pos('column_edit_recommend_author_'.$i); ?>>
								——<?php $posname='column_edit_recommend_author_'.$i; echo $pos_items->$posname->display;?>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="dash2"></div>
					<div id=column_edit_b>
						<div class=t>
							<div class="t_title">专栏列表</div><a class=more></a>
						</div>
						<?php
							for($i=0;$i<14;$i++){
						?>
						<div class=t2 <? show_page_pos('column_edit_b_t2_'.$i); ?>>
							<?php show_page_href($pos_items,'column_edit_b_t2_'.$i); ?>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="dash1"></div>
			<div class=column_left_top style="margin-top:30px;border:0px; ">
				<div class=column_special>
					<div class="t">
						<div class="t_title">采编智库</div><a class=more></a>
					</div>
					<div class=column_special_top>
						<div class=t1 <? show_page_pos('column_c_b_zk_'.$i); ?>>
							<?php show_page_href($pos_item,'column_c_b_zk_'.$i); ?>
						</div>
						<div class=t2>
							<?php show_page_desc($pos_item,'column_c_b_zk_'.$i);?>
						</div>
					</div>
					<?php
						for($i=0;$i<4;$i++){
					?>
					<div class=column_recommend>
						<div class=column_recommend_top>
							<div class=column_recommend_top_l>
								<div class=picture <?php show_page_pos('column_r_t_l'.$i); ?>>
									<?php show_page_img($pos_item,'column_r_t_l'.$i); ?>
								</div>
								<div class=n <?php show_page_pos('column_r_t_l_n_'.$i); ?>>
									<?php $posname='column_r_t_l_n_'.$i; echo $pos_items->$posname->display;?>
								</div>
							</div>
							<div class=column_recommend_top_r>
								<div class=t1>
									<?php $posname='column_r_t_l_n_'.$i; echo $pos_items->$posname->display;?>专栏
								</div>
								<div class=t2 <?php show_page_pos('column_recommend_top_r_t2_0'); ?>>
									<?php show_page_href($pos_item,'column_recommend_top_r_t2_0'); ?>
								</div>
								<div class=t3>
									<?php show_page_desc($pos_item,'column_recommend_top_r_t2_0');?>
								</div>
							</div>
						</div>
						<?php
							for($j=1;$j<3;$j++){
						?>
						<div class=column_recommend_b <?php show_page_pos('column_recommend_top_r_t2_'.$j);?>>
							<?php show_page_href($pos_item,'column_recommend_top_r_t2_'.$j); ?>
						</div>
						<?php }?>
					</div>
					<?php }?>
					
				</div>
				<div id=column_edit>
					<div class="t">
						<div style="width:150px;float:left; display:inline;">采编智库文章推荐</div><a class=more></a>
					</div>
					<?php
						for($i=0;$i<3;$i++){
					?>
					<div class=column_edit_t>
						<div class=t1>
							<div class=t2 <?php show_page_pos('column_edit_edit_t2_'.$i); ?>>
								<?php show_page_href($pos_item,'column_edit_edit_t2_'.$i); ?>
							</div>
							<div class=t3 <?php show_page_pos('column_edit_edit_author_'.$i); ?>>
								——<?php $posname='column_edit_edit_author_'.$i; echo $pos_items->$posname->display;?>
							</div>
						</div>
						<div class=t4 <?php show_page_pos('column_edit_edit_desc_'.$i); ?>>
							<?php show_page_desc($pos_item,'column_edit_edit_desc_'.$i);?>
						</div>
					</div>
					<?php }?>
					<div id=column_edit_recommend>
						<?php
							for($i=0;$i<8;$i++){
						?>
						<div class=t1>
							<div class=t2 <?php show_page_pos('column_edit_recommend_'.$i); ?>>
								<?php show_page_href($pos_item,'column_edit_recommend_'.$i); ?>
							</div>
							<div class=t3 <?php show_page_pos('column_edit_recommend_author_'.$i); ?>>
								——<?php $posname='column_edit_recommend_author_'.$i; echo $pos_items->$posname->display;?>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="dash2"></div>
					<div id=column_edit_b>
						<div class=t>
							<div class="t_title">专栏列表</div><a class=more></a>
						</div>
						<?php
							for($i=0;$i<14;$i++){
						?>
						<div class=t2 <?php show_page_pos('column_list_'.$i) ?>>
							<?php show_page_href($pos_item,'column_list_'.$i); ?>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div id="right_inc">
			<?php require_once(dirname(__FILE__)."/../right/ad.php");?>
			<?php require_once(dirname(__FILE__)."/../right/column_c.php");?>
			<?php require_once(dirname(__FILE__)."/../right/column.php");?>
		</div>
		<? require_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>