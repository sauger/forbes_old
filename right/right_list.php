<style type="text/css">
	.inc_right_list_main{
		float:left;
		width:320px;
		margin-top:10px;
		font-size:14px; 
		line-height:14px;
	}
	.inc_list_top_border{
		width:317px;
		height:4px;
		background: url('/images/right/list_top.jpg');
	}
	.inc_list_bottom_border{
		width:317px;
		height:4px;
		background: url('/images/right/list_bottom.jpg');
	}
	.inc_list_title{
		width:300px;
		font-weight:bold; 
		line-height:18px;
		padding:3px 0px 5px 15px;
		border-left:1px solid #dfdfdf;	
		border-right:1px solid #dfdfdf;
		color:#003A7B;
	}
	.inc_list_item_title{
		width:300px;
		border-left:1px solid #dfdfdf;
		border-right:1px solid #dfdfdf;
		border-top: 1px solid #dfdfdf;
		padding:7px 0px 7px 15px;
		font-weight:bold; 
		color:#999999;
	}
	.inc_list_item_title_selected{
		color:#000000;
		border:1px solid #999999;
		background-color: #F4F4F4;
	}
	.inc_list_item_content{
		width:300px;
		height:110px;
		border-left:1px solid #dfdfdf;
		border-right:1px solid #dfdfdf;
		padding:7px 0px 7px 15px;
		display:none;
	}	
	.inc_list_item_content ul li{
		padding-left:10px;
	}
	
</style>
<?php include_once dirname(__FILE__) .'/../frame.php'?>
<div class="inc_right_list_main">
	<!--  title -->
	<div class="inc_list_top_border"></div>
	<div class="inc_list_title">生活和专题榜</div>
	<div class="inc_list_item_title inc_list_item_title_selected">餐饮</div>
	<div class="inc_list_item_content" style="display:block;">
		<?php $record_show = get_news_by_pos('网页榜单-餐饮','榜单首页');?>
		<ul>
		<?php for($i=0;$i<4;$i++){?>
			<li><a href=""><?php echo $record_show[$i]->name;?></a></li>
		<?php }?>
		</ul>
	</div>
	<div class="inc_list_item_title">健康</div>
	<div class="inc_list_item_content">
		<?php $record_show = get_news_by_pos('网页榜单-餐饮','榜单首页');?>
		<ul>
		<?php for($i=0;$i<4;$i++){?>
			<li><a href=""><?php echo $record_show[$i]->name;?></a></li>
		<?php }?>
		</ul>
	</div>
	<div class="inc_list_item_title">固定不动产</div>
	<div class="inc_list_item_content">
		<?php $record_show = get_news_by_pos('网页榜单-不动产','榜单首页');?>
		<ul>
		<?php for($i=0;$i<4;$i++){?>
			<li><a href=""><?php echo $record_show[$i]->name;?></a></li>
		<?php }?>
		</ul>
	</div>
	<div class="inc_list_item_title">时尚</div>
	<div class="inc_list_item_content">
		<?php $record_show = get_news_by_pos('网页榜单-时尚','榜单首页');?>
		<ul>
		<?php for($i=0;$i<4;$i++){?>
			<li><a href=""><?php echo $record_show[$i]->name;?></a></li>
		<?php }?>
		</ul>
	</div>
	<div class="inc_list_item_title">旅游</div>
	<div class="inc_list_item_content">
		<?php $record_show = get_news_by_pos('网页榜单-旅游','榜单首页');?>
		<ul>
		<?php for($i=0;$i<4;$i++){?>
			<li><a href=""><?php echo $record_show[$i]->name;?></a></li>
		<?php }?>
		</ul>
	</div>
	<div class="inc_list_item_title">汽车</div>
	<div class="inc_list_item_content">
		<?php $record_show = get_news_by_pos('网页榜单-汽车','榜单首页');?>
		<ul>
		<?php for($i=0;$i<4;$i++){?>
			<li><a href=""><?php echo $record_show[$i]->name;?></a></li>
		<?php }?>
		</ul>
	</div>
	<div class="inc_list_item_title">腕表</div>
	<div class="inc_list_item_content">
		<?php $record_show = get_news_by_pos('网页榜单-腕表','榜单首页');?>
		<ul>
		<?php for($i=0;$i<4;$i++){?>
			<li><a href=""><?php echo $record_show[$i]->name;?></a></li>
		<?php }?>
		</ul>
	</div>
	<div class="inc_list_bottom_border"></div>
</div>
<script>
	$('div.inc_list_item_title').hover(function(){
		$('div.inc_list_item_title').removeClass('inc_list_item_title_selected');
		$(this).addClass('inc_list_item_title_selected');
		$('div.inc_list_item_content').not($(this).next()).hide();
		$(this).next().show();
	});
</script>