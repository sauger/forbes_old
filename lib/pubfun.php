<?php
/*
 * public function
 */
if (!function_exists('linux_path')){
	function linux_path($path){
		return str_replace("\\","/",$path);
	} 
}

define(LIB_PATH, linux_path(dirname(__FILE__)) .'/');

function debug_info($msg,$type='php') {
	if(get_config('debug_tag') === false){
		return;
	};
	if($type == 'php'){
		echo '<font style="color:red;">' .$msg .'</font>';
	}else
	{
		alert($msg);
	}
}

function display_error($msg) {
	echo '<font style="color:red;">' .$msg .'</font>';;
}

function dir_files($path,$include_path=true){
	$dir = opendir(ROOT_DIR .$path);
	if(substr($path,-1)!='/') $path .= '/';
	if($dir === false) return false;
	$result = array();
	while (($file = readdir($dir)) !== false)
	{
		if ($file == '.' || $file == '..') continue;
		if($include_path) $file = $path . $file;
		$result[] = $file;
		echo "{$file}:ctime=" .date("Y-m-d H:i:s.",filectime($file)) ."|";
		echo "{$file}:mtime=" .date("Y-m-d H:i:s.",filemtime($file)) ."|";
		echo "{$file}:atime=" .date("Y-m-d H:i:s.",fileatime($file)) ."<br/>";
	}
	closedir($dir);
	return $result;
}
	
define("ROOT_PATH", "/");
function redirect($url, $type='js')
{
  if($type == 'js'){
	 echo "<script LANGUAGE=\"Javascript\">"; 
	 echo "location.href='$url';"; 
	 echo "</script>"; 		
  }elseif($type== 'header'){
  	header("Location: " . $url); 
  }
  
}

function get_current_url()
{
	return  "http://" .$_SERVER[HTTP_HOST] .$_SERVER[REQUEST_URI];
}

function get_microtime(){ 
   list($usec, $sec) = explode(" ",microtime()); 
   return ((float)$usec + (float)$sec); 
} 

function now(){
	return date("Y-m-d H:i:s");
}

function alert($msg)
{
  $msg = str_replace("'", "\'", $msg);
  echo "<script LANGUAGE=\"Javascript\">"; 
  echo "alert('$msg');"; 
  echo "</script>"; 		
}

function rand_str($len=10){
  	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ";
  	$ret = "";
  	for($i=0;$i < $len; $i++){
  		$ret .= $str{mt_rand(0,61)};
  	}
  	return $ret;
  }

function is_ajax(){
	return strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=="xmlhttprequest" ? true : false;
}

function write_to_file($filename,$content,$mode='a'){
	$fp = fopen($filename, $mode);
	fwrite($fp,$content);
	fclose($fp);
}

//work only with jquery frame work


function check_db($server_name,$user_name,$password,$db_type='mysql'){
	if($db_type == 'mysql'){
		$ret = @mysql_connect($server_name,$user_name,$password);			
	}else if($db_type == 'mssql'){
		$param = array('UID' => $user_name,'PWD' => $password);
		$ret = sqlsrv_connect($this->servername,$param);
	}
	if(is_resource($ret)){
		mysql_close($ret);
		return true;
	}else{
		return false;
	}	

}

function format_sql($sql){
	$tran = array("'" => "''");	
	return strtr($sql,$tran);
}

