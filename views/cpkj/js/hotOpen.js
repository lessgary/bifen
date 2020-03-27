
var cTermMap = new Object();//最新期数
var nTermTimeMap = new Object();
var openStatusMap = new Object();
$(document).ready(function () {
    getserverTime();
    load_all();
    load_newHK6();
});
function load_all() {
    var post_path = "index.php?c=api2&a=getOthers&_=" + Math.random(6);
    $.ajax({
        url: post_path,
        type: "GET",
        dataType: 'json',
        timeout: 50000,
        beforeSend: function () { },
        success: function (json) {
            if (json.s == 0) {
                for (var i = 0; i < json.list.length; i++) {
                    var result = json.list[i];
                    iniData(result)
                }
                runTimer();
            } else {
            }
        },
        complete: function (XMLHttpRequest, textStatus) { },
        error: function (xhr) { }
    });
}
function load_peroids(key) {
	for(x in configs){
		if(configs[x]['id'] == key){
			var cp = x;
		}
	}
    var post_path = "index.php?c=api2&a=getLast&cp=" + cp  + "&_=" + Math.random(6);
    $.ajax({
        url: post_path,
        type: "GET",
        dataType: 'json',
        timeout: 20000,
        beforeSend: function () { },
        success: function (json) {
            if (json.s == 0) {
                if (cTermMap[key] != json.c_t) { 
                    load_new(key);
                } else {
                    setTimeout(function () { load_peroids(key) },3000);
                }
            } else {
                setTimeout(function () { load_peroids(key) }, 5000);
            }
        },
        complete: function (XMLHttpRequest, textStatus) { },
        error: function (xhr) {
            setTimeout(function () { load_peroids(key) }, 10000);
        }
    });
}
function load_new(key) {
	for(x in configs){
		if(configs[x]['id'] == key){
			var cp = x;
		}
	}
    var post_path = "index.php?c=api2&a=getLastData&cp=" + cp   + "&_=" + Math.random(6);
    $.ajax({
        url: post_path,
        type: "GET",
        dataType: 'json',
        timeout: 20000,
        beforeSend: function () { },
        success: function (json) {
            if (key != "4001") {
                iniData(json);
            } else { 
            }
        },
        complete: function (XMLHttpRequest, textStatus) { },
        error: function (xhr) {
            setTimeout(function () { load_new() }, 3000);
        }
    });
}
function iniData(result) {
    try {
        var key = configs[result.c]['id'];
        iniMap(key);
        cTermMap[key] = result.c_t;
        result.n_d = strToDate(result.c_d).getTime() + configs[result.c]['change_time']*1000;
        result.o_g = configs[result.c]['o_g'];
        result.o_info_t = configs[result.c]['o_info_t'];

        nTermTimeMap[key] = strToDate(result.n_d).getTime();
        console.log(nTermTimeMap[key]);
        $(".info_" + key + " .open_term").html(result.c_t);
        $(".info_" + key + " .next_term").html(result.n_t);
        $(".info_" + key + " .openCountID").html(result.c_c);
        $(".info_" + key + " .term_ball").html(getBallInfo(configs[result.c]['id'], result.c_r));
        var info = getResInfo(configs[result.c]['id'], result);
        var row = "";
        for (var t = 0; t < info.inf.length; t++) {
            row += (info.inf[t] + "").replace('em', 'td');
        }
        $(".info_" + key + " .td_body").html(row);
        var label = $(".info_" + key + " .term_ball").find("span");
        label.hide();
        var showLabel = function (i) {
            if (i < label.length) {
                $(label.get(i)).fadeIn(150, function () {
                    showLabel(i + 1);
                });
            }
        }
        showLabel(0);
        if ((result.os + "") == "0") {
            openStatusMap[key] = true;
        } else {
            openStatusMap[key] = false;
            $(".info_" + key + " .next_date2").html(result.osm);
        }
    } catch (e) {
          $(".info_" + key + " .next_date2").html("异常:按F5试试");
    }
}


var lhcTimmer = null;
function load_newHK6() {
    var post_path = "index.php?c=api2&a=getHk6&cp=hk6&_=" + Math.random(6);
    $.ajax({
        url: post_path,
        type: "GET",
        dataType: 'json',
        timeout: 20000,
        beforeSend: function () { },
        success: function (json) {
            iniDataHK6(json);
        },
        complete: function (XMLHttpRequest, textStatus) { },
        error: function (xhr) {
            setTimeout(function () { load_newHK6() }, 3000);
        }
    });
}
function iniDataHK6(result) { 
    var time_waite_hk6=3*1000; 
    clearTimeout(lhcTimmer);
    try{
        if(result.s==0){ 
            $("#term4001").html(result.c_t);
            $("#nterm4001").html(result.n_t);
            $("#ndate4001").html(result.n_d);
            $(".info_4001 .ball-gp .ball span").html("");
            $(".info_4001 .ball-gp .ball-sum span").html("[00]");
            $(".info_4001 .ball-gp .ball font").html("");
            var count = 0;
            if (result.c_s == 5 || result.c_s == 4 || result.c_s == 1) {
                for (var i = 0; i < result.c_r.length; i++) {
                    var item = result.c_r[i];
                    var ma_color = "ball_hk6_ ball_hk6_" + item.co;
                    count += item.no;
                    $("#ball_l" + (i + 1)).html(numToStr(item.no));
                    $("#ball_l" + (i + 1)).attr("class", ma_color);
                    $("#info_l" + (i + 1)).html(item.an);
                    $("#ball_sum4001").html(count);
                }
            }
            $("#msgInfo4001").html(SataeArr[result.c_s]);  
            if (result.c_s == 5 || result.c_s == 4) {
                $("#msgInfo4001").hide();
                time_waite_hk6 =  60 * 1000;
            } else {
                $("#msgInfo4001").show();
            }
        } else {
            $("#msgInfo4001").show();
            $("#msgInfo4001").html(result.m);  
        }
            lhcTimmer = setTimeout(function () { load_newHK6() }, time_waite_hk6);
    }
    catch (e) {
        $("#msgInfo4001").show();
        $('#msgInfo4001').html("<td style='color:red'>开奖异常,请重新刷新页面。</td>");
        lhcTimmer = setTimeout(function () { load_newHK6();}, time_waite_hk6);
    }
}
var timer = null;
function runTimer() {
    clearTimeout(timer);
    if (base_serverTime >= 1000) {
        for (var key in cTermMap) {
            if (openStatusMap[key]) {
                try {
                    var time_wait = $(".info_" + key + " .next_date2");
                    var span = timeSpan(base_serverTime, nTermTimeMap[key]);
                    if (span <= 1) {
                        if (openStatusMap[key]) {
                            openStatusMap[key] = false;
                            time_wait.html("<font>开奖中...</font>");
                            load_peroids(key);
                        }
                    } else {
                        time_wait.html(numToTimeHtmlHot(span));
                    }
                } catch (e) {
                   // throw e;
                }
            }
        }
    }
    timer = setTimeout(function () { runTimer() }, 1000)
} 
function iniMap(key) {
    if (cTermMap[key]) {
    } else {
        cTermMap[key] = "";
    }

    if (nTermTimeMap[key]) {
    } else {
        nTermTimeMap[key] = "";
    }
    if (openStatusMap[key]) {
    } else {
        openStatusMap[key] = true;
    }
}

 