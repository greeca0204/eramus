#
# 数据库备份
# Time: 2015-03-31 02:37
# Type: 1.0
# author: 罗家辉
# --------------------------------------------------------


DROP TABLE IF EXISTS tbl_admin;
CREATE TABLE tbl_admin (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  checked int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS tbl_announcement;
CREATE TABLE tbl_announcement (
  aid int(11) NOT NULL AUTO_INCREMENT,
  tilte varchar(50) COLLATE utf8_bin DEFAULT NULL,
  acontent text COLLATE utf8_bin,
  PRIMARY KEY (aid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO tbl_admin VALUES('1','admin','21232f297a57a5a743894a0e4a801fc3','1');
INSERT INTO tbl_admin VALUES('3','Ryan','a85470a726e7851107cc0e3e078295c1','1');
INSERT INTO tbl_admin VALUES('4','greeca','a85470a726e7851107cc0e3e078295c1','1');


