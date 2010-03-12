<?php	
	define(CURRENT_DIR, dirname(__FILE__) ."/");
	define(ROOT_DIR_NONE, dirname(__FILE__));	
	define(ROOT_DIR,CURRENT_DIR);
	require('config/config.php');
	require_once(CURRENT_DIR ."lib/pubfun.php");
	require_once(CURRENT_DIR ."lib/database_connection_class.php");
	require_once(CURRENT_DIR ."lib/database_connection_mssql_class.php");
	require_once(CURRENT_DIR ."lib/table_class.php");
	require_once(CURRENT_DIR ."lib/category_class.php");
	require_once(CURRENT_DIR ."lib/table_images_class.php");
	require_once(CURRENT_DIR ."lib/upload_file_class.php");
	require_once CURRENT_DIR ."lib/image_handler_class.php";

	
	function get_config($var,$path=''){
		if(empty($path)){$path = LIB_PATH .'../config/config.php';}
		require_once($path);
		global $$var;
		return $$var;
	}	
	
	function &get_db() {
		global $g_db;
		if(!is_object($g_db)){
			if(get_config('db_type') == 'mssql'){
				$g_db = new database_connection_mssql_class();
			}else
			{
				$g_db = new database_connection_class();
			}
			
		}
		if($g_db->connected) return $g_db;
		$servername = get_config('db_server_name');
		$dbname = get_config('db_database_name');
		$username = get_config('db_user_name');
		$password = get_config('db_password');
		$code = get_config('db_code');
		$note_emails = "chenlong@xun-ao.com, sunyoujie@xun-ao.com, shengzhifeng@xun-ao.com, zhanghao@xun-ao.com";
		if($g_db->connect($servername,$dbname,$username,$password,$code)===false){			
			$last_time = file_get_contents(dirname(__FILE__) .'/config/last_disconnect.txt');
			
			if($last_time == ''){				
				write_to_file(dirname(__FILE__) .'/config/last_disconnect.txt',now(),'w');
				@mail($note_emails,'数据库连接失败','主备数据库均无法连接，请立即检查'.$this->servername);
				
			}
			/*
			$servername = get_config('db_server_name_bak');
			$dbname = get_config('db_database_name_bak');
			$username = get_config('db_user_name_bak');
			$password = get_config('db_password_bak');
			$code = get_config('db_code_bak');
			if($g_db->connect($servername,$dbname,$username,$password,$code)===false){
				
			}
			*/
		};	
		return $g_db;	
	}
	
	function close_db() {
		$db = &get_db();
		$db->close();
	}
	
	function use_jquery(){
		js_include_once_tag('jquery-1.3.2.min');
	}
	
	function validate_form($form_name) {
		js_include_once_tag('jquery-1.3.2.min');
		js_include_once_tag('jquery.validate');
		?>
		<script>
			$(function(){
				$("#<?php echo $form_name;?>").validate();
			});
		</script>
		<?php
	}
	function js_include_tag($js){
		if (func_num_args()>1) {
			foreach (func_get_args() as $v){
				js_include_tag($v);
			}
			return ;
		}
		$js = _get_js_file($js);
		echo '<script type="text/javascript" language="javascript" src="' .$js .'"></script>';		
	}
	function _get_js_file($js){
		if (strtolower($js) == "default") {
			return ROOT_PATH ."javascript/jquery.js";		
		}else {		
			$ljs = strtolower($js);
			if (strpos($ljs, "http://") !== false || strpos($ljs,"www.") !== false) {	
				return $js;		
			}else {
				if (substr($ljs,-3) == ".js"){$js = substr_replace($js,"",-3);}			
				return  ROOT_PATH ."javascript/" .$js .".js";			
			}		
		}	
	}
