<?php
/*            created by sauger at 20090213

*/
require_once(dirname(__FILE__) .'/belongs_to_object_class.php');

class table_field_class{
	public $name;
	public $type;
	public $short_type;
	public $type_length;
	public $key;
	public $comment;
	public $null;
	public $default;
	public $extra;
	public $value;
}

class table_class{
	private $_tablename = "";
	public $fields = array();
	private $changed_fields = array();
	private $has_many_objects = array();
	private $has_many_objects_items = array();
	private $is_edited = true;
	private $belongs_to_object=null;
	private $belongs_to_name = null;
	private $is_loaded = false;
	private $db_type = 'mysql';
	private $map_file;
	function __construct($table_name,$loaddb=false){
		$this->_tablename = strtolower($table_name);
		$this->map_file = dirname(__FILE__). "/../data/dbcache/{$table_name}.tb";
		$this->db_type = get_config('db_type') == 'mssql' ? 'mssql' :'mysql';
		if($this->db_type == 'mssql'){
			$this->_load_table_struct_mssql();
		}else
		{
			if(get_config('debug_tag') || $loaddb){
				$this->_load_table_struct_mysql();
				$this->_save_table_struct_to_file();
			}else{
				$ret = $this->_load_table_struct_from_file();
				if($ret===false){
					$this->_load_table_struct_mysql();
					$this->_save_table_struct_to_file();
				}
			}
			
		}
		$this->_set_fields_default();
		if (func_num_args() <= 0) {
			return ;
		}
		$arg = func_get_arg(0);
		if (is_array($arg)){
			foreach ($arg as $k => $v){
				if (array_key_exists($k,$this->fields)) {
					$this->$k = $v;
				}
			}
		}
	}
	
	function _load_table_struct_from_file(){
		if (!file_exists($this->map_file)) return false;
		$data = file_get_contents($this->map_file);
		$this->fields = get_object_vars(json_decode($data));
	}
	
	function _save_table_struct_to_file(){
		$data = json_encode($this->fields);
		write_to_file($this->map_file,$data,'w');
	}
	
	function _get_mysql_short_type($type){
		if(strpos(strtolower($type),'int') === 0){
			return 'int';
		}
		if(strpos(strtolower($type),'varchar') === 0){
			return 'varchar';
		}
		if(strpos(strtolower($type),'float') === 0){
			return 'float';
		}
		if(strpos(strtolower($type),'char') === 0){
			return 'char';
		}
		if(strpos(strtolower($type),'text') === 0){
			return 'text';
		}
		return $type;
	}
	
	function _load_table_struct_mysql() {
		$db = get_db();
		$sql = "show full fields from " .$this->_tablename;
		if ($db->query($sql) === false) {
			return ;
		}
		if (!$db->move_first()) return;
		do {
			
			$name = $db->field_by_index(0);
			$this->fields[$name] = new table_field_class();						
			$this->fields[$name]->name = $name;
			$this->fields[$name]->type = $db->field_by_index(1);
			$this->fields[$name]->short_type = $this->_get_mysql_short_type($this->fields[$name]->type);
			$this->fields[$name]->key = $db->field_by_index(4);
			$this->fields[$name]->comment = $db->field_by_index(8);
			$this->fields[$name]->default = $db->field_by_index(5);
			$this->fields[$name]->null = $db->field_by_index(3);
			$this->fields[$name]->extra = $db->field_by_index(5);
			
		}while ($db->move_next());
	}
	
	function _load_table_struct_mssql()
	{
		$db = get_db();
		//$db->echo_sql = true;
		if ($db->query("select so.name as cname,st.name as tname,sm.text from syscolumns so LEFT OUTER  JOIN systypes st on so.type=st.type and so.usertype=st.usertype LEFT OUTER JOIN syscomments AS sm ON so.cdefault = sm.id where so.id=object_id('{$this->_tablename}')") === false) {
			return ;
		}		
		//var_dump($db);
		if (!$db->move_first()) return;
		do {
			$name = $db->field_by_name('cname');
			$type = $db->field_by_name('tname');
			$default = $db->field_by_name('text');
			$this->fields_type[$name] = $type;
			$this->fields[$name] = $default;
			$this->fields_default[$name] = $default;
		}while ($db->move_next());
	}
	
