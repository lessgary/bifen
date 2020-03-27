<?php include $this->_include('header'); ?>
<div class="g_w1000min open_form">
    <div class="g_w1000 ">
        <div class="sub_right  ">
            <?php include $this->_include('bjkl8_com_nav'); ?>
            <div class="sub_r_open_form sub_r_open_form_10014">
                <div class="sub_mid_l">
                    <h1>北京快乐8 </h1>
                    <h2>本期第<em style="color: #ff0000" id="cterm">000000</em>期</h2>
                    <h3><em id="fre_info">00</em>一期,全天<em id="fre_total">00</em>期</h3>
                    <h3>当前<em id="c_now">00</em>期,剩<em id="c_less">00</em>期</h3>
                   <!-- <div class="shuang_anniu">
						<span><a href="./index.php?c=content&a=list&catid=56" class="g_button btn_orange">开奖视频</a></span>
					</div>-->
                </div>
                <div class="sub_mid_c">
                    <h2>本期开奖结果：<em style="color: #ff0000" id="msgInfo">...数据加载中,如不正常请手动刷新...</em></h2>
                    <div class="result">
                        <ul id="term_ball">
                        </ul>
                    </div>
                </div>
                <div class="sub_mid_r">
                    <h2>下期【第<em style="color: #ff0000" id="nterm">000000</em>期】</h2>
                    <h3><em style="color: #fff" id="ndate">00月00日21时30分</em></h3>
                    <div class="btn_bar">
                        <div style="display: none;" id="player"></div>
                        <span><a href="./index.php?c=content&a=show&id=5" class="g_button btn_white"  target="_blank">彩种玩法</a></span><span><a class="g_button btn_white" href="javascript:setRing();">铃声设置</a></span> </div>
                    <div class="clear"> </div>
                </div>
                <div class="g_clear"></div>
            </div>
            <div class="open_notic_tip g_hide"> <span class="msg">注意：北京快乐8 第<em>000000</em>期 未开奖，您可以手动刷新或等待自动刷新！</span></div>
            <div class="sub_r_bot">
                <div class="sub_bot_one"> <span class="sub_bot_bt">开奖记录</span> </div>
            </div>
			
			
			
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
                <tbody id="reslist" linNos="0,1,2,4,5,6">
                </tbody>
            </table>
            <div class="hisloading"> <img src="<?php echo SITE_THEME; ?>images/loading_flash.gif" /> </div>
            <div class="sub_hr"> </div>
        </div>
        <div class="clear"> </div>
    </div>
</div>
<?php include $this->_include('footer'); ?> 