<?php

class database_row_item_class {
	private $_db;
	private $aresult = array();
	private $change_fields = array();
	function __construct(&$db=null) {
		$this->_db = $db;	
		#$this->aresult = array('b' => '');
	}
	function load_from_dataset() {
		if(!is_object($this->_db)) return false;
		$this->aresult = $this->_db->_aresult;
	}
	function update_to_db($table_name, $key='id', $force=false) {
		if(!is_object($this->_db) || $this->_db->connected == false) return false;
		if(array_key_exists($key, $this->aresult)===false){
			return false;
		}
		$sql = "update $table_name set ";
		$pre = "";
		if($force){
			foreach ($this->aresult as $k => $v) {
				if($k == $key){
					continue;
				};
				$sql .= $pre .$k ."='" .$v ."'";
				$pre = ",";
			}
			
		}else{
			foreach ($this->change_fields as $k) {
				$sql .= $pre .$k ."='" .$this->aresult[$k] ."'";
				$pre = ",";
			}
		}
		$sql .= " where " .$key  ."='" .$this->aresult[$key];
		return $this->_db->execute($sql);
	}
	
	function field_by_index($index) {
		return $this->aresult[$index];
	}
	
	function __get($var) {
		$var = strtolower($var);
		if(array_key_exists($var, $this->aresult)){
			return $this->aresult[$var];
		}else{
			return null;
		}
	}
	
	function __set($var,$value) {
		if(array_key_exists($var, $this->aresult)){
			$this->aresult[$var] = $value;
			if(!in_array($var, $this->change_fields)){
				$this->change_fields[] = $var;	
			}			
		}else{
			return null;
		};
	}
	function reset_var() {
		$this->aresult = array();
		$this->change_fields = array();
	}
}

?>