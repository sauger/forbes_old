<?php
include_once dirname(__FILE__) . '/database_row_item_class.php';
class database_connection_mssql_class
{
	var $_db=NULL;//the link resource
	var $_qresult = NULL;//the query result
	var $_aresult = array();
  	var $servername='localhost';
  	var $databasename = 'mysql';
  	var $username = 'root';
  	var $password = 'xunao';
	var $code = 'UTF-8';
	var $connected = false;
	var $affect_count = 0;
	public $echo_sql = false;
	public $record_count = 0;
	public $last_insert_id = 0;
	private $data_set = array();
	private $data_set_pointer = 0;
	
	private function _connect()
	{
		$param = array('Database' => $this->databasename,'UID' => $this->username,'PWD' => $this->password, "CharacterSet" => $this->code);
		$result = sqlsrv_connect($this->servername,$param);
		if (is_resource($result))
		{
			$this->_db = $result;
		}
		return $result;
	}
	
	private function reset_vars()
	 {
	 	unset($this->_aresult);
		unset($this->_qresult);
		$this->data_set = array();
		$this->data_set_pointer = 0;		
		$this->record_count = 0;
	 } 
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
	
	public function close(){
		sqlsrv_close($this->_db);
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
  		$this->_qresult = sqlsrv_query($this->_db, $sql);
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
		  $this->record_count = 0;
		  while( $this->_aresult = sqlsrv_fetch_array( $this->_qresult, SQLSRV_FETCH_ASSOC))
		  {
		  	$item = new database_row_item_class($this);
			$item->load_from_dataset($this->_db);
			$this->record_count++;
			$this->data_set[] = $item;
		  }
		  sqlsrv_free_stmt($this->_qresult);
		  return $this->data_set;
		
  		}  		  
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
	
	
	
	function execute($sqlstr){
  		$this->affect_count = 0;
		
		
		//$sqlstr .= ' select @@IDENTITY AS last_id';
		//$sqlstr = 'begin ' .$sqlstr .' end';
		if($this->echo_sql) echo $sqlstr;
		if ($this->connected === false) {
  			$this->_debug_info('database connection has not been established!');
  			return  false;
  		}
		global $g_db_log_file;
		if($g_db_log_file){
			$f_start = get_microtime();
		}			
  		$this->_qresult = sqlsrv_query($this->_db, $sqlstr);
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
		  $this->affect_count = sqlsrv_rows_affected($this->_qresult);
		  $q  = sqlsrv_query($this->_db,'SELECT @@IDENTITY AS last_id');
		  $tmp = sqlsrv_fetch_array( $q, SQLSRV_FETCH_ASSOC);
		  //var_dump(sqlsrv_errors());

		  $this->last_insert_id = $tmp['last_id'];	
  		  return true;
  		}   		  		
  	}
	
	  private function __get($var){
  		if (strtolower($var) == "affect_count"){
  			return $this->$affect_count;
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
	
	public function get_error()
	{
		return sqlsrv_errors();
	}		
		
  	
}

?>