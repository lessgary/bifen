<?php include $this->_include('header'); ?>
<div class="g_w1000min open_form">
	<div class="g_w1000 ">
		<div class="sub_right  ">
			<?php include $this->_include('pk10_com_nav'); ?>
		</div>
		<div class="clear">
		</div>
		<div class="sub_r_bot history">
			<div class="sub_bot_one"><span class="sub_bot_bt">北京PK拾 最新35期冠亚和走势图</span></div>
		</div>

<div class="cont_box">
<script src="<?php echo SITE_THEME; ?>images/echarts.min.js"></script>


<div id="d_qishu" class="none"><?php $i=1;  $return = $this->_listdata("catid=$parentid LIKEopentime=%$day% num=35 more=1 order=id_DESC"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  $a = substr($t['expect'],-2);  if ($i>1) { ?>,<?php }  echo $a;  $i++;  } } ?></div>
<div id="d_hao1" class="none"><?php $i=1;  $return = $this->_listdata("catid=$parentid LIKEopentime=%$day% num=35 more=1 order=id_DESC"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  $a = explode(',',$t['opencode']);  if ($i>1) { ?>,<?php }  echo $a[0]+$a[1];  $i++;  } } ?></div>
<div id="mainchart" class="pk10_chart_pp4"></div>
<div id="mainchart2" class="pk10_chart_pp5"></div>
<script type="text/javascript">
var myChart = echarts.init(document.getElementById('mainchart'));
var sz_qishu = $("#d_qishu").text().split(",").reverse();
var sz_hao1 = $("#d_hao1").text().split(",").reverse();
option = {
    title: {
        text: '最新35期冠亚和走势图',
		left: 'center',
    },
    tooltip: {
        trigger: 'axis'
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
       	data: sz_qishu,
		splitNumber:20//分成几段
    },
    yAxis: {
        type: 'value',
		max:20,//X轴最大值
		splitNumber:10//分成几段
    },
    series: [{
        name: '冠亚和',
		symbol:'circle',
		symbolSize:'17',
        type: 'line',
		label: {
			normal: {
				show: true,
				position: 'insideBottom'
			}
		},
        smooth: true,
        data: sz_hao1
    }]
};
myChart.setOption(option);
</script>


<script type="text/javascript">
var myChart = echarts.init(document.getElementById('mainchart2'));
var sz_qishu = $("#d_qishu").text().split(",").reverse();
var sz_hao1 = $("#d_hao1").text().split(",").reverse();
option = {
	title: {
        text: '最新35期冠亚和走势图',
		left: 'center',
    },
    tooltip: {
        trigger: 'axis'
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
       	data: sz_qishu,
		splitNumber:20//分成几段
    },
    yAxis: {
        type: 'value',
		max:20,//X轴最大值
		splitNumber:10//分成几段
    },
    series: [
        {
            name:'冠亚和',
            type:'bar',
			label: {
				normal: {
					show: true,
					position: 'top'
				}
			},
            data: sz_hao1
        }
    ],
	color:['#336699']
};
myChart.setOption(option);
</script>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include $this->_include('footer'); ?>