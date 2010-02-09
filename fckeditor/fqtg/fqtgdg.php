<? 
	require_once('../libraries/tablemanager.class.php');
	require_once('../libraries/sqlrecordsmanager.php');
	require_once('../inc/pubfun.inc.php');
	$page_size=20;
	$id=$_REQUEST['id'];
	$sqlmanager = new SqlRecordsManager();
	$tg=$sqlmanager->GetRecords('select * from smg_tg where id='.$id);
	$count=$sqlmanager->GetRecords('select sum(num) as total from smg_tg_signup where tg_id='.$id);
	$dept=$sqlmanager->GetRecords('SELECT * FROM smg_dept s where deptid<>0');
	$page = isset($_REQUEST['page']) ? $_REQUEST['page']: 1;
	$strsql='select * from smg_tg_signup where tg_id='.$id.' order by createtime desc';
	$record=mysql_query($strsql) or die ("select error1");
	$record_num=mysql_num_rows($record);
	$rs_num=$record_num;
	if( $rs_num>0 ){
   		if( $rs_num < $page_size ){ $page_count = 1; }               
   		if( $rs_num % $page_size ){                                  
       		$page_count = (int)($rs_num / $page_size) + 1;           
   		}else{
       		$page_count = $rs_num / $page_size;                      
  		}
	}
	else{
   		$page_count = 0;
	}
	if ($page=="")  {$page=1;}
	if ($page>$page_count)  {$page=$page_count;}
	if ($page==0)  {$page=1;}
	if ($page< 0)  {$page=1;}
	$strsql='select * from smg_tg_signup where tg_id='.$id.' order by createtime desc limit '.($page-1)*$page_size.','.$page_size;
	$record=mysql_query($strsql) or die ("select error2");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>SMG团购 -<? echo $tg[0]->title;?></title>
	<link href="/css/smg.css" rel="stylesheet" type="text/css">
	<script language="javascript" src="/js/smg.js"></script>
	<script language="javascript" src="fqtgdg.js"></script>
	<script language="javascript" src="fqtgdg1.js"></script>
</head>
<body>
<? 
	include('../inc/top.inc.html');
	
