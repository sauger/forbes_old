<?php
include_once dirname(__FILE__) . '/database_row_item_class.php';

 class database_connection_class
  {
  	var $_db=NULL;//the link resource
	var $_qresult = NULL;//the query result
	var $_aresult = array();
  	var $servername='localhost';
  	var $databasename = 'mysql';
  	var $username = 'root';
  	var $password = 'xunao';
	var $code = 'utf8';
	var $connected = false;
	public $echo_sql = false;
	public $record_count = 0;
	private $data_set = array();
	private $data_set_pointer = 0;


  	public function connect()
  	{
  		//$args = func_get_args();
  		$args_num = func_num_args();
  		if ($args_num == 1 && is_array(func_get_arg(0))){
  			//the parameter is a hash array
  			$params = func_get_arg(0);
  			foreach ($params as $k => $v){  				
  				if (isset($this->$k)) {
  					$this->$k = $v;
  				}
  			}
  		}elseif ($args_num == 0){
  			//use default values
  		}elseif ($args_num >= 1) {
  			//more than one parameter.the parameters should be pass in order.
  			$this->servername = func_get_arg(0);
  			if($args_num >=2){
  				$this->databasename = func_get_arg(1);
  			}
  			
  			if($args_num >=3){
  				$this->username = func_get_arg(2);
  			}
  			
  			if($args_num >=4){
  				$this->password = func_get_arg(3);
  			}
  			
  			if($args_num >=5){
  				$this->code = func_get_arg(4);
  			}
  		}
  		
  		$this->connected = false;
  		$resutl = $this->_connect();
  		if ($resutl !== false) {
  			$this->connected = true;
  		}
  		return $resutl;
  	}  		
  	
	function paginate($sql, $per_page=10,$page_var='page') {
		$page_count_var  = $page_var ."_count";
		$record_count_var = $page_var ."_record_count";
		global $$page_count_var;
		global $$record_count_var;
		$page = isset($_REQUEST[$page_var]) ? $_REQUEST[$page_var] : 1;
		$select = substr($sql,0,6);
		if(strtoupper($select) != 'SELECT'){
			$this->_debug_info('sql in function painate must be started with SELECT; sql=' .$sql);
			return false;			
		}

		$sql = substr_replace($sql," SQL_CALC_FOUND_ROWS ",6, 0) ." limit " .($per_page * ($page - 1)) . "," .$per_page;
		$ret = $this->query($sql);
		if($ret === false){
			return false;
		}
		$ret = mysql_query('select FOUND_ROWS()');
		mysql_data_seek($ret,0); 
		$ret = mysql_fetch_array($ret);
		$$page_count_var = ceil($ret[0] / $per_page);
		$$record_count_var = $ret[0];
		
		return $this->data_set;
	}
	
	public function close(){
		mysql_close();
		$this->reset_vars();
		$this->connected = false;	
	}  	
	
  	public function &query($sql)
  	{
  		if($this->echo_sql) echo $sql;
		$this->reset_vars();
  		if ($this->connected === false) {
  			$this->_debug_info('database connection has not been established!');
  			return  false;
  		}
		global $g_db_log_file;
		if($g_db_log_file){
			$f_start = get_microtime();
		}			
  		$this->_qresult = mysql_query($sql, $this->_db);
		if($g_db_log_file){
			$f_length = get_microtime() - $f_start;
			$str = chr(13).chr(10). now() ." ".$_SERVER['SCRIPT_NAME'] ." execute sql: ({$f_length}ms)"  .$sql;
			write_to_file($g_db_log_file,$str);
		}			
  		if ($this->_qresult===FALSE)
  		{
  			$this->_debug_info('fail to query db!' . $this->get_error() .";query string = " .$sql);
  		  	return FALSE;
  		}
  		else
  		{  	
		  //get the recrod count		
  		  $this->record_count = mysql_num_rows($this->_qresult);
		  if($this->_move_first() === false) return $data_set;
		  do{
  		  	$item = new database_row_item_class($this);
			$item->load_from_dataset();
			$this->data_set[] = $item;
  		  }while($this->_move_next());
  		  return $this->data_set;
  		}  		  
  	}
  	
  	function execute($sqlstr){
  		if($this->echo_sql) echo $sqlstr;
		if ($this->connected === false) {
  			$this->_debug_info('database connection has not been established!');
  			return  false;
  		}
		global $g_db_log_file;
		if($g_db_log_file){
			$f_start = get_microtime();
		}			
  		$this->_qresult = mysql_query($sqlstr, $this->_db);
		if($g_db_log_file){
			$f_length = get_microtime() - $f_start;
			$str = chr(13).chr(10). now()." ".$_SERVER['SCRIPT_NAME'] ." execute sql: ({$f_length}ms)"  .$sqlstr;
			write_to_file($g_db_log_file,$str);
		}	

  		if ($this->_qresult===FALSE)
  		{
  			$this->_debug_info('fail to execute sql!' . $this->get_error() .";query string = " .$sqlstr);
  		  	return FALSE;
  		}
  		else
  		{  			
  		  return true;
  		}   		  		
  	}
		
	function insert($table,$f,$v=null){
		if(is_null($v) && is_array($f)){
			foreach ($f as $field => $value) {
				$fields[]=$field;
				$values[] = $value;
			}
			return $this->insert($table,$fields,$values);
		}
		$sql = "insert into $table (";
		$f = is_array($f) ? $f : array($f);
		$v = is_array($v) ? $v : array($v);
		if(count($f) != count($v)){
			debug_info("插入表{$table}失败,字段数目与值个数不匹配");
			return false;
		}
		$sql .= implode(",",$f) . ') values(';	
		$len = count($v);
		for($i=0;$i<$len;$i++){
			$v[$i] = "'" . str_replace("'","''",$v[$i]) ."'";
		}
		$v = implode(",",$v);
		$sql .= "{$v})";
		return $this->execute($sql);
		/*
		
		$a = array_combine($f, $v);
		$sql .= implode($a,)
		*/		
	}
	
	function update($table,$f,$v=null,$c=null){
		if(is_null($v) && is_array($f)){
			foreach ($f as $field => $value) {
				$fields[]=$field;
				$values[] = $value;
			}
			return $this->update($table,$fields,$values,$c);
		}
		$sql = "update $table set ";
		$f = is_array($f) ? $f : array($f);
		$v = is_array($v) ? $v : array($v);
		if(count($f) != count($v)){
			debug_info("修改表{$table}失败,字段数目与值个数不匹配");
			return false;
		}
		$len = count($v);
		for($i=0;$i<$len;$i++){
			$v[$i] = "'" . str_replace("'","''",$v[$i]) ."'";
			$a[] = "{$f[$i]}={$v[$i]}";
		}
		$value = implode(',',$a);
		$sql .= "{$value}";
		if(!empty($c)){
			$sql .= " where {$c}";
		}
		return $this->execute($sql);
	}
	
	public function move_first(){
		if($this->record_count <=0 ){
			return false;
		}
		$this->data_set_pointer = 0;
		return true;
	}  	
	
	public function move_next(){
		if($this->data_set_pointer + 1 >= $this->record_count) return false;
		$this->data_set_pointer += 1;
		return true;
	}
		
	public function field_by_index($index)
	{
		return $this->data_set[$this->data_set_pointer]->field_by_index($index);
	}
	
	public function field_by_name($name)
	{
		return $this->data_set[$this->data_set_pointer]->$name;
	}
	
	public function get_field_name($index)
	{
		return mysql_field_name($this->_qresult, $index);
	}
	
	public function get_error()
	{
		return mysql_error();
	}		
  	
 	
  	/*
  	 * private functions defination
  	 */
	private function _connect()
  	{
  		
  		$this->_db = mysql_connect($this->servername, $this->username, $this->password);
  		if ($this->_db === FALSE)
  		{
  			$this->_debug_info('fail to establish db connection,' .$this->get_error());
  			return FALSE;
  		}
  		else
  		{
  			mysql_query('SET NAMES ' .$this->code);
  		  	mysql_select_db($this->databasename, $this->_db);  		  
  		  return $this->_db;
  	  }  	
  	}
  	
  	private function _debug_info($msg){
  		global $debug_tag;
  		if ($debug_tag === true) {
  			if(function_exists('debug_info')){
  				debug_info($msg);	
  			}  			
  		}
  	}
	
  	
	private function reset_vars()
	 {
	 	unset($this->_aresult);
		unset($this->_qresult);
		$this->data_set = array();
		$this->data_set_pointer = 0;		
		$this->record_count = 0;
	 }  	 
		 
	private function _move_first()
	{	
		$this->_aresult = array();
		if (!is_resource($this->_qresult) || mysql_num_rows($this->_qresult) <=0 )
		{			
			return FALSE;
		}
		mysql_data_seek($this->_qresult,0); 
		$this->_aresult = mysql_fetch_array($this->_qresult);
		return TRUE;
	}

	private function _move_next()
	{
		$this->_aresult = array();
		if (!is_resource($this->_qresult)){
		  return FALSE;
		}
		$rtemp = mysql_fetch_array($this->_qresult);
		if ($rtemp===FALSE) {
		  return FALSE;
		}
		$this->_aresult = $rtemp;
		return TRUE;
	}
	
	private function _move_to($pos)
	{
		$this->_aresult = array();
		if(!is_int($pos) || $pos < 0){
			$this->_debug_info('fail to call _move_to,out of range!');
			return false;
		}
		$result = mysql_data_seek($this->_qresult,$pos); 
		if ($result) {
			$this->_aresult = mysql_fetch_array($this->_qresult);
		}
		return $result;
	}	
  	
  	private function __get($var){
  		if (strtolower($var) == "affect_count"){
  			return mysql_affected_rows($this->_db);
  		}
  		if (strtolower($var) == "last_insert_id"){
  			return mysql_insert_id($this->_db);
  		}
  	}
  	
}   
?>