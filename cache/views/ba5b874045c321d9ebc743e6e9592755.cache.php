<?php include $this->_include('header'); ?>
<div class="g_w1000min open_form">
    <div class="g_w1000 ">
        <div class="sub_right  ">
            <?php include $this->_include('pk10_com_nav'); ?>
        </div>
        <div class="clear"> </div>
		<div class="sub_r_bot history">
            <div class="sub_bot_one">
                <span class="sub_bot_bt">北京PK拾 开奖记录</span>
                <span class="r">开奖日期:&nbsp;&nbsp;
 <input type="text" id="datetimepicker" value="" class="sub_rili Wdate  date"><a class="g_button btn_orange rili_submit" href="javascript:void(0); ">查询更多</a></span>
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

	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="sub_table">
	<thead>
		<tr id="th_header">
			<th width="163" class="">时间 </th>
			<th width="103" class="">期数 </th>
			<th width="380" class="">开奖号码 </th>
			<th class="g_r_line" colspan="3">冠亚</th>
			<th colspan="5">1-5球龙虎</th>
		</tr>
	</thead>
	<tbody linnos="0,1,2,5" id="reslist">
		<?php $day = isset($_GET['day']) ? $_GET['day']:date('Y-m-d',time());
          $con = mysqli_connect("localhost","root","new-password","kjwang23dmei");
		$sql = "select * from fn_content_1_bjpk10 where opentime like '%$year%'  ORDER BY `id` DESC";
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
				<ul>
					<span title="<?php echo $a[0]; ?>" class="ball_pks_  ball_pks<?php echo $a[0]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[1]; ?>" class="ball_pks_  ball_pks<?php echo $a[1]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[2]; ?>" class="ball_pks_  ball_pks<?php echo $a[2]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[3]; ?>" class="ball_pks_  ball_pks<?php echo $a[3]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[4]; ?>" class="ball_pks_  ball_pks<?php echo $a[4]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[5]; ?>" class="ball_pks_  ball_pks<?php echo $a[5]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[6]; ?>" class="ball_pks_  ball_pks<?php echo $a[6]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[7]; ?>" class="ball_pks_  ball_pks<?php echo $a[7]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[8]; ?>" class="ball_pks_  ball_pks<?php echo $a[8]; ?> ball_lenght10  ">&nbsp;</span>
					<span title="<?php echo $a[9]; ?>" class="ball_pks_  ball_pks<?php echo $a[9]; ?> ball_lenght10  ">&nbsp;</span>
				</ul>
			</td>
			<td class="count"><?php echo $a[0]+$a[1]; ?></td>
			<td class="<?php if (($a[0]+$a[1])>11) { ?>gray<?php } else { ?>blue<?php } ?>"><?php if (($a[0]+$a[1])>11) { ?>大<?php } else { ?>小<?php } ?></td>
			<td class="<?php if (($a[0]+$a[1])%2==0) { ?>gray<?php } else { ?>blue<?php } ?> g_r_line g_td_p_right"><?php if (($a[0]+$a[1])%2==0) { ?>双<?php } else { ?>单<?php } ?></td>
			<td class="<?php if ($a[1]>$a[9]) { ?>gray<?php } else { ?>blue<?php } ?> g_td_p_left"><?php if ($a[0]>$a[9]) { ?>龙<?php } else { ?>虎<?php } ?></td>
			<td class="<?php if ($a[1]>$a[8]) { ?>gray<?php } else { ?>blue<?php } ?>"><?php if ($a[1]>$a[8]) { ?>龙<?php } else { ?>虎<?php } ?></td>
			<td class="<?php if ($a[2]>$a[7]) { ?>gray<?php } else { ?>blue<?php } ?>"><?php if ($a[2]>$a[7]) { ?>龙<?php } else { ?>虎<?php } ?></td>
			<td class="<?php if ($a[3]>$a[6]) { ?>gray<?php } else { ?>blue<?php } ?>"><?php if ($a[3]>$a[6]) { ?>龙<?php } else { ?>虎<?php } ?></td>
			<td class="<?php if ($a[4]>$a[5]) { ?>gray<?php } else { ?>blue<?php } ?>"><?php if ($a[4]>$a[5]) { ?>龙<?php } else { ?>虎<?php } ?></td>
		</tr>
		<?php }  ?>
	</tbody>
</table>
	<div class="hisloading" style="display: none;"><img src="<?php echo SITE_THEME; ?>images/loading_flash.gif"></div>
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