<?php
$s_text = $_REQUEST['s_text'];
include_once '../../frame.php';
if($s_text){
	$conditons =array('conditions' => " name like '%{$s_text}%' or stock_code like '%{$s_text}%'");
}
$db = get_db();
$table = new table_class('fb_company');
$record = $table->paginate('all',$conditons); 
?>
	<table width="795" border="0" id="list" >
		<tr class="tr1">
			<td colspan="11">
				<input id="s_text" type="text" value="<? echo $_REQUEST['s_text']?>" style="margin-left:20px;">
				<input type="button" value="搜索" id="btn_search" style="border:2px solid #999999; height:20px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="300">名称</td><td width="300">股票代码</td><td width="195">操作</td>
		</tr>
		<?php
			$len = count($record);
			for($i=0;$i< $len;$i++){
		?>
				<tr class="tr4" id=<?php echo $record[$i]->id;?> >
					<td><?php echo strip_tags($record[$i]->name);?></td>
					<td>
						<?php echo strip_tags($record[$i]->stock_code);?>
					</td>
					
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="add_compay_info" name="<?php echo $record[$i]->id;?>" style="cursor:pointer"><img src="/images/btn_add.png" border="0" title="添加"></img></a>
					</td>
				</tr>
		<?php
			}
		?>
		<tr><td colspan="8" align="right"><?php paginate('filter_company.php?','company_filter'); ?><input type="hidden" id="db_table" value="fb_gs"></td></tr>
	</table>
	<script>
		$('#s_text').keypress(function(e){
			if(e.keyCode == 13)
			{
				$('#company_filter').load("filter_company.php?s_text=" + encodeURI($('#s_text').val()));
			}
		});
	</script>