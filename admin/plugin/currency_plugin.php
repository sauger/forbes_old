<?php
include '../../frame.php';
$db = get_db();
$client = new SoapClient("http://xurrency.com/api.wsdl?WSDL");
$result = $client->getValuesInverse('cny');
$db->execute("insert into fb_currency (code,rate) values ('cny',1) ON DUPLICATE KEY update rate = 1;");
foreach ($result as $v) {
	$db->execute("insert into fb_currency (code,rate) values ('{$v->Id}',{$v->Value}) ON DUPLICATE KEY update rate = {$v->Value};");
}
unset($client);
close_db();
