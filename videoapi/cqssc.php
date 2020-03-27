<?php
header("Content-Type:text/html;charset=gb2312");
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
date_default_timezone_set('PRC');
include_once ROOT_PATH."videoapi/DB.php";

$db = new DB();

$sqls="SELECT `Id`, `expect`, `opentime`,  `opencode` FROM `fn_content_1_cqssc` ORDER BY expect DESC limit 1 ";
$result = $db->query($sqls, 1);
if ($result){
	$qn=$result[0]['expect'];
	$qt=$result[0]['opentime'];
	$Ball = $result[0]['opencode'];
}


$tol = (int)substr($qn,8);

$tol = $tol+1;
//log("===00000=====");
if($tol==121){
	$tol = 1;
}
if(($tol>=1 && $tol<=23)){ //凌晨12::05 --- 01:55====5分钟  1-23
	//nextTime = qi*5;
	$htime = 0+(int)((qi*5)/60);
	$mtime = (qi*5)%60;
}else if($tol>=24 && $tol<=96){//10:00------22:00====10分钟   24-96
	$htime = 10+(int)((($tol-24)*10)/60);
	$mtime = (($tol-24)*10)%60;
}else if($tol>96 && $tol<=120){//22:05---------24:00==========5分钟   97==120
	$htime = 22+(int)((($tol-96)*5)/60);
	$mtime = (($tol-96)*5)%60;
}


$awardTime=$qt;//date("Y-m-d H:i:s", strtotime("$startTime +".$min." min"));

$next_awardTime = date("Y-m-d H:i:s",mktime($htime,$mtime,30,date('m'),date('d'),date('Y')));

$startdate=date("Y-m-d H:i:s"); 
$awardTimeInterval=floor((strtotime($next_awardTime)-strtotime($startdate)))*1000;
if($awardTimeInterval<0){
	$awardTimeInterval = 60000;
}


$arr = array(
			 "time"=>time(),
			 "current" => array("periodNumber" =>$qn,"periodDate"=>$qn,"awardTime" =>$awardTime,"awardNumbers" =>$Ball) ,
			 "next" => array("periodNumber"=>$qn+1,"periodDate" =>$qn+1,"awardTime" =>$next_awardTime,"awardTimeInterval" =>$awardTimeInterval,"delayTimeInterval" =>'25') ,
			); 

$json_string = json_encode($arr); 
echo $json_string;
?>