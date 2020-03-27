<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_content_1_verify`;");
E_C("CREATE TABLE `fn_content_1_verify` (
  `id` int(10) NOT NULL,
  `catid` smallint(5) NOT NULL,
  `modelid` smallint(5) NOT NULL,
  `userid` mediumint(8) NOT NULL,
  `username` char(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tablename` char(30) NOT NULL,
  `updatetime` bigint(10) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `content` longtext NOT NULL,
  KEY `id` (`id`),
  KEY `catid` (`catid`),
  KEY `modelid` (`modelid`,`updatetime`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>