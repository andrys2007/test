<?php
header("Content-Type: text/html; charset=utf-8");
header('Cache-Control: no-store, no-cache');
header('Expires: '.date('r'));

ini_set("soap.wsdl_cache_enabled", "0" );
ini_set('display_errors', 1);

error_reporting(E_ALL & ~E_NOTICE);

$client = new SoapClient("http://www.sp.com/smsservice.wsdl.php",array( 'soap_version' => SOAP_1_2));

$RezFullInfo=$client->getInfoUser();
$getInfoOrgan=$client->getInfoOrgan();

echo'<BR><BR><BR>----------var_dump(RezFullInfo);--------<BR><BR>';
var_dump($RezFullInfo); 
echo'<BR><BR><BR>----------var_dump(getInfoOrgan);--------<BR><BR>';
var_dump($getInfoOrgan); 

