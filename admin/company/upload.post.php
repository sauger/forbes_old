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
	function conver_place($code){
		switch ($code){
			case '上海':
				return 'SS'; 
				break;
			case '深圳':
				return 'SZ'; 
				break;
			case '香港':
				return 'HK'; 
				break;
			case '新加坡':
				return 'SI'; 
				break;
			case '韩国':
				return 'KS'; 
				break;
			case '法国':
				return 'PA'; 
				break;
			case '英国':
				return 'L'; 
				break;
			case '德国':
				return 'DE'; 
				break;
			case '日本':
				return 'JP'; 
				break;
			default :
				return '';
		}
	}
	$success = 0;
	$fail = 0;
	for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
		$company = new table_class('fb_company');
		foreach($_POST as $k => $v){
			$company->$k = addslashes($data->sheets[0]['cells'][$i][$v]);
		}
		
		$company->stock_place_code = conver_place($company->stock_place_code);
		
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
		
	$count = $success + $fail;
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