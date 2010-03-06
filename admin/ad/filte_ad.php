<?php
	require_once('../../frame.php');
	$key = urldecode($_REQUEST['key']);
	$filter_adopt = $_REQUEST['filter_adopt'];
	$related = $_REQUEST['related'];
	$id = $_REQUEST['id'];
	$db = get_db();
	if(!empty($related)){
		//var_dump($related);
		$checked = $db->query("select t1.id,t1.name,t1.code,t2.name as g_name from fb_ad t1 join fb_ad_ggw t2 on t1.ggw_id=t2.id where t1.id in ({$related})");
		if($id!=''){
			$r_id = $related.','.$id;
		}else{
			$r_id = $related;
		}
	}else{
		if($id!=''){
			$r_id = $id;
		}
	}
	if(empty($r_id)){
		$sql = "select t1.id,t1.name,t1.code,t2.name as g_name from fb_ad t1 join fb_ad_ggw t2 on t1.ggw_id=t2.id where 1=1";
	}else{
		$sql = "select t1.id,t1.name,t1.code,t2.name as g_name from fb_ad t1 join fb_ad_ggw t2 on t1.ggw_id=t2.id where 1=1 and t1.id not in  ({$r_id})";
	}
	
	
	
	if($_REQUEST['show_div'] != '0'){
		echo "<div id='result_box'>";
	}
	if($key!=''){
		$sql .= " and t1.name like '%{$key}%' or t1.code like '%{$key}%'";
	}
	if($filter_adopt!=''){
		$sql .= " and t1.is_adopt=$filter_adopt";
	}
	$sql .= " order by t1.priority";
	//echo $sql;
	$record = $db->query($sql);
	$count_record = count($record);
?>
<?php
	css_include_tag('admin');
?>

	<table width="600" border="0" id="list" style="boder:1px solid">
		<tr class="tr2">
			<td colspan="4" align=center>　
			搜索 <input id="search_text" type="text" value="<? echo $key;?>">
			<select id="filter_adopt">
				<option value="">发布状态</option>
				<option value="0" <?php if($filter_adopt == 0) echo ' selected="selected"' ?>>未发布</option>
				<option value="1" <?php if($filter_adopt == 1) echo ' selected="selected"' ?>>已发布</option>
			</select>
			<input type="button" value="搜索" id="subject_search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="50">选择</td><td width="250">广告名</td><td width="200">广告代码</td><td width="100">广告位</td>
		</tr>
		<?php
			for($i=0;$i<count($checked);$i++)	{
		?>
				<tr class=tr3>
					<td><input type="checkbox" checked="checked" id="<?php echo $checked[$i]->id;?>" value="<?php echo $checked[$i]->id;?>" name="subject" style="width:12px;"></td>
					<td><?php echo $checked[$i]->name;?></td>
					<td><?php echo $checked[$i]->code;?></td>					
					<td><?php echo $checked[$i]->g_name;?></td>
				</tr>
		<?php
			}
		?>
		<?php
			for($i=0;$i<$count_record;$i++)	{
		?>
				<tr class=tr3>
					<td><input type="checkbox" id="<?php echo $record[$i]->id;?>" value="<?php echo $record[$i]->id;?>" name="subject" style="width:12px;"></td>
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->code;?></td>					
					<td><?php echo $record[$i]->g_name;?></td>
				</tr>
		<?php
			}
		?>
		<tr class=tr3>
				<td colspan="4"><?php paginate('','result_box');?></td>
		</tr>
		<tr class=tr3>
				<td colspan="4"><button id="button_ok" style="width:150px">确定</button><button id="clean" style="width:150px">取消所有关联</button>
				</td>
		</tr>		
	</table>

<script>
		$('#list input:checkbox').click(function(){
			if($(this).attr('checked')){
				add_related_ad($(this).attr('id'));
			}else{
				remove_related_ad($(this).attr('id'));
			}
		});
		
		$('#clean').click(function(){
			related_ad.length = 0;
			$('#hidden_related_ad').attr('value','');
			$('#list input:checkbox').each(function(){
				$(this).attr('checked',false);
			});
		});
		$('#button_ok').click(function(){
			$.fn.colorbox.close();
			display_related_ad();
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
</script>
<?php 
	if($_REQUEST['show_div'] != '0'){
		echo "</div>";
	}
?>