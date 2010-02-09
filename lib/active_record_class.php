<?php
/*            created by sauger at 20090213

*/

require_once(dirname(__FILE__).'/database_connection_class.php');
class ActiveRecord{
	private $_tablename = "";
	private $fields_type = array();
	private $fields_name = array();
	private $fields_default = array();
	private $fields = array();
	private $belongs_to_objects = array();
	private $has_many_objects = array();
	private $has_many_objects_items = array();
	private $is_edited = true;
	function __construct(){
		$this->_tablename = strtolower(get_class($this));
		$db = get_db();
		if ($db->query("show fields from " .$this->_tablename) === false) {
			return ;
		}
		if (!$db->move_first()) return;
		do {
			$name = $db->field_by_index(0);
			$type = $db->field_by_index(1);
			$default = $db->field_by_name('Default');
			$this->fields_type[$name] = $type;
			$this->fields[$name] = $default;
			$this->fields_default[$name] = $default;
		}while ($db->move_next());

		//$this->_set_fields_default();
		if (func_num_args() <= 0) {
			return ;
		}
		$arg = func_get_arg(0);
		if (is_array($arg)){
			foreach ($arg as $k => $v){
				if (array_key_exists($k,$this->fields)) {
					$this->fields[$k] = $v;
				}
			}
		}
	}

	public function find($param = 'all'){
		$this->is_edited = false;
		if (is_string($param)) {
			$param = strtolower($param);
		}
		$limit = -1;
		$argsnum = func_num_args();
		$sqlstr = "select * from " . $this->_tablename . " where 1=1 ";
		if (intval($param) > 0) {
			$sqlstr .= " and id=" .$param;
			$limit = 1;
		}
		if ($param == 'first' || is_int($param)) {
			$limit = 1;
		}

		if ($argsnum >= 2) {
			$arg = func_get_arg(1);
			if (!is_array($arg)) return ;
			if (!empty($arg["conditions"])) {
				$sqlstr .= " and " .$arg["conditions"];
			}			
			$limit = (intval($arg["limit"]) > 0) ? $arg["limit"] : $limit;
			if(!empty($arg["order"])) $sqlstr .= " order by " .$arg["order"];
		}

		if ($limit > 0) {
			$sqlstr .= " limit " .$limit;
		}

		$db = get_object('db');
		if (!$db->query($sqlstr)) return  null;
		if($limit == 1){
			if ($db->record_count <= 0) return null;
			$result = clone $this;
			foreach ($this->fields as $k => $v){
				$result->fields[$k] = $db->field_by_name($k);
				$this->fields[$k] = $db->field_by_name($k);
			}
			return $result;
		}else {
			$result = array();
			if($db->record_count <= 0) return $result;
			do {
				$tmp = clone $this;
				foreach ($this->fields as $k => $v){
					$tmp->fields[$k] = $db->field_by_name($k);
				}
				$result[] = $tmp;
			}while ($db->move_next());
			return $result;

		}
	}

	public function save(){

		if(empty($this->fields['id'])){
			//save net object
			$this->_save_new();
		}else {
			$this->_update();
		}
	}

	public function update_attributes($attributes = null){
		if (is_array($attributes)) {
			foreach ($attributes as $k => $v) {
				if (array_key_exists($k,$this->fields)) {
					if ($v == "" && strpos($this->fields_type[$k],'int') !== false) {
						continue;
					}
					$this->fields[$k] = $v;
				}
			}
		}
		return $this->save();
	}

	#belongs_to relationship
	public function belongs_to($parent,$options=null){
		if (!array_key_exists("key",$options)) {
			$options["key"] = strtolower($parent) ."_id";
		}
		if (!array_key_exists("class_name",$options)) {
			$options["class_name"] = $parent;
		}
		if (!class_exists($options["class_name"])) {
			debug_info($options["class_name"] ." not exists!");
			return ;
		}
		$this->belongs_to_objects[$parent] = $options;
	}

	public function has_many($object,$options = null){
		require_once(dirname(__FILE__).'/has_many_object_class.php');
		$this->has_many_objects[$object] = new has_many_item($this,$object,$options);
	}

