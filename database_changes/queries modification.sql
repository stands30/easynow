-- Example of code
 -- Below given are some of the example of maintaining the queries.
-- 16th December 2018 
  -- stanley dsouza - people module - new development

  
UPDATE `easynow`.`gen_prm` SET `gnp_status`='0' WHERE  `gnp_id`=6;
UPDATE `easynow`.`gen_prm` SET `gnp_status`='0' WHERE  `gnp_id`=8;
UPDATE `easynow`.`gen_prm` SET `gnp_status`='0' WHERE  `gnp_id`=9;
UPDATE `easynow`.`gen_prm` SET `gnp_status`='0' WHERE  `gnp_id`=99;
UPDATE `easynow`.`gen_prm` SET `gnp_status`='0' WHERE  `gnp_id`=107;

ALTER TABLE `people` ADD COLUMN `ppl_social_fb` VARCHAR(400) NOT NULL AFTER `ppl_profile_image`;
ALTER TABLE `people` ADD COLUMN `ppl_social_linkedin` VARCHAR(400) NOT NULL AFTER `ppl_social_fb`;
ALTER TABLE `people` ADD COLUMN `ppl_social_instagram` VARCHAR(400) NOT NULL AFTER `ppl_social_linkedin`;
ALTER TABLE `people` ADD COLUMN `ppl_social_twitter` VARCHAR(400) NOT NULL AFTER `ppl_social_instagram`;
ALTER TABLE `people` ADD COLUMN `ppl_social_youtube` VARCHAR(400) NOT NULL AFTER `ppl_social_twitter`;
ALTER TABLE `people` ADD COLUMN `ppl_website` VARCHAR(400) NOT NULL AFTER `ppl_social_youtube`;
ALTER TABLE `people` ADD COLUMN `ppl_managed_by` INT(11) NOT NULL COMMENT 'managed by people id' AFTER `ppl_website`;


ALTER TABLE `people`
	CHANGE COLUMN `ppl_social_fb` `ppl_social_fb` VARCHAR(400) NULL DEFAULT NULL AFTER `ppl_profile_image`,
	CHANGE COLUMN `ppl_social_linkedin` `ppl_social_linkedin` VARCHAR(400) NULL DEFAULT NULL AFTER `ppl_social_fb`,
	CHANGE COLUMN `ppl_social_instagram` `ppl_social_instagram` VARCHAR(400) NULL DEFAULT NULL AFTER `ppl_social_linkedin`,
	CHANGE COLUMN `ppl_social_twitter` `ppl_social_twitter` VARCHAR(400) NULL DEFAULT NULL AFTER `ppl_social_instagram`,
	CHANGE COLUMN `ppl_social_youtube` `ppl_social_youtube` VARCHAR(400) NULL DEFAULT NULL AFTER `ppl_social_twitter`,
	CHANGE COLUMN `ppl_website` `ppl_website` VARCHAR(400) NULL DEFAULT NULL AFTER `ppl_social_youtube`;

UPDATE `easynow`.`gen_prm` SET `gnp_name`='Leads' WHERE  `gnp_id`=5;

ALTER TABLE `employee`
	DROP INDEX `employee_fk0`,
	DROP INDEX `emp_code`;
UPDATE `gen_prm` SET `gnp_visible`='1' WHERE  `gnp_id`=48;
UPDATE `gen_prm` SET `gnp_visible`='1' WHERE  `gnp_id`=47;
UPDATE `gen_prm` SET `gnp_visible`='1' WHERE  `gnp_id`=49;
UPDATE `gen_prm` SET `gnp_order`='2' WHERE  `gnp_id`=5;
UPDATE `gen_prm` SET `gnp_order`='3' WHERE  `gnp_id`=7;
UPDATE `gen_prm` SET `gnp_order`='4' WHERE  `gnp_id`=10;

ALTER TABLE `lead`
	ADD COLUMN `led_campaign` INT(11) NOT NULL COMMENT 'Foriegn key campaign id' AFTER `led_lead_status`,
	ADD COLUMN `led_type` INT(11) NOT NULL COMMENT 'gen_prm group same as col name' AFTER `led_campaign`;

INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`, `gnp_default`, `gnp_crdt_by`) VALUES 
('New', '1', 'led_type', '1', '1', '1', '1'),('Existing', '2', 'led_type', '2', '1', '1', '1');

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`, `gpn_visible`) VALUES ('led_type', 'Lead Type', '1');

