CREATE TABLE ck2_link_cate (
  `cate_sn` smallint(5) unsigned NOT NULL  auto_increment,
  `of_cate_sn` smallint(5) unsigned NOT NULL  ,
  `cate_title` varchar(255) NOT NULL  ,
  `cate_sort` smallint(5) unsigned NOT NULL  ,
  PRIMARY KEY  (`cate_sn`)
);


CREATE TABLE ck2_link (
  `link_sn` smallint(5) unsigned NOT NULL  auto_increment,
  `cate_sn` smallint(5) unsigned NOT NULL  ,
  `link_title` varchar(255) NOT NULL  ,
  `link_url` varchar(255) NOT NULL  ,
  `link_desc` text NOT NULL  ,
  `link_sort` smallint(5) unsigned NOT NULL  ,
  `link_counter` smallint(5) unsigned NOT NULL  ,
  `unable_date` date NOT NULL default '0000-00-00' ,
  `uid` smallint(5) unsigned NOT NULL  ,
  `post_date` datetime NOT NULL default '0000-00-00 00:00:00' ,
  `enable` enum('1','0') NOT NULL default '1' ,
  PRIMARY KEY  (`link_sn`)
);


