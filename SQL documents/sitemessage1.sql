-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2012 年 02 月 08 日 11:17
-- 服务器版本: 5.5.20
-- PHP 版本: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `app`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `sitemessage`
-- 

CREATE TABLE `sitemessage` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `messageFrom` bigint(20) NOT NULL,
  `messageTo` bigint(20) NOT NULL,
  `messageTitle` varchar(30) NOT NULL,
  `messageContent` varchar(200) CHARACTER SET gb2312 NOT NULL,
  `messageTime` date NOT NULL,
  `isFromSys` char(1) NOT NULL DEFAULT '0',
  `isRead` char(1) CHARACTER SET gb2312 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- 导出表中的数据 `sitemessage`
-- 

INSERT INTO `sitemessage` (`id`, `messageFrom`, `messageTo`, `messageTitle`, `messageContent`, `messageTime`, `isFromSys`, `isRead`) VALUES 
(1, 3, 1, 'test', 'this is a test', '2012-03-06', '0', '0'),
(2, 1, 3, 'test2', 'this is a test', '2012-02-01', '1', '0'),
(5, 2, 3, 'seifer to squall new', 'seifer to squall new', '2012-02-08', '0', '0'),
(9, 3, 1, 'sysmes from squall', 'sysmes from squall', '2012-02-08', '1', '0'),
(10, 3, 2, 'sysmes from squall', 'sysmes from squall', '2012-02-08', '1', '0'),
(12, 6, 7, 'hello', 'this is a test', '2012-03-16', '1', '0'),
(13, 8, 9, 'HI', 'this is a test', '2012-12-01', '1', '1'),
(14, 9, 1, 'nihaoma', 'wegggh', '2012-04-08', '0', '1'),
(15, 4, 5, 'wohenhao', 'eeee', '2012-06-08', '1', '1'),
(17, 4, 3, 'sysmes from meimie', 'hahha', '2012-08-08', '1', '1');
