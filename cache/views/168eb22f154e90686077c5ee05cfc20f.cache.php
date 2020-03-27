<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $meta_title; ?></title>
<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
<meta name="description" content="<?php echo $meta_description; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_THEME; ?>images/webd9.css?v=<?= rand()?>" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_THEME; ?>js/dailog/skins/discuz.css" />
<script type="text/javascript">var sitepath = '<?php echo SITE_PATH;  echo ENTRY_SCRIPT_NAME; ?>';</script>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>images/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>images/webd9_slide.js"></script>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>js/dailog/lhgdialog.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>js/ring.js"></script>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>js/configs.js"></script>
<script>

	function ceshi() {
		alert("1111111111111");
	}

</script>
<script type="text/javascript">
    $(function() {
        $('#change4 li').on('click',function(){
            $(this).siblings().removeClass('a');
        });

        var catid = getParams('catid');
        if(catid == ''){
			$('#change4 li').eq(0).addClass('a').siblings().removeClass('a');
        }else{
			$("#change4 li[id='catid_"+catid+"']").addClass('a').siblings().removeClass('a');
        }
    })
    function getParams(key){
    var url = location.search.replace(/^\?/,'').split('&'); 
    var paramsObj = {}; 
    for(var i = 0, iLen = url.length; i < iLen; i++){ 
        var param = url[i].split('='); 
        paramsObj[param[0]] = param[1]; 
    } 
    if(key){ 
        return paramsObj[key] || ''; 
    } 
    return paramsObj; 
}


</script>

<script>
		window.alert = function(str)  
        {  
         var shield = document.createElement("DIV");  
         shield.id = "shield";  
         shield.style.position = "absolute";  
         shield.style.left = "0px";  
         shield.style.top = "0px";  
         shield.style.width = "100%";  
         shield.style.height = document.body.scrollHeight+"px";  
         //弹出对话框时的背景颜色  
         shield.style.background = "#fff";  
         shield.style.textAlign = "center";  
         shield.style.zIndex = "25";  
         //背景透明 IE有效  
         //shield.style.filter = "alpha(opacity=0)";  
         var alertFram = document.createElement("DIV");  
         alertFram.id="alertFram";  
         alertFram.style.position = "absolute";  
         alertFram.style.left = "50%";  
         alertFram.style.top = "50%";  
         alertFram.style.marginLeft = "-225px";  
         alertFram.style.marginTop = "-75px";  
         alertFram.style.width = "450px";  
         alertFram.style.height = "150px";  
         alertFram.style.background = "#ff0000";  
         alertFram.style.textAlign = "center";  
         alertFram.style.lineHeight = "150px";  
         alertFram.style.zIndex = "300";  
         strHtml = "<ul style=\"list-style:none;margin:0px;padding:0px;width:100%\">\n";  
         strHtml += " <li style=\"background:#DD828D;text-align:left;padding-left:20px;font-size:14px;font-weight:bold;height:25px;line-height:25px;border:1px solid #F9CADE;\">[自定义提示]</li>\n";  
         strHtml += " <li style=\"background:#fff;text-align:center;font-size:12px;height:120px;line-height:120px;border-left:1px solid #F9CADE;border-right:1px solid #F9CADE;\">"+str+"</li>\n";  
         strHtml += " <li style=\"background:#FDEEF4;text-align:center;font-weight:bold;height:25px;line-height:25px; border:1px solid #F9CADE;\"><input type=\"button\" value=\"确 定\" onclick=\"doOk()\" /></li>\n";  
         strHtml += "</ul>\n";  
         alertFram.innerHTML = strHtml;  
         document.body.appendChild(alertFram);  
         document.body.appendChild(shield);  
         var ad = setInterval("doAlpha()",5);  
         this.doOk = function(){  
             alertFram.style.display = "none";  
             shield.style.display = "none";  
         }  
         alertFram.focus();  
         document.body.onselectstart = function(){return false;};  
        }  

