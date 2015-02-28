/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : superliving

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-03-01 06:51:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `ordinal_number` int(11) DEFAULT NULL,
  `title` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', null, '1', null, 'TILES');
INSERT INTO `category` VALUES ('2', null, '1', null, 'DOORS');
INSERT INTO `category` VALUES ('3', null, '1', null, 'WINDOWS');
INSERT INTO `category` VALUES ('4', null, '1', null, 'RAILING');
INSERT INTO `category` VALUES ('5', null, '1', null, 'BATH');
INSERT INTO `category` VALUES ('6', null, '1', null, 'KITCHEN');
INSERT INTO `category` VALUES ('7', null, '1', null, 'BEDROOM');
INSERT INTO `category` VALUES ('8', null, '1', null, 'LIVING');
INSERT INTO `category` VALUES ('9', null, '1', null, 'DINING');
INSERT INTO `category` VALUES ('10', null, '1', null, 'OUTROOM');
INSERT INTO `category` VALUES ('11', null, '1', null, 'LIGHTING');
INSERT INTO `category` VALUES ('12', null, '1', null, 'DECOR');
INSERT INTO `category` VALUES ('15', null, '1', null, 'Test');
INSERT INTO `category` VALUES ('16', '1', '1', null, 'POLTSHED TILES');
INSERT INTO `category` VALUES ('24', '1', '1', null, 'PORCELAIN GLAZED TILES');
INSERT INTO `category` VALUES ('25', '1', '1', null, 'FULLY POLISHED PORCELAIN GRAZED');
INSERT INTO `category` VALUES ('26', '1', '1', null, 'CERAMIC WALL TILES');
INSERT INTO `category` VALUES ('27', '1', '1', null, 'CRYSTALLTE PORCELAIN TILES');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `model_number` varchar(50) DEFAULT NULL,
  `model_size` varchar(50) DEFAULT NULL,
  `path_image` text,
  `path_thumb` text,
  PRIMARY KEY (`id`),
  KEY `category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '1', '16', 'GW60H3512', 'GW60H3512', 'uploads/product/54f24a15d6d60.jpg', 'uploads/product/54f24a15d6d60_thumb.jpg');
INSERT INTO `product` VALUES ('2', '1', '16', 'GW60H3512', 'GW60H3512', 'uploads/product/54f252e7b15de.jpg', 'uploads/product/54f252e7b15de_thumb.jpg');
INSERT INTO `product` VALUES ('4', '1', '16', 'GW60H3512', 'GW60H3512', 'uploads/product/54f24acc79cd1.jpg', 'uploads/product/54f24acc79cd1_thumb.jpg');

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
