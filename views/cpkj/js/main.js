/*  */
function showorhide(a, c) {
    if ($(a).prop("checked") == true) {
        $("." + c + "").show();
    } else {
        $("." + c + "").hide();
    }
}
/* 双面\号码统计结果 */
function get_SMTJ_HaomaTJ() {
    var post_path = "/Lottery_LZ/GetSMTJ?id=" + id + "&_=" + Math.random(6);
    $.ajax({
        url: post_path,
        type: "GET",
        dataType: 'json',
        timeout: 20000,
        beforeSend: function () { },
        success: function (json) {
            if (json.statue == 0) {
                var smlen = 0;
                var lhlen = 0;
                var hmlen = 0;
                var pksHtml = "";
                var sscHtml = "";
                var klsfHtml = "";
                var syxwHtml = "";
                if (id == "10016") {
                    smlen = 40;
                    lhlen = 14;
                    hmlen = 1;
                    $(".pks_dsdx_Result").html("");
                    $(".pks_lh_Result").html("");
                } else if (id == "10010" || id == "1008" || id == "1005" || id == "10020" || id == "10036" || id == "10037") {
                    smlen = 32;
                    lhlen = 12;
                    hmlen = 1;
                    $(".klsf_dsdx_Result").html("");
                    $(".klsf_lh_Result").html("");
                } else if (id == "10011" || id == "10022" || id == "10021" || id == "1002" || id == "10035" || id == "10023" || id == "10031" || id == "10038") {
                    smlen = 20;
                    lhlen = 4;
                    hmlen = 10;
                    $(".ssc_dsdx_Result").html("");
                    $(".ssc_hm_Result").html("");
                } else if (id == "10012" || id == "1007" || id == "1001" || id == "1003" || id == "10025" || id == "10026" || id == "10027" || id == "10039" || id == "10024" || id == "10044") {
                    smlen = 20;
                    lhlen = 4;
                    hmlen = 11;
                    $(".syxw_dsdx_Result").html("");
                    $(".syxw_hm_Result").html("");
                }
                var tdStr = "<td><div class='top_right'>期数差</div><div class='chuxian'>出现次数</div></div></td>";

                var smStr = "";
                for (var i = 0; i < smlen; i++) {
                    var cls = "top_right";
                    if (Number(json.sm_dsdx_cha[i]) > 0) {
                        cls = "top_right_red"
                    }
                    smStr += "<td><div class='" + cls + "'>" + json.sm_dsdx_cha[i] + "</div><div class='chuxian'>" + json.sm_dsdx[i] + "</div></td>";
                }
                var lhStr = "";
                for (var i = 0; i < lhlen; i++) {
                    var cls = "top_right";
                    if (Number(json.sm_zh_lh_cha[i]) > 0) {
                        cls = "top_right_red"
                    }
                    lhStr += " <td><div class='" + cls + "'>" + json.sm_zh_lh_cha[i] + "</div><div class='chuxian'>" + json.sm_zh_lh[i] + "</div></td>";
                }
                var hmStr = "";
                for (var i = 0; i < hmlen; i++) {
                    hmStr += "<td>" + json.haoTJ[i] + "</td>";
                }

                $(".pks_dsdx_Result").html(tdStr + smStr);
                $(".pks_lh_Result").html(tdStr + lhStr);
                $(".klsf_dsdx_Result").html(tdStr + smStr);
                $(".klsf_lh_Result").html(tdStr + lhStr);
                $(".ssc_dsdx_Result").html(tdStr + lhStr + smStr);
                $(".ssc_hm_Result").html(hmStr);
                $(".syxw_dsdx_Result").html(tdStr + lhStr + smStr);
                $(".syxw_hm_Result").html(hmStr);
            }
        },
        complete: function (XMLHttpRequest, textStatus) {

        },
        error: function (xhr) {
            //setTimeout(function () { load_new() }, 3000);
        }
    });
}
/* 长龙连开提醒 */
function changetxnum() {
    var num = $("#sltAll").val();
    $("#cltx tbody tr td").show();
    $("#cltx tbody tr td").each(function () {
        var _val = $(this).html();
        var index = _val.indexOf("：");
        if (Number(_val.substring(index + 2, index + 4)) < Number(num)) {
            $(this).hide();
        }
    });
    //getCLTX(num)
}
function getCLTX(n) {
    var post_path = "/Lottery_LZ/GetSMTJ?id=" + id + "&txShu=" + n + "&_=" + Math.random(6);
    $.ajax({
        url: post_path,
        type: "GET",
        dataType: 'json',
        timeout: 20000,
        beforeSend: function () { },
        success: function (json) {
            $("#cltx tbody").html("");
            var clhtml = "<tr>";
            if (json.statue == 0) {
                for (var i = 0; i < json.clts.length; i++) {
                    if (i != 0 && i % 6 == 0) {
                        clhtml += "</tr><tr>"
                    }
                    clhtml += "<td>" + json.clts[i] + "</td>";
                }
                clhtml += "</tr>";
                $("#cltx tbody").html(clhtml);
            }
        },
        complete: function (XMLHttpRequest, textStatus) {

        },
        error: function (xhr) {
            //setTimeout(function () { load_new() }, 3000);
        }
    });
}
var bigsmart;
if (id == "10011" || id == "10022" || id == "10021" || id == "1002" || id == "10035" || id == "10023" || id == "10031" || id == "10038") {
    bigsmart = "big";
}
$(".show_hm input[type='checkbox']").click(function () {
    $(".show_tp input[type='checkbox']").prop("checked", false);
    $(".KLSF_show_tp input[type='checkbox']").prop("checked", false);
    var datas = [];
    var len = 0;
    $(".show_hm input[type='checkbox']").each(function () {
        var index = $(this).attr("data_val");
        if ($(this).prop("checked") == true) {
            len++;
            datas.push(index);
        }

    });
    if (datas.length > 0) {
        $("#reslist td span").addClass("g_shade");
        for (var i = 0; i < datas.length; i++) {
            $("#reslist td span").each(function () {
                if ($(this).attr("title") == datas[i]) {
                    $(this).removeClass("g_shade");
                }
            });
        }
    } else {
        $("#reslist td span").removeClass("g_shade");
    }
});