	public function find($param = 'all'){
		$this->is_edited = false;
		$this->changed_fields = array();
		if (is_string($param)) {
			$param = strtolower($param);
		}
		if((string)$param == 'all'){
			$type = 'all';
		}elseif ((string)$param == 'first'){
			$type = 'first';
		}elseif(intval($param) > 0){
			$param = intval($param);
			$type = 'id';
		}else{
			return false;
		}
		$limit = -1;
		$argsnum = func_num_args();
		$sqlstr = " * from " . $this->_tablename . " where 1=1 ";
		if ($type == 'id') {
			$sqlstr .= " and id=" .$param;
			$limit = 1;
		}
		if ($type == 'first') {
			$limit = 1;
		}
		if ($argsnum >= 2) {
			$arg = func_get_arg(1);
			if (!is_array($arg)) return ;
			if (!empty($arg["conditions"])) {
				$sqlstr .= " and " .$arg["conditions"];
			}			
			$limit = (intval($arg["limit"]) > 0) ? intval($arg["limit"]) : $limit;
			if(!empty($arg["order"])) $sqlstr .= " order by " .$arg["order"];
		}

		if ($limit > 0) {
			if($this->db_type == 'mssql')
			{
				$sqlstr = " top $limit " .$sqlstr;
			}
			else{
				$sqlstr = $sqlstr ." limit " .$limit;
			}
			
		}
		$sqlstr = 'select' . $sqlstr;
		$db = get_db();
		if($this->echo_sql){
			echo $sqlstr;
		};
		if (!$db->query($sqlstr)) return  false ;
		if($limit == 1){
			if ($db->record_count <= 0) return null;
			
			foreach ($this->fields as $k => $v){
				$v->value = $db->field_by_name($k);
			}
			$result = clone $this;
		}else {
			$result = array();
			if($db->record_count <= 0) return $result;
			do {
				$tmp = clone $this;
				foreach ($tmp->fields as $k => $v){
					$v->value = $db->field_by_name($k);
				}
				
				array_push($result,$tmp);
			}while ($db->move_next());
			$this->fields = $result[0]->fields;
		}
		return $result;
		
	}
	
	public function paginate($param = 'all',$option = null, $page_count = 10,$page_var='page'){
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

		if ($argsnum >= 2 || !empty($option)) {
			$arg = func_get_arg(1);
			#if (!is_array($arg)) return ;
			if (!empty($arg["conditions"])) {
				$sqlstr .= " and " .$arg["conditions"];
			}			
			$limit = (intval($arg["limit"]) > 0) ? $arg["limit"] : $limit;
			if(!empty($arg["order"])) $sqlstr .= " order by " .$arg["order"];
		}

		#if ($limit > 0) {
		#	$sqlstr .= " limit " .$limit;
		#}

		$db = get_db();
		$db->echo_sql =$this->echo_sql;

		$db_ret = $db->paginate($sqlstr,$page_count,$page_var);
		if (!$db_ret) return  null ;
		if($limit == 1){
			if ($db->record_count <= 0) return null;
			
			foreach ($this->fields as $k => $v){
				$v->value = $db_ret[0]->$k;
			}
			$result = clone $this;
		}else {
			$result = array();
			if($db->record_count <= 0) return $result;
			for($i=0; $i < $db->record_count; $i++){
				$tmp = clone $this;
				foreach ($tmp->fields as $k => $v){
					$v->value = $db_ret[$i]->$k;
				}
				$result[] = $tmp;
			}

		}
		return $result;

		#return $this->_find_by_sql($sqlstr,$limit);
	}

	public function save(){
		if(empty($this->fields['id']->value) || $this->fields['id']->value <= 0){
			//save net object
			return $this->_save_new();
		}else {
			return $this->_update();
		}
	}
	
