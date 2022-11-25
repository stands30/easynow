<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(FCPATH.'/application/config/project_constants.php');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('GEN_PRM_DEFAULT_YES', 1);
define('GEN_PRM_DEFAULT_NO', 0);

define('STATUS_YES', '1');
define('STATUS_NO', '2');

//*********** PEOPLE TYPE ***********//
define('PEOPLE_TYPE_COMPANY',1);
define('PEOPLE_TYPE_LEAD',2);
define('PEOPLE_TYPE_CANDIDATE',3);
define('PEOPLE_TYPE_EVENT',4);
define('PEOPLE_TYPE_VENDOR',5);
define('PEOPLE_TYPE_CLIENT',6);
define('PEOPLE_TYPE_TEAM',7);
define('PEOPLE_ADDITIONAL_DETAILS',8);
//*********** PEOPLE TYPE ***********//


//*********** PEOPLE LOGIN ***********//
define('PEOPLE_LOGIN_TEAM',1);
define('PEOPLE_LOGIN_COMPANY',2);
define('PEOPLE_LOGIN_CLIENT',3);
define('PEOPLE_LOGIN_VENDOR',4);
//*********** PEOPLE LOGIN ***********//

//*********** COMPANY TYPE ***********//
define('COMPANY_TYPE_PEOPLE',1);
//*********** COMPANY TYPE ***********//

// ********** Contact Type *********//
define('CONTACT_EMAIL',1);
define('CONTACT_MOBILE',2);
// ********** Contact Type *********//

define('COMPANY_INDUSTRY','cmp_industry_type');
define('COMPANY_TYPE','cmp_type');
define('COMPANY_ANNUAL_REV','cmp_anl_rev');

// ******** Image Upload ***********//
define('DOC_SIZE','900');
// ******** Image Upload ***********//

define('LEAD_FOLLOWUP_EMAIL', 1);
define('LEAD_FOLLOWUP_CLIENT', 2);
define('LEAD_FOLLOWUP_MEETING', 3);
define('LEAD_FOLLOWUP_OTHERS', 4);

define('LEAD_FOLLOWUP_STATUS_PENDING'		, 1);
define('LEAD_FOLLOWUP_STATUS_DONE'			, 2);
define('LEAD_FOLLOWUP_STATUS_RESCHEDULE'	, 3);

define('PEOPLE_CONTACT_TYPE_EMAIL', 1);
define('PEOPLE_CONTACT_TYPE_MOBILE', 2);

define('LEAD_STATUS_HOT', 1);
define('LEAD_STATUS_CHILLED', 2);
define('LEAD_STATUS_PENDING', 1);
define('LEAD_STATUS_WON', 2);
define('LEAD_STATUS_ON_HOLD', 3);
define('LEAD_STATUS_LOST', 4);

define('LEAD_STAGE_LEAD_IN'			, 1);
define('LEAD_STAGE_CONTACTED'		, 2);
define('LEAD_STAGE_QUALIFIED'		, 3);
define('LEAD_STAGE_PROPOSAL_MADE'	, 4);
define('LEAD_STAGE_NEGOTIATION'		, 5);

define('LEAD_FILTER_SOURCE'			, 1);

define('PEOPLE_MAIL_SUBJECT','Taking Business on Auto-Pilot Mode | Nextasy Technologies | Company Profile');
define('PEOPLE_MAIL_HTML_PATH','people/email_template/');

define('FOLLOWUP_MAIL_SUBJECT', 'Follow Up Email');
define('FOLLOWUP_MAIL_HTMP_PATH', 'lead/email_template/followup_email');




// ********** Cashbook Module Constants Start *********//


/****************** People Login ********************/
define('PEOPLE_LOGIN_TYPE_MOBILE','1');
define('PEOPLE_LOGIN_TYPE_EMAIL','2');
define('PEOPLE_LOGIN_DEPT_TEAM','1');
define('PEOPLE_ADMIN_DEPT','1');
define('PEOPLE_ADMIN','1');
define('PEOPLE_DEPT_ID', 'easynow_department');
/****************** People Login ********************/

define('LOGIN_GALLERY', 1);

// ********** Cashbook Module Constants Start *********//



// ********** Account Default status *********//
define('ACCOUNT_DEFAULT',1);
define('ACCOUNT_NOTDEFAULT',0);
// ********** Account Default status *********//

// ********** Cashbook Type *********//
define('CASHBOOK_INCOME',1);
define('CASHBOOK_EXPENSE',2);
// ********** Cashbook Type *********//

// ********** Cashbook Transaction Type *********//
define('CASHBOOK_DIRECT',1);
define('CASHBOOK_USER',2);
define('CASHBOOK_PURCHASE',3);
define('CASHBOOK_INVOICE',4);
// ********** Cashbook Transaction Type *********//


