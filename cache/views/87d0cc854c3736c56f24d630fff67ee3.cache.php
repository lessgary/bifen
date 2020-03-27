 <?php include $this->_include('header'); ?>
<div class="g_w1000min open_form">
	<div class="g_w1000 open_form">
		<div class="sub_right right">
			<?php include $this->_include('hk6_com_nav');  include $this->_include('hk6_com_kj'); ?>
		</div>
		<div class="clear">
		</div>
	</div>
</div>
<div class="g_w1000min open_form">
	<div class="g_w1000 open_form">
		<div class="g_line">
		</div>
		<div class="  hk6_con_form">
				<div class="sub_r_bot">
					<div class="sub_bot_one">
						<span class="sub_bot_bt">开奖记录</span> <span class="r"><a href="./index.php?c=content&a=list&catid=17" class="g_button btn_orange">更多历史>></a></span>
					</div>
				</div>
				<div class="his_form">
					<table class="sub_table" cellpadding="0" cellspacing="0" border="0" width="100%">
						<thead>
							<tr id="th_header">
								<th width="90" rowspan="2"  class="g_r_line">期数 </th>
								<th width="340" rowspan="2"  class="g_r_line">开奖号码 </th>
								<th colspan="4"  class="g_r_line">总和 </th>
								<th colspan="5">特码 </th>
							</tr>
							<tr>
								<th style="font-size: 12px;">总数 </th>
								<th style="font-size: 12px;">单双 </th>
								<th style="font-size: 12px;">大小 </th>
								<th style="font-size: 12px;"  class="g_r_line">七色波 </th>
								<th style="font-size: 12px;">单双 </th>
								<th style="font-size: 12px;">大小 </th>
								<th style="font-size: 12px;">合单双 </th>
								<th style="font-size: 12px;">合大小 </th>
								<th style="font-size: 12px;">尾大小 </th>
							</tr>
						</thead>
						<tbody>

<!--香港彩是按年做记录的-->
			<?php $year = isset($_GET['day']) ? $_GET['day']:date('Y',time());
       		  $bose = array(1=>"red",2=>"red",7=>"red",8=>"red",12=>"red",13=>"red",18=>"red",19=>"red",23=>"red",24=>"red",29=>"red",30=>"red",34=>"red",35=>"red",40=>"red",45=>"red",46=>"red",3=>"blue", 4=>"blue", 9=>"blue", 10=>"blue", 14=>"blue", 15=>"blue", 20=>"blue", 25=>"blue", 26=>"blue", 31=>"blue", 36=>"blue", 37=>"blue", 41=>"blue", 42=>"blue", 47=>"blue", 48=>"blue", 5=>"green", 6=>"green", 11=>"green", 16=>"green", 17=>"green", 21=>"green", 22=>"green", 27=>"green", 28=>"green", 32=>"green", 33=>"green", 38=>"green", 39=>"green", 43=>"green", 44=>"green", 49=>"green");  $bisezhongwen = array("red"=>"红","blue"=>"蓝","green"=>"绿");  $dangqian_y = date('Y',time());  $nian_cha = ($dangqian_y-2008)%12-1;  $shengxiao = array("鸡","猴","羊","马","蛇","龙","兔","虎","牛","鼠","猪","狗");  $con = mysqli_connect("localhost","root","new-password","kjwang23dmei");
			$sql = "select * from fn_content_1_hk6 where opentime like '%$year%'  ORDER BY `id` DESC";
			$res = mysqli_query($con,$sql);
			$list = array();
			while($row=mysqli_fetch_assoc($res))
			$list[] = $row;

			foreach($list as $res) {
			$a = explode(',',$res['opencode']);

			 ?>
			<tr <?php if (($key+1)%2==0) { ?>style="background-color:#eff2f7;"<?php } ?>>
				<td> <?php echo $res['expect']; ?> </td>
				<td><ul>
						<li class="item"><span class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[0]]; ?>"><?php echo $a[0]; ?></span><em><?php echo $shengxiao[(int)$a[0]%12]; ?></em></li>
						<li class="item"><span class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[1]]; ?>"><?php echo $a[1]; ?></span><em><?php echo $shengxiao[(int)$a[1]%12]; ?></em></li>
						<li class="item"><span class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[2]]; ?>"><?php echo $a[2]; ?></span><em><?php echo $shengxiao[(int)$a[2]%12]; ?></em></li>
						<li class="item"><span class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[3]]; ?>"><?php echo $a[3]; ?></span><em><?php echo $shengxiao[(int)$a[3]%12]; ?></em></li>
						<li class="item"><span class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[4]]; ?>"><?php echo $a[4]; ?></span><em><?php echo $shengxiao[(int)$a[4]%12]; ?></em></li>
						<li class="item"><span class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[5]]; ?>"><?php echo $a[5]; ?></span><em><?php echo $shengxiao[(int)$a[5]%12]; ?></em></li>
						<li class="item_add"><span class="ball_hk6_ ">+</span></li>
						<li class="item"><span class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[6]]; ?>"><?php echo $a[6]; ?></span><em><?php echo $shengxiao[(int)$a[6]%12]; ?></em></li>
					</ul></td>
				<td class="count"><?php echo $a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]; ?></td>
				<td class="gray"><?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6])%2==0) { ?>双<?php } else { ?>单<?php } ?></td>
				<td class="blue"><?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6])>=175) { ?>大<?php } else { ?>小<?php } ?></td>
				<td class="<?php echo $bose[$a[6]]; ?>"><?php echo $bisezhongwen[$bose[(int)$a[6]]]; ?></td>
				<td class="<?php if ($a[6]%2==0) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if ($a[6]%2==0) { ?>双<?php } else { ?>单<?php } ?></td>
				<td class="<?php if ($a[6]>25 && $a[6]<49) { ?>bule<?php } else if ($a[6]==49) { ?>count<?php } else { ?>gray<?php } ?>"><?php if ($a[6]>25 && $a[6]<49) { ?>大<?php } else if ($a[6]==49) { ?>和<?php } else { ?>小<?php } ?></td>
				<?php
					$b = array();
					if((int)$a[6] < 10){
						$b[1] = 0;
						$b[2] = $a[6];
					}else{
						$b[1] = $a[6][0];
						$b[2] = $a[6][1];
					}
				?>
				<td class="<?php if (($b[1]+$b[2])%2==0) { ?>count<?php } else { ?>bule<?php } ?> max"><?php if (($b[1]+$b[2])%2==0) { ?>合双<?php } else { ?>合单<?php } ?></td>
				<td class="<?php if (($b[1]+$b[2])>6) { ?>gray<?php } else { ?>blue<?php } ?> max"><?php if (($b[1]+$b[2])>6) { ?>合大<?php } else { ?>合小<?php } ?></td>
				<td class="<?php if ($b[2]<5) { ?>gray<?php } else { ?>blue<?php } ?> max">
				<?php if ($b[2]<5) { ?>尾小<?php } else { ?>尾大<?php } ?>
				</td>
			</tr>
	<?php }  ?>
			</tbody>


					</table>
					
					<div class="g_clear"></div>
				</div>
				<div class="g_clear"></div>
			
			<div class="g_clear">
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php include $this->_include('footer'); ?>