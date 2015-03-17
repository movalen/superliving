/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : superliving

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-03-17 09:20:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for catalog
-- ----------------------------
DROP TABLE IF EXISTS `catalog`;
CREATE TABLE `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `path_cover` text,
  `path_file` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of catalog
-- ----------------------------
INSERT INTO `catalog` VALUES ('2', '1', 'PORCELAIN GLAZED TILES', 'uploads/catalog/cover/54f40e217334f.jpg', null);
INSERT INTO `catalog` VALUES ('3', '1', 'POLISHED TILES', 'uploads/catalog/cover/54f40d7413fb2.jpg', 'uploads/catalog/file/54f40d61e5a8d.pdf');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `sub_cat_status` varchar(1) DEFAULT NULL,
  `title` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

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
INSERT INTO `category` VALUES ('16', '1', '1', null, 'POLTSHED TILES');
INSERT INTO `category` VALUES ('24', '1', '0', null, 'PORCELAIN GLAZED TILES');
INSERT INTO `category` VALUES ('25', '1', '0', null, 'FULLY POLISHED PORCELAIN GRAZED');
INSERT INTO `category` VALUES ('26', '1', '0', null, 'CERAMIC WALL TILES');
INSERT INTO `category` VALUES ('27', '1', '1', null, 'CRYSTALLTE PORCELAIN TILES');
INSERT INTO `category` VALUES ('30', '2', '1', null, 'DOOR A01');
INSERT INTO `category` VALUES ('31', '2', '1', '0', 'DOOR 002');
INSERT INTO `category` VALUES ('37', '0', '1', '1', 'Testing');
INSERT INTO `category` VALUES ('40', '37', '1', '1', 'Testing222');
INSERT INTO `category` VALUES ('41', '40', '1', '1', 'Testing');
INSERT INTO `category` VALUES ('42', '3', '1', '1', 'Windows 1');
INSERT INTO `category` VALUES ('43', '3', '1', '1', 'Wdinws 2');
INSERT INTO `category` VALUES ('44', '42', '1', '1', 'Windows 1.1');
INSERT INTO `category` VALUES ('45', '42', '1', '1', 'Windows 1.2');
INSERT INTO `category` VALUES ('46', '43', '1', '0', 'Windows 2.1');
INSERT INTO `category` VALUES ('47', '43', '1', '1', 'Windows 2.2');
INSERT INTO `category` VALUES ('48', '43', '1', '1', 'Windows 2.3');
INSERT INTO `category` VALUES ('49', '3', '1', '0', 'Windows 3');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `detail` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('3', 'contact_us', '<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<p>Mainland International Group</p>\r\n<p>Office : C, 22/F, Development Tower, Huayuan East Road, Foshan City, Guangdong Province, China <br />Showroom : Huaxia Ceramic City, Nangzhuang Town, Foshan, G.D.Province, China <br />Tel : +86-757-83207360, +86-757-83207390 <br />Email : Mainland@Mainland.com.cn</p>\r\n</div>\r\n</div>');
INSERT INTO `contact` VALUES ('4', 'about_us', '<p>ABOUT US DESIGN DETAIL DETAIL DETAIL.</p>');
INSERT INTO `contact` VALUES ('5', 'logo', null);
INSERT INTO `contact` VALUES ('6', 'link_interior', 'INTERIOR DESIGN DETAIL DETAIL DETAIL.');
INSERT INTO `contact` VALUES ('7', 'link_architecture', 'ARCHITECTURE SERVICES DETAIL DETAIL DETAIL.');
INSERT INTO `contact` VALUES ('8', 'link_construction', 'CONSTRUCTION SERVICES DETAIL DETAIL DETAIL.');
INSERT INTO `contact` VALUES ('9', 'link_budget', 'BUDGET CONTROL DETAIL DETAIL DETAIL.');
INSERT INTO `contact` VALUES ('10', 'link_supply', 'ONE-STOP PRODUCT SUPPLY DETAIL DETAIL DETAIL.');

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `detail` text,
  `path_cover` text,
  `path_thumb` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES ('1', '1', 'Bird Document Document Document Document Document Document Document Document Doc', null, 'uploads/gallery/54fc678eb95f6.jpg', 'uploads/gallery/54fc678eb95f6_thumb.jpg');
INSERT INTO `gallery` VALUES ('2', '1', 'Bird Documents', null, 'uploads/gallery/54fc692006247.jpg', 'uploads/gallery/54fc692006247_thumb.jpg');

-- ----------------------------
-- Table structure for gallery_dtl
-- ----------------------------
DROP TABLE IF EXISTS `gallery_dtl`;
CREATE TABLE `gallery_dtl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `path_thumb` text,
  `path_image` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gallery_dtl
