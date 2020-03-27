<?php
header("Content-Type:text/html;charset=gb2312");
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
date_default_timezone_set('PRC');
include_once ROOT_PATH."videoapi/DB.php";

$db = new DB();

$sqls="SELECT `Id`, `expect`, `opentime`,  `opencode` FROM `fn_content_1_jsk3` ORDER BY expect DESC limit 80 ";
$result = $db->query($sqls, 1);
if ($result){
	$drawHistories = array();
	
	$num1 = 0;
	$num2 = 0;
	$num3=0;
	$num4=0;
	$num5=0;
	$num6=0;
	$numsmall = 0;
	$numbig = 0;


	for($i=0;$i<count($result);$i++){ 

		$qn1 = $result[$i]['expect'];   
 		$Ball = $result[$i]['opencode'];
		$qt = $result[$i]['opentime'];
		$qn = substr((string)$qn1,2);

		$barr = explode(',',$Ball);
		$totall = 0;
		 for ($x=0; $x<count($barr); $x++) {
				$totall = $totall +$barr[$x];

				if($barr[$x]==1){
					$num1++;
				}

				if($barr[$x]==2){
					$num2++;
				}

				if($barr[$x]==3){
					$num3++;
				}

				if($barr[$x]==4){
					$num4++;
				}

				if($barr[$x]==5){
					$num5++;
				}

				if($barr[$x]==6){
					$num6++;
				}
		 }

		 if($totall>=10){
		  $resultt = '大';
		  $numbig++;
		 }else{
		  $resultt = '小';
		  $numsmall++;
		 }
 		
		if($Ball && count($drawHistories)<8){
			$drawnum= array("periodNumber"=>$qn,"numbers"=>$Ball,"total"=>$totall,"result"=>$resultt,);
			array_push($drawHistories,$drawnum);
		}
	}
}


 
 $numberStatistics = array(
	
	array("number"=>"1","count"=>$num1),
	array("number"=>"2","count"=>$num2),
	array("number"=>"3","count"=>$num3),
	array("number"=>"4","count"=>$num4),
	array("number"=>"5","count"=>$num5),
	array("number"=>"6","count"=>$num6),

	array("number"=>"大","count"=>$numbig),
	array("number"=>"小","count"=>$numsmall),
 );

 


$arr = array(
			 "drawHistories"=>$drawHistories,
			 "numberStatistics" =>$numberStatistics
			); 

$json_string = json_encode($arr); 
echo $json_string;
?>