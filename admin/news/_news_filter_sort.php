<?php 		
	require_once('../../frame.php');
	$selected_news = ($_REQUEST['selected_news']);
	$selected_news_a = explode(',',$selected_news);
	$category = new category_class('news');
	?>
	<style type="text/css">
		.items{float:left;margin-top:5px;width:590px;}
		.item1{width:320px;float:left;overflow: hidden;}
		.item2{width:150px;float:left;overflow: hidden;}
		.item3{width:90px;float:left;overflow: hidden;}
	</style>
	<table width="600" border="0" id="list" style="boder:1px solid">
		<tr class="tr2">
			<td width="250">短标题</td><td width="200">发表时间</td><td width="100">所属类别</td>
		</tr>
		<tr class="tr2">
			<td colspan="4" align="left">
				<span style="color:blue">请直接拖动，调整新闻排序</span>
			</td>
		</tr>
		<tr >
			<td colspan="4">
				<div id="sortable">
					<?php
						$db = get_db();
						$items = $db->query("select * from fb_news where id in ({$selected_news}) order by find_in_set(id,'{$selected_news}')");
						$count_record = count($items);			
						//--------------------		
						for($i=0;$i<$count_record;$i++)	{
							
					?>
							<div class="items" id='<?php echo $items[$i]->id;?>' >
								<div class="item1"><?php echo strip_tags($items[$i]->short_title);?></div>
								<div class="item2"><?php echo strip_tags($items[$i]->created_at);?></div>					
								<div class="item3"><?php echo $category->find($items[$i]->category_id)->name; ?></div>
							</div>
					<?php
						}
						//--------------------
					?>				
				</div>
			</td>
		</tr>
		<tr class=tr3>
				<td colspan="4"><?php paginate('','result_box');?></td>
		</tr>
		<tr class=tr3>
				<td colspan="4">
					<input type="hidden" id="selected_news" value="<?php echo $selected_news?>"></input>
					<input type="hidden" id="save_function" value="<?php echo $_REQUEST['save_function'];?>"></input>
					<button id="button_ok" style="width:150px">确定</button>
					<button id="button_back" style="width:150px">返回</button>
				</td>
		</tr>		
	</table>
	<script type="text/javascript">
		var selected_news = new Array();
		<?php if($selected_news_a){
			foreach ($selected_news_a as $v) {
				echo "selected_news.push('$v');";
			}
		}?>
		$(function(){
			$('#button_back').click(function(){
				$('#result_box').load('news_filter.php',{'show_div':'0','selected_news':selected_news.join(','),'call_back':'<?php echo $_REQUEST['call_back'];?>'});
			});
			$('#button_ok').click(function(){
				selected_news.length =0;
				$('div.items').each(function(){
					selected_news.push($(this).attr('id'));
				});
				$('#result_box').load('news_filter.php',{'show_div':'0','selected_news':selected_news.join(','),'call_back':'<?php echo $_REQUEST['call_back'];?>'});
			});
			$('#sortable').sortable();
		});
</script>
