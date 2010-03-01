<?php
	require_once('../../frame.php');
	$key = urldecode($_REQUEST['key']);
	if($_REQUEST['show_div'] != '0'){
		echo "<div id='result_box'>";
	}
	$filter_adopt = isset($_REQUEST['filter_adopt']) ? $_REQUEST['filter_adopt'] : -1;
	if($filter_adopt != -1){
		$conditions[] = 'is_adopt= ' .$filter_adopt;
	}
	$filter_category = $_REQUEST['filter_category'] ? $_REQUEST['filter_category'] : -1;
	if($filter_category != -1){
		$conditions[] = 'category_id =' .$filter_category;		
	}
	if($conditions){
		$conditions = implode(' and ', $conditions);	
	}
	$category = new category_class('news');
	$category->echo_jsdata();	
?>
<?
		css_include_tag('admin');

?>

	<table width="600" border="0" id="list" style="boder:1px solid">
		<tr class="tr2">
			<td colspan="4" align=center>　
			搜索 <input id="search_text" type="text" value="<? echo $key;?>">
			<span id="span_category_select"></span>
			<select id="filter_adopt">
				<option value="-1">发布状态</option>
				<option value="0" <?php if($filter_adopt == 0) echo ' selected="selected"' ?>>未发布</option>
				<option value="1" <?php if($filter_adopt == 1) echo ' selected="selected"' ?>>已发布</option>
			</select>
			<input type="button" value="搜索" id="subject_search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="50">选择</td><td width="250">短标题</td><td width="200">发表时间</td><td width="100">所属类别</td>
		</tr>
		<?php
			$subject = new table_class("fb_news");

			$items = search_content($_REQUEST['key'],'fb_news',$conditions,10);
			$count_record = count($items);			
			//--------------------		
			for($i=0;$i<$count_record;$i++)	{
				
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><input type="checkbox" id="<?php echo $items[$i]->id;?>" value="<?php echo $items[$i]->id;?>" name="subject" style="width:12px;"></td>
					<td><?php echo strip_tags($items[$i]->short_title);?></td>
					<td><?php echo strip_tags($items[$i]->created_at);?></td>					
					<td><?php echo $category->find($items[$i]->category_id)->name; ?></td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class=tr3>
				<td colspan="4"><?php paginate('','result_box');?></td>
		</tr>
		<tr class=tr3>
				<td colspan="4"><button id="button_ok" style="width:150px">确定</button><button id="save" style="width:150px">取消所有关联</button>
					<input type="hidden" id="chosen_subject_id" value="">
					<input type="hidden" id="chosen_subject_name" value="">
					<input type="hidden" id="chosen_subject_category_id" value="">
				</td>
		</tr>		
	</table>

<script>
		$('#list input:checkbox').click(function(){
			if($(this).attr('checked')){
				add_related_news($(this).attr('id'));
			}else{
				remove_related_news($(this).attr('id'));
			}
		});
		
		$('#save').click(function(){
			related_news.length = 0;
			$('#hidden_related_news').attr('value','');
			$('#list input:checkbox').each(function(){
				$(this).attr('checked',false);
			});
		});
		$('#button_ok').click(function(){
			$.fn.colorbox.close();
			display_related_news();
		});	
		$('input:radio').click(function(){
			$('#chosen_subject_id').attr('value',$(this).attr('value'));
			$('#chosen_subject_name').attr('value',$(this).next('span').html());
			$('#chosen_subject_category_id').attr('value','');						
		});
		$('.subject_category_select').change(function(){
			$('#chosen_subject_category_id').attr('value',$(this).attr('value'));
		});
		$('#subject_search').click(function(){
			send_search();
		});
		$('#filter_dept,#filter_adopt').change(function(){
			send_search();
		});
		$('#list input:checkbox').each(function(){
			if($.inArray($(this).attr('id'),related_news) != -1){
				$(this).attr('checked',true);
			}
		});
		$('#search_text').keydown(function(e){
			if(e.keyCode == 13){
				send_search();
			}
		});
		
		function send_search(){
			var filter_category = $('.news_category:last').attr('value');
			var filter_adopt = $('#filter_adopt').attr('value');
			url = 'news_filter.php?filter_category=' + filter_category;
			url += '&filter_adopt=' + filter_adopt;
			url += '&key=' + encodeURI($('#search_text').val());
			$('#result_box').load(url,{'show_div':'0'});			
			//$('#result_box').load('filte_news.php',{'show_div':'0','key':$('#search_text').attr('value'),'filter_dept':$('#filter_dept').attr('value'),'filter_category':$('.news_category:last').attr('value'),'filter_adopt':$('#filter_adopt').attr('value')});			
		}
		category.display_select('news_category',$('#span_category_select'),<?php echo $filter_category;?>,'',function(){send_search();});

</script>
<?php 
	if($_REQUEST['show_div'] != '0'){
		echo "</div>";
	}
?>