#only include once
	function js_include_once_tag($js){
		global $loaded_js;
		if (empty($loaded_js)){
			$loaded_js = array();
		}
		if (func_num_args()>1) {
			foreach (func_get_args() as $v){
				js_include_once_tag($v);
			}
			return ;
		}
		$js_name = _get_js_file($js);
		if (in_array($js_name,$loaded_js,false)) {
			return ;
		}else {
			$loaded_js[] = $js_name;
			js_include_tag($js);
		}
	}
	
	function css_include_tag($filename){
		if (func_num_args()>1) {
			foreach (func_get_args() as $v){
				css_include_tag($v);
			}
			return ;
		}
		$css_name = _get_css_file($filename);	
		echo '<link href="' .$css_name .'" rel="stylesheet" type="text/css">';	
	}
	
	function _get_css_file($filename){
		$ljs = strtolower($filename);
		if (strpos($ljs, "http://") !== false || strpos($ljs,"www.") !== false) {	
			return $ljs;				
		}else {
			if (substr($ljs,-4) == ".css"){$filename = substr_replace($filename,"",-4);}			
			$ljs = ROOT_PATH ."css/" .$filename .".css";			
		}
		return $ljs;
	}
	
	function css_include_once_tag($filename){
		global $loaded_css;
		if (empty($loaded_css)){
			$loaded_css = array();
		}
		if (func_num_args()>1) {
			foreach (func_get_args() as $v){
				css_include_once_tag($v);
			}
			return ;
		}
		$f = _get_css_file($filename);
		if (in_array($f,$loaded_css,false)) {	
			return ;	
		}else {
			$loaded_css[] = $f;
			css_include_tag($filename);
		}
	}	
	
	function use_jquery_ui(){
		js_include_once_tag('jquery-1.3.2.min');
		js_include_once_tag('jquery-ui-1.7.2.custom.min');
	}

	function judge_role(){
		return true;
	}
	
	function show_fckeditor($name,$toolbarset='Admin',$expand_toolbar=true,$height="200",$value="",$width = null) {
		require_once(CURRENT_DIR . 'fckeditor/fckeditor.php');
		$editor = new FCKeditor($name);
		$editor->BasicPath = CURRENT_DIR . 'fckeditor';
		$editor->ToolbarSet = $toolbarset;	
		$editor->Config['ToolbarStartExpanded'] = $expand_toolbar;
		$editor->Value = $value;
		$editor->Height = $height;
		if($width){
			$editor->Width = $width;
		}
		$editor->Create();
	}

function paginate($url="",$ajax_dom=null,$page_var="page",$force_show = false)
{
	$pageindextoken = empty($page_var) ? "page" : $page_var;
	$record_count_token = $pageindextoken . "_record_count";	

	$pagecounttoken = $pageindextoken . "_count";

	global $$pagecounttoken;
	global $$record_count_token;
	$pageindex = isset($_REQUEST[$pageindextoken]) ? $_REQUEST[$pageindextoken] : 1;
	$pagecount = isset($_REQUEST[$pagecounttoken]) ? $_REQUEST[$pagecounttoken] : $$pagecounttoken;
	
	
	if ($url == "") {
		parse_str($_SERVER['QUERY_STRING'], $params);
		unset($params[$pageindextoken]);
		$url = $_SERVER['PHP_SELF'] ."?";
		foreach ($params as $k => $v) {
			$url .= "&" .$k . "=" . urlencode($v);
		}
	}
	
	if ($pagecount <= 1 && !$force_show) return;
	if (!strpos($url,'?'))
	{
		$url .= '?';
	}
	
	$pagefirst = $url . "&$pageindextoken=1";
	$pagenext = $url ."&$pageindextoken=" .($pageindex + 1);
	$pageprev = $url ."&$pageindextoken=" .($pageindex-1);
	$pagelast = $url ."&$pageindextoken=" .($pagecount);
	if ($pageindex == 1 || $pageindex ==null || $pageindex == "")
	{?>
	  <span>[首页]</span> 
	  <span>[上页]</span>	
	  <?php 
	  	if($pagecount > 1){
	  ?>
	  <span><a class="paginate_link" href="<?php echo $pagenext; ?>">[下页]</a></span> 
	  <span><a class="paginate_link" href="<?php echo $pagelast; ?>">[尾页]</a></span>
	  <?php }else{?>
	  <span>[下页]</span> 
	  <span>[尾页]</span>		  
	<?php	
	  }
	}
	if ($pageindex < $pagecount && $pageindex > 1 )
	{?>
	  <span><a class="paginate_link" href="<?php echo $pagefirst; ?>">[首页]</a></span> 
	  <span><a class="paginate_link" href="<?php echo $pageprev; ?>">[上页]</a></span>			
	  <span><a class="paginate_link" href="<?php echo $pagenext; ?>">[下页]</a></span> 
	  <span><a class="paginate_link" href="<?php echo $pagelast; ?>">[尾页]</a></span>		
	 <?php
	}
	if ($pageindex == $pagecount && $pageindex != 1)
	{?>
	  <span><a class="paginate_link" href="<?php echo $pagefirst; ?>">[首页]</a></span> 
	  <span><a class="paginate_link" href="<?php echo $pageprev; ?>">[上页]</a></span>
	  <span>[下页]</span> 
	  <span>[尾页]</span>	  		
	<?php	
	}
	?>共找到<?php echo $$record_count_token; ?>条记录　
  当前第<select name="pageselect" id="pageselect" onChange="jumppage('<?php echo $url ."&" .$page_var ."="; ?>',this.options[this.options.selectedIndex].value);">
	<?php	
	//产生所有页面链接
	for($i=1;$i<=$pagecount;$i++){ ?>
		<option <?php if($pageindex== $i) echo 'selected="selected"';?> value="<?php echo $i;?>" ><?php echo $i;?></option>
		<?php	
	}
	?>
	</select>页　共<?php echo $pagecount;?>页
	<script>
			function jumppage(urlprex,pageindex)
			{
				var surl=urlprex+pageindex;
				<?php
				if($ajax_dom){ ?>
					$('#<?php echo $ajax_dom;?>').load(surl);
				<?php  }else{ ?>
					window.location.href=surl;
				<?php }
				?>	
				
			} 
	</script>
	
	<?php
	if(!empty($ajax_dom)){
		?>
		<script>
			$(".paginate_link").click(function(e){
				e.preventDefault();
				$("#<?php echo $ajax_dom;?>").load($(this).attr('href'));
			});
		</script>
		<?php
	}
}

