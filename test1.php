<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=gbk">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>测试</title>
		<?php
		  //require "frame12311.php";
		  include "lib/oracle_data_handler.php";
		?>
	</head>
	<body>
	  <?php
	  //$db = get_oracle_db();
	  //$ret = query_oracle("SELECT a.YDBH,a.QYDMC,a.MDDMC,a.SHFS,a.HWMC,a.JS,a.BZBH,a.ZL,a.TJ,a.YDZT,a.FSZT,a.DHCDH,a.MDDZBH FROM HYDATA.LD_YD a  WHERE a.YDBH='98452991'");
	   $ret = query_oracle("select * from hydata.ld_gpsjl where FCBH='N南京N扬州N南通-09090397'" );
	   var_dump($ret);
	   ///var_dump(explode(chr(13), $ret[0]));
	   /*
	   echo $ret[1];
	   $r = explode(chr(10),$ret[1]);
	   foreach ($r as $v) {
	   	var_dump(explode('	',$v));;
	   }
	   */
	   //var_dump(explode('	',$r[0]));
	   //var_dump(query_oracle("SELECT * FROM HYDATA.LD_GS WHERE GSBH='5906'"));
	   //$ydcx = new ydgz_info_pt();
	   //$ydcx->get_info('98452991');
	   //echo iconv('GB2312','UTF-8',$this->thgsmc);
	  // var_dump($ydcx);
	  /*
	  function handledata(){
	  		
		$tmp1 = '2009/09/25 13:59 送达	N南通8		+NT8JL-002860高伟
2009/09/25 13:59 送货	N南通8	黑D02993            	调度员:002860高伟 送货单号:01569951
2009/09/25 13:55 回单登记	N南通8		用户名:+NT8JL-002860高伟 签收人:张建林 签收信息: 证件号:公章（南通弘文图书发行有先公司）
2009/09/25 13:31 接收下转	N南通8	黑D02993            	下转移单号：XZY5700-20090924-025接单员:002860高伟 实际入库件数:4
2009/09/25 07:44 下转	N南通	黑D02993            	发车编号:XZY5700-20090924-025 调度员:180906纪忠伟  目的地公司:N南通8
2009/09/25 01:42 接收上转	N南通	黑D04329            	上转移单号：SZY5701-20090924-001接单员:180906纪忠伟 实际入库件数:4
2009/09/24 16:28 上转	N南通0	黑D04329            	发车编号:SZY5701-20090924-001 调度员:167875韩萍  目的地公司:N南通
2009/09/22 09:19 接收下转	N南通0	黑D04329            	下转移单号：XZY5700-20090921-021接单员:167875韩萍 实际入库件数:4
2009/09/22 08:05 下转	N南通	黑D04329            	发车编号:XZY5700-20090921-021 调度员:180906纪忠伟  目的地公司:N南通0
2009/09/21 18:05 到货	N南通	黑B61582            	发车编号：N南京N扬州N南通-09090397  发货单号:5184411 接单员:180906纪忠伟 实际入库件数:4
2009/09/20 23:38 发货	N南京	黑B61582            	调度员:006367张万忠 发车编号:N南京N扬州N南通-09090397起始地:N南京目的地:N南通
2009/09/19 23:29 中转到货	N南京	黑B62262            	发车编号：N成都N南京N无锡-09090138  发货单号:5163362接单员:002470张克兵 实际入库件数:4
2009/09/16 04:22 发货	N成都	黑B62262            	调度员:008543郭强 发车编号:N成都N南京N无锡-09090138起始地:N成都目的地:N南京
2009/09/15 19:23 接收上转	N成都	川A44607            	上转移单号：SZY9751-20090915-007接单员:187729陈志刚 实际入库件数:4
2009/09/15 17:44 上转	N成都0	川A44607            	发车编号:SZY9751-20090915-007 调度员:021943杨蕾  目的地公司:N成都
2009/09/15 16:51 开单	N成都0	上门提货	录单员（工号:021943 姓名:021943杨蕾 系统用户名:+CD0SYY)
';	
		$array1 = explode(chr(10),$tmp1);
		$records = array();
		$record_name = array('sj','gs','cp','czy');
		foreach ($array1 as $v) {
			$items = explode('	',$v);
			array_push($records, array_combine($record_name, $items));
			//push(array_combine($record_name, $items));
		}
		return $records;
	  }
	  $result = handledata();
	  foreach ($result as $v) {
	  	foreach ($v as $k => $v1) {
	  		echo "$k = {$v1}<br/>";
	  	};
	  }
	  */
	  ?>
	  
	  sdfs
	</body>
</html>