function show_video_player($width,$height,$image='',$file,$autostart = "false")
	{
		if (strtoupper(substr($file,-3)) == "MP3" || strtoupper(substr($file,-3)) == "WMV" || strtoupper(substr($file,-3)) == "WMA"  || strtoupper(substr($file,-3)) == "AVI" || strtoupper(substr($file,-3)) == "VYF")
		{
		?>
			<OBJECT   id=MediaPlayer1   codeBase=http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701standby=Loading   type=application/x-oleobject   height=<?php echo $height;?>   width=<?php echo $width;?>   classid=CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6   VIEWASTEXT>
				<PARAM   NAME= "URL"   VALUE= "<?php echo $file;?>">
				<PARAM   NAME= "playCount"   VALUE= "1">
				<PARAM   NAME= "autoStart"   VALUE= "<? echo $autostart;?>">
				<PARAM   NAME= "invokeURLs"   VALUE= "false">
				<PARAM   NAME= "EnableContextMenu"   VALUE= "false">	
				<embed src="<?php echo $file;?>" align="baseline" border="0" width="<?php echo $width;?>" height="<?php echo $height;?>" type="application/x-mplayer2"pluginspage="" name="MediaPlayer1" showcontrols="1" showpositioncontrols="0" showaudiocontrols="1" showtracker="1" showdisplay="0" showstatusbar="1" autosize="0" showgotobar="0" showcaptioning="0" autostart="<? echo $autostart;?>" autorewind="0" animationatstart="0" transparentatstart="0" allowscan="1" enablecontextmenu="1" clicktoplay="0" defaultframe="datawindow" invokeurls="0"></embed> 
			</OBJECT>
		<?php
			}else 
			{
			?>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="<?php echo $width;?>" height="<?php echo $height;?>" id="FLVPlayer">
		  <param name="movie" value="/flash/mediaplayer.swf" />
		  <param name="salign" value="lt" />
		  <param name="quality" value="high" />
		  <param name="wmode" value="opaque" />
		  <param name="scale" value="noscale" />
		  <param name="FlashVars" value="&image=<?php echo $image;?>&file=<?php echo $file;?>&displayheight=<?php echo $height-15;?>&autostart=<? echo $autostart;?>" />
		  <embed src="/flash/mediaplayer.swf" flashvars="&image=<?php echo $image;?>&file=<?php echo $file;?>&displayheight=<?php echo $height - 15;?>&autostart=<? echo $autostart;?>" quality="high" scale="noscale" width="<?php echo $width;?>" height="<?php echo $height;?>" name="FLVPlayer" wmode="opaque" salign="LT" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
		</object>
			<?php
			}
	}
	
function strfck($str)
{
	$str=str_replace('\"','"',$str);
	$str=str_replace('"font-size','"mso-bidi-font-size',$str);
	$str=str_replace('FONT-SIZE','mso-bidi-font-size',$str);
	return $str;
}

//获取FCK字符串内容
function get_fck_content($str,$symbol='fck_pageindex')
{
	$ies = '<div style="page-break-after: always;">
	<span style="display: none;">&nbsp;</span></div>';	
	$ffs = '<div style="page-break-after: always">
		<span style="display: none">&nbsp;</span></div>';
	$ffs2 = '<div style="page-break-after: always;">
		<span style="display: none;">&nbsp;</span></div>
';
	$contents = split($ies,$str);
	$record_count_token = $symbol . "_record_count";	
	$pagecounttoken = $symbol . "_count";
	global $$pagecounttoken;
	global $$record_count_token;
	if (count($contents) < 2 ) {
		$contents = split($ffs,$str);
	}
	if (count($contents) < 2 ) {
		$contents = split($ffs2,$str);
	}
	$$record_count_token = count($contents);
	$$pagecounttoken = $$record_count_token;
	$index = isset($_REQUEST[$symbol]) ? $_REQUEST[$symbol] : 1;
	return strfck($contents[$index-1]);
}

