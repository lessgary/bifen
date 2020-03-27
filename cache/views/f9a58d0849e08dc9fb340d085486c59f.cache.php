<?php include $this->_include('header'); ?>
<div class="g_w1000min open_form">
	<div class="g_w1000  ">
		<?php include $this->_include('hk6_com_nav');  include $this->_include('hk6_com_kj'); ?>
	</div>
	<div class="clear">
	</div>
</div>
<div class="g_w1000  ">
	<div class="sub_r_bot">
		<div class="sub_bot_one">
			<span class="sub_bot_bt">香港六合彩在线统计器</span><small style="margin-left: 10px;"></small> <span class="r"></span>
		</div>
	</div>
</div>
<div class="g_w1000">
	<form style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px" name="form">
		<table style="background-color: #C0C0C0; width: 1000px;" border="0" cellspacing="1">
			<tr>
				<td style="background-color: #FFFFFF;line-height:18pt;width:1000px;margin: 5px;padding:5px;" ><strong>两面：</strong>
					<input title="01,03,05,07,09,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49," onclick="addText('单,');" type="button" value="单" name="n_单">
					<input title="25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49," onclick="addText('大,');" type="button" value="大" name="n_大">
					<input title="01,03,05,07,09,10,12,14,16,18,21,23,25,27,29,30,32,34,36,38,41,43,45,47,49," onclick="addText('合单,');" type="button" value="合单" name="n_合单">
					<input title="07,08,09,16,17,18,19,25,26,27,28,29,34,35,36,37,38,39,43,44,45,46,47,48,49," onclick="addText('合大,');" type="button" value="合大" name="n_合大">
					<input title="05,06,07,08,09,15,16,17,18,19,25,26,27,28,29,35,36,37,38,39,45,46,47,48,49," onclick="addText('尾大,');" type="button" value="尾大" name="n_尾大">
					<input title="25,27,29,31,33,35,37,39,41,43,45,47,49," onclick="addText('大单,');" type="button" value="大单" name="n_大单">
					<input title="26,28,30,32,34,36,38,40,42,44,46,48," onclick="addText('大双,');" type="button" value="大双" name="n_大双">
					<input title="02,04,06,08,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48," onclick="addText('双,');" type="button" value="双" name="n_双">
					<input title="01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24," onclick="addText('小,');" type="button" value="小" name="n_小">
					<input title="02,04,06,08,11,13,15,17,19,20,22,24,26,28,31,33,35,37,39,40,42,44,46,48," onclick="addText('合双,');" type="button" value="合双" name="n_合双">
					<input title="01,02,03,04,05,06,10,11,12,13,14,15,20,21,22,23,24,30,31,32,33,40,41,42," onclick="addText('合小,');" type="button" value="合小" name="n_合小">
					<input title="01,02,03,04,10,11,12,13,14,20,21,22,23,24,30,31,32,33,34,40,41,42,43,44," onclick="addText('尾小,');" type="button" value="尾小" name="n_尾小">
					<input title="01,03,05,07,09,11,13,15,17,19,21,23," onclick="addText('小单,');" type="button" value="小单" name="n_小单">
					<input title="02,04,06,08,10,12,14,16,18,20,22,24," onclick="addText('小双,');" type="button" value="小双" name="n_小双">
					<strong>波色：</strong>
					<input title="01,02,07,08,12,13,18,19,23,24,29,30,34,35,40,45,46," style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px" onclick="addText('红波,');" type="button" value="红波" name="n_红波">
					<input title="05,06,11,16,17,21,22,27,28,32,33,38,39,43,44,49," style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px" onclick="addText('绿波,');" type="button" value="绿波" name="n_绿波">
					<input title="03,04,09,10,14,15,20,25,26,31,36,37,41,42,47,48," style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px" onclick="addText('蓝波,');" type="button" value="蓝波" name="n_蓝波">
					<strong>半波：</strong>
					<input title="01,07,13,19,23,29,35,45," onclick="addText('红单,');" type="button" value="红单" name="n_红单">
					<input title="05,11,17,21,27,33,39,43,49," onclick="addText('绿单,');" type="button" value="绿单" name="n_绿单">
					<input title="03,09,15,25,31,37,41,47," onclick="addText('蓝单,');" type="button" value="蓝单" name="n_蓝单">
					<input title="02,08,12,18,24,30,34,40,46," onclick="addText('红双,');" type="button" value="红双" name="n_红双">
					<input title="06,16,22,28,32,38,44," onclick="addText('绿双,');" type="button" value="绿双" name="n_绿双">
					<input title="04,10,14,20,26,36,42,48," onclick="addText('蓝双,');" type="button" value="蓝双" name="n_蓝双">
					<br />
					<strong>生肖：</strong>
					<input title="01,13,25,37,49," onclick="addText('马,');" type="button" value="马" name="n_马">
					<input title="02,14,26,38," onclick="addText('蛇,');" type="button" value="蛇" name="n_蛇">
					<input title="03,15,27,39," onclick="addText('龙,');" type="button" value="龙" name="n_龙">
					<input title="04,16,28,40," onclick="addText('兔,');" type="button" value="兔" name="n_兔">
					<input title="05,17,29,41," onclick="addText('虎,');" type="button" value="虎" name="n_虎">
					<input title="06,18,30,42," onclick="addText('牛,');" type="button" value="牛" name="n_牛">
					<input title="07,19,31,43," onclick="addText('鼠,');" type="button" value="鼠" name="n_鼠">
					<input title="08,20,32,44," onclick="addText('猪,');" type="button" value="猪" name="n_猪">
					<input title="09,21,33,45," onclick="addText('狗,');" type="button" value="狗" name="n_狗">
					<input title="10,22,34,46," onclick="addText('鸡,');" type="button" value="鸡" name="n_鸡">
					<input title="11,23,35,47," onclick="addText('猴,');" type="button" value="猴" name="n_猴">
					<input title="12,24,36,48," onclick="addText('羊,');" type="button" value="羊" name="n_羊">
					<input title="03,05,06,07,09,10,15,17,18,19,21,22,27,29,30,31,33,34,39,41,42,43,45,46," onclick="addText('家畜,');" type="button" value="家畜" name="n_家畜">
					<input title="01,02,04,08,11,12,13,14,16,20,23,24,25,26,28,32,35,36,37,38,40,44,47,48,49," onclick="addText('野兽,');" type="button" value="野兽" name="n_野兽">
					<strong>五行：</strong>
					<input title="01,14,15,22,23,30,31,44,45," onclick="addText('金,');" type="button" value="金" name="n_金">
					<input title="04,05,12,13,26,27,34,35,42,43," onclick="addText('木,');" type="button" value="木" name="n_木">
					<input title="02,03,10,11,18,19,32,33,40,41,48,49," onclick="addText('水,');" type="button" value="水" name="n_水">
					<input title="06,07,20,21,28,29,36,37," onclick="addText('火,');" type="button" value="火" name="n_火">
					<input title="08,09,16,17,24,25,38,39,46,47," onclick="addText('土,');" type="button" value="土" name="n_土">
					<strong>方位：</strong>
					<input title="31,32,33,34,35,36,37,38,39,40,41,42," onclick="addText('东段,');" type="button" value="东段" name="n_东段">
					<input title="19,20,21,22,23,24,25,26,27,28,29,30," onclick="addText('南段,');" type="button" value="南段" name="n_南段">
					<input title="07,08,09,10,11,12,13,14,15,16,17,18," onclick="addText('西段,');" type="button" value="西段" name="n_西段">
					<input title="01,02,03,04,05,06,43,44,45,46,47,48,49," onclick="addText('北段,');" type="button" value="北段" name="n_北段">
					<br />
					<strong>尾数：</strong>
					<input title="10,20,30,40," onclick="addText('0尾,');" type="button" value="0尾" name="n_0尾">
					<input title="01,11,21,31,41," onclick="addText('1尾,');" type="button" value="1尾" name="n_1尾">
					<input title="02,12,22,32,42," onclick="addText('2尾,');" type="button" value="2尾" name="n_2尾">
					<input title="03,13,23,33,43," onclick="addText('3尾,');" type="button" value="3尾" name="n_3尾">
					<input title="04,14,24,34,44," onclick="addText('4尾,');" type="button" value="4尾" name="n_4尾">
					<input title="05,15,25,35,45," onclick="addText('5尾,');" type="button" value="5尾" name="n_5尾">
					<input title="06,16,26,36,46," onclick="addText('6尾,');" type="button" value="6尾" name="n_6尾">
					<input title="07,17,27,37,47," onclick="addText('7尾,');" type="button" value="7尾" name="n_7尾">
					<input title="08,18,28,38,48," onclick="addText('8尾,');" type="button" value="8尾" name="n_8尾">
					<input title="09,19,29,39,49," onclick="addText('9尾,');" type="button" value="9尾" name="n_9尾">
					<strong>头数：</strong>
					<input title="01,02,03,04,05,06,07,08,09," onclick="addText('0头,');" type="button" value="0头" name="n_0头">
					<input title="10,11,12,13,14,15,16,17,18,19," onclick="addText('1头,');" type="button" value="1头" name="n_1头">
					<input title="20,21,22,23,24,25,26,27,28,29," onclick="addText('2头,');" type="button" value="2头" name="n_2头">
					<input title="30,31,32,33,34,35,36,37,38,39," onclick="addText('3头,');" type="button" value="3头" name="n_3头">
					<input title="40,41,42,43,44,45,46,47,48,49," onclick="addText('4头,');" type="button" value="4头" name="n_4头">
					<input title="01,03,05,07,09," onclick="addText('0头单,');" type="button" value="0头单" name="n_0头单">
					<input title="11,13,15,17,19," onclick="addText('1头单,');" type="button" value="1头单" name="n_1头单">
					<input title="21,23,25,27,29," onclick="addText('2头单,');" type="button" value="2头单" name="n_2头单">
					<input title="31,33,35,37,39," onclick="addText('3头单,');" type="button" value="3头单" name="n_3头单">
					<input title="41,43,45,47,49," onclick="addText('4头单,');" type="button" value="4头单" name="n_4头单">
					<input title="02,04,06,08," onclick="addText('0头双,');" type="button" value="0头双" name="n_0头双">
					<input title="10,12,14,16,18," onclick="addText('1头双,');" type="button" value="1头双" name="n_1头双">
					<input title="20,22,24,26,28," onclick="addText('2头双,');" type="button" value="2头双" name="n_2头双">
					<input title="30,32,34,36,38," onclick="addText('3头双,');" type="button" value="3头双" name="n_3头双">
					<input title="40,42,44,46,48," onclick="addText('4头双,');" type="button" value="4头双" name="n_4头双">
					<br />
					<strong>门数：</strong>
					<input title="01,02,03,04,05,06,07,08,09," onclick="addText('1门,');" type="button" value="1门" name="n_1门">
					<input title="10,11,12,13,14,15,16,17,18," onclick="addText('2门,');" type="button" value="2门" name="n_2门">
					<input title="19,20,21,22,23,24,25,26,27," onclick="addText('3门,');" type="button" value="3门" name="n_3门">
					<input title="28,29,30,31,32,33,34,35,36,37," onclick="addText('4门,');" type="button" value="4门" name="n_4门">
					<input title="38,39,40,41,42,43,44,45,46,47,48,49," onclick="addText('5门,');" type="button" value="5门" name="n_5门">
					<strong>段数：</strong>
					<input title="01,02,03,04,05,06,07," onclick="addText('1段,');" type="button" value="1段" name="n_1段">
					<input title="08,09,10,11,12,13,14," onclick="addText('2段,');" type="button" value="2段" name="n_2段">
					<input title="15,16,17,18,19,20,21," onclick="addText('3段,');" type="button" value="3段" name="n_3段">
					<input title="22,23,24,25,26,27,28," onclick="addText('4段,');" type="button" value="4段" name="n_4段">
					<input title="29,30,31,32,33,34,35," onclick="addText('5段,');" type="button" value="5段" name="n_5段">
					<input title="36,37,38,39,40,41,42," onclick="addText('6段,');" type="button" value="6段" name="n_6段">
					<input title="43,44,45,46,47,48,49," onclick="addText('7段,');" type="button" value="7段" name="n_7段">
					<br />
					<strong>合数：</strong>
					<input title="01,10," onclick="addText('1合,');" type="button" value="1合" name="n_1合">
					<input title="02,11,20," onclick="addText('2合,');" type="button" value="2合" name="n_2合">
					<input title="03,12,21,30," onclick="addText('3合,');" type="button" value="3合" name="n_3合">
					<input title="04,13,22,31,40," onclick="addText('4合,');" type="button" value="4合" name="n_4合">
					<input title="05,14,23,32,41," onclick="addText('5合,');" type="button" value="5合" name="n_5合">
					<input title="06,15,24,33,42," onclick="addText('6合,');" type="button" value="6合" name="n_6合">
					<input title="07,16,25,34,43," onclick="addText('7合,');" type="button" value="7合" name="n_7合">
					<input title="08,17,26,35,44," onclick="addText('8合,');" type="button" value="8合" name="n_8合">
					<input title="09,18,27,36,45," onclick="addText('9合,');" type="button" value="9合" name="n_9合">
					<input title="19,28,37,46," onclick="addText('10合,');" type="button" value="10合" name="n_10合">
					<input title="29,38,47," onclick="addText('11合,');" type="button" value="11合" name="n_11合">
					<input title="39,48," onclick="addText('12合,');" type="button" value="12合" name="n_12合">
					<input title="49," onclick="addText('13合,');" type="button" value="13合" name="n_13合">
					<input title="19,28,37,46," onclick="addText('0合尾,');" type="button" value="0合尾" name="n_0合尾">
					<input title="01,10,29,38,47," onclick="addText('1合尾,');" type="button" value="1合尾" name="n_1合尾">
					<input title="02,11,20,39,48," onclick="addText('2合尾,');" type="button" value="2合尾" name="n_2合尾">
					<input title="03,12,21,30,49," onclick="addText('3合尾,');" type="button" value="3合尾" name="n_3合尾">
					<input title="04,13,22,31,40," onclick="addText('4合尾,');" type="button" value="4合尾" name="n_4合尾">
					<input title="05,14,23,32,41," onclick="addText('5合尾,');" type="button" value="5合尾" name="n_5合尾">
					<input title="06,15,24,33,42," onclick="addText('6合尾,');" type="button" value="6合尾" name="n_6合尾">
					<input title="07,16,25,34,43," onclick="addText('7合尾,');" type="button" value="7合尾" name="n_7合尾">
					<input title="08,17,26,35,44," onclick="addText('8合尾,');" type="button" value="8合尾" name="n_8合尾">
					<input title="09,18,27,36,45," onclick="addText('9合尾,');" type="button" value="9合尾" name="n_9合尾">
					<br />
					<strong>余数：</strong>
					<input title="03,06,09,12,15,18,21,24,27,30,33,36,39,42,45,48," onclick="addText('3余零,');" type="button" value="3余0" name="n_3余零">
					<input title="01,04,07,10,13,16,19,22,25,28,31,34,37,40,43,46,49," onclick="addText('3余一,');" type="button" value="3余1" name="n_3余一">
					<input title="02,05,08,11,14,17,20,23,26,29,32,35,38,41,44,47," onclick="addText('3余二,');" type="button" value="3余2" name="n_3余二">
					<input title="04,08,12,16,20,24,28,32,36,40,44,48," onclick="addText('4余零,');" type="button" value="4余0" name="n_4余零">
					<input title="01,05,09,13,17,21,25,29,33,37,41,45,49," onclick="addText('4余一,');" type="button" value="4余1" name="n_4余一">
					<input title="02,06,10,14,18,22,26,30,34,38,42,46," onclick="addText('4余二,');" type="button" value="4余2" name="n_4余二">
					<input title="03,07,11,15,19,23,27,31,35,39,43,47," onclick="addText('4余三,');" type="button" value="4余3" name="n_4余三">
					<input title="05,10,15,20,25,30,35,40,45," onclick="addText('5余零,');" type="button" value="5余0" name="n_5余零">
					<input title="01,06,11,16,21,26,31,36,41,46," onclick="addText('5余一,');" type="button" value="5余1" name="n_5余一">
					<input title="02,07,12,17,22,27,32,37,42,47," onclick="addText('5余二,');" type="button" value="5余2" name="n_5余二">
					<input title="03,08,13,18,23,28,33,38,43,48," onclick="addText('5余三,');" type="button" value="5余3" name="n_5余三">
					<input title="04,09,14,19,24,29,34,39,44,49," onclick="addText('5余四,');" type="button" value="5余4" name="n_5余四">
					<input title="06,12,18,24,30,36,42,48," onclick="addText('6余零,');" type="button" value="6余0" name="n_6余零">
					<input title="01,07,13,19,25,31,37,43,49," onclick="addText('6余一,');" type="button" value="6余1" name="n_6余一">
					<input title="02,08,14,20,26,32,38,44," onclick="addText('6余二,');" type="button" value="6余2" name="n_6余二">
					<input title="03,09,15,21,27,33,39,45," onclick="addText('6余三,');" type="button" value="6余3" name="n_6余三">
					<input title="04,10,16,22,28,34,40,46," onclick="addText('6余四,');" type="button" value="6余4" name="n_6余四">
					<input title="05,11,17,23,29,35,41,47," onclick="addText('6余五,');" type="button" value="6余5" name="n_6余五">
					<input title="07,14,21,28,35,42,49," onclick="addText('7余零,');" type="button" value="7余0" name="n_7余零">
					<input title="01,08,15,22,29,36,43," onclick="addText('7余一,');" type="button" value="7余1" name="n_7余一">
					<input title="02,09,16,23,30,37,44," onclick="addText('7余二,');" type="button" value="7余2" name="n_7余二">
					<input title="03,10,17,24,31,38,45," onclick="addText('7余三,');" type="button" value="7余3" name="n_7余三">
					<input title="04,11,18,25,32,39,46," onclick="addText('7余四,');" type="button" value="7余4" name="n_7余四">
					<input title="05,12,19,26,33,40,47," onclick="addText('7余五,');" type="button" value="7余5" name="n_7余五">
					<input title="06,13,20,27,34,41,48," onclick="addText('7余六,');" type="button" value="7余6" name="n_7余六">
					<br />
					<strong></strong><br />
					<input title="01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,25,26,27,28," onclick="addText('楼上码,');" type="button" value="楼上码" name="n_楼上码">
					<input title="01,02,03,04,05,06,07,08,17,18,19,20,21,22,23,24,33,34,35,36,37,38,39,40," onclick="addText('前落码,');" type="button" value="前落码" name="n_前落码">
					<input title="01,02,03,04,08,09,10,11,15,16,17,18,22,23,24,29,30,31,36,37,38,43,44,45," onclick="addText('左边码,');" type="button" value="左边码" name="n_左边码">
					<input title="09,10,11,12,13,16,17,18,19,20,23,24,25,26,27,30,31,32,33,34,37,38,39,40,41," onclick="addText('内围码,');" type="button" value="内围码" name="n_内围码">
					<input title="13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37," onclick="addText('中数,');" type="button" value="中数" name="n_中数">
					<input title="22,23,24,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49," onclick="addText('楼下码,');" type="button" value="楼下码" name="n_楼下码">
					<input title="09,10,11,12,13,14,15,16,25,26,27,28,29,30,31,32,41,42,43,44,45,46,47,48,49," onclick="addText('后落码,');" type="button" value="后落码" name="n_后落码">
					<input title="05,06,07,12,13,14,19,20,21,25,26,27,28,32,33,34,35,39,40,41,42,46,47,48,49," onclick="addText('右边码,');" type="button" value="右边码" name="n_右边码">
					<input title="01,02,03,04,05,06,07,08,14,15,21,22,28,29,35,36,42,43,44,45,46,47,48,49," onclick="addText('外围码,');" type="button" value="外围码" name="n_外围码">
					<input title="01,02,03,04,05,06,07,08,09,10,11,12,38,39,40,41,42,43,44,45,46,47,48,49," onclick="addText('边数,');" type="button" value="边数" name="n_边数">
					&nbsp;输入号码段数:
					<input id="id_hao_from" style="WIDTH: 30px" maxlength="2" name="hao_from">
					&nbsp;至&nbsp;
					<input id="id_hao_to" style="WIDTH: 30px" maxlength="2" name="hao_to">
					&nbsp;
					<input style="WIDTH: 50px" onclick="addteduan();" type="button" value="插入">
					(限:01-49) <br />
					<label></label>
					<br />
					<input style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FLOAT: left; PADDING-BOTTOM: 0px; MARGIN: 0px; WIDTH: 62px; PADDING-TOP: 0px;" onclick="countma();" type="button" value="统计号码">
					&nbsp;
					<input style="PADDING-RIGHT: 0px; DISPLAY: inline; PADDING-LEFT: 0px;  PADDING-BOTTOM: 0px; MARGIN: 0px; WIDTH: 62px; PADDING-TOP: 0px;"  onclick="resetinput();" type="button" value=" 清 空 "></td>
			</tr>
			<tr>
				<td style="background-color: #FFFFFF; "><textarea style="MARGIN: 5px; WIDTH: 980px; HEIGHT: 50px" name="inputtxt" wrap="PHYSICAL"></textarea></td>
			</tr>
			<tr>
				<td style="background-color: #FFFFFF;padding:5px;"><h2>统计结果：</h2></td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" width="575px"><textarea style="MARGIN: 5px; WIDTH: 980px; WORD-BREAK: break-all; HEIGHT: 100px" name="resultstxt" wrap="off"></textarea></td>
			</tr>
		</table>
	</form>
</div>
<?php include $this->_include('footer'); ?>
<script src="<?php echo SITE_THEME; ?>images/countonline.js"></script>