<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_plugin`;");
E_C("CREATE TABLE `fn_plugin` (
  `pluginid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(1) NOT NULL,
  `markid` smallint(5) NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `controller` varchar(30) NOT NULL DEFAULT '',
  `dir` varchar(30) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT '',
  `version` varchar(20) NOT NULL DEFAULT '',
  `disable` tinyint(1) NOT NULL DEFAULT '0',
  `setting` text NOT NULL,
  PRIMARY KEY (`pluginid`),
  KEY `dir` (`dir`),
  KEY `markid` (`markid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `fn_plugin` values('1','1','6','友情链接','友情链接使用说明参考论坛','','link','dayrui','1.0','0','a:0:{}');");

require("../../inc/footer.php");
?>