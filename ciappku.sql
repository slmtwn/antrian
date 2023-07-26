/*
 Navicat Premium Data Transfer

 Source Server         : Mac
 Source Server Type    : MySQL
 Source Server Version : 80032
 Source Host           : localhost:3306
 Source Schema         : ciappku

 Target Server Type    : MySQL
 Target Server Version : 80032
 File Encoding         : 65001

 Date: 26/07/2023 14:20:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_bulan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bulan`;
CREATE TABLE `tbl_bulan` (
  `id_bulan` int NOT NULL,
  `nama_bulan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tbl_bulan
-- ----------------------------
BEGIN;
INSERT INTO `tbl_bulan` VALUES (1, 'Januari');
INSERT INTO `tbl_bulan` VALUES (2, 'Februari');
INSERT INTO `tbl_bulan` VALUES (3, 'Maret');
INSERT INTO `tbl_bulan` VALUES (4, 'April');
INSERT INTO `tbl_bulan` VALUES (5, 'Mei');
INSERT INTO `tbl_bulan` VALUES (6, 'Juni');
INSERT INTO `tbl_bulan` VALUES (7, 'Juli');
INSERT INTO `tbl_bulan` VALUES (8, 'Agustus');
INSERT INTO `tbl_bulan` VALUES (9, 'September');
INSERT INTO `tbl_bulan` VALUES (10, 'Oktober');
INSERT INTO `tbl_bulan` VALUES (11, 'November');
INSERT INTO `tbl_bulan` VALUES (12, 'Desember');
COMMIT;

-- ----------------------------
-- Table structure for tbl_info
-- ----------------------------
DROP TABLE IF EXISTS `tbl_info`;
CREATE TABLE `tbl_info` (
  `id_info` int NOT NULL AUTO_INCREMENT,
  `isi_info` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tbl_info
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tbl_layanan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_layanan`;
CREATE TABLE `tbl_layanan` (
  `id_layanan` int NOT NULL AUTO_INCREMENT,
  `layanan` varchar(255) DEFAULT NULL,
  `tarif` int DEFAULT NULL,
  PRIMARY KEY (`id_layanan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tbl_layanan
-- ----------------------------
BEGIN;
INSERT INTO `tbl_layanan` VALUES (1, 'Layanan Air 1', 1500);
COMMIT;

-- ----------------------------
-- Table structure for tbl_pakai
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pakai`;
CREATE TABLE `tbl_pakai` (
  `id_pakai` varchar(100) NOT NULL,
  `id_pelanggan` varchar(10) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `bulan` varchar(3) DEFAULT NULL,
  `awal` int DEFAULT NULL,
  `akhir` int DEFAULT NULL,
  `pakai` int DEFAULT NULL,
  `tgl_input` time DEFAULT NULL,
  PRIMARY KEY (`id_pakai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tbl_pakai
-- ----------------------------
BEGIN;
INSERT INTO `tbl_pakai` VALUES ('GL001', '2307230001', '2023', '1', 0, 0, 0, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL002', '2307230001', '2023', '2', 0, 15, 15, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL003', '2307230001', '2023', '3', 15, 20, 5, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL004', '2307230001', '2023', '4', 20, 25, 5, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL005', '2307230001', '2023', '5', 25, 54, 29, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL006', '2307230002', '2023', '1', 0, 0, 0, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL007', '2307230002', '2023', '2', 0, 13, 13, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL008', '2307230002', '2023', '1', 13, 20, 7, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL009', '2307230002', '2023', '4', 20, 25, 5, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL010', '2307230002', '2023', '5', 25, 34, 9, '838:59:59');
INSERT INTO `tbl_pakai` VALUES ('GL011', '2307230001', '2023', '6', 54, 67, 13, '838:59:59');
COMMIT;

-- ----------------------------
-- Table structure for tbl_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pelanggan`;
CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL,
  `nm_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `status` char(10) NOT NULL DEFAULT '1',
  `no_hp` varchar(15) DEFAULT NULL,
  `id_layanan` int DEFAULT NULL,
  `tgl_daftar` int unsigned NOT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of tbl_pelanggan
-- ----------------------------
BEGIN;
INSERT INTO `tbl_pelanggan` VALUES ('2307230001', 'Slamet Wiyana', 'Gondanglegi 02/22 Wedomartani', '1', '081236007300', 1, 1690118561);
INSERT INTO `tbl_pelanggan` VALUES ('2307230002', 'Paiman Paijo', 'Gondanglegi 02/22 Wedomartani', '1', '09999999999', 1, 1690124399);
INSERT INTO `tbl_pelanggan` VALUES ('2307250001', 'Painah', 'Gondanglegi 02/22 Wedomartani', '1', '0000090909', 1, 1690271854);
COMMIT;

-- ----------------------------
-- Table structure for tbl_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pembayaran`;
CREATE TABLE `tbl_pembayaran` (
  `id_tagihan` int NOT NULL AUTO_INCREMENT,
  `tgl_bayar` time DEFAULT NULL,
  `uang_bayar` int DEFAULT NULL,
  `kembali` int DEFAULT NULL,
  PRIMARY KEY (`id_tagihan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tbl_pembayaran
-- ----------------------------
BEGIN;
INSERT INTO `tbl_pembayaran` VALUES (1, NULL, 10000, NULL);
COMMIT;

-- ----------------------------
-- Table structure for tbl_tagihan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tagihan`;
CREATE TABLE `tbl_tagihan` (
  `id_tagihan` int NOT NULL AUTO_INCREMENT,
  `id_pakai` varchar(100) DEFAULT NULL,
  `tagihan` int DEFAULT NULL,
  `status` char(12) DEFAULT NULL,
  PRIMARY KEY (`id_tagihan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tbl_tagihan
-- ----------------------------
BEGIN;
INSERT INTO `tbl_tagihan` VALUES (2, 'GL001', 0, '1');
INSERT INTO `tbl_tagihan` VALUES (3, 'GL002', 22500, '0');
INSERT INTO `tbl_tagihan` VALUES (4, 'GL003', 7500, '0');
INSERT INTO `tbl_tagihan` VALUES (5, 'GL004', 7500, '0');
INSERT INTO `tbl_tagihan` VALUES (6, 'GL005', 43500, '0');
INSERT INTO `tbl_tagihan` VALUES (7, 'GL006', 0, '0');
INSERT INTO `tbl_tagihan` VALUES (8, 'GL007', 19500, '0');
INSERT INTO `tbl_tagihan` VALUES (9, 'GL008', 10500, '0');
INSERT INTO `tbl_tagihan` VALUES (10, 'GL009', 7500, '0');
INSERT INTO `tbl_tagihan` VALUES (11, 'GL010', 13500, '0');
INSERT INTO `tbl_tagihan` VALUES (12, 'GL011', 19500, '0');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  `date_created` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (3, 'Slamet Wiyana, A.Md', 'slmtwn@gmail.com', 'akulaha.png', '$2y$10$1uyYV23r6Iy/cemXKvKqXeJYy5wo2DI3lXuxdyPU8ml1nX8Qbi4RC', 1, 1, 1688483424);
INSERT INTO `user` VALUES (4, 'Paijo Noto Menggolo', 'paijo@paijo.com', 'akulaha1.png', '$2y$10$gK1GDH.odiD0XM/o1C9qzOJIT.NSOIWfdJWN6xmQH.rmRgB98HNWi', 2, 1, 1688483436);
INSERT INTO `user` VALUES (5, 'Kasir Pamsimas', 'kasir@kasir.com', 'akulaha.png', '$2y$10$gK1GDH.odiD0XM/o1C9qzOJIT.NSOIWfdJWN6xmQH.rmRgB98HNWi', 3, 1, 1688483436);
COMMIT;

-- ----------------------------
-- Table structure for user_access_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE `user_access_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int DEFAULT NULL,
  `menu_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of user_access_menu
-- ----------------------------
BEGIN;
INSERT INTO `user_access_menu` VALUES (54, 1, 1);
INSERT INTO `user_access_menu` VALUES (55, 1, 2);
INSERT INTO `user_access_menu` VALUES (56, 1, 3);
INSERT INTO `user_access_menu` VALUES (57, 1, 4);
INSERT INTO `user_access_menu` VALUES (58, 1, 5);
INSERT INTO `user_access_menu` VALUES (59, 2, 2);
INSERT INTO `user_access_menu` VALUES (60, 2, 5);
INSERT INTO `user_access_menu` VALUES (61, 3, 5);
INSERT INTO `user_access_menu` VALUES (62, 3, 3);
COMMIT;

-- ----------------------------
-- Table structure for user_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of user_menu
-- ----------------------------
BEGIN;
INSERT INTO `user_menu` VALUES (1, 'Admin');
INSERT INTO `user_menu` VALUES (2, 'Pemakaian');
INSERT INTO `user_menu` VALUES (3, 'Transaksi');
INSERT INTO `user_menu` VALUES (4, 'Menu');
INSERT INTO `user_menu` VALUES (5, 'User');
COMMIT;

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of user_role
-- ----------------------------
BEGIN;
INSERT INTO `user_role` VALUES (1, 'Administrator');
INSERT INTO `user_role` VALUES (2, 'Member');
INSERT INTO `user_role` VALUES (3, 'Kasir');
COMMIT;

-- ----------------------------
-- Table structure for user_sub_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of user_sub_menu
-- ----------------------------
BEGIN;
INSERT INTO `user_sub_menu` VALUES (1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1);
INSERT INTO `user_sub_menu` VALUES (2, 5, 'My Profile', 'user', 'fas fa-fw fa-user', 1);
INSERT INTO `user_sub_menu` VALUES (3, 5, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1);
INSERT INTO `user_sub_menu` VALUES (4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1);
INSERT INTO `user_sub_menu` VALUES (5, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1);
INSERT INTO `user_sub_menu` VALUES (7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1);
INSERT INTO `user_sub_menu` VALUES (8, 5, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1);
INSERT INTO `user_sub_menu` VALUES (9, 1, 'Tarif', 'admin/tarif', 'fa fa-fw fa-divide', 1);
INSERT INTO `user_sub_menu` VALUES (10, 1, 'Pelanggan', 'admin/pelanggan', 'fas fa-fw fa-child', 1);
INSERT INTO `user_sub_menu` VALUES (11, 1, 'User', 'admin/user', 'fas fa-fw fa-user', 1);
INSERT INTO `user_sub_menu` VALUES (13, 3, 'Tagihan Air', 'transaksi', 'fas fa-fw fa-coins', 1);
INSERT INTO `user_sub_menu` VALUES (15, 2, 'Pemakaian Air', 'user/pemakaian', 'fas fa-fw fa-calculator', 1);
COMMIT;

-- ----------------------------
-- View structure for vw_full_pemakai_air
-- ----------------------------
DROP VIEW IF EXISTS `vw_full_pemakai_air`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_full_pemakai_air` AS select `tbl_pelanggan`.`id_pelanggan` AS `id_pelanggan`,`tbl_pelanggan`.`nm_pelanggan` AS `nm_pelanggan`,`tbl_pelanggan`.`alamat_pelanggan` AS `alamat_pelanggan`,`tbl_pelanggan`.`status` AS `status`,`tbl_pelanggan`.`no_hp` AS `no_hp`,`tbl_pelanggan`.`id_layanan` AS `id_layanan`,`tbl_pelanggan`.`tgl_daftar` AS `tgl_daftar`,`tbl_pakai`.`tahun` AS `tahun`,`tbl_pakai`.`bulan` AS `bulan`,ifnull(`tbl_pakai`.`awal`,0) AS `awal`,`tbl_pakai`.`akhir` AS `akhir`,`tbl_pakai`.`pakai` AS `pakai` from (`tbl_pelanggan` left join `tbl_pakai` on((`tbl_pelanggan`.`id_pelanggan` = `tbl_pakai`.`id_pelanggan`)));

-- ----------------------------
-- View structure for vw_pelanggan
-- ----------------------------
DROP VIEW IF EXISTS `vw_pelanggan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_pelanggan` AS select `tbl_pelanggan`.`id_pelanggan` AS `id_pelanggan`,`tbl_pelanggan`.`nm_pelanggan` AS `nm_pelanggan`,`tbl_pelanggan`.`alamat_pelanggan` AS `alamat_pelanggan`,`tbl_pelanggan`.`status` AS `status`,`tbl_pelanggan`.`no_hp` AS `no_hp`,`tbl_pelanggan`.`id_layanan` AS `id_layanan`,`tbl_pelanggan`.`tgl_daftar` AS `tgl_daftar`,`tbl_layanan`.`layanan` AS `layanan` from (`tbl_layanan` join `tbl_pelanggan` on((`tbl_layanan`.`id_layanan` = `tbl_pelanggan`.`id_layanan`)));

-- ----------------------------
-- View structure for vw_pemakaian_air
-- ----------------------------
DROP VIEW IF EXISTS `vw_pemakaian_air`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_pemakaian_air` AS select `tbl_pakai`.`id_pakai` AS `id_pakai`,`tbl_pelanggan`.`nm_pelanggan` AS `nm_pelanggan`,`tbl_pakai`.`tahun` AS `tahun`,`tbl_bulan`.`nama_bulan` AS `nama_bulan`,`tbl_pakai`.`awal` AS `awal`,`tbl_pakai`.`akhir` AS `akhir`,`tbl_pakai`.`pakai` AS `pakai`,`tbl_pelanggan`.`id_pelanggan` AS `id_pelanggan` from ((`tbl_pakai` join `tbl_pelanggan` on((`tbl_pakai`.`id_pelanggan` = `tbl_pelanggan`.`id_pelanggan`))) join `tbl_bulan` on((`tbl_bulan`.`id_bulan` = `tbl_pakai`.`bulan`)));

-- ----------------------------
-- View structure for vw_tagihan
-- ----------------------------
DROP VIEW IF EXISTS `vw_tagihan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_tagihan` AS select `p`.`id_pelanggan` AS `id_pelanggan`,`p`.`nm_pelanggan` AS `nm_pelanggan`,`t`.`id_tagihan` AS `id_tagihan`,`t`.`tagihan` AS `tagihan`,`t`.`status` AS `status`,`k`.`tahun` AS `tahun`,`k`.`pakai` AS `pakai`,`b`.`nama_bulan` AS `nama_bulan` from (((`tbl_pelanggan` `p` join `tbl_pakai` `k` on((`p`.`id_pelanggan` = `k`.`id_pelanggan`))) join `tbl_tagihan` `t` on((`k`.`id_pakai` = `t`.`id_pakai`))) join `tbl_bulan` `b` on((`k`.`bulan` = `b`.`id_bulan`))) order by `k`.`tahun`,`b`.`id_bulan`;

SET FOREIGN_KEY_CHECKS = 1;
