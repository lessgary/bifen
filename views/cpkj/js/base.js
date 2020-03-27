
/****----------------------- 获取服务器时间象 begin---------------------****/
//服务器时间 -- 全局
var base_serverTime = 0;
var sTime = 0;
var loadEndTime = 0;
var base_timmer = null;
function getserverTime() {
    base_serverTime = (new Date()).getTime();
    startServerTime();
    base_timmer = setTimeout(function () { getserverTime() }, 10 * 1000);
}
/*js调用服务器时间-显示时间表*/
function startServerTime() {
    var getTime = function () {
        var nowTime = (new Date()).getTime();
        var sTimeLess = sTime + nowTime - loadEndTime;
        base_serverTime = sTimeLess;
        setTimeout(getTime, 1000);
    }
    getTime();
}
function getServerDate() {
    var dt = new Date(serverTime);
    try {
        return {
            Y: (dt.getYear() + 1900),
            M: (dt.getMonth() + 1),
            d: dt.getDate(),
            H: dt.getHours(),
            m: dt.getMinutes(),
            s: dt.getSeconds()
        };
    } catch (e) { }
    return null;
}
function strToDate(dateStr) {
    return new Date(dateStr);
    var s = dateStr.split(" ");
    var s1 = s[0].split("-");
    var s2 = s[1].split(":");
    return new Date(s1[0], s1[1] - 1, s1[2], s2[0], s2[1], s2[2]);
}
/****----------------------- 获取服务器时间象 end ---------------------****/
//获取时间差
function timeSpan(sTime, cTime) {
    var st = parseInt(sTime);
    var ct = parseInt(cTime);
    return parseInt((ct - st) / 1000);
}
//换算成时间
function numToTimeStr(time) {
    var s = time % 60;
    var m = (time - s) / 60;
    var h = "", M = 0;
    if (m > 60) {
        M = m % 60;
        var h_temp = ((m - M) / 60);
        h = (h_temp > 99 ? 99 : h_temp) + ":";
    } else
        M = m;
    return h + numToStr(M) + ":" + numToStr(s);
}
//换算成时间 带html
function numToTimeHtmlHot(time) {
    var s = time % 60;
    var m = (time - s) / 60;
    var h = "", M = 0;
    if (m > 60) {
        M = m % 60;
        var h_temp = ((m - M) / 60);
        h = "<span>" + (h_temp > 99 ? 99 : h_temp) + "</span><em>:</em>";
    } else
        M = m;
    return h + "<span>" + numToStr(M) + "</span><em>:</em><span>" + numToStr(s) + "</span>";
}

