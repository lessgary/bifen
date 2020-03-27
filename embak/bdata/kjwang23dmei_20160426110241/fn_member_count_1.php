<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_member_count`;");
E_C("CREATE TABLE `fn_member_count` (
  `id` mediumint(8) NOT NULL,
  `post` mediumint(5) NOT NULL,
  `pms` mediumint(5) NOT NULL,
  `updatetime` bigint(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>