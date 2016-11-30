CREATE TABLE tad_cbox (
  `sn` mediumint(9) NOT NULL  auto_increment,
  `publisher` varchar(255) NOT NULL default '' ,
  `msg` text NOT NULL ,
  `post_date` datetime NOT NULL default '0000-00-00 00:00:00' ,
  `ip` varchar(15) NOT NULL default '' ,
  `only_root` enum('0','1') NOT NULL default '0' ,
  `root_msg` text NOT NULL ,
  PRIMARY KEY  (`sn`)
);


