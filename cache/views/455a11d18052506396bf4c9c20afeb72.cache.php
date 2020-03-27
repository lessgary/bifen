<?php include $this->_include('header'); ?>

<div class="g_w1000min open_form">
	<div class="g_w1000 open_form">
		<div class="sub_right right">
			<?php include $this->_include('pk10_com_nav'); ?>
		</div>
		<div class="clear"> </div>
	</div>
</div>


<div class="g_w1000 ">
    <div class="content">
        <div class="g_w1000  ">
<div class="sub_r_bot">
    <div class="sub_bot_one">
        <span class="sub_bot_bt"><strong>北京PK10：</strong> 开奖号码分析 </span>
        <span class="r">开奖日期:&nbsp;&nbsp;
 <input type="text" id="datetimepicker" value="" class="sub_rili Wdate  date"><a class="g_button btn_orange rili_submit" href="javascript:void(0); ">查询更多</a></span>
        </span>
    </div>
</div>
        </div>
        <style>
.tr1 { background-color: #fff; height: 27px; }
.tr2 { background-color: #F5F5F5; height: 27px; }
.cont_box table td { border: #dce6ec 1px solid; text-align: center; line-height: 30px; height: 30px; }
.cont_box table thead { background: #F9F9F9; }
.cont_box .xuhao { width: 36px; }
.cont_box .trem { width: 76px; }
.cont_box .ball { width: 77px; }
.cont_box .ball_no { width: 22px; }
.cont_box .ball_lm { width: 54px; }
.cont_box .gyh_ { width: 35px; }
.gray { color: #F00078 !important; }
.blue { color: #0072E3 !important; }
/*.table_box { border-left: #dce6ec 1px solid; margin-bottom: 20px; background: #fff; border-top: #dce6ec 1px solid; }
.cont_box .table_box .tabbg { line-height: 22px; background: #F9F9F9; height: 22px; }*/
        </style>
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_THEME; ?>images/jquery.datetimepicker.css" />
		<script type="text/javascript" src="<?php echo SITE_THEME; ?>images/jquery.datetimepicker.js"></script>
		<script>
		$('#datetimepicker').datetimepicker({
			yearOffset:0,
			lang:'ch',
			timepicker:false,
			format:'Y-m-d',
			formatDate:'Y-m-d'
		});
		</script>
		
		
        <div class="cont_box ">
<table width="100%" cellspacing="1" cellpadding="0" border="0" align="center" id="chartstable" class="table_box sub_table">
    <thead>
        <tr style="background-color: #FFCE6F;">
<td colspan="25">
    <input type="checkbox" onclick="dd('ckdd', 'daxiao_d');" checked="checked" id="ckdd">大
    <input type="checkbox" onclick="dd('ckxx', 'daxiao_x');" checked="checked" id="ckxx">小
    <input type="checkbox" onclick="dd('ckds', 'danshuang_d');" checked="checked" id="ckds">单
    <input type="checkbox" onclick="dd('ckss', 'danshuang_s');" checked="checked" id="ckss">双
    <input type="checkbox" onclick="dd('ckll', 'longhu_l');" checked="checked" id="ckll">龙
    <input type="checkbox" onclick="dd('ckhh', 'longhu_h');" checked="checked" id="ckhh">虎
</td>
        </tr>
        <tr>
<td class="xuhao" rowspan="2">序号
</td>
<td rowspan="2" class=" trem">期号
</td>
<td colspan="20" class="">彩球号
</td>
<td colspan="3">冠亚军和
</td>
        </tr>
        <tr>
<td colspan="2" class=" ball">冠军
</td>
<td colspan="2" class=" ball">亚军
</td>
<td colspan="2" class=" ball">第三位
</td>
<td colspan="2" class=" ball">第四位
</td>
<td colspan="2" class=" ball">第五位
</td>
<td colspan="2" class=" ball">第六位
</td>
<td colspan="2" class=" ball">第七位
</td>
<td colspan="2" class=" ball">第八位
</td>
<td colspan="2" class=" ball">第九位
</td>
<td colspan="2" class=" ball">第十位
</td>
<td class=" gyh_">和
</td>
<td class="gyh_">大小
</td>
<td class="gyh_">单双
</td>
        </tr>
    </thead>
    <tbody>
				
<?php $day = isset($_GET['day']) ? $_GET['day']:date('Y-m-d',time());
  $return = $this->_listdata("catid=$parentid LIKEopentime=%$day% pagesize=500 more=1 order=id"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  $a = explode(',',$t['opencode']); ?>
<tr class="tr <?php if (($key+1)%2==0) { ?>2<?php } else { ?>1<?php } ?>">
<td class="xuhao"><strong><?php echo $total-$key; ?></strong></td>
<td class=" trem"><?php echo $t['expect']; ?> </td>
<td class="ball_no"><strong><?php echo $a[0]+0; ?></strong></td>
<td class="  ball_lm"><span class="<?php if ($a[0]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[0]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[0]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[0]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[0]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[0]>$a[9]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[1]+0; ?></strong></td>
<td class="  ball_lm"><span class="<?php if ($a[1]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[1]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[1]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[1]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[1]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[1]>$a[8]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[2]+0; ?></strong></td>
<td class="  ball_lm"><span class="<?php if ($a[2]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[2]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[2]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[2]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[2]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[2]>$a[7]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[3]+0; ?></strong></td>
<td class="  ball_lm"><span class="<?php if ($a[3]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[3]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[3]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[3]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[3]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[3]>$a[6]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[4]+0; ?></strong></td>
<td class="  ball_lm"><span class="<?php if ($a[4]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[4]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[4]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[4]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[4]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[4]>$a[5]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[5]+0; ?></strong></td>
<td class=" ball_lm"><span class="<?php if ($a[5]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[5]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[5]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[5]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[5]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[5]>$a[4]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[6]+0; ?></strong></td>
<td class=" ball_lm"><span class="<?php if ($a[6]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[6]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[6]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[6]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[6]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[6]>$a[3]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[7]+0; ?></strong></td>
<td class=" ball_lm"><span class="<?php if ($a[7]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[7]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[7]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[7]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[7]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[7]>$a[2]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[8]+0; ?></strong></td>
<td class=" ball_lm"><span class="<?php if ($a[8]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[8]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[8]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[8]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[8]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[8]>$a[1]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class="ball_no"><strong><?php echo $a[9]+0; ?></strong></td>
<td class=" ball_lm"><span class="<?php if ($a[9]>5) { ?>blue daxiao_d<?php } else { ?>gray daxiao_x<?php } ?>"><?php if ($a[9]>5) { ?>大<?php } else { ?>小<?php } ?></span><span class="<?php if ($a[9]%2==0) { ?>gray danshuang_s<?php } else { ?>blue danshuang_d<?php } ?>"><?php if ($a[9]%2==0) { ?>双<?php } else { ?>单<?php } ?></span><span class="<?php if ($a[9]>$a[9]) { ?>}blue longhu_l<?php } else { ?>gray longhu_h<?php } ?>"><?php if ($a[9]>$a[0]) { ?>龙<?php } else { ?>虎<?php } ?></span></td>
<td class=" gyh_"><?php echo $a[0]+$a[1]; ?></td>
<td class=" gyh_"><span class="gray"><?php if (($a[0]+$a[1])>11) { ?>大<?php } else { ?>小<?php } ?></span></td>
<td class=""><span class="gray"><?php if (($a[0]+$a[1])%2==0) { ?>双<?php } else { ?>单<?php } ?></span></td>
</tr>
<?php } } ?>
</tbody>
</table>
        </div>
    </div>
</div>
<script>
function dd(getid, getclass) {
	var id = document.getElementById(getid);
	if (id.checked == true) {
		$("." + getclass + "").show();
	}
	else {
		$("." + getclass + "").hide();
	}
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".rili_submit").click(function(event) {
            var url = "index.php?c=content&a=list&catid="+<?php echo $param['catid']; ?>+"&day="+$(".sub_rili").val();
            window.location.href=url;
        });
    });
</script>
<?php include $this->_include('footer'); ?>