	public function delete($id=''){
		$id = empty($id) ? $this->fields['id']->value : $id;
		if(empty($id)){
			debug_info('id is empty.fail to delete');
		}
		$db = get_db();
		return $db->execute('delete from ' .$this->_tablename .' where id=' . $id);
	}

	public function update_attributes($attributes = null,$auto_save = true){
		if (is_array($attributes)) {
			foreach ($attributes as $k => $v) {		
				if (array_key_exists($k,$this->fields)) {
					if ($v == "" && strpos($this->fields[$k]->type,'int') !== false) {
						continue;
					}
					$this->$k = $v;
				}
			}
		}
		if($auto_save){
			return $this->save();	
		}
	}
	
	public function update_file_attributes($name){
		if(!$_FILES[$name]['name']) return true;
		$default_filter = array('jpg','png','bmp','gif','icon','flv','wmv','wav','mp3','mp4','avi','rm','wma');
		$default_save_dir = '/upload';
		$default_limit = '0';
		global $msg_fail;
		global $msg_max_size;
		global $msg_error_type;
		if(!isset($msg_fail)) $msg_fail = 'fail to upload the file';
		if(!isset($msg_max_size)) $msg_max_size = 'fail to upload file!out of max size range';
		if(!isset($msg_error_type)) $msg_error_type = 'unknown file type!';
		foreach ($_FILES[$name]['name'] as $key => $val) {
			$filter = $key ."_filter";
			$save_dir = $key ."_save_dir";
			$limit = $key ."_limit";
			global $$filter;
			global $$save_dir;
			global $$limit;

			if(!isset($$filter)) $$filter = $default_filter;
			if(!isset($$save_dir)) $$save_dir = $default_save_dir;
			
			if($_FILES[$name]['error'][$key] != UPLOAD_ERR_OK){
				alert($msg_fail);
				return false;
			}
			if($_FILES[$name]['size'][$key] > $$limit & $this->max_file_size > 0){
				alert($msg_max_size);
				return false;
			}		
			$path_info = pathinfo($val);
			$extension = strtolower($path_info['extension']);
			if(!in_array($extension,$$filter)){
				alert($msg_error_type);
				return false;
			}
			$save_name = rand_str() .'.'.$extension;
			$save = ROOT_DIR_NONE .$$save_dir . '/'. $save_name;
			if(move_uploaded_file($_FILES[$name]['tmp_name'][$key],$save)){
				$this->$key = $$save_dir .'/' . $save_name;
				return true;
			}else{
				debug_info('fail to upload file:' .$val,'js');
				return false;
			}
		}
	}
	
	public function update_attribute($field, $value,$auto_save =true){
		$this->$field = $value;
		if($auto_save){
			return $this->save();	
		}
	}

	#belongs_to relationship
	public function belongs_to($parent, $options=null){
		if (!array_key_exists("key",$options)) {
			$options["key"] = strtolower($parent) ."_id";
		}
		if (!array_key_exists("class_name",$options)) {
			$options["class_name"] = $parent;
		}
		$this->belongs_to_name = $parent;
		$this->belongs_to_object = new belongs_to_object_class($this,$parent, $options);
	}

	public function has_one($parent, $options = null){
		$this->belongs_to($parent, $options);
	}
	
	public function has_many($object,$options = null){
		require_once(dirname(__FILE__).'/has_many_object_class.php');
		$this->has_many_objects[$object] = new has_many_item($this,$object,$options);
	}
	
	private function _find_by_sql($sqlstr,$limit=0){
		$this->is_edited = false;
		$this->changed_fields = array();
		$db = get_db();
		if($this->echo_sql){
			echo $sqlstr;
		};
		if (!$db->query($sqlstr)) return  null ;
		if($limit == 1){
			if ($db->record_count <= 0) return null;
			
			foreach ($this->fields as $k => $v){
				#$result->fields[$k] = $db->field_by_name($k);
				$v->value = $db->field_by_name($k);
			}
			$result = clone $this;
		}else {
			$result = array();
			if($db->record_count <= 0) return $result;
			do {
				$tmp = clone $this;
				foreach ($tmp->fields as $k => $v){
					$v->value = $db->field_by_name($k);
				}
				$result[] = $tmp;
			}while ($db->move_next());

		}
		return $result;		
	}
	
