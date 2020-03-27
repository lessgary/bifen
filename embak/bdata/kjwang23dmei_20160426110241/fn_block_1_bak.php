<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_block`;");
E_C("CREATE TABLE `fn_block` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `site` tinyint(3) NOT NULL COMMENT '站点id',
  `type` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `fn_block` values('1','1','1','下期六合彩时间','2016-11-22 21:30');");

require("../../inc/footer.php");
?>