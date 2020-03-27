<?php include $this->_include('header'); ?>
<div class="g_w1000min open_form">
	<div class="g_w1000 ">
		<div class="sub_right">
			<?php include $this->_include('gdklsf_com_nav'); ?>
		</div>
		<div class="clear">
		</div>
		<div class="sub_r_bot history">
			<div class="sub_bot_one">
				<span class="sub_bot_bt">广东快乐十分 开奖记录</span> <span class="r">开奖日期:&nbsp;&nbsp;
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
					<th colspan='3' class="">总和</th>
					<th class="">尾大小</th>
					<th colspan="4">1-4球龙虎</th>
				</tr>
			</thead>
			<tbody>
			
			<?php $day = isset($_GET['day']) ? $_GET['day']:date('Y-m-d',time());
			  $con = mysqli_connect("localhost","root","new-password","kjwang23dmei");
			$sql = "select * from fn_content_1_gdklsf where opentime like '%$year%'  ORDER BY `id` DESC";
			$res = mysqli_query($con,$sql);
			$list = array();
			while($row=mysqli_fetch_assoc($res))
			$list[] = $row;

			foreach($list as $res) {
			$a = explode(',',$res['opencode']);

			 ?>
			<tr <?php if (($key+1)%2==0) { ?>class="line_row"<?php } ?>>
				<td><?php echo $res['opentime']; ?></td>
				<td> <?php echo $res['expect']; ?> </td>
				<td><?php $a = explode(',',$res['opencode']); ?>
				<span title="<?php echo $a[0]; ?>" class="  ball_s_ ball_s_blue ball_lenght8  "><?php echo $a[0]; ?></span>
				<span title="<?php echo $a[1]; ?>" class="  ball_s_ ball_s_blue ball_lenght8  "><?php echo $a[1]; ?></span>
				<span title="<?php echo $a[2]; ?>" class="  ball_s_ ball_s_blue ball_lenght8  "><?php echo $a[2]; ?></span>
				<span title="<?php echo $a[3]; ?>" class="  ball_s_ ball_s_blue ball_lenght8  "><?php echo $a[3]; ?></span>
				<span title="<?php echo $a[4]; ?>" class="  ball_s_ ball_s_blue ball_lenght8  "><?php echo $a[4]; ?></span>
				<span title="<?php echo $a[5]; ?>" class="  ball_s_ ball_s_blue ball_lenght8  "><?php echo $a[5]; ?></span>
				<span title="<?php echo $a[6]; ?>" class="  ball_s_ ball_s_blue ball_lenght8  "><?php echo $a[6]; ?></span>
				<span title="<?php echo $a[7]; ?>" class="  ball_s_ ball_s_blue ball_lenght8  "><?php echo $a[7]; ?></span>
				</td>
				<td class="count"><?php echo $a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7]; ?></td>
				<td class="<?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7])==84) { ?>gray<?php } else if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7])>84) { ?>blue<?php } else { ?>green<?php } ?>"><?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7])==84) { ?>和<?php } else if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7])>84) { ?>大<?php } else { ?>小<?php } ?></td>
				<td class="<?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7])%2==0) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7])%2==0) { ?>双<?php } else { ?>单<?php } ?></td>
				<td class="<?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7])%10 < 5) { ?>gray<?php } else { ?>blue<?php } ?>"><?php if ((($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]+$a[7])%10) < 5) { ?>尾小<?php } else { ?>尾大<?php } ?></td>
				<td class="<?php if ($a[0]>$a[7]) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if ($a[0]>$a[7]) { ?>龙<?php } else { ?>虎<?php } ?></td>
				<td class="<?php if ($a[1]>$a[6]) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if ($a[1]>$a[6]) { ?>龙<?php } else { ?>虎<?php } ?></td>
				<td class="<?php if ($a[2]>$a[5]) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if ($a[2]>$a[5]) { ?>龙<?php } else { ?>虎<?php } ?></td>
				<td class="<?php if ($a[3]>$a[4]) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if ($a[3]>$a[4]) { ?>龙<?php } else { ?>虎<?php } ?></td>
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