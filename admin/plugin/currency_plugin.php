<?php
include '../../frame.php';
$db = get_db();
$xml = new DOMDocument();
$xml= simplexml_load_string($result->getForexRmbRateResult->any);
#var_dump($xml->children()->children());
class exchange_info{
	var $id;
	var $value;
	var $name;
}

$client = new SoapClient("http://webservice.webxml.com.cn/WebServices/ForexRmbRateWebService.asmx?wsdl");
$result = $client->getForexRmbRate();
$xml = new DOMDocument();
$xml= simplexml_load_string($result->getForexRmbRateResult->any);
$result = Array();
foreach ($xml->children()->children() as $v) {
	$tmp = new exchange_info();
	foreach ($v->children() as $node){
		$name = $node->getName();
		if ($name == 'Symbol'){
			$tmp->id = strtolower($node);
		}elseif($name == 'Name'){
			$tmp->name = $node;
		}elseif($name == 'SellPrice'){
			$tmp->value = (float)$node /100;
		}
		#
		#echo "{$node->getname()} = $node <br/>";
	}
	array_push($result,$tmp);
}
$db->execute("insert into fb_currency (code,rate,name) values ('cny',1,'人民币') ON DUPLICATE KEY update rate = 1;");
foreach ($result as $v) {
	$db->execute("insert into fb_currency (code,rate,name) values ('{$v->id}',{$v->value},'{$v->name}') ON DUPLICATE KEY update rate = {$v->value};");
}
unset($client);
close_db();
