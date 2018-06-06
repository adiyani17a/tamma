-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bisnis_tamma
CREATE DATABASE IF NOT EXISTS `bisnis_tamma` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bisnis_tamma`;

-- Dumping structure for table bisnis_tamma.d_access
CREATE TABLE IF NOT EXISTS `d_access` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(50) DEFAULT NULL,
  `a_parrent` int(11) DEFAULT NULL,
  `a_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_access: ~67 rows (approximately)
DELETE FROM `d_access`;
/*!40000 ALTER TABLE `d_access` DISABLE KEYS */;
INSERT INTO `d_access` (`a_id`, `a_name`, `a_parrent`, `a_order`) VALUES
	(1, 'Master', NULL, 1),
	(2, 'Data Supplier', 1, 2),
	(3, 'Data Customer', 2, 3),
	(4, 'Data Bahan Baku', 3, 4),
	(5, 'Data Jenis Produksi', 4, 5),
	(6, 'Data Pegawai ', 5, 6),
	(7, 'Data Akun Keuangan ', 6, 7),
	(8, 'Data Transaksi keuangan ', 7, 8),
	(9, 'Data Barang', 8, 9),
	(10, 'Purchasing', 0, 10),
	(11, 'Rencana Bahan Baku Produksi', 1, 11),
	(12, 'Rencana Pembelian', 2, 12),
	(13, 'Order Pembelian ', 3, 13),
	(14, 'Belanja Harian', 4, 14),
	(15, 'Return pembelian', 5, 15),
	(16, 'Inventory', NULL, 16),
	(17, 'Penerimaan Barang Supplier', 1, 17),
	(18, 'Penerimaan Barang Hasil Produksi', 2, 18),
	(19, 'Penerimaan Barang Return Customer', 3, 19),
	(20, 'Barang digunakan', 4, 20),
	(21, 'Stock Opname', 5, 21),
	(22, 'Produksi', NULL, 22),
	(23, 'Monitoring Order & Stock', 1, 23),
	(24, 'Rencana Produksi', 2, 24),
	(25, 'Manajemen SPK', 3, 25),
	(26, 'Manajemen Output Produksi', 4, 26),
	(27, 'Manajemen Sampah (Waste)', 5, 27),
	(28, 'Penjualan', NULL, 28),
	(29, 'Manajemen Harga', 1, 29),
	(30, 'Manajemen Promosi', 2, 30),
	(31, 'Broadcast Promosi Via Email ', 3, 31),
	(32, 'Rencana Penjualan', 4, 32),
	(33, 'POS Penjualan Retail ', 5, 33),
	(34, 'Ritail Transfer', 6, 34),
	(35, 'Pos Penjualan Grosir/Online', 7, 35),
	(36, 'Grosir Transfer', 8, 36),
	(37, 'Monitoring Return Penjualalan', 9, 37),
	(38, 'Manajemen Return Penjualan ', 10, 38),
	(39, 'Monitoring Progres Penjualan', 11, 39),
	(40, 'Mutasi Stock & Retail', 12, 40),
	(41, 'HRD', NULL, 41),
	(42, 'Data Karyawan ', 1, 42),
	(43, 'Data Administrasi Pegawai ', 2, 43),
	(44, 'Data Lembur Pegawai ', 3, 44),
	(45, 'Scoreboard Pegawai Per Hari', 4, 45),
	(46, 'Payroll', 5, 46),
	(47, 'Manajemen KPI Pegawai ', 6, 47),
	(48, 'Training Pegawai ', 7, 48),
	(49, 'Recruitment', 8, 49),
	(50, 'Keuangan', NULL, 50),
	(51, 'Manajemen SPK', 1, 51),
	(52, 'Proses Input Transaksi', 2, 52),
	(53, 'Laporan Hutang Piutang ', 3, 53),
	(54, 'Laporan (Jurnal,Buku Besar,Neraca,DLL)', 4, 54),
	(55, 'Analisa Progress Terhadap Perencanaan', 5, 55),
	(56, 'Analisa Net Profit Terhadap OCF', 6, 56),
	(57, 'Analisa Pertumbuhan Aset', 7, 57),
	(58, 'Analisa Cashflow', 8, 58),
	(59, 'Analisa Common Size dan Index', 9, 59),
	(60, 'Analisa Rasio Keuangan ', 10, 60),
	(61, 'Analisa Three Botton Line ', 11, 61),
	(62, 'Analisa ROE', 12, 62),
	(63, 'System', NULL, 63),
	(64, 'Manajemen User', 1, 64),
	(65, 'Manajemen Hak Akses', 2, 65),
	(66, 'Profil Perusahaan', 3, 66),
	(67, 'Tahun Finansial', 4, 67);
/*!40000 ALTER TABLE `d_access` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_group
CREATE TABLE IF NOT EXISTS `d_group` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`g_id`),
  UNIQUE KEY `g_name` (`g_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='nama group';

-- Dumping data for table bisnis_tamma.d_group: ~1 rows (approximately)
DELETE FROM `d_group`;
/*!40000 ALTER TABLE `d_group` DISABLE KEYS */;
INSERT INTO `d_group` (`g_id`, `g_name`) VALUES
	(1, 'ke');
/*!40000 ALTER TABLE `d_group` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_group_access
CREATE TABLE IF NOT EXISTS `d_group_access` (
  `ga_access` int(11) NOT NULL,
  `ga_group` int(11) NOT NULL,
  `ga_read` enum('Y','N') DEFAULT 'N',
  `ga_insert` enum('Y','N') DEFAULT 'N',
  `ga_update` enum('Y','N') DEFAULT 'N',
  `ga_delete` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`ga_access`,`ga_group`),
  KEY `FK_d_group_access_d_group` (`ga_group`),
  CONSTRAINT `FK_d_group_access_d_access` FOREIGN KEY (`ga_access`) REFERENCES `d_access` (`a_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_d_group_access_d_group` FOREIGN KEY (`ga_group`) REFERENCES `d_group` (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_group_access: ~67 rows (approximately)
DELETE FROM `d_group_access`;
/*!40000 ALTER TABLE `d_group_access` DISABLE KEYS */;
INSERT INTO `d_group_access` (`ga_access`, `ga_group`, `ga_read`, `ga_insert`, `ga_update`, `ga_delete`) VALUES
	(1, 1, 'N', 'N', 'N', 'N'),
	(2, 1, 'Y', 'N', 'N', 'N'),
	(3, 1, 'Y', 'N', 'N', 'N'),
	(4, 1, 'N', 'N', 'N', 'N'),
	(5, 1, 'N', 'N', 'N', 'N'),
	(6, 1, 'N', 'N', 'N', 'N'),
	(7, 1, 'N', 'N', 'N', 'N'),
	(8, 1, 'N', 'N', 'N', 'N'),
	(9, 1, 'N', 'N', 'N', 'N'),
	(10, 1, 'N', 'N', 'N', 'N'),
	(11, 1, 'N', 'N', 'N', 'N'),
	(12, 1, 'N', 'N', 'N', 'N'),
	(13, 1, 'N', 'N', 'N', 'N'),
	(14, 1, 'N', 'N', 'N', 'N'),
	(15, 1, 'N', 'N', 'N', 'N'),
	(16, 1, 'N', 'N', 'N', 'N'),
	(17, 1, 'N', 'N', 'N', 'N'),
	(18, 1, 'N', 'N', 'N', 'N'),
	(19, 1, 'N', 'N', 'N', 'N'),
	(20, 1, 'N', 'N', 'N', 'N'),
	(21, 1, 'N', 'N', 'N', 'N'),
	(22, 1, 'N', 'N', 'N', 'N'),
	(23, 1, 'N', 'N', 'N', 'N'),
	(24, 1, 'N', 'N', 'N', 'N'),
	(25, 1, 'N', 'N', 'N', 'N'),
	(26, 1, 'N', 'N', 'N', 'N'),
	(27, 1, 'N', 'N', 'N', 'N'),
	(28, 1, 'N', 'N', 'N', 'N'),
	(29, 1, 'N', 'N', 'N', 'N'),
	(30, 1, 'N', 'N', 'N', 'N'),
	(31, 1, 'N', 'N', 'N', 'N'),
	(32, 1, 'N', 'N', 'N', 'N'),
	(33, 1, 'N', 'N', 'N', 'N'),
	(34, 1, 'N', 'N', 'N', 'N'),
	(35, 1, 'N', 'N', 'N', 'N'),
	(36, 1, 'N', 'N', 'N', 'N'),
	(37, 1, 'N', 'N', 'N', 'N'),
	(38, 1, 'N', 'N', 'N', 'N'),
	(39, 1, 'N', 'N', 'N', 'N'),
	(40, 1, 'N', 'N', 'N', 'N'),
	(41, 1, 'N', 'N', 'N', 'N'),
	(42, 1, 'N', 'N', 'N', 'N'),
	(43, 1, 'N', 'N', 'N', 'N'),
	(44, 1, 'N', 'N', 'N', 'N'),
	(45, 1, 'N', 'N', 'N', 'N'),
	(46, 1, 'N', 'N', 'N', 'N'),
	(47, 1, 'N', 'N', 'N', 'N'),
	(48, 1, 'N', 'N', 'N', 'N'),
	(49, 1, 'N', 'N', 'N', 'N'),
	(50, 1, 'N', 'N', 'N', 'N'),
	(51, 1, 'N', 'N', 'N', 'N'),
	(52, 1, 'N', 'N', 'N', 'N'),
	(53, 1, 'N', 'N', 'N', 'N'),
	(54, 1, 'N', 'N', 'N', 'N'),
	(55, 1, 'N', 'N', 'N', 'N'),
	(56, 1, 'N', 'N', 'N', 'N'),
	(57, 1, 'N', 'N', 'N', 'N'),
	(58, 1, 'N', 'N', 'N', 'N'),
	(59, 1, 'N', 'N', 'N', 'N'),
	(60, 1, 'N', 'N', 'N', 'N'),
	(61, 1, 'N', 'N', 'N', 'N'),
	(62, 1, 'N', 'N', 'N', 'N'),
	(63, 1, 'N', 'N', 'N', 'N'),
	(64, 1, 'N', 'N', 'N', 'N'),
	(65, 1, 'N', 'N', 'N', 'N'),
	(66, 1, 'N', 'N', 'N', 'N'),
	(67, 1, 'N', 'N', 'N', 'N');
/*!40000 ALTER TABLE `d_group_access` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_mem
CREATE TABLE IF NOT EXISTS `d_mem` (
  `m_id` varchar(10) NOT NULL,
  `m_username` varchar(20) DEFAULT NULL,
  `m_passwd` varchar(40) DEFAULT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `m_birth_tgl` date DEFAULT NULL,
  `m_addr` varchar(100) DEFAULT NULL,
  `m_reff` varchar(10) DEFAULT NULL,
  `m_lastlogin` timestamp NULL DEFAULT NULL,
  `m_lastlogout` timestamp NULL DEFAULT NULL,
  `m_insert` timestamp NULL DEFAULT NULL,
  `m_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_mem: ~3 rows (approximately)
DELETE FROM `d_mem`;
/*!40000 ALTER TABLE `d_mem` DISABLE KEYS */;
INSERT INTO `d_mem` (`m_id`, `m_username`, `m_passwd`, `m_name`, `m_birth_tgl`, `m_addr`, `m_reff`, `m_lastlogin`, `m_lastlogout`, `m_insert`, `m_update`) VALUES
	('1', 'thoriq', '47e3896af5f3d18dbce321283dd9af0197f8c0e4', 'shitta', '2018-03-28', NULL, NULL, '2018-03-28 08:24:54', '2018-03-28 08:24:53', '2018-03-28 08:24:50', '2018-04-09 20:30:36'),
	('2', 'shitta', '47e3896af5f3d18dbce321283dd9af0197f8c0e4', 'dfd', NULL, NULL, NULL, NULL, NULL, '2018-04-10 07:24:47', '2018-04-10 07:24:47'),
	('4', 'mahmud', '47e3896af5f3d18dbce321283dd9af0197f8c0e4', 'sds', NULL, NULL, NULL, NULL, NULL, '2018-04-10 07:31:19', '2018-04-10 07:31:19');
