<?php
header("Content-Type:text/html;charset=gb2312");
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
date_default_timezone_set('PRC');
include_once ROOT_PATH."videoapi/DB.php";

$db = new DB();

//{"id":35,"nextid":36,"year":2014,"day":"03月27日","time":"21时30分","week":"星期//四","type":4,"info":"a","ma":"36,羊,blue,22,雞,green,35,猴,red,44,豬,green,28,兔,green,45,狗,red,6,牛,green"}


$sqls="SELECT `Id`, `expect`, `opentime`,  `opencode` FROM `fn_content_1_hk6` ORDER BY expect DESC limit 1 ";
$result = $db->query($sqls, 1);

$weekarray=array('日','一','二','三','四','五','六');




$ww = date('w');
if($ww==0 || $ww==1 || ($ww==2 && ((date('d')==21 && date('i')<=30) || date('d')<21))){
	$d=strtotime("Tuesday");
	$week = '二';
}else if($ww==3 || ($ww==4 && ((date('d')==21 && date('i')<=30) || date('d')<21)) || ($ww==2 && ((date('d')==21 && date('i')>30) || date('d')>21))){
	$d=strtotime("Thursday");
	$week = '四';
}else if($ww==5 || ($ww==6 && ((date('d')==21 && date('i')<=30) || date('d')<21)) || ($ww==4 && ((date('d')==21 && date('i')>30) || date('d')>21))){
	$d=strtotime("Saturday");
	$week = '六';
}

//$d=strtotime($result[0]['opentime']);

//echo date('Y-m-d h:i',$d);

$abc1 = array('猴','羊','马','蛇','龙','兔','虎','牛','鼠','猪','狗','鸡');


$str = '';
$barr = explode(',',$result[0]['opencode']);
 for ($x=0; $x<count($barr); $x++) {
	$hao = (int)$barr[$x];
	if($str!=''){
		$str = $str.',';
	}

	$abc1_1 = $abc1[($hao%12)];

	if($hao==1 || $hao==2  || $hao==7  || $hao==8  || $hao==12  || $hao==13  || $hao==18  || $hao==19  || $hao==23  || $hao==24  || $hao==29  || $hao==30
		 || $hao==34  || $hao==35  || $hao==40  || $hao==45  || $hao==46  ){
		$colorr = 'red';
	}

	if($hao==3 || $hao==4  || $hao==9  || $hao==10  || $hao==14  || $hao==15  || $hao==20  || $hao==25  || $hao==26  || $hao==31  || $hao==36  || $hao==37
		 || $hao==41  || $hao==42  || $hao==47  || $hao==48 ){
		$colorr = 'blue';
	}

	if($hao==5 || $hao==6  || $hao==11  || $hao==16  || $hao==17  || $hao==21  || $hao==22  || $hao==27  || $hao==28  || $hao==32  || $hao==33  || $hao==38
		 || $hao==39  || $hao==43  || $hao==44  || $hao==49 ){
		$colorr = 'green';
	}

	$str = $str.$hao.','.$abc1_1.','.$colorr;
 }



 
$arr = array(
			 "id"=>$result[0]['expect'],
			 "nextid" =>(int)$result[0]['expect']+1,
			 "year" =>date('Y',$d),
			 "day" =>date('m',$d).'月'.date('d',$d).'日',
			 "time" =>'21时30分',//date('h',$d).'时'.date('i',$d).'分',
			 "week" =>'星期'.$weekarray[date('w',$d)],
			 "nextdate"=>date('Y/m/d ',$d).'21:30',
			 "type" =>4,
			 "info" =>'a',
			 "ma" =>$str,
			); 

$json_string = json_encode($arr); 
echo $json_string;
?>