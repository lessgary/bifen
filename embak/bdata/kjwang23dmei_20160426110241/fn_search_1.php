<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_search`;");
E_C("CREATE TABLE `fn_search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modelid` smallint(5) NOT NULL,
  `catid` smallint(5) NOT NULL,
  `params` varchar(32) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `addtime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `sql` text NOT NULL,
  `total` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `params` (`params`,`addtime`),
  KEY `modelid` (`modelid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>