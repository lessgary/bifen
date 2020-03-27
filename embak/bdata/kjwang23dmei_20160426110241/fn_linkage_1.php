<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_linkage`;");
E_C("CREATE TABLE `fn_linkage` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `site` tinyint(3) NOT NULL COMMENT '站点id',
  `name` varchar(30) NOT NULL,
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `child` tinyint(1) NOT NULL,
  `arrchilds` varchar(200) NOT NULL,
  `keyid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `list` (`site`,`parentid`,`keyid`,`listorder`),
  KEY `keyid` (`site`,`keyid`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>