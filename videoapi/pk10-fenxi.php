<?php
	header("Content-Type:text/html;charset=utf8");
	define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
	date_default_timezone_set('PRC');
	include_once ROOT_PATH."videoapi/DB.php";

	$db = new DB();

	$cuttQi = (int)(((date('H')-9)*60+date('i')-2)/5);
   	$b_date = date("Y-m-d");

	$nextQi = $cuttQi+1;

	if(date('H')==23 && date('i')>=57){
		$cuttQi = 179;
		$nextQi=1;
  	}

	if(date('H')<9 || (date('H')==9 && date('i')<7)){
 		$cuttQi = 179;
		$nextQi=1;
		$b_date = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
 	}

 
	$sqls="SELECT `id`, `expect` FROM `fn_content_1_bjpk10` ORDER BY expect DESC limit 1 ";
	$result = $db->query($sqls, 1);
	if ($result)
	{
		$cuttIdd =$result[0]['id'];
		$cuttIdd2 = $cuttIdd-90; 
	}else{
		$cuttIdd = 0;
		$cuttIdd2 = 0; 
		
	}
	

	//$sql="SELECT `id`,`b_time`,`code`,`b_myid` ,`b_id` FROM `pk10` WHERE `id`<=$cuttIdd AND `id`>=$cuttIdd2";

	$sqls="SELECT `id`, `expect`, `opentime`,  `opencode` FROM `fn_content_1_bjpk10`  WHERE `id`<=$cuttIdd AND `id`>=$cuttIdd2 ORDER BY expect DESC ";
	$result = $db->query($sqls, 1);

 	//$query = odbc_do($conn, $sql);  
	
	

	//大小单双
	 for ($n=0; $n<10; $n++) {
		${'odd'.$n} =0;
		${'even'.$n}=0;
		${'small'.$n} = 0;
		${'big'.$n} = 0;

		${'Lodd'.$n} =0;
		${'Leven'.$n}=0;
		${'Lsmall'.$n} = 0;
		${'Lbig'.$n} = 0;
		${'Llk'.$n} = 0;//连开期数  

		${'zLodd'.$n} =0;
		${'zLeven'.$n}=0;
		${'zLsmall'.$n} = 0;
		${'zLbig'.$n} = 0;
		${'zLlk'.$n} = 0;//连开期数  

		${'isodd'.$n} =0;
		${'iseven'.$n}=0;
		${'issmall'.$n} = 0;
		${'isbig'.$n} = 0;
		${'islk'.$n} = 0;
 	 }

	$drawHistories = array();

	for($i=0;$i<count($result);$i++){ 

		$qn = $result[$i]['expect'];   
 		$Ball = $result[$i]['opencode'];
		$qt = $result[$i]['opentime'];
		$bid =  $result[$i]['id'];
		
		if($Ball){
			$drawnum= array("periodNumber"=>$bid,"numbers"=>$Ball,);
			array_push($drawHistories,$drawnum);

			$barr = explode(',',$Ball);
			 
			 for ($x=0; $x<count($barr); $x++) {
				
				//大小单双
				if($barr[$x]%2==0){
					${'even'.$x} = ${'even'.$x}+1;


					if(${'iseven'.$x}==1){
						${'zLeven'.$x}++;
					}else{
						if(${'Leven'.$x}<${'zLeven'.$x}){
							${'Leven'.$x} = ${'zLeven'.$x};
						}
 						${'zLeven'.$x}=0;
					}
					${'iseven'.$x}=1;
					${'isodd'.$x}=0;
				}else{
					${'odd'.$x} = ${'odd'.$x}+1;


					if(${'isodd'.$x}==1){
						${'zLodd'.$x}++;
					}else{
						if(${'Lodd'.$x}<${'zLodd'.$x}){
							${'Lodd'.$x} = ${'zLodd'.$x};
						}
 						${'zLodd'.$x}=0;
					}
 					${'iseven'.$x}=0;
					${'isodd'.$x}=1;
				}

				if($barr[$x]<=5){
					${'small'.$x} = ${'small'.$x}+1;


					if(${'issmall'.$x}==1){
						${'zLsmall'.$x}++;
					}else{
						if(${'Lsmall'.$x}<${'zLsmall'.$x}){
							${'Lsmall'.$x} = ${'zLsmall'.$x};
						}
 						${'zLsmall'.$x}=0;
					}
					${'issmall'.$x}=1;
					${'isbig'.$x}=0;

				}else{
					${'big'.$x} = ${'big'.$x}+1;


					if(${'isbig'.$x}==1){
						${'zLbig'.$x}++;
					}else{
						if(${'Lbig'.$x}<${'zLbig'.$x}){
							${'Lbig'.$x} = ${'zLbig'.$x};
						}
 						${'zLbig'.$x}=0;
					}
					${'isbig'.$x}=1;
					${'issmall'.$x}=0;
				}
				//=====================

 
			 }
		}//if$ball 结束

	}//while结束
	   
  // 	odbc_close($conn);
 


