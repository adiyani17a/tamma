-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table tamma.d_rencana_penjualan
CREATE TABLE IF NOT EXISTS `d_rencana_penjualan` (
  `rp_id` int(11) NOT NULL,
  `rp_bulan` date NOT NULL,
  `rp_periode` date NOT NULL,
  `rp_target_qty` int(11) NOT NULL,
  `rp_target_value` double NOT NULL,
  `rp_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rp_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rp_created_by` varchar(50) NOT NULL,
  PRIMARY KEY (`rp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tamma.d_rencana_penjualan: ~0 rows (approximately)
DELETE FROM `d_rencana_penjualan`;
/*!40000 ALTER TABLE `d_rencana_penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_rencana_penjualan` ENABLE KEYS */;

-- Dumping structure for table tamma.d_rencana_penjualan_dt
CREATE TABLE IF NOT EXISTS `d_rencana_penjualan_dt` (
  `rpd_id` int(11) NOT NULL,
  `rpd_dt` int(11) NOT NULL,
  `rpd_item` int(11) NOT NULL,
  `rpd_target_qty` int(11) NOT NULL,
  `rpd_target_value` double NOT NULL,
  PRIMARY KEY (`rpd_id`,`rpd_dt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tamma.d_rencana_penjualan_dt: ~0 rows (approximately)
DELETE FROM `d_rencana_penjualan_dt`;
/*!40000 ALTER TABLE `d_rencana_penjualan_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_rencana_penjualan_dt` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