// ********** Cashbook Approval status *********//
define('CASHBOOK_APPROVED',1);
define('CASHBOOK_REJECTED',2);
define('CASHBOOK_PENDING',3);
// ********** Cashbook Approval status *********//


// ********** Cashbook Module Constants End *********//

// **** Max Users ******//
define('MAX_USERS','max_users');
// **** Max Users ******//

// ***** Company Profile ******//
define('COMPANY_PROFILE_TYPE','1');
define('COMPANY_NAME','company_name');

define('FPT_INACTIVE', 0);
define('FPT_ACTIVE', 1);
define('FPT_LINK_VALIDITY_TIME','24 HOUR');
define('FORGET_PASS_SUBJECT','Reset password instructions ');
// ***** Company Profile ******//


// ** Target Type **//
define('TARGET_TYPE_USER', 1);
define('TARGET_TYPE_STAGE', 2);
define('TARGET_TYPE_PRODUCT', 3);
define('TARGET_TYPE_SOURCE', 4);

// ****** DataTable Constants *********//
define('TABLE_SERVER_LIMIT','table_server_limit');
define('TABLE_RESULT','result');
define('TABLE_COUNT','count');
// ****** DataTable Constants *********//

define('PEOPLE_EMAIL_NO_SUBJECT','Welcome Mail');


// ****** GALLERY SET IMAGE PATH *********//
define('GALLERY_SET_TYPE_LOGIN'	,1);
define('GALLERY_SET_TYPE_LOGO'	,2);
// ****** Additional Details Start *********//
define('ADDITIONAL_DETAIL_TYPE_TEXTBOX','1');
define('ADDITIONAL_DETAIL_TYPE_TEXTAREA','2');
define('ADDITIONAL_DETAIL_TYPE_DROPDOWN','3');
define('ADDITIONAL_DETAIL_TYPE_DROPDOWN_MULTIPLE','4');
define('ADDITIONAL_DETAIL_TYPE_NUMBER','5');
define('ADDITIONAL_DETAIL_TYPE_EMAIL','6');
define('ADDITIONAL_DETAIL_TYPE_URL','7');
// ****** Additional Details End *********//

define('CODE_TYPE_PRODUCT'	, 1);
define('CODE_TYPE_TASK'		, 2);
define('CODE_TYPE_PEOPLE'	, 3);

define('TASK_PENDING',1);
define('TASK_DONE',2);

define('COMPANY_TYPE_COMPANY',1);
define('COMPANY_TYPE_ACCOUNT',2);

define('COMPANY_FILTER_INDUSTRY'	,1);
define('COMPANY_FILTER_REVENUE'		,2);
define('COMPANY_FILTER_STATE'		,3);
define('COMPANY_FILTER_TYPE'		,4);

define('TASK_PROGRESS_STATUS_OPEN', 1);
define('TASK_PROGRESS_STATUS_REVIEW', 2);
define('TASK_PROGRESS_STATUS_RELEASED', 3);
define('TASK_PROGRESS_STATUS_CLOSED', 4);

define('TASK_PRIORITY_LOW', 1);
define('TASK_PRIORITY_MEDIUM', 2);
define('TASK_PRIORITY_HIGH', 3);
define('TASK_PRIORITY_CRITICAL', 4);

define('FORM_ACCESS_ACCESS', 1);
define('FORM_ACCESS_LIST', 2);
define('FORM_ACCESS_ADD', 3);
define('FORM_ACCESS_EDIT', 4);
define('FORM_ACCESS_DETAIL', 5);
define('FORM_ACCESS_EXPORT', 6);
define('FORM_ACCESS_PRINT', 7);
define('FORM_INACCESS_MESSAGE', "No Access");

define('FOLLOWUP_MODULE_TYPE_LEAD'		, 1);
define('FOLLOWUP_MODULE_TYPE_ACCOUNT'	, 2);

define('LEAD_TYPE_NEW',1);
define('LEAD_TYPE_EXISTING',2);

// Quotation
define('QUOTATION_CURRENCY','quot_currency');
define('QUOTATION_SHIPPING','quot_shipping');
define('QUOTATION_TAX_COMPUTATION','quot_tax_computation');
define('QUOTATION_SHIPPING_ADDRESS','quot_shipping_address');
define('QUOTATION_DISC_TYPE_RS',1);
define('QUOTATION_DISC_TYPE_PERCENTAGE',2);
define('QUOTATION_APPROVAL_STATUS_DRAFT',1);
define('QUOTATION_APPROVAL_STATUS_SUBMITTED',2);
define('QUOTATION_APPROVAL_STATUS_APPROVED',3);
define('QUOTATION_APPROVAL_STATUS_REJECTED',4);
define('QUOTATION_TRANSACTION_FIELD_APPRVL_STATUS',1);
define('QUOTATION_TRANSACTION_FIELD_AMOUNT',2);
define('FINANCE_TAX_PERCENT','finance_tax_percent');
define('FINANCE_PRODUCT_TAX','finance_product_tax');
define('PRODUCT_SIZE','product_size');
define('PRODUCT_UNIT','product_unit');
// Quotation