function print_fck_pages2($url="",$symbol='fck_pageindex'){
	if(empty($url))$url = 'news.php?id='.$_REQUEST['id'];
	$str = $symbol."_count";
	global $$str;
	$count = $$str;
	if(empty($_REQUEST[$symbol])||$_REQUEST[$symbol]==1){
		$prev = '<span class="paginate_botton">上页</span>';
	}else{
		$prev = '<span class="paginate_botton"><a href="'.$url.'&'.$symbol.'='.($_REQUEST[$symbol]-1).'">上页</a></span>';
	}
	for($i=0;$i<$count;$i++){
		if(empty($_REQUEST[$symbol])){
			$page .= '<span class="page_span';
			if($i==0)$page.='2';
			$page.='"><a href="'.$url.'&'.$symbol.'='.($i+1).'">'.($i+1).'</a></span>';
		}else{
			$page .= '<span class="page_span';
			if($_REQUEST[$symbol]==($i+1))$page.='2';
			$page .= '"><a href="'.$url.'&'.$symbol.'='.($i+1).'">'.($i+1).'</a></span>';
		}
	}
	if($_REQUEST[$symbol]==$count){
		$next = '<span class="paginate_botton">下页</span>';
	}else{
		$next = '<span class="paginate_botton"><a href="'.$url.'&'.$symbol.'=';
		if(empty($_REQUEST[$symbol])){
			$next .=2;
		}else{
			$next .=($_REQUEST[$symbol]+1);
		}
		$next .='">下页</a></span>';
	}
	if($count==1){
	}else{
		echo $prev.$page.$next;
	}
}

function print_fck_pages($str,$url="",$symbol='fck_pageindex'){
	paginate($url,null,$symbol);
};

function print_fck_pages1($str,$url="",$symbol='fck_pageindex')
{
	$ies = '<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span>';	
	$ffs = '<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span></div>';
	$pagecount = substr_count($str,$ies);
	$pagecount = $pagecount <=0 ? substr_count($str,$ffs) : $pagecount;
	$pagecount++;
	$pageindex = isset($_REQUEST[$symbol]) ? $_REQUEST[$symbol] : 1;
	
	if ($pagecount <= 1) return;
	if ($url == "") {
		parse_str($_SERVER['QUERY_STRING'], $urlparams);
		$params = array();
		foreach ($urlparams as $k => $v) {
			if ($k == $symbol || $k == $pagecounttoken) {
				continue;				
			}
			$params[$k] = $v;
		}
		$url = $_SERVER['PHP_SELF'] ."?";
		foreach ($params as $k => $v) {
			$url .= "&" .$k . "=" . $v;
		}
	}	
	if (!strpos($url,'?'))
	{
		$url .= '?';
	}
	$symbol = "&" .$symbol ."=";
	$pagefirst = $url .$symbol ."1";
	$pagenext = $url .$symbol .($pageindex + 1);
	$pageprev = $url .$symbol .($pageindex-1);
	$pagelast = $url .$symbol .($pagecount);
	if ($pageindex == 1 || $pageindex ==null || $pageindex == "")
	{ ?>
	  <span><a href="<?php echo $pagenext; ?>">[下页]</a></span> 
	  <span><a href="<?php echo $pagelast; ?>">[尾页]</a></span>
	<?php	
	}
	if ($pageindex < $pagecount && $pageindex > 1 )
	{?>
	  <span><a href="<?php echo $pagefirst; ?>">[首页]</a></span> 
	  <span><a href="<?php echo $pageprev; ?>">[上页]</a></span>			
	  <span><a href="<?php echo $pagenext; ?>">[下页]</a></span> 
	  <span><a href="<?php echo $pagelast; ?>">[尾页]</a></span>		
	 <?php
	}
	if ($pageindex == $pagecount)
	{?>
	  <span><a href="<?php echo $pagefirst; ?>">[首页]</a></span> 
	  <span><a href="<?php echo $pageprev; ?>">[上页]</a></span>		
	<?php	
	}
	?>
  当前第<select name="pageselect" id="pageselect" onChange="jumppage('<?php echo $url.$symbol; ?>',this.options[this.options.selectedIndex].value);">
	<?php	
	//产生所有页面链接
	for($i=1;$i<=$pagecount;$i++)
	{  
		
		?>
		<option <?php if($pageindex== $i) echo 'selected="selected"';?> value="<?php echo $i;?>"><?php echo $i;?></option>
	 <?php	
	}
	?>
	</select>页
	<script>
			function jumppage(urlprex,pageindex)
			{
				var surl=urlprex+pageindex;
				window.location.href=surl;
			} 
	</script>

	<?php	
	
}

function navigation($name)
{
		
}
?>