$bname = array('冠军','亚军','第三名','第四名','第五名','第六名','第七名','第八名','第九名','第十名');
$ballStat = array();
$changLong = array();

//==========================================================

$betitems =  array();
 
$arritem = array();
$winlogarr = array(3,5,6,7,8,9,-4,-5,-7,-2);
$bname2 = array('冠军','亚军','第三名','第四名','第五名','第六名','第七名','第八名','第九名','第十名');

for($p = 0;$p<3;$p++){
	$arrp = array(1,2,3,4,5,6,7,8,9,10);
	$estr = "";
	for($e = 0;$e<5;$e++){
		if($estr!=""){$estr=$estr.",";}
		$earre = array_splice($arrp,rand(0,count($arrp)-1),1);
		$estr = $estr.($earre[0]);
	}

		$betArrspl = array_splice($bname2,rand(0,count($bname2)-1),1);
		$conwlSpl = array_splice($winlogarr,rand(0,count($winlogarr)-1),1);
	 $betitem =  array("periodNumber"=>$nextQi,"betName"=>$betArrspl[0],
		 "betItem"=>$estr,"conWinOrLoss"=>$conwlSpl[0]);
	 array_push($betitems,$betitem);
}

 $betData = array("dataUrl"=>"","betItems"=>$betitems);
//==========================================================

$numOmit = array();


//=====================================================
for($k=0;$k<10;$k++){
	$numOmitData = array();

	for($j=0;$j<10;$j++){
		$xiaArr = array(1,2,3,4,5,6,7,8,9,10);

		$numSpl = array_splice($xiaArr,rand(0,count($xiaArr)-1),1);
		$bnumitem = array("num"=>$numSpl[0],"coming"=>rand(0,40),"uncoming"=>rand(0,40),);
		array_push($numOmitData,$bnumitem);
	}

	$bnumOmititem = array("name"=>$bname[$k],"data"=>$numOmitData,);
	array_push($numOmit,$bnumOmititem);
	






	$ballk = array("name"=>$bname[$k],"big"=>${'big'.$k},"small"=>${'small'.$k},"odd"=>${'odd'.$k},"even"=>${'even'.$k},);
	array_push($ballStat,$ballk);

	if(count($changLong)<5){
		if(${'Lodd'.$k}>=3){
			$baodd = array("name"=>$bname[$k],"item"=>'单',"comingTimes"=>${'Lodd'.$k},);
			array_push($changLong,$baodd);
		}
		if(${'Leven'.$k}>=3){
			$baodd = array("name"=>$bname[$k],"item"=>'双',"comingTimes"=>${'Leven'.$k},);
			array_push($changLong,$baodd);
		}
		if(${'Lsmall'.$k}>=3){
			$baodd = array("name"=>$bname[$k],"item"=>'小',"comingTimes"=>${'Lsmall'.$k},);
			array_push($changLong,$baodd);
		}
		if(${'Lbig'.$k}>=3){
			$baodd = array("name"=>$bname[$k],"item"=>'大',"comingTimes"=>${'Lbig'.$k},);
			array_push($changLong,$baodd);
		}
		if(${'Llk'.$k}>=3){
			$baodd = array("name"=>$bname[$k],"item"=>'',"comingTimes"=>${'Llk'.$k},);
			array_push($changLong,$baodd);
		} 
	}

}



$arr = array(
			 "betData"=>$betData,
			 "changLong"=>$changLong ,
			 "ballStat"=>$ballStat ,
			 "numOmit"=>$numOmit ,
			 "drawHistories"=>$drawHistories ,
			); 

$jsarr = array();
array_push($jsarr,$arr);

$json_string = json_encode($jsarr); 
echo $json_string; 
?>
