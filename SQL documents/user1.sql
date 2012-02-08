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
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(10) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL,
  `chineseName` varchar(20) CHARACTER SET gb2312 DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `userRight` varchar(20) DEFAULT NULL,
  `secretKey` varchar(32) DEFAULT NULL,
  `emailAddr` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- 导出表中的数据 `user`
-- 

INSERT INTO `user` (`id`, `userName`, `password`, `chineseName`, `company`, `phoneNumber`, `userRight`, `secretKey`, `emailAddr`) VALUES 
(1, 'rinoa', 'd41d8cd98f00b204e9800998ecf8427e', 'chine', 'checkit', '1865000000', 'low', 'd41d8cd98f00b204e9800998ecf8427e', 'rinoa@hotmail'),
(2, 'seifer', '493603d84f0098e827896d5c08c81480', 'seifertest', 'seifer', '444444444', 'low', '493603d84f0098e827896d5c08c81480', 'seifer@hotmail.com'),
(3, 'squall', 'f9ba7d6af07eecbbccd33510304aba1b', 'chine', 'VPT-TECH', '1555555555', 'super', 'secretKey1', 'squall@gmail'),
(4, 'xiaowei', '12345666666666', 'xiaowei', 'tpv', '1234578', '123', 'ww', 'xiaowei@163.com'),
(5, 'may', 'whatooggg', 'tete', '烟草', '1234568098', 'hhww', 'whtao', 'tete@126.com'),
(6, 'lili', 'lilidouble', 'lili', 'IBM', '3453455', 'rrtyhjssj', 'fggghh', 'lili@qq.com'),
(7, 'mike', 'mikenihao', '迈克', '微软', '13599746307', 'niwehtgfbbb', 'fbguhgbbmnm', 'mike@hotmail'),
(8, 'jerry', 'jerrymima', '珍妮', '移动', '1234567', 'fgthghh', 'fhghnhhnhnn', 'jerry@qq.com'),
(9, 'kate', 'kategnn', 'ngngjgnnb', '电信', 'wefbbnn', 'gghjhjhjhn', 'ghhjjjjjkk', 'kate@yahoo.cn');
