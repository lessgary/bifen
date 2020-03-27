<?php include $this->_include('header'); ?>
<div class="g_w1000min open_form">
	<div class="g_w1000 ">
		<div class="sub_right  ">
			<?php include $this->_include('cqssc_com_nav'); ?>
			<div class="sub_r_open_form sub_r_open_form_10011">
				<?php $return = $this->_listdata("catid=$catid num=1 order=id more=1"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  $a = explode(',',$t['opencode']); ?>
				<div class="sub_mid_l">
					<h1>重庆时时彩 </h1>
					<h2>本期第<em id="cterm" style="color: #ff0000"><?php echo $t['expect']; ?></em>期</h2>
					<h3><em id="fre_info">每5/10分钟</em>一期,全天<em id="fre_total">120</em>期</h3>
					<h3>当前<em id="c_now">45</em>期,剩<em id="c_less">75</em>期</h3>
					<div class="shuang_anniu">
						<span><a target="_blank" class="g_button btn_orange" href="./index.php?c=content&a=list&catid=55">开奖视频</a></span>
					</div>
				</div>
				<div class="sub_mid_c">
					<h2>本期开奖结果：<em id="msgInfo" style="color: rgb(255, 0, 0); display: none;">...数据加载中,如不正常请手动刷新...</em></h2>
					<div class="result">
						<ul id="term_ball">
							<span title="7" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[1]; ?></span><span title="9" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[1]; ?></span><span title="2" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[2]; ?></span><span title="2" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[3]; ?></span><span title="2" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[4]; ?></span>
						</ul>
					</div>
				</div>
				<div class="sub_mid_r">
					<h2>下期【第<em id="nterm" style="color: #ff0000"><?php echo $t['expect']+1; ?></em>期】</h2>
					<h3><em id="ndate" style="color: #fff">
						<p>08:45</p>
						</em></h3>
					<div class="btn_bar">
						<div id="player" style="display: none;">
						</div>
						<span><a target="_blank" class="g_button btn_white" href="./index.php?c=content&a=show&id=2">彩种玩法</a></span><span><a href="javascript:setRing();" class="g_button btn_white">铃声设置</a></span>
					</div>
					<div class="clear">
					</div>
				</div>
				<?php } } ?>
				<div class="g_clear">
				</div>
			</div>
			<div class="open_notic_tip g_hide" style="display: none;">
				<span class="msg">注意：重庆时时彩 第<em>000000</em>期 未开奖，您可以手动刷新或等待自动刷新！</span>
			</div>
			<div class="sub_r_bot">
				<div class="sub_bot_one">
					<span class="sub_bot_bt">开奖记录</span> <span style="margin: 25px 0 0 20px; display: block; float: left; cursor: pointer; color: #A85E09; height: 20px; line-height: 16px; font-size: 14px;">
					
					
					<input type="checkbox" id="hmfb1" onclick="showorhide(this, 'chdball');" name="checkbox">
					<label for="hmfb1">查看号码分布</label>
					</span>
				</div>
			</div>
			<style>
    .dx_shadow { width: 1000px; }

    .top_right { border-bottom: 1px solid #e3e3e3; font-size: 12px; height: 25px; line-height: 25px; }
    .top_right_red { border-bottom: 1px solid #e3e3e3; color: red; font-size: 12px; height: 25px; line-height: 25px; }
    .chuxian { height: 25px; line-height: 25px; }
</style>


			<table id="" class="sub_table g_w1000 chdball g_hide">
				<tbody>
					<tr class="show_hm">
						<td><strong>查看车号分布：</strong></td>
						<td style="text-align: left;"><input type="checkbox" data_val="1" name="checkbox" id="ball1">
							<label for="ball1">号码1</label>
							<input type="checkbox" data_val="2" name="checkbox" id="ball2">
							<label for="ball2">号码2</label>
							<input type="checkbox" data_val="3" name="checkbox" id="ball3">
							<label for="ball3">号码3</label>
							<input type="checkbox" data_val="4" name="checkbox" id="ball4">
							<label for="ball4">号码4</label>
							<input type="checkbox" data_val="5" name="checkbox" id="ball5">
							<label for="ball5">号码5</label>
							<input type="checkbox" data_val="6" name="checkbox" id="ball6">
							<label for="ball6">号码6</label>
							<input type="checkbox" data_val="7" name="checkbox" id="ball7">
							<label for="ball7">号码7</label>
							<input type="checkbox" data_val="8" name="checkbox" id="ball8">
							<label for="ball8">号码8</label>
							<input type="checkbox" data_val="9" name="checkbox" id="ball9">
							<label for="ball9">号码9</label>
							<input type="checkbox" data_val="0" name="checkbox" id="ball0">
							<label for="ball0">号码0</label>
							<span style="margin-left: 20px;"> <a onclick="clearShade(this, false)" style="color: red" href="javascript:void(0);">还原</a> </span></td>
					</tr>
					<tr class="show_tp">
						<td><strong>大小单双分布：</strong></td>
						<td style="text-align: left;"><input type="checkbox" id="d" date_oe="o" name="o">
							<label for="d">单</label>
							<input type="checkbox" id="s" date_oe="e" name="e">
							<label for="s">双</label>
							<span>|</span>
							<input type="checkbox" id="da" date_bs="b" name="b">
							<label for="da">大</label>
							<input type="checkbox" id="xiao" date_bs="s" name="s">
							<label for="xiao">小</label>
							<span style="margin-left: 20px;"> <a onclick="clearShade(this, false)" style="color: red" href="javascript:void(0);">还原</a> </span></td>
					</tr>
				</tbody>
			</table>
			<table width="100%" cellspacing="0" cellpadding="0" border="0" class="sub_table">
				<thead>
					<tr id="th_header">
						<th width="163" class="">时间 </th>
						<th width="103" class="">期数 </th>
						<th width="380" class="">开奖号码 </th>
						<th class="" colspan="3">总和</th>
						<th colspan="1">龙虎</th>
					</tr>
				</thead>
				<tbody linnos="0,1,2,5" id="reslist">
				
				<?php $return = $this->_listdata("catid=$catid page=$page order=id more=1"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  $a = explode(',',$t['opencode']); ?>
				<tr  <?php if (($key+1)%2==0) { ?>class="line_row"<?php } ?>>
					<td><?php echo $t['opentime']; ?></td>
					<td> <?php echo $t['expect']; ?> </td>
					<td><span title="<?php echo $a[0]; ?>" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[0]; ?></span> <span title="<?php echo $a[1]; ?>" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[1]; ?></span> <span title="<?php echo $a[2]; ?>" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[2]; ?></span> <span title="<?php echo $a[3]; ?>" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[3]; ?></span> <span title="<?php echo $a[4]; ?>" class="  ball_s_ ball_s_blue ball_lenght5  "><?php echo $a[4]; ?></span></td>
					<td class="count"><?php echo $a[0]+$a[1]+$a[2]+$a[3]+$a[4]; ?></td>
					<td class="<?php if (($a[1]+$a[1]+$a[2]+$a[3]+$a[4])%2==0) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4])%2==0) { ?>双<?php } else { ?>单<?php } ?></td>
					<td class="<?php if (($a[1]+$a[1]+$a[2]+$a[3]+$a[4])>=23) { ?>blue<?php } else { ?>gray<?php } ?>"><?php if (($a[0]+$a[1]+$a[2]+$a[3]+$a[4])>=23) { ?>大<?php } else { ?>小<?php } ?></td>
					<td class="<?php if ($a[1]>$a[4]) { ?>blue<?php } else if ($a[1]==$a[4]) { ?>green<?php } else { ?>gray<?php } ?>"><?php if ($a[0]>$a[4]) { ?>龙<?php } else if ($a[1]==$a[4]) { ?>和<?php } else { ?>虎<?php } ?></td>
				</tr>
				<?php } } ?>
					</tbody>
				
			</table>
			<div class="hisloading" style="display: none;">
				<img src="<?php echo SITE_THEME; ?>images/loading_flash.gif">
			</div>
			<div class="sub_hr">
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
</div>
<?php include $this->_include('footer'); ?>