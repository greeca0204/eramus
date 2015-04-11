-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 04 月 07 日 08:54
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `eramus`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `checked` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `checked`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'Ryan', 'a85470a726e7851107cc0e3e078295c1', 1),
(4, 'greeca', 'a85470a726e7851107cc0e3e078295c1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_announcement`
--

CREATE TABLE IF NOT EXISTS `tbl_announcement` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `acontent` text COLLATE utf8_bin,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_case`
--

CREATE TABLE IF NOT EXISTS `tbl_case` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `ccontent` text COLLATE utf8_bin NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_msg`
--

CREATE TABLE IF NOT EXISTS `tbl_msg` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `qq` varchar(15) COLLATE utf8_bin NOT NULL,
  `tel` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tb_advertise`
--

CREATE TABLE IF NOT EXISTS `tb_advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `imgurl` varchar(255) COLLATE utf8_bin NOT NULL,
  `contenturl` varchar(255) COLLATE utf8_bin NOT NULL,
  `checked` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tb_classes`
--

CREATE TABLE IF NOT EXISTS `tb_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(50) COLLATE utf8_bin NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `tb_classes`
--

INSERT INTO `tb_classes` (`id`, `classname`, `cid`) VALUES
(1, '新闻动态', 0),
(2, '公司新闻', 1),
(3, '技术动态', 1),
(4, '行业新闻', 1),
(5, '解决方案', 0),
(6, '成功案例', 0),
(7, '系统集成领域', 6),
(8, '设计咨询领域', 6),
(9, '交通实验室领域', 6),
(10, '关于我们', 0),
(11, '公司简介', 10),
(12, '组织结构', 10),
(13, '公司材料', 10),
(14, '资质证书', 10),
(15, '公司奖项', 10),
(16, '知识产权', 10),
(17, '诚聘英才', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tb_friends`
--

CREATE TABLE IF NOT EXISTS `tb_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `friends` varchar(50) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `logo` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tb_link`
--

CREATE TABLE IF NOT EXISTS `tb_link` (
  `id` int(11) NOT NULL,
  `website` varchar(100) COLLATE utf8_bin NOT NULL,
  `comname` varchar(50) COLLATE utf8_bin NOT NULL,
  `keyword` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `negotiator` varchar(50) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `postcode` varchar(10) COLLATE utf8_bin NOT NULL,
  `tel` varchar(20) COLLATE utf8_bin NOT NULL,
  `tel2` varchar(20) COLLATE utf8_bin NOT NULL,
  `tel3` varchar(20) COLLATE utf8_bin NOT NULL,
  `tel4` varchar(20) COLLATE utf8_bin NOT NULL,
  `fax` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `copyright` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `tb_link`
--

INSERT INTO `tb_link` (`id`, `website`, `comname`, `keyword`, `description`, `negotiator`, `address`, `postcode`, `tel`, `tel2`, `tel3`, `tel4`, `fax`, `email`, `copyright`) VALUES
(1, '意拉慕斯', '广州意拉慕斯文化活动策划有限公司', '意拉慕斯', '意拉慕斯', '意拉慕斯', '1', '2', '3', '4', '5', '6', '7', '8', '版权所有 © 广州意拉慕斯文化活动策划有限公司 网站备案号：粤ICP备09069083号');

-- --------------------------------------------------------

--
-- 表的结构 `tb_news`
--

CREATE TABLE IF NOT EXISTS `tb_news` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `author` varchar(50) COLLATE utf8_bin NOT NULL,
  `addtime` varchar(50) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
