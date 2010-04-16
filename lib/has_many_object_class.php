<?php
############################################################################
#             created by sauger at 20090217								   #
############################################################################
class has_many_item{
	private $class_name = null;
	private $key = null;
	private $name = null;
	private $item = null;
	private $items = array();
	private $parent = null;
	
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
		$this->parent = &$parent;
	}
	
	public function & find(){
		$num = func_num_args();
		switch ($num) {
			case 0:
				$p1 = 'all';
				$param["conditions"] = $this->key . "='" .$this->parent->id ."'";
				break;
			case 1:
				$p1 = func_get_arg(0);
				$param["conditions"] = $this->key . "='" .$this->parent->id ."'";
				break;
			case 2:
				$p1 = func_get_arg(0);
				$param = func_get_arg(1);
				if (array_key_exists("conditions", $param)){
					$param["conditions"] = $param["conditions"] . " and " .$this->key . "='" .$this->parent->id ."'";
				}else{
					$param["conditions"] = $this->key . "='" .$this->parent->id ."'";
				}
			default:
				;
			break;
		}				
		$this->items = $this->item->find($p1, $param);
		return $this->items;
	}
	
	public function save(){
		$result = true;
		if (is_array($this->items)) {
			foreach ($this->items as $item){
				if (!empty($item) && $item->is_edited) {
					$result = $result and $item->save();
				}
			}
		}elseif (is_object($this->items)){
			$result = $this->items->save();
		}
		
		return $result;
	}
}
?>