/*
 Navicat Premium Data Transfer

 Source Server         : study_k43
 Source Server Type    : MariaDB
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : qlsp

 Target Server Type    : MariaDB
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 09/07/2022 11:02:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`CategoryID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Iphone');
INSERT INTO `category` VALUES (2, 'Samsung');
INSERT INTO `category` VALUES (3, 'Oppo');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Featured_image` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CategoryID` int(11) NOT NULL,
  PRIMARY KEY (`ProductID`) USING BTREE,
  INDEX `category_jbfk_1`(`CategoryID`) USING BTREE,
  CONSTRAINT `category_jbfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 'iphone 13 Pro Max', 'ip-13.png', 1);
INSERT INTO `product` VALUES (39, 'iphone 13', '../upload/ip-13-1.png', 1);
INSERT INTO `product` VALUES (40, 'iphone 13 Pro', '../upload/ip-13-pro.png', 1);
INSERT INTO `product` VALUES (41, 'iphone 11 ', '../upload/iphone11-black.png', 1);
INSERT INTO `product` VALUES (42, 'iphone 11 Pro Gold', '../upload/iphone-11-pro-vang.jpg', 1);
INSERT INTO `product` VALUES (43, 'iphone 11 Pro Max', '../upload/iphone-11-pro-max-green.jpg', 1);
INSERT INTO `product` VALUES (44, 'Galaxy S10 Black', '../upload/sieu-pham-galaxy-s-black.jpg', 2);
INSERT INTO `product` VALUES (45, 'Oppo F9 ', '../upload/oppo-f9-tim.jpg', 3);
INSERT INTO `product` VALUES (46, 'Oppo A92', '../upload/oppo-a92.jpg', 3);
INSERT INTO `product` VALUES (47, 'Galaxy S20 Pink', '../upload/samsung-galaxy-s20-hong.jpg', 1);
INSERT INTO `product` VALUES (48, 'Galaxy S21', '../upload/samsung-galaxy-s21-tim.jpg', 2);
INSERT INTO `product` VALUES (49, 'iphone XR Black', '../upload/iphone-xr-den.jpg', 1);
INSERT INTO `product` VALUES (50, 'Reno 5 Pro', '../upload/oppo-reno5-pro.jpg', 3);
INSERT INTO `product` VALUES (51, 'iphone 12 Pro Max Gold', '../upload/iphone_12_pro_max_gold.jpg', 1);
INSERT INTO `product` VALUES (52, 'iphone 12 mini', '../upload/apple-iphone-12-mini.png', 1);
INSERT INTO `product` VALUES (53, 'iphone 12 Pro', '../upload/iphone-12-pro.png', 1);
INSERT INTO `product` VALUES (54, 'iphone 13 mini Pink', '../upload/iphone-13-mini-pink.jpg', 1);
INSERT INTO `product` VALUES (57, 'iphone 13 mini Pink', '../upload/iphone-13-mini-pink.jpg', 1);
INSERT INTO `product` VALUES (59, 'iphone 12 mini', '../upload/apple-iphone-12-mini.png', 1);

SET FOREIGN_KEY_CHECKS = 1;