$(".show_tp input[type='checkbox']").click(function () {
    $(".show_hm input[type='checkbox']").prop("checked", false);
    var oe = $(this).attr("date_oe");
    var bs = $(this).attr("date_bs");
    if (oe == "o" && $(this).prop("checked") == true) {
        $("input[name='e']").prop("checked", false);
    }
    if (oe == "e" && $(this).prop("checked") == true) {
        $("input[name='o']").prop("checked", false);
    }
    if (bs == "b" && $(this).prop("checked") == true) {
        $("input[name='s']").prop("checked", false);
    }
    if (bs == "s" && $(this).prop("checked") == true) {
        $("input[name='b']").prop("checked", false);
    }
    var chkD = [];
    var datas = [];
    var len = 0;
    $(".show_tp input[type='checkbox']").each(function () {
        if ($(this).prop("checked") == true) {
            len++;
            chkD.push($(this).attr("date_oe"));
            chkD.push($(this).attr("date_bs"));
        }
    });
    //$.inArray()方法类似于JavaScript的原生.indexOf()方法，没有找到匹配元素时它返回-1。如果数组第一个元素匹配value（参数） ，那么$.inArray()返回0。
    if (len == 1) {
        if ($.inArray("o", chkD) > -1) {
            datas.push(1, 3, 5, 7, 9);
        } else if ($.inArray("e", chkD) > -1) {
            datas.push(0, 2, 4, 6, 8, 10);
        } else if ($.inArray("b", chkD) > -1) {
            if (bigsmart == "big") {
                datas.push(5, 6, 7, 8, 9, 10);
            } else { datas.push(6, 7, 8, 9, 10); }
        } else if ($.inArray("s", chkD) > -1) {
            if (bigsmart == "big") {
                datas.push(0, 1, 2, 3, 4);
            } else {
                datas.push(0, 1, 2, 3, 4, 5);
            }
        }
    }
    if (len == 2) {
        if ($.inArray("s", chkD) > -1 && $.inArray("e", chkD) > -1) {
            datas.push(0, 2, 4);
        } else if ($.inArray("s", chkD) > -1 && $.inArray("o", chkD) > -1) {
            if (bigsmart == "big") {
                datas.push(1, 3);
            } else {
                datas.push(1, 3, 5);
            }
        } else if ($.inArray("b", chkD) > -1 && $.inArray("e", chkD) > -1) {
            datas.push(6, 8, 10);
        } else if ($.inArray("b", chkD) > -1 && $.inArray("o", chkD) > -1) {
            if (bigsmart == "big") {
                datas.push(5,7, 9);
            } else {
                datas.push(7, 9);
            }
        }
    }

    if (len > 0) {
        $("#reslist td span").addClass("g_shade");
        for (var i = 0; i < datas.length; i++) {
            $("#reslist td span").each(function () {
                if ($(this).attr("title") == datas[i]) {
                    $(this).removeClass("g_shade");
                }
            });
        }
    } else {
        $("#reslist td span").removeClass("g_shade");
    }

});

