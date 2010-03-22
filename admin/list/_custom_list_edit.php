<?php
			if($id && $record->table_name && $record->list_type=="1"){
			$table = new table_class($record->table_name);
			foreach($table->fields as $k => $v){
				if($k == 'id') continue;
		?>
		<tr class="tr4">
			<td width="130">列名</td>
			<td width="695" align="left">
				<input type="text" name="list[<?php echo $k;?>][comment]" value="<?php echo $v->comment;?>" class="required">
				<select name="list[<?php echo $k;?>][type]">
					<option value="varchar(255)" <?php if($v->type == 'varchar(255)') echo "selected='selected'";?>>字符串</option>
					<option value="int(11)" <?php if($v->type == 'int(11)') echo "selected='selected'";?>>整数</option>
					<option value="float" <?php if($v->type == 'float') echo "selected='selected'";?>>浮点数</option>
					<option value="text" <?php if($v->type == 'text') echo "selected='selected'";?>>长字符串</option>
				</select>
				<input name="list[<?php echo $k;?>][key]" value="MUL" type="checkbox" <?php if($v->key == 'MUL') echo "checked='checked'"?>></input>排序
				<input name="list[<?php echo $k;?>][key]" value="UNI"  type="checkbox" <?php if($v->key == 'UNI') echo "checked='checked'"?>></input>唯一
				<input type="hidden" value="<?php echo $k;?>"></input>
				<img alt="删除" title="删除" src="/images/btn_delete.png" style="cursor:pointer;" class="del_old del_column">
			</td>
		</tr>
		<?php }}?>