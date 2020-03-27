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

<div class="g_w1000  ">
    <div class="sub_r_bot">
        <div class="sub_bot_one">
            <span class="sub_bot_bt">香港彩搅珠年历</span> <span class="r"></span>
        </div>
    </div>
</div>
<div class="g_w1000">
    <div id="bgcontainer">
        <div class="CON">
            <div class="SUBL">
                <div id="date">
                    <p style="padding-top: 5px;">
                        公历
   <select onchange="changeCld()" id="sy">
   </select>
                        年 
   <select onchange="changeCld()" id="sm">
   </select>
                        月
   <span id="gz"></span>
                    </p>
                </div>
                <div id="calendar">
                    <div id="detail" style="visibility: hidden; left: 690px; top: 243px;">

                        <div id="datedetail">
                        </div>
                        <div id="festival" style="display: none;"></div>
                    </div>
                    <table id="calendarhead">
                        <tbody>
                            <tr>
                                <td>日</td>
                                <td>一</td>
                                <td>二</td>
                                <td>三</td>
                                <td>四</td>
                                <td>五</td>
                                <td>六</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="week">
                        <tbody>
                            <tr class="tr1">
                                <td class="aorange" onmouseout="mOut()" onmouseover="mOvr(0)" id="sd0"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(1)" id="sd1"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(2)" id="sd2"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(3)" id="sd3" style="cursor: move;"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(4)" id="sd4"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(5)" id="sd5"></td>
                                <td class="agreen drawdate" onmouseout="mOut()" onmouseover="mOvr(6)" id="sd6"></td>
                                <td rowspan="12"><div id="panel">
                    <div onclick="pushBtm('YU')">上一年↑</div>
                    <div onclick="pushBtm('YD')">下一年↓</div>
                    <div onclick="pushBtm('MU')">上一月↑</div>
                    <div onclick="pushBtm('MD')">下一月↓</div>
                    <div onclick="pushBtm('')">当前月</div>
                </div></td>
                            </tr>
                            <tr class="tr2">
                                <td onmouseout="mOut()" onmouseover="mOvr(0)" id="ld0"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(1)" id="ld1"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(2)" id="ld2"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(3)" id="ld3"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(4)" id="ld4"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(5)" id="ld5"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(6)" id="ld6"></td>
                            </tr>
                            <tr class="tr1">
                                <td class="aorange" onmouseout="mOut()" onmouseover="mOvr(7)" id="sd7"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(8)" id="sd8"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(9)" id="sd9"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(10)" id="sd10"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(11)" id="sd11"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(12)" id="sd12"></td>
                                <td class="aorange drawdate" onmouseout="mOut()" onmouseover="mOvr(13)" id="sd13"></td>
                            </tr>
                            <tr class="tr2">
                                <td onmouseout="mOut()" onmouseover="mOvr(7)" id="ld7"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(8)" id="ld8"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(9)" id="ld9"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(10)" id="ld10"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(11)" id="ld11"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(12)" id="ld12"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(13)" id="ld13"></td>
                            </tr>
                            <tr class="tr1">
                                <td class="aorange" onmouseout="mOut()" onmouseover="mOvr(14)" id="sd14"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(15)" id="sd15"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(16)" id="sd16"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(17)" id="sd17"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(18)" id="sd18"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(19)" id="sd19"></td>
                                <td class="agreen drawdate" onmouseout="mOut()" onmouseover="mOvr(20)" id="sd20"></td>
                            </tr>
                            <tr class="tr2">
                                <td onmouseout="mOut()" onmouseover="mOvr(14)" id="ld14"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(15)" id="ld15"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(16)" id="ld16"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(17)" id="ld17"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(18)" id="ld18"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(19)" id="ld19"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(20)" id="ld20"></td>
                            </tr>
                            <tr class="tr1">
                                <td class="aorange" onmouseout="mOut()" onmouseover="mOvr(21)" id="sd21"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(22)" id="sd22"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(23)" id="sd23"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(24)" id="sd24"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(25)" id="sd25"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(26)" id="sd26"></td>
                                <td class="aorange drawdate" onmouseout="mOut()" onmouseover="mOvr(27)" id="sd27"></td>
                            </tr>
                            <tr class="tr2">
                                <td onmouseout="mOut()" onmouseover="mOvr(21)" id="ld21"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(22)" id="ld22"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(23)" id="ld23"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(24)" id="ld24"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(25)" id="ld25"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(26)" id="ld26"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(27)" id="ld27"></td>
                            </tr>
                            <tr class="tr1">
                                <td class="aorange" onmouseout="mOut()" onmouseover="mOvr(28)" id="sd28"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(29)" id="sd29"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(30)" id="sd30"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(31)" id="sd31"></td>
                                <td class="one drawdate" onmouseout="mOut()" onmouseover="mOvr(32)" id="sd32"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(33)" id="sd33"></td>
                                <td class="agreen" onmouseout="mOut()" onmouseover="mOvr(34)" id="sd34"></td>
                            </tr>
                            <tr class="tr2">
                                <td onmouseout="mOut()" onmouseover="mOvr(28)" id="ld28"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(29)" id="ld29"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(30)" id="ld30"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(31)" id="ld31"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(32)" id="ld32"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(33)" id="ld33"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(34)" id="ld34"></td>
                            </tr>
                            <tr class="tr1">
                                <td class="aorange" onmouseout="mOut()" onmouseover="mOvr(35)" id="sd35"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(36)" id="sd36"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(37)" id="sd37"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(38)" id="sd38"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(39)" id="sd39"></td>
                                <td class="one" onmouseout="mOut()" onmouseover="mOvr(40)" id="sd40"></td>
                                <td class="aorange" onmouseout="mOut()" onmouseover="mOvr(41)" id="sd41"></td>
                            </tr>
                            <tr class="tr2">
                                <td onmouseout="mOut()" onmouseover="mOvr(35)" id="ld35"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(36)" id="ld36"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(37)" id="ld37"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(38)" id="ld38"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(39)" id="ld39"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(40)" id="ld40"></td>
                                <td onmouseout="mOut()" onmouseover="mOvr(41)" id="ld41"></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                
            </div>
            
        </div>
        <!--end of cotainter-->
        <table class="g_w1000  " style="background-color: #fcfcfc;  border: 0;  padding: 0;  margin-left: 0;border: 1px solid #F8BD31;">
                <tr>
                    <td style="font-size:14pt;height:40px;  padding-left: 10px;">使用说明：</td>
                </tr>
                <tr>
                    <td style="font-size:12pt;height:40px;  padding-left: 25px;">1、六合彩开奖万年历是在传统农历年历基础上，加入六合彩开奖日期</td>
                </tr>
                <tr>
                    <td style="font-size:12pt;height:40px;  padding-left: 25px;">2、已开开奖日期用当期开出的特码球号为标示</td>
                </tr>
                <tr>
                    <td style="font-size:12pt;height:40px;  padding-left: 25px;">3、未开开奖日期用
                            <img src="<?php echo SITE_THEME; ?>images/marksix.gif" alt="6哥" />
                        标示</td>
                </tr>
            </table>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div></div>
<?php include $this->_include('footer'); ?>
<script src="<?php echo SITE_THEME; ?>images/cal.js"></script>
<script src="http://www.cpzhan.com/js/cdata.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
initial();
});
</script>