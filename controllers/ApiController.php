<?php

class ApiController extends Common {
    public function __construct() {
        parent::__construct();
    }
    public function pk10Action(){
        $table = 'content_'.$this->siteid.'_bjpk10';
        $content = Controller::model($table);
        $last_data = $content->getOne('`id`<>0 ORDER BY `expect` DESC');
        if($last_data){
            $qn = $last_data['expect'];
            $qt = $last_data['opentime'];
            $Ball = $last_data['opencode'];
            $qi = (int)(($qn - 504229) % 179);
            $ri = date('d');
            if (($qi >= 1 && $qi < 179))
            { //凌晨9:07 --- 23:57====5分钟  1-179
                $htime = 9 + (int)(($qi * 5 + 7) / 60);
                $mtime = ($qi * 5 + 7) % 60;
            } else
            {
                if (date('H') == 23)
                {
                    $ri = $ri + 1;
                }
                $htime = 9;
                $mtime = 7;
            }
            $awardTime = $qt; //date("Y-m-d H:i:s", strtotime("$startTime +".$min." min"));
            $next_awardTime = date("Y-m-d H:i:s", mktime($htime, $mtime, 0, date('m'), $ri,
                date('Y')));
            $startdate = date("Y-m-d H:i:s");
            $awardTimeInterval = floor((strtotime($next_awardTime) - strtotime($startdate))) *
                1000;
            if ($awardTimeInterval < 0)
            {
                $awardTimeInterval = 60000;
            }
            $arr = array(
                "time" => time(),
                "current" => array(
                    "awardTime" => $awardTime,
                    "periodNumber" => $qn,
                    "awardNumbers" => $Ball,
                    ),
                "next" => array(
                    "delayTimeInterval" => "20",
                    "awardTimeInterval" => $awardTimeInterval,
                    "awardTime" => $next_awardTime,
                    "periodNumber" => $qn + 1),
                );
            $json_string = json_encode($arr);
            echo $json_string;
        }
    }
    // 更新彩票信息
    public function updateinfoAction(){
        // 检查get传递来的信息，
        $cp = isset($_GET['cp']) ? $_GET['cp']:'';
        $uptime = isset($_GET['uptime']) ? (int)$_GET['uptime']:'';
        $chtime = isset($_GET['chtime']) ? (int)$_GET['chtime']:'';
        $catid = isset($_GET['catid']) ? (int)$_GET['catid']:'';
        $modelid = isset($_GET['modelid']) ? (int)$_GET['modelid']:'';
        $data = array();
        // 如果参数为空，直接返回错误提示
        if($cp == '' || $uptime =='' || $chtime =='' || $catid == ''|| $modelid == ''){
            $data['status'] = '0';
            $data['msg'] = '参数错误！';
            echo json_encode($data);
            exit();
        }
        // 检查数据库中的数据是否已经更新
        $table = 'content_'.$this->siteid.'_'.$cp;
        // 附表
        $content_2 = Controller::model('content');
        $content_2->table_name = $content_2->prefix.$table;
        $last_data = $content_2->getOne('`id`<>0 ORDER BY `expect` DESC');
        if($last_data){
            // 把数据库里的opentime转换为时间戳
            $last_time = strtotime($last_data['opentime']);
            // 对比最新期的开奖时间和请求时间
            // 判断“当前时间”是否大于“最后更新时间”+“彩票开奖时间间隔”，
            // 对香港彩特殊处理
            if($cp == "hk6"){
                $next_time = strtotime(block(1));
                if($uptime > $next_time){
                    // 当前时间大于下次更新时间，跟新之
                    $url = "http://c.apiplus.net/newly.do?token=d23785e6ecb3baf7&code=".$cp."&date=".date("Y-m-d")."&format=json";
                    $data = $this->downData($url, $catid, $modelid, $cp, $last_time, $table);
                }
            }elseif($uptime > $last_time + $chtime){
                // 开始获取远程接口，读取数据，入库
                // 判断日期--如果最后数据的日期不是请求当日，则需要把没有更新那几天的数据补全
                $d_time = ceil(($uptime - $last_time)/(60*60*24));
                // var_dump($d_time);
                // exit();
				//$d_time = 20;
                if($d_time > 1){
                    // 超过一天没有更新数据
                    for($i = $d_time;$i>0;$i--){
                        $t_date = date("Y-m-d",time()-$i*60*60*24);
                        $url = "http://c.apiplus.net/newly.do?token=d23785e6ecb3baf7&code=".$cp."&date=".date("Y-m-d")."&format=json";
                        $data = $this->downData($url, $catid, $modelid, $cp, $last_time, $table);
                    }
                }else{
                    // 获取当前所有彩票信息
                    $url ="http://c.apiplus.net/newly.do?token=d23785e6ecb3baf7&code=".$cp."&date=".date("Y-m-d")."&format=json";
                    $data = $this->downData($url, $catid, $modelid, $cp, $last_time, $table);
                }
            }
        }else{
            $url = "http://c.apiplus.net/newly.do?token=d23785e6ecb3baf7&code=".$cp."&date=".date("Y-m-d")."&format=json";
            $data = $this->downData($url, $catid, $modelid, $cp, $last_time,$table);
        }
        // 获取昨天的数据
        // $zt = date('Y-m-d',time()-1*60*60*24);
        if($cp == "hk6"){
            //获取过去30期的数据
            $data = $content_2->getAll("`id`<>0",'','*','`expect` DESC','',30);
        }else{
            // 获取今天的日期
            $jt = date('Y-m-d',time());
            $data = $content_2->getAll("`id`<>0 AND `opentime` LIKE '%$jt%'",'','*','`expect` DESC','',999999);
            if(!$data){
                $zt = date('Y-m-d',time()-1*60*60*24);
                $data = $content_2->getAll("`id`<>0 AND `opentime` LIKE '%$zt%'",'','*','`expect` DESC','',999999);
            }
        }
         //var_dump($data);
        // exit();
        $redata = $this->formatData($cp,$data);
        echo json_encode($redata);
    }
    // 负责从远程api接口获取数据
    private function downData($url, $catid = 1, $modelid, $cp, $last_time,$table,$content){
        $content = Controller::model('content_'.$this->siteid);
        $content_2 = Controller::model('content');
        $content_2->table_name = $content_2->prefix.$table;
        $data = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $chre = curl_exec($ch);
        $temp_re = json_decode($chre,true);
        $results = $temp_re['data'];
        // 把数组倒序
        krsort($results);
        $ins_data = array();
        foreach ($results as $key => $value) {
            // code...
            if(strtotime($value['opentime']) > $last_time){
                // var_dump($value);
                // 插入数据到数据库中
                // echo "Insert::".$key .'-'.$value['opentime'].'<br>'; 
                $ins_data['catid'] = $catid;
                $ins_data['modelid'] = $modelid;
                $ins_data['title'] = $cp.'-'.$value['expect'];
                $ins_data['keywords'] = '';
                $ins_data['description'] = '';
                $ins_data['expect'] = $value['expect'];
                if($cp !== "cqssc"){
                    $value['opencode'] = preg_replace('/^0/','',$value['opencode']);
                }else {
                	$value['opencode'] = preg_replace('/,0(\d)/',',\\1',$value['opencode']);
				}
                $ins_data['opencode'] = str_replace("+",",",$value['opencode']);
                $ins_data['opentime'] = $value['opentime'];
                $ins_data['inputtime'] = $ins_data['updatetime'] = strtotime($value['opentime']);
                $expect = $value['expect'];
                $check_data = $content_2->getOne("`expect`='$expect' ORDER BY `expect` DESC");
                // 避免重复录入
                if(!$check_data){
                    $msg =  $content->set(0,$table,$ins_data);
                    // echo "$table::$msg ::".$key .'-'.$value['opentime'].'<br>';
                    array_push($data, $value);
                }
            }
        }
        return $data;
    }
    private function formatData($cp,$data){
        // 格式化输出
        // 转换成前端可以使用的！
        // $cp = isset($_GET['cp']) ? $_GET['cp']:'';
        $redata = array();
        if($cp == 'bjpk10' || $cp == 'cqssc' || $cp == 'gdklsf' || $cp == 'bjkl8' || $cp == 'jsk3' || $cp == 'cqklsf'|| $cp == 'hk6'){
            $redata["s"] = 0;
            $redata["m"] = "";
            $redata["c"] = $cp;
            $redata["l_c"] = count($data);//当前期
            $redata["l_t"] = (int)$data[0]['expect'];
            $redata["l_d"] = $data[0]['opentime'];
            // 临时
            // $s = preg_replace('/^0/','',$data[0]['opencode']);
            // $s = preg_replace('/,0(\d)/',',\\1',$s);
            $redata["l_r"] = $data[0]['opencode'];
            $redata["c_t"] = (int)$data[0]['expect'];
            $redata["c_d"] = $data[0]['opentime'];
            $redata["n_t"] = (int)$data[0]['expect']+1;
            // $redata["n_d"] = "2016/03/19 14:31:38";
            $redata["no"] = 0;//179 全天多少期
            $redata["o_info"] = "";// 每5分钟
            $redata["o_info_t"] = "";// 9:06:00
            $redata["o_g"] = 0;
            $redata["os"] = 0;
            $redata["osm"] = ""; //暂停开奖
            foreach ($data as $k => $v) {
                $temp_ar = array();
                $temp_ar["c_t"] = (int)$v['expect'];
                $temp_ar["c_d"] = $v['opentime'];
                $temp_ar["c_r"] = $v['opencode'];
                // 判断
                // $s = preg_replace('/^0/','',$v['opencode']);
                // $s = preg_replace('/,0(\d)/',',\\1',$s);
                $a = explode(',',$v['opencode']);
                if($cp == 'bjpk10'){
                    $temp_ar["o_m"][] = (int)$a[0]+(int)$a[1];
                    if((int)$a[0]+(int)$a[1] > 11){
                        $temp_ar["o_m"][] = "大";
                    }else{
                        $temp_ar["o_m"][] = "小";
                    }
                    if( ( (int)$a[0] + (int)$a[1] )%2 == 0){
                        $temp_ar["o_m"][] = "双";
                    }else{
                        $temp_ar["o_m"][] = "单";
                    }
                    if( (int)$a[0] > (int)$a[9] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[1] > (int)$a[8] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[2] > (int)$a[7] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[3] > (int)$a[6] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[4] > (int)$a[5] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                }elseif($cp == 'cqssc'){
                    // 根据重庆彩票的规则写
                    $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4];
                    $temp_ar["o_m"][] = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4];
                    if($zongshu > 22){
                        $temp_ar["o_m"][] = "大";
                    }else{
                        $temp_ar["o_m"][] = "小";
                    }
                    if( ( $zongshu )%2 == 0){
                        $temp_ar["o_m"][] = "双";
                    }else{
                        $temp_ar["o_m"][] = "单";
                    }
                    if( (int)$a[0] > (int)$a[4] ){
                        $temp_ar["o_m"][] = "龙";
                    }else if( (int)$a[0] == (int)$a[4] ){
                        $temp_ar["o_m"][] = "和";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                }elseif($cp == 'gdklsf'){
                    // 根据广东快乐十分彩票的规则写
                    $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                    $temp_ar["o_m"][] = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                    if($zongshu > 84){
                        $temp_ar["o_m"][] = "大";
                    }else if( $zongshu == 84){
                        $temp_ar["o_m"][] = "和";
                    }else {
                        $temp_ar["o_m"][] = "小";
                    }
                    if( ( $zongshu )%2 == 0){
                        $temp_ar["o_m"][] = "双";
                    }else{
                        $temp_ar["o_m"][] = "单";
                    }
					$weidaxiao = $zongshu % 10;
					if( $weidaxiao < 5){
                        $temp_ar["o_m"][] = "小";
                    }else{
                        $temp_ar["o_m"][] = "大";
                    }
                    if( (int)$a[0] > (int)$a[7] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[1] > (int)$a[6] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[2] > (int)$a[5] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[3] > (int)$a[4] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                }elseif($cp == 'bjkl8'){
                    // 根据北京快乐8彩票的规则写
                    $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7]+(int)$a[8]+(int)$a[9]+(int)$a[10]+(int)$a[11]+(int)$a[12]+(int)$a[13]+(int)$a[14]+(int)$a[15]+(int)$a[16]+(int)$a[17]+(int)$a[18]+(int)$a[19]+(int)$a[20];
                    $temp_ar["o_m"][] = $zongshu;
                    if($zongshu > 810){
                        $temp_ar["o_m"][] = "大";
                    }else if( $zongshu == 810){
                        $temp_ar["o_m"][] = "和";
                    }else {
                        $temp_ar["o_m"][] = "小";
                    }
                    if( ( $zongshu )%2 == 0){
                        $temp_ar["o_m"][] = "双";
                    }else{
                        $temp_ar["o_m"][] = "单";
                    }
					$ppsz = array();
					$ppsz[] = (int)$a[0];
					$ppsz[] = (int)$a[1];
					$ppsz[] = (int)$a[2];
					$ppsz[] = (int)$a[3];
					$ppsz[] = (int)$a[4];
					$ppsz[] = (int)$a[5];
					$ppsz[] = (int)$a[6];
					$ppsz[] = (int)$a[7];
					$ppsz[] = (int)$a[8];
					$ppsz[] = (int)$a[9];
					$ppsz[] = (int)$a[10];
					$ppsz[] = (int)$a[11];
					$ppsz[] = (int)$a[12];
					$ppsz[] = (int)$a[13];
					$ppsz[] = (int)$a[14];
					$ppsz[] = (int)$a[15];
					$ppsz[] = (int)$a[16];
					$ppsz[] = (int)$a[17];
					$ppsz[] = (int)$a[18];
					$ppsz[] = (int)$a[19];
					$ppsz[] = (int)$a[20];
					$ppsz_dan=0; 
					$ppsz_shuang=0;
					$ppsz_qian=0; 
					$ppsz_hou=0;
					for ($w1=0; $w1<20; $w1++){
						if ($ppsz[$w1] %2 ==0) {
							$ppsz_shuang++; 
						}else {
							$ppsz_dan++; 
						}
					}
					for ($w1=0; $w1<21; $w1++){
						if ($ppsz[$w1] < 41) {
							$ppsz_qian++; 
						}else {
							$ppsz_hou++; 
						}
					}
                    if ( $ppsz_dan > $ppsz_shuang) {
                        $temp_ar["o_m"][] = "单多";
                    }else if ($ppsz_dan == $ppsz_shuang) {
                        $temp_ar["o_m"][] = "单双和";
                    }else {
                        $temp_ar["o_m"][] = "双多";
                    }
					if ( $ppsz_qian > $ppsz_hou) {
                        $temp_ar["o_m"][] = "前多";
                    }else if ($ppsz_qian == $ppsz_hou) {
                        $temp_ar["o_m"][] = "前后和";
                    }else {
                        $temp_ar["o_m"][] = "后多";
                    }
					if( $zongshu %2==0){
                       	if ($zongshu==810) {
						   $temp_ar["o_m"][] = "总和";
					   	}else if($zongshu>810){
						   $temp_ar["o_m"][] = "总双大";
					   	}else{
						   $temp_ar["o_m"][] = "总双小";
					   	}
					}else {
						if ($zongshu==810) {
						   $temp_ar["o_m"][] = "总和";
					   	}else if($zongshu>810){
						   $temp_ar["o_m"][] = "总单大";
					   	}else{
						   $temp_ar["o_m"][] = "总单小";
					   	}
					}
                    //金（210～695）、木（696～763）、水（764～855）、火（856～923）和土（924～1410）
                    if( ($zongshu < 696) && ($zongshu > 209)){
                        $temp_ar["o_m"][] = "金";
                    }else if( ($zongshu < 764) && ($zongshu > 695) ){
                        $temp_ar["o_m"][] = "木";
                    }else if( ($zongshu < 856) && ($zongshu > 763) ){
                        $temp_ar["o_m"][] = "水";
                    }else if( ($zongshu < 924) && ($zongshu > 855) ){
                        $temp_ar["o_m"][] = "火";
                    }else {
                        $temp_ar["o_m"][] = "土";
                    }
                }elseif($cp == 'jsk3'){
                    // 根据江苏快三彩票的规则写
                    $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2];
                    $temp_ar["o_m"][] = $zongshu;
                    if( ( $zongshu )%2 == 0){
                        $temp_ar["o_m"][] = "双";
                    }else{
                        $temp_ar["o_m"][] = "单";
                    }
                    if($zongshu > 10){
                        $temp_ar["o_m"][] = "大";
                    }else {
                        $temp_ar["o_m"][] = "小";
                    }
					//1鱼  2虾  3葫芦	 4金钱  5蟹   6鸡
					$ppx = array("1"=>"鱼","2"=>"虾","3"=>"葫芦","4"=>"金钱","5"=>"蟹","6"=>"鸡");
					$temp_ar["o_m"][] = $ppx[(int)$a[1]];
					$temp_ar["o_m"][] = $ppx[(int)$a[1]];
					$temp_ar["o_m"][] = $ppx[(int)$a[2]];
                }elseif($cp == 'cqklsf'){
                    // 根据重庆快乐十分彩票的规则写
                    $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                    $temp_ar["o_m"][] = $zongshu;
                    if( ( $zongshu )%2 == 0){
                        $temp_ar["o_m"][] = "双";
                    }else{
                        $temp_ar["o_m"][] = "单";
                    }
                    if($zongshu > 10){
                        $temp_ar["o_m"][] = "大";
                    }else {
                        $temp_ar["o_m"][] = "小";
                    }
                    if((int)$a[7] > 10){
                        $temp_ar["o_m"][] = "大";
                    }else {
                        $temp_ar["o_m"][] = "小";
                    }
                    if( (int)$a[0] > (int)$a[7] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[1] > (int)$a[6] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[2] > (int)$a[5] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                    if( (int)$a[3] > (int)$a[4] ){
                        $temp_ar["o_m"][] = "龙";
                    }else{
                        $temp_ar["o_m"][] = "虎";
                    }
                }
                $redata["list"][] = $temp_ar;
            }
        }elseif($cp =='hk6'){
            // 颜色对照表
            $pp = array(1=>"red",2=>"red",7=>"red",8=>"red",12=>"red",13=>"red",18=>"red",19=>"red",23=>"red",24=>"red",29=>"red",30=>"red",34=>"red",35=>"red",40=>"red",45=>"red",46=>"red",3=>"blue", 4=>"blue", 9=>"blue", 10=>"blue", 14=>"blue", 15=>"blue", 20=>"blue", 25=>"blue", 26=>"blue", 31=>"blue", 36=>"blue", 37=>"blue", 41=>"blue", 42=>"blue", 47=>"blue", 48=>"blue", 5=>"green", 6=>"green", 11=>"green", 16=>"green", 17=>"green", 21=>"green", 22=>"green", 27=>"green", 28=>"green", 32=>"green", 33=>"green", 38=>"green", 39=>"green", 43=>"green", 44=>"green", 49=>"green");
            // 生肖计算
            // var now=new Date(); 
            // var year=now.getFullYear();
            $year =  (int)date('Y',time());
            // var ss=year-2008;//设定2008为初始年份 
            $ss = $year - 2008;
            // var ssc=ss%12; 
            $ssc = $ss % 12;
            // var ssyear=new Array("子鼠","丑牛","寅虎","卯兔","辰龙","巳蛇","午马","未羊","申猴","酉鸡","戌狗","亥猪"); 
            $ssyear = array("鸡","猴","羊","马","蛇","龙","兔","虎","牛","鼠","猪","狗");
            // document.write(year+"年\n"+ssyear[ssc]); 
            $redata["status"] = 0;
            $redata["msg"] = '';
            $redata["chk_key"] = 'History_HisListLHC_2016-01-01';
            $redata["list"] = array();
            foreach ($data as $k => $v) {
                $temp_ar["c_t"] =  (int)$v['expect'];
                $temp_ar["c_r"] =  array();
                $a = explode(',',$v['opencode']);
                foreach ($a as $kk => $vv) {
                    $temp_ar2 =  array();
                    $temp_ar2["no"]= (int)$vv;
                    $temp_ar2["an"]= $ssyear[((int)$vv % 12)];
                    $temp_ar2["co"]= $pp[(int)$vv];
                    $temp_ar["c_r"][] = $temp_ar2;
                }
                $temp_ar["c_d"] =  $v['opentime'];
                $temp_ar["c_d_w"] =  "";
                $temp_ar["list"] =  array();
                // 最后一个码拆分
                $b = array();
                if((int)$a[6] < 10){
                    $b[1] = 0;
                    $b[2] = $a[6];
                }else{
                    $b[1] = $a[6][0];
                    $b[2] = $a[6][1];
                }
                //总数
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6];
                $temp_ar["list"][] = $zongshu;
                // 单双
                if( ( $zongshu )%2 == 0){
                    $temp_ar["list"][] = "双";
                }else{
                    $temp_ar["list"][] = "单";
                }
                // 大小
                if($zongshu > 174){
                    $temp_ar["list"][] = "大";
                 }else {
                 $temp_ar["list"][] = "小";
                }
                // 七色波
				/*
				$ysred = array(1, 2, 7, 8, 12, 13, 18, 19, 23, 24, 29, 30, 34, 35, 40, 45, 46);
				$ysblue = array(3, 4, 9, 10, 14, 15, 20, 25, 26, 31, 36, 37, 41, 42, 47, 48);
				$ysgreen = array(5, 6, 11, 16, 17, 21, 22, 27, 28, 32, 33, 38, 39, 43, 44, 49);
				if (in_array((int)$a[6], $ysred)) {
					$temp_ar["list"][] = "红";
				}else if (in_array((int)$a[6], $ysblue)) {
					$temp_ar["list"][] = "蓝";
				}else {
					$temp_ar["list"][] = "绿";
				}
				*/
				$ppx = array("red"=>"红","blue"=>"蓝","green"=>"绿");
				$temp_ar["list"][] = $ppx[$pp[(int)$a[6]]];
                // 单双
                if( ((int)$a[6])%2 == 0){
                    $temp_ar["list"][] = "双";
                }else{
                    $temp_ar["list"][] = "单";
                }
                // 大小
                if( ((int)$a[6])>= 25){
                    $temp_ar["list"][] = "大";
                }else{
                    $temp_ar["list"][] = "小";
                }
				//拆特码
				
				$p1 = substr( $a[6], 0, 1 );
				$p2 = substr( $a[6], 1, 1 );
				
				// 合单双
				if( ($p1+$p2)%2 == 0){
                    $temp_ar["list"][] = "合双";
                }else{
                    $temp_ar["list"][] = "合单";
                }
                // 合大小
                if( ($p1+$p2)> 6){
                    $temp_ar["list"][] = "合大";
                }else{
                    $temp_ar["list"][] = "合小";
                }
                // 尾大小
                if( 4 < $p2){
                    $temp_ar["list"][] = "尾大";
                }else{
                    $temp_ar["list"][] = "尾小";
                }
                // 把处理好的数据加入到外部list中
                $redata["list"][] = $temp_ar;
            }
            // 根据香港六合彩的规则写！
        }
        return $redata;
    }
    public function servertimeAction(){
        $redata = array();
        $redata['s'] = 0;
        $redata['m'] = '';
        $redata['d'] = date('Y/m/d H:i:s',time());
        echo json_encode($redata);
    }
    // 极验验证
    public function geetestAction() {
        require EXTENSION_DIR.'Geetestlib.php';
        $GtSdk = new GeetestLib();
        $return = $GtSdk->register();
        if ($return) {
            $this->session->set_userdata('gtserver', 1);
            $result = array(
                'success' => 1,
                'gt' => SYS_GEE_CAPTCHA_ID,
                'challenge' => $GtSdk->challenge
            );
            echo json_encode($result);
        }else{
            $this->session->set_userdata('gtserver', 0);
            $rnd1 = md5(rand(0,100));
            $rnd2 = md5(rand(0,100));
            $challenge = $rnd1 . substr($rnd2,0,2);
            $result = array(
                'success' => 0,
                'gt' => CAPTCHA_ID,
                'challenge' => $challenge
            );
            $this->session->set_userdata('challenge', $result['challenge']);
            echo json_encode($result);
        }
        exit;
    }
    /**
     * JS调用数据
     */
    public function jsAction() {
        ob_start();
        $this->view->display($this->get('file'));
        $html = ob_get_contents();
        ob_clean();
        $html = addslashes(str_replace(array("\r", "\n", "\t", chr(13)), array('', '', '', ''), $html));
        echo 'document.write("' . $html . '");';
    }
    /**
     * 下载文件
     */
    public function downAction() {
        $data = fn_authcode(base64_decode($this->get('file')), 'DECODE');
        $file = isset($data['finecms']) && $data['finecms'] ? $data['finecms'] : '';
        if (empty($file)) {
            $this->msg(lang('a-mod-213'));
        }
        if (strpos($file, ':/')) {
            //远程
            header("Location: $file");
        } else {
            //本地
            $file = str_replace('..', '', $file);
            $file = strpos($file, '/') === 0 ? APP_ROOT.$file : $file;
            if (!is_file($file)) {
                $this->msg(lang('a-mod-214') . '(#' . $file . ')');
            };
            header('Pragma: public');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Cache-Control: pre-check=0, post-check=0, max-age=0');
            header('Content-Transfer-Encoding: binary');
            header('Content-Encoding: none');
            header('Content-type: ' . strtolower(trim(substr(strrchr($file, '.'), 1, 10))));
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Content-length: ' . sprintf("%u", filesize($file)));
            readfile($file);
            exit;
        }
    }
    /**
     * 缩略图
     */
    public function thumbAction() {
        $data = fn_authcode(base64_decode($this->get('img')), 'DECODE');
        $file = isset($data['finecms']) && $data['finecms'] && is_file($data['finecms']) ? $data['finecms'] : EXTENSION_PATH . '/null.jpg';
        $width = (int)$this->get('width');
        $height = (int)$this->get('height');
        if (!$width || !$height) {
            list($width, $height) = getimagesize($file);
        }
        ob_clean();
        $image = $this->instance('image_lib');
        if ($this->site['SITE_WATERMARK'] == 1) {   //图片水印
            //生成临时水印图
            $temp = $file . '.thumb.' . substr(strrchr(trim($file), '.'), 1);
            copy($file, $temp);
            $image->set_watermark_alpha($this->site['SITE_WATERMARK_ALPHA'])
                ->make_image_watermark($temp, $this->site['SITE_WATERMARK_POS'], $this->site['SITE_WATERMARK_IMAGE']);
            //缩略图
            $image->set_image_size($width, $height)->make_limit_image($temp, null);
            @unlink($temp);
        } elseif ($this->site['SITE_WATERMARK'] == 2) { //文字水印
            //生成临时水印图
            $temp = $file . '.thumb.' . substr(strrchr(trim($file), '.'), 1);
            copy($file, $temp);
            $image->set_text_content($this->site['SITE_WATERMARK_TEXT'])
                ->make_text_watermark($temp, $this->site['SITE_WATERMARK_POS'], $this->site['SITE_WATERMARK_SIZE']);
            //缩略图
            $image->set_image_size($width, $height)->make_limit_image($temp, null);
            @unlink($temp);
        } else {
            //无水印时
            $image->set_image_size($width, $height)->make_limit_image($file, null);
        }
    }
    /**
     * 文件信息查看
     */
    public function fileinfoAction() {
        $file = $this->post('file');    //文件
        if ($file && is_file($file)) {
            echo lang('a-att-6') . '：' . $file . '<br>' . lang('a-att-7') . '：' . date(TIME_FORMAT, @filemtime($file)) . '<br>' . lang('a-att-8') . '：' . formatFileSize(filesize($file)) . ' &nbsp;&nbsp;<a href="' . $file . '" target=_blank>' . lang('a-att-10') . '</a>';
        } else {
            echo '<a href="' . $file . '" target=_blank>' . $file . '</a>';
        }
    }
    /**
     * 静态页面数据处理（JS调用）
     */
    public function dataAction() {
        $file = $this->get('file') ? $this->get('file') : 'html';
        $data = base64_decode($this->get('data'));
        $data = fn_authcode($data, 'DECODE');
        ob_start();
        if (count($data) == 1 && isset($data['finecms_html_to_data'])) {
            $this->view->assign('data', $data['finecms_html_to_data']);
        } else {
            $this->view->assign($data);
        }
        $this->view->display($file);
        $html = ob_get_contents();
        ob_clean();
        $html = addslashes(str_replace(array("\r", "\n", "\t", chr(13)), array('', '', '', ''), $html));
        echo 'document.write("' . $html . '");';
    }
    /**
     * 移动客户端模板Ajax数据调用
     */
    public function mobiledataAction() {
        $tpl = $this->post('tpl');  //模板
        $page = $this->post('page');    //数据分页
        $catid = $this->post('catid');  //栏目id
        $this->view->assign(array(
            'page'  => $page + 1,
            'catid' => $catid
        ));
        $this->view->display($tpl);
    }
    /**
     * 移动客户端获取栏目数据
     */
    public function categoryAction() {
        $this->view->assign('meta_title', '栏目-' . $this->site['SITE_NAME']);
        $this->view->display('category');
    }
    /**
     * Jquery-autocomplete插件搜索提示
     */
    public function searchAction() {
        $kw = str_replace(' ', '%', urldecode($this->get('q')));
        $mid = (int)$this->get('modelid');
        if ($kw) {
            $query = $this->content->where('title like ?', '%' . $kw . '%');
            $query->where('status=1');
            if ($mid) {
                $query->where('modelid=' . $mid);
            }
            $data = $query->order('updatetime desc')->limit(10)->select();
            if ($data) {
                foreach ($data as $t) {
                    echo $t['title'] . PHP_EOL;
                }
            }
        }
    }
    /**
     * 会员登录信息JS调用
     */
    public function userAction() {
        ob_start();
        $this->view->display('user');
        $html = ob_get_contents();
        ob_clean();
        $html = addslashes(str_replace(array("\r", "\n", "\t", chr(13)), array('', '', '', ''), $html));
        echo 'document.write("' . $html . '");';
    }
    /**
     * 更新浏览数
     */
    public function hitsAction() {
        $id = (int)$this->get('id');
        if (empty($id)) {
            exit('document.write(\'0\');');
        }
        $data = $this->content->find($id, 'hits');
        if (empty($data)) {
            exit('document.write(\'0\');');
        }
        $hits = $data['hits'];
        $this->content->update(array('hits' => $hits + 1), 'id=' . $id);
        echo "document.write('" . ($hits + 1) . "');";
    }
    /**
     * 验证码
     */
    public function captchaAction() {
        $api = $this->instance('captcha');
        $width = $this->get('width');
        $height = $this->get('height');
        if ($width) {
            $api->width = $width;
        }
        if ($height) {
            $api->height = $height;
        }
        $this->session->set('captcha', $api->get_code());
        $api->doimage((int)$this->site['SYS_CAPTCHA_MODE']);
    }
    /**
     * 生成拼音
     */
    public function pinyinAction() {
        echo word2pinyin($this->post('name'));
    }
    /**
     * 获取关键字
     */
    public function ajaxkwAction() {
        $data = $this->post('data');
        if (empty($data)) {
            exit('');
        }
        echo getKw($data);
    }
    /**
     * 联动菜单数据
     */
    public function linkageAction() {
        $keyid = (int)$this->get('id');
        $parentid = (int)$this->get('parent_id');
        $linkage = get_linkage_data();
        $infos = $linkage[$keyid]['data'];
        $json = array();
        foreach ($infos as $k=>$v) {
            if ($v['parentid'] == $parentid) {
                $json[] = array('region_id' => $v['id'], 'region_name' => $v['name']);
            }
        }
        echo json_encode($json);
    }
    /*
     * 百度地图调用
     */
    public function baidumapAction() {
        $city = $this->get('city');
        $this->view->assign(array(
            'city' => $city == '{SITE}' ? $this->site['SITE_NAME'] : $city,
            'name' => $this->get('name'),
            'value' => $this->get('value'),
            'apikey' => $this->get('apikey'),
        ));
        $this->view->display('../admin/baidumap');
    }
    /*
     * 加入收藏夹
     */
    public function addfavoriteAction() {
        $id = (int)$this->post('id');
        if (empty($id)) {
            exit(lang('api-0'));
        }
        if (!$this->memberinfo) {
            exit(lang('api-1'));
        }
        $db = $this->model('favorite');
        $row = $db->getOne('site=' . $this->siteid . ' AND userid=' . $this->memberinfo['id'] . ' AND contentid=' . $id, null, array('id'));
        if ($row) {
            exit(lang('api-2'));
        }
        $data = $this->content->find($id, 'title,url');
        if (empty($data)) {
            exit(lang('api-3'));
        }
        $db->insert(array('site' => $this->siteid, 'title' => $data['title'], 'url' => $data['url'], 'contentid' => $id, 'userid' => $this->memberinfo['id'], 'adddate' => time()));
        exit(lang('api-4'));
    }
}