<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>测试</title>
		<?php
		phpinfo();
		exit;
		include "frame.php";
		use_jquery();
		js_include_tag('jquery-ui-1.7.2.custom.min.js');
		?>
	</head>
	<body>
	dfads
		<?php 
			 function reset_password(){
  	$client = new SoapClient("http://xurrency.com/api.wsdl?WSDL");
  	$ChangePasswordRequest = array("ApplicationId" => "2018", "TimeStamp" => "288701749051598","ChangeType" => $type,"UserId" => $userid, "OldPassword" => $oldpwd,"NewPassword" => $newpwd,"OperatorId" => $operatorid);
  	$result = $client->getValuesInverse('cny');
		var_dump($result);
	#	echo $result->getForexRmbRateResult->any;
  }
  reset_password();
		?>

	<div id="msg"></div>
	<button id="btn">test</button>
	</body>
</html>

