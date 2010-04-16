<?php
$s_text = $_REQUEST['s_text'];
include_once '../../frame.php';
if($s_text){
	$conditons =array('conditions' => " name like '%{$s_text}%' or stock_code like '%{$s_text}%'");
}
$db = get_db();
$table = new table_class('fb_company');
$record = $table->paginate('all',$conditons,'30'); 
?>
<div id=isearch>
	<input id="s_text" type="text" value="<? echo $_REQUEST['s_text']?>">
	<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class="itable_title">
			<td width="40%">名称</td><td width="30%">股票代码</td><td width="30%">操作</td>
		</tr>
		<?php
			$len = count($record);
			for($i=0;$i< $len;$i++){
		?>
				<tr class="tr3" id=<?php echo $record[$i]->id;?> >
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
		<tr class=btools>
			<td colspan="10">
				<?php paginate('filter_company.php?','company_filter'); ?>
				<input type="hidden" id="db_table" value="fb_gs">
			</td>
		</tr>
	</table>
</div>
	<script>
		$('#s_text').keypress(function(e){
			if(e.keyCode == 13)
			{
				$('#company_filter').load("filter_company.php?s_text=" + encodeURI($('#s_text').val()));
			}
		});
	</script>