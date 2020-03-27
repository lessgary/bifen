<?php
header("Content-Type:text/html;charset=gb2312");
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
date_default_timezone_set('PRC');
include_once ROOT_PATH."videoapi/DB.php";

$db = new DB();

$sqls="SELECT `Id`, `expect`, `opentime`, `opencode` FROM `fn_content_1_bjkl8` ORDER BY expect DESC limit 1 ";
$result = $db->query($sqls, 1);
if ($result){
	
	$qn=$result[0]['expect'];
	$qt=$result[0]['opentime'];
	
	$Ball = $result[0]['opencode'];

	$arr = explode(",",$Ball);
	$extra = (int)($arr[20]);//$result[0]['extra'];
}

//{"time":1439374520728,"current":{"periodNumber":711021,"awardTime":"2015-08-12 18:10:00","awardNumbers":"10,11,12,13,16,20,26,35,39,44,47,48,52,53,56,63,65,67,76,78","pan":"1"},"next":{"periodNumber":711022,"awardTime":"2015-08-12 18:15:00","awardTimeInterval":-20728,"delayTimeInterval":15}}

$qi = (int)(($qn-684419)%179);
$ri = date('d');

if(($qi>=1 && $qi<179)){ ////09:05 - 23:55  1-179
	$htime = 9+(int)(($qi*5+5)/60);
	$mtime = ($qi*5+5)%60;
}else{
	if(date('H')<=23){
		$ri = $ri +1;
 	}
	$htime = 9;
	$mtime = 5;
}

$awardTime=$qt;//date("Y-m-d H:i:s", strtotime("$startTime +".$min." min"));

$next_awardTime = date("Y-m-d H:i:s",mktime($htime,$mtime,20,date('m'),$ri,date('Y')));

$startdate=date("Y-m-d H:i:s");
$awardTimeInterval=floor((strtotime($next_awardTime)-strtotime($startdate)))*1000;
if($awardTimeInterval<0){
	$awardTimeInterval = 60000;
}


$arr = array(
			 "time"=>time(),
			 "current" => array("periodNumber" =>$qn,"period"=>$qn,"awardTime" =>$awardTime,"awardNumbers" =>$Ball,"pan"=>$extra) ,
			 "next" => array("periodNumber"=>$qn+1,"period" =>$qn+1,"awardTime" =>$next_awardTime,"awardTimeInterval" =>$awardTimeInterval,"delayTimeInterval" =>'5') ,
			); 

$json_string = json_encode($arr); 
echo $json_string;
?>