/*!40000 ALTER TABLE `d_mem` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_mem_access
CREATE TABLE IF NOT EXISTS `d_mem_access` (
  `ma_id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_mem` varchar(10) DEFAULT NULL,
  `ma_access` int(11) DEFAULT NULL,
  `ma_group` int(11) DEFAULT NULL,
  `ma_type` enum('M','G') DEFAULT NULL COMMENT 'M: langsung dari member, G: harus melalui group akses',
  `ma_read` enum('N','Y') DEFAULT 'N',
  `ma_insert` enum('N','Y') DEFAULT 'N',
  `ma_update` enum('N','Y') DEFAULT 'N',
  `ma_delete` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`ma_id`),
  KEY `FK_d_mem_acces_d_mem` (`ma_mem`),
  KEY `FK_d_mem_acces_d_access` (`ma_access`),
  CONSTRAINT `FK_d_mem_acces_d_access` FOREIGN KEY (`ma_access`) REFERENCES `d_access` (`a_id`),
  CONSTRAINT `FK_d_mem_acces_d_mem` FOREIGN KEY (`ma_mem`) REFERENCES `d_mem` (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='menampung akses user';

-- Dumping data for table bisnis_tamma.d_mem_access: ~0 rows (approximately)
DELETE FROM `d_mem_access`;
/*!40000 ALTER TABLE `d_mem_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mem_access` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_productplan
CREATE TABLE IF NOT EXISTS `d_productplan` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_date` date DEFAULT NULL,
  `pp_item` int(11) DEFAULT NULL,
  `pp_qty` decimal(10,0) DEFAULT NULL,
  `pp_isspk` enum('Y','N','P','C') DEFAULT 'N',
  `pp_insert` timestamp NULL DEFAULT NULL,
  `pp_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_productplan: ~23 rows (approximately)
DELETE FROM `d_productplan`;
/*!40000 ALTER TABLE `d_productplan` DISABLE KEYS */;
INSERT INTO `d_productplan` (`pp_id`, `pp_date`, `pp_item`, `pp_qty`, `pp_isspk`, `pp_insert`, `pp_update`) VALUES
	(1, '2018-04-07', 172, 10, 'Y', NULL, '2018-04-12 21:50:36'),
	(2, '2018-03-09', 247, 26, 'N', NULL, '2018-04-12 20:43:43'),
	(3, '2018-03-10', 269, 28, 'P', NULL, '2018-04-12 21:50:42'),
	(4, '2018-04-10', 175, 33, 'P', NULL, '2018-04-12 21:50:57'),
	(5, '2018-03-12', 231, 15, 'Y', NULL, '2018-04-12 21:50:51'),
	(6, '2018-04-12', 172, 60, 'Y', NULL, '2018-04-17 12:44:19'),
	(7, '2018-04-12', 231, 40, 'N', NULL, '2018-04-12 18:59:43'),
	(8, '2018-04-12', 247, 30, 'Y', NULL, '2018-04-13 15:42:49'),
	(9, '2018-04-13', 269, 50, 'C', NULL, '2018-04-13 10:53:10'),
	(10, '2018-04-13', 243, 60, 'N', NULL, '2018-04-13 13:33:33'),
	(11, '2018-04-13', 173, 170, 'N', NULL, '2018-04-13 16:06:23'),
	(12, '2018-04-13', 247, 30, 'N', NULL, '2018-04-13 16:07:26'),
	(13, '2018-04-20', 174, 50, 'N', NULL, '2018-04-20 22:07:51'),
	(14, '2018-04-20', 173, 100, 'N', NULL, '2018-04-20 22:11:42'),
	(19, '2018-04-25', 233, 11, 'N', NULL, '2018-04-25 12:06:08'),
	(20, '2018-04-25', 233, 9, 'N', NULL, '2018-04-25 12:06:08'),
	(21, '2018-04-25', 233, 1, 'N', NULL, '2018-04-25 12:06:08'),
	(22, '2018-04-25', 172, 12, 'N', NULL, '2018-04-26 09:59:53'),
	(23, '2018-04-25', 172, 15, 'N', NULL, '2018-04-26 09:59:53'),
	(24, '2018-04-25', 172, 10, 'N', NULL, '2018-04-26 09:59:53'),
	(25, '2018-04-25', 172, 10, 'N', NULL, '2018-04-26 09:59:53'),
	(26, '2018-04-25', 232, 10, 'N', NULL, '2018-04-26 10:00:03'),
	(27, '2018-04-25', 232, 18, 'N', NULL, '2018-04-26 10:00:03'),
	(28, '2018-04-26', 175, 10, 'N', NULL, '2018-04-26 10:04:53'),
	(29, '2018-04-26', 281, 8, 'N', NULL, '2018-04-26 10:56:13'),
	(30, '2018-04-26', 281, 8, 'N', NULL, '2018-04-26 10:56:14');
/*!40000 ALTER TABLE `d_productplan` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_productresult
CREATE TABLE IF NOT EXISTS `d_productresult` (
  `pr_id` int(11) NOT NULL,
  `pr_spk` varchar(50) NOT NULL,
  `pr_date` date DEFAULT NULL,
  `pr_item` int(11) DEFAULT NULL,
  `pr_insert` datetime DEFAULT NULL,
  `pr_update` datetime DEFAULT NULL,
  PRIMARY KEY (`pr_id`),
  KEY `pr_spk` (`pr_spk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_productresult: ~2 rows (approximately)
DELETE FROM `d_productresult`;
/*!40000 ALTER TABLE `d_productresult` DISABLE KEYS */;
INSERT INTO `d_productresult` (`pr_id`, `pr_spk`, `pr_date`, `pr_item`, `pr_insert`, `pr_update`) VALUES
	(1, '3', '2018-04-12', 172, NULL, NULL),
	(2, '1', '2018-04-12', 247, NULL, NULL);
/*!40000 ALTER TABLE `d_productresult` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_productresult_dt
CREATE TABLE IF NOT EXISTS `d_productresult_dt` (
  `prdt_productresult` int(11) NOT NULL,
  `prdt_detail` int(11) NOT NULL,
  `prdt_item` int(11) DEFAULT NULL,
  `prdt_qty` decimal(10,0) DEFAULT NULL,
  `prdt_date` date DEFAULT NULL,
  `prdt_time` time DEFAULT NULL,
  PRIMARY KEY (`prdt_productresult`,`prdt_detail`),
  CONSTRAINT `FK_d_productresult_dt_d_productionresult` FOREIGN KEY (`prdt_productresult`) REFERENCES `d_productresult` (`pr_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_productresult_dt: ~4 rows (approximately)
DELETE FROM `d_productresult_dt`;
/*!40000 ALTER TABLE `d_productresult_dt` DISABLE KEYS */;
INSERT INTO `d_productresult_dt` (`prdt_productresult`, `prdt_detail`, `prdt_item`, `prdt_qty`, `prdt_date`, `prdt_time`) VALUES
	(1, 1, 172, 30, '2018-04-12', '15:00:00'),
	(1, 2, 172, 111, '2018-04-12', '16:00:00'),
	(1, 4, 172, 5, '2018-04-12', '09:00:00'),
	(2, 3, 247, 11, '2018-04-12', '14:30:00');
/*!40000 ALTER TABLE `d_productresult_dt` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_sales
CREATE TABLE IF NOT EXISTS `d_sales` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_channel` varchar(2) NOT NULL COMMENT 'RT: Retail | GR: Grosir',
  `s_date` date DEFAULT NULL,
  `s_note` varchar(40) DEFAULT NULL,
  `s_staff` varchar(10) DEFAULT NULL COMMENT 'DIABAIKAN SEMENTARA',
  `s_customer` int(11) NOT NULL,
  `s_gross` decimal(20,2) DEFAULT NULL,
  `s_disc_percent` smallint(6) DEFAULT NULL,
  `s_disc_value` decimal(20,2) unsigned DEFAULT NULL,
  `s_tax` smallint(6) NOT NULL DEFAULT '0',
  `s_net` decimal(20,2) DEFAULT NULL,
  `s_status` varchar(2) DEFAULT NULL COMMENT 'DR: Draft | WA: Waiting | PR: Progress | FN: Final',
  `s_insert` timestamp NULL DEFAULT NULL,
  `s_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`s_id`),
  KEY `FK_sales_customer` (`s_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_sales: ~19 rows (approximately)
DELETE FROM `d_sales`;
/*!40000 ALTER TABLE `d_sales` DISABLE KEYS */;
INSERT INTO `d_sales` (`s_id`, `s_channel`, `s_date`, `s_note`, `s_staff`, `s_customer`, `s_gross`, `s_disc_percent`, `s_disc_value`, `s_tax`, `s_net`, `s_status`, `s_insert`, `s_update`) VALUES
	(4, 'GR', '2018-04-20', 'XX1804204', NULL, 2, 20000.00, NULL, NULL, 0, 20000.00, 'PR', '2018-04-20 14:52:32', '2018-04-20 21:52:32'),
	(5, 'GR', '2018-04-20', 'XX1804205', NULL, 2, 1000000.00, NULL, NULL, 0, 1000000.00, 'PR', '2018-04-20 14:53:34', '2018-04-20 21:53:34'),
	(6, 'GR', '2018-04-20', 'XX1804206', NULL, 4, 1000000.00, NULL, NULL, 0, 1000000.00, 'PR', '2018-04-20 14:57:58', '2018-04-20 21:57:58'),
	(7, 'RT', '2018-04-22', 'XX1804227', NULL, 1, 190000.00, NULL, NULL, 0, 190000.00, 'FN', '2018-04-22 10:17:11', '2018-04-22 17:17:11'),
	(8, 'GR', '2018-04-22', 'XX1804228', NULL, 1, 250000.00, NULL, NULL, 0, 250000.00, 'PR', '2018-04-22 10:27:06', '2018-04-22 17:27:06'),
	(9, 'GR', '2018-04-22', 'XX1804229', NULL, 2, 120000.00, NULL, NULL, 0, 120000.00, 'PR', '2018-04-22 10:33:48', '2018-04-22 17:33:48'),
	(10, 'GR', '2018-04-22', 'XX18042210', NULL, 2, 12000.00, NULL, NULL, 0, 12000.00, 'PR', '2018-04-22 10:34:08', '2018-04-22 17:34:08'),
	(11, 'GR', '2018-04-22', 'XX18042211', NULL, 4, 20000.00, NULL, NULL, 0, 20000.00, 'PR', '2018-04-22 10:39:15', '2018-04-22 17:39:15'),
	(12, 'GR', '2018-04-22', 'XX18042212', NULL, 4, 250000.00, NULL, NULL, 0, 250000.00, 'PC', '2018-04-22 11:17:10', '2018-04-23 16:32:08'),
	(13, 'RT', '2018-04-22', 'XX18042213', NULL, 5, 80000.00, NULL, NULL, 0, 80000.00, 'FN', '2018-04-22 11:44:50', '2018-04-22 18:44:50'),
	(14, 'RT', '2018-04-22', 'XX18042214', NULL, 1, 20000.00, NULL, NULL, 0, 20000.00, 'DR', '2018-04-22 11:45:00', '2018-04-22 18:45:00'),
	(15, 'RT', '2018-04-22', 'XX18042215', NULL, 2, 20000.00, NULL, NULL, 0, 20000.00, 'DR', '2018-04-22 11:45:23', '2018-04-22 18:45:23'),
	(16, 'GR', '2018-04-22', 'XX18042216', NULL, 4, 20000.00, NULL, NULL, 0, 20000.00, 'PC', '2018-04-22 11:55:00', '2018-04-23 16:59:10'),
	(17, 'GR', '2018-04-22', 'XX18042217', NULL, 4, 20000.00, NULL, NULL, 0, 20000.00, 'PR', '2018-04-22 11:55:10', '2018-04-22 18:55:10'),
	(18, 'GR', '2018-04-22', 'XX18042218', NULL, 2, 12000.00, NULL, NULL, 0, 12000.00, 'DR', '2018-04-22 11:55:20', '2018-04-22 18:55:20'),
	(19, 'GR', '2018-04-23', 'XX18042319', NULL, 2, 250000.00, NULL, NULL, 0, 250000.00, 'PC', '2018-04-23 08:26:51', '2018-04-23 17:11:38'),
	(20, 'GR', '2018-04-26', 'XX18042620', NULL, 1, 280000.00, NULL, NULL, 0, 280000.00, 'DR', '2018-04-26 03:38:02', '2018-04-26 10:38:02'),
	(21, 'GR', '2018-04-26', 'XX18042621', NULL, 1, 20000.00, NULL, NULL, 0, 20000.00, 'PR', '2018-04-26 03:38:35', '2018-04-26 10:38:35'),
	(22, 'GR', '2018-04-26', 'XX18042622', NULL, 5, 280000.00, NULL, NULL, 0, 280000.00, 'PR', '2018-04-26 03:41:25', '2018-04-26 10:41:25'),
	(23, 'GR', '2018-04-26', 'XX18042623', NULL, 1, 180000.00, NULL, NULL, 0, 180000.00, 'PR', '2018-04-26 03:50:33', '2018-04-26 10:50:33');
