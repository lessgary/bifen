<?php
header("Content-Type:text/html;charset=gb2312");
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
date_default_timezone_set('PRC');
include_once ROOT_PATH."videoapi/DB.php";

$db = new DB();

$sqls="SELECT `Id`, `expect`, `opentime`,  `opencode` FROM `fn_content_1_cqklsf` ORDER BY expect DESC limit 1 ";
$result = $db->query($sqls, 1);
if ($result){
	
	$qn=$result[0]['expect'];
	$qt=$result[0]['opentime'];
	$Ball =$result[0]['opencode'];
}

$qi = (int)substr($qn,8);//$db->query($sql, 3);
$ri = date('d');

if(($qi>=1 && $qi<13)){ ////00:02 - 02:02  1-13
										//10:02 - 23:52  14-97
	$htime = 0+(int)(($qi*10+2)/60);
	$mtime = ($qi*10+2)%60;
}else if($qi>=13 && $qi<97){
	$htime = 10+(int)((($qi-13)*10+2)/60);
	$mtime = (($qi-13)*10+2)%60;
}else{
	if(date('H')==23){
		$ri = $ri +1;
 	}
	$htime = 0;
	$mtime = 2;
}




$awardTime=$qt;//date("Y-m-d H:i:s", strtotime("$startTime +".$min." min"));

$next_awardTime = date("Y-m-d H:i:s",mktime($htime,$mtime+1,45,date('m'),$ri,date('Y')));

$startdate=date("Y-m-d H:i:s");
$awardTimeInterval=floor((strtotime($next_awardTime)-strtotime($startdate)))*1000;
if($awardTimeInterval<0){
	$awardTimeInterval = 60000;
}

$arr = array(
			 "time"=>time(),
			 "current" => array("periodNumber" =>$qn,"period"=>$qn,"awardTime" =>$awardTime,"awardNumbers" =>$Ball) ,
			 "next" => array("periodNumber"=>$qn+1,"period" =>$qn+1,"awardTime" =>$next_awardTime,"awardTimeInterval" =>$awardTimeInterval,"delayTimeInterval" =>'20') ,
			); 

$json_string = json_encode($arr); 
echo $json_string;
?>