<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
</head>
<?php
    require_once('../../frame.php');
	require_once('../../inc/reader.php');
	
	$db= get_db();
	
	$upload = new upload_file_class();
	$upload->save_dir = "/upload/xls/";
	$xls = $upload->handle('xls');
	$file = ROOT_DIR.'upload/xls/'.$xls;
	
	$data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('utf-8');
    $data->read($file);
	
	$success = 0;
	$fail = 0;
	$company = new table_class('fb_rich');
	$fail_info = array();
	for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
		$name = $data->sheets[0]['cells'][$i][$_POST['name']];		
		$items = $company->find('first',array('conditions' => "name='{$data->sheets[0]['cells'][$i][$_POST['name']]}'"));
		foreach($_POST as $k => $v){
			$company->$k = $data->sheets[0]['cells'][$i][$v];
		}
		
		$company->birthday = $_POST['year']-$data->sheets[0]['cells'][$i][$_POST['birthday']];
		if($company->gender == '女'){
			$company->gender = '0';
		}else{
			$company->gender = 1;
		}
		
		if($company->save()){
			$success++;
		}else{
			$fail++;
			$str = "";
			foreach($company->fields as $key => $val){
				$str .= $val->value ." ";
			}
			array_push($fail_info,$str);
		}
	}
	/*
	$table_fields = $db->query("show full fields FROM fb_rich");
	for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
		$name = array();
		$value = array();
		$set = array();
		$full_set = array();
		for($j=1;$j<count($table_fields);$j++){
			if($_POST[$table_fields[$j]->Field]!=''&&$table_fields[$j]->Field!='birthday'){
				array_push($name,$table_fields[$j]->Field);
				array_push($value,"'{$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]]}'");
				if($table_fields[$j]->Key!='UNI'){
					array_push($set,"{$table_fields[$j]->Field}='{$data->sheets[0]['cells'][$i][$_POST[$table_fields[$j]->Field]]}'");
				}
			}
			elseif($_POST['birthday']!=''&&$table_fields[$j]->Field=='birthday'){
				array_push($name,'birthday');
				$birthday = $_POST['year']-$data->sheets[0]['cells'][$i][$_POST['birthday']];
				array_push($value,"'{$birthday}'");
				if($table_fields[$j]->Key!='UNI'){
					array_push($set,"birthday='{$birthday}'");
				}
			}
		}
		$name = implode(",", $name);
		$value = implode(",", $value);
		if(!empty($set)){
			$set = implode(" , ", $set);
			$sql = "insert into fb_rich ({$name}) values ({$value}) ON DUPLICATE KEY update {$set}";
		}else{
			$sql = "insert into fb_rich ({$name}) values ({$value})";
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
	*/	
	$count = $data->sheets[0]['numRows']-1;
	echo "共处理XLS数据{$count}条<br/>";
	echo "成功{$success}条<br/>";
	echo "失败{$fail}条<br/>";
	for($i=0;$i<$fail;$i++){
		echo $fail_info[$i].'<br/>';
	}
	unlink($file);	
?>
<a href="list.php">返回</a>
</html>