/*!40000 ALTER TABLE `d_sales` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_sales_dt
CREATE TABLE IF NOT EXISTS `d_sales_dt` (
  `sd_sales` int(11) NOT NULL,
  `sd_detailid` tinyint(4) NOT NULL,
  `sd_item` int(11) NOT NULL,
  `sd_qty` double NOT NULL,
  `sd_price` decimal(10,0) DEFAULT NULL,
  `sd_disc_percent` smallint(6) DEFAULT NULL,
  `sd_disc_value` decimal(20,2) unsigned DEFAULT NULL,
  `sd_total` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`sd_sales`,`sd_detailid`),
  CONSTRAINT `FK_d_sales_dt_d_sales` FOREIGN KEY (`sd_sales`) REFERENCES `d_sales` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_sales_dt: ~21 rows (approximately)
DELETE FROM `d_sales_dt`;
/*!40000 ALTER TABLE `d_sales_dt` DISABLE KEYS */;
INSERT INTO `d_sales_dt` (`sd_sales`, `sd_detailid`, `sd_item`, `sd_qty`, `sd_price`, `sd_disc_percent`, `sd_disc_value`, `sd_total`) VALUES
	(4, 1, 554, 1, 20000, 0, 0.00, 20000.00),
	(5, 1, 191, 50, 20000, 0, 0.00, 1000000.00),
	(6, 1, 174, 50, 20000, 0, 0.00, 1000000.00),
	(7, 1, 189, 10, 20000, 0, 0.00, 190000.00),
	(8, 1, 531, 1, 250000, 0, 0.00, 250000.00),
	(9, 1, 406, 10, 12000, 0, 0.00, 120000.00),
	(10, 1, 406, 1, 12000, 0, 0.00, 12000.00),
	(11, 1, 554, 1, 20000, 0, 0.00, 20000.00),
	(12, 1, 531, 1, 250000, 0, 0.00, 250000.00),
	(12, 2, 554, 1, 20000, 0, 0.00, 20000.00),
	(13, 1, 190, 4, 20000, 0, 0.00, 80000.00),
	(14, 1, 191, 1, 20000, 0, 0.00, 20000.00),
	(15, 1, 190, 1, 20000, 0, 0.00, 20000.00),
	(16, 1, 554, 1, 20000, 0, 0.00, 20000.00),
	(17, 1, 554, 1, 20000, 0, 0.00, 20000.00),
	(18, 1, 406, 1, 12000, 0, 0.00, 12000.00),
	(19, 1, 531, 1, 250000, 0, 0.00, 250000.00),
	(20, 1, 382, 14, 20000, NULL, NULL, 280000.00),
	(21, 1, 539, 1, 20000, 0, 0.00, 20000.00),
	(22, 1, 281, 14, 20000, 0, 0.00, 280000.00),
	(23, 1, 281, 9, 20000, 0, 0.00, 180000.00);
/*!40000 ALTER TABLE `d_sales_dt` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_sales_payment
CREATE TABLE IF NOT EXISTS `d_sales_payment` (
  `sp_sales` int(11) NOT NULL,
  `sp_paymentid` tinyint(4) NOT NULL,
  `sp_method` tinyint(4) NOT NULL,
  `sp_nominal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`sp_sales`,`sp_paymentid`),
  CONSTRAINT `FK1_sales_payment` FOREIGN KEY (`sp_sales`) REFERENCES `d_sales` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_sales_payment: ~11 rows (approximately)
DELETE FROM `d_sales_payment`;
/*!40000 ALTER TABLE `d_sales_payment` DISABLE KEYS */;
INSERT INTO `d_sales_payment` (`sp_sales`, `sp_paymentid`, `sp_method`, `sp_nominal`) VALUES
	(4, 1, 1, 0.00),
	(5, 1, 1, 0.00),
	(6, 1, 1, 0.00),
	(7, 1, 1, 0.00),
	(12, 1, 1, 0.00),
	(13, 1, 1, 0.00),
	(16, 1, 1, 0.00),
	(19, 1, 1, 0.00),
	(21, 1, 1, 0.00),
	(22, 1, 1, 0.00),
	(23, 1, 1, 0.00);
/*!40000 ALTER TABLE `d_sales_payment` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_spk
CREATE TABLE IF NOT EXISTS `d_spk` (
  `spk_id` int(11) NOT NULL,
  `spk_ref` int(11) DEFAULT NULL COMMENT 'id_panning',
  `spk_code` varchar(20) DEFAULT NULL,
  `spk_date` date DEFAULT NULL,
  `spk_item` int(11) DEFAULT NULL,
  `spk_status` varchar(2) DEFAULT NULL,
  `spk_insert` datetime DEFAULT NULL,
  `spk_update` datetime DEFAULT NULL,
  PRIMARY KEY (`spk_id`),
  KEY `FK_d_spk_d_productplan` (`spk_ref`),
  CONSTRAINT `FK_d_spk_d_productplan` FOREIGN KEY (`spk_ref`) REFERENCES `d_productplan` (`pp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_spk: ~3 rows (approximately)
DELETE FROM `d_spk`;
/*!40000 ALTER TABLE `d_spk` DISABLE KEYS */;
INSERT INTO `d_spk` (`spk_id`, `spk_ref`, `spk_code`, `spk_date`, `spk_item`, `spk_status`, `spk_insert`, `spk_update`) VALUES
	(1, 8, 'SPK1804131', '2018-04-12', 247, 'D', '2018-04-13 08:42:49', '2018-04-13 08:42:49'),
	(2, 9, 'SPK1804132', '2018-05-12', 247, 'D', '2018-04-13 08:42:49', '2018-04-13 08:42:49'),
	(3, 6, 'SPK1804173', '2018-04-12', 172, 'D', '2018-04-17 05:44:19', '2018-04-17 05:44:19');
/*!40000 ALTER TABLE `d_spk` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_stock
CREATE TABLE IF NOT EXISTS `d_stock` (
  `s_id` bigint(20) NOT NULL,
  `s_comp` int(11) NOT NULL COMMENT '1: G. Bahan Baku | 2:G.Produksi |3: G.Grosir | 11: G. Retail',
  `s_position` int(11) NOT NULL COMMENT '1: G. Bahan Baku | 2:G.Produksi |3: G.Grosir | 11: G. Retail',
  `s_item` int(11) DEFAULT NULL,
  `s_qty` int(11) DEFAULT NULL,
  `s_insert` timestamp NULL DEFAULT NULL,
  `s_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`s_id`),
  KEY `FK_d_stock_m_stock` (`s_comp`),
  KEY `FK_d_stock_m_stock_2` (`s_position`),
  CONSTRAINT `FK_d_stock_m_stock` FOREIGN KEY (`s_comp`) REFERENCES `m_stock` (`v`),
  CONSTRAINT `FK_d_stock_m_stock_2` FOREIGN KEY (`s_position`) REFERENCES `m_stock` (`v`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_stock: ~5 rows (approximately)
DELETE FROM `d_stock`;
/*!40000 ALTER TABLE `d_stock` DISABLE KEYS */;
INSERT INTO `d_stock` (`s_id`, `s_comp`, `s_position`, `s_item`, `s_qty`, `s_insert`, `s_update`) VALUES
	(1, 11, 11, 189, 40, '2018-03-15 00:57:01', '2018-04-22 17:17:11'),
	(2, 11, 11, 190, 50, '2018-03-15 00:58:43', '2018-04-22 18:44:50'),
	(3, 11, 11, 191, 30, '2018-03-15 01:01:07', '2018-03-25 23:33:04'),
	(5, 11, 11, 193, 50, '2018-03-15 01:01:09', '2018-03-25 23:30:55'),
	(6, 2, 2, 172, 50, '2018-03-15 01:04:23', '2018-04-12 14:16:40'),
	(7, 2, 2, 247, 30, '2018-03-15 01:04:24', '2018-04-12 14:16:45'),
	(8, 3, 3, 191, -10, '2018-03-15 01:04:25', '2018-04-20 21:53:34'),
	(10, 3, 3, 193, 50, '2018-03-15 01:04:27', '2018-03-25 23:31:07'),
	(11, 11, 3, 190, 6, '2018-04-08 13:08:30', '2018-04-09 04:07:18'),
	(12, 3, 3, 531, 17, '2018-04-11 00:00:00', '2018-04-23 15:26:51'),
	(13, 3, 3, 554, 98, '2018-04-11 00:00:00', '2018-04-22 18:55:00'),
	(14, 3, 3, 406, 100, '2018-04-11 00:00:00', '2018-04-11 14:18:17'),
	(15, 3, 3, 539, 99, '2018-04-11 00:00:00', '2018-04-26 10:38:35'),
	(16, 3, 3, 408, 10, '2018-04-11 00:00:00', '2018-04-11 14:29:56'),
	(17, 3, 3, 538, 270, '2018-04-11 00:00:00', '2018-04-11 14:31:26'),
	(18, 3, 3, 355, 100, '2018-04-11 00:00:00', '2018-04-11 14:34:07'),
	(19, 3, 3, 476, 80, '2018-04-11 00:00:00', '2018-04-11 14:36:42'),
	(20, 11, 11, 474, 80, '2018-04-11 00:00:00', '2018-04-11 15:17:44'),
	(21, 11, 3, 176, 2, '2018-04-17 11:15:21', '2018-04-17 11:34:02'),
	(22, 11, 11, 176, 3, '2018-04-17 11:34:02', '2018-04-17 11:34:02'),
	(23, 3, 3, 566, 33, '2018-04-20 00:00:00', '2018-04-20 21:52:13'),
	(24, 3, 3, 281, 7, '2018-04-20 00:00:00', '2018-04-26 10:50:33'),
	(25, 3, 3, 174, -20, '2018-04-20 00:00:00', '2018-04-20 21:57:58'),
	(26, 3, 3, 382, 30, '2018-04-20 21:56:24', '2018-04-20 21:56:32');
/*!40000 ALTER TABLE `d_stock` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_stock_mutation
CREATE TABLE IF NOT EXISTS `d_stock_mutation` (
  `sm_stock` bigint(20) NOT NULL,
  `sm_detailid` tinyint(4) NOT NULL,
  `sm_date` datetime DEFAULT NULL,
  `sm_comp` varchar(2) DEFAULT NULL COMMENT '1: G. Bahan Baku | 2:G.Produksi |3: G.Grosir | 11: G. Retail',
  `sm_mutcat` tinyint(4) DEFAULT NULL,
  `sm_item` int(11) DEFAULT NULL,
  `sm_qty` decimal(10,2) DEFAULT NULL,
  `sm_qty_used` decimal(10,2) DEFAULT NULL,
  `sm_qty_expired` decimal(10,2) DEFAULT NULL,
  `sm_detail` varchar(255) DEFAULT NULL,
  `sm_price` float DEFAULT NULL,
  `sm_reff` int(11) DEFAULT NULL,
  `sm_insert` datetime DEFAULT NULL,
  `sm_update` datetime DEFAULT NULL,
  PRIMARY KEY (`sm_stock`,`sm_detailid`),
  KEY `sm_mutcat` (`sm_mutcat`),
  CONSTRAINT `FK_d_stock_mutation_d_stock_mutcat` FOREIGN KEY (`sm_mutcat`) REFERENCES `d_stock_mutcat` (`smc_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_stock` FOREIGN KEY (`sm_stock`) REFERENCES `d_stock` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table bisnis_tamma.d_stock_mutation: ~10 rows (approximately)
DELETE FROM `d_stock_mutation`;
/*!40000 ALTER TABLE `d_stock_mutation` DISABLE KEYS */;
INSERT INTO `d_stock_mutation` (`sm_stock`, `sm_detailid`, `sm_date`, `sm_comp`, `sm_mutcat`, `sm_item`, `sm_qty`, `sm_qty_used`, `sm_qty_expired`, `sm_detail`, `sm_price`, `sm_reff`, `sm_insert`, `sm_update`) VALUES
	(14, 1, '2018-04-11 00:00:00', '3', 16, 406, 100.00, 0.00, 0.00, 'xnkasn csjcn jk', 12000, 0, '2018-04-11 00:00:00', NULL),
	(15, 2, '2018-04-11 00:00:00', '3', 16, 539, 100.00, 0.00, 0.00, 'nsjwkm', 20000, 0, '2018-04-11 00:00:00', NULL),
	(16, 3, '2018-04-11 00:00:00', '3', 16, 408, 10.00, 0.00, 0.00, 'ncjnec ecnwein', 15600, 0, '2018-04-11 00:00:00', NULL),
	(17, 4, '2018-04-11 00:00:00', '3', 16, 538, 270.00, 0.00, 0.00, 'nbjcbw cewnc', 12800, 0, '2018-04-11 00:00:00', NULL),
	(18, 5, '2018-04-11 00:00:00', '3', 16, 355, 100.00, 0.00, 0.00, 'hduiewhnf ewfn', 28000, 0, '2018-04-11 00:00:00', NULL),
	(19, 6, '2018-04-11 00:00:00', '3', 16, 476, 80.00, 0.00, 0.00, 'b hb jbj', 20000, 0, '2018-04-11 00:00:00', NULL),
	(20, 7, '2018-04-11 00:00:00', '11', 16, 474, 80.00, 0.00, 0.00, 'niknk njknkjn', 45000, 0, '2018-04-11 00:00:00', NULL),
	(23, 8, '2018-04-20 00:00:00', '3', 16, 566, 33.00, 0.00, 0.00, NULL, 20000, 0, '2018-04-20 00:00:00', NULL),
	(24, 9, '2018-04-20 00:00:00', '3', 16, 281, 30.00, 0.00, 0.00, NULL, 20000, 0, '2018-04-20 00:00:00', NULL),
	(25, 10, '2018-04-20 00:00:00', '3', 16, 174, 30.00, 0.00, 0.00, NULL, 20000, 0, '2018-04-20 00:00:00', NULL);
