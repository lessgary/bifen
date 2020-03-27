<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_content_1_extend`;");
E_C("CREATE TABLE `fn_content_1_extend` (
  `id` int(10) NOT NULL,
  `catid` smallint(5) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `verify` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  KEY `id` (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>