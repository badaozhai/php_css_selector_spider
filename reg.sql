/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : spider

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-08-13 19:14:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for reg
-- ----------------------------
DROP TABLE IF EXISTS `reg`;
CREATE TABLE `reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `referer_url` varchar(255) DEFAULT NULL COMMENT '来源',
  `info` varchar(255) DEFAULT NULL,
  `image_demo` varchar(255) DEFAULT NULL,
  `unit_reg` varchar(255) DEFAULT NULL,
  `name_reg` varchar(255) DEFAULT NULL,
  `phone_reg` varchar(255) DEFAULT NULL,
  `page_key` varchar(255) DEFAULT NULL COMMENT '分页字母',
  `max_page` int(11) DEFAULT '10',
  `is_in_path` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reg
-- ----------------------------
INSERT INTO `reg` VALUES ('1', '赶集搬家类型页面', null, '赶集搬家类型页面赶集搬家类型页面赶集搬家类型页面', null, '/<li class=\"list-img\">.*?<\\/li>/s', '/<a class=\"f14 list-info-title.*?>.*?<\\/a>/s', '/(?<=<p class=\"tel\">).*?(?=<\\/p>)/s', 'o', '10', '0');
INSERT INTO `reg` VALUES ('2', '58餐饮', null, '58餐饮58餐饮58餐饮', null, '/<li class=\"list-img\">.*?<\\/li>/s', '/<li class=\"list-img\">.*?<\\/li>/s', '/<li class=\"list-img\">.*?<\\/li>/s', 'pn', '10', '0');

-- ----------------------------
-- Table structure for user
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
INSERT INTO `user` VALUES ('175', '长沙市天天旺搬家运输有限公司', '0731-84414419', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('176', '万利搬家——精品搬迁 专业货运—超优!', '13017288165', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('177', '长沙运邦搬家运输服务有限公司', '0731-84148466', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('178', '财运来搬家-24小时为您服务', '0731-85594898', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('179', '居民搬家,厂房搬迁,钢琴搬运,空调移机', '0731-84147568', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('180', '长沙如意搬家/车大价优 /全市统一调度', '0731-88810788', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('181', '大小型长短途,货车超低价,全城180起', '0731-89671577', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('182', '长沙市满堂红搬家有限公司', '15274932433', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('183', '顺意搬家-市政府合作单位，低价搬家搬厂', '18900795587', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('184', '长沙正规搬家公司，赶集网中国好商家', '0731-88614478', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('185', '长沙最好的搬家公司，价格最便宜-旺旺搬家', '13397412588', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('186', '长沙灰太狼中小型搬家 面包车搬家 出租', '13187080878', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('187', '专业家庭，工厂，公司搬运，车多随时', '13207427588', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('188', '长沙千禧搬家—专业正规—行业标杆', '0731-84812288', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('189', '久发搬家--退伍兵搬家公司,专业诚信准时', '13787264750', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('190', '长沙搬家、选长沙福祥搬家赶集推荐选择商家', '0731-83880886', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('191', '30元起步，最低价，最放心搬家', '15974209421', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('192', '长沙红双囍搬家-绿化指挥部合作单位', '18975158128', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('193', '5星级搬家公司 正规可靠 价格透明包满意', '0731-82662588', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('194', '长沙开门鸿搬家-有限公司', '18684737743', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('195', '30元起步,便宜面包车搬家公司,不乱要价', '18075182321', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('196', '《大金杯货车》《面包车》搬家', '15084747468', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('197', '33元起步，10分钟响应，尽在同城到家', '13212621195', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('198', '服务全长沙 随叫随到 本人免费协同搬运', '15111069535', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('199', '30元起面包车搬家，本月优惠中', '18273135700', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('200', '30元起，宏运168面包车搬家 不乱要价', '15211183918', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('201', '跑的快搬家', '15074849622', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('202', '货运站提货接货送货，搬家送人，长短途运输', '18711128258', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('203', '白夜行面包车小型搬家团队', '18627584026', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('204', '年年顺搬家', '0731-84122188', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('205', '30元起面包车搬家,退伍军人周师傅更靠谱', '15273196812', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('206', '金杯面的搬家货运,全市最低价，欢迎致电！', '15084883171', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('207', '《姚明》商务车搬家', '18974816850', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('208', '长沙友爱搬家', '18373152278', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('209', '老牌搬家服务真心真意.让您更放心.更省心', '0731-82369908', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('210', '专业工厂仓库、公司、居民搬迁.全市最低价', '0731-84879496', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('211', '30元起步，首选长沙最低价面包车搬家', '15616158284', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('212', '30元起步，加长加大面包车搬家', '15084800930', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('213', '钱师傅搬家 专业到家 是您搬家的好选', '18975138714', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('214', '长沙兴盛搬家运输服务有限公司', '0731-89838718', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('215', '搬家,搬设备,搬钢琴,拉货 天天都优惠', '0731-84744848', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('216', '最优服务，最实惠的短途拉货搬家的居民搬家', '18508427542', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('217', '中国台湾连锁搬家行业领导品牌', '0731-82224318', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('218', '永发搬家-长沙最优惠的搬家公司', '15974274135', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('219', '全新五菱荣光加长面包车搬家拉货出租', '15616661901', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('220', '郝师傅搬家货运', '0731-88900755', 'http://cs.ganji.com/banjia/', null, '1439027025');
INSERT INTO `user` VALUES ('221', '鸿达专业搬家、放心托付 重信誉、讲效率', '15580822998', 'http://cs.ganji.com/banjia/', null, '1439027025');