//数字格式化
function numToStr(val) {
    if (val < 10) {
        if (val < 0)
            return "00";
        return "0" + val;
    }
    return "" + val;
}
//数字排序
function sortNumber(a, ad) {
    var f = ad != "desc" ? function (a, b) { return a - b } : function (a, b) { return b - a };
    return a.sort(f);
}
//显示结果
function getBallInfo(code, result) {
    if (result == "") return "";
    if (result == undefined) return "";
    var list = result.split(",");
    var text = "";
    var size = list.length;
    if ((code.substr(0, 3) + "") == "100") {
        if (code == "10050") {
            var list_n = list.slice(0, 20)
            var list_ = sortNumber(list_n, "asc");
            list_.push(list[20]);
            text += "<div class='row'>";
            for (var i = 0; i < size; i++) {
                var ball = list_[i];
                var className = "ball_klb";
                if (i == size - 1) {
                    className = "ball_klb_blue";
                }
                text += "<span class='  ball_klb_  " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
                if (i == 9) {
                    text += "</div><div class='row'>";
                }
            }
            text += "</div>";
        }
        else if (code == "10014") {
            var list_n = list.slice(0, 20)
            var list_ = sortNumber(list_n, "asc");
            list_.push(list[20]);
            text += "<div class='row'>";
            var className = "ball_klb2";
            for (var i = 0; i < size; i++) {
                var ball = list_[i];
                if (Number(ball) > 40)
                    className = "ball_klb2_blue";
                if (i == size - 1) {
                    className = "ball_klb2_yellow";
                }
                text += "<span class=' ball_klb_ " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
                if (i == 9) {
                    text += "</div><div class='row'>";
                }
            }
            text += "</div>";
        }
        else if (code == "10045"
        || code == "10046" || code == "10047" || code == "10048" || code == "10049"
         || code == "10051" || code == "10052" || code == "10041") {//快乐彩 无特码
            var list_n = list.slice(0, 20)
            var list_ = sortNumber(list_n, "asc");
            list_.push(list[20]);
            text += "<div class='row'>";
            var className = "ball_klb2";
            for (var i = 0; i < 20; i++) {
                var ball = list_[i];
                if (Number(ball) > 40)
                    className = "ball_klb2_blue";
                text += "<span class=' ball_klb_ " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
                if (i == 9) {
                    text += "</div><div class='row'>";
                }
            }
            text += "</div>";
        }
        else if (code == "10016") { //北京PK10
            for (var i = 0; i < size; i++) {
                var ball = Number(list[i]);
                text += "<span class='ball_pks_  ball_pks" + ball + " ball_lenght" + size + "  '  title='" + ball + "'>&nbsp;</span>";
            }
        }
        else if (code == "10042") { //快乐扑克三
            for (var i = 0; i < size; i++) {
                var ball = list[i].split('-');
                var key_cokor = pk_colorinfo[ball[0]];
                text += "<span class=' ball_pk_ ball_pk" + ball[0] + "'></span>";
                text += "<span class=' ball_pk_ball' style=' color:" + key_cokor + ";'>" + ball[1] + "</span>";
            }
        }
        else if (code == "10010") { //幸运农场 
            for (var i = 0; i < size; i++) {
                var ball = Number(list[i]);
                text += "<span class='ball_nc_ ball_nc" + ball + "  '    title='" + ball + "'>&nbsp;</span>";
            }
        }
        else if (code == "1006" || code == "10013" || code == "10028" || code == "10030" || code == "10040" || code == "10043") { //快三类 

            var list_ = sortNumber(list, "asc");
            for (var i = 0; i < size; i++) {
                var ball = Number(list_[i]);
                text += "<span class='  ball_sz_ ball_sz" + ball + " ball_lenght" + size + "  '  >&nbsp;</span>";
            }
        }
        else if (code == "10033") { //湖南幸运赛车 历史
            for (var i = 0; i < size; i++) {
                var ball = Number(list[i]);
                text += "<span class='ball_s_ ball_s_blue ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
            }
        }
        else if (code == "1009") {//广西快乐十分
            for (var i = 0; i < size; i++) {
                var ball = Number(list[i]);
                var className = "ball_s_ ball_s_blue";
                //红：1、4、7、10、13、16、19
                //蓝：2、5、8、11、14、17、20
                //绿：3、6、9、12、15、18、21
                var sb_hong = ",1,4,7,10,13,16,19,";
                var sb_lan = ",2,5,8,11,14,17,20,";
                var sb_lv = ",3,6,9,12,15,18,21,";
                var _ball = "," + ball + ",";
                if (sb_hong.indexOf(_ball) != -1) { className = "ball_s_ ball_s_red"; }
                if (sb_lv.indexOf(_ball) != -1) { className = "ball_s_ ball_s_green"; }
                //else { className = "ball_s_ ball_s_green";}
                //if (ball == "19" || ball == "20") {
                //    className = "ball_s_ ball_s_red";
                //}
                //if (i == size - 1)
                //{ text += "<span class='ball_jia'>+</span>"; }
                text += "<span class='  " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
            }
        }
            //天津快乐十分、湖南快乐十分、黑龙江快乐十分、云南快乐十分
        else if (code == 1005 || code == 10020 || code == 10037 || code == 10036) {//广西快乐十分
            for (var i = 0; i < size; i++) {
                var ball = Number(list[i]);
                //红：1, 4, 7, 10, 13, 16
                //蓝：2, 5, 8, 11, 14, 17
                //绿：3, 6, 9, 12, 15, 18
                //金：19, 20
                var sb_hong = ",1,4,7,10,13,16,";
                var sb_lan = ",2,5,8,11,14,17,";
                var sb_lv = ",3,6,9,12,15,18,";
                var sb_jing = ",19,20,";
                var _ball = "," + ball + ",";
                if (sb_hong.indexOf(_ball) != -1) { className = "ball_s_ ball_s_red"; }
                if (sb_lan.indexOf(_ball) != -1) { className = "ball_s_ ball_s_blue"; }
                if (sb_lv.indexOf(_ball) != -1) { className = "ball_s_ ball_s_green"; }
                if (sb_jing.indexOf(_ball) != -1) { className = "ball_s_ ball_s_yellow"; }
                text += "<span class='  " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
            }
        }
            //广东快乐十分
        else if (code == 1005 || code == 10020 || code == 10037 || code == 10036) {//广西快乐十分
            for (var i = 0; i < size; i++) {
                var ball = Number(list[i]);
                var className = "ball_s_ ball_s_blue";
                if (ball == "19" || ball == "20" || ball == "21") {
                    className = "ball_s_ ball_s_red";
                }
                text += "<span class='  " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
            }
        }
        else {
            for (var i = 0; i < size; i++) {
                var ball = list[i];
                var className = "ball_s_ ball_s_blue";
                if (ball == "19" || ball == "20" || ball == "21") {
                    className = "ball_s_ ball_s_red";
                }
                text += "<span class='  " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
            }
        }
    } else if (code == "2001" || code == "2003" || code == "2006"
    || code == "30042" || code == "30010"
    || code == "30013" || code == "30018"
    || code == "30019" || code == "30021"
    || code == "3001" || code == "30033"
    || code == "3004" || code == "3006"
    || code == "3007" || code == "3009" || code == "30017"
    || code == "30015" || code == "30037") {
        for (var i = 0; i < size; i++) {
            var ball = list[i];
            var className = "ball_year_red";
            var j = size - 2;
            if (code == "2001") j = 5;
            else if (code == "2003") j = 6;
            else if (code == "2006" || code == "30017") j = 4;
            else if (code == "2009") j = 3;
            if (i > j) { className = "ball_year_blue"; }
            text += "<span class='ball_year_  " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
        }
    }
    else if (code == "2009") {
        for (var i = 0; i < size; i++) {
            var ball = list[i];
            var className = "ball_year_blue";
            if (i > 3) {
                className = "ball_year_blue_less";
            }
            text += "<span class=' ball_year_ " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
        }
    }
    else {
        for (var i = 0; i < size; i++) {
            var ball = list[i];
            var className = "ball_year_red";
            text += "<span class='ball_year_  " + className + " ball_lenght" + size + "  '  title='" + ball + "'>" + ball + "</span>";
        }
    }
    return text;
}

