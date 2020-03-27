<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_member_group`;");
E_C("CREATE TABLE `fn_member_group` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `credits` mediumint(8) NOT NULL,
  `allowpost` mediumint(8) NOT NULL,
  `allowpms` mediumint(8) NOT NULL,
  `allowattachment` tinyint(1) NOT NULL,
  `postverify` tinyint(1) NOT NULL,
  `auto` tinyint(1) NOT NULL DEFAULT '0',
  `filesize` smallint(5) NOT NULL,
  `listorder` tinyint(3) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `fn_member_group` values('1','新手上路','0','3','1','0','1','0','5','0','0');");
E_D("replace into `fn_member_group` values('2','普通会员','20','1','0','0','1','0','10','0','0');");
E_D("replace into `fn_member_group` values('3','中级会员','50','10','0','0','0','0','20','0','0');");
E_D("replace into `fn_member_group` values('4','高级会员','100','12','0','1','0','0','50','0','0');");
E_D("replace into `fn_member_group` values('5','金牌会员','200','100','10','1','0','0','0','0','0');");

require("../../inc/footer.php");
?>