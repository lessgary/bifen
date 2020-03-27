<?php include $this->_include('header'); ?>
<div class="g_w1000min open_form">
	<div class="g_w1000 ">
		<div class="sub_right  ">
			<?php include $this->_include('bjkl8_com_nav'); ?>
		</div>
		<div class="clear">
		</div>
		<div class="sub_r_bot history">
			<div class="sub_bot_one">
				<span class="sub_bot_bt">北京快乐8 开奖记录</span> <span class="r">开奖日期:&nbsp;&nbsp;
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
		
		
		<table class="sub_table" cellpadding="0" cellspacing="0" border="0" width="100%">
			<thead>
				<tr id="th_header">
					<th width="163" class="">时间 </th>
					<th width="103" class="">期数 </th>
					<th width="380" class="">开奖号码 </th>
					<th colspan='3' class="" width="103">总和</th>
					<th class="">单双</th>
					<th class="">前后</th>
					<th>总和组合</th>
					<th>五行</th>
				</tr>
			</thead>
			<tbody>
			
			<?php $day = isset($_GET['day']) ? $_GET['day']:date('Y-m-d',time());
			  $con = mysqli_connect("localhost","root","new-password","kjwang23dmei");
			$sql = "select * from fn_content_1_bjkl8 where opentime like '%$year%'  ORDER BY `id` DESC";
			$res = mysqli_query($con,$sql);
			$list = array();
			while($row=mysqli_fetch_assoc($res))
			$list[] = $row;

			foreach($list as $res) {
			$a = explode(',',$res['opencode']);

			  $a = explode(',',$res['opencode']); ?>
			<tr <?php if (($key+1)%2==0) { ?>class="line_row"<?php } ?>>
				<td><?php echo $res['opentime']; ?></td>
				<td> <?php echo $res['expect']; ?> </td>
				<td><ul>
						<div class="row">
							<span title="<?php echo $a[0]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[0]; ?></span><span title="<?php echo $a[1]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[1]; ?></span><span title="<?php echo $a[2]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[2]; ?></span><span title="<?php echo $a[3]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[3]; ?></span><span title="<?php echo $a[4]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[4]; ?></span><span title="<?php echo $a[5]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[5]; ?></span><span title="<?php echo $a[6]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[6]; ?></span><span title="<?php echo $a[7]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[7]; ?></span><span title="<?php echo $a[8]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[8]; ?></span><span title="<?php echo $a[9]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[9]; ?></span>
						</div>
						<div class="row">
							<span title="<?php echo $a[10]; ?>" class=" ball_klb_ ball_klb2 ball_lenght21  "><?php echo $a[10]; ?></span><span title="<?php echo $a[11]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[11]; ?></span><span title="<?php echo $a[12]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[12]; ?></span><span title="<?php echo $a[13]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[13]; ?></span><span title="<?php echo $a[14]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[14]; ?></span><span title="<?php echo $a[15]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[15]; ?></span><span title="<?php echo $a[16]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[16]; ?></span><span title="<?php echo $a[17]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[17]; ?></span><span title="<?php echo $a[18]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[18]; ?></span><span title="<?php echo $a[19]; ?>" class=" ball_klb_ ball_klb2_blue ball_lenght21  "><?php echo $a[19]; ?></span><span title="<?php echo $a[20]; ?>" class=" ball_klb_ ball_klb2_yellow ball_lenght21  "><?php echo $a[20]; ?></span>
						</div>
					</ul></td>
				<?php $zong = $a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7]+$a[8]+$a[9]+$a[10]+$a[11]+$a[12]+$a[13]+$a[14]+$a[15]+$a[16]+$a[17]+$a[18]+$a[19]+$a[20] ?>
				<td class="count"><?php echo $zong; ?></td>
				<td class="<?php if ($zong == 810) { ?>green<?php } else if ($zong >810) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if ($zong == 810) { ?>和<?php } else if ($zong >810) { ?>大<?php } else { ?>小<?php } ?></td>
				<td class="<?php if ($zong%2==0) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if ($zong%2==0) { ?>双<?php } else { ?>单<?php } ?></td>
<?php
$ppsz = array();
$ppsz[] = (int)$a[0];
$ppsz[] = (int)$a[1];
$ppsz[] = (int)$a[2];
$ppsz[] = (int)$a[3];
$ppsz[] = (int)$a[4];
$ppsz[] = (int)$a[5];
$ppsz[] = (int)$a[6];
$ppsz[] = (int)$a[7];
$ppsz[] = (int)$a[8];
$ppsz[] = (int)$a[9];
$ppsz[] = (int)$a[10];
$ppsz[] = (int)$a[11];
$ppsz[] = (int)$a[12];
$ppsz[] = (int)$a[13];
$ppsz[] = (int)$a[14];
$ppsz[] = (int)$a[15];
$ppsz[] = (int)$a[16];
$ppsz[] = (int)$a[17];
$ppsz[] = (int)$a[18];
$ppsz[] = (int)$a[19];
$ppsz[] = (int)$a[20];

$ppsz_dan=0; 
$ppsz_shuang=0;
$ppsz_qian=0; 
$ppsz_hou=0;

for ($w1=0; $w1<20; $w1++){
    if ($ppsz[$w1] %2 ==0) {
        $ppsz_shuang++; 
    }else {
        $ppsz_dan++; 
    }
}

for ($w1=0; $w1<21; $w1++){
    if ($ppsz[$w1] < 41) {
        $ppsz_qian++; 
    }else {
        $ppsz_hou++; 
    }
}
?>
				<td class="<?php if ($ppsz_dan == $ppsz_shuang) { ?>gray<?php } else if ($ppsz_dan > $ppsz_shuang) { ?>gray<?php } else { ?>blue<?php } ?> max"><?php if ($ppsz_dan == $ppsz_shuang) { ?>单双和<?php } else if ($ppsz_dan > $ppsz_shuang) { ?>单多<?php } else { ?>双多<?php } ?></td>
				<td class="<?php if ($ppsz_qian > $ppsz_hou) { ?>blue<?php } else { ?>gray<?php } ?> max"><?php if ($ppsz_qian > $ppsz_hou) { ?>前多<?php } else { ?>后多<?php } ?></td>
				<td class="<?php if ($zong%2==0) { ?>blue<?php } else { ?>gray<?php } ?> max <?php if ($zong >810) { ?>max2<?php } ?>">总<?php if ($zong == 810) { ?>和<?php } else if ($zong >810) { ?>大<?php } else { ?>小<?php }  if ($zong%2==0) { ?>双<?php } else { ?>单<?php } ?></td>
				<td class="blue">
				<?php if (($zong < 696) && ($zong > 209)) { ?>金<?php } else if (($zong < 764) && ($zong > 695)) { ?>木<?php } else if (($zong < 856) && ($zong > 763)) { ?>水<?php } else if (($zong < 924) && ($zong > 855)) { ?>火<?php } else { ?>土<?php } ?>
				</td>
			</tr>
			<?php }  ?>
			</tbody>
		</table>

		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".rili_submit").click(function(event) {
            var url = "index.php?c=content&a=list&catid="+<?php echo $param['catid']; ?>+"&day="+$(".sub_rili").val();
            window.location.href=url;
        });
    });
</script> 
<?php include $this->_include('footer'); ?> 