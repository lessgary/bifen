
/****----------------------- 高频彩种用JS代替Flash开奖动画 begin ---------------------****/

var gp_watetime = 3000;
var gp_watetime_p = 3000;
var gp_timer = null;
var gp_timer_load = null;
var gp_cterm = -1;
var gp_nterm = "";
var gp_ndate = "";
var gp_time_span = 0;

$(document).ready(function () {
    getserverTime();
    load_new();
});
function load_peroids() {
   // alert(777777777777777777777);

    clearTimeout(gp_timer_load);

    var NowD = new Date();
    var NowTime = parseInt(NowD.getTime() / 1000);

    var update_url = 'index.php?c=api&a=updateinfo&cp=' + idx + '&uptime=' + NowTime + '&chtime=' + change_time + '&catid='+catid+'&modelid='+modelid;

    $.ajax({
        url: update_url,
        type: "GET",
        dataType: 'json',
        timeout: 20000,
        beforeSend: function () { },
        success: function (json) {
            // 更新页面信息
            iniData(json);
            iniDataList(json);
            if (id == "10016" || id == "10011" || id == "10022" || id == "10021" || id == "1002" || id == "10035" || id == "10023" || id == "10031" || id == "10038" || id == "10010" || id == "1008" || id == "1005" || id == "10020" || id == "10036" || id == "10037" || id == "10012" || id == "1007" || id == "1001" || id == "1003" || id == "10025" || id == "10026" || id == "10027" || id == "10039" || id == "10024" || id == "10044") {
                try{
                    // get_SMTJ_HaomaTJ();
                    // getCLTX();
                }catch(e){
                }
            }
        },
        complete: function (XMLHttpRequest, textStatus) { },
        error: function (xhr) {
            setTimeout(function () { load_peroids() }, 3000);
        }
    });
    // var post_path = "/Open/Peroids?code=" + id + "&_=" + Math.random(6);
    // $.ajax({
    //     url: post_path,
    //     type: "GET",
    //     dataType: 'json',
    //     timeout: 20000,
    //     beforeSend: function () { },
    //     success: function (json) {
    //         if (json.s == 0) {
    //             if (gp_cterm < json.c_t) {
    //                 gp_nterm = json.c_t;
    //                 setTimeout(function () { load_new() }, 1000);
    //             } else {
    //                 setTimeout(function () { load_peroids() }, gp_watetime_p);
    //             }
    //         } else {
    //             setTimeout(function () { load_peroids() }, gp_watetime_p);
    //         }
    //     },
    //     complete: function (XMLHttpRequest, textStatus) { },
    //     error: function (xhr) {
    //         setTimeout(function () { load_peroids() }, gp_watetime_p);
    //     }
    // });
} 
function load_new() {
   // alert(11111111111);
    var NowD = new Date();

    var NowTime = parseInt(NowD.getTime() / 1000);

    var update_url = 'index.php?c=api&a=updateinfo&cp=' + idx + '&uptime=' + NowTime + '&chtime=' + change_time + '&catid='+catid+'&modelid='+modelid;

    $.ajax({
        url: update_url,
        type: "GET",
        dataType: 'json',
        timeout: 20000,
        beforeSend: function () { },
        success: function (json) {
            // 更新页面信息
            if(idx =="hk6"){
                initHk6(json);
            }else{
                iniData(json);
                iniDataList(json);
            }
            
            if (id == "10016" || id == "10011" || id == "10022" || id == "10021" || id == "1002" || id == "10035" || id == "10023" || id == "10031" || id == "10038" || id == "10010" || id == "1008" || id == "1005" || id == "10020" || id == "10036" || id == "10037" || id == "10012" || id == "1007" || id == "1001" || id == "1003" || id == "10025" || id == "10026" || id == "10027" || id == "10039" || id == "10024" || id == "10044") {
                try{
                    // get_SMTJ_HaomaTJ();
                    // getCLTX();
                }catch(e){
                }
            }
        },
        complete: function (XMLHttpRequest, textStatus) { },
        error: function (xhr) {
            setTimeout(function () { load_new() }, 3000);
        }
    });
    // 香港6合彩特殊处理
    if(idx =="hk6"){
        // var post_path = "/Open/CurrentOpenOne?code=4001&_=" + Math.random(6);
        var post_path = "index.php?c=api2&a=getLastData&cp=" + idx  + "&_=" + Math.random(6);
		
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
                setTimeout(function () { load_new() }, 3000);
            }
        });
    }
}
function iniData(result) {
   // alert(22222222);
    if (gp_cterm != result.l_t) {
        gp_cterm = result.l_t;//最新有结果期数
        gp_nterm = result.n_t; //下期开奖期数
        result.o_g = configs[result.c]['o_g'];
        result.o_info_t = configs[result.c]['o_info_t'];
        
        result.n_d = strToDate(result.c_d).getTime() + configs[result.c]['change_time']*1000;
        gp_ndate = result.n_d;

        $("#cterm").html(gp_cterm);
        $("#nterm").html(gp_nterm);
        if (result.o_g == 100) {
            $("#c_now").html(result.l_c);
            $("#c_less").html(configs[result.c]['no'] - result.l_c);
            $("#fre_total").html(configs[result.c]['no']);
            $("#fre_info").html((configs[result.c]['o_info']));
        } else {
            $("#cdateInfo").html((configs[result.c]['o_info']));
            $("#cdate").html((result.o_info_t) + "开奖");
            gp_watetime_p = 1 * 10 * 1000;//高频之外彩则10秒
        }

        $("#term_ball").html(getBallInfo(configs[result.c]['id'], result.l_r));

        var label = $("#term_ball").find("li");
        label.hide();
        var showLabel = function (i) {
            if (i < label.length) {
                if (result.control_id == "10033" && i >= 300) { }
                else {
                    $(label.get(i)).fadeIn(200, function () {
                        showLabel(i + 1);
                    });
                }
            }
        }
        showLabel(0);
        var status = result.os;
        if ((status + "") == "0") {
            $("#msgInfo").hide();
        } else {
            $("#msgInfo").show();
            $("#ndate").html(result.osm);
            $("#msgInfo").html(result.osm)
            return;
        }
    }
    runTimer();
    //若当前开奖期数和最新开奖结果期数不同，则说明最新一期没有获取到开奖，则执行最新检查
    if (result.l_t != result.c_t) {
        //同时开奖时间也要小于服务器时间，排除是下期第二天开奖情况
        //if (base_serverTime > (strToDate(result.l_d)).getTime()) {
        $(".open_notic_tip em").html(result.c_t);
        $(".open_notic_tip").show();
        // gp_watetime = configs[result.c]['change_time'] * 1000;
        gp_timer_load = setTimeout(function () { load_peroids() }, gp_watetime)
        //} else {
        //    $(".open_notic_tip").hide();
        //}
    } else {
        $(".open_notic_tip").hide();
    }
}
function iniDataList(result) {
   // alert("3333333333");
    try {
        if (result.s == 0) {
            $("#reslist").html("");
            if (result.list.length > 0) {
                for (var i = 0; i < result.list.length; i++) {
                    var item = result.list[i];
                    var c_lass = "line_row";
                    if (i % 2 == 0) c_lass = "";
                    //if (i >= 20) c_lass += " g_hide";
                    var row = ("<tr class='" + c_lass + "'><td>" + item.c_d + "</td>");
                    row += ("<td> " + item.c_t + " </td>");
                    row += ("<td>" + getBallInfo(configs[result.c]['id'], item.c_r) + "</td>");
                    //if (result.o_g == 100) {
                    var info = getResInfo(configs[result.c]['id'], item);
                    for (var s = 0; s < info.inf.length; s++) {
                        if (item.c_r == "") {
                            row += "<td>&nbsp;</td>";
                        } else {
                            row += (info.inf[s] + "").replace('em', 'td');
                        }
                    }
                    // }
                    row += ("</tr>");
                    $("#reslist").append(row);
                }

                $(".hisloading").hide();
            } else {
                $(".hisloading").html("没有数据！");
            }

            $(".sub_table2").show();
        } else {
            $(".hisloading").html("没有数据！");
        }
    } catch (e) {
        $(".hisloading").html("历史数据加载异常：" + e + "！");
    }
    makeLine(id);
}
function runTimer() {
 //   alert(8888888888888);
    clearTimeout(gp_timer);
    try {
        var time_wait = $("#ndate");
        gp_time_span = timeSpan(base_serverTime, gp_ndate);
        if (gp_time_span <= 1) {
            // console.log('test1');
            time_wait.html("<p>开奖中...</p>");
            gp_timer_load = setTimeout(function () { load_peroids() }, gp_watetime);
        } else {
            time_wait.html("<p>" + numToTimeStr(gp_time_span) + "</p>");
            open_play_ring(id, gp_time_span, gp_cterm)
            gp_timer = setTimeout(function () { runTimer() }, 1000)
        }
    } catch (e) {
        gp_timer = setTimeout(function () { runTimer() }, 1000)
    }
} 