INSERT INTO `campaign` (`cpn_name`, `cpn_type`, `cpn_campaign_status`, `cpn_start_date`, `cpn_end_date`, `cpn_budget_cost`, `cpn_revenue_cost`) VALUES ('Easynow Sales', '1', '1', '2019-01-24', '2019-01-24', '5000', '5000');
INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`, `gpn_visible`) VALUES ('led_lead_stage', 'Lead Stage', '1');
ALTER TABLE `lead`
	ADD COLUMN `led_loss_reason` INT(11) NOT NULL COMMENT 'gen_prm group same as col name' AFTER `led_lead_stage`,
	ADD COLUMN `led_loss_remark` VARCHAR(200) NOT NULL AFTER `led_loss_reason`;


INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`, `gpn_visible`) VALUES ('led_loss_reason', 'Lead Remark', '1');
INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`, `gnp_default`, `gnp_crdt_by`) VALUES ('Not Interested', '1', 'led_loss_reason', '1', '1', '1', '1'),('Got a better deal', '2', 'led_loss_reason', '2', '1', '1', '1');

-- 25/01/2019

ALTER TABLE `lead`
	CHANGE COLUMN `led_pipeline` `led_pipeline` INT(11) NOT NULL DEFAULT '1' COMMENT 'foreign key lead pipeline' AFTER `led_lead_stage`;
UPDATE lead set lead.led_pipeline=1;

-- Ankush

ALTER TABLE `lead_follow_up`
	ALTER `lfp_led_id` DROP DEFAULT;
ALTER TABLE `lead_follow_up`
	ADD COLUMN `lfp_module_type` INT(11) NOT NULL DEFAULT '0' AFTER `lfp_id`,
	ADD COLUMN `lfp_managed_by` INT(11) NOT NULL DEFAULT '0' AFTER `lfp_module_type`,
	CHANGE COLUMN `lfp_led_id` `lfp_module_type_id` INT(11) NOT NULL COMMENT 'foreign key lead id' AFTER `lfp_managed_by`;

-- Ankush


ALTER TABLE `task`
	ALTER `tsk_related_cmp` DROP DEFAULT;
ALTER TABLE `task`
	CHANGE COLUMN `tsk_related_cmp` `tsk_related_cmp` INT NOT NULL COMMENT 'related company id' AFTER `tsk_related_prd`;

ALTER TABLE `task`
	CHANGE COLUMN `tsk_crdt_dt` `tsk_crdt_dt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `tsk_crdt_by`;

ALTER TABLE `task`
	CHANGE COLUMN `tsk_datetime` `tsk_datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `tsk_due_dt`;


-- Stanley 22/2/2019

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`) VALUES ('finance_currency', 'Currency');
INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES ('INR', '1', 'finance_currency', '1', '1');

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`) VALUES ('finance_shipping', 'Currency');
INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES ('Amazon', '1', 'finance_shipping', '1', '1'),
 ('Blue Dart', '2', 'finance_shipping', '2', '1');
ALTER TABLE `bsn_prm`
	ADD COLUMN `bpm_default_value` VARCHAR(100) NOT NULL AFTER `bpm_value`;
INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`) VALUES ('quot_code', 'QUOT', '0001');

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`) VALUES ('finance_disc_type', 'Discount Type');
INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES ('Rs', '1', 'finance_disc_type', '1', '1'),
 ('%', '2', 'finance_disc_type', '2', '1');

 --stanley 25/2/2019

 
ALTER TABLE `employee`
	ADD COLUMN `emp_cmp_id` INT(11) NOT NULL COMMENT 'foreign key company id' AFTER `emp_reporting_to`;

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`) VALUES 
('quot_currency', '1', ''),
('quot_shipping', '1', ''),
('quot_tax_computation', '1', ''),
('quot_shipping_address', '1', '');

INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Draft', 1, 'qtn_approval_status', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
( 'Submitted', 2, 'qtn_approval_status', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
( 'Approved', 3, 'qtn_approval_status', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
( 'Rejected', 4, 'qtn_approval_status', 4, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13');


INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES
 ('Approval status', '1', 'qtr_field', '1', '1');

-- Quotation changes - stanley -- 8/3/2019

-- invoice,invoice_product,invoice_transaction
UPDATE gen_prm set gnp_visible='1' where gnp_group ='qtn_approval_status' ;
INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) VALUES ('invoice_code', 'INV', '0001', '2019-02-27 12:33:17', '0', '2019-02-27 12:33:17');


INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`) VALUES 
('invoice_currency', '1', ''),
('invoice_shipping', '1', ''),
('invoice_tax_computation', '1', ''),
('invoice_shipping_address', '1', '');

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES ('invoice_status', 'Invoice Status','1');
INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Draft', 1, 'invoice_status', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13'),
( 'Submitted', 2, 'invoice_status', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '2018-11-03 12:58:13');

INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES
 ('Invoice status', '1', 'itr_field', '1', '1');

 -- 11/3/2019 - stanley 

 ALTER TABLE `quotation`
	CHANGE COLUMN `qtn_payment_terms` `qtn_payment_terms` BLOB NOT NULL AFTER `qtn_reference`;

ALTER TABLE `invoice`
	ADD COLUMN `inv_due_date` DATE NOT NULL AFTER `inv_date`;
UPDATE gen_prm set gnp_visible=1 WHERE gnp_group='invoice_status';
 ALTER TABLE `invoice`
	CHANGE COLUMN `inv_payment_terms` `inv_payment_terms` BLOB NOT NULL AFTER `inv_reference`;

-- 12/3/2019 -stanley 
INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES
 ('finance_product_size', 'Finance Product size',1),
 ('finance_product_unit', 'Finance Product Unit',1);
INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES 
('1', '1', 'finance_product_size', '1', '1'),
('2', '2', 'finance_product_size', '2', '1'),
('Kg', '1', 'finance_product_unit', '1', '1'),
('gms', '2', 'finance_product_unit', '2', '1');

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`) VALUES 
('finance_product_size', '1', ''),
('finance_product_unit', '1', '');

ALTER TABLE `quotation_product`
	ADD COLUMN `qtp_size` INT NOT NULL COMMENT 'gen prm group = finance_product_size' AFTER `qtp_desc`,
	ADD COLUMN `qtp_unit` INT NOT NULL COMMENT 'gen prm group = finance_product_unit' AFTER `qtp_size`;


ALTER TABLE `invoice_product`
	ADD COLUMN `inp_size` INT NOT NULL COMMENT 'gen prm group = finance_product_size' AFTER `inp_desc`,
	ADD COLUMN `inp_unit` INT NOT NULL COMMENT 'gen prm group = finance_product_unit' AFTER `inp_size`;

INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES
 ('Amount', '2', 'qtr_field', '2', '1'),
 ('Amount', '2', 'itr_field', '2', '1');


ALTER TABLE `quotation_transaction`
	ALTER `qtr_old_value` DROP DEFAULT,
	ALTER `qtr_new_value` DROP DEFAULT;
ALTER TABLE `quotation_transaction`
	CHANGE COLUMN `qtr_old_value` `qtr_old_value` VARCHAR(200) NOT NULL COMMENT ' value of the respective field ' AFTER `qtr_field`,
	CHANGE COLUMN `qtr_new_value` `qtr_new_value` VARCHAR(200) NOT NULL COMMENT ' value of the respective field ' AFTER `qtr_old_value`;


ALTER TABLE `invoice_transaction`
	ALTER `itr_old_value` DROP DEFAULT,
	ALTER `itr_new_value` DROP DEFAULT;
ALTER TABLE `invoice_transaction`
	CHANGE COLUMN `itr_old_value` `itr_old_value` VARCHAR(200) NOT NULL COMMENT ' value of the respective field ' AFTER `itr_field`,
	CHANGE COLUMN `itr_new_value` `itr_new_value` VARCHAR(200) NOT NULL COMMENT ' value of the respective field ' AFTER `itr_old_value`;

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES
 ('finance_payment_mode', 'Finance Payment Mode',1);
INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES 
('Cash', '1', 'finance_payment_mode', '1', '1'),
('Cheque', '2', 'finance_payment_mode', '2', '1'),
('UTR No', '3', 'finance_payment_mode', '3', '1'),
('Online Banking', '4', 'finance_payment_mode', '4', '1'),
('Debit Card', '5', 'finance_payment_mode', '5', '1'),
('Credit Card', '6', 'finance_payment_mode', '6', '1');

-- sum of lists function to get comma separated values
---- 12 april 2019


ALTER TABLE `invoice`
	CHANGE COLUMN `inv_payment_status` `inv_payment_status` INT(11) NOT NULL DEFAULT 1 COMMENT 'gen_prm group same as col name' AFTER `inv_apprvl_by`;

INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`, `gnp_default`, `gnp_crdt_by`) VALUES
 ('Pending', '1', 'inv_payment_status', '1', '1', '1', '1'),
 ('Paid', '2', 'inv_payment_status', '2', '1', '0', '1');
ALTER TABLE `invoice`
	CHANGE COLUMN `inv_payment_status` `inv_payment_status` INT(11) NOT NULL DEFAULT '1' COMMENT 'gen_prm group same as col name' AFTER `inv_apprvl_by`;
	ALTER TABLE `invoice_payment`
	CHANGE COLUMN `ipt_status` `ipt_status` INT(11) NOT NULL DEFAULT '1' AFTER `ipt_remark`;
	
INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) VALUES ('Paid', '3', 'itr_field', '3', '1');

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`) VALUES ('invoice_payment_code', 'IPT', '0001');

-- 25 april 2019

ALTER TABLE `invoice_payment`
	ADD COLUMN `ipt_managed_by` INT(11) NOT NULL COMMENT 'people id' AFTER `ipt_ppl_id`;

UPDATE `sub_menu_master` SET `sbm_link`='outstanding-list' WHERE  `sbm_id`=29;
UPDATE `sub_menu_master` SET `sbm_link`='payment-list' WHERE  `sbm_id`=30;

-- 30 april 2019


UPDATE `gen_prm` SET `gnp_name`='Payment Status' WHERE  `gnp_id`=208;

