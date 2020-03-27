jQuery(document).ready(function($) {
    // 奖项开奖间隔时间——估计要考虑晚上有没有开奖
    var ChangeTimes = {
        bjpk10 : '300', //时间间隔以秒为单位，每个彩票的规则不同，按规则填写；以5分钟为例，5*60 = 300
        // 下面增加其他抽奖的时间间隔
        xxx : '3600',  // .....
    }
    var LastTimes = {
        bjpk10 : '1457684272', //数据库内上一次最后一次更新的时间，要通过{list}获取，然后放到js代码里面
        // 下面增加其他抽奖的时间间隔
        xxx : '3600',  // .....
    }
    // console.log(NextTimes['bjpk10']);

    // 判断"当前时间"是否大于"最后更新时间"+"彩票开奖时间间隔"，
    // 所有时间使用unix 时间戳进行计算

    var NowD = new Date();
    var NowTime = parseInt(NowD.getTime()/1000);  //毫秒数要除以1000得到秒


   if(NowTime > (parseInt(LastTimes['bjpk10']) + parseInt(ChangeTimes['bjpk10']))){
        // 需要更新数据
        // 通过ajax直接调用finecms api接口进行数据更新）
        // 测试请求地址：
        console.log("test");
        // http://fn109-test.h5power.cn/index.php?c=api&a=updateinfo&cp=bjpk10&uptime=1457619579&chtime=300&catid=1&modelid=8
        $.get('index.php?c=api&a=updateinfo&cp='+'bjpk10'+'&uptime='+NowTime+'&chtime='+ChangeTimes['bjpk10']+'&catid=1&modelid=8', function(data) {
            /*optional stuff to do after success */
            // 得到最新数据后，更新dom
            var new_html = '<tr><td>期数</td><td width="50%">号码</td><td>时间</td></tr>';
            window.obj = eval ("(" + data + ")");
            for(i in obj.data){
                // console.log(obj.data[i]['expect']);
                new_html = new_html 
                            + '<tr><td>' + obj.data[i]['expect']
                            + '</td><td>' + obj.data[i]['opencode']
                            + '</td><td>' + obj.data[i]['opentime']
                            + '</td></tr>';
            }
           $('#test').html(new_html);
        });
    }
});