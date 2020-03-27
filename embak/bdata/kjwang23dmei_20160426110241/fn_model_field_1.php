<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fn_model_field`;");
E_C("CREATE TABLE `fn_model_field` (
  `fieldid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `field` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `length` char(10) NOT NULL,
  `indexkey` varchar(10) NOT NULL,
  `isshow` tinyint(1) NOT NULL,
  `tips` text NOT NULL,
  `not_null` tinyint(1) NOT NULL DEFAULT '0',
  `pattern` varchar(255) NOT NULL,
  `errortips` varchar(255) NOT NULL,
  `formtype` varchar(20) NOT NULL,
  `setting` mediumtext NOT NULL,
  `listorder` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fieldid`),
  KEY `modelid` (`modelid`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8");
E_D("replace into `fn_model_field` values('1','1','content','内容','','0','','1','','0','','','editor','a:3:{s:5:\"width\";s:2:\"80\";s:6:\"height\";s:3:\"500\";s:4:\"type\";s:1:\"1\";}','0','0');");
E_D("replace into `fn_model_field` values('51','10','content','内容','','','','1','','0','','','editor','','0','0');");
E_D("replace into `fn_model_field` values('52','10','opentime','开奖时间','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('53','10','opencode','结果','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('54','10','expect','期数','BIGINT','10','UNIQUE','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('55','11','content','内容','','','','1','','0','','','editor','','0','0');");
E_D("replace into `fn_model_field` values('56','11','opentime','开奖时间','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('57','11','opencode','结果','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('58','11','expect','期数','BIGINT','10','UNIQUE','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('29','5','content','商品描述','','','','1','','0','','','editor','a:3:{s:5:\"width\";s:2:\"90\";s:6:\"height\";s:3:\"300\";s:4:\"type\";s:1:\"1\";}','99','0');");
E_D("replace into `fn_model_field` values('36','5','jiage','商品价格','DECIMAL','10,2','','1','','0','','','input','a:1:{s:4:\"size\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('37','5','shuliang','商品数量','MEDIUMINT','8','','1','','0','','','input','a:1:{s:4:\"size\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('38','5','chushou','已经出售','MEDIUMINT','8','','0','','0','','','input','a:1:{s:4:\"size\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('39','6','xingming','姓名','VARCHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('50','9','opentime','开奖时间','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('49','9','opencode','结果','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('47','9','content','内容','','','','1','','0','','','editor','','0','0');");
E_D("replace into `fn_model_field` values('48','9','expect','期数','BIGINT','10','UNIQUE','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('59','12','content','内容','','','','1','','0','','','editor','','0','0');");
E_D("replace into `fn_model_field` values('60','12','opentime','开奖时间','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('61','12','opencode','结果','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('62','12','expect','期数','BIGINT','10','UNIQUE','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('63','13','content','内容','','','','1','','0','','','editor','','0','0');");
E_D("replace into `fn_model_field` values('64','13','opentime','开奖时间','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('65','13','opencode','结果','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('66','13','expect','期数','BIGINT','10','UNIQUE','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('67','14','content','内容','','','','1','','0','','','editor','','0','0');");
E_D("replace into `fn_model_field` values('68','14','opentime','开奖时间','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('69','14','opencode','结果','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('70','14','expect','期数','BIGINT','10','UNIQUE','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('71','15','content','内容','','','','1','','0','','','editor','','0','0');");
E_D("replace into `fn_model_field` values('72','15','opentime','开奖时间','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('73','15','opencode','结果','CHAR','255','','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");
E_D("replace into `fn_model_field` values('74','15','expect','期数','BIGINT','10','UNIQUE','1','','0','','','input','a:2:{s:4:\"size\";s:3:\"400\";s:7:\"default\";s:0:\"\";}','0','0');");

require("../../inc/footer.php");
?>