ALTER TABLE `company`
	CHANGE COLUMN `cmp_type_id` `cmp_type_id` INT(11) NOT NULL DEFAULT '0' COMMENT 'account/company' AFTER `cmp_id`;

-- 08 May 2019

	ALTER TABLE `product`
	ADD COLUMN `prd_category` INT NULL DEFAULT NULL COMMENT 'gen prm group same as col name' AFTER `prd_code`,
	ADD COLUMN `prd_unit` INT(11) NULL DEFAULT NULL COMMENT 'gen prm group same as col name' AFTER `prd_gst`,
	ADD COLUMN `prd_desc` TEXT NULL DEFAULT NULL AFTER `prd_unit`;

INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`, `gnp_default`, `gnp_crdt_by`) VALUES
 ('Website', '1', 'prd_category', '1', '1', '1', '1'),
 ('CRM', '2', 'prd_category', '2', '1', '0', '1');

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES
 ('prd_category', 'Product Category',1);

UPDATE `gen_prm_name` SET `gpn_title`='Product size' WHERE  `gpn_id`=49;
UPDATE `gen_prm_name` SET `gpn_title`='Product Unit' WHERE  `gpn_id`=50;
UPDATE `gen_prm_name` SET `gpn_group`='product_size' WHERE  `gpn_id`=49;
UPDATE `gen_prm_name` SET `gpn_group`='product_unit' WHERE  `gpn_id`=50;
UPDATE `gen_prm` SET `gnp_group`='product_unit' WHERE `gnp_group`='finance_product_unit';
UPDATE `gen_prm` SET `gnp_group`='product_size' WHERE `gnp_group`='finance_product_size';

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`) VALUES 
('purchase_order_tax_computation', '1', '');
INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) VALUES ('purchase_order_code', 'POR', '0001', '', '0', '');
INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES
 ('Address 1', '1', 'por_address', '1', '1'),
 ('Address 2', '2', 'por_address', '2', '1'),
 ('Other Address', '3', 'por_address', '3', '1');
 INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES
 ('por_address', 'Purchase Order Address',1);


 INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES
 ('por_apprvl_status', 'Purchase Order Status',1);
INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Pending', 1, 'por_apprvl_status', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Approved', 2, 'por_apprvl_status', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Cancelled', 3, 'por_apprvl_status', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '');

INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES
 ('Status', '1', 'ptr_field', '2', '1'),
 ('Amount', '2', 'ptr_field', '2', '1');

 INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`, `gnp_default`, `gnp_crdt_by`) VALUES 
('Borivali', '1', 'piv_location', '1', '1', '1', '1'),
('Andheri', '2', 'piv_location', '2', '1', '1', '1');

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`, `gpn_visible`) VALUES ('piv_location', 'Inventory Location', '1');

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) VALUES 
('product_inventory_direct_in', 'DIN', '0001', '', '0', '');
INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) 
VALUES ('stock_transfer_code', 'STF', '0001', '', '0', '');

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) 
VALUES ('dispatch_order_code', 'DOR', '0001', '', '0', '');

 
INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Pending', 1, 'dor_dispatch_status', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Dispatched', 2, 'dor_dispatch_status', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '');

INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES
 ('dor_transport_mode', 'Dispatch Order Transport Mode',1);
INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Road', 1, 'dor_transport_mode', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Rail', 2, 'dor_transport_mode', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Air', 3, 'dor_transport_mode', 3, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Ship', 4, 'dor_transport_mode', 4, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Courier', 5, 'dor_transport_mode', 5, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, '');


INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_default`) VALUES ('dispatch_order', '2', 'doc_type', '2', '0');

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) 
VALUES ('dor_shipping', '1', '', '', '0', '');

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) 
VALUES ('dor_transport', '1', '', '', '0', '');

INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES
 ('Status', '1', 'dtr_field', '2', '1'),
 ('Amount', '2', 'dtr_field', '2', '1');


 INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES
 ('dor_apprvl_status', 'Dispatch Order Approval Status',1);
INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Pending', 1, 'dor_apprvl_status', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Approved', 2, 'dor_apprvl_status', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Cancelled', 3, 'dor_apprvl_status', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '');


INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) VALUES 
('product_inventory_direct_out', 'DOT', '0001', '', '0', '');

INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Pending', 1, 'por_received_status', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Received', 2, 'por_received_status', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '');

INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Direct In', 1, 'prod_inv_type_in', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Purchase Order', 2, 'prod_inv_type_in', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Stock Transfer', 3, 'prod_inv_type_in', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
 ( 'Direct Our', 1, 'prod_inv_type_out', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Dispatch Order', 2, 'prod_inv_type_out', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Stock Transfer', 3, 'prod_inv_type_out', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '');
-- tables created --



-- Dumping database structure for easynow_beta
CREATE DATABASE IF NOT EXISTS `easynow_beta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `easynow_beta`;

