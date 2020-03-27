<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_content_1_hk6`;");
E_C("CREATE TABLE `fn_content_1_hk6` (
  `id` int(10) NOT NULL,
  `catid` smallint(5) NOT NULL,
  `content` mediumtext NOT NULL,
  `opentime` char(255) DEFAULT NULL,
  `opencode` char(255) DEFAULT NULL,
  `expect` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `expect` (`expect`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fn_content_1_hk6` values('128','4','','2016-02-11 21:34:57','4,35,3,30,47,17,10','2016017');");
E_D("replace into `fn_content_1_hk6` values('129','4','','2016-02-13 21:35:08','43,8,36,14,29,24,31','2016018');");
E_D("replace into `fn_content_1_hk6` values('130','4','','2016-02-16 21:35:55','42,43,22,34,21,18,24','2016019');");
E_D("replace into `fn_content_1_hk6` values('131','4','','2016-02-18 21:35:58','20,41,38,13,45,39,46','2016020');");
E_D("replace into `fn_content_1_hk6` values('132','4','','2016-02-20 21:34:42','47,49,39,20,44,12,45','2016021');");
E_D("replace into `fn_content_1_hk6` values('133','4','','2016-02-23 21:35:18','15,27,45,44,9,24,47','2016022');");
E_D("replace into `fn_content_1_hk6` values('134','4','','2016-02-25 21:35:00','3,47,22,45,24,6,07','2016023');");
E_D("replace into `fn_content_1_hk6` values('135','4','','2016-02-27 21:42:22','27,6,11,20,44,9,42','2016024');");
E_D("replace into `fn_content_1_hk6` values('136','4','','2016-03-01 21:39:23','30,21,11,16,19,33,31','2016025');");
E_D("replace into `fn_content_1_hk6` values('137','4','','2016-03-03 21:36:52','16,5,45,7,2,1,33','2016026');");
E_D("replace into `fn_content_1_hk6` values('138','4','','2016-03-05 21:35:29','29,48,49,17,26,32,40','2016027');");
E_D("replace into `fn_content_1_hk6` values('139','4','','2016-03-08 21:34:45','16,34,4,30,3,39,14','2016028');");
E_D("replace into `fn_content_1_hk6` values('140','4','','2016-03-10 21:34:59','9,48,30,33,24,14,43','2016029');");
E_D("replace into `fn_content_1_hk6` values('141','4','','2016-03-12 21:39:20','41,23,49,36,33,3,02','2016030');");
E_D("replace into `fn_content_1_hk6` values('142','4','','2016-03-15 21:35:20','1,6,41,19,28,26,39','2016031');");
E_D("replace into `fn_content_1_hk6` values('143','4','','2016-03-17 21:34:52','8,16,15,3,17,38,35','2016032');");
E_D("replace into `fn_content_1_hk6` values('144','4','','2016-03-19 21:35:55','25,23,39,35,42,43,14','2016033');");
E_D("replace into `fn_content_1_hk6` values('145','4','','2016-03-22 21:35:27','5,18,49,24,10,27,39','2016034');");
E_D("replace into `fn_content_1_hk6` values('146','4','','2016-03-24 21:35:09','21,35,18,25,16,46,13','2016035');");
E_D("replace into `fn_content_1_hk6` values('147','4','','2016-03-26 21:37:10','38,47,24,44,17,46,27','2016036');");
E_D("replace into `fn_content_1_hk6` values('430','4','','2016-03-29 21:35:09','22,9,31,13,12,30,28','2016037');");
E_D("replace into `fn_content_1_hk6` values('3178','4','','2016-04-02 21:35:25','34,06,29,45,36,04,47','2016038');");
E_D("replace into `fn_content_1_hk6` values('5092','4','','2016-04-05 21:34:58','10,43,21,35,30,04,07','2016039');");
E_D("replace into `fn_content_1_hk6` values('6599','4','','2016-04-07 21:37:50','8,45,34,21,25,32,31','2016040');");
E_D("replace into `fn_content_1_hk6` values('8106','4','','2016-04-09 21:34:58','43,06,03,38,44,13,31','2016041');");
E_D("replace into `fn_content_1_hk6` values('10380','4','','2016-04-12 21:34:45','33,48,21,46,28,25,10','2016042');");
E_D("replace into `fn_content_1_hk6` values('11888','4','','2016-04-14 21:34:55','46,27,25,21,44,14,03','2016043');");
E_D("replace into `fn_content_1_hk6` values('14146','4','','2016-04-17 21:36:01','28,35,45,46,24,16,38','2016044');");
E_D("replace into `fn_content_1_hk6` values('15676','4','','2016-04-19 21:42:01','48,05,30,45,34,08,03','2016045');");
E_D("replace into `fn_content_1_hk6` values('17192','4','','2016-04-21 21:42:28','3,15,05,39,41,14,21','2016046');");
E_D("replace into `fn_content_1_hk6` values('18649','4','','2016-04-23 21:34:54','46,02,16,35,10,47,49','2016047');");

require("../../inc/footer.php");
?>