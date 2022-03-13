/*
 Navicat Premium Data Transfer

 Source Server         : koneksi
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : dreamworld

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 13/03/2022 12:33:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel`  (
  `id_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `id_kota` int(11) NULL DEFAULT NULL,
  `nama_hotel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_quad` double NULL DEFAULT NULL,
  `harga_triple` double NULL DEFAULT NULL,
  `harga_double` double NULL DEFAULT NULL,
  `gambar_hotel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_hotel`) USING BTREE,
  INDEX `id_kota`(`id_kota`) USING BTREE,
  CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES (1, 1, 'SWISS MAQAM', 680, 900, 1120, 'SWISS_MAQAM.jpg');
INSERT INTO `hotel` VALUES (2, 1, 'CONRAD MAKKAH', 630, 800, 990, 'CONRAD_MAKKAH.jpg');
INSERT INTO `hotel` VALUES (3, 1, 'MARWA ROTANA', 680, 880, 1080, 'MARWA_ROTANA.jpg');
INSERT INTO `hotel` VALUES (4, 1, 'HILTON SUITES', 630, 800, 990, 'HILTON_SUITES.jpg');

-- ----------------------------
-- Table structure for kota
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota`  (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES (1, 'MEKAH');
INSERT INTO `kota` VALUES (2, 'MADINAH');

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token`  (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `date_created` date NULL DEFAULT NULL,
  PRIMARY KEY (`token_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of token
-- ----------------------------
INSERT INTO `token` VALUES (1, '050f6d5e34c41e1839b412ce2edee9', 1, '2022-02-16');
INSERT INTO `token` VALUES (2, 'd3772c0335da09c0125af77b1f206e', 1, '2022-02-16');
INSERT INTO `token` VALUES (3, 'a0090ea76700dda7c417446dd9b58f', 1, '2022-02-16');
INSERT INTO `token` VALUES (4, '34cdd39209c106b6054aa9b311e40a', 1, '2022-02-16');
INSERT INTO `token` VALUES (5, '3506f6894f6d6b1822e5f753bfe53e', 1, '2022-02-16');
INSERT INTO `token` VALUES (6, '656907e9124f02c8b9e4f190f7915f', 1, '2022-02-16');
INSERT INTO `token` VALUES (7, 'a690deb4c9247f4b5082c1af371b47', 1, '2022-02-16');
INSERT INTO `token` VALUES (8, '5af239cf0cede10b6c8cd5f1c5251f', 1, '2022-02-16');
INSERT INTO `token` VALUES (9, '6beb39f8b7e20ec943eaac5a67f47b', 1, '2022-02-16');
INSERT INTO `token` VALUES (10, '9914fed5954000766779b68185772d', 1, '2022-02-16');
INSERT INTO `token` VALUES (11, '985a28fe6937c1cfbf185a054b6a43', 1, '2022-02-16');
INSERT INTO `token` VALUES (12, 'b8ef9802b8f1cf8776c1b483152d37', 1, '2022-03-02');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` enum('admin','agen') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Star', '141f87be1330a105a87923f4ee6383bd7de46541', 'ramocta08@gmail.com', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
