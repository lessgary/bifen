<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_role`;");
E_C("CREATE TABLE `fn_role` (
  `roleid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `fn_role` values('1','超级管理员','超级管理员');");
E_D("replace into `fn_role` values('2','总编','总编');");
E_D("replace into `fn_role` values('3','编辑','编辑');");
E_D("replace into `fn_role` values('4','开奖','');");

require("../../inc/footer.php");
?>