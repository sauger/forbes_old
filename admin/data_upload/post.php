<?php
    require_once('../../frame.php');
	require_once('reader.php');
	$db = get_db();
	
	$upload = new upload_file_class();
	$upload->save_dir = "/upload/xls/";
	$xls = $upload->handle('xls');
	$file = ROOT_DIR.'upload/xls/'.$xls;
	echo $file;
	
	$data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('utf-8');
    $data->read($file);
	if($_POST['table']=='rich_list'){
		for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			$name = array();
			$value = array();
			$set = array();
			if($_POST['fh_id']!=''){
				$f_id = $data->sheets[0]['numRows'][$i][$_POST['fh_id']];
				$db->query("select id from fb_fh where name='{$data->sheets[0]['cells'][$i][$_POST['fh_id']]}'");
				if($db->move_first()){
					array_push($name,"fh_id");
					array_push($value,$db->field_by_index(0));
					array_push($set,"fh_id={$db->field_by_index(0)}");
					if($_POST['pm']!=''){
						array_push($name,"pm");
						array_push($value,$data->sheets[0]['cells'][$i][$_POST['pm']]);
						array_push($set,"pm={$data->sheets[0]['cells'][$i][$_POST['pm']]}");
					}
					if($_POST['sr']!=''){
						array_push($name,"sr");
						array_push($value,$data->sheets[0]['cells'][$i][$_POST['sr']]);
						array_push($set,"sr={$data->sheets[0]['cells'][$i][$_POST['sr']]}");
					}
					if($_POST['sbly']!=''){
						array_push($name,"sbly");
						array_push($value,$data->sheets[0]['cells'][$i][$_POST['sbly']]);
						array_push($set,"sbly={$data->sheets[0]['cells'][$i][$_POST['sbly']]}");
					}
					array_push($name,"bd_id");
					array_push($value,$_POST['list_id']);
					array_push($set,"bd_id={$_POST['list_id']}");
					$name = implode(",", $name);
					$value = implode(",", $value);
					$set = implode(" and ", $set);
					if($set==''){
						$db->execute("insert into fb_fhbd ({$name}) values ({$value})");
					}else{
						$db->execute("insert into fb_fhbd ({$name}) values ({$value}) ON DUPLICATE KEY update {$set}");
					}
				}
			}
		}
	}elseif($_POST['table']=='famous_list'){
		for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			$name = array();
			$value = array();
			$set = array();
			if($_POST['fh_id']!=''){
				$f_id = $data->sheets[0]['numRows'][$i][$_POST['fh_id']];
				$db->query("select id from fb_mr where name='{$data->sheets[0]['cells'][$i][$_POST['fh_id']]}'");
				if($db->move_first()){
					array_push($name,"mr_id");
					array_push($value,$db->field_by_index(0));
					array_push($set,"mr_id={$db->field_by_index(0)}");
					if($_POST['pm']!=''){
						array_push($name,"pm");
						array_push($value,$data->sheets[0]['cells'][$i][$_POST['pm']]);
						array_push($set,"pm={$data->sheets[0]['cells'][$i][$_POST['pm']]}");
					}
					if($_POST['sr']!=''){
						array_push($name,"sr");
						array_push($value,$data->sheets[0]['cells'][$i][$_POST['sr']]);
						array_push($set,"sr={$data->sheets[0]['cells'][$i][$_POST['sr']]}");
					}
					if($_POST['bgl']!=''){
						array_push($name,"bgl");
						array_push($value,$data->sheets[0]['cells'][$i][$_POST['bgl']]);
						array_push($set,"sbly={$data->sheets[0]['cells'][$i][$_POST['bgl']]}");
					}
					if($_POST['sbly']!=''){
						array_push($name,"sbly");
						array_push($value,$data->sheets[0]['cells'][$i][$_POST['sbly']]);
						array_push($set,"sbly={$data->sheets[0]['cells'][$i][$_POST['sbly']]}");
					}
					array_push($name,"bd_id");
					array_push($value,$_POST['list_id']);
					array_push($set,"bd_id={$_POST['list_id']}");
					$name = implode(",", $name);
					$value = implode(",", $value);
					$set = implode(" and ", $set);
					if($set==''){
						$db->execute("insert into fb_mrbd ({$name}) values ({$value}) ON DUPLICATE KEY");
					}else{
						$db->execute("insert into fb_mrbd ({$name}) values ({$value}) ON DUPLICATE KEY update {$set}");
					}
				}
			}
		}
		$sql = "select id from fb_mrbd where bd_id={$_POST['list_id']} order by sr desc";
		$record = $db->query($sql);
		for($i=0;$i<count($record);$i++){
			$db->execute("update fb_mrbd set sr_pm=".($i+1)." where id=".$record[$i]->id);
		}
		$sql = "select id from fb_mrbd where bd_id={$_POST['list_id']} order by bgl";
		$record = $db->query($sql);
		for($i=0;$i<count($record);$i++){
			$db->execute("update fb_mrbd set bgl_pm=".($i+1)." where id=".$record[$i]->id);
		}
	}else{
		$table_fields = $db->query("show full fields FROM ".$_POST['table']);
		for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			$name = array();
			$value = array();
			$set = array();
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
			$set = implode(" and ", $set);
			if($set==''){
				$db->execute("insert into {$_POST['table']} ({$name}) values ({$value})");
			}else{
				$db->execute("insert into {$_POST['table']} ({$name}) values ({$value}) ON DUPLICATE KEY update {$set}");
			}
			
		}
		
	}
	unlink($file);
	
?>