function initHk6(json) {
    //alert(444444444444);

    if (json.status == 1) {

        if (json.list.length > 0) {			
            for (var i = 0; i < json.list.length; i++) {
                var item = json.list[i];
                if (i >= 20) {
                    break; }
                var bg_style = "style=\"background-color:#eff2f7;\"";
                if (i % 2 == 0) bg_style = "";
                var row = ("<tr " + bg_style + ">");
                row += ("<td> " + item.c_t + " </td>");
                var balls_html = "";
                for (var s = 0; s < item.c_r.length; s++) {
                    var ball = item.c_r[s];
                    balls_html += "<li class='item'><span class='ball_hk6_ ball_hk6_" + ball.co + "'>" + numToStr(ball.no) + "</span><em>" + ball.an + "</em></li>";
                    if (s == 5)
                        balls_html += "<li class='item_add'><span class='ball_hk6_ '>+</span></li>";
                }
                row += ("<td><ul>" + balls_html + " </ul></td>");
                for (var s = 0; s < 9; s++) {
                    if (item.list.length == 0) {
                        row += ("<td>&nbsp;</td>");
                    } else {
                        row += ("<td  class='" + getColorClass("4001", item.list[s]) + "'>" + item.list[s] + "</td>");
                    }
                }
                row += ("</tr>");
                $("#reslist").append(row);
            }
            $(".hisloading").hide();
        } else {
            $(".hisloading").html("没有数据！");
        }
    } else {
        $(".hisloading").html("没有数据！");
    }
    makeLine("4001");
}

