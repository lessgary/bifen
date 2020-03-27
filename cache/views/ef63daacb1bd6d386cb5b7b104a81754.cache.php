<?php include $this->_include('header'); ?>
<link href="<?php echo SITE_THEME; ?>images/style.old.trend.css" rel="stylesheet" />
    <style type="text/css">
        .lot-table tbody tr td { background-color: #fff; height: 21px; }
        .yilou { color: #decdd7; }
        .h-b { font-style: normal; display: block; position: absolute; top: -45px; left: -40px; width: 35px; }
        .h-em { font-style: normal; display: block; position: absolute; top: -25px; left: -80px; width: 55px; }
        .out { border-top: 40px #CECCCE solid; width: 0px; height: 0px; border-left: 99px #ECECEC solid; position: relative; }
        .tips { width: 978px; border: solid 1px #fed22f; background-color: #fff0a5; text-align: left; color: #0089ff; line-height: 25px; padding-left: 25px; clear: both; }
    </style>


<div class="g_w1000min open_form">
	<div class="g_w1000 ">
		<div class="sub_right  ">
			<?php include $this->_include('pk10_com_nav'); ?>
			<div class="sub_r_bot history">
				<div class="sub_bot_one">
					<span class="sub_bot_bt">PK10 位置走势</span> <span class="r">开奖日期:&nbsp;&nbsp;
					<input class="sub_rili Wdate  date" type="text" id="datetimepicker" value="">
					<a href="javascript:void(0); " class="g_button btn_orange rili_submit">查询更多</a></span>
				</div>
			</div>
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
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="g_w1000 ">
    <div class="content" style="margin-top: 0px;">
		<div class="qiuxuanze">
		<?php $i=1;  if (is_array($cats)) { $count=count($cats);foreach ($cats as $t) {  if ($t['parentid']==112) {  if ($i!=1) { ?><span>|</span><?php } ?><a href="<?php if ($catid!=$t['catid']) {  echo $t['url'];  } else { ?>javascript:;<?php } ?>" class="<?php if ($catid==$t['catid']) { ?>a<?php } ?>"><?php echo $t['catname']; ?></a>
		<?php $i++;  }  } } ?>
		</div>
        <div style="float: left; padding-left: 20px" id="times-show" class="tips">
            <label>标注形式选择：</label>
            <input type="checkbox" style="padding-right: 10px; cursor: pointer;" checked="checked" id="yl">
            <label for="yl" style="padding-right: 10px; cursor: pointer;">遗漏</label>&nbsp;&nbsp;       
        </div>
        <div class="g_clear"></div>
        <div class="cont_box">
            <table class="lot-table sub_table" id="tb2">
                <colgroup>
                    <col style="">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                </colgroup>
                <thead style="height: 40px; background-color: #ECECEC;">
                    <tr>
                        <td>
                            <div class="out">
                                <b class="h-b">彩球</b>
                                <em class="h-em">期号</em>
                            </div>
                        </td>
                        <td style="font-size: 14px; font-weight: bold;">1</td>
                        <td style="font-size: 14px; font-weight: bold;">2</td>
                        <td style="font-size: 14px; font-weight: bold;">3</td>
                        <td style="font-size: 14px; font-weight: bold;">4</td>
                        <td style="font-size: 14px; font-weight: bold;">5</td>
                        <td style="font-size: 14px; font-weight: bold;">6</td>
                        <td style="font-size: 14px; font-weight: bold;">7</td>
                        <td style="font-size: 14px; font-weight: bold;">8</td>
                        <td style="font-size: 14px; font-weight: bold;">9</td>
                        <td style="font-size: 14px; font-weight: bold;">10</td>
                        <td style="font-size: 14px; font-weight: bold;">大</td>
                        <td style="font-size: 14px; font-weight: bold;">小</td>
                        <td style="font-size: 14px; font-weight: bold;">单</td>
                        <td style="font-size: 14px; font-weight: bold;">双</td>
                    </tr>
                </thead>
<tbody>
<?php $i1=1; $i2=1; $i3=1; $i4=1; $i5=1; $i6=1; $i7=1; $i8=1; $i9=1; $i10=1; $i11=1; $i12=1; $i13=1; $i14=1;  $c1=0; $c2=0; $c3=0; $c4=0; $c5=0; $c6=0; $c7=0; $c8=0; $c9=0; $c10=0; $c11=0; $c12=0; $c13=0; $c14=0;  $day = isset($_GET['day']) ? $_GET['day']:date('Y-m-d',time());
  $return = $this->_listdata("catid=2 LIKEopentime=%$day% pagesize=500 more=1 order=id"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  $a = explode(',',$t['opencode']); ?>
<tr>
<td style="background: #fff;"><?php echo $t['expect']; ?>&nbsp;&nbsp;&nbsp;(<?php echo $t['opentime']; ?>)</td>
			
<td style="background-color: #F9F4DF;" <?php if ($a[0]!=1) { ?>class="yilou"<?php } ?>><?php if ($a[0]==1) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i1=1;  $c1++;  } else {  echo $i1;  $i1++;  } ?></td>
<td style="background-color: #F9F4DF;" <?php if ($a[0]!=2) { ?>class="yilou"<?php } ?>><?php if ($a[0]==2) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i2=1;  $c2++;  } else {  echo $i2;  $i2++;  } ?></td>
<td style="background-color: #F9F4DF;" <?php if ($a[0]!=3) { ?>class="yilou"<?php } ?>><?php if ($a[0]==3) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i3=1;  $c3++;  } else {  echo $i3;  $i3++;  } ?></td>
<td style="background-color: #F9F4DF;" <?php if ($a[0]!=4) { ?>class="yilou"<?php } ?>><?php if ($a[0]==4) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i4=1;  $c4++;  } else {  echo $i4;  $i4++;  } ?></td>
<td style="background-color: #F9F4DF;" <?php if ($a[0]!=5) { ?>class="yilou"<?php } ?>><?php if ($a[0]==5) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i5=1;  $c5++;  } else {  echo $i5;  $i5++;  } ?></td>
            
