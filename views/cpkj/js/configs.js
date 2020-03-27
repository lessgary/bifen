// 全局配置文件
var configs = {
    'bjpk10':{
        'id':'10016',
        'change_time':'305',
        'o_info':'每5分钟',
        'no':'179',
        'o_g':100,
        'o_info_t':'9:06:00',
    },
    'cqssc':{//重庆时时彩
        'id':'10011',
        'change_time':'305',
        'o_info':'每5/10分钟',
        'no':'120',
        'o_g':100,
        'o_info_t':'0:05:00',
    },
    'gdklsf':{//广东快乐十分
        'id':'1008',//彩种ID
        'change_time':'605',//10分钟*60+5秒
        'o_info':'每10分钟',
        'no':'84',//全天总期数
        'o_g':100,
        'o_info_t':'9:00:00',//当天第一期开始时间
    },
    'bjkl8':{//北京快乐8
        'id':'10014',//彩种ID
        'change_time':'305',//5分钟*60+5秒
        'o_info':'每5分钟',
        'no':'179',//全天总期数
        'o_g':100,
        'o_info_t':'9:00:00',//当天第一期开始时间
    },
    'jsk3':{//江苏快三
        'id':'1006',//彩种ID
        'change_time':'605',//10分钟*60+5秒
        'o_info':'每10分钟',
        'no':'82',//全天总期数
        'o_g':100,
        'o_info_t':'8:30:00',//当天第一期开始时间
    },
    'cqklsf':{//重庆快乐十分
        'id':'10010',//彩种ID
        'change_time':'605',//10分钟*60+5秒
        'o_info':'每10分钟',
        'no':'97',//全天总期数
        'o_g':100,
        'o_info_t':'00:04:00',//当天第一期开始时间
    },
    'hk6':{
        'id':'4001',//彩种ID
        'change_time':'86405',//2天*24小时*60分钟*60+5秒=2*24*60*60+5=172805      1天*24小时*60分钟*60+5秒=1*24*60*60+5=172805=86405
        'o_info':'每5/10分钟',
        'no':'120',
        'o_g':400,
        'o_info_t':'21:30:00',
    }
}

// 设置重庆时时彩
var d = new Date();
var h = d.getHours();
if(h >=22 && h <= 24){
    configs["cqssc"]["change_time"] = "305";
}else{
    configs["cqssc"]["change_time"] = "605";
}
// 设置北京快乐8
if(h >=0 && h <= 8){
    configs["bjkl8"]["change_time"] = "32405";
}else{
    configs["bjkl8"]["change_time"] = "305";
}
// 设置北京快乐8
if(h >=22 && h <= 8){
    configs["jsk3"]["change_time"] = "36005";
}else{
    configs["jsk3"]["change_time"] = "305";
}