-- Dumping structure for table easynow_beta.dispatch_order
CREATE TABLE IF NOT EXISTS `dispatch_order` (
  `dor_id` int(11) NOT NULL AUTO_INCREMENT,
  `dor_code` varchar(400) NOT NULL,
  `dor_product_tax` varchar(50) NOT NULL,
  `dor_tax_computation` int(11) NOT NULL COMMENT 'gen_prm group same as col name | 1=compute tax ,2=without tax',
  `dor_date` date NOT NULL,
  `dor_billing_cmp` int(11) NOT NULL COMMENT 'foreign key company id',
  `dor_billing_cmp_state` int(11) NOT NULL COMMENT 'billing state',
  `dor_shipping` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `dor_cmp_id` int(11) NOT NULL COMMENT 'account ',
  `dor_cmp_state` int(11) NOT NULL COMMENT 'foreign key state id',
  `dor_billing_addr` varchar(200) NOT NULL,
  `dor_billing_gst` varchar(200) NOT NULL,
  `dor_billing_people` varchar(200) NOT NULL,
  `dor_shipping_addr` varchar(200) NOT NULL,
  `dor_shipping_gst` varchar(200) NOT NULL,
  `dor_shipping_people` varchar(200) NOT NULL,
  `dor_invoice` int(11) NOT NULL,
  `dor_lr_no` text NOT NULL,
  `dor_transport_mode` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `dor_transport_name` text NOT NULL,
  `dor_transport_approx_distance` text NOT NULL,
  `dor_transport_id` varchar(100) NOT NULL,
  `dor_transport_doc_no` varchar(100) NOT NULL,
  `dor_transport_vehicle_no` varchar(100) NOT NULL,
  `dor_transport_date` date NOT NULL,
  `dor_sub_total` double NOT NULL,
  `dor_tax_percent` double NOT NULL,
  `dor_tax` double NOT NULL,
  `dor_total` double NOT NULL,
  `dor_remark` text NOT NULL,
  `dor_apprvl_status` int(11) NOT NULL DEFAULT '1',
  `dor_dispatch_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group same as col name',
  `dor_dispatch_by` int(11) NOT NULL,
  `dor_dispatch_date` datetime NOT NULL,
  `dor_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `dor_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `dor_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dor_updt_by` int(11) NOT NULL COMMENT 'people id',
  `dor_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow_beta.dispatch_order: ~0 rows (approximately)
DELETE FROM `dispatch_order`;
/*!40000 ALTER TABLE `dispatch_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `dispatch_order` ENABLE KEYS */;

-- Dumping structure for table easynow_beta.dispatch_order_product
CREATE TABLE IF NOT EXISTS `dispatch_order_product` (
  `dop_id` int(11) NOT NULL AUTO_INCREMENT,
  `dop_dor_id` int(11) NOT NULL COMMENT 'Dispatch Order id',
  `dop_prd_id` int(11) NOT NULL COMMENT 'Product id',
  `dop_desc` varchar(200) NOT NULL,
  `dop_prv_id` int(11) NOT NULL COMMENT 'gen prm group = finance_product_size',
  `dop_rate` double NOT NULL,
  `dop_qty` float NOT NULL,
  `dop_sub_total` double NOT NULL,
  `dop_tax` double NOT NULL,
  `dop_tax_percent` float NOT NULL,
  `dop_total` double NOT NULL,
  `dop_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `dop_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `dop_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dop_updt_by` int(11) NOT NULL COMMENT 'people id',
  `dop_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow_beta.dispatch_order_product: ~0 rows (approximately)
DELETE FROM `dispatch_order_product`;
/*!40000 ALTER TABLE `dispatch_order_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `dispatch_order_product` ENABLE KEYS */;

-- Dumping structure for table easynow_beta.dispatch_order_transaction
CREATE TABLE IF NOT EXISTS `dispatch_order_transaction` (
  `dtr_id` int(11) NOT NULL AUTO_INCREMENT,
  `dtr_dor_id` int(11) NOT NULL COMMENT 'foreign key dispatch order id',
  `dtr_field` int(11) NOT NULL COMMENT 'gen prm group same as col name',
  `dtr_old_value` varchar(200) NOT NULL COMMENT ' value of the respective field ',
  `dtr_new_value` varchar(200) NOT NULL COMMENT ' value of the respective field ',
  `dtr_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `dtr_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `dtr_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dtr_updt_by` int(11) NOT NULL COMMENT 'people id',
  `dtr_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dtr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow_beta.dispatch_order_transaction: ~0 rows (approximately)
DELETE FROM `dispatch_order_transaction`;
/*!40000 ALTER TABLE `dispatch_order_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `dispatch_order_transaction` ENABLE KEYS */;

-- Dumping structure for table easynow_beta.product_inventory
CREATE TABLE IF NOT EXISTS `product_inventory` (
  `piv_id` int(11) NOT NULL AUTO_INCREMENT,
  `piv_inv_type` int(11) NOT NULL COMMENT ' gen prm group name same as col name | 1=In, 2= Out',
  `piv_cmp_id` int(11) NOT NULL COMMENT 'foreign key vendor id (company id)',
  `piv_type` int(11) NOT NULL COMMENT 'gen prm group name same as col name | Direct, Processing,Dispatch Order',
  `piv_type_id` int(11) NOT NULL COMMENT 'id of respective type | Direct, PO,Dispatch Order',
  `piv_type_prd_id` int(11) NOT NULL COMMENT 'product foreign key of the respective type id',
  `piv_code` varchar(400) NOT NULL COMMENT 'inventory Type code (direct in / purchase order in)',
  `piv_location` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group name same as col name | 1=Default location',
  `piv_date` date DEFAULT NULL,
  `piv_prd_id` int(11) NOT NULL COMMENT 'foreign key product id',
  `piv_prv_id` int(11) NOT NULL COMMENT 'foreign key product variant id',
  `piv_price` double NOT NULL,
  `piv_qty` float NOT NULL,
  `piv_managed_by` int(11) NOT NULL COMMENT 'Foreign key people id',
  `piv_remark` varchar(200) NOT NULL,
  `piv_status` tinyint(1) DEFAULT '1' COMMENT 'gen_prm group = active_status',
  `piv_crdt_by` int(11) DEFAULT NULL,
  `piv_crdt_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `piv_updt_by` int(11) DEFAULT NULL,
  `piv_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`piv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- Dumping structure for table easynow_beta.product_variant
CREATE TABLE IF NOT EXISTS `product_variant` (
  `prv_id` int(11) NOT NULL AUTO_INCREMENT,
  `prv_prd_id` int(11) NOT NULL COMMENT 'foreign key product id',
  `prv_sku` varchar(200) NOT NULL,
  `prv_variant_id` int(11) NOT NULL COMMENT ' gen prm group name = product_variant',
  `prv_price` double DEFAULT NULL,
  `prv_barcode` varchar(200) DEFAULT NULL,
  `prv_status` tinyint(1) DEFAULT '1' COMMENT 'gen_prm group = active_status',
  `prv_crdt_by` int(11) DEFAULT NULL,
  `prv_crdt_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `prv_updt_by` int(11) DEFAULT NULL,
  `prv_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


-- Dumping structure for table easynow_beta.purchase_order
CREATE TABLE IF NOT EXISTS `purchase_order` (
  `por_id` int(11) NOT NULL AUTO_INCREMENT,
  `por_code` varchar(200) NOT NULL,
  `por_vdr_id` int(11) NOT NULL COMMENT 'foreign key company id i.e cmpid which is account',
  `por_tax_computation` int(11) NOT NULL COMMENT 'gen_prm group same as col name | 1=compute tax ,2=without tax',
  `por_billing_cmp` int(11) NOT NULL COMMENT 'foreign key company id',
  `por_billing_cmp_state` int(11) NOT NULL COMMENT 'billing state',
  `por_vdr_cmp_state` int(11) NOT NULL COMMENT 'vendor state',
  `por_prod_tax` int(11) NOT NULL COMMENT 'gen prm group finance_product_tax',
  `por_reference` varchar(200) NOT NULL,
  `por_date` date DEFAULT NULL,
  `por_subject` varchar(200) NOT NULL,
  `por_address` int(11) NOT NULL COMMENT 'gen_prm group same as col name',
  `por_other_address` varchar(200) NOT NULL,
  `por_remark` varchar(400) DEFAULT NULL,
  `por_terms` varchar(400) NOT NULL,
  `por_sub_total` double NOT NULL,
  `por_gst_percent` float NOT NULL,
  `por_gst` double NOT NULL,
  `por_total` double NOT NULL,
  `por_apprvl_status` int(11) NOT NULL COMMENT '1=pending | gen prm group same as col name',
  `por_apprvl_by` int(11) NOT NULL COMMENT 'approved by people id',
  `por_apprvl_date` date NOT NULL,
  `por_received_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group same as col name | 1= pending,2=received',
  `por_status` tinyint(1) DEFAULT '1' COMMENT 'gen_prm group = active_status',
  `por_crdt_by` int(11) DEFAULT NULL,
  `por_crdt_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `por_updt_by` int(11) DEFAULT NULL,
  `por_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`por_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow_beta.purchase_order: ~0 rows (approximately)
DELETE FROM `purchase_order`;
/*!40000 ALTER TABLE `purchase_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order` ENABLE KEYS */;

-- Dumping structure for table easynow_beta.purchase_order_product
CREATE TABLE IF NOT EXISTS `purchase_order_product` (
  `pop_id` int(11) NOT NULL AUTO_INCREMENT,
  `pop_por_id` int(11) NOT NULL COMMENT 'foreign key purchase order id',
  `pop_prd_id` int(11) NOT NULL COMMENT 'foreign key product id',
  `pop_prv_id` int(11) NOT NULL COMMENT 'foreign key product variant id of product',
  `pop_prd_desc` varchar(200) NOT NULL,
  `pop_price` int(11) NOT NULL,
  `pop_qty` int(11) NOT NULL,
  `pop_sub_total` double NOT NULL,
  `pop_gst_percent` float NOT NULL,
  `pop_gst` double NOT NULL,
  `pop_total` double NOT NULL,
  `pop_status` int(11) NOT NULL DEFAULT '1',
  `pop_crdt_by` int(11) NOT NULL COMMENT 'added by',
  `pop_crdt_dt` datetime NOT NULL COMMENT ' added on ',
  `pop_updt_by` int(11) NOT NULL COMMENT ' updated by',
  `pop_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT ' updated on ',
  PRIMARY KEY (`pop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow_beta.purchase_order_product: ~0 rows (approximately)
DELETE FROM `purchase_order_product`;
/*!40000 ALTER TABLE `purchase_order_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order_product` ENABLE KEYS */;

-- Dumping structure for table easynow_beta.purchase_order_transaction
CREATE TABLE IF NOT EXISTS `purchase_order_transaction` (
  `ptr_id` int(11) NOT NULL AUTO_INCREMENT,
  `ptr_por_id` int(11) NOT NULL COMMENT 'foreign key purchase order id',
  `ptr_field` int(11) NOT NULL COMMENT 'gen prm group same as col name',
  `ptr_old_value` varchar(200) NOT NULL COMMENT ' value of the respective field ',
  `ptr_new_value` varchar(200) NOT NULL COMMENT ' value of the respective field ',
  `ptr_status` int(11) NOT NULL DEFAULT '1' COMMENT ' gen_prm group = active_status',
  `ptr_crdt_by` int(11) NOT NULL COMMENT 'people id',
  `ptr_crdt_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ptr_updt_by` int(11) NOT NULL COMMENT 'people id',
  `ptr_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ptr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow_beta.purchase_order_transaction: ~0 rows (approximately)
DELETE FROM `purchase_order_transaction`;
/*!40000 ALTER TABLE `purchase_order_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order_transaction` ENABLE KEYS */;

-- Dumping structure for table easynow_beta.stock_transfer
CREATE TABLE IF NOT EXISTS `stock_transfer` (
  `stf_id` int(11) NOT NULL AUTO_INCREMENT,
  `stf_code` varchar(400) NOT NULL COMMENT 'inventory Type code (direct in / purchase order in)',
  `stf_location_from` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group name same as col name | 1=Default location',
  `stf_location_to` int(11) NOT NULL DEFAULT '1' COMMENT 'gen prm group name same as col name | 1=Default location',
  `stf_date` date DEFAULT NULL,
  `stf_managed_by` int(11) NOT NULL COMMENT 'Foreign key people id',
  `stf_remark` varchar(200) NOT NULL,
  `stf_status` tinyint(1) DEFAULT '1' COMMENT 'gen_prm group = active_status',
  `stf_crdt_by` int(11) DEFAULT NULL,
  `stf_crdt_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `stf_updt_by` int(11) DEFAULT NULL,
  `stf_updt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`stf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table easynow_beta.stock_transfer: ~0 rows (approximately)
DELETE FROM `stock_transfer`;
/*!40000 ALTER TABLE `stock_transfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_transfer` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- tables created --
INSERT INTO `menu_master` (`mnu_id`, `mnu_name`, `mnu_order`, `mnu_status`, `mnu_visible`, `mnu_link`, `mnu_logo`, `mnu_icon`, `mnu_crdt_by`, `mnu_crdt_dt`, `mnu_updt_by`, `mnu_updt_dt`) VALUES (13, 'Inventory Management', 13, 'Y', 1, '', 'fa fa-cart-plus icon-product', '', 0, '0000-00-00', 0, '2019-06-10 10:55:12');
INSERT INTO `menu_transaction` (`MTR_id`, `MTR_MNU_id`, `MTR_DPT_id`, `MTR_Status`, `MTR_CRTD_By`, `MTR_CRTD_Date`, `MTR_UPDT_By`, `MTR_UPDT_Date`) VALUES (17, 13, 1, 'Y', 0, '0000-00-00', 0, '2019-06-10 10:57:58');
INSERT INTO `menu_transaction` (`MTR_id`, `MTR_MNU_id`, `MTR_DPT_id`, `MTR_Status`, `MTR_CRTD_By`, `MTR_CRTD_Date`, `MTR_UPDT_By`, `MTR_UPDT_Date`) VALUES (18, 13, 2, 'Y', 0, '0000-00-00', 0, '2019-06-10 10:58:06');

INSERT INTO `sub_menu_master` ( `sbm_mnu_id`, `sbm_name`, `sbm_parent_id`, `sbm_link`, `sbm_icon`, `sbm_order`, `sbm_group`, `sbm_status`, `sbm_visible`, `sbm_crdt_by`, `sbm_crdt_dt`, `sbm_updt_by`, `sbm_updt_dt`) VALUES 
( 13, 'Inventory', 13, 'inventory-list', 'fas fa-warehouse', 1, 'submenu', 'Y', 1, 0, '2019-06-10 04:37', 0, '2019-06-10 04:37'),
( 13, 'Purchase Order', 13, 'purchase-order-list', 'fa fa-cart-plus icon-product', 2, 'submenu', 'Y', 1, 0, '2019-06-10 04:37', 0, '2019-06-10 04:37'),
( 13, 'Dispatch Order', 13, 'dispatch-order-list', 'fas fa-truck-loading', 3, 'submenu', 'Y', 1, 0, '2019-06-10 04:37', 0, '2019-06-10 04:37'),
( 13, ' Order', 13, 'order-list', 'fas fa-boxes', 4, 'submenu', 'Y', 1, 0, '2019-06-10 04:37', 0, '2019-06-10 04:37'),
( 13, ' Stock Transfer', 13, 'stock-transfer-list', 'fas fa-exchange-alt', 5, 'submenu', 'Y', 1, 0, '2019-06-10 04:37', 0, '2019-06-10 04:37');

CREATE TABLE IF NOT EXISTS `project` (
  `prj_id` int(11) NOT NULL AUTO_INCREMENT,
  `prj_title` varchar(255) NOT NULL,
  `prj_cmp_id` int(11) NOT NULL COMMENT 'foreign key company id',
  `prj_work_ord` varchar(255) NOT NULL,
  `prj_site_loc` varchar(255) NOT NULL,
  `prj_site_add` varchar(255) NOT NULL,
  `prj_desc` blob NOT NULL,
  `prj_manage_by` int(11) NOT NULL COMMENT 'foreign key people id ',
  `prj_project_status` int(11) DEFAULT '1' COMMENT 'gen_prm group = prj_project_status',
  `prj_status` int(11) NOT NULL DEFAULT '1' COMMENT 'gen_prm group = prj_status',
  `prj_crdt_by` int(11) NOT NULL,
  `prj_crdt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prj_updt_by` int(11) NOT NULL,
  `prj_updt_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

UPDATE gen_prm SET gnp_visible=1 WHERE gnp_group='por_apprvl_status';
UPDATE gen_prm SET gnp_visible=1 WHERE gnp_group='dor_apprvl_status';
---- 11 June 2019


 INSERT INTO `gen_prm_name` (`gpn_group`, `gpn_title`,`gpn_visible`) VALUES
 ('ord_type', 'Order Type',1),
 ('ord_category', 'Order Category',1),
 ('ord_order_status', 'Order Status',1);
INSERT INTO `gen_prm` ( `gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_description`, `gnp_visible`, `gnp_default`, `gnp_status`, `gnp_crdt_by`, `gnp_crdt_dt`, `gnp_updt_by`, `gnp_updt_dt`) VALUES
 ( 'Website', 1, 'ord_type', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'CRM', 2, 'ord_type', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
 ( 'Nextasy', 1, 'ord_category', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Easynow', 2, 'ord_category', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
 ( 'Hold Order', 1, 'ord_order_status', 1, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Processing', 2, 'ord_order_status', 2, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Ready To Dispatch', 3, 'ord_order_status', 3, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Completed', 4, 'ord_order_status', 4, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Cancelled', 5, 'ord_order_status', 5, '', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Pending', 1, 'ord_dispatch_status', 1, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Dispatched', 2, 'ord_dispatch_status', 2, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, ''),
( 'Draft', 3, 'ord_dispatch_status', 3, '', 2, 0, 1, 0, '0000-00-00 00:00:00', 0, '');

INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`, `bpm_crtd_dt`, `bpm_crtd_by`, `bpm_updt_dt`) VALUES ('order_code', 'ORD', '0001', '', '0', '');

create table order_courier(
ocr_id int NOT NULL AUTO_INCREMENT,
ocr_ord_id int NOT NULL COMMENT 'foreign key order id',
ocr_name varchar(255) NOT NULL,
ocr_date date NOT NULL,
ocr_website varchar(255) NOT NULL,
ocr_awb_no varchar(255) NOT NULL,
ocr_status int  NULL DEFAULT '1' COMMENT 'gen_prm group = active_status',
ocr_crdt_by int NOT NULL,
ocr_updt_by int NOT NULL,
ocr_crdt_dt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
ocr_updt_dt TIMESTAMP  NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY(`ocr_id`)
)

INSERT INTO `gen_prm` (`gnp_name`, `gnp_value`, `gnp_group`, `gnp_order`, `gnp_visible`) 
VALUES
 ('Status', '1', 'otr_field', '2', '1'),
 ('Amount', '2', 'otr_field', '2', '1');


INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`) VALUES 
('dispatch_order_tax_computation', '1', '');
INSERT INTO `bsn_prm` (`bpm_name`, `bpm_value`, `bpm_default_value`) VALUES 
('order_order_tax_computation', '1', '');