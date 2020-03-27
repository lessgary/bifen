<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_link`;");
E_C("CREATE TABLE `fn_link` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `introduce` text NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `typeid` (`typeid`,`listorder`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `fn_link` values('1','0','乐盈彩票网','http://www.le358.com/reg.php','','乐盈彩票网','0','1460869824');");
//E_D("replace into `fn_link` values('2','0','嘉美彩票','http://www.jmyl111.com/reg.php','','嘉美彩票','0','1460869912');");
E_D("replace into `fn_link` values('3','0','阿里彩票','http://www.alcp111.com//SIGN?code=4739','','阿里彩票','0','1460869988');");

require("../../inc/footer.php");
?>