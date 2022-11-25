-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table easynow.campaign
CREATE TABLE IF NOT EXISTS `campaign` (
  `cpn_id` int(11) NOT NULL AUTO_INCREMENT,
  `cpn_name` varchar(200) NOT NULL,
  `cpn_type` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `cpn_campaign_status` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `cpn_start_date` date NOT NULL,
  `cpn_end_date` date NOT NULL,
  `cpn_budget_cost` double NOT NULL,
  `cpn_revenue_cost` double NOT NULL,
  `cpn_description` varchar(200) NOT NULL,
  `cpn_van_id` int(11) NOT NULL COMMENT 'value addition primary key',
  `cpn_core_msg` varchar(200) NOT NULL,
  `cpn_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status; 1: Active;2:inactive',
  `cpn_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `cpn_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cpn_updt_by` int(11) NOT NULL COMMENT 'people id',
  `cpn_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cpn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.campaign: ~1 rows (approximately)
DELETE FROM `campaign`;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
INSERT INTO `campaign` (`cpn_id`, `cpn_name`, `cpn_type`, `cpn_campaign_status`, `cpn_start_date`, `cpn_end_date`, `cpn_budget_cost`, `cpn_revenue_cost`, `cpn_description`, `cpn_van_id`, `cpn_core_msg`, `cpn_status`, `cpn_crdt_by`, `cpn_crdt_dt`, `cpn_updt_by`, `cpn_updt_dt`) VALUES
	(1, 'Easynow Sales', 1, 1, '2019-01-24', '2019-01-24', 5000, 5000, '', 0, '', 1, 0, '2019-01-24 10:01:28', 0, '2019-01-24 10:01:28');
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