	private function _save_new(){
		$sqlstr = "insert into " .$this->_tablename ."(";
		$first = true;
		$sqltail ="";
		$this->is_edited = false;
		$this->changed_fields = array();
		foreach ($this->fields as $k => $v){
			if(is_string($v->value)){
				$v->value = str_replace("'","''",$v->value);
			}			
			if(strtolower($k) == 'id') continue;
			if ($first) {
				$sqlstr .= $k;
				if (is_null($v->value)) {
					$sqltail .="(NULL)";
				}else {
					$sqltail .= "'" .$v->value ."'";
				}

				unset($first);
			}else {
				$sqlstr .= "," .$k;
				if (is_null($v->value)) {
					$sqltail .=",(NULL)";
				}else {
					$sqltail .= ",'" .$v->value ."'";
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
		if (intval($this->fields['id']->value) <= 0){
			debug_info("invalid id!");
			return false;
		}		
		if(!$this->is_edited) return true;
		$sqlstr = "update " .$this->_tablename ." set ";		
		$tmp = array();
		foreach ($this->changed_fields as $key) {
			 
			 if(is_null($this->$key)){
			 	$tmp[] = $key ."=NULL";
			 }else{
			 	$tmp[] = $key ."='" .str_replace("'","''",$this->$key) ."'";
			 }
		}
		$sqlstr .= implode(',',$tmp);
		$sqlstr .= " where id=" .$this->fields['id']->value;
		$db = get_db();
		$this->is_edited = false;
		$this->changed_fields = array();
		$result = $db->execute($sqlstr);
		$result = $result and  $result and $this->_save_belongs_to();
		return  $result and $this->_save_has_many();
	}

	private function _set_fields_default(){
		foreach ($this->fields as $v){
			$v->value = $v->default;
		}
	}

	protected function __clone(){
		if($this->fields){
			foreach ($this->fields as $k => $v) {
				$this->fields[$k] = clone $this->fields[$k];
			}
		}
	}

	protected function __get($var){
		if($var == 'echo_sql'){
			$db = get_db();
			return $db->echo_sql;
		}
		if(strtolower($var) == 'class_name'){
			return $this->_tablename;
		}
		if (@array_key_exists($var,$this->fields)) {
			return  $this->fields[$var]->value;
		}elseif (strtolower($var) == $this->belongs_to_name){
			
			if(!$this->belongs_to_object->is_loaded){
				$this->belongs_to_object->find();	
			}
			
			return $this->belongs_to_object;
		}elseif (@array_key_exists($var,$this->has_many_objects_items)){
			#get the exists has many items
			return $this->has_many_objects_items[$var];
		}elseif (@array_key_exists($var,$this->has_many_objects)){
			return $this->has_many_objects[$var];
		}
	}

	protected function __set($key, $value){
		if (@array_key_exists($key,$this->fields)) {
			if(empty($key)) return;
			if($this->fields[$key]->value == $value) return;
			$this->fields[$key]->value = $value;		
			$this->is_edited = true;
			if(!in_array($key, $this->changed_fields)){
				$this->changed_fields[] = $key;
			}
		}else if(@array_key_exists($key,$this->belongs_to_objects)){
			$this->belongs_to_objects[$key]["value"] = $value;
			$this->fields[$this->belongs_to_objects[$key]["key"]] = $value->id;
		}else if($key == 'echo_sql'){
			$db = get_db();
			 $db->echo_sql = $value;
		}
	}

	protected function _save_belongs_to(){

		$belongs_name = $this->belongs_to_name;
		if($this->belongs_to_object){
			return $this->belongs_to_object->save();	
		}
		return true;		

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

			}else if($fieldname = 'sql'){
				return $this->_find_by_sql($arg[0]);
			}
		}else {
			debug_info(lang_string('I_FUNCTION','function') .$function_name .lang_string('E_NOT_EISTS','not exists!'));
		}

	}

}

?>