	private function _save_new(){
		$sqlstr = "insert into " .$this->_tablename ."(";
		$first = true;
		$sqltail ="";
		foreach ($this->fields as $k => $v){
			if(strtolower($k) == 'id') continue;
			if ($first) {
				$sqlstr .= $k;
				if (is_null($v)) {
					$sqltail .="(NULL)";
				}else {
					$sqltail .= "'" .$v ."'";
				}

				unset($first);
			}else {
				$sqlstr .= "," .$k;
				if (is_null($v)) {
					$sqltail .=",(NULL)";
				}else {
					$sqltail .= ",'" .$v ."'";
				}
			}
		}
		$sqlstr .= ") values (" .$sqltail .")";
		//debug_info($sqlstr);
		$db = get_db();
		$result = $db->execute($sqlstr);
		if($result)	{$this->id = $db->last_insert_id;}
		return $result;
	}

	private function _update(){
		if (intval($this->fields['id']) <= 0){
			debug_info("invalid id!");
			return false;
		}
		$sqlstr = "update " .$this->_tablename ." set ";
		$first = true;
		foreach ($this->fields as $k => $v){
			if(strtolower($k) == 'id') continue;
			if ($first) {
				if (is_null($v)) {
					$sqlstr .= $k . "=NULL";
				}else {
					$sqlstr .= $k . "='" .$v ."'";
				}

				unset($first);
			}else {
				if (is_null($v)) {
					$sqlstr .= "," .$k . "=NULL";
				}else {
					$sqlstr .= "," .$k . "='" .$v ."'";
				}
			}
		}
		$sqlstr .= " where id=" .$this->fields['id'];
		$db = get_db();
		$result = $db->execute($sqlstr);
		$result = $result and  $result and $this->_save_belongs_to();
		return  $result and $this->_save_has_many();
	}

	private function _set_fields_default(){
		foreach ($this->fields_name as $v){
			$this->$v = $this->fields_default[$v];
		}
	}

	protected function __clone(){
		$this->_set_fields_default();
	}

	protected function __get($var){
		if (array_key_exists($var,$this->fields)) {
			return  $this->fields[$var];
		}elseif (array_key_exists($var, $this->belongs_to_objects)){

			if (array_key_exists("value", $this->belongs_to_objects[$var])) {
				return  $this->belongs_to_objects[$var]["value"];
			}
			$p = new  $this->belongs_to_objects[$var]["class_name"];
			$this->belongs_to_objects[$var]["value"] = $p->find($this->fields[$this->belongs_to_objects[$var]["key"]]);
			unset($p);
			return $this->belongs_to_objects[$var]["value"];
		}elseif (array_key_exists($var,$this->has_many_objects_items)){
			#get the exists has many items
			return $this->has_many_objects_items[$var];
		}elseif (array_key_exists($var,$this->has_many_objects)){
			return $this->has_many_objects[$var];
		}
	}

	protected function __set($key, $value){
		if (array_key_exists($key,$this->fields)) {
			$this->fields[$key] = $value;
			$this->is_edited = true;
		}else if(array_key_exists($key,$this->belongs_to_objects)){
			$this->belongs_to_objects[$key]["value"] = $value;
			$this->fields[$this->belongs_to_objects[$key]["key"]] = $value->id;
		}
	}

	protected function _save_belongs_to(){
		$result = true;
		foreach ($this->belongs_to_objects as $item){
			if (!empty($item["value"]) && $item["value"]->is_edited) {
				$result = $result and $item["value"]->save();
			}
		}
		return $result;
	}
	
	protected function _save_has_many(){
		$result = true;
		foreach ($this->has_many_objects as $item){
			$result = $result and $item->save();
		}
		return $result;
	}

	function __call($function_name, $arg){
		$function_name = strtolower($function_name);
		if (strpos($function_name,'find_by_')==0) {
			$fieldname = str_replace('find_by_','', $function_name);
			if (array_key_exists($fieldname,$this->fields)) {
				if (count($arg) >=2) {
					if (array_key_exists('conditions',$arg[1])) {
						$arg[1]["conditions"] .= " and " .$fieldname ."='" .$arg[0] ."'";
					}else {
						$arg[1]["conditions"] = $fieldname ."='" .$arg[0] ."'";
					}
				}else {
					$arg[1]["conditions"] = $fieldname ."='" .$arg[0] ."'";
				}
				return $this->find('all',$arg[1]);

			}
		}else {
			debug_info(lang_string('I_FUNCTION','function') .$function_name .lang_string('E_NOT_EISTS','not exists!'));
		}

	}

}

?>