function getResInfo(code, item) {
    var any = { inf: [] };
    try {
        if (item.o_m != undefined && item.o_m != null && item.o_m.length > 0) {
            for (var i = 0; i < item.o_m.length; i++) {
                var m = item.o_m[i];
                any.inf[i] = "<em class='" + getColorClass(code, item.o_m[i]) + "'>" + m + "</em>"; 
            }
        }
    } catch (e) { 
    }
    return any;
}

function getColorClass(code, info) {
    // console.log(info.length);
    var c_lass = "count";
    if (info > 0) {
    } else if (info == "-") {
        c_lass = "td_line";
    } else {
        if (info == "红") {
        } else if (info == "小" || info == "单" || info == "赢" || info == "小单" || info == "大单" ||
            info == "虎" || info == "前多" || info == "单多" ||
            info == "尾小"
            || info == "蓝" || info == "合单" || info == "合小" || info == "北" || info == "总大单"
            ) {
            c_lass = "blue";

        } else if (info == "大" || info == "双" || info == "输" || info == "小双" || info == "大双"|| info == "总大双"
            || info == "龙" || info == "后多" || info == "双多"
            || info == "尾大" || info == "合多" || info == "合大") {
            c_lass = "gray";

        } else if (info == "和" || info == "单双和" || info == "前后和" || info == "通吃"|| info == "总小单"
            || info == "绿" || info == "和局" || info == "发" || info == "南") {
            c_lass = "green";

        } else if (info == "鱼" || info == "虾" || info == "葫芦"
            || info == "金钱" || info == "鸡" || info == "白") {
            c_lass = "gray ";

        } else if (info == "金" || info == "木" || info == "水"
            || info == "火" || info == "土") {
            c_lass = "blue";

        } else if (info == "东" || info == "中"|| info == "总小双") {
            c_lass = "pink";

        }
        if (info.length > 1) {
            c_lass += " max";
        }
        if (info.length > 2) {
            c_lass += " max2";
        }
    }
    return c_lass;
}

var getScriptArg = function (name, key) {//获取单Script url 个参数 
    var scripts = document.getElementsByTagName("script");
    var src = "";
    for (var i = 0; i < scripts.length; i++) {
        src = scripts[i].src;
        if (src.substr(src.lastIndexOf('/')).indexOf(name) !== -1)
            break;
    }
    return (src.match(new RegExp("(?:\\?|&)" + key + "=(.*?)(?=&|$)")) || ['', null])[1];
};

var pk_colorinfo = { "ht": "black", "hh": "black", "hx": "red", "hf": "red" }
//加载
var SataeArr = new Array();
SataeArr[0] = '<span  style="color:#ff0000;">...请勿离开，今天晚上21:30开奖...</span>';
SataeArr[1] = '<span style="color:#ff0000;">...正在搅珠...</span>';
SataeArr[2] = '<span style="color:#ff0000;">...节目广告中...</span>';
SataeArr[3] = '<span style="color:#ff0000;">...主持人解说中...</span>';
SataeArr[4] = '<span style="color:#ff0000;">&nbsp;</span>';
SataeArr[5] = '<span style="color:#ff0000;">&nbsp;</span>';
SataeArr[6] = '<span style="color:#ff0000;">...准备报码,如不正常请手动刷新...</span>';




function makeLine(code) {
    try {
        
        if (code == "10016111") {
            var lineNos = $("#reslist").attr("linNos");
            if (lineNos != "") {
                var arrNos = lineNos.split(',');
                for (var i = 0; i < arrNos.length; i++) {
                    var no = arrNos[i];
                    $("#reslist tr").each(function () {
                        $(this).find("td").eq(Number(no)).addClass("g_r_line");
                    });
                }
            }
        }
        if (code == "10016") {
            $("#reslist tr").each(function () { 
                $(this).find("td").eq(Number(5)).addClass("g_r_line g_td_p_right");
                $(this).find("td").eq(Number(6)).addClass("g_td_p_left");
            });
        }
    } catch (e) {

    }
}


