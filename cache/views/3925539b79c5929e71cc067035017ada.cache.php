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
<div class="g_w1000">
	<div class="content">
		<div class="g_w1000  ">
			<div class="sub_r_bot">
				<div class="sub_bot_one">
					<span class="sub_bot_bt"><strong>香港彩：</strong> 基本走势 </span>
				</div>
			</div>
		</div>
		<div class="cont_box">
			<table class="table_box sub_table" id="chartstable" cellspacing="1" cellpadding="0" width="100%"
                align="center" border="0">
				<tbody>
					<tr class="tabbg weight">
						<td style="cursor: pointer" width="80" rowspan="2">序号 </td>
						<td class="line_r" rowspan="2">期号</td>
						<td class="line_r" colspan="7">彩球号</td>
						<td class="line_r" rowspan="2" colspan="3">总和</td>
						<td class="line_r" rowspan="2" colspan="2">特别号</td>
						<td class="line_r" rowspan="2" colspan="2">特别号合数</td>
						<td class="line_r" rowspan="2">特别号生肖</td>
						<td class="line_r" rowspan="2">色波</td>
					</tr>
					<tr class="tabbg weight">
						<td class="line_r">正码一</td>
						<td class="line_r">正码二</td>
						<td class="line_r">正码三</td>
						<td class="line_r">正码四</td>
						<td class="line_r">正码五</td>
						<td class="line_r">正码六</td>
						<td class="line_r">特别号</td>
					</tr>
				<?php $year = isset($_GET['day']) ? $_GET['day']:date('Y',time());
				  $bose = array(1=>"red",2=>"red",7=>"red",8=>"red",12=>"red",13=>"red",18=>"red",19=>"red",23=>"red",24=>"red",29=>"red",30=>"red",34=>"red",35=>"red",40=>"red",45=>"red",46=>"red",3=>"blue", 4=>"blue", 9=>"blue", 10=>"blue", 14=>"blue", 15=>"blue", 20=>"blue", 25=>"blue", 26=>"blue", 31=>"blue", 36=>"blue", 37=>"blue", 41=>"blue", 42=>"blue", 47=>"blue", 48=>"blue", 5=>"green", 6=>"green", 11=>"green", 16=>"green", 17=>"green", 21=>"green", 22=>"green", 27=>"green", 28=>"green", 32=>"green", 33=>"green", 38=>"green", 39=>"green", 43=>"green", 44=>"green", 49=>"green");  $bisezhongwen = array("red"=>"红","blue"=>"蓝","green"=>"绿");  $jiaqin = array ('牛','马','羊','鸡','狗','猪');  $yeshou = array ('鼠','虎','兔','龙','蛇','猴');  $dangqian_y = date('Y',time());  $nian_cha = ($dangqian_y-2008)%12-1;  $shengxiao = array("鸡","猴","羊","马","蛇","龙","兔","虎","牛","鼠","猪","狗");  $return = $this->_listdata("catid=$parentid LIKEopentime=%$year% page=$page num=500 order=id more=1"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  $a = explode(',',$t['opencode']); ?>
				<tr class="tr<?php if (($key+1)%2==0) { ?>2<?php } else { ?>1<?php } ?>">
					<td><?php echo $key+1; ?></td>
					<td class="line_r"><?php echo $t['expect']; ?></td>
					<td><span class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[0]]; ?>"><?php echo $a[0]; ?></span></td>
					<td><span  class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[1]]; ?>"><?php echo $a[1]; ?></span></td>
					<td><span  class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[2]]; ?>"><?php echo $a[2]; ?></span></td>
					<td><span  class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[3]]; ?>"><?php echo $a[3]; ?></span></td>
					<td><span  class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[4]]; ?>"><?php echo $a[4]; ?></span></td>
					<td><span  class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[5]]; ?>"><?php echo $a[5]; ?></span></td>
					<td><span  class="ball_hk6_ ball_hk6_<?php echo $bose[(int)$a[6]]; ?>"><?php echo $a[6]; ?></span></td>
					<td class="fonthold"><?php echo $a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6]; ?></td>
					<td class="<?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6])>174) { ?>da<?php } else { ?>xiao<?php } ?>"><?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6])>174) { ?>大<?php } else { ?>小<?php } ?></td>
					<td class="<?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6])%2==0) { ?>shuang<?php } else { ?>dan<?php } ?>"><?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4]+$a[5]+$a[6])%2==0) { ?>双<?php } else { ?>单<?php } ?></td>
					<td class="<?php if ($a[6]>24) { ?>da<?php } else { ?>xiao<?php } ?>"><?php if ($a[6]>24) { ?>大<?php } else { ?>小<?php } ?></td>
					<td class="<?php if (($a[6]%2)==0) { ?>shuang<?php } else { ?>dan<?php } ?>"><?php if (($a[6]%2)==0) { ?>双<?php } else { ?>单<?php } ?></td>
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
					<td class="<?php if (($b[1]+$b[2])>6) { ?>heda<?php } else { ?>hexiao<?php } ?>"><?php if (($b[1]+$b[2])>6) { ?>合大<?php } else { ?>合小<?php } ?></td>
					<td class="<?php if (($b[1]+$b[2])%2==0) { ?>heshuang<?php } else { ?>hedan<?php } ?>"><?php if (($b[1]+$b[2])%2==0) { ?>合双<?php } else { ?>合单<?php } ?></td>
					<td class="<?php if (in_array($shengxiao[(int)$a[6]%12], $jiaqin)) { ?>jiaqin<?php } else { ?>yeshou<?php } ?>" style="line-height: 12px;">【<?php echo $shengxiao[(int)$a[6]%12]; ?>】<?php if (in_array($shengxiao[(int)$a[6]%12], $jiaqin)) { ?>家禽<?php } else { ?>野兽<?php } ?></td>
					<td class="<?php echo $bose[(int)$a[6]]; ?> "><?php echo $bisezhongwen[$bose[(int)$a[6]]]; ?></td>
				</tr>
				<?php } } ?>
					</tbody>
				
			</table>
		</div>
	</div>
</div>
<?php include $this->_include('footer'); ?>