/*!40000 ALTER TABLE `d_stock_mutation` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_stock_mutcat
CREATE TABLE IF NOT EXISTS `d_stock_mutcat` (
  `smc_id` tinyint(4) NOT NULL,
  `smc_note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`smc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_stock_mutcat: ~10 rows (approximately)
DELETE FROM `d_stock_mutcat`;
/*!40000 ALTER TABLE `d_stock_mutcat` DISABLE KEYS */;
INSERT INTO `d_stock_mutcat` (`smc_id`, `smc_note`) VALUES
	(1, 'penjualan'),
	(2, 'Penggunaan Bahan Baku'),
	(3, 'Hasil Produksi'),
	(11, 'Bahan Baku Rusak'),
	(12, 'Bahan Baku Hilang'),
	(13, 'menambah opname '),
	(14, 'mengurangi opname '),
	(15, 'barang expired'),
	(16, 'penambahan stock'),
	(17, 'pengurangan stock');
/*!40000 ALTER TABLE `d_stock_mutcat` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_supplier
CREATE TABLE IF NOT EXISTS `d_supplier` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_company` varchar(100) DEFAULT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `s_address` varchar(100) DEFAULT NULL,
  `s_phone` varchar(50) DEFAULT NULL,
  `s_fax` varchar(50) DEFAULT NULL,
  `s_note` text,
  `s_insert` timestamp NULL DEFAULT NULL,
  `s_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_limit` float DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_supplier: ~0 rows (approximately)
DELETE FROM `d_supplier`;
/*!40000 ALTER TABLE `d_supplier` DISABLE KEYS */;
INSERT INTO `d_supplier` (`s_id`, `s_company`, `s_name`, `s_address`, `s_phone`, `s_fax`, `s_note`, `s_insert`, `s_update`, `s_limit`) VALUES
	(20, 'Dealer Honda', 'Supadi', 'Sumberejo Bojonegoro', '089765345678', '1234', NULL, NULL, '2018-03-23 10:47:10', 100);
/*!40000 ALTER TABLE `d_supplier` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_transferitem
CREATE TABLE IF NOT EXISTS `d_transferitem` (
  `ti_id` int(11) NOT NULL AUTO_INCREMENT,
  `ti_time` datetime DEFAULT NULL,
  `ti_code` varchar(20) DEFAULT NULL,
  `ti_order` varchar(2) NOT NULL COMMENT 'RT: Retail | GR: Grosir',
  `ti_orderstaff` int(10) DEFAULT NULL COMMENT 'TEMPORARY DIABAIKAN',
  `ti_note` varchar(100) DEFAULT NULL,
  `ti_isapproved` enum('Y','N') NOT NULL DEFAULT 'N',
  `ti_issent` enum('Y','N') NOT NULL DEFAULT 'N',
  `ti_isreceived` enum('Y','N') NOT NULL DEFAULT 'N',
  `ti_insert` timestamp NULL DEFAULT NULL,
  `ti_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_transferitem: ~1 rows (approximately)
DELETE FROM `d_transferitem`;
/*!40000 ALTER TABLE `d_transferitem` DISABLE KEYS */;
INSERT INTO `d_transferitem` (`ti_id`, `ti_time`, `ti_code`, `ti_order`, `ti_orderstaff`, `ti_note`, `ti_isapproved`, `ti_issent`, `ti_isreceived`, `ti_insert`, `ti_update`) VALUES
	(1, '2018-04-17 00:00:00', 'REQ1804171', 'RT', NULL, 'js', 'Y', 'Y', 'Y', '2018-04-17 10:15:07', '2018-04-17 11:34:02');
/*!40000 ALTER TABLE `d_transferitem` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.d_transferitem_dt
CREATE TABLE IF NOT EXISTS `d_transferitem_dt` (
  `tidt_id` int(11) NOT NULL,
  `tidt_detail` tinyint(4) NOT NULL,
  `tidt_item` int(11) DEFAULT NULL,
  `tidt_qty` decimal(10,0) DEFAULT NULL,
  `tidt_qty_appr` decimal(10,0) DEFAULT NULL,
  `tidt_apprtime` datetime DEFAULT NULL,
  `tidt_apprstaff` int(10) DEFAULT NULL COMMENT 'TEMPORARY DIABAIKAN',
  `tidt_qty_send` decimal(10,0) DEFAULT NULL,
  `tidt_sendtime` datetime DEFAULT NULL,
  `tidt_sendstaff` int(10) DEFAULT NULL COMMENT 'TEMPORARY DIABAIKAN',
  `tidt_qty_received` decimal(10,0) DEFAULT NULL,
  `tidt_receivedtime` datetime DEFAULT NULL,
  `tidt_receivedstaff` int(10) DEFAULT NULL COMMENT 'TEMPORARY DIABAIKAN',
  PRIMARY KEY (`tidt_id`,`tidt_detail`),
  CONSTRAINT `FK_d_request_dt_d_request_item` FOREIGN KEY (`tidt_id`) REFERENCES `d_transferitem` (`ti_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_transferitem_dt: ~1 rows (approximately)
DELETE FROM `d_transferitem_dt`;
/*!40000 ALTER TABLE `d_transferitem_dt` DISABLE KEYS */;
INSERT INTO `d_transferitem_dt` (`tidt_id`, `tidt_detail`, `tidt_item`, `tidt_qty`, `tidt_qty_appr`, `tidt_apprtime`, `tidt_apprstaff`, `tidt_qty_send`, `tidt_sendtime`, `tidt_sendstaff`, `tidt_qty_received`, `tidt_receivedtime`, `tidt_receivedstaff`) VALUES
	(1, 1, 176, 56, 5, '2018-04-17 11:28:55', NULL, 5, '2018-04-17 11:28:55', NULL, 3, '2018-04-17 11:34:02', NULL);
/*!40000 ALTER TABLE `d_transferitem_dt` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.migrations: 110 rows
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_customer
CREATE TABLE IF NOT EXISTS `m_customer` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `c_birthday` date DEFAULT NULL,
  `c_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_hp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_address` text COLLATE utf8_unicode_ci,
  `c_type` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'RT: Retail | GR: Grosir',
  `c_insert` timestamp NULL DEFAULT NULL,
  `c_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_code` (`c_code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.m_customer: ~6 rows (approximately)
DELETE FROM `m_customer`;
/*!40000 ALTER TABLE `m_customer` DISABLE KEYS */;
INSERT INTO `m_customer` (`c_id`, `c_code`, `c_name`, `c_birthday`, `c_email`, `c_hp`, `c_address`, `c_type`, `c_insert`, `c_update`) VALUES
	(1, 'CUS0318/C001/001', 'mahmud', '0000-00-00', 'mahmudbojonegoro1@gmail.com', '085737373737', 'Bojonegoro', '', NULL, '2018-03-26 15:54:01'),
	(2, 'CUS0318/C001/002', 'bian', '0000-00-00', 'bian@gmail.com', '085743434343', 'Bojonegoro', '', NULL, '2018-03-26 15:54:01'),
	(3, 'CUS0318/C001/003', 'budi', '0000-00-00', 'budi@gmail.com', '081282828282', 'Lamongan', '', NULL, '2018-03-26 15:54:01'),
	(4, 'CUS0318/C001/004', 'akmal', '0000-00-00', 'akmal@gmail.com', '085732323232', 'Gresik', '', NULL, '2018-03-26 15:54:01'),
	(5, 'CUS0418/C001/005', 'masuk', NULL, NULL, '4343434434', NULL, 'RT', '2018-04-22 11:41:20', '2018-04-22 18:41:20'),
	(6, 'CUS0418/C001/006', 'mahmud', '0000-00-00', NULL, '34343344', NULL, 'GR', '2018-04-22 11:54:45', '2018-04-22 18:54:45');
