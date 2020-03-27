<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_member`;");
E_C("CREATE TABLE `fn_member` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `salt` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `groupid` smallint(5) NOT NULL DEFAULT '1',
  `modelid` smallint(5) NOT NULL,
  `credits` int(10) NOT NULL,
  `regdate` bigint(10) unsigned NOT NULL DEFAULT '0',
  `regip` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `randcode` varchar(32) NOT NULL,
  `lastloginip` varchar(15) NOT NULL,
  `lastlogintime` bigint(10) NOT NULL,
  `loginip` varchar(15) NOT NULL,
  `logintime` bigint(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `groupid` (`groupid`),
  KEY `status` (`status`),
  KEY `modelid` (`modelid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>