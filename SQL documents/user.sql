/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 60000
Source Host           : localhost:3306
Source Database       : app

Target Server Type    : MYSQL
Target Server Version : 60000
File Encoding         : 65001

Date: 2012-02-08 16:14:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'rinoa', 'd41d8cd98f00b204e9800998ecf8427e', 'chine', 'checkit', '1865000000', 'low', 'd41d8cd98f00b204e9800998ecf8427e', 'rinoa@hotmail');
INSERT INTO `user` VALUES ('2', 'seifer', '493603d84f0098e827896d5c08c81480', 'seifertest', 'seifer', '444444444', 'low', '493603d84f0098e827896d5c08c81480', 'seifer@hotmail.com');
INSERT INTO `user` VALUES ('3', 'squall', 'f9ba7d6af07eecbbccd33510304aba1b', 'chine', 'VPT-TECH', '1555555555', 'super', 'secretKey1', 'squall@gmail');
