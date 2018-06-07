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

-- Dumping structure for table bisnis_tamma.m_group
CREATE TABLE IF NOT EXISTS `m_group` (
  `m_gid` int(11) DEFAULT NULL,
  `m_gcode` varchar(50) DEFAULT NULL,
  `m_gname` varchar(255) DEFAULT NULL,
  `m_gitem` varchar(50) DEFAULT NULL,
  `m_gcreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `m_gupdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_group: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_group` DISABLE KEYS */;
REPLACE INTO `m_group` (`m_gid`, `m_gcode`, `m_gname`, `m_gitem`, `m_gcreate`, `m_gupdate`) VALUES
	(1, '001', 'PG-SQLik', '0101806/004', '2018-06-07 08:11:37', '2018-06-07 01:18:04'),
	(2, '002', 'My-sqli', '0101806/004', '2018-06-07 08:11:37', '2018-06-07 01:18:04');
/*!40000 ALTER TABLE `m_group` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_item
CREATE TABLE IF NOT EXISTS `m_item` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_code` varchar(12) NOT NULL,
  `i_type` varchar(5) DEFAULT NULL COMMENT 'BB: Bahan Baku | BP: Barang Produksi | BJ: Barang Jualan',
  `i_group` varchar(50) DEFAULT NULL,
  `i_code_group` varchar(20) DEFAULT NULL,
  `i_name` varchar(50) DEFAULT NULL,
  `i_sat1` varchar(50) DEFAULT NULL,
  `i_sat2` varchar(50) DEFAULT NULL,
  `i_sat3` varchar(50) DEFAULT NULL,
  `i_sat_isi1` int(11) DEFAULT NULL,
  `i_sat_isi2` int(11) DEFAULT NULL,
  `i_sat_isi3` int(11) DEFAULT NULL,
  `i_weight` double NOT NULL DEFAULT '0',
  `i_detail` varchar(50) NOT NULL DEFAULT '0',
  `i_insert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `i_update` timestamp NULL DEFAULT NULL,
  `i_minstock` double DEFAULT NULL,
  PRIMARY KEY (`i_id`),
  UNIQUE KEY `i_kode` (`i_code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_item: ~1 rows (approximately)
/*!40000 ALTER TABLE `m_item` DISABLE KEYS */;
REPLACE INTO `m_item` (`i_id`, `i_code`, `i_type`, `i_group`, `i_code_group`, `i_name`, `i_sat1`, `i_sat2`, `i_sat3`, `i_sat_isi1`, `i_sat_isi2`, `i_sat_isi3`, `i_weight`, `i_detail`, `i_insert`, `i_update`, `i_minstock`) VALUES
	(1, '0021806/010', 'BJ', '002', '002', 'MIE KREMES', 'ST-00002/1806', 'ST-00001/1806', 'ST-00001/1806', 20, 1, 1, 900, 'ga ada detail', '2018-06-07 02:49:13', NULL, 10);
/*!40000 ALTER TABLE `m_item` ENABLE KEYS */;

-- Dumping structure for table bisnis_tamma.m_satuan
CREATE TABLE IF NOT EXISTS `m_satuan` (
  `m_sid` int(11) NOT NULL AUTO_INCREMENT,
  `m_scode` varchar(50) DEFAULT NULL,
  `m_sname` varchar(50) DEFAULT NULL,
  `m_screate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `m_supdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`m_sid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_satuan: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_satuan` DISABLE KEYS */;
REPLACE INTO `m_satuan` (`m_sid`, `m_scode`, `m_sname`, `m_screate`, `m_supdate`) VALUES
	(1, 'ST-00001/1806', 'PACK', '2018-06-06 12:57:10', NULL),
	(2, 'ST-00002/1806', 'UNIT', '2018-06-06 12:57:34', NULL);
/*!40000 ALTER TABLE `m_satuan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
