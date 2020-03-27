<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_member_pms`;");
E_C("CREATE TABLE `fn_member_pms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sendname` varchar(30) NOT NULL DEFAULT '',
  `sendid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `toname` varchar(30) NOT NULL DEFAULT '',
  `toid` mediumint(8) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `title` varchar(60) NOT NULL DEFAULT '',
  `sendtime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `hasview` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `senddel` mediumint(8) NOT NULL,
  `todel` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `sendtime` (`sendtime`),
  KEY `sendid` (`sendid`),
  KEY `hasview` (`hasview`),
  KEY `isadmin` (`isadmin`),
  KEY `toid` (`toid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>