<td style="background-color: #F2E6FF;" <?php if ($a[0]!=6) { ?>class="yilou"<?php } ?>><?php if ($a[0]==6) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i6=1;  $c6++;  } else {  echo $i6;  $i6++;  } ?></td>
<td style="background-color: #F2E6FF;" <?php if ($a[0]!=7) { ?>class="yilou"<?php } ?>><?php if ($a[0]==7) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i7=1;  $c7++;  } else {  echo $i7;  $i7++;  } ?></td>
<td style="background-color: #F2E6FF;" <?php if ($a[0]!=8) { ?>class="yilou"<?php } ?>><?php if ($a[0]==8) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i8=1;  $c8++;  } else {  echo $i8;  $i8++;  } ?></td>
<td style="background-color: #F2E6FF;" <?php if ($a[0]!=9) { ?>class="yilou"<?php } ?>><?php if ($a[0]==9) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i9=1;  $c9++;  } else {  echo $i9;  $i9++;  } ?></td>
<td style="background-color: #F2E6FF;" <?php if ($a[0]!=10) { ?>class="yilou"<?php } ?>><?php if ($a[0]==10) { ?><span class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10" style="margin-right: 0;"></span><?php $i10=1;  $c10++;  } else {  echo $i10;  $i10++;  } ?></td>
<td style="background-color: #f4f4f4;" <?php if ($a[0]<6) { ?>class="yilou"<?php } ?>><?php if ($a[0]>5) { ?><span class="spanbg1">大</span><?php $i11=1;  $c11++;  } else {  echo $i11;  $i11++;  } ?></td>
<td style="background-color: #f4f4f4;" <?php if ($a[0]>5) { ?>class="yilou"<?php } ?>><?php if ($a[0]<6) { ?><span class="spanbg2">小</span><?php $i12=1;  $c12++;  } else {  echo $i12;  $i12++;  } ?></td>
<td style="background-color: #f4f4f4;" <?php if ($a[0]%2!=0) { ?>class="yilou"<?php } ?>><?php if ($a[0]%2==0) { ?><span class="spanbg3">双</span><?php $i13=1;  $c13++;  } else {  echo $i13;  $i13++;  } ?></td>
<td style="background-color: #f4f4f4;" <?php if ($a[0]%2==0) { ?>class="yilou"<?php } ?>><?php if ($a[0]%2!=0) { ?><span class="spanbg4">单</span><?php $i14=1;  $c14++;  } else {  echo $i14;  $i14++;  } ?></td>
</tr>
<?php } } ?>
<tr>
<td>累计总次数</td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c1; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c2; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c3; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c4; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c5; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c6; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c7; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c8; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c9; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c10; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c11; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c12; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c13; ?></td>
<td style="background:#a1120a; color: #fff; font-weight:700"><?php echo $c14; ?></td>
</tr>

</tbody>
</table>
        </div>
    </div>
</div>
<script type="text/javascript">
$("#yl").click(function () {
	if ($("#yl").prop("checked") == false) {
		$(".lot-table tbody .yilou").each(function () {
			var bgc = $(this).css("background-color");
			$(this).css("color", bgc)
		});
	} else {
		$(".lot-table tbody .yilou").css("color", "#decdd7");
	}
});
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