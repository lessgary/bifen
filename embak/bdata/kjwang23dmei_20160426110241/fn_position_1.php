<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_position`;");
E_C("CREATE TABLE `fn_position` (
  `posid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `site` tinyint(3) NOT NULL COMMENT '站点id',
  `catid` smallint(5) unsigned DEFAULT '0',
  `name` char(30) NOT NULL DEFAULT '',
  `maxnum` smallint(5) NOT NULL DEFAULT '20',
  PRIMARY KEY (`posid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>