function iniDataHK6(result) {
    var time_waite_hk6 = 3 * 1000;
    // clearTimeout(lhcTimmer);
    // var st = strToDate(result.c_d).getTime() + configs[result.c]['change_time']*1000;
    // var date = new Date(st);
    // Y = date.getFullYear() + '-';
    // M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
    // D = date.getDate() + ' ';
    // h = date.getHours() + ':';
    // m = date.getMinutes() + ':';
    // s = date.getSeconds(); 
    // result.n_d = Y+M+D+h+m+s;
    var xq_ar=new Array("天","一","二","三","四","五","六");
    try {
        if (result.s == 0) {
            $(".sub_r_open_form_4001 #cterm").html(result.c_t);
            $(".sub_r_open_form_4001 #nterm").html(result.n_t);
            console.log(xq_ar[(new Date(result.n_d).getDay())]);
            $(".sub_r_open_form_4001 #ndate").html(result.n_d + "[星期" + xq_ar[(new Date(result.n_d).getDay())] + "]");
			
			var ppz_time = new Date(result.c_d);
			var ppz_time2 = ppz_time.getMonth()+1+"月"+ppz_time.getDate()+"日 "+ppz_time.getHours()+"时"+ppz_time.getMinutes()+"分";
			
            $(".sub_r_open_form_4001 #cdate").html(ppz_time2 + "[星期" + xq_ar[(new Date(result.c_d).getDay())] + "]");
            $(".sub_r_open_form_4001 .result span.ball_hk6_").html("");
            $(".sub_r_open_form_4001 .result p").html("--");
            $(".sub_r_open_form_4001 .result #ball_sum").html("[00]");
            var count = 0; 
            if (result.c_s == 5 || result.c_s == 4 || result.c_s == 1) {
                for (var i = 0; i < result.c_r.length; i++) {
                    var item = result.c_r[i];
                    var ma_color = "ball_hk6_ ball_hk6_" + item.co;
                    count += item.no;
                    $("#ball_l" + (i + 1)).html(numToStr(item.no));
                    $("#ball_l" + (i + 1)).attr("class", ma_color);
                    $("#info_l" + (i + 1)).html(item.an);
                    $("#ball_sum").html(count);
                }
            }

            $("#msgInfo").html(SataeArr[result.c_s]);
            if (result.c_s == 5 | result.c_s == 4) {
                $("#msgInfo").hide();
                time_waite_hk6 = 15 * 60 * 1000;
            }
            lhcTimmer = setTimeout(function () { load_new() }, time_waite_hk6);
        } else {
            $("#msgInfo").html(result.m);
        }
    }
    catch (e) {
        $('#msgInfo').html("<td style='color:red'>开奖异常,请重新刷新页面。</td>");
        lhcTimmer = setTimeout(function () { load_new() }, time_waite_hk6);
    }
}