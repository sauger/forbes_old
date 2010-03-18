<?php
include "../../frame.php";

$id = intval($_POST['id']);
$list_type = new table_class('fb_custom_list_type');
if($id){
	$list_type->find($id);	
}
$list_type->update_attributes($_POST['mlist'],false);
if($_FILES['image_src']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		if(!$upload_name = $upload->handle('image_src','filter_pic')){
			alert('上传图片失败！');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		};		
		$list_type->image_src = '/upload/news/' .$upload_name;		
	}
$list_type->save();

function get_add_column_name(){
	global $table;
	global $column_index;
	if(isset($column_index)){
		 $column_index++;
		 return "field_{$column_index}";
	}
	if (empty($table)) {
		$column_index = 1;
		return "field_1";
	};
	$fields = array_keys($table->fields);
	$last_field = $table->fields[array_pop($fields)];
	$index = strrpos($last_field->name,'_');
	$index = substr($last_field->name,$index+1);
	$column_index = intval($index)+1;
	return "field_{$column_index}";
};

//update
if($id){
	$table = new table_class($list_type->table_name,true);
	$sql = "alter table `{$list_type->table_name}`";
	$array = array();
	$changed_index = array();
	foreach ($_POST['list'] as $k => $v){
		if(array_key_exists($k,$table->fields)){
			//field exists.so update
			if($table->fields[$k]->key != $v['key']){
				$changed_index[$k] = $v['key'];
			}
			$changed = false;
			foreach ($v as $key => $value){
				if($table->fields[$k]->$key != $value && $key != 'key'){
					$changed = true;
					break;
				}
			}
			if($changed){
				$array[]="modify column `{$k}` {$v['type']} comment '{$v['comment']}'";
			}
		}		
	}
	
	//add columns
	if(!empty($_POST['new_columns'])){
		foreach ($_POST['new_columns'] as $columns) {
			$field_name = get_add_column_name();
			$array[]="ADD COLUMN `{$field_name}` {$columns[type]}  COMMENT '{$columns[comment]}'";
		}
	}
	
	//drop columns
	
	if(!empty($_POST['del_columns'])){
		foreach ($_POST['del_columns'] as $v) {
			$array[]="DROP COLUMN `{$v}`";
		}
	}
	
	//handle column index
	if(!empty($changed_index)){
		$db = get_db();
		$db->query("show index from {$list_type->table_name}");
		$indexs = array();
		if($db->move_first()){
			do{
				$name = $db->field_by_name('Column_name');
				$indexs[$name][key_name] = $db->field_by_name('Key_name');
				$indexs[$name][unique] = $db->field_by_name('Non_unique') ? 0 : 1; 
			}while($db->move_next());
		}
		
		foreach ($changed_index as $k => $v) {
			if(array_key_exists($k,$indexs)){
				//alter exists index
				//drop index first
				$array[] = "drop index {$indexs[$k][key_name]}";
				switch ($v) {
					case "MUL":
					$array[] = "add index `{$indexs[$k][key_name]}` (`{$k}`)";
					break;
					case "UNI":
					$array[] = "add unique index `{$indexs[$k][key_name]}` (`{$k}`)";
					break;
					default:
						;
					break;
				}
			}else{
				//add new index
				switch ($v) {
					case "MUL":
					$array[] = "add index `index_{$k}` (`{$k}`)";
					break;
					case "UNI":
					$array[] = "add unique index `index_{$k}` (`{$k}`)";
					break;
					default:
						;
					break;
				}
			};
		}
	};
	
	if(!empty($array)){
		$str = implode(', ',$array);
		$sql .= " {$str}";
		$db = get_db();
		$db->execute($sql);
	};

}else{
	$list_type->table_name = "fb_custom_list_table_{$list_type->id}";
	$list_type->save();
	$sql = "create table `{$list_type->table_name}` (`id` integer unsigned not null auto_increment,";
	$array = array();
	//create new table
	if(!empty($_POST['new_columns'])){
		foreach ($_POST['new_columns'] as $columns) {
			$field_name = get_add_column_name();
			$array[]="`{$field_name}` {$columns[type]}  COMMENT '{$columns[comment]}'";
			if($columns[key]){
				switch ($columns[key]) {
					case "MUL":
					$array[] = "index `index_{$field_name}` (`{$field_name}`)";
					break;
					case "UNI":
					$array[] = "unique index `index_{$field_name}` (`{$field_name}`)";
					break;
					default:
						;
					break;
				}
			}
		}
		$array[] = "primary key(`id`)";
		$str = implode(', ',$array);
		$sql .= " {$str})engine=InnoDB";
		$db = get_db();
		$db->execute($sql);
	}
}

redirect("custom_list_item_list.php?id={$list_type->id}");