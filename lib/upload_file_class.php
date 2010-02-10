<?php

$filter_pic = array('jpg','png','bmp','gif','icon');
$filter_video = array('flv','wmv','wav','mp3','mp4','avi','rm','wma');

class upload_file_class
{
	var $save_dir;
	var $save_type=1;
	var $file_count = 0;
	var $field_name = '';
	var $max_file_size=0;
	function handle($field_name='file',$filter = '') {
		if($_SERVER['REQUEST_METHOD'] != 'POST') return;
		$field_name  = empty($field_name) ? $this->field_name : $field_name;
		if($this->save_dir{0} == '/'){
			$this->save_dir = ROOT_DIR_NONE . $this->save_dir;
		}
		if(is_dir($this->save_dir)===false){
			mkdir($this->save_dir);
		}
		if(!array_key_exists($field_name, $_FILES)){
			if(function_exists(debug_info)){
				debug_info('fail to handle upload file');
			}
			return false;
		}
		$this->file_count = count($_FILES[$field_name]['name']);
		if(!is_array($_FILES[$field_name]['name'])){
			//only upload one file
			
			if($_FILES[$field_name]['error'] != UPLOAD_ERR_OK){
				alert('fail to upload file!' .$_FILES[$field_name]['error'] );
				return false;
			}
			if($_FILES[$field_name]['size']>$this->max_file_size & $this->max_file_size > 0){
				alert('fail to upload file!out of max size range');
				return false;
			}			
			$path_info = pathinfo($_FILES[$field_name]['name']);
			$extension = $path_info['extension'];
			if(!empty($filter)){
				global $$filter;
				if(!in_array(strtolower($extension),$$filter)){
					debug_info('unknow file type');
					return false;
				}
			}
			$ret = rand_str() .'.'.$extension;
			$save_name = $this->save_dir . $ret;
			$tmp_name = $_FILES[$field_name]['tmp_name'];
			if(move_uploaded_file($tmp_name,$save_name)){
				return $ret;
			}else{
				debug_info('上传失败','js');
				return false;
			}
			
		}else{
			$result = array();
			foreach ($_FILES[$field_name]['error'] as $k => $v) {
				if($v != UPLOAD_ERR_OK){
					$result[] = array('result' => false, 'name' => '','reason' => $v);
					continue;
				}else{
					if($_FILES[$field_name]['size'][$k]>$this->max_file_size & $this->max_file_size > 0){
						$result[] = array('result' => false, 'name' => '', 'reason' => 'out of max size range');
						continue;
					}			
					$path_info = pathinfo($_FILES[$field_name]['name'][$k]);
					$extension = $path_info['extension'];
					if(!empty($filter)){
						global $$filter;
						if(!in_array(strtolower($extension),$$filter)){
							debug_info('unknow file type');
							return false;
						}
					}
					$ret = rand_str() .'.'.$extension;
					$save_name = $this->save_dir . $ret;
					$tmp_name = $_FILES[$field_name]['tmp_name'][$k];
					if(move_uploaded_file($tmp_name,$save_name)){
						$result[] = array('result' => true, 'name' => $ret, 'reason' => 'success');
					}else{
						$result[] = array('result' => false, 'name' => '', 'reason' => 'fail to move_uploaded_file');
					}
				}
			}
			return $result;
		}
	}
}

?>