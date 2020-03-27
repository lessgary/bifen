<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_user`;");
E_C("CREATE TABLE `fn_user` (
  `userid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `site` tinyint(3) DEFAULT NULL COMMENT '站点id',
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` char(10) NOT NULL,
  `roleid` int(3) NOT NULL,
  `lastloginip` varchar(15) DEFAULT NULL,
  `lastlogintime` bigint(10) unsigned DEFAULT '0',
  `loginip` varchar(15) DEFAULT NULL,
  `logintime` bigint(10) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `realname` varchar(50) DEFAULT '',
  `usermenu` text,
  PRIMARY KEY (`userid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `fn_user` values('1','0','admin','910b901a966b8ba4540f7b6fb3f1a34e','431f3e71d0','1','180.156.245.7','1460536771','61.14.162.87','1460869763','','网站创始人','a:0:{}');");
E_D("replace into `fn_user` values('2','1','lwfb556','c1c1622a06b9460f1d278d0387d5e199','b6a536ed9d','3','114.64.231.103','1461478779','60.28.233.35','1461557865','','软文发布','a:0:{}');");
E_D("replace into `fn_user` values('3','0','achd556','ddb2dedf37cffeb7e1a230d8b545e11c','3f5cd96fa3','4','210.4.127.58','1459910718','61.14.162.87','1460641110','','小强','a:0:{}');");

require("../../inc/footer.php");
?>