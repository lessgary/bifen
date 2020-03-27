jQuery(document).ready(function($) {
	var ChangeTimes = {
		bjpk10: '300',
		xxx: '3600',
	}
	var LastTimes = {
		bjpk10: '1457684272',
		xxx: '3600',
	}
	var NowD = new Date();
	var NowTime = parseInt(NowD.getTime() / 1000);
	if (NowTime > (parseInt(LastTimes['bjpk10']) + parseInt(ChangeTimes['bjpk10']))) {
		console.log("test");
		$.get('index.php?c=api&a=updateinfo&cp=' + 'bjpk10' + '&uptime=' + NowTime + '&chtime=' + ChangeTimes['bjpk10'] + '&catid=1&modelid=8', function(data) {
			var new_html = '<tr><td>期数</td><td width="50%">号码</td><td>时间</td></tr>';
			window.obj = eval("(" + data + ")");
			for (i in obj.data) {
				new_html = new_html + '<tr><td>' + obj.data[i]['expect'] + '</td><td>' + obj.data[i]['opencode'] + '</td><td>' + obj.data[i]['opentime'] + '</td></tr>'
			}
			$('#test').html(new_html)
		})
	}
});