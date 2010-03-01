<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>测试</title>
		<?php
		include "frame.php";
		echo CURRENT_DIR;
		use_jquery();
		js_include_tag('jquery-ui-1.7.2.custom.min.js','autocomplete.jquery.js','jquery.colorbox-min.js');
		css_include_tag('autocomplete','colorbox');
		?>
	</head>
	<body>
		<?php 
		class Info {
			var $id;
			var $value;
			var $info;
		}
		$info1 = new Info();
		$info1->id = 1;
		$info1->value="value";
		$info1->info = "info";
		$info2 = new Info();
		$info2->id = 2;
		$info2->value="value2";
		$info2->info = "info2";
		$a = Array();
		array_push($a, $info1,$info2);
		$result = Array("result" => $a);
		echo json_encode($result);
		/*
		echo 8.12 / 100;
		die();
			 function reset_password(){
  	$client = new SoapClient("http://webservice.webxml.com.cn/WebServices/ForexRmbRateWebService.asmx?wsdl");
  	$ChangePasswordRequest = array("ApplicationId" => "2018", "TimeStamp" => "288701749051598","ChangeType" => $type,"UserId" => $userid, "OldPassword" => $oldpwd,"NewPassword" => $newpwd,"OperatorId" => $operatorid);
  	$result = $client->getForexRmbRate();
  	$xml = new DOMDocument();
  	$xml= simplexml_load_string($result->getForexRmbRateResult->any);
	#var_dump($xml->children()->children());
	foreach ($xml->children()->children() as $v) {
		foreach ($v->children() as $node){
			echo "{$node->getname()} = $node <br/>";
		}
	}

 # 	
  	#var_dump($xml);
	#	var_dump($result);
	#	echo $result->getForexRmbRateResult->any;
  }
  reset_password();
  */
		?>

	<div id="msg">
	<input style="width: 200px" type="text" id="test_xml" />
	<span id='json_info'></span></div>
	<div id="a">div</div>
	
	</body>
</html>

<script>
	$(function(){
		var related_news = "abc";
		$('#a').colorbox({href:'test2.php'});
	});
	
</script>