?>
<div id=bodys>
<div id=nyf_left>
	<form name="fqtg" method="post" action="/fqtg/fqtgdg.post.php"> 
 		<div id=content1><a href="/">首页</a>　>　<? echo $tg[0]->title;?></div>
 		<div style="width:100px; height:20px; margin-top:12px; margin-left:25px; text-align:center; float:left; display:inline;">姓名</div>	
    	<div style="width:250px; height:20px; margin-top:12px; margin-left:10px; text-align:center; overflow:hidden; float:left; display:inline;">商品名称</div><div style="width:30px; margin-left:10px; margin-top:12px; text-align:center; float:left; display:inline;">数量</div>　　
    	<div style="width:200px; height:20px; margin-top:-2px; margin-left:20px; text-align:center; color:#0071B5; float:left; display:inline;">订购时间</div>
    	<? if($_COOKIE['smg_userid']==155||$_COOKIE['smg_userid']==3924||$_COOKIE['smg_userid']==3382){?><div style="width:50px; height:20px; margin-top:-2px; margin-left:20px; text-align:center; color:#0071B5; float:left; display:inline;">操作</div><? }?>
    <? while($nyf=mysql_fetch_array($record)){?>	
    	<div style="width:100px; height:20px; margin-top:12px; margin-left:25px; text-align:center; float:left; display:inline;"><?php echo $nyf['name'];?></div>	
    	<div style="width:250px; height:20px; margin-top:12px; margin-left:10px; text-align:center; overflow:hidden; float:left; display:inline;"><?php echo $nyf['spname']; ?></div><div style="width:30px; margin-top:12px; margin-left:10px; text-align:center; float:left; display:inline;"><? echo $nyf['num'];?></div>　　
    	<div style="width:200px; height:20px; margin-top:12px; margin-left:20px; text-align:center; color:#0071B5; float:left; display:inline;"><?php echo $nyf['createtime']; ?></div>	
    	<? if($_COOKIE['smg_userid']==155||$_COOKIE['smg_userid']==3924||$_COOKIE['smg_userid']==3382){?><div style="width:50px; height:20px; margin-top:10px; margin-left:20px; text-align:center; color:#0071B5; float:left; display:inline;"><? if($nyf['state']=="0"){?><button onclick="tg('<? echo $nyf['id'];?>')" style="border:0px;">领取</button><? }else{?>已领取<? }?></div><? }?>
    <? }?>

      <div class=pageurl>
      	<a href="?id=<? echo $id;?>&page=1">首页</a> 
				<a href="?id=<? echo $id;?>&page=<? echo $page-1;?>">上一页</a> 
				<a href="?id=<? echo $id;?>&page=<? echo $page+1;?>">下一页</a> 
				<a href="?id=<? echo $id;?>&page=<? echo $page_count;?>">末页</a> 
				共<? echo $rs_num;?>条记录 
				第<? echo $page;?>页/共<? echo $page_count;?>页
				<select id="newyearpage" name="newyearpage"  onChange="jumppage('/fqtg/fqtgdg.php?id=<? echo $id;?>&page=',this.options[this.options.selectedIndex].value)">
					<? for($i=1;$i<=$page_count;$i++){?>
					<option <? if($page==$i){?>selected="selected"<? }?> value="<? echo $i;?>">第<? echo $i;?>页</option>
					<? }?>
				</select>
				<input type="hidden" id=page value=<? echo $page;?>>
      </div>
			<? if($tg[0]->maxnum==""){
       	if(strtotime(date("Y-m-d H:i:s")) < strtotime($tg[0]->endtime)){
       		?>
       <div id=content9>
       	<hr>
       	 用户姓名：<input type="text" id="buyname" name="buyname"><br>
       	 您的部门：<select id="deptid" name="deptid">
								<? for($i=0;$i<count($dept);$i++){?>
									<option value=<? echo $dept[$i]->id;?><? if($dept[$i]->id==7){?> selected="selected"<? }?>><? echo $dept[$i]->name;?></option>
								<? }?>
							</select><br>
       	 商品名称：<input type="text" id="spname" name="spname"><br>
       	 商品数量：<input type="text" id="num" name="num"><span style="color:red;">只要填数字</span><br>  	 
    	   联系方式：<input type="text" id="phone" name="phone"><br>
    	   <? if($tg[0]->issendfq==0){?>送货地址：<input type="text" id="address" name="address"><? } else {?><input type="hidden" id="address" name="address" value="威海路298号26楼总编室番茄网"><? }?><br> 
    	   其他备注：<textarea id="remark" name="remark" rows="10"></textarea>
    	   <input type="hidden" id="tg_id" name="tg_id" value="<? echo $id;?>">
    	   <input type="hidden" id="tg_maxnum" name="tg_maxnum" value="<? echo $tg[0]->maxnum;?>">
    	   <input type="hidden" id="tg_count" name="tg_count" value="<? echo $count[0]->total;?>">
       </div> 
       
       <div id=content11 onclick="check()" >订　购</div>
       	<? 
      		}
       	}
       	else{
					 if(strtotime(date("Y-m-d H:i:s")) < strtotime($tg[0]->endtime)&&($tg[0]->maxnum > $count[0]->total)){
       	?>
       	<div id=content9>
       	<hr>
       	 用户姓名：<input type="text" id="buyname" name="buyname"><br>
       	 您的部门：<select id="deptid" name="deptid">
								<? for($i=0;$i<count($dept);$i++){?>
									<option value=<? echo $dept[$i]->id;?><? if($dept[$i]->id==7){?> selected="selected"<? }?>><? echo $dept[$i]->name;?></option>
								<? }?>
							</select><br>
       	 商品名称：<input type="text" id="spname" name="spname"><br>
       	 商品数量：<input type="text" id="num" name="num"><span style="color:red;">只要填数字</span><br>  	 
    	   联系方式：<input type="text" id="phone" name="phone"><br>
    	   <? if($tg[0]->issendfq==0){?>送货地址：<input type="text" id="address" name="address"><? } else {?><input type="hidden" id="address" name="address" value="威海路298号26楼总编室番茄网"><? }?><br> 
    	   其他备注：<textarea id="remark" name="remark" rows="10"></textarea>
    	   <input type="hidden" id="tg_id" name="tg_id" value="<? echo $id;?>">
    	   <input type="hidden" id="tg_maxnum" name="tg_maxnum" value="<? echo $tg[0]->maxnum;?>">
    	   <input type="hidden" id="tg_count" name="tg_count" value="<? echo $count[0]->total;?>">
       </div> 
       	<div id=content11 onclick="check()" >订　购</div><? }?>
       	<? }?>
      </form>
 </div>

 <div id=n_right>
 		<div id=content>
 			<div class=title>图片新闻</div>
			<? 
 	    $photonews = $sqlmanager->GetRecords('select * from smg_news where main_cate_id=35 and isphotonews =1 and isadopt=1 order by priority asc, pubdate desc',1,3);
 	    for($i=0;$i<count($photonews);$i++){?>
 			<div class=pic><a href="/news/news.php?id=<?php echo $photonews[$i]->id;?>" target="_blank"><img border=0  src="<?php echo $photonews[$i]->photourl;?>" width="160" height="105"></a></div>
 			<div class=name><a href="/news/news.php?id=<?php echo $photonews[$i]->id;?>"><?php echo $photonews[$i]->title;?></a></div>
 			<? }?>
 		</div>
		<div id=r1>
	 		 <div id=bbs>
	 				<div class=title>论坛　　　　　　　　　<a href="/bbs/">进入论坛</a></div>
					<script type="text/javascript" src="/bbs/api/javascript.php?key=threads_latestreply6"></script>
	 		 </div> 	
	 		 <div id=blog>
	 				<div class=title>博客　　　　　　　　　<a href="/blog">进入博客</a></div>
				 <script language="JavaScript" src="/blog/batch.javascript.php?param=UDUCOg06XD4BaQ11XHddLAdqAX1WJQQkDTZTY1EzBGsCaQA7W2RUelc7CHZTZQpuBnxQLFA5B3lZb1xuB3MFfFAnAjkNJlwpASINRVxLXQ8HTAF9VjoEPQ06U2lRIgQmAjUAeFs1VHpXNwhlU2IKYwZrUHdQOQc6WWZcIAc5BThQZwJ5DSFcLQFuDS5cbF0wB2ABNVYJBDgNNlN0UTMEegJxACZbZlQlVzgIfVM3"></script>
	 		 </div>
		</div>
 </div>
</div>
<? include('../inc/bottom.inc.html');
   CloseDB();
?>	
</body>
</html>