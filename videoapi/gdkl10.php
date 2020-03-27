<?php
header("Content-Type:text/html;charset=gb2312");
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
date_default_timezone_set('PRC');
include_once ROOT_PATH."videoapi/DB.php";

$db = new DB();

$sqls="SELECT `Id`, `expect`, `opentime`,  `opencode` FROM `fn_content_1_gdklsf` ORDER BY expect DESC limit 1 ";
$result = $db->query($sqls, 1);
if ($result){
	
	$qn=$result[0]['expect'];
	$qt=$result[0]['opentime'];
	$Ball = $result[0]['opencode'];
}

$sql="SELECT `qt` FROM `gdkl` where qt like '%" .date('Y-m-d'). "%'";
$qi = (int)substr($qn,8);//$db->query($sql, 3);
$ri = date('d');


if(($qi>=1 && $qi<84)){ ////09:10 - 23:00  1-84
	$htime = 9+(int)(($qi*10+10)/60);
	$mtime = ($qi*10+10)%60;
}else{
	if(date('H')<=23){
		$ri = $ri +1;
 	}
	$htime = 9;
	$mtime = 10;
}


$awardTime=$qt;//date("Y-m-d H:i:s", strtotime("$startTime +".$min." min"));

$next_awardTime = date("Y-m-d H:i:s",mktime($htime,$mtime+2,30,date('m'),$ri,date('Y')));

$startdate=date("Y-m-d H:i:s");
$awardTimeInterval=floor((strtotime($next_awardTime)-strtotime($startdate)))*1000;
if($awardTimeInterval<0){
	$awardTimeInterval = 60000;
}

$arr = array(
			 "time"=>time(),
			 "current" => array("periodNumber" =>$qn,"periodDate"=>$qn,"awardTime" =>$awardTime,"awardNumbers" =>$Ball) ,
			 "next" => array("periodNumber"=>$qn+1,"periodDate" =>$qn+1,"awardTime" =>$next_awardTime,"awardTimeInterval" =>$awardTimeInterval,"delayTimeInterval" =>'10') ,
			); 

$json_string = json_encode($arr); 
echo $json_string;
?>