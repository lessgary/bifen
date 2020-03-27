<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_relatedlink`;");
E_C("CREATE TABLE `fn_relatedlink` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `sort` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>