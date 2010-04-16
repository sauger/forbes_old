<?php
require_once(dirname(__FILE__) ."/table_class.php");
require_once(dirname(__FILE__) ."/image_handler_class.php");

class table_images_class extends table_class
{
	private $thumb_names = array();
	function __construct(){
		parent::__construct(get_config('tb_images'));
	}
    
	public function find(){
		$argsnum = func_num_args();
		switch ($argsnum) {
			case 0:
				$result = parent::find();
				break;
			case 1:
				$p1 = func_get_arg(0);
				$result = parent::find($p1);
				break;	
			case 2:
				$p1 = func_get_arg(0);
				$p2 = func_get_arg(1);
				$result = parent::find($p1,$p2);
				break;					
			default:
				;
			break;
		}
		if(is_array($result)){
			foreach ($result as $v) {
				$v->thumb_names = explode('|', $v->thumb_name);
			}
		}else if(is_object($result)){
			$result->thumb_names = explode('|', $result->thumb_name);
		}
		
		return $result;
	}
	

	public function paginate($param = 'all',$option = null, $page_count = 10,$page_var='page'){
		$this->thumb_names = explode('|', $this->thumb_name);
		$result = parent::paginate($param,$option,$page_count,$page_var);
		if(is_array($result)){
			foreach ($result as $v) {
				$v->thumb_names = explode('|', $v->thumb_name);
			}
		}else if(is_object($result)){
			$result->thumb_names = explode('|', $result->thumb_name);
		}
		
		return $result;
	}
	
	public function create_thumb($name,$width,$height=null){

		$handler = new image_handler_class();
		$handler->load(ROOT_DIR_NONE . $this->src);		
		$thum_name = ROOT_DIR_NONE .$this->_thumb_name($this->src, $name);	
		$handler->resize_image($thum_name,$width,$height);
		if(in_array($name,$this->thumb_names) ===false){
			$this->thumb_names[] = $name;
		}

	}
	
	public function save(){
		if(implode('|',$this->thumb_names) != $this->thumb_name){
			$this->thumb_name = implode('|',$this->thumb_names);
		}
		return parent::save();
	}
	
	public function src_path($thumb_name=null){
		if($thumb_name){
			if(in_array($thumb_name,$this->thumb_names)){
				return($this->_thumb_name($this->src, $thumb_name));
			}			
		}
		return $this->src;

	}
	
	public function __get($var){
		if(in_array($var, $this->thumb_names)){
			return $this->_thumb_name($this->src, $var);
			}else{
			return parent::__get($var);
		}
	}
	
	private function _thumb_name($src,$name){
		$pic_name = pathinfo($src);
		$pic_name['basename'] .= "_" .$name;
		return str_replace("." .$pic_name['exetension'],"_" .$name . "." .$pic_name['exetension'],$src);					
	}
		
}

?>