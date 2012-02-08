/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 60000
Source Host           : localhost:3306
Source Database       : app

Target Server Type    : MYSQL
Target Server Version : 60000
File Encoding         : 65001

Date: 2012-02-08 16:14:29
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `sitemessage`
-- ----------------------------
DROP TABLE IF EXISTS `sitemessage`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sitemessage
-- ----------------------------
INSERT INTO `sitemessage` VALUES ('1', '3', '1', 'test', 'this is a test', '2012-03-06', '0', '0');
INSERT INTO `sitemessage` VALUES ('2', '1', '3', 'test2', 'this is a test', '2012-02-01', '1', '0');
INSERT INTO `sitemessage` VALUES ('5', '2', '3', 'seifer to squall new', 'seifer to squall new', '2012-02-08', '0', '0');
INSERT INTO `sitemessage` VALUES ('9', '3', '1', 'sysmes from squall', 'sysmes from squall', '2012-02-08', '1', '0');
INSERT INTO `sitemessage` VALUES ('10', '3', '2', 'sysmes from squall', 'sysmes from squall', '2012-02-08', '1', '0');
