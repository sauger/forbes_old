<?php 
	require_once('../../frame.php');
	$db = get_db();
	$table = $_POST['table'];
	if($table==''){die();}
	if($table=='rich_list'){
?>
<tr class="tr3 add">
	<td width="130">请选择要加入榜单</td>
	<td width="695" align="left">
		<?php
			$list = $db->query('SELECT * FROM fb_fhb');
			if(count($list)==0){
				die('<a href="/admin/rich_list/">请先添加一个榜单！</a>');
			}
		?>
		<select id="list_id" class="required" name="list_id">
			<option value="">请选择</option>
			<?php
				for($i=0;$i<count($list);$i++){
			?>
			<option value="<?php echo $list[$i]->id;?>"><?php echo $list[$i]->year;?></option>
			<?php
				}
			?>
		</select>
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">上传XLS</td>
	<td width="695" align="left">
		<input type="file" class="required" name="xls">
	</td>
</tr>
<tr class="tr1 add">
	<td colspan="6" width="795">　　字段匹配（在输入框里输入相应的列号，没有的相对应的列号不用输入）</td>
</tr>
<tr class="tr3 add">
	<td width="130">富豪姓名</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text" class="number" name="fh_id">
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">综合排名</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text"  class="number" name="pm">
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">个人财富</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text"  class="number" name="sr">
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">备注</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text"  class="number" name="sbly">
	</td>
</tr>
<?php
	}elseif($table=='famous_list'){
?>
<tr class="tr3 add">
	<td width="130">请选择要加入榜单</td>
	<td width="695" align="left">
		<?php
			$list = $db->query('SELECT * FROM fb_mrb');
			if(count($list)==0){
				die('<a href="/admin/famous_list/">请先添加一个榜单！</a>');
			}
		?>
		<select id="list_id" class="required" name="list_id">
			<option value="">请选择</option>
			<?php
				for($i=0;$i<count($list);$i++){
			?>
			<option value="<?php echo $list[$i]->id;?>"><?php echo $list[$i]->year;?></option>
			<?php
				}
			?>
		</select>
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">上传XLS</td>
	<td width="695" align="left">
		<input type="file" name="xls">
	</td>
</tr>
<tr class="tr1 add">
	<td colspan="6" width="795">　　字段匹配（在输入框里输入相应的列号，没有的相对应的列号不用输入）</td>
</tr>
<tr class="tr3 add">
	<td width="130">名人姓名</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text" class="number" name="fh_id">
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">综合排名</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text"  class="number" name="pm">
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">收入</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text"  class="number" name="sr">
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">曝光率</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text"  class="number" name="bgl">
	</td>
</tr>
<tr class="tr3 add">
	<td width="130">上榜理由</td>
	<td width="695" align="left">
		<input style="width:50px;" type="text"  class="number" name="sbly">
	</td>
</tr>
<?php
	}else{
?>
<tr class="tr3 add">
	<td width="130">上传XLS</td>
	<td width="695" align="left">
		<input type="file" name="xls">
	</td>
</tr>
<tr class="tr1 add">
	<td colspan="6" width="795">　　字段匹配（在输入框里输入相应的列号，没有的相对应的列号不用输入）</td>
</tr>
<?php
	$table_fields = $db->query("show full fields FROM ".$table);
	for($i=1;$i<count($table_fields);$i++){
?>
<tr class="tr3 add">
	<td width="130"><?php echo $table_fields[$i]->Comment?></td>
	<td width="695" align="left">
		<input style="width:50px;" type="text"  class="number" name="<?php echo $table_fields[$i]->Field?>">
	</td>
</tr>
<?php
	}}
?>