-- ----------------------------
INSERT INTO `gallery_dtl` VALUES ('14', '1', '1', 'uploads/gallery/54fc684d30a8a_thumb.jpg', 'uploads/gallery/54fc684d30a8a.jpg');
INSERT INTO `gallery_dtl` VALUES ('15', '1', '1', 'uploads/gallery/54fc6854c78dc_thumb.jpg', 'uploads/gallery/54fc6854c78dc.jpg');
INSERT INTO `gallery_dtl` VALUES ('16', '1', '2', 'uploads/gallery/54fc69276bd7a_thumb.jpg', 'uploads/gallery/54fc69276bd7a.jpg');
INSERT INTO `gallery_dtl` VALUES ('17', '1', '2', 'uploads/gallery/54fc6929ecbf4_thumb.jpg', 'uploads/gallery/54fc6929ecbf4.jpg');
INSERT INTO `gallery_dtl` VALUES ('18', '1', null, 'uploads/gallery/55017d56ad02a_thumb.jpg', 'uploads/gallery/55017d56ad02a.jpg');

-- ----------------------------
-- Table structure for hilight
-- ----------------------------
DROP TABLE IF EXISTS `hilight`;
CREATE TABLE `hilight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `path_thumb` text,
  `path_image` text,
  `title` varchar(80) DEFAULT NULL,
  `detail` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hilight
-- ----------------------------
INSERT INTO `hilight` VALUES ('27', '1', 'uploads/hilight/5501b5a9b8bc5_thumb.jpg', 'uploads/hilight/5501b5a9b8bc5.jpg', '1234', '43123123');
INSERT INTO `hilight` VALUES ('28', '1', 'uploads/hilight/5501b5ae4184b_thumb.jpg', 'uploads/hilight/5501b5ae4184b.jpg', '', '');
INSERT INTO `hilight` VALUES ('29', '1', 'uploads/hilight/5501b5b29569f_thumb.jpg', 'uploads/hilight/5501b5b29569f.jpg', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '1', '16', 'GW60H3512', 'GW60H3512', 'uploads/product/54fb12975022b.jpg', 'uploads/product/54fb12975022b_thumb.jpg');
INSERT INTO `product` VALUES ('2', '1', '16', 'GW60H3513', 'GW60H3513', 'uploads/product/54f4b1b71f9df.jpg', 'uploads/product/54f4b1b71f9df_thumb.jpg');
INSERT INTO `product` VALUES ('4', '1', '16', 'GW60H3514', 'GW60H3514', 'uploads/product/54f24acc79cd1.jpg', 'uploads/product/54f24acc79cd1_thumb.jpg');
INSERT INTO `product` VALUES ('5', '1', '30', 'GR60H3957', 'GR60H3957', 'uploads/product/54f4b2fe76eb2.jpg', 'uploads/product/54f4b2fe76eb2_thumb.jpg');
INSERT INTO `product` VALUES ('6', '1', '31', 'GR60H3958', 'GR60H3958', 'uploads/product/54f4b31d15a57.jpg', 'uploads/product/54f4b31d15a57_thumb.jpg');
INSERT INTO `product` VALUES ('7', '1', '44', 'abc', 'def', 'uploads/product/54fb188cd166f.jpg', 'uploads/product/54fb188cd166f_thumb.jpg');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `pass_text` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1', 'Witoon harinasut', 'mawinhat', '7ba373b1806eb78e9ccba01a3eabd24d', 'tahniwam');
INSERT INTO `user` VALUES ('3', '1', 'Administrator', 'admin', 'a3b62e0618e01388d1de638cff4060ad', 'super_1234');
