<?php
header("Content-Type:text/html;charset=gb2312");
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
date_default_timezone_set('PRC');

//{"serverTime":"1395898503515","remark":"2014-03-27 13:35:03"}

list($s1, $s2) = explode(' ', microtime()); 
 $mirotime = (int) ((floatval($s1) + floatval($s2)) * 1000); 


$arr = array(
			 "remark"=>date("Y-m-d H:i:s"),
			 "serverTime" =>$mirotime
			); 

$json_string = json_encode($arr); 
echo $json_string;
?>