//AMC
define('AMC_DURATION_YEARS',1);
define('AMC_DURATION_MONTHS',2);
define('AMC_DURATION_DAYS',3);

define('AMC_TYPE_STATUS_PENDING',   1);
define('AMC_TYPE_STATUS_COMPLETE',  2);
define('AMC_TYPE_STATUS_CANCEL',    3);

//*** Testimonials Image ***/

//TESTIMONIALs
define('TESTIMONIAL_LIST',3);

// Invoice
define('INVOICE_TAX_COMPUTATION','quot_tax_computation');
define('INVOICE_SHIPPING_ADDRESS','quot_shipping_address');
define('INVOICE_STATUS','invoice_status');
define('INVOICE_DISC_TYPE_RS',1);
define('INVOICE_DISC_TYPE_PERCENTAGE',2);
define('INVOICE_APPROVAL_STATUS_DRAFT',1);
define('INVOICE_APPROVAL_STATUS_SUBMITTED',2);
define('INVOICE_APPROVAL_STATUS_APPROVED',3);
define('INVOICE_APPROVAL_STATUS_REJECTED',4);
define('INVOICE_TRANSACTION_FIELD_APPRVL_STATUS',1);
define('INVOICE_TRANSACTION_FIELD_AMOUNT',2);
define('INVOICE_TRANSACTION_FIELD_PAYMENT',3);
define('INVOICE_PAYMENT_STATUS_PENDING',1);
define('INVOICE_PAYMENT_STATUS_PAID',2);
define('INVOICE_PAYMENT_STATUS','inv_payment_status');
define('INVOICE_PAYMENT_MODE_CHEQUE','2');
define('INVOICE_PAYMENT_MODE_UTR','3');
// Invoice
// Purchase Order
define('PURCHASE_ORDER_TAX_COMPUTATION','purchase_order_tax_computation');
define('PURCHASE_ORDER_CODE','purchase_order_code');
define('PURCHASE_ORDER_ADDRESS_OTHER','3');
define('PURCHASE_ORDER_TRANSACTION_FIELD_STATUS',1);
define('PURCHASE_ORDER_TRANSACTION_FIELD_AMOUNT',2);
define('PURCHASE_ORDER_STATUS_PENDING',1);
define('PURCHASE_ORDER_STATUS_APPROVED',2);
define('PURCHASE_ORDER_STATUS_CANCELLED',3);
define('PURCHASE_ORDER_RECEIVED_STATUS_PENDING',1);
define('PURCHASE_ORDER_RECEIVED_STATUS_RECEIVED',2);
// Purchase Order


// File Structure Path
// Note : Please mention all upload paths in below section
define('CLIENT_BASE_PATH'				, 'client_modules/'.getSubdomain());

define('COMPANY_PROFILE_PATH'			, CLIENT_BASE_PATH.'/people/images/company_profile/');
define('GALLERY_SET_IMAGE_PATH'			, CLIENT_BASE_PATH.'/gallery-set/images/');

define('TESTIMONIALS_IMAGE_PATH'		, CLIENT_BASE_PATH.'/testimonials/images/');
define('TESTIMONIALS_IMAGE_PATH_RESIZE'	, CLIENT_BASE_PATH.'/testimonials/images_resize/');

define('PEOPLE_PROFILE_IMAGE'			, CLIENT_BASE_PATH.'/people/images/profile/');
define('PEOPLE_PROFILE_IMAGE_RESIZE'	, CLIENT_BASE_PATH.'/people/images/profile/resize/');
define('PEOPLE_EXCEL_DOCS_PATH'			, CLIENT_BASE_PATH.'/people/doc/excel/');

define('COMPANY_LOGO'					, CLIENT_BASE_PATH.'/company/images/');
define('COMPANY_LOGO_RESIZE'			, CLIENT_BASE_PATH.'/company/images/logo/resize/');

define('DASHBOARD_IMAGE_PATH' 			, CLIENT_BASE_PATH.'/dashboard/images/');
define('EVENT_IMAGE_PATH' 				, CLIENT_BASE_PATH.'/event/images/');
define('LOGIN_IMAGE_PATH' 				, CLIENT_BASE_PATH.'/login/');
define('NOTES_IMAGE_PATH' 				, CLIENT_BASE_PATH.'/notes/images/');
define('PIPELINE_IMAGE_PATH' 			, CLIENT_BASE_PATH.'/pipeline/images/');
define('WIDGET_IMAGE_PATH' 				, CLIENT_BASE_PATH.'/widget/images/');

