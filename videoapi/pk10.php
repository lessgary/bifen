<?php
header("Content-Type:text/html;charset=utf8");
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
 date_default_timezone_set('PRC');
 include_once ROOT_PATH."videoapi/DB.php";

$db = new DB();


	$sqls="SELECT `Id`, `expect`, `opentime`,  `opencode` FROM `fn_content_1_bjpk10` ORDER BY expect DESC limit 1 ";
	$result = $db->query($sqls, 1);
	if ($result)
	{
		$qn=$result[0]['expect'];
		$qt=$result[0]['opentime'];
		$Ball = $result[0]['opencode'];
	}
 
 
	$b_date = date("Y-m-d");
	$cuttQi = (int)(($qn-550053)%179);//(int)(((date('H')-9)*60+date('i')-2)/5);

	$nextHour =9+ (int)(($cuttQi+1)*5/60);
	$nextMinute = 2+(int)(($cuttQi+1)*5%60);
	$nextDay = date('d');
	

	if(date('H')==23 && date('i')>=57){
		$cuttQi = 179;
		$nextDay = date('d')+1;
		$nextHour = 9;
		$nextMinute = 7;
	}

	if(date('H')<9 || (date('H')==9 && date('i')<7)){
		$b_date = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
		$cuttQi = 179;
		$nextDay = date('d');
		$nextHour = 9;
		$nextMinute = 7;
	}
   
  //	echo $cuttQi.'======'.$qn;
      
//凌晨9:07 --- 23:57====5分钟  1-179


$awardTime=$qt;//当前期的时间

$next_awardTime = date("Y-m-d H:i:s",mktime($nextHour,$nextMinute,20,date('m'),$nextDay,date('Y')));

$startdate=date("Y-m-d H:i:s");
$awardTimeInterval=floor((strtotime($next_awardTime)-strtotime($startdate)))*1000;
if($awardTimeInterval<0){
	$awardTimeInterval = 60000;
}


$arr = array(
			 "time"=>time(),
			 "current" => array("awardTime"=>$awardTime,"periodNumber" =>$qn,"awardNumbers" =>$Ball,) ,
			 "next" => array( "delayTimeInterval"=>"3","awardTimeInterval" =>$awardTimeInterval,"awardTime" =>$next_awardTime,"periodNumber" =>$qn+1) ,
			); 
$json_string = json_encode($arr); 
echo $json_string; 
?>
