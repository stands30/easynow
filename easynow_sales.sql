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

-- Dumping structure for table easynow.account
CREATE TABLE IF NOT EXISTS `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_name` text NOT NULL,
  `acc_desc` text NOT NULL,
  `acc_default` tinyint(1) NOT NULL COMMENT 'default account',
  `acc_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'gen_prm group = active_status; 1: Active;2:inactive',
  `acc_crdt_by` int(11) NOT NULL,
  `acc_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `acc_updt_by` int(11) NOT NULL,
  `acc_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.account: ~0 rows (approximately)
DELETE FROM `account`;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table easynow.additional_details
CREATE TABLE IF NOT EXISTS `additional_details` (
  `adt_id` int(11) NOT NULL AUTO_INCREMENT,
  `adt_ppl_id` int(11) NOT NULL COMMENT 'Foreign key people id',
  `adt_adm_id` int(11) NOT NULL COMMENT 'additional details master id Foreign key adm_id',
  `adt_value` varchar(400) NOT NULL COMMENT 'value of the respective field for field refer additional_details_master table',
  `adt_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group =active_status',
  `adt_crdt_by` int(11) NOT NULL COMMENT 'Foreign key people id',
  `adt_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Foreign key people id',
  `adt_updt_by` int(11) NOT NULL COMMENT 'Foreign key people id',
  `adt_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Foreign key people id',
  PRIMARY KEY (`adt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.additional_details: ~0 rows (approximately)
DELETE FROM `additional_details`;
/*!40000 ALTER TABLE `additional_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `additional_details` ENABLE KEYS */;

-- Dumping structure for table easynow.additional_details_category
CREATE TABLE IF NOT EXISTS `additional_details_category` (
  `adc_id` int(11) NOT NULL AUTO_INCREMENT,
  `adc_category` varchar(200) NOT NULL,
  `adc_order` int(11) NOT NULL,
  `adc_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group =active_status',
  `adc_crdt_by` int(11) NOT NULL COMMENT 'Foreign key people id',
  `adc_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Foreign key people id',
  `adc_updt_by` int(11) NOT NULL COMMENT 'Foreign key people id',
  `adc_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Foreign key people id',
  PRIMARY KEY (`adc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.additional_details_category: ~0 rows (approximately)
DELETE FROM `additional_details_category`;
/*!40000 ALTER TABLE `additional_details_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `additional_details_category` ENABLE KEYS */;

-- Dumping structure for table easynow.additional_details_master
CREATE TABLE IF NOT EXISTS `additional_details_master` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_adc_id` int(11) NOT NULL COMMENT 'Foreign key addiitional category id',
  `adm_type` int(11) NOT NULL COMMENT 'gen prm group= adm_type',
  `adm_name` varchar(200) NOT NULL,
  `adm_placeholder` varchar(200) NOT NULL,
  `adm_group` int(11) DEFAULT NULL COMMENT 'gen prm group name',
  `adm_order` int(11) DEFAULT NULL,
  `adm_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group =active_status',
  `adm_crdt_by` int(11) NOT NULL COMMENT 'Foreign key people id',
  `adm_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Foreign key people id',
  `adm_updt_by` int(11) NOT NULL COMMENT 'Foreign key people id',
  `adm_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Foreign key people id',
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.additional_details_master: ~0 rows (approximately)
DELETE FROM `additional_details_master`;
/*!40000 ALTER TABLE `additional_details_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `additional_details_master` ENABLE KEYS */;

-- Dumping structure for table easynow.bsn_prm
CREATE TABLE IF NOT EXISTS `bsn_prm` (
  `bpm_id` int(11) NOT NULL AUTO_INCREMENT,
  `bpm_name` varchar(400) NOT NULL,
  `bpm_value` varchar(100) NOT NULL,
  `bpm_visible` int(11) NOT NULL DEFAULT '1' COMMENT '1 = visible , 2 = not visible',
  `bpm_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `bpm_crtd_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bpm_crtd_by` int(11) NOT NULL,
  `bpm_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bpm_updt_by` varchar(50) NOT NULL,
  `bpm_last_ip` varchar(50) NOT NULL,
  PRIMARY KEY (`bpm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='business parameters';

-- Dumping data for table easynow.bsn_prm: ~7 rows (approximately)
DELETE FROM `bsn_prm`;
/*!40000 ALTER TABLE `bsn_prm` DISABLE KEYS */;
INSERT INTO `bsn_prm` (`bpm_id`, `bpm_name`, `bpm_value`, `bpm_visible`, `bpm_status`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`, `bpm_updt_by`, `bpm_last_ip`) VALUES
	(1, 'email_flag', '1', 1, 1, '2018-09-17 07:34:47', 0, '2018-09-17 07:34:47', '620', ''),
	(2, 'mobile_flag', '1', 1, 1, '0000-00-00 00:00:00', 0, '2018-02-17 05:52:42', '', ''),
	(3, 'admin_email', '1', 1, 1, '2018-09-18 10:14:42', 0, '2018-09-18 10:14:42', '620', ''),
	(4, 'default_account', '1', 1, 1, '0000-00-00 00:00:00', 0, '2018-02-17 11:55:38', '', ''),
	(5, 'max_users', '50', 2, 1, '2018-10-25 11:52:25', 620, '2018-10-25 11:52:25', '', ''),
	(6, 'company_name', 'Nextasy Technologies', 1, 1, '2018-08-29 14:06:49', 620, '2018-08-29 14:06:49', '', ''),
	(7, 'table_server_limit', '1000', 1, 1, '2018-09-05 08:07:26', 620, '2018-09-05 11:37:26', '', '');
/*!40000 ALTER TABLE `bsn_prm` ENABLE KEYS */;

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

-- Dumping structure for table easynow.candidate
CREATE TABLE IF NOT EXISTS `candidate` (
  `cdt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cdt_ppl_id` int(11) NOT NULL COMMENT 'foreign key people id',
  `cdt_role` int(11) NOT NULL,
  `cdt_total_exp` float NOT NULL,
  `cdt_relative_exp` float NOT NULL,
  `cdt_notice_period` int(11) NOT NULL,
  `cdt_exp_ctc` double NOT NULL,
  `cdt_cur_ctc` double NOT NULL,
  `cdt_skills` varchar(150) NOT NULL,
  `cdt_remark` varchar(150) NOT NULL,
  `cdt_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `cdt_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `cdt_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cdt_updt_by` int(11) NOT NULL COMMENT 'people id',
  `cdt_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cdt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.candidate: ~0 rows (approximately)
DELETE FROM `candidate`;
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;

-- Dumping structure for table easynow.cashbook
CREATE TABLE IF NOT EXISTS `cashbook` (
  `csb_id` int(11) NOT NULL AUTO_INCREMENT,
  `csb_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'gen_prm group = cashbook_type;1: income 2: expense ',
  `csb_transaction_type` int(11) NOT NULL DEFAULT '1' COMMENT '1:Direct ; 2: User; 3: Purchase ; 4: Invoice',
  `csb_transaction_type_id` int(11) NOT NULL,
  `csb_particular` text NOT NULL,
  `csb_amount` double NOT NULL,
  `csb_date` date NOT NULL,
  `csb_approve` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'gen_prm group = approval_status;1: approve; 2: reject;3:Pending',
  `csb_approved_by` int(11) NOT NULL,
  `csb_cbc_id` int(11) NOT NULL COMMENT 'category id',
  `csb_csc_id` int(11) NOT NULL COMMENT 'sub category id',
  `csb_ppl_id` int(11) NOT NULL COMMENT 'Person id',
  `csb_acc_id` int(11) NOT NULL COMMENT 'account id',
  `csb_remark` text NOT NULL,
  `csb_status` tinyint(1) NOT NULL COMMENT 'gen_prm group = active_status; 1: Active;2:inactive',
  `csb_crdt_by` int(11) NOT NULL,
  `csb_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `csb_updt_by` int(11) NOT NULL,
  `csb_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`csb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Income/Expense ';

-- Dumping data for table easynow.cashbook: ~0 rows (approximately)
DELETE FROM `cashbook`;
/*!40000 ALTER TABLE `cashbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `cashbook` ENABLE KEYS */;

-- Dumping structure for table easynow.cashbook_category
CREATE TABLE IF NOT EXISTS `cashbook_category` (
  `cbc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cbc_type` int(11) NOT NULL COMMENT 'cashbook_type genprm',
  `cbc_name` text NOT NULL,
  `cbc_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'gen_prm group = active_status; 1: Active;2:inactive	',
  `cbc_crdt_by` int(11) NOT NULL,
  `cbc_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cbc_updt_by` int(11) NOT NULL,
  `cbc_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cbc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.cashbook_category: ~0 rows (approximately)
DELETE FROM `cashbook_category`;
/*!40000 ALTER TABLE `cashbook_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `cashbook_category` ENABLE KEYS */;

-- Dumping structure for table easynow.cashbook_sub_category
CREATE TABLE IF NOT EXISTS `cashbook_sub_category` (
  `csc_id` int(11) NOT NULL AUTO_INCREMENT,
  `csc_cbc_id` int(11) NOT NULL,
  `csc_name` text NOT NULL,
  `csc_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'gen_prm group = active_status; 1: Active;2:inactive	',
  `csc_crdt_by` int(11) NOT NULL,
  `csc_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `csc_updt_by` int(11) NOT NULL,
  `csc_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`csc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.cashbook_sub_category: ~0 rows (approximately)
DELETE FROM `cashbook_sub_category`;
/*!40000 ALTER TABLE `cashbook_sub_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `cashbook_sub_category` ENABLE KEYS */;

-- Dumping structure for table easynow.client
CREATE TABLE IF NOT EXISTS `client` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_cmp_id` int(11) NOT NULL COMMENT 'foreign key company id',
  `cli_code` varchar(20) NOT NULL,
  `cli_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `cli_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `cli_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cli_updt_by` int(11) NOT NULL COMMENT 'people id',
  `cli_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cli_id`),
  KEY `client_fk0` (`cli_cmp_id`),
  CONSTRAINT `client_fk0` FOREIGN KEY (`cli_cmp_id`) REFERENCES `company` (`cmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.client: ~0 rows (approximately)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Dumping structure for table easynow.cmp_people
CREATE TABLE IF NOT EXISTS `cmp_people` (
  `cpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cpl_cmp_id` int(11) NOT NULL COMMENT 'foreign key company id',
  `cpl_ppl_id` int(11) NOT NULL COMMENT 'foreign key people id',
  `cpl_designation` varchar(100) NOT NULL,
  `cpl_remark` varchar(200) NOT NULL,
  `cpl_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `cpl_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `cpl_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cpl_updt_by` int(11) NOT NULL COMMENT 'people id',
  `cpl_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cpl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.cmp_people: ~4 rows (approximately)
DELETE FROM `cmp_people`;
/*!40000 ALTER TABLE `cmp_people` DISABLE KEYS */;
INSERT INTO `cmp_people` (`cpl_id`, `cpl_cmp_id`, `cpl_ppl_id`, `cpl_designation`, `cpl_remark`, `cpl_status`, `cpl_crdt_by`, `cpl_crdt_dt`, `cpl_updt_by`, `cpl_updt_dt`) VALUES
	(1, 1, 2, 'test', '', 1, 1, '2019-01-22 11:15:33', 0, '2019-01-22 15:45:33'),
	(2, 1, 3, 'developer', '', 1, 1, '2019-01-22 11:15:52', 0, '2019-01-22 15:45:52'),
	(3, 1, 5, 'Team Leader', '', 1, 1, '2019-01-23 12:29:51', 0, '2019-01-23 12:29:51'),
	(4, 1, 6, 'Front End Developer', '', 1, 1, '2019-01-23 12:42:41', 0, '2019-01-23 12:42:41');
/*!40000 ALTER TABLE `cmp_people` ENABLE KEYS */;

-- Dumping structure for table easynow.company
CREATE TABLE IF NOT EXISTS `company` (
  `cmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_code` varchar(20) NOT NULL,
  `cmp_name` varchar(100) NOT NULL,
  `cmp_industry` int(11) NOT NULL,
  `cmp_type` int(11) NOT NULL COMMENT 'gnp_group same as this field name ',
  `cmp_anl_rev` int(11) NOT NULL COMMENT 'gnp_group same as this field name',
  `cmp_employee` text NOT NULL,
  `cmp_website` varchar(100) NOT NULL,
  `cmp_address` varchar(500) NOT NULL,
  `cmp_pincode` int(11) NOT NULL,
  `cmp_tgs_id` varchar(400) NOT NULL COMMENT 'company tags',
  `cmp_stm_id` int(11) NOT NULL COMMENT 'Foreign key state master',
  `cmp_gst_no` varchar(100) NOT NULL,
  `cmp_pan` varchar(100) NOT NULL,
  `cmp_payment_terms` varchar(100) NOT NULL,
  `cmp_pay_due` int(11) NOT NULL,
  `cmp_logo` varchar(100) NOT NULL,
  `cmp_login` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `cmp_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `cmp_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `cmp_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cmp_updt_by` int(11) NOT NULL COMMENT 'people id',
  `cmp_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.company: ~0 rows (approximately)
DELETE FROM `company`;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`cmp_id`, `cmp_code`, `cmp_name`, `cmp_industry`, `cmp_type`, `cmp_anl_rev`, `cmp_employee`, `cmp_website`, `cmp_address`, `cmp_pincode`, `cmp_tgs_id`, `cmp_stm_id`, `cmp_gst_no`, `cmp_pan`, `cmp_payment_terms`, `cmp_pay_due`, `cmp_logo`, `cmp_login`, `cmp_status`, `cmp_crdt_by`, `cmp_crdt_dt`, `cmp_updt_by`, `cmp_updt_dt`) VALUES
	(1, '', 'Nextasy', 1, 0, 0, '', '', '', 0, '', 27, '', '', '', 0, '', 0, 1, 1, '2019-01-22 11:14:16', 0, '2019-01-22 15:44:16');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping structure for table easynow.company_profile
CREATE TABLE IF NOT EXISTS `company_profile` (
  `cpf_id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_subject` varchar(200) NOT NULL,
  `cpf_desc` blob NOT NULL,
  `cpf_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group = active_status',
  `cpf_ppl_id` int(11) NOT NULL DEFAULT '1',
  `cpf_crdt_by` int(11) NOT NULL COMMENT 'Foreign Key people id',
  `cpf_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cpf_updt_by` int(11) NOT NULL COMMENT 'Foreign Key people id',
  `cpf_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cpf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.company_profile: ~0 rows (approximately)
DELETE FROM `company_profile`;
/*!40000 ALTER TABLE `company_profile` DISABLE KEYS */;
INSERT INTO `company_profile` (`cpf_id`, `cpf_subject`, `cpf_desc`, `cpf_status`, `cpf_ppl_id`, `cpf_crdt_by`, `cpf_crdt_dt`, `cpf_updt_by`, `cpf_updt_dt`) VALUES
	(1, 'Taking Business on Auto-Pilot Mode | Nextasy Technologies | Company Profile ', _binary 0x3C7020636C6173733D224D736F4E6F726D616C22207374796C653D226D617267696E2D746F703A203070783B206D617267696E2D626F74746F6D3A20313270743B20636F6C6F723A207267622833342C2033342C203334293B20666F6E742D66616D696C793A20526F626F746F2C20526F626F746F44726166742C2048656C7665746963612C20417269616C2C2073616E732D73657269663B20666F6E742D73697A653A20736D616C6C3B206261636B67726F756E642D636F6C6F723A20726762283235352C203235352C20323535293B206C696E652D6865696768743A20313870743B223E3C7370616E207374796C653D22666F6E742D73697A653A2031302E3570743B20666F6E742D66616D696C793A20224C75636964612053616E73222C2073616E732D73657269663B223E546869732069732056696E6179205061676172652C20436869656620457865637574697665204F6666696365722066726F6D204E65787461737920546563686E6F6C6F676965732EC2A03C62723E3C62723E4C6574206D6520496E74726F6475636520796F7520746F204E65787461737920546563686E6F6C6F676965732E206173206F6E65206F6620746865206C656164696E6720495420636F6D70616E696573206865616471756172746572656420696E204D756D62616920616E64C2A03C7370616E20636C6173733D22696C223E6E6F773C2F7370616E3EC2A0776974682061206272616E64206E6577207465616D20696E2044756261692C205541452EC2A03C62723E50656F706C65207C2050726F63657373207C20546563686E6F6C6F6779206172652074687265652070696C6C617273206F6620616E79207375636365737366756C20627573696E6573732EC2A03C62723E576520556E6465727374616E6420746861742070656F706C652069732074686579206B6579207265736F7572636520696E20796F7572206F7267616E697A6174696F6EC2A03C62723E57652048656C7020796F75206275696C642050726F636573732061726F756E6420796F75722070656F706C65202620627573696E65737320676F616C73C2A03C62723E4F757220746563686E6F6C6F676963616C20536F6C7574696F6E2068656C7020746F2074616B6520796F7572206F7267616E697A6174696F6E20696EC2A03C7374726F6E673E4175746F2D50696C6F74204D6F64653C2F7374726F6E673EC2A03C62723EC2A0576520686176652068656C7065642068756E6472656473206F6620636F6D70616E6965732067726F7720746865697220726576656E756573206F6E6C696E6520262073657420746865697220427573696E657373206F6E204175746F2D50696C6F74204D6F6465202C2057652064696420746869732062793AC2A03C62723E312EC2A03C7374726F6E673E44657369676E2077656273697465733C2F7374726F6E673EC2A07768696368207374726963746C7920666F6C6C6F777320476F6F676C6527732067756964656C696E65732EC2A03C62723E322E20446576656C6F7020616D617A696E676C79C2A03C7370616E20636C6173733D22696C223E656173793C2F7370616E3EC2A0746F20757365C2A03C7374726F6E673E43524D3C2F7374726F6E673EC2A03C62723E332E204C61756E6368C2A03C7374726F6E673E4F6E6C696E652073686F7070696E673C2F7374726F6E673EC2A073697465732077697468206D6F737420616D617A696E672064657369676E732C206C617465737420636172742066756E6374696F6E616C69746965732CC2A03C7370616E20636C6173733D22696C223E656173793C2F7370616E3EC2A0746F2075736520696E7465726661636520616E6420434D532EC2A03C62723E342EC2A03C7374726F6E673E45525020536F6C7574696F6E3C2F7374726F6E673EC2A03C62723E3C2F7370616E3E3C2F703E3C646976207374796C653D22636F6C6F723A207267622833342C2033342C203334293B206261636B67726F756E642D636F6C6F723A20726762283235352C203235352C20323535293B20666F6E742D73697A653A2031302E3570743B20666F6E742D66616D696C793A20224C75636964612053616E73222C2073616E732D73657269663B223E3C7370616E207374796C653D22666F6E742D73697A653A2031302E3570743B223E5468616E6B73202620526567617264732C3C62723E4E65787461737920546563686E6F6C6F67696573C2A03C2F7370616E3E3C753E3C2F753E3C753E3C2F753E3C62723E3C6920636C6173733D226D5F2D373832353039343838313436323633383033356661206D5F2D3738323530393438383134363236333830333566612D6D6F62696C652220617269612D68696464656E3D2274727565223E3C2F693E3C6120687265663D2274656C3A2B39313939333032363034393122207461726765743D225F626C616E6B22207374796C653D22636F6C6F723A207267622831372C2038352C20323034293B223E2B3931393933303236303439313C2F613E3C62723E3C6920636C6173733D226D5F2D373832353039343838313436323633383033356661206D5F2D3738323530393438383134363236333830333566612D656E76656C6F70652220617269612D68696464656E3D2274727565223E3C2F693E3C6120687265663D226D61696C746F3A627573696E657373406E6578746173792E696E22207461726765743D225F626C616E6B22207374796C653D22636F6C6F723A207267622831372C2038352C20323034293B223E627573696E657373406E6578746173792E696E3C2F613E3C2F6469763E, 1, 620, 1, '2018-08-29 11:01:17', 0, '2018-09-08 05:13:18');
/*!40000 ALTER TABLE `company_profile` ENABLE KEYS */;

-- Dumping structure for table easynow.department
CREATE TABLE IF NOT EXISTS `department` (
  `DPT_id` int(11) NOT NULL AUTO_INCREMENT,
  `dpt_name` varchar(200) NOT NULL,
  `dpt_status` varchar(5) NOT NULL DEFAULT '1',
  `dpt_crdt_by` int(11) NOT NULL,
  `dpt_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dpt_updt_by` int(11) NOT NULL,
  `dpt_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`DPT_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.department: ~2 rows (approximately)
DELETE FROM `department`;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`DPT_id`, `dpt_name`, `dpt_status`, `dpt_crdt_by`, `dpt_crdt_dt`, `dpt_updt_by`, `dpt_updt_dt`) VALUES
	(1, 'Admin', '1', 0, '0000-00-00 00:00:00', 0, '2017-04-07 01:07:19'),
	(2, 'Developer', '1', 0, '0000-00-00 00:00:00', 0, '2017-04-07 01:07:19');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table easynow.document
CREATE TABLE IF NOT EXISTS `document` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `doc_type_id` int(11) NOT NULL,
  `doc_name` varchar(200) NOT NULL,
  `doc_image` varchar(200) NOT NULL,
  `doc_order_by` int(11) NOT NULL,
  `doc_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `doc_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `doc_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doc_updt_by` int(11) NOT NULL COMMENT 'people id',
  `doc_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.document: ~0 rows (approximately)
DELETE FROM `document`;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Dumping structure for table easynow.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(20) NOT NULL,
  `emp_dept` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `emp_ppl_id` int(11) NOT NULL,
  `emp_designation` varchar(200) NOT NULL,
  `emp_reporting_to` int(11) NOT NULL,
  `emp_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `emp_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `emp_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emp_updt_by` int(11) NOT NULL COMMENT 'people id',
  `emp_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_code` (`emp_code`),
  KEY `employee_fk0` (`emp_ppl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.employee: ~0 rows (approximately)
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`emp_id`, `emp_code`, `emp_dept`, `emp_ppl_id`, `emp_designation`, `emp_reporting_to`, `emp_status`, `emp_crdt_by`, `emp_crdt_dt`, `emp_updt_by`, `emp_updt_dt`) VALUES
	(1, '', 1, 1, '', 0, 1, 1, '2019-01-21 06:51:29', 0, '2019-01-21 11:21:29');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table easynow.event
CREATE TABLE IF NOT EXISTS `event` (
  `evt_id` int(11) NOT NULL AUTO_INCREMENT,
  `evt_code` varchar(50) NOT NULL,
  `evt_name` varchar(150) NOT NULL,
  `evt_date` date NOT NULL,
  `evt_desc` varchar(200) NOT NULL,
  `evt_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `evt_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `evt_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `evt_updt_by` int(11) NOT NULL COMMENT 'people id',
  `evt_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`evt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.event: ~0 rows (approximately)
DELETE FROM `event`;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Dumping structure for table easynow.event_people
CREATE TABLE IF NOT EXISTS `event_people` (
  `epl_id` int(11) NOT NULL AUTO_INCREMENT,
  `epl_evt_id` int(11) NOT NULL COMMENT 'foreign key people id',
  `epl_ppl_id` int(11) NOT NULL COMMENT 'foreign key people id',
  `epl_remark` varchar(150) NOT NULL,
  `epl_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `epl_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `epl_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `epl_updt_by` int(11) NOT NULL COMMENT 'people id',
  `epl_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`epl_id`),
  KEY `event_people_fk0` (`epl_evt_id`),
  CONSTRAINT `event_people_fk0` FOREIGN KEY (`epl_evt_id`) REFERENCES `event` (`evt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.event_people: ~0 rows (approximately)
DELETE FROM `event_people`;
/*!40000 ALTER TABLE `event_people` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_people` ENABLE KEYS */;

-- Dumping structure for table easynow.forgot_password_transaction
CREATE TABLE IF NOT EXISTS `forgot_password_transaction` (
  `fpt_id` int(11) NOT NULL AUTO_INCREMENT,
  `fpt_ppl_id` int(11) NOT NULL,
  `fpt_code` varchar(150) NOT NULL,
  `fpt_status` int(11) NOT NULL COMMENT '1= active, 2=inactive',
  `fpt_crtd_dt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fpt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.forgot_password_transaction: ~0 rows (approximately)
DELETE FROM `forgot_password_transaction`;
/*!40000 ALTER TABLE `forgot_password_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `forgot_password_transaction` ENABLE KEYS */;

-- Dumping structure for table easynow.form_access
CREATE TABLE IF NOT EXISTS `form_access` (
  `fma_id` int(11) NOT NULL AUTO_INCREMENT,
  `fma_usr_id` int(11) DEFAULT NULL,
  `fma_mnu_id` int(11) DEFAULT NULL,
  `fma_sbm_id` int(11) DEFAULT NULL,
  `fma_access` int(11) DEFAULT NULL,
  `fma_add` int(11) DEFAULT NULL,
  `fma_edit` int(11) DEFAULT NULL,
  `fma_delete` int(11) DEFAULT NULL,
  `fma_list` int(11) DEFAULT NULL,
  `fma_detail` int(11) DEFAULT NULL,
  `fma_export` int(11) DEFAULT NULL,
  `fma_print` int(11) DEFAULT NULL,
  `fma_private` int(11) DEFAULT NULL,
  `fma_status` char(50) DEFAULT 'Y',
  PRIMARY KEY (`fma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.form_access: ~4 rows (approximately)
DELETE FROM `form_access`;
/*!40000 ALTER TABLE `form_access` DISABLE KEYS */;
INSERT INTO `form_access` (`fma_id`, `fma_usr_id`, `fma_mnu_id`, `fma_sbm_id`, `fma_access`, `fma_add`, `fma_edit`, `fma_delete`, `fma_list`, `fma_detail`, `fma_export`, `fma_print`, `fma_private`, `fma_status`) VALUES
	(1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'Y'),
	(2, 1, 3, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'Y'),
	(3, 1, 12, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'Y'),
	(4, 1, 6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'Y');
/*!40000 ALTER TABLE `form_access` ENABLE KEYS */;

-- Dumping structure for table easynow.gallery_set
CREATE TABLE IF NOT EXISTS `gallery_set` (
  `gls_id` int(11) NOT NULL AUTO_INCREMENT,
  `gls_type` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `gls_name` varchar(200) NOT NULL,
  `gls_image` varchar(200) NOT NULL,
  `gls_order_by` int(11) NOT NULL,
  `gls_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `gls_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `gls_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gls_updt_by` int(11) NOT NULL COMMENT 'people id',
  `gls_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gls_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.gallery_set: ~5 rows (approximately)
DELETE FROM `gallery_set`;
/*!40000 ALTER TABLE `gallery_set` DISABLE KEYS */;
INSERT INTO `gallery_set` (`gls_id`, `gls_type`, `gls_name`, `gls_image`, `gls_order_by`, `gls_status`, `gls_crdt_by`, `gls_crdt_dt`, `gls_updt_by`, `gls_updt_dt`) VALUES
	(5, 1, 'Award', '31091926_1657493574334866_8432892935342653440_n.jpg', 1, 1, 0, '2018-08-11 00:00:00', 0, '2018-08-11 05:59:59'),
	(6, 1, 'Trophy', '35922763_1723901224360767_8979079936350355456_n.jpg', 1, 1, 0, '2018-08-11 00:00:00', 0, '2018-08-11 06:00:25'),
	(7, 1, 'quote', '24296294_1519497784801113_3507521711280895780_n.jpg', 1, 1, 0, '2018-08-11 00:00:00', 0, '2018-08-11 06:01:02'),
	(8, 2, 'Logo', 'new-logo.png', 1, 1, 0, '2018-10-24 00:00:00', 0, '2018-10-24 14:51:51'),
	(12, 1, 'Awrd', 'index.jpg', 1, 1, 0, '2018-10-30 00:00:00', 0, '2018-10-30 14:46:50');
/*!40000 ALTER TABLE `gallery_set` ENABLE KEYS */;

-- Dumping structure for table easynow.gen_prm
CREATE TABLE IF NOT EXISTS `gen_prm` (
  `gnp_id` int(11) NOT NULL AUTO_INCREMENT,
  `gnp_name` varchar(200) NOT NULL,
  `gnp_value` int(11) NOT NULL,
  `gnp_group` varchar(100) NOT NULL,
  `gnp_order` int(11) NOT NULL,
  `gnp_description` varchar(200) NOT NULL,
  `gnp_visible` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1= visible,2=not visible',
  `gnp_default` tinyint(4) NOT NULL DEFAULT '2',
  `gnp_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `gnp_crdt_by` int(11) NOT NULL COMMENT 'person_id',
  `gnp_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gnp_updt_by` int(11) NOT NULL COMMENT 'person_id',
  `gnp_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gnp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.gen_prm: ~105 rows (approximately)
DELETE FROM `gen_prm`;
/*!40000 ALTER TABLE `gen_prm` DISABLE KEYS */;
INSERT INTO `gen_prm` (`gnp_id`, `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
	(1, 'Active', 1, 'active_status', 1, 'sadasd', 2, 0, 1, 0, '0000-00-00 00:00:00', 620, '2018-11-05 12:56:38'),
	(2, 'In Active', 2, 'active_status', 2, '', 2, 1, 1, 0, '0000-00-00 00:00:00', 620, '2019-01-02 05:25:23'),
	(3, 'Deletes', 3, 'active_status', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 119, '2018-11-03 13:00:22'),
	(4, 'Company', 1, 'people_type', 1, 'active', 1, 1, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-13 10:46:27'),
	(5, 'Leads', 2, 'people_type', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2019-01-23 10:44:35'),
	(6, 'Candidate', 3, 'people_type', 8, '', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, '2019-01-22 10:29:47'),
	(7, 'Event', 4, 'people_type', 3, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2019-01-23 10:45:31'),
	(8, 'Vendor', 5, 'people_type', 6, '', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, '2019-01-22 10:29:50'),
	(9, 'Client', 6, 'people_type', 5, '', 1, 0, 0, 0, '0000-00-00 00:00:00', 0, '2019-01-22 10:29:53'),
	(10, 'Team', 7, 'people_type', 4, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2019-01-23 10:45:31'),
	(11, 'Male', 1, 'ppl_gender', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2019-01-21 18:27:46'),
	(12, 'Female', 2, 'ppl_gender', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2019-01-21 18:27:48'),
	(13, 'Website', 1, 'led_src', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(14, 'CRM', 2, 'led_src', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(15, 'Class 1', 1, 'led_class', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(16, 'Class 2', 2, 'led_class', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(17, 'Hot', 1, 'led_temp', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 620, '2018-11-03 17:50:47'),
	(18, 'Cold', 2, 'led_temp', 2, '', 1, 1, 1, 0, '0000-00-00 00:00:00', 620, '2018-11-03 17:50:47'),
	(19, 'Pending', 1, 'led_lead_status', 1, '', 1, 1, 1, 0, '0000-00-00 00:00:00', 119, '2018-11-03 18:51:14'),
	(20, 'Won', 2, 'led_lead_status', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 119, '2018-11-03 18:51:14'),
	(21, 'Stage 1', 1, 'led_lead_stage', 1, '', 1, 1, 1, 0, '0000-00-00 00:00:00', 0, '2019-01-24 10:34:19'),
	(22, 'Stage 2', 2, 'led_lead_stage', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(23, 'Web Developer', 1, 'cdt_role', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(24, 'Team Leader', 2, 'cdt_role', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(25, '1 months', 1, 'cdt_notice_period', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(26, '2 months', 2, 'cdt_notice_period', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(27, 'Yes', 1, 'enable_login', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(28, 'No', 2, 'enable_login', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(29, 'Product 1', 1, 'led_prod', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(30, 'Product 2', 2, 'led_prod', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(31, 'People', 1, 'company_type', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(32, 'People', 1, 'event_type', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(33, 'Login ', 1, 'gallery_type', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(34, 'Logos', 2, 'gallery_type', 1, 'Test Description', 2, 0, 1, 1, '2018-08-10 09:38:37', 1, '2018-11-03 12:58:13'),
	(35, 'SCGT Kandivali', 3, 'led_src', 2, '', 2, 0, 1, 1, '2018-08-10 09:45:54', 0, '2018-11-03 12:58:13'),
	(36, 'SCGT Mumbai', 4, 'led_src', 4, '', 2, 0, 1, 1, '2018-08-10 09:46:26', 0, '2018-11-03 12:58:13'),
	(37, 'BNI Fantastic Self', 5, 'led_src', 2, 'Self Ref', 2, 0, 1, 1, '2018-08-10 09:47:03', 0, '2018-11-03 12:58:13'),
	(38, 'Income', 1, 'cashbook_type', 1, '', 2, 0, 1, 1, '2018-08-11 07:06:40', 1, '2018-11-03 12:58:13'),
	(39, 'Expense', 2, 'cashbook_type', 2, '', 2, 0, 1, 1, '2018-08-11 07:06:40', 1, '2018-11-03 12:58:13'),
	(40, 'Approved', 1, 'approval_status', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(41, 'Reject', 2, 'approval_status', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(42, 'Pending', 3, 'approval_status', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(43, 'Direct', 1, 'cashbook_transaction_type', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(44, 'User', 2, 'cashbook_transaction_type', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(45, 'Purchase', 3, 'cashbook_transaction_type', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(46, 'Invoice', 4, 'cashbook_transaction_type', 4, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(47, 'Mobile', 1, 'people_login_type', 1, '', 1, 0, 1, 0, '2018-08-14 11:17:17', 0, '2019-01-22 19:32:54'),
	(48, 'Email', 2, 'people_login_type', 2, '', 1, 0, 1, 0, '2018-08-14 11:17:17', 0, '2019-01-22 19:32:52'),
	(49, 'Team', 1, 'people_login_dept', 1, '', 1, 0, 1, 0, '2018-08-14 11:17:17', 0, '2019-01-22 19:33:05'),
	(50, 'Company', 2, 'people_login_dept', 2, '', 2, 0, 1, 0, '2018-08-14 11:17:17', 0, '2018-11-03 12:58:13'),
	(51, 'Client', 3, 'people_login_dept', 3, '', 2, 0, 1, 0, '2018-08-14 11:17:17', 0, '2018-11-03 12:58:13'),
	(52, 'Vendor', 4, 'people_login_dept', 4, '', 2, 0, 1, 0, '2018-08-14 11:17:17', 0, '2018-11-03 12:58:13'),
	(53, 'Industry ', 1, 'cmp_industry_type', 1, '', 1, 0, 1, 47, '2018-08-14 11:17:17', 119, '2018-11-03 12:58:13'),
	(54, 'Textile', 2, 'cmp_industry_type', 2, '', 2, 0, 1, 47, '2018-08-18 08:52:59', 47, '2018-11-03 12:58:13'),
	(55, 'Leather', 3, 'cmp_industry_type', 3, '', 2, 0, 1, 47, '2018-08-18 08:53:54', 0, '2018-11-03 12:58:13'),
	(56, 'Other', 3, 'ppl_gender', 3, '', 2, 0, 1, 119, '2018-08-20 15:21:10', 0, '2018-11-03 12:58:13'),
	(57, 'Existing Client', 6, 'led_src', 2, '', 2, 0, 1, 119, '2018-08-22 05:56:29', 0, '2018-11-03 12:58:13'),
	(58, 'Online Enquiry ', 7, 'led_src', 6, '', 2, 1, 1, 119, '2018-08-22 05:58:04', 0, '2018-11-03 19:06:07'),
	(59, 'On Hold', 3, 'led_lead_status', 3, '', 2, 0, 1, 620, '2018-08-23 16:51:40', 0, '2018-11-03 12:58:13'),
	(60, 'Lost', 4, 'led_lead_status', 4, '', 2, 0, 1, 620, '2018-08-23 16:52:23', 0, '2018-11-03 12:58:13'),
	(61, 'Chill', 3, 'led_temp', 3, '', 2, 0, 1, 620, '2018-08-27 05:07:37', 0, '2018-11-03 12:58:13'),
	(62, 'IT', 1, 'cmp_type', 1, '', 1, 0, 1, 620, '2018-08-27 08:13:40', 0, '2018-11-03 12:58:13'),
	(63, '1 cr', 1, 'cmp_anl_rev', 1, '', 1, 0, 1, 620, '2018-08-27 08:13:40', 0, '2018-11-03 12:58:13'),
	(64, 'sms', 3, 'lfp_type', 1, 'sms', 1, 0, 1, 620, '2018-08-27 08:39:31', 620, '2018-11-03 12:58:13'),
	(65, 'Done', 1, 'lfp_followup_status', 1, '', 1, 0, 1, 620, '2018-08-27 08:39:31', 669, '2018-11-03 12:58:13'),
	(66, 'Pending', 2, 'lfp_followup_status', 2, '', 2, 0, 1, 620, '2018-08-27 14:09:21', 669, '2018-11-03 12:58:13'),
	(67, 'company_profile', 1, 'doc_type', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
	(68, 'Mr.', 1, 'ppl_title', 1, '', 1, 0, 1, 0, '2018-09-12 13:52:34', 0, '2018-11-03 12:58:13'),
	(69, 'Mrs', 2, 'ppl_title', 2, '', 1, 0, 1, 0, '2018-09-12 13:53:13', 0, '2018-11-03 12:58:13'),
	(70, 'Textbox', 1, 'adm_type', 1, 'textbox', 2, 0, 1, 620, '2018-09-13 14:13:05', 0, '2018-11-03 12:58:13'),
	(71, 'Text Area', 2, 'adm_type', 2, 'textarea', 2, 0, 1, 620, '2018-09-13 14:13:13', 620, '2018-11-03 12:58:13'),
	(72, 'Dropdown', 3, 'adm_type', 3, 'dropdown', 2, 0, 1, 620, '2018-09-14 08:21:00', 0, '2018-11-13 17:18:00'),
	(73, 'Dropdown Multiple', 4, 'adm_type', 4, 'dropdown_multiple', 2, 0, 1, 620, '2018-09-14 08:22:23', 0, '2018-11-13 16:22:59'),
	(74, 'Number', 5, 'adm_type', 5, 'number', 2, 0, 1, 620, '2018-09-14 08:22:40', 0, '2018-11-03 12:58:13'),
	(75, 'Email', 6, 'adm_type', 6, 'email', 2, 0, 1, 620, '2018-09-14 08:23:02', 0, '2018-11-03 12:58:13'),
	(76, 'Url', 7, 'adm_type', 7, 'url', 2, 0, 1, 620, '2018-09-14 08:23:50', 0, '2018-11-03 12:58:13'),
	(77, 'User', 1, 'sbt_type', 1, '', 1, 0, 1, 620, '2018-09-18 09:02:40', 0, '2018-11-03 12:58:13'),
	(78, 'Stage', 2, 'sbt_type', 2, '', 1, 0, 1, 620, '2018-09-18 09:03:20', 0, '2018-11-03 12:58:13'),
	(79, 'Product', 3, 'sbt_type', 3, '', 1, 0, 1, 620, '2018-09-18 09:04:00', 0, '2018-11-03 12:58:13'),
	(80, 'Source', 4, 'sbt_type', 4, '', 1, 0, 1, 620, '2018-09-18 09:04:36', 0, '2018-11-03 12:58:13'),
	(81, 'Monthly', 1, 'tgt_durability', 1, '', 1, 0, 1, 620, '2018-09-18 09:05:17', 0, '2018-11-03 12:58:13'),
	(82, 'Quarterly', 2, 'tgt_durability', 2, '', 1, 0, 1, 620, '2018-09-18 09:05:58', 0, '2018-11-03 12:58:13'),
	(83, 'Yearly', 3, 'tgt_durability', 3, '', 1, 0, 1, 620, '2018-09-18 09:06:25', 0, '2018-11-03 12:58:13'),
	(84, 'email ', 4, 'lfp_type', 2, 'email\r\n', 2, 0, 1, 620, '2018-09-28 08:09:10', 0, '2018-11-03 12:58:13'),
	(85, 'Open', 1, 'tsk_progress_status', 1, '', 2, 0, 1, 0, '2018-09-28 18:31:31', 0, '2018-11-03 12:58:13'),
	(86, 'Review', 2, 'tsk_progress_status', 2, '', 2, 0, 1, 0, '2018-09-30 18:31:33', 0, '2018-11-03 12:58:13'),
	(87, 'Low', 1, 'tsk_priority', 1, '', 2, 0, 1, 0, '2018-09-28 19:42:09', 0, '2018-11-03 12:58:13'),
	(88, 'Medium', 2, 'tsk_priority', 2, '', 2, 0, 1, 0, '2018-09-28 19:42:10', 0, '2018-11-03 12:58:13'),
	(89, 'Type1', 1, 'tsk_type', 1, '', 2, 0, 1, 0, '2018-09-29 13:06:49', 0, '2018-11-03 12:58:13'),
	(90, 'Type1', 2, 'tsk_type', 2, '', 2, 0, 1, 0, '2018-09-29 13:06:51', 0, '2018-11-03 12:58:13'),
	(93, 'High', 3, 'tsk_priority', 3, '', 2, 0, 1, 0, '2018-09-29 16:56:14', 0, '2018-11-03 12:58:13'),
	(94, 'Critical', 4, 'tsk_priority', 4, '', 2, 0, 1, 0, '2018-09-29 16:56:25', 0, '2018-11-03 12:58:13'),
	(95, 'Released', 3, 'tsk_progress_status', 3, '', 2, 0, 1, 0, '2018-09-29 17:00:36', 0, '2018-11-03 12:58:13'),
	(96, 'Closed', 4, 'tsk_progress_status', 4, '', 2, 0, 1, 0, '2018-09-29 17:00:46', 0, '2018-11-03 12:58:13'),
	(97, 'Yes', 1, 'mtg_status', 1, '', 2, 0, 1, 0, '2018-10-01 18:52:56', 0, '2018-11-03 12:58:13'),
	(98, 'No', 2, 'mtg_status', 2, '', 2, 0, 1, 0, '2018-10-01 18:52:58', 0, '2018-11-03 12:58:13'),
	(99, 'Additional Details', 8, 'people_type', 4, '', 1, 0, 0, 0, '2018-10-11 15:14:47', 0, '2019-01-22 10:30:01'),
	(100, 'Mumbai', 1, 'university', 1, 'dropdown', 2, 0, 1, 620, '2018-10-12 13:37:23', 0, '2018-11-03 12:58:13'),
	(101, 'Pune', 2, 'university', 2, 'dropdown', 2, 0, 1, 620, '2018-10-12 13:37:36', 0, '2018-11-03 12:58:13'),
	(102, 'Miss', 3, 'ppl_title', 3, '', 2, 0, 1, 620, '2018-10-15 14:10:35', 0, '2018-11-03 12:58:13'),
	(103, 'Home', 1, 'people_contact_type', 1, '', 2, 0, 1, 0, '2018-10-25 12:11:59', 0, '2018-11-03 12:58:13'),
	(104, 'Office', 2, 'people_contact_type', 2, '', 2, 0, 1, 0, '2018-10-25 12:12:00', 0, '2018-11-03 12:58:13'),
	(105, 'Hindi', 1, 'caste', 1, '', 2, 0, 1, 669, '2018-10-25 09:09:55', 0, '2018-11-03 12:58:13'),
	(106, 'Muslim', 2, 'caste', 2, '', 2, 0, 1, 669, '2018-10-25 09:10:19', 0, '2018-11-03 12:58:13'),
	(107, 'Email', 9, 'people_type', 9, '', 2, 2, 0, 620, '2018-11-16 12:39:22', 0, '2019-01-22 10:30:09'),
	(108, 'New', 1, 'led_type', 1, '', 1, 1, 1, 1, '2019-01-24 09:55:36', 0, '2019-01-24 09:55:36'),
	(109, 'Existing', 2, 'led_type', 2, '', 1, 1, 1, 1, '2019-01-24 09:56:16', 0, '2019-01-24 09:56:16'),
	(110, 'Not Interested', 1, 'led_loss_reason', 1, '', 1, 1, 1, 1, '2019-01-24 18:26:02', 0, '2019-01-24 18:26:02'),
	(111, 'Got a better deal', 2, 'led_loss_reason', 2, '', 1, 1, 1, 1, '2019-01-24 18:26:02', 0, '2019-01-24 18:26:02');
/*!40000 ALTER TABLE `gen_prm` ENABLE KEYS */;

-- Dumping structure for table easynow.gen_prm_name
CREATE TABLE IF NOT EXISTS `gen_prm_name` (
  `gpn_id` int(11) NOT NULL AUTO_INCREMENT,
  `gpn_group` varchar(50) NOT NULL,
  `gpn_title` varchar(50) NOT NULL,
  `gpn_visible` int(11) NOT NULL COMMENT '1= visible, 2= not visible',
  `gpn_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gnp_group =active_status',
  `gpn_crdt_by` int(11) NOT NULL COMMENT 'foreign key ppl_id',
  `gpn_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gpn_updt_by` int(11) NOT NULL COMMENT 'foreign key ppl_id',
  `gpn_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gpn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.gen_prm_name: ~32 rows (approximately)
DELETE FROM `gen_prm_name`;
/*!40000 ALTER TABLE `gen_prm_name` DISABLE KEYS */;
INSERT INTO `gen_prm_name` (`gpn_id`, `gpn_group`, `gpn_title`, `gpn_visible`, `gpn_status`, `gpn_crdt_by`, `gpn_crdt_dt`, `gpn_updt_by`, `gpn_updt_dt`) VALUES
	(1, 'active_status', 'Active Status', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-11-03 17:48:29'),
	(2, 'people_type', 'People Type', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(4, 'ppl_gender', 'People Gender', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(5, 'led_src', 'Lead Source', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(6, 'led_class', 'Lead Class', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(7, 'led_temp', 'Lead Temp', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(8, 'led_lead_status', 'Lead Status', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(9, 'cdt_role', 'Candidate Role', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(10, 'cdt_notice_period', 'Candidate Notice Period', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(11, 'enable_login', 'Login', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(12, 'people_login_type', 'Login Type', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(13, 'people_login_dept', 'Login Department', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(14, 'company_type', 'Company Type', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(15, 'event_type', 'Event Type', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(16, 'gallery_type', 'Gallery Type', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(17, 'cashbook_type', 'Cashbook Type', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(18, 'cashbook_transaction_type', 'Cashbook Transaction Type', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(19, 'approval_status', 'Approval Status', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(20, 'cmp_industry_type', 'Industry Type', 1, 1, 1, '2018-08-17 11:17:34', 0, '2018-08-17 11:17:34'),
	(21, 'cmp_type', 'Company Type', 1, 1, 1, '2018-08-17 16:47:34', 0, '2018-08-17 16:47:34'),
	(22, 'cmp_anl_rev', 'Company Annual Revenue', 1, 1, 1, '2018-08-17 16:47:34', 0, '2018-08-17 16:47:34'),
	(23, 'lfp_followup_status', 'Lead Follow Up Status', 1, 1, 1, '2018-08-17 16:47:34', 0, '2018-08-17 16:47:34'),
	(24, 'lfp_type', 'Lead Follow Up Type', 1, 1, 1, '2018-08-17 16:47:34', 0, '2018-08-17 16:47:34'),
	(25, 'datatable_list', 'DataTable List', 1, 1, 0, '2018-09-05 10:45:57', 0, '2018-09-05 10:45:57'),
	(26, 'ppl_title', 'People TItle', 1, 1, 0, '2018-09-12 08:20:35', 0, '2018-09-12 08:41:27'),
	(27, 'adm_type', 'Additional detail Type', 1, 1, 1, '2018-09-13 12:11:36', 0, '2018-09-14 06:12:25'),
	(28, 'sbt_type', 'Target Sub Type', 1, 1, 0, '2018-09-05 10:45:57', 0, '2018-09-05 10:45:57'),
	(29, 'tgt_durability', 'Target Durability', 1, 1, 0, '2018-09-05 10:45:57', 0, '2018-09-05 10:45:57'),
	(32, 'new_address', 'New Address', 1, 1, 0, '2018-10-11 14:21:12', 0, '2018-10-11 15:00:22'),
	(33, 'new_cell_no', 'New Cell No', 1, 1, 0, '2018-10-11 14:24:03', 0, '2018-10-11 15:00:18'),
	(34, 'university', 'University', 1, 1, 0, '2018-10-12 16:30:58', 0, '2018-10-12 16:30:58'),
	(35, 'caste', 'Caste', 1, 1, 0, '2018-10-12 17:42:12', 0, '2018-10-12 17:42:12'),
	(36, 'led_type', 'Lead Type', 1, 1, 0, '2019-01-24 09:57:03', 0, '2019-01-24 09:57:03'),
	(37, 'led_lead_stage', 'Lead Stage', 1, 1, 0, '2019-01-24 10:34:10', 0, '2019-01-24 10:34:10'),
	(38, 'led_loss_reason', 'Lead Remark', 1, 1, 0, '2019-01-24 18:26:01', 0, '2019-01-24 18:26:01');
/*!40000 ALTER TABLE `gen_prm_name` ENABLE KEYS */;

-- Dumping structure for table easynow.lead
CREATE TABLE IF NOT EXISTS `lead` (
  `led_id` int(11) NOT NULL AUTO_INCREMENT,
  `led_ppl_id` int(11) NOT NULL,
  `led_code` varchar(20) NOT NULL,
  `led_title` varchar(200) NOT NULL,
  `led_temp` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `led_src` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `led_ref_by` int(11) NOT NULL,
  `led_cmp_id` int(11) NOT NULL,
  `led_prod` varchar(50) NOT NULL COMMENT 'foreign key product id',
  `led_amount` float NOT NULL,
  `led_managed_by` int(11) NOT NULL COMMENT 'foreign key people id',
  `led_remark` varchar(200) NOT NULL,
  `led_lead_status` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `led_campaign` int(11) NOT NULL COMMENT 'Foriegn key campaign id',
  `led_type` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `led_lead_stage` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `led_loss_reason` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `led_loss_remark` varchar(200) NOT NULL,
  `led_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `led_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `led_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `led_updt_by` int(11) NOT NULL COMMENT 'people id',
  `led_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`led_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.lead: ~3 rows (approximately)
DELETE FROM `lead`;
/*!40000 ALTER TABLE `lead` DISABLE KEYS */;
INSERT INTO `lead` (`led_id`, `led_ppl_id`, `led_code`, `led_title`, `led_temp`, `led_src`, `led_ref_by`, `led_cmp_id`, `led_prod`, `led_amount`, `led_managed_by`, `led_remark`, `led_lead_status`, `led_campaign`, `led_type`, `led_lead_stage`, `led_loss_reason`, `led_loss_remark`, `led_status`, `led_crdt_by`, `led_crdt_dt`, `led_updt_by`, `led_updt_dt`) VALUES
	(1, 2, '', 'test ', 2, 3, 1, 0, 'undefined', 2500, 1, '', 1, 1, 1, 1, 0, '', 1, 1, '2019-01-23 05:57:58', 1, '2019-01-24 17:20:52'),
	(2, 8, '', 'test 1  ', 2, 7, 0, 0, 'undefined', 4000, 1, '', 4, 1, 2, 7, 1, '', 1, 1, '2019-01-24 10:10:04', 1, '2019-01-24 19:38:15'),
	(3, 3, '', 'test 2   ', 2, 1, 2, 1, 'undefined', 5000, 1, 'stanley ds  ds', 4, 1, 0, 1, 1, '', 1, 1, '2019-01-24 06:09:57', 1, '2019-01-25 11:43:59'),
	(4, 3, '', 'FULL test', 2, 7, 1, 1, '', 5000, 1, 'remark\n', 4, 1, 1, 1, 1, 'test\n', 1, 1, '2019-01-25 07:43:08', 0, '2019-01-25 12:23:14');
/*!40000 ALTER TABLE `lead` ENABLE KEYS */;

-- Dumping structure for table easynow.lead_follow_up
CREATE TABLE IF NOT EXISTS `lead_follow_up` (
  `lfp_id` int(11) NOT NULL AUTO_INCREMENT,
  `lfp_module_type_id` int(11) NOT NULL COMMENT 'foreign key lead id',
  `lfp_next_date` datetime NOT NULL,
  `lfp_followup_status` int(11) NOT NULL,
  `lfp_type` int(11) NOT NULL,
  `lfp_instruction` varchar(500) NOT NULL,
  `lfp_remark` varchar(200) NOT NULL,
  `lfp_done_by` int(11) NOT NULL,
  `lfp_follow_by` int(11) NOT NULL,
  `lfp_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = \r\n\r\nactive_status',
  `lfp_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `lfp_crdt_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `lfp_updt_by` int(11) NOT NULL COMMENT 'people id',
  `lfp_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lfp_type_remark` varchar(200) NOT NULL,
  PRIMARY KEY (`lfp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.lead_follow_up: ~0 rows (approximately)
DELETE FROM `lead_follow_up`;
/*!40000 ALTER TABLE `lead_follow_up` DISABLE KEYS */;
/*!40000 ALTER TABLE `lead_follow_up` ENABLE KEYS */;

-- Dumping structure for table easynow.meeting
CREATE TABLE IF NOT EXISTS `meeting` (
  `mtg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mtg_title` varchar(100) NOT NULL DEFAULT '0',
  `mtg_from_dt_time` datetime NOT NULL,
  `mtg_to_dt_time` datetime NOT NULL,
  `mtg_people` int(11) NOT NULL,
  `mtg_description` blob NOT NULL,
  `mtg_host` int(11) NOT NULL,
  `mtg_lead` int(11) NOT NULL,
  `mtg_task` int(11) NOT NULL,
  `mtg_prod` varchar(50) NOT NULL,
  `mtg_cmp` int(11) NOT NULL,
  `mtg_status` int(11) NOT NULL DEFAULT '1',
  `mtg_crdt_by` int(11) NOT NULL,
  `mtg_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mtg_updt_by` int(11) NOT NULL,
  `mtg_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mtg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.meeting: ~0 rows (approximately)
DELETE FROM `meeting`;
/*!40000 ALTER TABLE `meeting` DISABLE KEYS */;
/*!40000 ALTER TABLE `meeting` ENABLE KEYS */;

-- Dumping structure for table easynow.meeting_att
CREATE TABLE IF NOT EXISTS `meeting_att` (
  `mta_id` int(11) NOT NULL AUTO_INCREMENT,
  `mta_name` varchar(200) NOT NULL,
  `mta_mtg_id` int(11) NOT NULL,
  `mta_path` varchar(200) NOT NULL,
  `mta_user` int(11) NOT NULL,
  `mta_dt` date NOT NULL,
  `mta_status` int(11) NOT NULL DEFAULT '1',
  `mta_crdt_by` int(11) NOT NULL,
  `mta_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mta_updt_by` int(11) NOT NULL,
  `mta_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.meeting_att: ~0 rows (approximately)
DELETE FROM `meeting_att`;
/*!40000 ALTER TABLE `meeting_att` DISABLE KEYS */;
/*!40000 ALTER TABLE `meeting_att` ENABLE KEYS */;

-- Dumping structure for table easynow.menu_master
CREATE TABLE IF NOT EXISTS `menu_master` (
  `mnu_id` int(11) NOT NULL AUTO_INCREMENT,
  `mnu_name` varchar(100) NOT NULL,
  `mnu_order` int(11) NOT NULL,
  `mnu_status` varchar(5) NOT NULL DEFAULT 'Y',
  `mnu_link` varchar(100) NOT NULL,
  `mnu_logo` varchar(100) NOT NULL,
  `mnu_icon` varchar(50) NOT NULL,
  `mnu_crdt_by` int(11) NOT NULL,
  `mnu_crdt_dt` date NOT NULL,
  `mnu_updt_by` int(11) NOT NULL,
  `mnu_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mnu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.menu_master: ~14 rows (approximately)
DELETE FROM `menu_master`;
/*!40000 ALTER TABLE `menu_master` DISABLE KEYS */;
INSERT INTO `menu_master` (`mnu_id`, `mnu_name`, `mnu_order`, `mnu_status`, `mnu_link`, `mnu_logo`, `mnu_icon`, `mnu_crdt_by`, `mnu_crdt_dt`, `mnu_updt_by`, `mnu_updt_dt`) VALUES
	(1, 'People', 1, 'Y', 'people-dashboard', 'fa fa-user icon-people', '', 0, '0000-00-00', 0, '2018-10-22 11:16:10'),
	(2, 'Leads', 2, 'Y', 'lead-list', 'fas fa-chalkboard-teacher icon-lead', '', 0, '0000-00-00', 0, '2018-10-22 11:16:33'),
	(3, 'Company', 3, 'Y', 'company-list', 'fa fa-industry icon-company', '', 0, '0000-00-00', 0, '2018-10-22 11:21:26'),
	(4, 'Client', 4, 'Y', 'client-dashboard', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-22 11:21:28'),
	(5, 'Event', 5, 'Y', 'event-list', 'fas fa-location-arrow icon-event', '', 0, '0000-00-00', 0, '2018-10-22 11:21:32'),
	(6, 'Settings', 6, 'Y', '', 'fa fa-wrench icon-setting', '', 0, '0000-00-00', 0, '2018-10-22 11:21:36'),
	(7, 'Form Access', 7, 'Y', 'form-access', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-25 11:05:16'),
	(8, 'Task', 8, 'Y', 'task-dashboard', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-25 11:05:16'),
	(9, 'Additional Details', 9, 'Y', '', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-25 11:05:16'),
	(10, 'Product', 10, 'Y', 'product-list', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-25 11:05:16'),
	(11, 'Email Template', 11, 'Y', 'email-template-list', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-25 11:05:16'),
	(12, 'Tags', 12, 'Y', 'tags-list', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-25 11:05:16'),
	(13, 'Meeting', 13, 'Y', 'meeting-list', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-25 11:05:16'),
	(14, 'Target', 14, 'Y', 'target-dashboard', 'fas fa-handshake icon-client', '', 0, '0000-00-00', 0, '2018-10-25 11:05:16');
/*!40000 ALTER TABLE `menu_master` ENABLE KEYS */;

-- Dumping structure for table easynow.menu_transaction
CREATE TABLE IF NOT EXISTS `menu_transaction` (
  `MTR_id` int(11) NOT NULL AUTO_INCREMENT,
  `MTR_MNU_id` int(11) NOT NULL,
  `MTR_DPT_id` int(11) NOT NULL,
  `MTR_Status` varchar(5) NOT NULL DEFAULT 'Y',
  `MTR_CRTD_By` int(11) NOT NULL,
  `MTR_CRTD_Date` date NOT NULL,
  `MTR_UPDT_By` int(11) NOT NULL,
  `MTR_UPDT_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MTR_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.menu_transaction: ~6 rows (approximately)
DELETE FROM `menu_transaction`;
/*!40000 ALTER TABLE `menu_transaction` DISABLE KEYS */;
INSERT INTO `menu_transaction` (`MTR_id`, `MTR_MNU_id`, `MTR_DPT_id`, `MTR_Status`, `MTR_CRTD_By`, `MTR_CRTD_Date`, `MTR_UPDT_By`, `MTR_UPDT_Date`) VALUES
	(1, 1, 1, 'Y', 0, '0000-00-00', 0, '2018-10-22 14:24:37'),
	(2, 2, 1, 'Y', 0, '0000-00-00', 0, '2018-10-22 14:24:37'),
	(3, 3, 1, 'Y', 0, '0000-00-00', 0, '2018-10-22 14:24:37'),
	(4, 4, 1, 'Y', 0, '0000-00-00', 0, '2018-10-22 14:24:37'),
	(5, 5, 1, 'Y', 0, '0000-00-00', 0, '2018-10-22 14:24:37'),
	(6, 6, 1, 'Y', 0, '0000-00-00', 0, '2018-10-22 14:24:37');
/*!40000 ALTER TABLE `menu_transaction` ENABLE KEYS */;

-- Dumping structure for table easynow.people
CREATE TABLE IF NOT EXISTS `people` (
  `ppl_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppl_code` varchar(20) DEFAULT NULL,
  `ppl_name` varchar(200) NOT NULL,
  `ppl_gender` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `ppl_dob` date NOT NULL,
  `ppl_address` varchar(100) NOT NULL,
  `ppl_met_on` date NOT NULL,
  `ppl_remark` varchar(200) NOT NULL,
  `ppl_title_id` int(11) NOT NULL,
  `ppl_username` varchar(100) NOT NULL,
  `ppl_password` varchar(100) NOT NULL,
  `ppl_login_type` varchar(50) NOT NULL COMMENT 'gnp group same as col name',
  `ppl_login_dept` varchar(50) NOT NULL COMMENT 'gnp group same as col name',
  `ppl_tgs_id` varchar(150) NOT NULL DEFAULT '' COMMENT 'foreign key tags id',
  `ppl_profile_image` varchar(200) NOT NULL,
  `ppl_social_fb` varchar(400) DEFAULT NULL,
  `ppl_social_linkedin` varchar(400) DEFAULT NULL,
  `ppl_social_instagram` varchar(400) DEFAULT NULL,
  `ppl_social_twitter` varchar(400) DEFAULT NULL,
  `ppl_social_youtube` varchar(400) DEFAULT NULL,
  `ppl_website` varchar(400) DEFAULT NULL,
  `ppl_managed_by` int(11) NOT NULL COMMENT 'managed by people id',
  `ppl_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status; 1: Active;2:inactive',
  `ppl_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `ppl_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ppl_updt_by` int(11) NOT NULL COMMENT 'people id',
  `ppl_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ppl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.people: ~8 rows (approximately)
DELETE FROM `people`;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` (`ppl_id`, `ppl_code`, `ppl_name`, `ppl_gender`, `ppl_dob`, `ppl_address`, `ppl_met_on`, `ppl_remark`, `ppl_title_id`, `ppl_username`, `ppl_password`, `ppl_login_type`, `ppl_login_dept`, `ppl_tgs_id`, `ppl_profile_image`, `ppl_social_fb`, `ppl_social_linkedin`, `ppl_social_instagram`, `ppl_social_twitter`, `ppl_social_youtube`, `ppl_website`, `ppl_managed_by`, `ppl_status`, `ppl_crdt_by`, `ppl_crdt_dt`, `ppl_updt_by`, `ppl_updt_dt`) VALUES
	(1, NULL, 'Admin', 0, '0000-00-00', '', '2019-01-21', '', 1, 'admin', 'Q2hubVVxdEdRYmhLQXlMVE0vSW13QT09', '', '1', '', '', '', '', '', '', '', '', 0, 1, 0, '2019-01-21 11:15:39', 1, '2019-01-22 14:13:20'),
	(2, NULL, 'user 1', 1, '0000-00-00', '', '2019-01-22', '', 1, '', '', '', '', '', 'b6.jpg', 'https://www.facebook.com/VinayPagare.in', 'https://linkedin.com/in/vinaypagare', 'https://www.instagram.com/vinaypagare.in/', 'https://twitter.com/vinaypagare_in', 'https://www.facebook.com/VinayPagare.in', 'http://nextasy.in/', 1, 1, 1, '2019-01-22 10:57:51', 1, '2019-01-22 15:05:07'),
	(3, NULL, 'stanley', 1, '0000-00-00', '', '2019-01-22', '', 1, '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, '2019-01-22 15:18:35', 1, '2019-01-22 17:39:47'),
	(4, NULL, 'test 1', 1, '0000-00-00', '', '2019-01-22', '', 1, '', '', '', '', '', '', '', '', '', '', '', '', 2, 1, 1, '2019-01-22 18:41:44', 1, '2019-01-22 18:42:09'),
	(5, NULL, 'stanley', 1, '1996-04-30', 'kandiwali', '2019-01-23', 'developer', 1, '', '', '1,2', '', '1', 'b4.jpg', 'https://www.facebook.com/VinayPagare.in', '', 'https://www.instagram.com/vinaypagare.in/', 'https://twitter.com/vinaypagare_in', 'https://www.facebook.com/VinayPagare.in', '', 1, 1, 1, '2019-01-23 12:29:51', 1, '2019-01-23 12:53:02'),
	(6, NULL, 'Pooja Bamane ', 2, '0000-00-00', '', '2019-01-23', '', 2, '', '', '1,2', '', '', '', '', '', '', '', '', '', 1, 1, 1, '2019-01-23 12:42:41', 0, '2019-01-23 12:42:41'),
	(7, NULL, 'lead test', 1, '0000-00-00', '', '2019-01-24', '', 1, '', '', '1,2', '', '', '', '', '', '', '', '', '', 1, 1, 1, '2019-01-24 10:05:08', 0, '2019-01-24 10:05:08'),
	(8, NULL, 'lead test1', 1, '0000-00-00', '', '2019-01-24', '', 1, '', '', '1,2', '', '', '', '', '', '', '', '', '', 1, 1, 1, '2019-01-24 10:10:04', 0, '2019-01-24 10:10:04');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;

-- Dumping structure for table easynow.people_contact
CREATE TABLE IF NOT EXISTS `people_contact` (
  `pct_id` int(11) NOT NULL AUTO_INCREMENT,
  `pct_ppl_id` int(11) NOT NULL COMMENT 'foreign key people id',
  `pct_type` int(11) NOT NULL COMMENT ' gen_prm group = active_status',
  `pct_value` varchar(50) NOT NULL,
  `pct_active` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `pct_contact_type` int(11) NOT NULL,
  `pct_primary` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1= primary, 2= additional',
  `pct_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `pct_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `pct_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pct_updt_by` int(11) NOT NULL COMMENT 'people id',
  `pct_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.people_contact: ~15 rows (approximately)
DELETE FROM `people_contact`;
/*!40000 ALTER TABLE `people_contact` DISABLE KEYS */;
INSERT INTO `people_contact` (`pct_id`, `pct_ppl_id`, `pct_type`, `pct_value`, `pct_active`, `pct_contact_type`, `pct_primary`, `pct_status`, `pct_crdt_by`, `pct_crdt_dt`, `pct_updt_by`, `pct_updt_dt`) VALUES
	(1, 2, 1, 'user1@gmail.com', 1, 0, 1, 1, 1, '2019-01-22 12:29:00', 1, '2019-01-22 14:41:12'),
	(2, 2, 2, '9686434732', 1, 0, 1, 1, 1, '2019-01-22 12:29:00', 1, '2019-01-22 14:41:12'),
	(3, 3, 1, 'abc@gmail.com', 1, 0, 1, 1, 1, '2019-01-22 16:18:54', 0, '2019-01-22 16:18:54'),
	(4, 3, 2, '9686434731', 1, 0, 1, 1, 1, '2019-01-22 16:18:54', 0, '2019-01-22 16:18:54'),
	(5, 3, 1, 'lancylotdsouza@gmail.com', 1, 0, 2, 1, 0, '2019-01-22 16:34:39', 0, '2019-01-22 16:34:39'),
	(6, 3, 2, '9686434732', 1, 0, 2, 1, 0, '2019-01-22 16:35:01', 0, '2019-01-22 16:35:01'),
	(7, 3, 1, 'abc2@gmail.com', 1, 0, 2, 1, 0, '2019-01-22 16:35:30', 0, '2019-01-22 16:35:30'),
	(8, 4, 1, 'test1@gmail.com', 1, 0, 1, 1, 1, '2019-01-22 18:42:09', 0, '2019-01-22 18:42:09'),
	(9, 4, 2, '1234567890', 1, 0, 1, 1, 1, '2019-01-22 18:42:09', 0, '2019-01-22 18:42:09'),
	(10, 5, 1, 'lancylotdsouza@gmail.com', 1, 0, 1, 1, 1, '2019-01-23 12:29:51', 1, '2019-01-23 12:53:02'),
	(11, 5, 2, '8073884572', 1, 0, 1, 1, 1, '2019-01-23 12:29:51', 1, '2019-01-23 12:53:03'),
	(12, 6, 1, 'poojabamanensp@gmail.com', 1, 0, 1, 1, 1, '2019-01-23 12:42:41', 0, '2019-01-23 12:42:41'),
	(13, 6, 2, '123456789', 1, 0, 1, 1, 1, '2019-01-23 12:42:41', 0, '2019-01-23 12:42:41'),
	(14, 6, 2, '987655678', 1, 0, 2, 1, 0, '2019-01-23 12:43:03', 0, '2019-01-23 12:43:03'),
	(15, 5, 1, 'lancylotdsouza@gmail.com', 0, 0, 2, 1, 0, '2019-01-23 14:35:45', 0, '2019-01-23 14:35:45'),
	(16, 5, 1, 'abc@gmail.com', 0, 0, 2, 1, 0, '2019-01-23 14:36:00', 0, '2019-01-23 14:36:00');
/*!40000 ALTER TABLE `people_contact` ENABLE KEYS */;

-- Dumping structure for table easynow.product
CREATE TABLE IF NOT EXISTS `product` (
  `prd_id` int(11) NOT NULL AUTO_INCREMENT,
  `prd_name` varchar(200) DEFAULT NULL,
  `prd_code` varchar(200) DEFAULT NULL,
  `prd_price` varchar(200) DEFAULT NULL,
  `prd_hsn_code` varchar(200) DEFAULT NULL,
  `prd_gst` int(11) DEFAULT NULL,
  `prd_status` tinyint(1) DEFAULT '1' COMMENT 'gen_prm group = active_status',
  `prd_crdt_by` int(11) DEFAULT NULL,
  `prd_crdt_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `prd_updt_by` int(11) DEFAULT NULL,
  `prd_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.product: ~0 rows (approximately)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table easynow.state_master
CREATE TABLE IF NOT EXISTS `state_master` (
  `stm_id` int(11) NOT NULL AUTO_INCREMENT,
  `stm_name` varchar(255) NOT NULL,
  `stm_code` int(11) NOT NULL,
  `stm_crdt_by` int(11) NOT NULL,
  `stm_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stm_updt_by` int(11) NOT NULL,
  `stm_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stm_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'gen_prm group = active_status ',
  PRIMARY KEY (`stm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.state_master: ~37 rows (approximately)
DELETE FROM `state_master`;
/*!40000 ALTER TABLE `state_master` DISABLE KEYS */;
INSERT INTO `state_master` (`stm_id`, `stm_name`, `stm_code`, `stm_crdt_by`, `stm_crdt_dt`, `stm_updt_by`, `stm_updt_dt`, `stm_status`) VALUES
	(1, 'JAMMU AND KASHMIR', 1, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:35', 1),
	(2, 'HIMACHAL PRADESH', 2, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(3, 'PUNJAB', 3, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(4, 'CHANDIGARH', 4, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(5, 'UTTARAKHAND', 5, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(6, 'HARYANA', 6, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(7, 'DELHI', 7, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(8, 'RAJASTHAN', 8, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(9, 'UTTAR  PRADESH', 9, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(10, 'BIHAR', 10, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(11, 'SIKKIM', 11, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(12, 'ARUNACHAL PRADESH', 12, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(13, 'NAGALAND', 13, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(14, 'MANIPUR', 14, 1, '2017-11-20 00:00:00', 0, '2017-11-21 02:12:32', 1),
	(15, 'MIZORAM', 15, 1, '2017-11-20 00:00:00', 0, '2017-11-21 02:12:22', 1),
	(16, 'TRIPURA', 16, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(17, 'MEGHLAYA', 17, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(18, 'ASSAM', 18, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(19, 'WEST BENGAL', 19, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(20, 'JHARKHAND', 20, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(21, 'ODISHA', 21, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(22, 'CHATTISGARH', 22, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(23, 'MADHYA PRADESH', 23, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(24, 'GUJARAT', 24, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(25, 'DAMAN AND DIU', 25, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(26, 'DADRA AND NAGAR HAVELI', 26, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(27, 'MAHARASHTRA', 27, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(28, 'ANDHRA PRADESH(BEFORE DIVISION)', 28, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(29, 'KARNATAKA', 29, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(30, 'GOA', 30, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(31, 'LAKSHWADEEP', 31, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(32, 'KERALA', 32, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(33, 'TAMIL NADU', 33, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(34, 'PUDUCHERRY', 34, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(35, 'ANDAMAN AND NICOBAR ISLANDS', 35, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(36, 'TELANGANA', 36, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1),
	(37, 'ANDHRA PRADESH (NEW)', 37, 1, '2017-11-20 00:00:00', 0, '2017-11-19 22:36:53', 1);
/*!40000 ALTER TABLE `state_master` ENABLE KEYS */;

-- Dumping structure for table easynow.sub_menu_master
CREATE TABLE IF NOT EXISTS `sub_menu_master` (
  `sbm_id` int(11) NOT NULL AUTO_INCREMENT,
  `sbm_mnu_id` int(11) NOT NULL,
  `sbm_name` varchar(100) NOT NULL,
  `sbm_parent_id` int(11) NOT NULL,
  `sbm_link` varchar(100) NOT NULL,
  `sbm_icon` varchar(100) NOT NULL,
  `sbm_order` int(11) NOT NULL,
  `sbm_group` varchar(50) NOT NULL,
  `sbm_status` varchar(5) NOT NULL DEFAULT 'Y',
  `sbm_crdt_by` int(11) NOT NULL,
  `sbm_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sbm_updt_by` int(11) NOT NULL,
  `sbm_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sbm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.sub_menu_master: ~7 rows (approximately)
DELETE FROM `sub_menu_master`;
/*!40000 ALTER TABLE `sub_menu_master` DISABLE KEYS */;
INSERT INTO `sub_menu_master` (`sbm_id`, `sbm_mnu_id`, `sbm_name`, `sbm_parent_id`, `sbm_link`, `sbm_icon`, `sbm_order`, `sbm_group`, `sbm_status`, `sbm_crdt_by`, `sbm_crdt_dt`, `sbm_updt_by`, `sbm_updt_dt`) VALUES
	(1, 6, 'General Parameter', 6, 'general-parameter-list', 'fa fa-th-list sub-icon-color icon-setting', 1, 'submenu', 'Y', 0, '2018-10-22 11:23:56', 0, '2018-10-22 11:23:56'),
	(2, 6, 'Master Process', 6, 'master-process-list', 'fas fa-cogs sub-icon-color icon-setting', 2, 'submenu', 'Y', 0, '2018-10-22 11:23:56', 0, '2018-10-22 11:24:24'),
	(3, 6, 'Business Parameter', 6, 'business-parameter', 'fa fa-briefcase sub-icon-color icon-setting', 3, 'submenu', 'Y', 0, '2018-10-22 11:24:54', 0, '2018-10-22 11:24:54'),
	(4, 6, 'Gallery Set', 6, 'gallery-set', 'fa fa-briefcase sub-icon-color icon-setting', 4, 'submenu', 'Y', 0, '2018-10-22 11:24:54', 0, '2018-10-22 11:24:54'),
	(5, 6, 'Company Profile', 6, 'company-profile', 'fa fa-briefcase sub-icon-color icon-setting', 5, 'submenu', 'Y', 0, '2018-10-22 11:24:54', 0, '2018-10-22 11:24:54'),
	(6, 9, 'Category', 9, 'additional-detail-category', 'fa fa-briefcase sub-icon-color icon-setting', 1, 'submenu', 'Y', 0, '2018-10-22 11:24:54', 0, '2018-11-14 13:24:11'),
	(7, 9, 'Master', 9, 'additional-detail-master', 'fa fa-briefcase sub-icon-color icon-setting', 2, 'submenu', 'Y', 0, '2018-10-22 11:24:54', 0, '2018-10-22 11:24:54');
/*!40000 ALTER TABLE `sub_menu_master` ENABLE KEYS */;

-- Dumping structure for table easynow.sub_target
CREATE TABLE IF NOT EXISTS `sub_target` (
  `sbt_id` int(11) NOT NULL AUTO_INCREMENT,
  `sbt_tgt_id` int(11) NOT NULL COMMENT 'foreign key target id',
  `sbt_title` varchar(200) NOT NULL,
  `sbt_type` int(11) NOT NULL COMMENT 'gen prm group name same as col name',
  `sbt_type_id` int(11) NOT NULL COMMENT 'id of the respective type (type in gen prm group name =sbt_type)',
  `sbt_durability` int(11) DEFAULT '0' COMMENT 'gen prm group same as col name',
  `sbt_qty` float NOT NULL,
  `sbt_volume` float NOT NULL,
  `sbt_from_dt` date NOT NULL,
  `sbt_to_dt` date NOT NULL,
  `sbt_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group = active_status',
  `sbt_crdt_by` int(11) NOT NULL COMMENT 'foreign key people id',
  `sbt_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sbt_updt_by` int(11) NOT NULL COMMENT 'foreign key people id',
  `sbt_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sbt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.sub_target: ~0 rows (approximately)
DELETE FROM `sub_target`;
/*!40000 ALTER TABLE `sub_target` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_target` ENABLE KEYS */;

-- Dumping structure for table easynow.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `tgs_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgs_name` varchar(150) NOT NULL,
  `tgs_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `tgs_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `tgs_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgs_updt_by` int(11) NOT NULL COMMENT 'people id',
  `tgs_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tgs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.tags: ~0 rows (approximately)
DELETE FROM `tags`;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`tgs_id`, `tgs_name`, `tgs_status`, `tgs_crdt_by`, `tgs_crdt_dt`, `tgs_updt_by`, `tgs_updt_dt`) VALUES
	(1, 'team leader', 1, 0, '2019-01-23 12:29:51', 0, '2019-01-23 12:29:51');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Dumping structure for table easynow.target
CREATE TABLE IF NOT EXISTS `target` (
  `tgt_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgt_title` varchar(200) NOT NULL,
  `tgt_durability` int(11) NOT NULL COMMENT 'gen prm group same as col name',
  `tgt_qty` float NOT NULL,
  `tgt_volume` float NOT NULL,
  `tgt_from_dt` date NOT NULL,
  `tgt_to_dt` date NOT NULL,
  `tgt_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group = active_status',
  `tgt_crdt_by` int(11) NOT NULL COMMENT 'foreign key people id',
  `tgt_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgt_updt_by` int(11) NOT NULL COMMENT 'foreign key people id',
  `tgt_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tgt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.target: ~0 rows (approximately)
DELETE FROM `target`;
/*!40000 ALTER TABLE `target` DISABLE KEYS */;
/*!40000 ALTER TABLE `target` ENABLE KEYS */;

-- Dumping structure for table easynow.task
CREATE TABLE IF NOT EXISTS `task` (
  `tsk_id` int(11) NOT NULL AUTO_INCREMENT,
  `tsk_no` varchar(100) NOT NULL,
  `tsk_title` varchar(100) NOT NULL,
  `tsk_desc` blob NOT NULL,
  `tsk_type` int(11) NOT NULL COMMENT 'gnp_name as task_status',
  `tsk_supporter` int(11) NOT NULL COMMENT 'ppl_id from team/ employee table',
  `tsk_reviewer` int(11) NOT NULL COMMENT 'ppl_id from team/employee table',
  `tsk_led_id` int(11) NOT NULL,
  `tsk_related_ppl` varchar(250) NOT NULL COMMENT 'related people id',
  `tsk_related_prd` varchar(250) NOT NULL COMMENT 'related product ',
  `tsk_related_cmp` varchar(250) NOT NULL COMMENT 'related company id',
  `tsk_progress_status` int(11) NOT NULL COMMENT 'gen prm group name as ticket_status',
  `tsk_client_id` int(11) NOT NULL COMMENT 'foreign key of client table cli_id',
  `tsk_user_ass_by` int(11) NOT NULL COMMENT 'ppl_id from people table',
  `tsk_user_ass_to` int(11) NOT NULL,
  `tsk_priority` int(11) NOT NULL,
  `tsk_prj` int(11) NOT NULL,
  `tsk_due_dt` date NOT NULL,
  `tsk_datetime` datetime NOT NULL,
  `tsk_status` int(11) NOT NULL,
  `tsk_user` int(11) NOT NULL,
  `tsk_crdt_by` int(11) NOT NULL,
  `tsk_crdt_dt` datetime NOT NULL,
  `tsk_updt_by` int(11) NOT NULL,
  `tsk_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tsk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.task: ~0 rows (approximately)
DELETE FROM `task`;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
/*!40000 ALTER TABLE `task` ENABLE KEYS */;

-- Dumping structure for table easynow.task_att
CREATE TABLE IF NOT EXISTS `task_att` (
  `tka_id` int(11) NOT NULL AUTO_INCREMENT,
  `tka_name` varchar(200) NOT NULL,
  `tka_tsk_id` int(11) NOT NULL,
  `tka_path` varchar(200) NOT NULL,
  `tka_user` int(11) NOT NULL,
  `tka_dt` date NOT NULL,
  `tka_status` int(11) NOT NULL DEFAULT '1',
  `tka_crdt_by` int(11) NOT NULL,
  `tka_crdt_dt` datetime NOT NULL,
  `tka_updt_by` int(11) NOT NULL,
  `tka_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tka_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.task_att: ~0 rows (approximately)
DELETE FROM `task_att`;
/*!40000 ALTER TABLE `task_att` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_att` ENABLE KEYS */;

-- Dumping structure for table easynow.task_comment
CREATE TABLE IF NOT EXISTS `task_comment` (
  `tkc_id` int(11) NOT NULL,
  `tkc_comment` blob NOT NULL,
  `tkc_dt` datetime NOT NULL,
  `tkc_user` int(11) NOT NULL,
  `tkc_crdt_by` int(11) NOT NULL,
  `tkc_crdt_dt` datetime NOT NULL,
  `tkc_updt_by` int(11) NOT NULL,
  `tkc_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.task_comment: ~0 rows (approximately)
DELETE FROM `task_comment`;
/*!40000 ALTER TABLE `task_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_comment` ENABLE KEYS */;

-- Dumping structure for table easynow.task_status
CREATE TABLE IF NOT EXISTS `task_status` (
  `tks_id` int(11) NOT NULL,
  `tks_tsk_id` int(11) NOT NULL,
  `tks_sts` int(11) NOT NULL,
  `tks_to_user` int(11) NOT NULL,
  `tks_dt` datetime NOT NULL,
  `tks_by_user` int(11) NOT NULL,
  `tks_crdt_by` int(11) NOT NULL,
  `tks_crdt_dt` datetime NOT NULL,
  `tks_updt_by` int(11) NOT NULL,
  `tks_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.task_status: ~0 rows (approximately)
DELETE FROM `task_status`;
/*!40000 ALTER TABLE `task_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_status` ENABLE KEYS */;

-- Dumping structure for table easynow.temp_table
CREATE TABLE IF NOT EXISTS `temp_table` (
  `tmp_id` varchar(50) NOT NULL,
  `tmp_value` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.temp_table: ~0 rows (approximately)
DELETE FROM `temp_table`;
/*!40000 ALTER TABLE `temp_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_table` ENABLE KEYS */;

-- Dumping structure for table easynow.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `tck_id` int(11) NOT NULL AUTO_INCREMENT,
  `tck_no` varchar(100) NOT NULL,
  `tck_title` varchar(100) NOT NULL,
  `tck_desc` blob NOT NULL,
  `tck_type` int(11) NOT NULL COMMENT 'gnp_name as task_status',
  `tck_supporter` int(11) NOT NULL COMMENT 'ppl_id from team/ employee table',
  `tck_reviewer` int(11) NOT NULL COMMENT 'ppl_id from team/employee table',
  `tck_related_ppl` varchar(250) NOT NULL COMMENT 'related people id',
  `tck_related_prd` varchar(250) NOT NULL COMMENT 'related product ',
  `tck_related_cmp` varchar(250) NOT NULL COMMENT 'related company id',
  `tck_progress_status` int(11) NOT NULL COMMENT 'gen prm group name as ticket_status',
  `tck_client_id` int(11) NOT NULL COMMENT 'foreign key of client table cli_id',
  `tck_user_ass_by` int(11) NOT NULL COMMENT 'ppl_id from people table',
  `tck_user_ass_to` int(11) NOT NULL,
  `tck_priority` int(11) NOT NULL,
  `tck_prj` int(11) NOT NULL,
  `tck_due_dt` date NOT NULL,
  `tck_datetime` datetime NOT NULL,
  `tck_status` int(11) NOT NULL,
  `tck_user` int(11) NOT NULL,
  `tck_crdt_by` int(11) NOT NULL,
  `tck_crdt_dt` datetime NOT NULL,
  `tck_updt_by` int(11) NOT NULL,
  `tck_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tck_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.ticket: ~0 rows (approximately)
DELETE FROM `ticket`;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` (`tck_id`, `tck_no`, `tck_title`, `tck_desc`, `tck_type`, `tck_supporter`, `tck_reviewer`, `tck_related_ppl`, `tck_related_prd`, `tck_related_cmp`, `tck_progress_status`, `tck_client_id`, `tck_user_ass_by`, `tck_user_ass_to`, `tck_priority`, `tck_prj`, `tck_due_dt`, `tck_datetime`, `tck_status`, `tck_user`, `tck_crdt_by`, `tck_crdt_dt`, `tck_updt_by`, `tck_updt_dt`) VALUES
	(1, '', 'Task 1', _binary '', 1, 620, 620, '625,626', '2', '8', 1, 8, 620, 626, 2, 0, '2018-09-11', '2018-09-11 09:08:55', 1, 0, 620, '2018-09-11 09:08:55', 620, '2018-09-11 03:39:49');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Dumping structure for table easynow.ticket_att
CREATE TABLE IF NOT EXISTS `ticket_att` (
  `tka_id` int(11) NOT NULL AUTO_INCREMENT,
  `tka_name` varchar(200) NOT NULL,
  `tka_tck_id` int(11) NOT NULL,
  `tka_path` varchar(200) NOT NULL,
  `tka_user` int(11) NOT NULL,
  `tka_dt` date NOT NULL,
  `tka_status` int(11) NOT NULL DEFAULT '1',
  `tka_crdt_by` int(11) NOT NULL,
  `tka_crdt_dt` datetime NOT NULL,
  `tka_updt_by` int(11) NOT NULL,
  `tka_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tka_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.ticket_att: ~0 rows (approximately)
DELETE FROM `ticket_att`;
/*!40000 ALTER TABLE `ticket_att` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_att` ENABLE KEYS */;

-- Dumping structure for table easynow.ticket_comment
CREATE TABLE IF NOT EXISTS `ticket_comment` (
  `tkc_id` int(11) NOT NULL,
  `tkc_comment` blob NOT NULL,
  `tkc_dt` datetime NOT NULL,
  `tkc_user` int(11) NOT NULL,
  `tkc_crdt_by` int(11) NOT NULL,
  `tkc_crdt_dt` datetime NOT NULL,
  `tkc_updt_by` int(11) NOT NULL,
  `tkc_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.ticket_comment: ~0 rows (approximately)
DELETE FROM `ticket_comment`;
/*!40000 ALTER TABLE `ticket_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_comment` ENABLE KEYS */;

-- Dumping structure for table easynow.ticket_status
CREATE TABLE IF NOT EXISTS `ticket_status` (
  `tks_id` int(11) NOT NULL,
  `tks_tck_id` int(11) NOT NULL,
  `tks_sts` int(11) NOT NULL,
  `tks_to_user` int(11) NOT NULL,
  `tks_dt` datetime NOT NULL,
  `tks_by_user` int(11) NOT NULL,
  `tks_crdt_by` int(11) NOT NULL,
  `tks_crdt_dt` datetime NOT NULL,
  `tks_updt_by` int(11) NOT NULL,
  `tks_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.ticket_status: ~0 rows (approximately)
DELETE FROM `ticket_status`;
/*!40000 ALTER TABLE `ticket_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_status` ENABLE KEYS */;

-- Dumping structure for table easynow.vendor
CREATE TABLE IF NOT EXISTS `vendor` (
  `vdr_id` int(11) NOT NULL AUTO_INCREMENT,
  `vdr_cmp_id` int(11) NOT NULL COMMENT 'foreign key company id',
  `vdr_code` varchar(20) NOT NULL,
  `vdr_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `vdr_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `vdr_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vdr_updt_by` int(11) NOT NULL COMMENT 'people id',
  `vdr_updt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vdr_id`),
  KEY `vendor_fk0` (`vdr_cmp_id`),
  CONSTRAINT `vendor_fk0` FOREIGN KEY (`vdr_cmp_id`) REFERENCES `company` (`cmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow.vendor: ~0 rows (approximately)
DELETE FROM `vendor`;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
