CREATE TABLE `tad_menu` (
  `menuid` smallint(5) unsigned NOT NULL auto_increment,
  `of_level` smallint(5) unsigned NOT NULL,
  `position` smallint(5) unsigned NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemurl` varchar(255) NOT NULL,
  `membersonly` enum('0','1') NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY  (`menuid`),
  KEY `of_level` (`of_level`),
  KEY `idxmymenustatus` (`status`)
)  ;

