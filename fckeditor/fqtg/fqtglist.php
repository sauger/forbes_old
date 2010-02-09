<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>SMG -番茄团购列表</title>
	<link href="/css/smg.css" rel="stylesheet" type="text/css">
	<script language="javascript" src="/js/smg.js"></script>

</head>
<body>
<? 
	include('../inc/top.inc.html');
	require_once('../libraries/sqlrecordsmanager.php');
	$sqlmanager = new SqlRecordsManager();
	$news=$sqlmanager->GetRecords('SELECT * FROM smg_tg where isadopt=1 order by createtime desc');
	$news2=$sqlmanager->GetRecords('select * from smg_news where main_cate_id=58 and isadopt=1 order by pubdate desc');
?>
<div id=bodys>
	<div id=fqtglist><a href="/">首页</a>　>　<a href="/fqtg/fqtglist.php">番茄团购列表</a></div>
	<div id=fqtglistcount>
		<div style="width:980px; font-size:14px; margin-top:10px; margin-left:10px; font-weight:bold; color:red; float:left; display:inline;">小番茄郑重承诺：番茄团购的宗旨就是为大家服务！团购的商品都是直接跟供应商联系，我们会尽力为大家争取到最低价格，在团购过程中番茄网绝不加价从中赚取利益！请大家监督！如果员工有什么渠道可以为大家提供产品团购，也欢迎联系我们！</div><br>
		<? for($i=0;$i<count($news);$i++){?>
		<div class=context>
			<div class=cl>
				<img width=160 height=105 src="<? echo $news[$i]->photourl;?>" /><br>
				<a href="/fqtg/fqtg.php?id=<? echo $news[$i]->id;?>"><? echo $news[$i]->title;?></a></div>		
		</div>
		<? }?>
		<? for($i=0;$i<count($news2);$i++){
				if($news2[$i]->linkurl==""){
			?>
		<div class=context>
			<div class=cl>
				
				<img width=160 height=105 src="<? echo $news2[$i]->photourl;?>" /><br>
				<a href="/news/news-54.php?id=<? echo $news2[$i]->id;?>"><? echo $news2[$i]->title;?></a></div>
			
		</div>
		<? 
			}
		}
		?>
	</div>
	<div id=fqtglistcount_page>
		
    <?php 
     //显示评论页数链接
     if($commentmanager->pagecount > 1)
     {
    ?>
      <div class="pageurl">
         <?php echo PrintPageUrl("/fqtg/fqtglist.php",$pageindex,$commentmanager->pagecount); ?>
      </div>
    <?php
  	}
  	//显示评论页面链接完成
    ?>
	</div>
</div>
<? include('../inc/bottom.inc.html');?>	
</body>
</html>