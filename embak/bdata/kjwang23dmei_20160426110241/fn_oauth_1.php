<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_oauth`;");
E_C("CREATE TABLE `fn_oauth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `oauth_openid` varchar(80) NOT NULL DEFAULT '',
  `oauth_name` varchar(30) NOT NULL DEFAULT '',
  `oauth_data` text NOT NULL,
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `logintimes` bigint(10) unsigned NOT NULL DEFAULT '0',
  `logintime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `addtime` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `site` (`oauth_openid`,`oauth_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>