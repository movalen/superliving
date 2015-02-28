/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : superliving

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-02-28 19:06:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Witoon', 'mawinhat', 'tahniwam');
