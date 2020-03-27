<?php
class Api2Controller extends Common {
    public function __construct() {
        parent::__construct();
    }
    // 获取线路最新期数
    public function getLastDataAction(){
        $this->updateData();
        $cp = isset($_GET['cp']) ? $_GET['cp']:'';
        $table = 'content_'.$this->siteid.'_'.$cp;
        $content = Controller::model('content');
        $content->table_name = $content->prefix.$table;
        $data = $content->getOne('`id`<>0 ORDER BY `expect` DESC');
        if(!$data){
            $this->updateData();
            $data = $content->getOne('`id`<>0 ORDER BY `expect` DESC');
        }
            $redata["s"] = 0;
            $redata["m"] = "";
            $redata["c"] = $cp;
            $redata["c_t"] = (int)$data['expect'];
            $redata["c_d"] = $data['opentime'];
            $redata["c_r"] = $data['opencode'];
            $redata["n_t"] = (int)$data['expect']+1;
            $redata["n_d"] = "";
            $redata["l_c"] = (int)$data['expect'];
            $redata["no"] = '';
            $redata["o_g"] = 100;
            $redata["o_info"] = "每10分钟";
            $redata["os"] = 0;
            $redata["osm"] = "暂停开奖";
            $redata["o_m"] = array();
            $a = explode(',',$data['opencode']);
            $temp_ar = array();
            if($cp == "cqssc"){
                // 根据重庆彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4];
                $redata["o_m"][] = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4];
                if($zongshu > 22){
                    $redata["o_m"][] = "大";
                }else{
                    $redata["o_m"][] = "小";
                }
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if( (int)$a[0] > (int)$a[1] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
            }elseif($cp == "bjpk10"){
                $redata["o_m"][] = (int)$a[0]+(int)$a[1];
                if((int)$a[0]+(int)$a[1] > 11){
                    $redata["o_m"][] = "大";
                }else{
                    $redata["o_m"][] = "小";
                }
                if( ( (int)$a[0] + (int)$a[1] )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if( (int)$a[1] > (int)$a[9] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[1] > (int)$a[8] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[2] > (int)$a[7] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[3] > (int)$a[6] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[4] > (int)$a[5] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
            }elseif($cp == "gdklsf"){
                // 根据广东快乐十分彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                $redata["o_m"][] = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                if($zongshu > 84){
                    $redata["o_m"][] = "大";
                }else if( $zongshu = 84){
                    $redata["o_m"][] = "和";
                }else {
                    $redata["o_m"][] = "小";
                }
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if( (int)$a[0] > (int)$a[7] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[1] > (int)$a[6] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[2] > (int)$a[5] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[3] > (int)$a[4] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
            }elseif($cp == "bjkl8"){
                // 根据北京快乐8彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7]+(int)$a[8]+(int)$a[9]+(int)$a[10]+(int)$a[11]+(int)$a[12]+(int)$a[13]+(int)$a[14]+(int)$a[15]+(int)$a[16]+(int)$a[17]+(int)$a[18]+(int)$a[19]+(int)$a[20];
                $redata["o_m"][] = $zongshu;
                if($zongshu > 810){
                    $redata["o_m"][] = "大";
                }else if( $zongshu = 810){
                    $redata["o_m"][] = "和";
                }else {
                    $redata["o_m"][] = "小";
                }
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
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
                        $redata["o_m"][] = "单多";
                    }else if ($ppsz_dan == $ppsz_shuang) {
                        $redata["o_m"][] = "单双和";
                    }else {
                        $redata["o_m"][] = "双多";
                    }
					if ( $ppsz_qian > $ppsz_hou) {
                        $redata["o_m"][] = "前多";
                    }else if ($ppsz_qian == $ppsz_hou) {
                        $redata["o_m"][] = "前后和";
                    }else {
                        $redata["o_m"][] = "后多";
                    }
					if( $zongshu %2==0){
                       	if ($zongshu==810) {
						   $redata["o_m"][] = "总和";
					   	}else if($zongshu>810){
						   $redata["o_m"][] = "总双大";
					   	}else{
						   $redata["o_m"][] = "总双小";
					   	}
					}else {
						if ($zongshu==810) {
						   $redata["o_m"][] = "总和";
					   	}else if($zongshu>810){
						   $redata["o_m"][] = "总单大";
					   	}else{
						   $redata["o_m"][] = "总单小";
					   	}
					}
					//金（210～695）、木（696～763）、水（764～855）、火（856～923）和土（924～1410）
                    if( ($zongshu < 696) && ($zongshu > 209)){
                        $redata["o_m"][] = "金";
                    }else if( ($zongshu < 764) && ($zongshu > 695) ){
                        $redata["o_m"][] = "木";
                    }else if( ($zongshu < 856) && ($zongshu > 763) ){
                        $redata["o_m"][] = "水";
                    }else if( ($zongshu < 924) && ($zongshu > 855) ){
                        $redata["o_m"][] = "火";
                    }else {
                        $redata["o_m"][] = "土";
                    }
            }elseif($cp == "jsk3"){
                // 根据江苏快三彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2];
                $redata["o_m"][] = $zongshu;
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if($zongshu > 10){
                    $redata["o_m"][] = "大";
                }else {
                    $redata["o_m"][] = "小";
                }
                //1鱼  2虾  3葫芦    4金钱  5蟹   6鸡                    
                $ppx = array("1"=>"鱼","2"=>"虾","3"=>"葫芦","4"=>"金钱","5"=>"蟹","6"=>"鸡");
                $redata["o_m"][] = $ppx[(int)$a[1]];
                $redata["o_m"][] = $ppx[(int)$a[1]];
                $redata["o_m"][] = $ppx[(int)$a[2]];
            }elseif($cp == "cqklsf"){
                // 根据重庆快乐十分彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                $redata["o_m"][] = $zongshu;
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if($zongshu > 10){
                    $redata["o_m"][] = "大";
                }else {
                    $redata["o_m"][] = "小";
                }
                if((int)$a[7] > 10){
                    $redata["o_m"][] = "大";
                }else {
                    $redata["o_m"][] = "小";
                }
                if( (int)$a[0] > (int)$a[7] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[1] > (int)$a[6] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[2] > (int)$a[5] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[3] > (int)$a[4] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
            }elseif($cp == "hk6"){
                $pp = array(1=>"red",2=>"red",7=>"red",8=>"red",12=>"red",13=>"red",18=>"red",19=>"red",23=>"red",24=>"red",29=>"red",30=>"red",34=>"red",35=>"red",40=>"red",45=>"red",46=>"red",3=>"blue", 4=>"blue", 9=>"blue", 10=>"blue", 14=>"blue", 15=>"blue", 20=>"blue", 25=>"blue", 26=>"blue", 31=>"blue", 36=>"blue", 37=>"blue", 41=>"blue", 42=>"blue", 47=>"blue", 48=>"blue", 5=>"green", 6=>"green", 11=>"green", 16=>"green", 17=>"green", 21=>"green", 22=>"green", 27=>"green", 28=>"green", 32=>"green", 33=>"green", 38=>"green", 39=>"green", 43=>"green", 44=>"green", 49=>"green");
                $year =  (int)date('Y',time());
                $ss = $year - 2008;
                $ssc = $ss % 12;
                $ssyear = array("鸡","猴","羊","马","蛇","龙","兔","虎","牛","鼠","猪","狗");
                $redata["o_g"] = 400;
                $redata["n_d"] = block(1);
                $redata["c_s"] = 4;
                $a = explode(',', $data['opencode']);
                $redata["c_r"] = array();
                foreach ($a as $kk => $vv) {
                    $temp_ar =  array();
                    $temp_ar["no"]= (int)$vv;
                    $temp_ar["an"]= $ssyear[((int)$vv % 12)];
                    $temp_ar["co"]= $pp[(int)$vv];
                    $redata["c_r"][] = $temp_ar;
                }
            }
        echo json_encode($redata);
    }
    // 获取线路最新期数
    public function getLastAction(){
        $this->updateData();
        $cp = isset($_GET['cp']) ? $_GET['cp']:'';
        $table = 'content_'.$this->siteid.'_'.$cp;
        $content = Controller::model('content');
        $content->table_name = $content->prefix.$table;
        $data = $content->getOne('`id`<>0 ORDER BY `expect` DESC');
        if(!$data){
            $this->updateData();
            $data = $content->getOne('`id`<>0 ORDER BY `expect` DESC');
        }
        $redata["s"] = 0;
        $redata["c"] = $cp;
        $redata["m"] = "";
        $redata["c_t"] = (int)$data['expect'];
        echo json_encode($redata);
    }
    // 获取六合彩单条数据
    public function getHk6Action(){
        // 
        $cp = isset($_GET['cp']) ? $_GET['cp']:'';
        $table = 'content_'.$this->siteid.'_'.$cp;
        // 附表
        $content = Controller::model('content');
        $content->table_name = $content->prefix.$table;
        $data = $content->getOne('`id`<>0 ORDER BY `expect` DESC');
            // 颜色对照表
         $pp = array(1=>"red",2=>"red",7=>"red",8=>"red",12=>"red",13=>"red",18=>"red",19=>"red",23=>"red",24=>"red",29=>"red",30=>"red",34=>"red",35=>"red",40=>"red",45=>"red",46=>"red",3=>"blue", 4=>"blue", 9=>"blue", 10=>"blue", 14=>"blue", 15=>"blue", 20=>"blue", 25=>"blue", 26=>"blue", 31=>"blue", 36=>"blue", 37=>"blue", 41=>"blue", 42=>"blue", 47=>"blue", 48=>"blue", 5=>"green", 6=>"green", 11=>"green", 16=>"green", 17=>"green", 21=>"green", 22=>"green", 27=>"green", 28=>"green", 32=>"green", 33=>"green", 38=>"green", 39=>"green", 43=>"green", 44=>"green", 49=>"green");
            // 生肖计算
            $year =  (int)date('Y',time());
            $ss = $year - 2008;
            $ssc = $ss % 12;
            $ssyear = array("鸡","猴","羊","马","蛇","龙","兔","虎","牛","鼠","猪","狗");
            $redata["s"] = 0;
            $redata["c"] = $cp;
            $redata["m"] = "";
            $redata["c_t"] = (int)$data['expect'];
            $redata["c_r"] = array();
            $a = explode(',',$data['opencode']);
            foreach ($a as $kk => $vv) {
                $temp_ar2 =  array();
                $temp_ar2["no"]= (int)$vv;
                $temp_ar2["an"]= $ssyear[((int)$vv % 12)];
                $temp_ar2["co"]= $pp[(int)$vv];
                $redata["c_r"][] = $temp_ar2;
            }
            $redata["c_s"] = 4;
            $redata["c_d"] = $data['opentime'];
            $redata["c_d_w"] = "";
            $redata["o_g"] = 400;
            $redata["n_t"] = (int)$data['expect']+1;
            $redata["n_d"] = block(1);
            $redata["n_d_w"] = "";
        echo json_encode($redata);
    }
    // 获取其他数据
    public function getOthersAction(){
        $this->updateData();
        // 
        $cp = isset($_GET['cp']) ? $_GET['cp']:'';
        $table = 'content_'.$this->siteid.'_';
        // 附表
        $cps = array("cqssc","bjpk10","gdklsf","bjkl8","jsk3","cqklsf","hk6");
        $content = Controller::model('content');
        $datare["s"] = 0;
        $datare["m"] = "";
        $datare["list"] =array();
        foreach ($cps as $k => $v) {
            $content->table_name = $content->prefix.$table.$v;
            $data = $content->getOne('`id`<>0 ORDER BY `expect` DESC');
            $redata["s"] = 0;
            $redata["m"] = "";
            $redata["c"] = $v;
            $redata["c_t"] = (int)$data['expect'];
            $redata["c_d"] = $data['opentime'];
            $redata["c_r"] = $data['opencode'];
            $redata["n_t"] = (int)$data['expect']+1;
            $redata["n_d"] = "";
            $redata["l_c"] = (int)$data['expect'];
            $redata["no"] = '';
            $redata["o_g"] = 100;
            $redata["o_info"] = "每10分钟";
            $redata["os"] = 0;
            $redata["osm"] = "暂停开奖";
            $redata["o_m"] = array();
            $a = explode(',',$data['opencode']);
            $temp_ar = array();
            if($v == "cqssc"){
                // 根据重庆彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4];
                $redata["o_m"][] = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4];
                if($zongshu > 22){
                    $redata["o_m"][] = "大";
                }else{
                    $redata["o_m"][] = "小";
                }
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if( (int)$a[0] > (int)$a[4] ){
                    $redata["o_m"][] = "龙";
                }else if( (int)$a[0] == (int)$a[4] ){
                    $redata["o_m"][] = "和";
                }else{
                    $redata["o_m"][] = "虎";
                }
            }elseif($v == "bjpk10"){
                $redata["o_m"][] = (int)$a[0]+(int)$a[1];
                if((int)$a[0]+(int)$a[1] > 11){
                    $redata["o_m"][] = "大";
                }else{
                    $redata["o_m"][] = "小";
                }
                if( ( (int)$a[0] + (int)$a[1] )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if( (int)$a[0] > (int)$a[9] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[1] > (int)$a[8] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[2] > (int)$a[7] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[3] > (int)$a[6] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[4] > (int)$a[5] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
            }elseif($v == "gdklsf"){
                // 根据广东快乐十分彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                $redata["o_m"][] = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                if($zongshu > 84){
                    $redata["o_m"][] = "大";
                }else if( $zongshu = 84){
                    $redata["o_m"][] = "和";
                }else {
                    $redata["o_m"][] = "小";
                }
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if( (int)$a[0] > (int)$a[7] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[1] > (int)$a[6] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[2] > (int)$a[5] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[3] > (int)$a[4] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
            }elseif($v == "bjkl8"){
                // 根据北京快乐8彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7]+(int)$a[8]+(int)$a[9]+(int)$a[10]+(int)$a[11]+(int)$a[12]+(int)$a[13]+(int)$a[14]+(int)$a[15]+(int)$a[16]+(int)$a[17]+(int)$a[18]+(int)$a[19]+(int)$a[20];
                $redata["o_m"][] = $zongshu;
                if($zongshu > 810){
                    $redata["o_m"][] = "大";
                }else if( $zongshu = 810){
                    $redata["o_m"][] = "和";
                }else {
                    $redata["o_m"][] = "小";
                }
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
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
                        $redata["o_m"][] = "单多";
                    }else if ($ppsz_dan == $ppsz_shuang) {
                        $redata["o_m"][] = "单双和";
                    }else {
                        $redata["o_m"][] = "双多";
                    }
					if ( $ppsz_qian > $ppsz_hou) {
                        $redata["o_m"][] = "前多";
                    }else if ($ppsz_qian == $ppsz_hou) {
                        $redata["o_m"][] = "前后和";
                    }else {
                        $redata["o_m"][] = "后多";
                    }
					if( $zongshu %2==0){
                       	if ($zongshu==810) {
						   $redata["o_m"][] = "总和";
					   	}else if($zongshu>810){
						   $redata["o_m"][] = "总双大";
					   	}else{
						   $redata["o_m"][] = "总双小";
					   	}
					}else {
						if ($zongshu==810) {
						   $redata["o_m"][] = "总和";
					   	}else if($zongshu>810){
						   $redata["o_m"][] = "总单大";
					   	}else{
						   $redata["o_m"][] = "总单小";
					   	}
					}
					//金（210～695）、木（696～763）、水（764～855）、火（856～923）和土（924～1410）
                    if( ($zongshu < 696) && ($zongshu > 209)){
                        $redata["o_m"][] = "金";
                    }else if( ($zongshu < 764) && ($zongshu > 695) ){
                        $redata["o_m"][] = "木";
                    }else if( ($zongshu < 856) && ($zongshu > 763) ){
                        $redata["o_m"][] = "水";
                    }else if( ($zongshu < 924) && ($zongshu > 855) ){
                        $redata["o_m"][] = "火";
                    }else {
                        $redata["o_m"][] = "土";
                    }
            }elseif($v == "jsk3"){
                // 根据江苏快三彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2];
                $redata["o_m"][] = $zongshu;
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if($zongshu > 10){
                    $redata["o_m"][] = "大";
                }else {
                    $redata["o_m"][] = "小";
                }
                //1鱼  2虾  3葫芦    4金钱  5蟹   6鸡                    
                $ppx = array("1"=>"鱼","2"=>"虾","3"=>"葫芦","4"=>"金钱","5"=>"蟹","6"=>"鸡");
                $redata["o_m"][] = $ppx[(int)$a[1]];
                $redata["o_m"][] = $ppx[(int)$a[1]];
                $redata["o_m"][] = $ppx[(int)$a[2]];
            }elseif($v == "cqklsf"){
                // 根据重庆快乐十分彩票的规则写
                $zongshu = (int)$a[0]+(int)$a[1]+(int)$a[2]+(int)$a[3]+(int)$a[4]+(int)$a[5]+(int)$a[6]+(int)$a[7];
                $redata["o_m"][] = $zongshu;
                if( ( $zongshu )%2 == 0){
                    $redata["o_m"][] = "双";
                }else{
                    $redata["o_m"][] = "单";
                }
                if($zongshu > 10){
                    $redata["o_m"][] = "大";
                }else {
                    $redata["o_m"][] = "小";
                }
                if((int)$a[7] > 10){
                    $redata["o_m"][] = "大";
                }else {
                    $redata["o_m"][] = "小";
                }
                if( (int)$a[0] > (int)$a[7] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[1] > (int)$a[6] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[2] > (int)$a[5] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
                if( (int)$a[3] > (int)$a[4] ){
                    $redata["o_m"][] = "龙";
                }else{
                    $redata["o_m"][] = "虎";
                }
            }
            $datare["list"][] = $redata;
        }
        echo json_encode($datare);
    }
	/*
    // 更新数据
    private function updateData2Action(){
        // "cqssc","bjpk10","gdklsf","bjkl8","jsk3","cqklsf"
        $cps = array();
        $d_time = 20;

        $cps[1] = array("name"=>"cqssc","catid"=>3,"modelid"=>10);
        $cps[2] = array("name"=>"bjpk10","catid"=>2,"modelid"=>9);
        $cps[3] = array("name"=>"gdklsf","catid"=>5,"modelid"=>12);
        $cps[4] = array("name"=>"bjkl8","catid"=>6,"modelid"=>13);
        $cps[5] = array("name"=>"jsk3","catid"=>7,"modelid"=>14);
        $cps[6] = array("name"=>"cqklsf","catid"=>8,"modelid"=>15);

        foreach ($cps as $k => $v) {
            $catid = $v['catid'];
            $modelid = $v['modelid'];
            $cp = $v['name'];
            # code...
            for($i = $d_time;$i>0;$i--){
                $t_date = date("Y-m-d",time()-$i*60*60*24);
                $url = "http://c.apiplus.net/newly.do?token=e2768fbb83274970&code=".$cp."&date=".$t_date."&format=json";
                $data = $this->downData($url, $catid, $modelid, $cp);
            }
        }
    }
	*/
	
    // 更新数据
    private function updateData(){
        // "cqssc","bjpk10","gdklsf","bjkl8","jsk3","cqklsf"
        $cps = array();
        $cps[1] = array("name"=>"cqssc","catid"=>3,"modelid"=>10);
        $cps[2] = array("name"=>"bjpk10","catid"=>2,"modelid"=>9);
        $cps[3] = array("name"=>"gdklsf","catid"=>5,"modelid"=>12);
        $cps[4] = array("name"=>"bjkl8","catid"=>6,"modelid"=>13);
        $cps[5] = array("name"=>"jsk3","catid"=>7,"modelid"=>14);
        $cps[6] = array("name"=>"cqklsf","catid"=>8,"modelid"=>15);
        $cps[7] = array("name"=>"hk6","catid"=>4,"modelid"=>11);
        foreach ($cps as $k => $v) {
            $catid = $v['catid'];

            $modelid = $v['modelid'];
            $cp = $v['name'];
            # code...
            //$url = "http://c.apiplus.net/newly.do?token=e2768fbb83274970&code=".$cp."&date=".date("Y-m-d")."&format=json";
            $url = "http://c.apiplus.net/newly.do?token=d23785e6ecb3baf7&code=".$cp."&date=".date("Y-m-d")."&format=json";
            $data = $this->downData($url, $catid, $modelid, $cp);
        }
    }
    private function downData($url, $catid = 1, $modelid, $cp, $last_time,$table,$content){
        $content = Controller::model('content_'.$this->siteid);
        $content_2 = Controller::model('content');
        $table = 'content_'.$this->siteid.'_'.$cp;
        $content_2->table_name = $content_2->prefix.$table;
        $last_data = $content_2->getOne('`id`<>0 ORDER BY `expect` DESC');
        if($last_data){
            $last_time = strtotime($last_data['opentime']);
        }else{
            $last_time = 0;
        }
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
                //$value['opencode'] = preg_replace('/^0/','',$value['opencode']);
                //$value['opencode'] = preg_replace('/,0(\d)/',',\\1',$value['opencode']);
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
}