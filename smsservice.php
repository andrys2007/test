<?php

header("Content-Type: text/html; charset=utf-8");
header('Cache-Control: no-store, no-cache');
header('Expires: '.date('r'));

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кеширование WSDL-файла для тестирования
ini_set('display_errors', 1);

file_put_contents("log.txt","smsservice_1 \r\n",FILE_APPEND);

class SoapTest 
{
    function getInfoUser()
	{
		file_put_contents("log.txt","call getInfoUser \r\n",FILE_APPEND);
        return array("FIO" => "Сидоров Иван Андреевич","ADRES"=>"Трудовая 160","STATUS"=>"Открыто");
    }

   function getInfoOrgan()
    {
      file_put_contents("log.txt","call getInfoOrgan \r\n",FILE_APPEND);
      return array("NAME" => "Василий","IIN"=>"Трудовая 120","ADRES"=>"Закрыто");
    }
	
}

$server = new SoapServer("http://www.sp.com/smsservice.wsdl.php");
$server->setClass("SoapTest");
$server->handle();