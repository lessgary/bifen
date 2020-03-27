$(document).ready(function () {

});
function Search_ball(select_ball) {
    $("#numIndex").val(select_ball);
    var d = $("#yeartxt").val();
    $("#ball" + select_ball).siblings().removeClass();
    $("#ball" + select_ball).attr("class", "condition");
    if (select_ball == 0) { $("#numShengXiaoCondition").attr("disabled", "disabled"); }
    else $("#numShengXiaoCondition").removeAttr("disabled");
    switch (select_ball) {
        case 0: $(".selected").html("特码"); break;
        case 1: $(".selected").html("一码"); break;
        case 2: $(".selected").html("二码"); break;
        case 3: $(".selected").html("三码"); break;
        case 4: $(".selected").html("四码"); break;
        case 5: $(".selected").html("五码"); break;
        case 6: $(".selected").html("六码"); break;
        case 7: $(".selected").html("特码"); break;
    }
    $.ajax({
        type: "POST",
        url: "/MarkSix/ZongHeTJ",
        data: {
            selectball: select_ball,
            OpenYear: d,
        },
        cache: false,
        dataType: "jsonp",
        jsonp: 'jsoncallback',
        success: function (json) {
            //if (json.status == 0) {
            //    $("#results").html("");
            //    for (var i = 0; i < json.list.length; i++) {
            //        var obj = json.list[i];
            //        var row = ("<tr><td class='no num'>" + obj.time + "</td><td class='no bg-high2'>" + obj.term + "</td>");
            //        for (i = 0; i < obj.res.length; i++) {
            //            row += obj.res[i];
            //        }
            //        row += "</tr>";
            //        $("#results").append(row);
            //    }
            //}
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
        },
        complete: function (XHR, TS) { XHR = null }  //资源回收，防止内存溢出
    });
}
function changeAttr() {
    $("#results tr").attr("fuck", "yes");
    do_hide_show("numShengXiaoCondition", "sx_all");
    do_hide_show("danShuangCondition", "danshuang");
    do_hide_show("boSeCondition", "sebo");
    do_hide_show("banbanboCondition", "banbanbo");
    do_hide_show("daXiaoCondition", "dx");
    do_hide_show("wuXingCondition", "wx");
    do_hide_show("touNumCondition", "toushu");
    do_hide_show("weiNumCondition", "weishu");
    //if ($("#heShuCondition option:selected").text() != "所有合数") {
    //    var heshu = $("#heShuCondition").val();
    //    $("td.heshu").each(function () {
    //        if ($(this).parent("tr").attr("fuck") == "yes") {
    //            if ($(this).html().indexOf(heshu) >= 0) {
    //                $(this).parent("tr").attr("fuck", "yes");
    //                $(this).parent("tr").show();
    //            } else {
    //                $(this).parent("tr").attr("fuck", "no");
    //                $(this).parent("tr").hide();
    //            }
    //        }
    //    });
    //}
    do_hide_show("jiaYeCondition", "jy");
    //do_hide_show("menShuCondition", "mengshu");
    //do_hide_show("duanWeiCondition", "duanwei");
    //do_hide_show("yinYangCondition", "yinyan");
    //do_hide_show("tianDiCondition", "td");
    //do_hide_show("jiXiongCondition", "jx");
    //do_hide_show("heiBaiCondition", "hb");
    //do_hide_show("seXiaoCondition", "sexiao");
    //do_hide_show("biHuaCondition", "bihua");
    //do_hide_show("nanNvCondition", "nannv");
    
}

function do_hide_show(id,cls) {
    var val = $("#" + id).val();
    if (val != "") {
        $("td." + cls).each(function () {
            if ($(this).parent("tr").attr("fuck") == "yes") {
                if ($(this).html() == val) {
                    $(this).parent("tr").attr("fuck", "yes");
                    $(this).parent("tr").show();
                    $(this).css("background-color", "#FFFF99");
                } else {
                    $(this).parent("tr").attr("fuck", "no");
                    $(this).parent("tr").hide();
                }
            }
        });
    }
}

function resetInfos() {
    $("select").each(function (index, element) { $(this).val(""); });
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        if (document.forms[0].elements[i].tagName == 'SELECT') {
            document.forms[0].elements[i].options[0].selected = true;
        }
    }
    $("input[type='radio'][name='keywordColIndex']").eq(0).attr("checked", "checked");
    $(".qiShuChk").each(function (index, element) { $(this).attr("checked", false); });

    $("#results tr").attr("fuck", "yes");
    $("#results tr").show();
    $("td").css("background-color", "#fff");
    $(".bg-high2").css("background", "#ffc");
}

function showAll(s1, s2) {
    $(s1).show(); $(s2).show();
}
function showWithHide(s, h) {
    $(s).show(); $(h).hide();
}
function showHaoMaAndShengXiao() {
    checkOnlyOne(0, 'haoMaOrShengXiao'); showAll('.hm', '.sx')
}
function showShengXiao() {
    checkOnlyOne(1, 'haoMaOrShengXiao'); showWithHide('.sx', '.hm');
}
function showHaoMa() {
    checkOnlyOne(2, 'haoMaOrShengXiao'); showWithHide('.hm', '.sx');
}
function showSortDown() {
    checkOnlyOne(0, 'sortDownOrSize'); showWithHide('.sortDown', '.sortSize');
}
function showSortSize() {
    checkOnlyOne(1, 'sortDownOrSize'); showWithHide('.sortSize', '.sortDown');
}
function checkOnlyOne(position, checkName) {
    $("input[type='checkbox'][name='" + checkName + "']").each(function (index, element) {
        var checked = false;
        if (position == index) checked = true;
        $(element).attr("checked", checked);
    });
}