define('TASK_DOC'						, CLIENT_BASE_PATH.'/task/docs/');
define('MEETING_DOC'					, CLIENT_BASE_PATH.'/meeting/docs/');
define('EMAIL_DOC'						, CLIENT_BASE_PATH.'/email-template/docs/');
define('TICKET_DOC' 					, CLIENT_BASE_PATH.'/ticket/docs/');
define('DISPATCH_ORDER_DOCUMENT_PATH'	, CLIENT_BASE_PATH.'/dispatch_order/images/');

// File Structure Path

define('AD_TRIAL_DAYS'				, 14);
define('AD_BASE_DATABASE'			, 'easynow_beta');

define('AD_CLIENT_PPL_ID'			, 'cli_ppl_id');
define('AD_CLIENT_CMP_ID'			, 'cli_cmp_id');

define('AD_CLIENT_NAME'				, 'cli_name');
define('AD_CLIENT_EMAIL'			, 'cli_email');
define('AD_CLIENT_MOBILE'			, 'cli_mobile');
define('AD_CLIENT_PASSWORD'			, 'cli_password');

define('AD_CLIENT_COMPANY'			, 'cli_company');
define('AD_CLIENT_INDUSTRY'			, 'cli_industry');
define('AD_CLIENT_CURRENCY'			, 'cli_billing_currency');
define('AD_CLIENT_PEOPLE_COUNT'		, 'cli_people_count');
define('AD_CLIENT_DOMAIN'			, 'cli_domain');

define('AD_DEFAULT_PASSWORD'			, '12345');
define('AD_DEFAULT_INDUSTRY'			, 1);
define('AD_DEFAULT_BILLING_COMPANY'		, 1);
define('AD_DEFAULT_PEOPLE_COUNT'		, 1);

define('EASYNOW_PLAN_TRIAL'			, 1);

// Inventory Constants
define('PRODUCT_INVENTORY_TYPE_IN'	    , '1');
define('PRODUCT_INVENTORY_TYPE_OUT'	    , '2');
define('PRODUCT_INVENTORY_IN_TYPE_DIRECT_IN'	    , '1');
define('PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER'	, '2');
define('PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER'	, '3');
define('PRODUCT_INVENTORY_OUT_TYPE_DIRECT_OUT'	    , '1');
define('PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER'	, '2');
define('PRODUCT_INVENTORY_OUT_TYPE_STOCK_TRANSFER'	, '3');
define('PRODUCT_INVENTORY_DIRECT_IN_CODE'	, 'product_inventory_direct_in');
define('PRODUCT_INVENTORY_DIRECT_OUT_CODE'	, 'product_inventory_direct_out');
define('STOCK_TRANSFER_CODE'	            , 'stock_transfer_code');
define('TOTAL_STOCK_NEGATIVE_MESSAGE'	    , 'Please delete the dispatch entry to delete this entry');
// Inventory Constants

// Dispatch Order
define('DISPATCH_ORDER_CODE'	 , 'dispatch_order_code');
define('DOCUMENT_TYPE_DISPATCH_ORDER', '2');
define('DISPATCH_ORDER_SHIPPING' , 'dor_shipping');
define('DISPATCH_ORDER_TRANSPORT', 'dor_transport');
define('DISPATCH_ORDER_TRANSACTION_FIELD_APPROVAL_STATUS',1);
define('DISPATCH_ORDER_TRANSACTION_FIELD_AMOUNT',2);
define('DISPATCH_ORDER_TRANSACTION_FIELD_DISPATCH_STATUS',3);
define('DISPATCH_ORDER_APPROVAL_STATUS_PENDING',1);
define('DISPATCH_ORDER_APPROVAL_STATUS_APPROVED',2);
define('DISPATCH_ORDER_APPROVAL_STATUS_CANCELLED',3);
define('DISPATCH_ORDER_DISPATCH_STATUS_PENDING',1);
define('DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH',2);
define('DISPATCH_ORDER_TAX_COMPUTATION','dispatch_order_tax_computation');
// Dispatch Order
//  Order
define('ORDER_CODE'	 , 'order_code');
define('ORDER_ORDER_STATUS_HOLD',1);
define('ORDER_ORDER_STATUS_PROCESSING',2);
define('ORDER_ORDER_STATUS_READY_TO_DISPATCH',3);
define('ORDER_ORDER_STATUS_COMPLETED',4);
define('ORDER_ORDER_STATUS_CANCELLED',5);
define('ORDER_DISPATCH_STATUS_PENDING',1);
define('ORDER_DISPATCH_STATUS_DISPATCHED',2);
define('ORDER_DISPATCH_STATUS_DRAFT',3);
define('ORDER_TRANSACTION_FIELD_ORDER_STATUS',1);
define('ORDER_TRANSACTION_FIELD_AMOUNT',2);
define('ORDER_TAX_COMPUTATION','order_tax_computation');
//  Order