function redirect_login($type='js',$referer=true){
	$url = '/login/login.php';
	if($referer){
		$url .= '?last_url=' .get_current_url();		
	}
	redirect($url,$type);	
}

function require_role($role='member'){
	if(empty($_SESSION[role_name])){
		redirect_login();
	}	
}

function role_include($file, $role='member'){
	if ($_SESSION['role_name'] == $role){
		include($file);
	}
}

function search_content($key,$table_name='fb_news',$conditions=null,$page_count = 10, $order='',$full_text=false){
	$db = get_db();
	$key = str_replace('　', ' ', $key);
	$key = str_replace(',', ' ', $key);
	$keys = explode(' ',$key);
	/*
	if($keys){
		$now = now();
		foreach ($keys as $v) {
			if($v){
				$db->execute("insert into smg_search_keys (search_key,created_at) values ('{$v}','{$now}')");;
			}			
		}
	}
	*/
	$table = new table_class($table_name);	
	$c = array();
	$d=array();
	foreach ($keys as $v) {
		array_push($c, "title like '%$v%'");
		array_push($c, "keywords like '%$v%'");
	 	if($full_text){array_push($c, "description like '%$v%'");}
		if($table_name == 'fb_news'){
			array_push($c, "short_title like '%$v%'");
			array_push($c, "tags like '%$v%'");	
			if($full_text){						
				array_push($c, "content like '%$v%'");
			}			
		}
	}
	foreach ($keys as $v) {
		
	 	if($full_text){array_push($d, "description like '%$v%'");}
		if($table_name == 'fb_news'){
			
			if($full_text){
				array_push($d, "(title like '%$v%' or keywords like '%$v%' or short_title like '%$v%' or tags like '%$v%' or content like '%$v%')");				
			}
			else
			{
				array_push($d, "(title like '%$v%' or keywords like '%$v%' or short_title like '%$v%' or tags like '%$v%')");		
			}
		}
	}
	$d = implode(' and ' ,$d);
	if($conditions){
		$d = $conditions . ' and (' .$d .')';
	}
	$sql1 = 'select a.id,a.short_title,a.title,a.category_id,a.created_at,a.is_adopt from (select * from ' . $table_name ." where language_tag=0 and ".$d;
	if($order)
	{
		$sql1 = $sql1 . ' order  by ' .$order;
	}
	$sql1=$sql1.') as a';
	$content1=$db->query($sql1);
	for($i=0;$i<count($content1);$i++)
	{
		$notid[]=$content1[$i]->id;
	}
	
	$e= @implode(',',$notid);
	$c = implode(' OR ' ,$c);
	if($conditions){
		$c = $conditions . ' and (' .$c .')';
	}
	if($e!="")
	{
		$sql2 = 'select b.id,b.title,b.short_title,b.category_id,b.created_at,b.is_adopt from (select * from ' . $table_name .' where language_tag=0 and id not in ('.$e.') and ('.$c.')';
	}
	else
	{
		$sql2 = 'select b.id,b.title,b.short_title,b.category_id,b.created_at,b.is_adopt from (select * from ' . $table_name ." where language_tag=0 and ".$c;	
	}
	if($order)
	{
		$sql2 = $sql2 . ' order  by ' .$order;
	}
	$sql2=$sql2.') as b';
	if(count($content1)>0)
	{
		$sql=$sql1." union ".$sql2;
	}
	else
	{
		$sql=$sql2;	
	}
	/*if ($order){
		$sql = $sql . ' order  by ' .$order;
	}*/
	if($page_count > 0){
		return $db->paginate($sql,$page_count);	
	}else{
		return $db->query($sql);
	}
		
}

function write_log($msg){
	global $g_log_dir;
	if(empty($g_log_dir)){
		return;
	}
	if(is_dir($g_log_dir) === false) return ;
			echo 'Ok';
	$file = $g_log_dir .substr(now(),0,10)  .".log";
	$msg = now() . ": " .$msg .chr(13).chr(10);
	write_to_file($file,$msg);
}
	
?>