</script>
</head>
<body>
<div class="pheader">
	<div class="pheader1">
		<div class="pmain">
			<div class="pheader1z">
				<span id=localtime></span>
			</div>
			<div class="pheaderlw">
			<a href="http://33133.com">官网域名：www.33133.com</a>
			</div>
			<div class="pheader1y">
				&nbsp;&nbsp;&nbsp;
				<a href="./index.php?c=content&a=list&catid=61">帮助中心</a>&nbsp;|&nbsp;<a onClick="SetHome(window.location)" href="javascript:void(0)">设为首页</a>&nbsp;|&nbsp;<a onClick="AddFavorite(window.location,document.title)" href="javascript:void(0)">加入收藏</a>
			</div>
		</div>
	</div>
	<div class="pheader2">
		<div class="pmain">
			<div class="pheader2z">
				<a href="http://sf1166.com/reg.php?intr=33133kai" target="_blank"><img src="<?php echo SITE_THEME; ?>images/logo.png" /></a>
			</div>
			<div class="pheader2y">
				
			</div>
		</div>
	</div>
	<div class="pheader3">
		<div class="pmain">
			<div class="pheader3c"  id="change4">
				<li <?php if ($indexc==1) { ?>class="a"<?php } ?>><a href="<?php echo SITE_PATH; ?>">首页</a></li>
				<li id="catid_2"><a href="/index.php?c=content&amp;a=list&amp;catid=2" >北京PK10</a></li>
				<li id="catid_4"><a href="/index.php?c=content&amp;a=list&amp;catid=4" >香港彩</a></li>
				<li id="catid_3"><a href="/index.php?c=content&amp;a=list&amp;catid=3" >重庆时时彩</a></li>
				<li id="catid_5"><a href="/index.php?c=content&amp;a=list&amp;catid=5"  >广东快乐十分</a></li>
				<li id="catid_6"><a href="/index.php?c=content&amp;a=list&amp;catid=6"  >北京快乐8</a></li>
				<li id="catid_7"><a href="/index.php?c=content&amp;a=list&amp;catid=7" >江苏快三</a></li>
				<li id="catid_8"><a href="/index.php?c=content&amp;a=list&amp;catid=8" >重庆幸运农场</a></li>
				<li id="catid_51"><a href="/index.php?c=content&amp;a=list&amp;catid=51"  >彩票资讯</a></li>

			</div>
		</div>
	</div>
</div>
<div class="banner1"><a href="http://sf1166.com/reg.php?intr=33133kai"  target="_blank"><img src="<?php echo SITE_THEME; ?>images/tiao.gif?v=123456" /></a></div>
<div class="wumain">

<script type="text/javascript">	
function showLocale(objD){
	var str,colorhead,colorfoot;
	var yy = objD.getYear();
	if(yy<1900) yy = yy+1900;
	var MM = objD.getMonth()+1;
	if(MM<10) MM = '0' + MM;
	var dd = objD.getDate();
	if(dd<10) dd = '0' + dd;
	var hh = objD.getHours();
	if(hh<10) hh = '0' + hh;
	var mm = objD.getMinutes();
	if(mm<10) mm = '0' + mm;
	var ss = objD.getSeconds();
	if(ss<10) ss = '0' + ss;
	var ww = objD.getDay();
	if  ( ww==0 )  colorhead="<font color=\"#ae8559\">";
	if  ( ww > 0 && ww < 6 )  colorhead="<font color=\"#ae8559\">";
	if  ( ww==6 )  colorhead="<font color=\"#ae8559\">";
	if  (ww==0)  ww="星期日";
	if  (ww==1)  ww="星期一";
	if  (ww==2)  ww="星期二";
	if  (ww==3)  ww="星期三";
	if  (ww==4)  ww="星期四";
	if  (ww==5)  ww="星期五";
	if  (ww==6)  ww="星期六";
	colorfoot="</font>"
	str = colorhead + yy + "-" + MM + "-" + dd + " " + hh + ":" + mm + ":" + ss + "  " + ww + colorfoot;
	return(str);
}
function tick(){
	var today;
	today = new Date();
	document.getElementById("localtime").innerHTML = showLocale(today);
	window.setTimeout("tick()", 1000);
}
tick();
</script>
<div class="height0"></div>