$(".KLSF_show_tp input[type='checkbox']").click(function () {
    var oe = $(this).attr("date_oe");
    var bs = $(this).attr("date_bs");
    if (oe == "o" && $(this).prop("checked") == true) {
        $("input[name='e']").prop("checked", false);
    }
    if (oe == "e" && $(this).prop("checked") == true) {
        $("input[name='o']").prop("checked", false);
    }
    if (bs == "b" && $(this).prop("checked") == true) {
        $("input[name='s']").prop("checked", false);
    }
    if (bs == "s" && $(this).prop("checked") == true) {
        $("input[name='b']").prop("checked", false);
    }
    var chkD = [];
    var datas = [];
    var len = 0;
    $(".show_hm input[type='checkbox']").prop("checked", false);
    $(".KLSF_show_tp input[type='checkbox']").each(function () {
        if ($(this).prop("checked") == true) {
            len++;
            chkD.push($(this).attr("date_oe"));
            chkD.push($(this).attr("date_bs"));
        }
    });
    //$.inArray()方法类似于JavaScript的原生.indexOf()方法，没有找到匹配元素时它返回-1。如果数组第一个元素匹配value（参数） ，那么$.inArray()返回0。
    if (len == 1) {
        if ($.inArray("s", chkD) > -1) {
            datas.push(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        } else if ($.inArray("o", chkD) > -1) {
            datas.push(1, 3, 5, 7, 9, 11, 13, 15, 17, 19);
        } else if ($.inArray("e", chkD) > -1) {
            datas.push(2, 4, 6, 8, 10, 12, 14, 16, 18, 20);
        } else if ($.inArray("b", chkD) > -1) {
            datas.push(10, 11, 12, 13, 14, 15, 16, 17, 18, 19);
        }

    }
    if (len == 2) {
        if ($.inArray("s", chkD) > -1 && $.inArray("e", chkD) > -1) {
            datas.push(2, 4, 6, 8, 10);
        } else if ($.inArray("s", chkD) > -1 && $.inArray("o", chkD) > -1) {
            datas.push(1, 3, 5, 7, 9);
        } else if ($.inArray("b", chkD) > -1 && $.inArray("e", chkD) > -1) {
            datas.push(12, 14, 16, 18, 20);
        } else if ($.inArray("b", chkD) > -1 && $.inArray("o", chkD) > -1) {
            datas.push(11, 13, 15, 17, 19);
        }
    }

    if (len > 0) {
        $("#reslist td span").addClass("g_shade");
        for (var i = 0; i < datas.length; i++) {
            $("#reslist td span").each(function () {
                if ($(this).attr("title") == datas[i]) {
                    $(this).removeClass("g_shade");
                }
            });
        }
    } else {
        $("#reslist td span").removeClass("g_shade");
    }

});

function checkDuizi() {
    if ($("#chkduizi").hasClass("on")) {
        $("#chkduizi").removeClass("on");
        $("#reslist td span").removeClass("g_shade");

    } else {
        $("#chkduizi").addClass("on");
        $("#reslist td span").addClass("g_shade");

        var temp = [];
        var datas = $("#reslist tr");
        var length = datas.length;
        if (length <= 1) { return; }
        var list = $(datas[0]).find("span");
        for (var i = 0; i < 10; i++) {
            temp.push($(list[i]).attr("title"));
        }
        for (var i = 1; i < length; i++) {
            var c_list = $(datas[i]).find("span");
            for (var j = 0; j < 10; j++) {
                var t = $(c_list[j]).attr("title");
                if (t == temp[j]) {
                    $(c_list[j]).removeClass("g_shade");
                    $($(datas[i - 1]).find('span')[j]).removeClass("g_shade");
                }
                temp[j] = t;
            }
        }
    }
}

function clearShade(a, c) {
    $(a).parent().parent().find("input[type='checkbox']").prop("checked", c);
    $(a).parent().parent().parent().find("input[type='radio']").prop("checked", c);
    $("#reslist td span").removeClass("g_shade");
}

