<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_tag`;");
E_C("CREATE TABLE `fn_tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `letter` varchar(200) NOT NULL,
  `listorder` tinyint(3) NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `letter` (`letter`,`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8");
E_D("replace into `fn_tag` values('1','北京','beijing','0','52');");
E_D("replace into `fn_tag` values('2','重庆时时彩','zhongqingshishicai','0','52');");
E_D("replace into `fn_tag` values('3','香港','xianggang','0','52');");
E_D("replace into `fn_tag` values('4','广东','guangdong','0','52');");
E_D("replace into `fn_tag` values('5','快乐十分','kuaileshifen','0','52');");
E_D("replace into `fn_tag` values('6','江苏','jiangsu','0','52');");
E_D("replace into `fn_tag` values('7','幸运农场','xingyunnongchang','0','52');");
E_D("replace into `fn_tag` values('8','中奖号码','zhongjianghaoma','0','60');");
E_D("replace into `fn_tag` values('9','公益金','gongyijin','0','60');");
E_D("replace into `fn_tag` values('10','重庆','zhongqing','0','60');");
E_D("replace into `fn_tag` values('11','福彩','fucai','0','60');");
E_D("replace into `fn_tag` values('12','彩票','caipiao','0','64');");
E_D("replace into `fn_tag` values('13','中心','zhongxin','0','64');");
E_D("replace into `fn_tag` values('14','河南省','henansheng','0','60');");
E_D("replace into `fn_tag` values('15','体育彩票','tiyucaipiao','0','60');");
E_D("replace into `fn_tag` values('16','管理中心','guanlizhongxin','0','60');");
E_D("replace into `fn_tag` values('17','赛车','saiche','0','52');");
E_D("replace into `fn_tag` values('18','福利院','fuliyuan','0','60');");
E_D("replace into `fn_tag` values('19','儿童','ertong','0','60');");
E_D("replace into `fn_tag` values('20','阿里','ali','0','64');");
E_D("replace into `fn_tag` values('21','开奖结果','kaijiangjieguo','0','52');");
E_D("replace into `fn_tag` values('22','如何','ruhe','0','52');");
E_D("replace into `fn_tag` values('23','彩票','caipiao','0','60');");
E_D("replace into `fn_tag` values('24','美国','meiguo','0','60');");
E_D("replace into `fn_tag` values('25','基金会','jijinhui','0','60');");
E_D("replace into `fn_tag` values('26','技巧','jiqiao','0','52');");
E_D("replace into `fn_tag` values('27','知识','zhishi','0','52');");
E_D("replace into `fn_tag` values('28','贫困人家','pinkunrenjia','0','60');");
E_D("replace into `fn_tag` values('29','体彩','ticai','0','60');");
E_D("replace into `fn_tag` values('30','河南','henan','0','60');");
E_D("replace into `fn_tag` values('31','中心','zhongxin','0','60');");
E_D("replace into `fn_tag` values('32','重庆','zhongqing','0','52');");
E_D("replace into `fn_tag` values('33','阿里','ali','0','60');");
E_D("replace into `fn_tag` values('34','白血病','baixuebing','0','60');");
E_D("replace into `fn_tag` values('35','销售员','xiaoshouyuan','0','60');");
E_D("replace into `fn_tag` values('36','最好','zuihao','0','60');");
E_D("replace into `fn_tag` values('37','北京','beijing','0','60');");
E_D("replace into `fn_tag` values('38','赛车','saiche','0','60');");
E_D("replace into `fn_tag` values('39','命中率','mingzhonglv','0','52');");
E_D("replace into `fn_tag` values('40','彩票','caipiao','0','52');");
E_D("replace into `fn_tag` values('41','人人','renren','0','60');");
E_D("replace into `fn_tag` values('42','广东','guangdong','0','60');");
E_D("replace into `fn_tag` values('43','快乐十分','kuaileshifen','0','60');");
E_D("replace into `fn_tag` values('44','英雄','yingxiong','0','52');");
E_D("replace into `fn_tag` values('45','农场','nongchang','0','52');");

require("../../inc/footer.php");
?>