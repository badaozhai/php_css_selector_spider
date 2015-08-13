/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : spider

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-08-13 14:40:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `reg`
-- ----------------------------
DROP TABLE IF EXISTS `reg`;
CREATE TABLE `reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `info` varchar(255) DEFAULT NULL,
  `image_demo` varchar(255) DEFAULT NULL COMMENT '按理截图',
  `unit_reg` varchar(255) DEFAULT NULL COMMENT '单元格正则',
  `name_reg` varchar(255) DEFAULT NULL COMMENT '名称正则',
  `phone_reg` varchar(255) DEFAULT NULL COMMENT '电话正则',
  `page_key` varchar(255) DEFAULT NULL COMMENT '分页字母',
  `max_page` int(11) DEFAULT '10' COMMENT '所需要抓取的最大页数',
  `is_in_path` tinyint(4) DEFAULT '1' COMMENT '分页词是否在路径中，默认是1在路径中，否则就是?p=2这种形式',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reg
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `from_url` varchar(255) DEFAULT NULL,
  `from_web` varchar(255) DEFAULT NULL,
  `create_time` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=222 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
