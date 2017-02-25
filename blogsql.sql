/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.5.28 : Database - blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `blog`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '管理员名称',
  `password` varchar(32) NOT NULL COMMENT '管理员密码',
  `combjurld` int(10) NOT NULL DEFAULT '1' COMMENT '发表文章权限,0:可编辑，1：不可编辑',
  `updajurld` int(10) NOT NULL DEFAULT '1' COMMENT '修改文章权限0:可修改，1：不可修改',
  `delartijurld` int(10) NOT NULL DEFAULT '1' COMMENT '删除文章权限',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

/*Data for the table `admin` */

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `typeid` mediumint(9) NOT NULL COMMENT '分类',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `desc` varchar(255) NOT NULL COMMENT '文章简介',
  `keywords` varchar(255) NOT NULL COMMENT '文章关键词',
  `content` text NOT NULL COMMENT '文章内容',
  `pic` varchar(100) NOT NULL COMMENT '缩略图',
  `click` int(10) NOT NULL DEFAULT '0' COMMENT '点击数',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `review` int(10) NOT NULL DEFAULT '0' COMMENT '评论数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='文章列表';

/*Data for the table `article` */

/*Table structure for table `click` */

DROP TABLE IF EXISTS `click`;

CREATE TABLE `click` (
  `Id` int(10) NOT NULL AUTO_INCREMENT COMMENT '点击表Id',
  `aryicleid` int(10) NOT NULL COMMENT '点击文章Id',
  `userid` int(10) NOT NULL COMMENT '点击人id',
  `time` varchar(32) NOT NULL COMMENT '点击时间戳',
  PRIMARY KEY (`Id`),
  KEY `userid` (`userid`),
  CONSTRAINT `click_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `article` (`id`),
  CONSTRAINT `click_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='点击表';

/*Data for the table `click` */

/*Table structure for table `leaver` */

DROP TABLE IF EXISTS `leaver`;

CREATE TABLE `leaver` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '留言表id',
  `userid` int(10) NOT NULL COMMENT '留言会员id',
  `centent` varchar(255) NOT NULL COMMENT '留言内容',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `leaver_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言表';

/*Data for the table `leaver` */

/*Table structure for table `links` */

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `title` varchar(30) NOT NULL COMMENT '链接标题',
  `url` varchar(60) NOT NULL COMMENT '链接地址',
  `desc` varchar(255) NOT NULL COMMENT '链接说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `links` */

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `Id` int(10) NOT NULL AUTO_INCREMENT COMMENT '评论表id',
  `articleid` int(10) NOT NULL COMMENT '文章id',
  `userid` int(10) NOT NULL COMMENT '评论人id',
  `level` int(10) NOT NULL DEFAULT '0' COMMENT '评论等级',
  `reviewid` int(10) NOT NULL DEFAULT '0' COMMENT '父级评论',
  `centent` varchar(255) NOT NULL COMMENT '评论内容',
  PRIMARY KEY (`Id`),
  KEY `articleid` (`articleid`),
  KEY `userid` (`userid`),
  KEY `reviewid` (`reviewid`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`articleid`) REFERENCES `article` (`id`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`Id`),
  CONSTRAINT `review_ibfk_3` FOREIGN KEY (`reviewid`) REFERENCES `review` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

/*Data for the table `review` */

/*Table structure for table `type` */

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `typetitle` varchar(20) NOT NULL COMMENT '分类名称',
  `level` int(10) NOT NULL COMMENT '等级',
  `typeid` int(10) NOT NULL COMMENT '父级id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类';

/*Data for the table `type` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `reviewjurld` varchar(10) NOT NULL DEFAULT '0' COMMENT '评论权限 0:可评论,1:不可评论',
  `leaverjurld` int(10) NOT NULL DEFAULT '0' COMMENT '留言权限0:可留言，1:不可留言',
  `Email` varchar(32) NOT NULL COMMENT '会员邮箱',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
