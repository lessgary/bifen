
//声音提示类 
//格式 1,10,(铃声号数，时间秒)
var info = "1a10";
var R_coookieName = "R_Enable_";

var media_path = { "1": "/media/RING_01.wav", "2": "/media/RING_02.wav", "3": "/media/RING_03.wav", "4": "/media/RING_04.wav", "5": "/media/RING_05.wav", "6": "/media/RING_05.wav" };
function playRing(num, html_id) {
    if (num == "0") return;
    var ua = navigator.userAgent.toLowerCase();
    var ring = media_path[num];
    var c = $('#' + html_id + '');
    if (ua.match(/msie ([\d.]+)/)) { //ie
        c.html('<object classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95"><param name="AutoStart" value="1" /><param name="Src" value="' + ring + '" /></object>');
    } else if (ua.match(/firefox\/([\d.]+)/)) {
        c.html('<audio src=' + ring + ' type="audio/mp3" autoplay=”autoplay” hidden="true"></audio>');
    } else if (ua.match(/chrome\/([\d.]+)/)) {
        c.html('<audio src=' + ring + ' type="audio/mp3" autoplay=”autoplay” hidden="true"></audio>');
    } else if (ua.match(/opera.([\d.]+)/)) {
        c.html('<embed src=' + ring + ' hidden="true" loop="false"><noembed><bgsounds src=' + ring + '></noembed>');
    } else if (ua.match(/version\/([\d.]+).*safari/)) {
        c.html('<audio src=' + ring + ' type="audio/mp3" autoplay=”autoplay” hidden="true"></audio>');
    } else {
        c.html('<audio src=' + ring + ' type="audio/mp3" autoplay=”autoplay” hidden="true"></audio>');
    }
}

function setRingClear() {
    setCookie(R_coookieName, "")
}
function setRingCode(code, info) {
    setCookie(R_coookieName + code, info)
}
function getRingCode(code) {
    var showinfo = getCookie(R_coookieName + code) + "";
    if (showinfo != "null" && showinfo != "") info = showinfo;
    return info;
}

function setCookie(name, value) {
    $.cookie(name, value, { expires: 7, path: '/', secure: false, raw: false });
} //读取cookies函数
function getCookie(name) {
    var arr = $.cookie(name);
    return arr;
}

function setRing() {
    $.dialog({
        title: '提醒设置',
        width: 200,
        height: 220,
        left: '100%',
        top: '100%',
        fixed: true,
        drag: false,
        resize: false,
        content: 'url:/media/setRing.htm?code=' + id+"&adfsdf=fsfsdffdsf",
        close: function () {
            
        }
    });
}
var isRingPlay = false;
var gp_ring_term = -1;
function open_play_ring(code, time, cterm) {
    try {
        var info = getRingCode(code);
        var ring_infos = info.split('a');
        var ring_num = Number(ring_infos[0]);
        var ring_time = Number(ring_infos[1]);
        if (ring_num == 0) {
        } else {
            if (ring_time == -1) {
                if (gp_ring_term != cterm) {
                    playRing(ring_num, "player");
                    gp_ring_term = cterm; 
                }
            } else {
                if (time <= ring_time) {
                    if (isRingPlay == false) {
                        playRing(ring_num, "player")
                        isRingPlay = true;
                    }
                } else {
                    isRingPlay = false;
                }
            }
        }
    } catch (e) {

    }
} 
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}