/*!40000 ALTER TABLE `m_customer` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_employee
CREATE TABLE IF NOT EXISTS `m_employee` (
  `e_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `e_nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_employee: ~0 rows (approximately)
DELETE FROM `m_employee`;
/*!40000 ALTER TABLE `m_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_employee` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_item
CREATE TABLE IF NOT EXISTS `m_item` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_code` varchar(12) NOT NULL,
  `i_type` varchar(5) DEFAULT NULL COMMENT 'BB: Bahan Baku | BP: Barang Produksi | BJ: Barang Jualan',
  `i_group` varchar(50) DEFAULT NULL,
  `i_name` varchar(50) DEFAULT NULL,
  `i_unit` varchar(50) DEFAULT NULL,
  `i_price` decimal(10,0) DEFAULT NULL COMMENT 'TEMPORARY, akan diganti dengan tabel harga',
  `i_insert` timestamp NULL DEFAULT NULL,
  `i_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`i_id`),
  UNIQUE KEY `i_kode` (`i_code`)
) ENGINE=InnoDB AUTO_INCREMENT=593 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_item: ~592 rows (approximately)
DELETE FROM `m_item`;
/*!40000 ALTER TABLE `m_item` DISABLE KEYS */;
INSERT INTO `m_item` (`i_id`, `i_code`, `i_type`, `i_group`, `i_name`, `i_unit`, `i_price`, `i_insert`, `i_update`) VALUES
	(1, '000000000001', 'BB', NULL, 'Carfosel', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(2, '000000000002', 'BB', NULL, 'Cold Storage', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(3, '000000000003', 'BB', NULL, 'TP', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(4, '000000000004', 'BB', NULL, 'Strawberry', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(5, '000000000005', 'BB', NULL, 'Bubuk Cabe', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(6, '000000000006', 'BB', NULL, 'Coklat Cacao Bendico Xd Xtra Dark 5 Kg', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(7, '000000000007', 'BB', NULL, 'Air', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(8, '000000000008', 'BB', NULL, 'Tepung Cakra', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(9, '000000000009', 'BB', NULL, 'Cabe', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(10, '000000000010', 'BB', NULL, 'Jagung', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(11, '000000000011', 'BB', NULL, 'Beras', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(12, '000000000012', 'BB', NULL, 'Tabung + Isi', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(13, '000000000013', 'BB', NULL, 'Bayam', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(14, '000000000014', 'BB', NULL, 'Racikan Burger', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(15, '000000000015', 'BB', NULL, 'Racikan Pita', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(16, '000000000016', 'BB', NULL, 'Tepung Jagung', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(17, '000000000017', 'BB', NULL, 'Empok Jagung ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(18, '000000000018', 'BB', NULL, 'Sttp( Pengenyal)', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(19, '000000000019', 'BB', NULL, 'Kenor', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(20, '000000000020', 'BB', NULL, 'Klem Selang', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(21, '000000000021', 'BB', NULL, 'Mayo Prochiz', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(22, '000000000022', 'BB', NULL, 'Origano', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(23, '000000000023', 'BB', NULL, 'Ampok', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(24, '000000000024', 'BB', NULL, 'Palmia', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(25, '000000000025', 'BB', NULL, 'Amanda', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(26, '000000000026', 'BB', NULL, 'Duren', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(27, '000000000027', 'BB', NULL, 'Essen Durian', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(28, '000000000028', 'BB', NULL, 'Knor', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(29, '000000000029', 'BB', NULL, 'Tortilla Besar Ungu ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(30, '000000000030', 'BB', NULL, 'Bubuk Lada Putih', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(31, '000000000031', 'BB', NULL, 'Daging Ayam 2Kg Sahara', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(32, '000000000032', 'BB', NULL, 'Loyang Kecil', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(33, '000000000033', 'BB', NULL, 'Jirigen ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(34, '000000001', 'BB', NULL, 'Bb', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(35, '000000002', 'BB', NULL, 'Bawang Merah', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(36, '000000003', 'BB', NULL, 'Bawang Putih', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(37, '000000004', 'BB', NULL, 'By', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(38, '000000005', 'BB', NULL, 'Cs', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(39, '000000006', 'BB', NULL, 'Gr', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(40, '000000007', 'BB', NULL, 'Gl', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(41, '000000008', 'BB', NULL, 'Jh', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(42, '000000009', 'BB', NULL, 'Tk', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(43, '000000010', 'BB', NULL, 'Lemak', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(44, '000000011', 'BB', NULL, 'Tepung Maezena', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(45, '000000014', 'BB', NULL, 'Mny', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(46, '000000015', 'BB', NULL, 'Mt', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(47, '000000018', 'BB', NULL, 'Plastik Bungkus Mayonaisse', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(48, '000000019', 'BB', NULL, 'Plastik Bungkus Tb', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(49, '000000020', 'BB', NULL, 'Plastik Bungkus Tc', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(50, '000000021', 'BB', NULL, 'Plastik Bungkus Tm', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(51, '000000022', 'BB', NULL, 'Plastik Bungkus Ts', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(52, '000000023', 'BB', NULL, 'Kresek Jumbo', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(53, '000000024', 'BB', NULL, 'Kresek Tanggung', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(54, '000000025', 'BB', NULL, 'Plastik Pembatas Tb', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(55, '000000026', 'BB', NULL, 'Ry', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(56, '000000027', 'BB', NULL, 'Sp', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(57, '000000028', 'BB', NULL, 'Tl', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(58, '000000029', 'BB', NULL, 'Ts', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(59, '000000030', 'BB', NULL, 'Tc', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(60, '000000031', 'BB', NULL, 'Wj', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(61, '000000032', 'BB', NULL, 'K', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(62, '000000033', 'BB', NULL, 'P', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(63, '000000034', 'BB', NULL, 'LPG', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(64, '000000035', 'BB', NULL, 'Plastik Pembatas Ts', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(65, '000000036', 'BB', NULL, 'Plastik Pembatas Tm', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(66, '000000037', 'BB', NULL, 'Plastik Pembatas Tj', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(67, '000000038', 'BB', NULL, 'Plastik Burger Besar', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(68, '000000039', 'BB', NULL, 'Plastik Burger Kecil', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(69, '000000040', 'BB', NULL, 'Sk (48 Kaleng Kecil, 24 Kaleng Besar)', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(70, '000000041', 'BB', NULL, 'Plastik Pres Besar', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(71, '000000042', 'BB', NULL, 'Plastik Pres Sedang', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(72, '000000043', 'BB', NULL, 'Plastik Pres Kecil', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(73, '000000044', 'BB', NULL, 'Dg', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(74, '000000045', 'BB', NULL, 'Galon', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(75, '000000046', 'BB', NULL, 'BBQ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(76, '000000047', 'BB', NULL, 'CP', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(77, '000000048', 'BB', NULL, 'CO', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(78, '000000049', 'BB', NULL, 'R', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(79, '000000050', 'BB', NULL, 'Vit', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(80, '000000052', 'BB', NULL, 'PL', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(81, '000000054', 'BB', NULL, 'Mrc', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(82, '000000059', 'BB', NULL, 'Ay', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(83, '000000063', 'BB', NULL, 'Tali Rafia', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(84, '000000066', 'BB', NULL, 'Bahan Saos Sambal', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(85, '000000067', 'BB', NULL, 'Bahan Saos Tomat', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(86, '000000068', 'BB', NULL, 'Ktm', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(87, '000000069', 'BB', NULL, 'TR', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(88, '000000070', 'BB', NULL, 'Olesan', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(89, '000000071', 'BB', NULL, 'Warna', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(90, '000000072', 'BB', NULL, 'Mayo Ladyschoice', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(91, '000000073', 'BB', NULL, 'Mayo Best Food', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(92, '000000074', 'BB', NULL, 'Soya Protein/Tvp', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(93, '000000075', 'BB', NULL, 'T', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(94, '000000076', 'BB', NULL, 'F', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(95, '000000077', 'BB', NULL, 'Is', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(96, '000000078', 'BB', NULL, 'C Powder', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(97, '000000080', 'BB', NULL, 'Calcium Propionate', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(98, '000000081', 'BB', NULL, 'Plastik Gudang', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(99, '000000082', 'BB', NULL, 'BHT', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(100, '000000083', 'BB', NULL, 'Susu Bubuk', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(101, '000000084', 'BB', NULL, 'Bumbu Tortilla Kuning ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(102, '000000085', 'BB', NULL, 'Indomilk Bubuk', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(103, '000000086', 'BB', NULL, 'Butter', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(104, '000000087', 'BB', NULL, 'Baking Powder', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(105, '000000088', 'BB', NULL, 'Milky Premium', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(106, '000000089', 'BB', NULL, 'Softener', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(107, '000000090', 'BB', NULL, 'Milky Perfecto', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(108, '000000091', 'BB', NULL, 'Butter Maxi', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(109, '000000092', 'BB', NULL, 'Mayo', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(110, '000000093', 'BB', NULL, 'Merica Hitam Bubuk', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(111, '000000094', 'BB', NULL, 'Kuning Telor Bubuk', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(112, '000000095', 'BB', NULL, 'Pewarna Kuning', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(113, '000000096', 'BB', NULL, 'Tepung Gandum', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(114, '000000097', 'BB', NULL, 'Mayo Prochiz', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(115, '000000098', 'BB', NULL, 'Mny Kemasan', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(116, '000000099', 'BB', NULL, 'Gandum', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(117, '000000100', 'BB', NULL, 'Butter Bolion', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(118, '000000101', 'BB', NULL, 'Fc Besco', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(119, '000000102', 'BB', NULL, 'Pewarna Hitam', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(120, '000000103', 'BB', NULL, 'Bosco Hijau', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(121, '000000104', 'BB', NULL, 'Milky Booster', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(122, '000000105', 'BB', NULL, 'Vat25', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(123, '000000106', 'BB', NULL, 'Royco (576X10Gr)', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(124, '000000107', 'BB', NULL, 'Pewarna Coklat Tua', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(125, '000000108', 'BB', NULL, 'Pewarna Kuning Tua', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(126, '000000109', 'BB', NULL, 'Pewarna Hijau Tua', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(127, '000000110', 'BB', NULL, 'Pewarna Merah Tua', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(128, '000000111', 'BB', NULL, 'PM', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(129, '000000112', 'BB', NULL, 'Merica Hitam', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(130, '000000113', 'BB', NULL, 'Keju', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(131, '000000114', 'BB', NULL, 'Black Pepper', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(132, '000000115', 'BB', NULL, 'Milk QQ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(133, '000000116', 'BB', NULL, 'Bubuk Kare', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(134, '000000117', 'BB', NULL, 'Bubuk Coklat', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(135, '000000118', 'BB', NULL, 'Perasa Strawberry', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(136, '000003000001', 'BB', NULL, 'Stiker Kebab Reguler', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(137, '000003000002', 'BB', NULL, 'Stiker Kebab Premium ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(138, '000003000003', 'BB', NULL, 'Stiker Keba Premium Dan Reguler ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(139, '000003000004', 'BB', NULL, 'Plastik Besar 2M', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(140, '000003000005', 'BB', NULL, 'Plastik Pembungkus Kemfood TB', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(141, '000003000006', 'BB', NULL, 'Plastik Pembungkus Kemfood TM', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(142, '000003000007', 'BB', NULL, 'Plastik Bungkus TB @ Kemfood', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(143, '000003000008', 'BB', NULL, 'P', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(144, '000003000009', 'BB', NULL, 'Plastik Bungkus TM @ Kemfood', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(145, '000003000010', 'BB', NULL, 'Control Card Maryam Ori', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(146, '000003000011', 'BB', NULL, 'Control Card TS', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(147, '000003000012', 'BB', NULL, 'Control Card TB', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(148, '000003000013', 'BB', NULL, 'Control Card TC', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(149, '000003000014', 'BB', NULL, 'Koran', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(150, '000003000015', 'BB', NULL, 'Packaging Kebab Sohib', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(151, '000008000001', 'BB', NULL, 'Mayo Boy', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(152, '000009000001', 'BB', NULL, 'Kompor ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(153, '000009000002', 'BB', NULL, 'Regulator', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(154, '000009000003', 'BB', NULL, 'Selang ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(155, '000009000004', 'BB', NULL, 'Tepak ', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(156, '000009000005', 'BB', NULL, 'Ember Putih', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(157, '000009000006', 'BB', NULL, 'Tutup Ember Putih', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(158, '000009000007', 'BB', NULL, 'Knop Kompor', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(159, '003000009', 'BB', NULL, 'Lakban', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(160, '003000010', 'BB', NULL, 'Dos Kecil', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(161, '003000012', 'BB', NULL, 'Dos Besar', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(162, '003000013', 'BB', NULL, 'Kresek Kecil', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(163, '003000014', 'BB', NULL, 'Plastik Bungkus T.Jumbo', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(164, '003000015', 'BB', NULL, 'Plastik Pembatas T.Jumbo', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(165, '003000016', 'BB', NULL, 'Plastik Tepung', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(166, '003000017', 'BB', NULL, 'Dos Styrofoam', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(167, '003000018', 'BB', NULL, 'Packing Kayu', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(168, '003000019', 'BB', NULL, 'Control Card', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(169, '003000020', 'BB', NULL, 'Plastik Bumbu 3 Kg', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(170, '003000021', 'BB', NULL, 'Kresek Sampah', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(171, '003000023', 'BB', NULL, 'Kresek Besar', NULL, 20000, '2018-03-14 14:14:53', '2018-03-14 14:14:53'),
	(172, '000004000001', 'BP', 'ROTI', 'Roti Burger Bun Mini', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(173, '000005000001', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Ungu', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(174, '000005000002', 'BP', 'KULIT KEBAB', 'Tortilla Mini Ungu', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(175, '000005000003', 'BP', 'KULIT KEBAB', 'Tortilla Mini Durian', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(176, '000005000004', 'BP', 'KULIT KEBAB', 'Tortilla Mini Premium', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(177, '000005000005', 'BP', 'KULIT KEBAB', 'Tortilla Besar Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(178, '000005000006', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(179, '000005000007', 'BP', 'KULIT KEBAB', 'Tortilla Mini Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(180, '000005000008', 'BP', 'KULIT KEBAB', 'Tortilla Catering Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(181, '000006000001', 'BJ', 'DAGING', 'Beef Grill', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(182, '000006000002', 'BJ', 'DAGING', 'Daging Kebab Sapi 2 Kg@ KEMFOOD', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(183, '000011000001', 'BJ', 'BARANG DAGANGAN', 'Kompor Electric', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(184, '000011000002', 'BJ', 'BARANG DAGANGAN', 'Cepitan Serving Tong', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(185, '000011000003', 'BJ', 'BARANG DAGANGAN', 'Spatula(Sotel)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(186, '000011000004', 'BJ', 'BARANG DAGANGAN', 'Beef Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(187, '000011000005', 'BJ', 'BARANG DAGANGAN', 'Kompor Listrik', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(188, '000011000006', 'BJ', 'BARANG DAGANGAN', 'Capi', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(189, '000011000007', 'BJ', 'BARANG DAGANGAN', 'Maryam Jumbo', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(190, '000011000008', 'BJ', 'BARANG DAGANGAN', 'Kebab Ayam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(191, '000011000009', 'BJ', 'BARANG DAGANGAN', 'Burner Mata 2', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(192, '000011000010', 'BJ', 'BARANG DAGANGAN', 'Burner Otomatis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(193, '000011000011', 'BJ', 'BARANG DAGANGAN', 'Nepel', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(194, '000011000012', 'BJ', 'BARANG DAGANGAN', 'Loyang Besar', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(195, '000011000013', 'BJ', 'BARANG DAGANGAN', 'Tempat Daging', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(196, '000011000015', 'BP', 'BARANG PRODUKSI', 'Kriwilan Produksi', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(197, '000011000016', 'BJ', 'BARANG DAGANGAN', 'Daging Othman Turkish Food 2 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(198, '000011000017', 'BJ', 'BARANG DAGANGAN', 'Daging Othman Turkish Food 2 Kg Tnp Tiang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(199, '000011000018', 'BJ', 'BARANG DAGANGAN', 'Daging Othman Turkis Food 4Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(200, '000011000019', 'BJ', 'BARANG DAGANGAN', 'Wajan Tortilla Jumbo (36)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(201, '000011000021', 'BJ', 'BARANG DAGANGAN', 'Asahan', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(202, '000011000022', 'BJ', 'BARANG DAGANGAN', 'Pewarna Ungu', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(203, '000011000023', 'BP', 'BARANG DAGANGAN', 'Kriwilan Plain', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(204, '000011000024', 'BP', 'BARANG DAGANGAN', 'Kriwilan Keju', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(205, '000011000025', 'BP', 'BARANG DAGANGAN', 'Kriwilan Bayam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(206, '000011000026', 'BP', 'BARANG DAGANGAN', 'Kriwilan Blackpaper', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(207, '000011000027', 'BP', 'BARANG DAGANGAN', 'Kriwilan Gandu ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(208, '000011000028', 'BP', 'BARANG DAGANGAN', 'Kriwilan Hitam Manis ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(209, '000011000029', 'BP', 'BARANG DAGANGAN', 'Kriwilan Cabe ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(210, '000011000030', 'BP', 'BARANG DAGANGAN', 'Kriwilan Strawberry ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(211, '000011000031', 'BP', 'BARANG DAGANGAN', 'Kriwilan Coklat', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(212, '000011000032', 'BP', 'BARANG DAGANGAN', 'Kriwilan Jagung', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(213, '000011000033', 'BP', 'BARANG DAGANGAN', 'Kriwilan Bayam ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(214, '000011000034', 'BP', 'BARANG DAGANGAN', 'Kriwilan Super ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(215, '000011000035', 'BP', 'BARANG DAGANGAN', 'Kriwilan Manis ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(216, '000011000036', 'BP', 'BARANG DAGANGAN', 'Kriwilan Kare', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(217, '000011000037', 'BP', 'BARANG DAGANGAN', 'Kriwilan Black Papper ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(218, '000011000039', 'BJ', 'BARANG DAGANGAN', 'Empal Jamur 0,5Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(219, '000011000040', 'BJ', 'BARANG DAGANGAN', 'Empal Jamur 2Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(220, '000011000041', 'BJ', 'BARANG DAGANGAN', 'Saos Lada Hitam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(221, '000011000042', 'BJ', 'BARANG DAGANGAN', 'Saos  BBQ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(222, '000011000043', 'BJ', 'BARANG DAGANGAN', 'Koran', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(223, '000011000044', 'BJ', 'BARANG DAGANGAN', 'Saos Sambal Kokita ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(224, '000011000045', 'BJ', 'BARANG DAGANGAN', 'Saos Tomat Kokita', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(225, '000011000046', 'BJ', 'BARANG DAGANGAN', 'Packaging Kebab Distro', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(226, '000014000002', 'BJ', 'Makanan Frozen', 'Siomay', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(227, '003000001', 'BJ', 'ONGKOS KIRIM', 'Ongkos Kirim', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(228, '003000005', 'BJ', 'BARANG DAGANGAN', 'Styreofoam Besar', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(229, '003000006', 'BJ', 'BARANG DAGANGAN', 'Styreofoam Jumbo', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(230, '003000007', 'BJ', 'BARANG DAGANGAN', 'Styreofoam Kecil', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(231, '004000005', 'BP', 'ROTI', 'Roti Burger', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(232, '004000006', 'BP', 'ROTI', 'Roti Burger Double Wijen', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(233, '004000007', 'BP', 'ROTI', 'Roti Burger Mini', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(234, '004000008', 'BP', 'ROTI', 'Roti Burger Wijen', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(235, '004000009', 'BP', 'ROTI', 'Roti Burger Wijen Mini', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(236, '004000010', 'BP', 'ROTI', 'Roti Hot Dog Wijen', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(237, '004000011', 'BP', 'ROTI', 'Roti Pita', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(238, '004000012', 'BP', 'ROTI', 'Roti Pita Kantung', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(239, '004000017', 'BJ', 'BARANG DAGANGAN', 'Keju Sliece', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(240, '004000018', 'BP', 'ROTI', 'Roti Hotdog', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(241, '004000019', 'BP', 'ROTI', 'Roti Pita Jumbo', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(242, '005000007', 'BP', 'KULIT KEBAB', 'Gourmet', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(243, '005000010', 'BP', 'KULIT KEBAB', 'Maryam/Canai 80 Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(244, '005000011', 'BP', 'KULIT KEBAB', 'Maryam/Canai Diameter 21Cm', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(245, '005000012', 'BP', 'KULIT KEBAB', 'Tortilla Besar', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(246, '005000018', 'BP', 'KULIT KEBAB', 'Tortilla Catering', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(247, '005000019', 'BP', 'KULIT KEBAB', 'Tortilla Jasmin', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(248, '005000020', 'BP', 'KULIT KEBAB', 'Tortilla Jumbo', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(249, '005000021', 'BP', 'KULIT KEBAB', 'Tortilla Mini', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(250, '005000026', 'BP', 'KULIT KEBAB', 'Tortilla Sedang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(251, '005000033', 'BP', 'KULIT KEBAB', 'Tortilla Besar (Manis)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(252, '005000034', 'BP', 'KULIT KEBAB', 'Tortilla Sedang (Manis)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(253, '005000035', 'BP', 'KULIT KEBAB', 'Tortilla Mini (Manis)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(254, '005000036', 'BP', 'KULIT KEBAB', 'Tortilla Catering (Manis)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(255, '005000037', 'BP', 'KULIT KEBAB', 'Tortilla Jasmin (Manis)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(256, '005000038', 'BP', 'KULIT KEBAB', 'Tortilla Jumbo (Manis)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(257, '005000039', 'BP', 'KULIT KEBAB', 'Tortilla Besar L', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(258, '005000040', 'BP', 'KULIT KEBAB', 'Tortilla Jasmin L', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(259, '005000041', 'BP', 'KULIT KEBAB', 'Tortilla Mini L', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(260, '005000042', 'BP', 'KULIT KEBAB', 'Tortilla Besar Lentur', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(261, '005000043', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Lentur', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(262, '005000044', 'BP', 'KULIT KEBAB', 'Tortilla Mini Lentur', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(263, '005000045', 'BP', 'KULIT KEBAB', 'Tortilla Jumbo Lentur', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(264, '005000046', 'BP', 'KULIT KEBAB', 'Tortilla Besar Mina', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(265, '005000047', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Mina', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(266, '005000048', 'BP', 'KULIT KEBAB', 'Tortilla Mini Mina', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(267, '005000049', 'BP', 'KULIT KEBAB', 'Tortilla Catering Mina', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(268, '005000050', 'BP', 'KULIT KEBAB', 'Tortilla Besar Manis Premium', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(269, '005000051', 'BP', 'KULIT KEBAB', 'Tortilla Mini Manis Premium', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(270, '005000052', 'BP', 'KULIT KEBAB', 'Tortilla Besar Manis Perfecto', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(271, '005000053', 'BP', 'KULIT KEBAB', 'Tortilla Mini Manis Perfecto', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(272, '005000054', 'BP', 'KULIT KEBAB', 'Tortilla Catering Lentur', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(273, '005000055', 'BP', 'KULIT KEBAB', 'Tortilla Mini Cabe', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(274, '005000056', 'BP', 'KULIT KEBAB', 'Tortilla Mini Bayam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(275, '005000057', 'BP', 'KULIT KEBAB', 'Tortilla Mini Kare', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(276, '005000058', 'BP', 'KULIT KEBAB', 'Tortilla Mini Gandum', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(277, '005000059', 'BP', 'KULIT KEBAB', 'Tortilla Mini Jagung', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(278, '005000060', 'BP', 'KULIT KEBAB', 'Tortilla Rawon', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(279, '005000061', 'BP', 'KULIT KEBAB', 'Tortilla Asam Pedas', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(280, '005000062', 'BP', 'KULIT KEBAB', 'Tortilla Mini Keju', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(281, '005000063', 'BP', 'KULIT KEBAB', 'Tortilla Mini Stawberry', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(282, '005000064', 'BP', 'KULIT KEBAB', 'Tortilla Mini Merah', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(283, '005000065', 'BP', 'KULIT KEBAB', 'Tortilla Hitam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(284, '005000066', 'BP', 'KULIT KEBAB', 'Tortilla Besar Hitam Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(285, '005000067', 'BP', 'KULIT KEBAB', 'Tortilla Catering Merah', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(286, '005000068', 'BP', 'KULIT KEBAB', 'Tortilla Besar Merah', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(287, '005000069', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Merah', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(288, '005000070', 'BP', 'KULIT KEBAB', 'Tortilla Besar Hijau', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(289, '005000071', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Hijau', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(290, '005000072', 'BP', 'KULIT KEBAB', 'Tortilla Mini Hijau', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(291, '005000073', 'BP', 'KULIT KEBAB', 'Tortilla Catering Hijau', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(292, '005000074', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Hitam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(293, '005000075', 'BP', 'KULIT KEBAB', 'Tortilla Mini Hitam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(294, '005000076', 'BP', 'KULIT KEBAB', 'Tortilla Catering Hitam ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(295, '005000077', 'BP', 'KULIT KEBAB', 'Tortilla Mini Kuning', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(296, '005000078', 'BP', 'KULIT KEBAB', 'Tortilla Besar Hitam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(297, '005000079', 'BP', 'KULIT KEBAB', 'Tortilla Mini Coklat', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(298, '005000080', 'BP', 'KULIT KEBAB', 'Tortilla Mini White Pepper', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(299, '005000081', 'BP', 'KULIT KEBAB', 'Tortilla Mini Black Pepper', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(300, '005000082', 'BP', 'KULIT KEBAB', 'Tortilla Catering Kuning', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(301, '005000083', 'BP', 'KULIT KEBAB', 'Tortilla Mini Hitam Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(302, '005000084', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Gandum', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(303, '005000085', 'BP', 'KULIT KEBAB', 'Tortilla Besar Gandum', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(304, '005000086', 'BP', 'KULIT KEBAB', 'Tortilla Mini Merah Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(305, '005000087', 'BP', 'KULIT KEBAB', 'Tortilla Besar Kuning', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(306, '005000088', 'BP', 'KULIT KEBAB', 'Tortilla Mini Hijau Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(307, '005000089', 'BP', 'KULIT KEBAB', 'Tortilla Mini Kuning Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(308, '005000090', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Kuning', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(309, '005000091', 'BP', 'KULIT KEBAB', 'Tortilla Catering Hitam Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(310, '005000092', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Hitam Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(311, '005000093', 'BP', 'KULIT KEBAB', 'Tortilla Besar Hijau Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(312, '005000094', 'BP', 'KULIT KEBAB', 'Tortilla Besar Merah Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(313, '005000095', 'BP', 'KULIT KEBAB', 'Tortilla Besar Kuning Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(314, '005000096', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Merah Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(315, '005000097', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Hijau Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(316, '005000098', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Kuning Manis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(317, '005000099', 'BP', 'KULIT KEBAB', 'Tortilla Besar Coklat', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(318, '005000100', 'BP', 'KULIT KEBAB', 'Tortilla Sedang Jagung', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(319, '005000101', 'BP', 'KULIT KEBAB', 'Tortilla Besar @10', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(320, '005000102', 'BP', 'KULIT KEBAB', 'Tortilla Mini @10', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(321, '006000001', 'BJ', 'DAGING', 'Beef Burger Besar', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(322, '006000003', 'BJ', 'DAGING', 'Beef Burger Mini', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(323, '006000005', 'BJ', 'DAGING', 'Chiken Burger Besar', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(324, '006000006', 'BJ', 'DAGING', 'Chiken Burger Crispy', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(325, '006000007', 'BJ', 'DAGING', 'Chiken Burger Mini', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(326, '006000008', 'BJ', 'DAGING', 'Daging Kebab Ayam (2 Kg)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(327, '006000009', 'BJ', 'DAGING', 'Daging Kebab Sapi (2 Kg)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(328, '006000010', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 4 Kg @ Kemfood', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(329, '006000011', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 4 Kg Tamma Kw2', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(330, '006000012', 'BJ', 'BARANG DAGANGAN', 'Dry Ice', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(331, '006000013', 'BJ', 'DAGING', 'Grill Beef Oval', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(332, '006000014', 'BJ', 'DAGING', 'Grill Beef Squere', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(333, '006000015', 'BJ', 'DAGING', 'Grill Chiken Oval', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(334, '006000016', 'BJ', 'DAGING', 'Grill Chiken Square', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(335, '006000025', 'BJ', 'DAGING', 'Beef Burger Crispy', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(336, '006000026', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sahara 2Kg Tp.Tiang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(337, '006000027', 'BJ', 'DAGING', 'Daging Kebab Sapi 500Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(338, '006000028', 'BJ', 'DAGING', 'Daging Kebab Ayam 500Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(339, '006000029', 'BJ', 'DAGING', 'Daging Kebab Kambing 500Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(340, '006000030', 'BJ', 'DAGING', 'Daging Kebab Sapi 2Kg Sahara Premium', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(341, '006000031', 'BJ', 'DAGING', 'Mdn Premium Kemfood 4 Kg Dengan Tiang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(342, '006000032', 'BJ', 'DAGING', 'Mdn Reguler Kemfood 4 Kg Dengan Tiang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(343, '006000033', 'BJ', 'DAGING', 'Mdn Premium Kemfood 2 Kg Dengan Tiang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(344, '006000034', 'BJ', 'DAGING', 'Mdn Reguler Kemfood 2 Kg Tanpa Tiang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(345, '008000001', 'BJ', 'PRODUK CAIR', 'Mayonaise Orange', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(346, '008000002', 'BJ', 'PRODUK CAIR', 'Mayonaise @35', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(347, '008000003', 'BJ', 'PRODUK CAIR', 'Mayonaise Putih', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(348, '009000076', 'BJ', 'BAHAN BAKU BENGKEL', 'Kompor Kebab', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(349, '009000077', 'BJ', 'BAHAN BAKU BENGKEL', 'Kasa', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(350, '009000078', 'BJ', 'BARANG DAGANGAN', 'Keramik', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(351, '009000079', 'BJ', 'BAHAN BAKU BENGKEL', 'Chiken Besar Super', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(352, '011000001', 'BJ', 'BARANG DAGANGAN', 'Botol', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(353, '011000002', 'BJ', 'BARANG DAGANGAN', 'Botol Mayonaise', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(354, '011000003', 'BJ', 'BARANG DAGANGAN', 'Burner Mata 1', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(355, '011000010', 'BJ', 'BARANG DAGANGAN', 'Capitan', NULL, 28000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(356, '011000016', 'BJ', 'BARANG DAGANGAN', 'Packaging Burger 100Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(357, '011000017', 'BJ', 'BARANG DAGANGAN', 'Packaging Kebab 100Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(358, '011000018', 'BJ', 'BARANG DAGANGAN', 'Packaging Kebab Mini 100Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(359, '011000019', 'BJ', 'BARANG DAGANGAN', 'Packaging Pita Bread 100Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(360, '011000052', 'BJ', 'BARANG DAGANGAN', 'Kapi', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(361, '011000053', 'BJ', 'BARANG DAGANGAN', 'Bestfood Real', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(362, '011000055', 'BJ', 'BARANG DAGANGAN', 'Bestfood Mayo Magic', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(363, '011000056', 'BJ', 'BARANG DAGANGAN', 'Wajan 50Cm X50Cm', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(364, '011000058', 'BJ', 'BARANG DAGANGAN', 'Wajan 30Cm X 40Cm', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(365, '011000059', 'BJ', 'BARANG DAGANGAN', 'Wajan 30Cm X 40Cm (List)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(366, '011000060', 'BJ', 'BARANG DAGANGAN', 'Wajan 40Cm X 40Cm', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(367, '011000061', 'BJ', 'BARANG DAGANGAN', 'Wajan 40Cm X 40Cm (List)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(368, '011000062', 'BJ', 'BARANG DAGANGAN', 'Wajan 40Cm X 50Cm', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(369, '011000063', 'BJ', 'BARANG DAGANGAN', 'Wajan 40Cm X 50Cm (List)', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(370, '011000065', 'BJ', 'BARANG DAGANGAN', 'Maryam Super', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(371, '011000066', 'BJ', 'BARANG DAGANGAN', 'Burner Kecil', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(372, '011000067', 'BJ', 'BARANG DAGANGAN', 'Pisau @200', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(373, '011000068', 'BJ', 'BARANG DAGANGAN', 'Tortilla Besar H', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(374, '011000069', 'BJ', 'BARANG DAGANGAN', 'Tortilla Sedang H', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(375, '011000070', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 2 Kg @110', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(376, '011000071', 'BJ', 'BARANG DAGANGAN', 'Pisau @400', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(377, '011000072', 'BJ', 'BARANG DAGANGAN', 'Kran Burner', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(378, '011000073', 'BJ', 'BARANG DAGANGAN', 'Pisau ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(379, '011000074', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 2 Kg Tamma', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(380, '011000075', 'BJ', 'BARANG DAGANGAN', 'Saos Sambal', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(381, '011000076', 'BJ', 'BARANG DAGANGAN', 'Chiken Special', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(382, '011000077', 'BJ', 'BARANG DAGANGAN', 'Burner Besar Kw1', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(383, '011000078', 'BJ', 'BARANG DAGANGAN', 'Tiang Daging', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(384, '011000079', 'BJ', 'BARANG DAGANGAN', 'Daging 4 Kg Kw3', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(385, '011000080', 'BJ', 'BARANG DAGANGAN', 'Daging 2 Kg Kw3 ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(386, '011000081', 'BJ', 'BARANG DAGANGAN', 'Cone/Pizaa', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(387, '011000082', 'BJ', 'BARANG DAGANGAN', 'Burner Auto', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(388, '011000083', 'BJ', 'BARANG DAGANGAN', 'Sosis Sapi', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(389, '011000084', 'BJ', 'BARANG DAGANGAN', 'Sosis Ayam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(390, '011000085', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Kambing 4 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(391, '011000086', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Ayam 4 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(392, '011000087', 'BJ', 'BARANG DAGANGAN', 'Saos Tomat', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(393, '011000088', 'BJ', 'MINUMAN', 'Capucino Cincau', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(394, '011000089', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab 2 Kg Herbal', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(395, '011000090', 'BJ', 'BARANG DAGANGAN', 'Maryam Coklat', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(396, '011000091', 'BJ', 'BARANG DAGANGAN', 'Maryam Abon', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(397, '011000092', 'BJ', 'BARANG DAGANGAN', 'Maryam Original', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(398, '011000093', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 4 Kg Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(399, '011000094', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 2 Kg Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(400, '011000095', 'BJ', 'MINUMAN', 'Cappucino @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(401, '011000096', 'BJ', 'MINUMAN', 'Royal Chocolate @ 25Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(402, '011000097', 'BJ', 'MINUMAN', 'Vanilla @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(403, '011000098', 'BJ', 'MINUMAN', 'Bubble Gum B2 @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(404, '011000099', 'BJ', 'BARANG DAGANGAN', 'Ram Burner', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(405, '011000100', 'BJ', 'MINUMAN', 'Green Tea @ 25Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(406, '011000101', 'BJ', 'MINUMAN', 'Coffe Caramel @ 25Pcs', NULL, 12000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(407, '011000102', 'BJ', 'MINUMAN', 'Mochacino B2 @25Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(408, '011000103', 'BJ', 'MINUMAN', 'Choco Caramel B2 @25Pcs', NULL, 15600, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(409, '011000104', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab 4 Kg Herbal', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(410, '011000105', 'BJ', 'BARANG DAGANGAN', 'Rombong', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(411, '011000106', 'BJ', 'BARANG DAGANGAN', 'Roti Kid Burger', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(412, '011000107', 'BJ', 'BARANG DAGANGAN', 'Roti Kid Hotdog', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(413, '011000108', 'BJ', 'BARANG DAGANGAN', 'Roti Bun Polos', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(414, '011000109', 'BJ', 'BARANG DAGANGAN', 'Roti Burger Wijen @11.700', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(415, '011000110', 'BJ', 'BARANG DAGANGAN', 'Roti Burger Junior ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(416, '011000111', 'BJ', 'BARANG DAGANGAN', 'Roti Hotdog Polos', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(417, '011000112', 'BJ', 'BARANG DAGANGAN', 'Deli Beef Bratwust', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(418, '011000113', 'BJ', 'BARANG DAGANGAN', 'Ring Donat', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(419, '011000114', 'BJ', 'BARANG DAGANGAN', 'Pizza Salami', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(420, '011000115', 'BJ', 'BARANG DAGANGAN', 'Burger Sapi Mini', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(421, '011000116', 'BJ', 'BARANG DAGANGAN', 'Burger Ayam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(422, '011000117', 'BJ', 'BARANG DAGANGAN', 'Burger Sapi', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(423, '011000118', 'BJ', 'BARANG DAGANGAN', 'Sosis Sapi @63.100', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(424, '011000119', 'BJ', 'BARANG DAGANGAN', 'Burger Patties', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(425, '011000120', 'BJ', 'BARANG DAGANGAN', 'Burger Ayam Crispy', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(426, '011000121', 'BJ', 'BARANG DAGANGAN', 'Nagget Udang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(427, '011000122', 'BJ', 'BARANG DAGANGAN', 'Maryam Original Jumbo', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(428, '011000123', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab 2 Kg Sahara Tanpa Tiang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(429, '011000124', 'BJ', 'BARANG DAGANGAN', 'Sarangan Burner', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(430, '011000125', 'BJ', 'BARANG DAGANGAN', 'Packaging Kebab Dus', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(431, '011000126', 'BJ', 'BARANG DAGANGAN', 'Packaging Burger Dus', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(432, '011000127', 'BJ', 'BARANG DAGANGAN', 'Burner Besar Pematik', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(433, '011000128', 'BJ', 'BARANG DAGANGAN', 'Burner Kecil Pematik', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(434, '011000129', 'BJ', 'BARANG DAGANGAN', 'Maryam Mini Isi 10Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(435, '011000130', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 2 Kg Baru', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(436, '011000131', 'BJ', 'BARANG DAGANGAN', 'Beef Besar', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(437, '011000132', 'BJ', 'BARANG DAGANGAN', 'Chiken Besar', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(438, '011000133', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Ayam Special 4 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(439, '011000134', 'BJ', 'BARANG DAGANGAN', 'Packaging Kebab Indokebab', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(440, '011000135', 'BJ', 'BARANG DAGANGAN', 'Packaging Burger Indokebab', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(441, '011000136', 'BJ', 'BARANG DAGANGAN', 'Sosis Bakar Sapi', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(442, '011000137', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi Putih', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(443, '011000138', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi Merah', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(444, '011000139', 'BJ', 'BARANG DAGANGAN', 'Sosis Bakar Ayam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(445, '011000140', 'BJ', 'BARANG DAGANGAN', 'Bong Sisha', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(446, '011000141', 'BJ', 'BARANG DAGANGAN', 'Essennce Sisha', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(447, '011000142', 'BJ', 'BARANG DAGANGAN', 'Arang Sisha', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(448, '011000143', 'BJ', 'BARANG DAGANGAN', 'Sosis Bakar Sapi Blackpepper', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(449, '011000144', 'BJ', 'BARANG DAGANGAN', 'Sosis Bakar Sapi Cheese', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(450, '011000145', 'BJ', 'Makanan Frozen', 'Kebab Durian', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(451, '011000146', 'BJ', 'Makanan Frozen', 'Kebab Sapi Original', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(452, '011000147', 'BJ', 'Makanan Frozen', 'Kebab Ayam Teriyaki', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(453, '011000148', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sahara 4 Kg Premium', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(454, '011000149', 'BJ', 'BARANG DAGANGAN', 'Panggangan Sosis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(455, '011000150', 'BJ', 'BARANG DAGANGAN', 'Pisau Impor', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(456, '011000151', 'BJ', 'BARANG DAGANGAN', 'Saos Barbeque', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(457, '011000152', 'BJ', 'BARANG DAGANGAN', 'Kroket Sayur', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(458, '011000153', 'BJ', 'BARANG DAGANGAN', 'Pastel Daging', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(459, '011000154', 'BJ', 'BARANG DAGANGAN', 'Risoles', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(460, '011000155', 'BJ', 'BARANG DAGANGAN', 'Risoles Mayonaise', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(461, '011000156', 'BJ', 'BARANG DAGANGAN', 'Roll Corn', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(462, '011000157', 'BJ', 'BARANG DAGANGAN', 'Lemper Bakar Daging', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(463, '011000158', 'BJ', 'BARANG DAGANGAN', 'Martabak', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(464, '011000159', 'BJ', 'BARANG DAGANGAN', 'Tahu Bakso', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(465, '011000160', 'BJ', 'BARANG DAGANGAN', 'Sosis Solo', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(466, '011000161', 'BJ', 'BARANG DAGANGAN', 'Pastel Ayam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(467, '011000162', 'BJ', 'BARANG DAGANGAN', 'Lumpia Ayam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(468, '011000163', 'BJ', 'BARANG DAGANGAN', 'Sambosa', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(469, '011000164', 'BJ', 'BARANG DAGANGAN', 'Onde-Onde', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(470, '011000165', 'BJ', 'BARANG DAGANGAN', 'Donat Original', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(471, '011000166', 'BJ', 'BARANG DAGANGAN', 'Donat Isi Keju/ Coklat/Stawberry/Blueberry', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(472, '011000167', 'BJ', 'BARANG DAGANGAN', 'Lumpia Daging', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(473, '011000168', 'BJ', 'BARANG DAGANGAN', 'Lumpur Kentang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(474, '011000169', 'BJ', 'BARANG DAGANGAN', 'Brota Kacang', NULL, 45000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(475, '011000170', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 4 Kg Tamma Kw1', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(476, '011000171', 'BJ', 'BARANG DAGANGAN', 'American Dough Pizza', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(477, '011000172', 'BJ', 'BARANG DAGANGAN', 'Kentang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(478, '011000173', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 1 Kg Tammafood', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(479, '011000174', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 2 Kg Tnp Tiang Tammafood', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(480, '011000175', 'BJ', 'BARANG DAGANGAN', 'Beef Besar Super', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(481, '011000176', 'BJ', 'BARANG DAGANGAN', 'Lectus', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(482, '011000177', 'BJ', 'BARANG DAGANGAN', 'Chicken Besar Super', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(483, '011000178', 'BJ', 'BARANG DAGANGAN', 'Framelist', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(484, '011000179', 'BJ', 'BARANG DAGANGAN', 'Rumah Burner', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(485, '011000180', 'BJ', 'BARANG DAGANGAN', 'Pizza Mini', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(486, '011000181', 'BJ', 'BARANG DAGANGAN', 'Wajan 40Cm X 70Cm', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(487, '011000182', 'BJ', 'BARANG DAGANGAN', 'Grill Kotak 45Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(488, '011000183', 'BJ', 'BARANG DAGANGAN', 'Beef Bulat 60Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(489, '011000184', 'BJ', 'BARANG DAGANGAN', 'Beef Bulat 70Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(490, '011000185', 'BJ', 'BARANG DAGANGAN', 'Beef Kotak 90Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(491, '011000186', 'BJ', 'BARANG DAGANGAN', 'Chiken Grill  Bulat 60Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(492, '011000187', 'BJ', 'BARANG DAGANGAN', 'Bitterballen', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(493, '011000188', 'BJ', 'BARANG DAGANGAN', 'Roti Bun Wijen', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(494, '011000189', 'BJ', 'BARANG DAGANGAN', 'Roti Hotdog Wijen Mcd', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(495, '011000190', 'BJ', 'BARANG DAGANGAN', 'Panza Roti', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(496, '011000191', 'BJ', 'BARANG DAGANGAN', 'Grill Kotak 60Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(497, '011000192', 'BJ', 'BARANG DAGANGAN', 'Tembaga Pipa / Spuyer', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(498, '011000193', 'BJ', 'BARANG DAGANGAN', 'Pipa Tiang', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(499, '011000194', 'BJ', 'BARANG DAGANGAN', 'Tusukan Burner', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(500, '011000195', 'BJ', 'BARANG DAGANGAN', 'Pizza Dough', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(501, '011000196', 'BJ', 'BARANG DAGANGAN', 'Plastik Bungkus Hotdog', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(502, '011000198', 'BJ', 'BARANG DAGANGAN', 'Beef Kotak 45Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(503, '011000199', 'BJ', 'BARANG DAGANGAN', 'Donat Keju', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(504, '011000200', 'BJ', 'BARANG DAGANGAN', 'Donat Coklat', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(505, '011000201', 'BJ', 'BARANG DAGANGAN', 'Donat Stawberry', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(506, '011000202', 'BJ', 'BARANG DAGANGAN', 'Wajan 32 Cm', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(507, '011000203', 'BJ', 'BARANG DAGANGAN', 'Saos Tomat Mc.Lewis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(508, '011000204', 'BJ', 'BARANG DAGANGAN', 'Mayonaise Mc Lewis', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(509, '011000205', 'BJ', 'BARANG DAGANGAN', 'Roti Bun Wijen Hitam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(510, '011000206', 'BJ', 'BARANG DAGANGAN', 'Tortilla Sedang Keju', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(511, '011000207', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi 4 Kg Premium Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(512, '011000208', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi Kemfood 500Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(513, '011000209', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Kambing Kemfood 500Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(514, '011000210', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Ayam Kemfood 500Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(515, '011000211', 'BJ', 'BARANG DAGANGAN', 'Daging Kebab Sapi Premium 2 Kg Tiang Sahara  ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(516, '011000212', 'BJ', 'BARANG DAGANGAN', 'Tabung LPG 3 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(517, '011000213', 'BJ', 'BARANG DAGANGAN', 'Serbet', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(518, '011000214', 'BJ', 'BARANG DAGANGAN', 'Clear Liquid', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(519, '011000215', 'BJ', 'BARANG DAGANGAN', 'Beef Burger Sahara', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(520, '011000216', 'BJ', 'BARANG DAGANGAN', 'Kentang 500 Gr', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(521, '013000001', 'BJ', 'BAHAN PEMBUNGKUS', 'Box TB', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(522, '013000002', 'BJ', 'BAHAN PEMBUNGKUS', 'Box TS', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(523, '013000003', 'BJ', 'BAHAN PEMBUNGKUS', 'Box TM', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(524, '013000004', 'BJ', 'MINUMAN', 'Royal Chocolate Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(525, '013000005', 'BJ', 'MINUMAN', 'Green Tea Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(526, '013000006', 'BJ', 'MINUMAN', 'Peppermint Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(527, '013000007', 'BJ', 'MINUMAN', 'Vanilla Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(528, '013000008', 'BJ', 'MINUMAN', 'Chocolate Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(529, '013000009', 'BJ', 'MINUMAN', 'Vanilla Late Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(530, '013000010', 'BJ', 'MINUMAN', 'Choco Mint Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(531, '013000011', 'BJ', 'MINUMAN', 'Coffe Caramel Original 1 Kg', NULL, 250000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(532, '013000012', 'BJ', 'MINUMAN', 'Dubble Gum Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(533, '013000013', 'BJ', 'MINUMAN', 'Taro Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(534, '013000014', 'BJ', 'MINUMAN', 'Durian Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(535, '013000015', 'BJ', 'MINUMAN', 'Cappucino Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(536, '013000016', 'BJ', 'MINUMAN', 'Milk Tea Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(537, '013000017', 'BJ', 'MINUMAN', 'Red Ginger Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(538, '013000018', 'BJ', 'MINUMAN', 'Caramello Original 1 Kg', NULL, 12800, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(539, '013000019', 'BJ', 'MINUMAN', 'Choco Caramel Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(540, '013000020', 'BJ', 'MINUMAN', 'Creamer Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(541, '013000021', 'BJ', 'MINUMAN', 'Mochacino Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(542, '013000022', 'BJ', 'MINUMAN', 'Cokotaro Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(543, '013000023', 'BJ', 'MINUMAN', 'Vanilla Blue Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(544, '013000024', 'BJ', 'MINUMAN', 'Choco Creamy Original 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(545, '013000025', 'BJ', 'MINUMAN', 'Chocolate @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(546, '013000026', 'BJ', 'MINUMAN', 'Vanilla Late @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(547, '013000027', 'BJ', 'MINUMAN', 'Choco Mint @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(548, '013000028', 'BJ', 'MINUMAN', 'Vanilla Blue @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(549, '013000029', 'BJ', 'MINUMAN', 'Choco Creamy @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(550, '013000030', 'BJ', 'MINUMAN', 'Taro @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(551, '013000031', 'BJ', 'MINUMAN', 'Durian @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(552, '013000032', 'BJ', 'MINUMAN', 'Milk Tea @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(553, '013000033', 'BJ', 'MINUMAN', 'Red Ginger @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(554, '013000034', 'BJ', 'MINUMAN', 'Caramello @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(555, '013000035', 'BJ', 'MINUMAN', 'Creamer @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(556, '013000036', 'BJ', 'MINUMAN', 'Cokotaro @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(557, '013000037', 'BJ', 'MINUMAN', 'Jelly @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(558, '013000038', 'BJ', 'MINUMAN', 'Powder Cincau Hitam', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(559, '013000039', 'BJ', 'MINUMAN', 'Bubble/Tapioka', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(560, '013000040', 'BJ', 'MINUMAN', 'Strawberry Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(561, '013000041', 'BJ', 'MINUMAN', 'Bluebarry Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(562, '013000042', 'BJ', 'MINUMAN', 'Melon Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(563, '013000043', 'BJ', 'MINUMAN', 'Lemon Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(564, '013000044', 'BJ', 'MINUMAN', 'Leci Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(565, '013000045', 'BJ', 'MINUMAN', 'Kiwi Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(566, '013000046', 'BJ', 'MINUMAN', 'Apel Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(567, '013000047', 'BJ', 'MINUMAN', 'Sirsak Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(568, '013000048', 'BJ', 'MINUMAN', 'Manggo Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(569, '013000049', 'BJ', 'MINUMAN', 'Guafa Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(570, '013000050', 'BJ', 'MINUMAN', 'Durian Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(571, '013000051', 'BJ', 'MINUMAN', 'Orange Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(572, '013000052', 'BJ', 'MINUMAN', 'Grape Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(573, '013000053', 'BJ', 'MINUMAN', 'Vanilla Blue Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(574, '013000054', 'BJ', 'MINUMAN', 'Yoghurt Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(575, '013000055', 'BJ', 'MINUMAN', 'Markisa Syrup', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(576, '013000056', 'BJ', 'MINUMAN', 'Peppermint @ 25 Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(577, '013000057', 'BJ', 'MINUMAN', 'Choco Taro B2 @ 25Pcs', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(578, '013000058', 'BJ', 'MINUMAN', 'Buble Gum 1 Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(579, '013000059', 'BJ', 'MINUMAN', 'Bubble/Tapioka 1Kg', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(580, '014000001', 'BJ', 'Makanan Frozen', 'Kebab Jamur Sitake', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(581, '014000002', 'BJ', 'Makanan Frozen', 'Kebab TC', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(582, '014000003', 'BJ', 'Makanan Frozen', 'Kebab TJ', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(583, '014000004', 'BJ', 'Makanan Frozen', 'Saus', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(584, '014000005', 'BJ', 'Makanan Frozen', 'Kebab Daging', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(585, '014000006', 'BJ', 'Makanan Frozen', 'Kebab Ayam Jamur', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(586, '014000007', 'BJ', 'Makanan Frozen', 'Kebab Tuna', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(587, '014000008', 'BJ', 'Makanan Frozen', 'Kebab Pisang Coklat', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(588, '014000009', 'BJ', 'Makanan Frozen', 'Kebab Buah', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(589, '014000010', 'BJ', 'Makanan Frozen', 'Kebab TS', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(590, '014000011', 'BJ', 'Makanan Frozen', 'Kebab TM', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(591, '014000012', 'BJ', 'Makanan Frozen', 'Kebab Fryam Jamur', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00'),
	(592, '015000001', 'BJ', 'Pajak', 'Pajak 10 %', NULL, 20000, '2018-03-14 14:47:00', '2018-03-14 14:47:00');
/*!40000 ALTER TABLE `m_item` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_paymentmethod
CREATE TABLE IF NOT EXISTS `m_paymentmethod` (
  `pm_id` tinyint(4) NOT NULL,
  `pm_year` varchar(50) DEFAULT NULL,
  `pm_name` varchar(50) DEFAULT NULL,
  `pm_coa_comp` varchar(10) NOT NULL,
  `pm_coa_year` varchar(4) NOT NULL,
  `pm_coa_code` varchar(9) NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_paymentmethod: ~5 rows (approximately)
DELETE FROM `m_paymentmethod`;
/*!40000 ALTER TABLE `m_paymentmethod` DISABLE KEYS */;
INSERT INTO `m_paymentmethod` (`pm_id`, `pm_year`, `pm_name`, `pm_coa_comp`, `pm_coa_year`, `pm_coa_code`) VALUES
	(1, '2018', 'BRI', 'RMZ-', '2018', '1010.....'),
	(2, NULL, 'BCA', '', '', ''),
	(3, NULL, 'MANDIRI', '', '', ''),
	(4, NULL, 'BNI', '', '', ''),
	(5, NULL, 'TUNAI', '', '', ''),
	(6, NULL, 'UTANG', '', '', '');
/*!40000 ALTER TABLE `m_paymentmethod` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_price
CREATE TABLE IF NOT EXISTS `m_price` (
  `Column 1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_price: ~0 rows (approximately)
DELETE FROM `m_price`;
/*!40000 ALTER TABLE `m_price` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_price` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_stock
CREATE TABLE IF NOT EXISTS `m_stock` (
  `m_id` varchar(5) NOT NULL,
  `v` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`v`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_stock: ~18 rows (approximately)
DELETE FROM `m_stock`;
/*!40000 ALTER TABLE `m_stock` DISABLE KEYS */;
INSERT INTO `m_stock` (`m_id`, `v`, `m_name`) VALUES
	('GB1', 1, 'G. Bahan Baku Cabang 1'),
	('GB2', 2, 'G. Bahan Baku Cabang 2'),
	('GB3', 3, 'G. Bahan Baku Cabang 3'),
	('GC1', 4, 'G. Customer Cabang 1'),
	('GC2', 5, 'G. Customer Cabang 2'),
	('GC3', 6, 'G. Customer Cabang 3'),
	('GG1', 7, 'G. Grosir Cabang 1'),
	('GG2', 8, 'G. Grosir Cabang 2'),
	('GG3', 9, 'G. Grosir Cabang 3'),
	('GP1', 10, 'G. Produksi Cabang 1'),
	('GP2', 11, 'G. Produksi Cabang 2'),
	('GP3', 12, 'G. Produksi Cabang 3'),
	('GR1', 13, 'G. Retail Cabang 1'),
	('GR2', 14, 'G. Retail Cabang 2'),
	('GR3', 15, 'G. Retail Cabang 3'),
	('GS1', 16, 'G. Sending Cabang 1'),
	('GS2', 17, 'G. Sending Cabang 2'),
	('GS3', 18, 'G. Sending Cabang 3');
/*!40000 ALTER TABLE `m_stock` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_users
CREATE TABLE IF NOT EXISTS `m_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.m_users: ~2 rows (approximately)
DELETE FROM `m_users`;
/*!40000 ALTER TABLE `m_users` DISABLE KEYS */;
INSERT INTO `m_users` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'amdin1', 'admin22@gmail.com', 'admin', '$2y$10$hFooeUmTUWV5bmY8HMPvJOEo1kGC/CqEWeWtX226xvM4qgMUBP6oe', 'IAuRvsCRBpGsCDZuxcWNByFrpMnMUsqiClo78vkRjmV2cJLZGQpQMbVnGetI', '2017-12-19 06:20:05', '2018-04-02 05:26:19'),
	(2, 'Bravo', 'bravo@bravo.com', 'bravo', '$2y$10$ORK70cBLfoFFcXBJFNFwFeIPpUKnk3Vf3ro/0GZOGYfDLntxxFzF6', 'swMqwu1kNY36uWl56Rmsqssjtvp7I5u7QJGVVofjXNIgrkjKcB9MbHanhxjL', '2018-02-03 01:46:43', '2018-02-03 01:46:51');
/*!40000 ALTER TABLE `m_users` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.password_resets: 110 rows
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.users: 2 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'amdin1', 'admin22@gmail.com', 'admin', '$2y$10$hFooeUmTUWV5bmY8HMPvJOEo1kGC/CqEWeWtX226xvM4qgMUBP6oe', 'P8GCWFWR07E2tnEmThy5o3WA90r9lnpzPhb7sybctW3jQKfdNvwINfay2J9s', '2017-12-19 06:20:05', '2018-03-12 07:18:22'),
	(2, 'Bravo', 'bravo@bravo.com', 'bravo', '$2y$10$ORK70cBLfoFFcXBJFNFwFeIPpUKnk3Vf3ro/0GZOGYfDLntxxFzF6', 'swMqwu1kNY36uWl56Rmsqssjtvp7I5u7QJGVVofjXNIgrkjKcB9MbHanhxjL', '2018-02-03 01:46:43', '2018-02-03 01:46:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
