<?php
$s_text = $_REQUEST['s_text'];
include_once '../../frame.php';
if($s_text){
	$conditons =array('conditions' => " name like '%{$s_text}%'");
}
$db = get_db();
$table = new table_class('fb_company');
$record = $table->find('all',$conditons); 
?>
	<table width="770" border="0" id="list">
		<tr class="tr1">
			<td colspan="11">
				　搜索　
				<input id="s_text" type="text" value="<? echo $_REQUEST['s_text']?>">
				<input type="button" value="搜索" id="btn_search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="100">名称</td><td width="100">股票代码</td><td width="70">操作</td>
		</tr>
		<?php
			$len = count($record);
			for($i=0;$i< $len;$i++){
		?>
				<tr class="tr3" id=<?php echo $record[$i]->id;?> >
					<td><?php echo strip_tags($record[$i]->name);?></td>
					<td align="center">
						<?php echo strip_tags($record[$i]->stock_code);?>
					</td>
					
					<td align="center">
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="add_compay_info" name="<?php echo $record[$i]->id;?>" style="cursor:pointer"><img src="/images/btn_add.png" border="0" title="添加"></img></a>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_gs">
		<?php
			}
		?>
		<tr><td colspan="8" align="right"><?php paginate('','company_filter'); ?></td></tr>
	</table>