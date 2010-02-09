<?php
############################################################################
#             created by sauger at 20090217								   #
############################################################################
class belongs_to_object_class{
	private $class_name = null;
	private $key = null;
	private $name = null;
	private $item = null;
	private $_parent = null;
	public $is_loaded = false;
	function __construct(&$parent, $name,$options=null){		
		if (!array_key_exists("class_name",$options)) {
			$options["class_name"] = $name;
		}
		if (!array_key_exists("key",$options)) {
			$options["key"] =strtolower($parent->class_name) ."_id";
		}
		$this->class_name = $options["class_name"];
		$this->key = $options["key"];
		$this->name = $name;
		$this->item = new table_class($this->class_name);
		$this->_parent = &$parent;
	}
	
	public function & find(){
		$this->is_loaded = false;
		$num = func_num_args();
		$key = $this->key;
		switch ($num) {
			case 0:
				$p1 = 'first';
				$param["conditions"] =  " id='" .$this->_parent->$key ."'";
				break;
			case 1:
				$p1 = func_get_arg(0);
				$param["conditions"] = " id='" .$this->_parent->$key ."'";
				break;
			default:
				$p1 = func_get_arg(0);
				$param = func_get_arg(1);
				if (array_key_exists("conditions", $param)){
					$param["conditions"] = $param["conditions"] . " and " ." id='" .$this->_parent->$key ."'";
				}else{
					$param["conditions"] = " id='" .$this->_parent->$key ."'";
				}
			break;
		}				
		$this->item->find($p1, $param);
		$this->is_loaded = true;
		return $this->item;
	}
	
	public function save(){
		$this->item->save();
	}
	
	private function __get($var){
		return $this->item->$var;
	}
	private function __set($var, $value){
		$this->item->$var = $value;
	}
	
}
	?>