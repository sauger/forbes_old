<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
</head>
<?php
    require_once('../../frame.php');
	require_once('reader.php');
	$db = get_db();
	
	$id = intval($_POST['list_id']);
	$table = $db->query("select * from fb_custom_list_type where id=$id");
	if($db->record_count==1){
		$table_name = $table[0]->table_name;
	}else{
		alert("error id");
		die();
	}
	
	
	
	$upload = new upload_file_class();
	$upload->save_dir = "/upload/xls/";
	$xls = $upload->handle('xls');
	$file = ROOT_DIR.'upload/xls/'.$xls;
	
	$data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('utf-8');
    $data->read($file);
	
	var_dump($data->sheets);
	die();
	
	$success = 0;
	$fail = 0;
	$fail_info = array();
	if($table_name=='fb_rich_list_items'||$table_name=='fb_famous_list_items'){
		if($table_name=='fb_rich_list_items'){
			$list_name = "fb_fh";
			$item_name = "rich_id";
			$index = 7;
		}else{
			$list_name = "fb_mr";
			$item_name = "famous_id";
			$index = 1;
		}
		$fail_id = 0;
		$fail_id_info = array();
		$table_fields = $db->query("show full fields FROM $table_name where Comment not like '%id%'");
		for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			$name = array();
			$value = array();
			$set = array();
			$full_set = array();
			for($j=1;$j<count($table_fields);$j++){
				if($_POST[$table_fields[$j]->Field]!=''){
					array_push($name,$table_fields[$j]->Field);
					array_push($value,"'{$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]]}'");
					if($table_fields[$j]->Key!='UNI'){
						array_push($set,"{$table_fields[$j]->Field}='{$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]]}'");
					}
				}
			}
			$name = implode(",", $name);
			$value = implode(",", $value);
			$name .= ",list_id";
			$value .= ",".$id;
			
			$pos_name = $data->sheets[0]['cells'][$i][$_POST[$table_fields[$index]->Field]];
			$pos_id = $db->query("select id from $list_name where name='$pos_name'");
			if($db->record_count==1){
				$name .= ",".$item_name;
				$value .= ",".$pos_id[0]->id;
			}else{
				$str = $data->sheets[0]['cells'][$i][$_POST[$table_fields[1]->Field]];
				for($j=2;$j<count($table_fields);$j++){
					$str .=",".$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]];
				}
				array_push($fail_id_info,$str);
				$fail_id++;
			}
			
			if(!empty($set)){
				$set = implode(" , ", $set);
				$sql = "insert into {$table_name} ({$name}) values ({$value}) ON DUPLICATE KEY update {$set}";
			}else{
				$sql = "insert into {$table_name} ({$name}) values ({$value})";
			}
			if($db->execute($sql)){
				$success++;
			}else{
				$str = $data->sheets[0]['cells'][$i][$_POST[$table_fields[1]->Field]];
				for($j=2;$j<count($table_fields);$j++){
					$str .=",".$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]];
				}
				array_push($fail_info,$str);
				$fail++;
			}
		}
	}else{
		$table_fields = $db->query("show full fields FROM $table_name");
		for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			$name = array();
			$value = array();
			$set = array();
			$full_set = array();
			for($j=1;$j<count($table_fields);$j++){
				if($_POST[$table_fields[$j]->Field]!=''){
					array_push($name,$table_fields[$j]->Field);
					array_push($value,"'{$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]]}'");
					if($table_fields[$j]->Key!='UNI'){
						array_push($set,"{$table_fields[$j]->Field}='{$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]]}'");
					}
				}
			}
			$name = implode(",", $name);
			$value = implode(",", $value);
			if(!empty($set)){
				$set = implode(" , ", $set);
				$sql = "insert into {$table_name} ({$name}) values ({$value}) ON DUPLICATE KEY update {$set}";
			}else{
				$sql = "insert into {$table_name} ({$name}) values ({$value})";
			}
			if($db->execute($sql)){
				$success++;
			}else{
				$str = $data->sheets[0]['cells'][$i][$_POST[$table_fields[1]->Field]];
				for($j=2;$j<count($table_fields);$j++){
					$str .=",".$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]];
				}
				array_push($fail_info,$str);
				$fail++;
			}
		}
	}
	
	
	
	$count = $data->sheets[0]['numRows']-1;
	echo "共处理XLS数据{$count}条<br/>";
	echo "成功{$success}条<br/>";
	echo "失败{$fail}条<br/>";
	for($i=0;$i<$fail;$i++){
		echo $fail_info[$i].'<br/>';
	}
	if($table_name=='fb_rich_list_items'||$table_name=='fb_famous_list_items'){
		if($fail_id>0){
			echo "有{$fail_id}条数据未找到姓名对应ID<br/>";
			for($i=0;$i<$fail_id;$i++){
				echo $fail_id_info[$i].'<br/>';
			}
		}
	}
	unlink($file);
	//alert("数据导入成功");
	//redirect("/admin/data_upload/",'js');
?>
<a href="index.php">返回</a>
</html>
