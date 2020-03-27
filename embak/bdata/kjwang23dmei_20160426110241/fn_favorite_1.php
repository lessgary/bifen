<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_favorite`;");
E_C("CREATE TABLE `fn_favorite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site` tinyint(3) NOT NULL COMMENT '站点id',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `contentid` int(10) NOT NULL,
  `title` char(100) NOT NULL,
  `url` char(100) NOT NULL,
  `adddate` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `contentid` (`contentid`),
  KEY `userid` (`userid`),
  KEY `site` (`site`),
  KEY `adddate` (`adddate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>