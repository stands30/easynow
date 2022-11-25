<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] 		= 'Login';
// $route['dashboard'] 				= 'Dashboard/index';
$route['dashboard'] 				= 'Dashboard/admin_dashboard';
$route['order-dashboard'] 				= 'dashboard/order_dashboard';
$route['customer-dashboard'] 		= 'Dashboard/customer_dashboard';
$route['dashboard-main'] 			= 'Dashboard/dashboard_main';
$route['dashboard-pipeline'] 		        = 'Dashboard/dashboard_pipeline';
$route['dashboard-my-day']			= 'Dashboard/dashboard_my_day';
$route['my-team-dashboard']			= 'Dashboard/my_team_dashboard';
$route['team-dashboard']			= 'Dashboard/team_dashboard';
$route['sales-pipeline']			= 'Dashboard/sales_pipeline';

$route['404_override'] 				= 'people/easynow_404_page'; 

$route['login'] 					= 'login/checklogin';
$route['customer-login'] 			= 'login/customer_login';

$route['logout'] 					= 'login/logout';

$route['people-dashboard'] 							= 'people/people_dashboard';
$route['people-list'] 								= 'people/list_people';
$route['people-list-(:any)'] 						= 'people/list_people/$1';
$route['people-add'] 								= 'people/add_people';
$route['people-details-(:any)'] 	        		= 'people/details_people/$1';
$route['people-company-detail-(:any)-(:any)']      	= 'people/details_company/$1/$2';
$route['people-lead-detail-(:any)-(:any)'] 	    	= 'people/details_lead/$1/$2';
$route['people-candidate-detail-(:any)-(:any)'] 	= 'people/details_candidate/$1/$2';
$route['people-event-detail-(:any)-(:any)'] 		= 'people/details_event/$1/$2';
$route['people-vendor-detail-(:any)-(:any)'] 	    = 'people/details_vendor/$1/$2';
$route['people-client-detail-(:any)-(:any)'] 	    = 'people/details_client/$1/$2';
$route['people-team-detail-(:any)-(:any)'] 			= 'people/details_team/$1/$2';
$route['people-team-getlist-(:any)'] 				= 'people/peopleTeamDataTablelist/$1';
$route['getpeoplelist'] 							= 'people/peopleDataTablelist';

$route['people-edit-(:any)'] 						= 'people/peopleEdit/$1';
$route['people-additional-detail-edit-(:any)'] 		= 'people/peopleAdditionalDetailEdit/$1';
$route['people-activity-detail-(:any)-(:any)'] 	    = 'people/details_activity/$1/$2';


// ****** People Sub Module List ******//
$route['people-company-list'] 	  	    		= 'people/people_company_list';
$route['people-company-getlist']   	    		= 'people/people_company_getlist';
$route['people-company-getlist-(:any)'] 		= 'people/peopleCompanyDataTablelist/$1';
$route['people-event-list'] 	  	    		= 'people/people_event_list';
$route['people-event-getlist']   	    		= 'people/people_event_getlist';
$route['people-event-getlist-(:any)']   		= 'people/peopleEventDataTablelist/$1';
$route['people-login-(:any)-(:any)']            = 'people/people_login/$1/$2';
$route['people-reset-password-(:any)']          = 'login/people_reset_password/$1';

$route['lead-dashboard'] 						= 'lead/lead_dashboard';
$route['lead-list'] 		    				= 'lead/lead_list';
$route['lead-getlist'] 		    				= 'lead/lead_getlist';
$route['lead-list-(:any)-(:any)']				= 'lead/lead_list/$1/$2';
$route['lead-getlist-(:any)-(:any)']			= 'lead/lead_getlist/$1/$2';
$route['lead-active-getlist'] 		    		= 'lead/lead_active_getlist';
$route['lead-add'] 		        				= 'lead/lead_add';
$route['lead-add-(:any)-(:any)'] 		        = 'lead/lead_add/$1/$2';
$route['lead-edit-(:any)'] 						= 'lead/lead_edit/$1';
$route['lead-details-(:any)'] 					= 'lead/lead_details/$1';
$route['lead-followup-getlist-(:any)-(:any)'] 	= 'lead/lead_follow_getlist/$1/$2';
$route['lead-followupbyid-(:any)'] 				= 'lead/getFollowUpdetailById/$1';
$route['lead-delete-(:any)']		  			= 'lead/lead_delete/$1';
$route['lead-status-list-(:any)']		  		= 'dashboard/lead_status_list/$1';
$route['leadstatus-getlist-(:any)'] 		    = 'dashboard/leadstatus_getlist/$1';
$route['followup-list'] 		    			= 'followup/followup_list';
$route['followup-getlist-(:any)']				= 'followup/followup_getlist/$1';
$route['followup-delete-(:any)']		  		= 'followup/followup_delete/$1';
$route['followup-detailbyid-(:any)'] 			= 'followup/getFollowUpdetailById/$1';
$route['followup-overview-(:any)'] 				= 'lead/get_lead_overview/$1';




$route['company-dashboard'] 							= 'company/company_dashboard';
$route['company-list']									= 'company/company_list';
$route['company-getlist']								= 'company/company_getlist';
$route['company-list-(:any)-(:any)']					= 'company/company_list/$1/$2';
$route['company-getlist-(:any)-(:any)']					= 'company/company_getlist/$1/$2';
$route['company-add'] 		    						= 'company/company_add';
$route['company-edit-(:any)'] 							= 'company/company_edit/$1';
$route['company-details-(:any)'] 						= 'company/company_details/$1';
$route['company-people-list-(:any)'] 					= 'company/company_people_list/$1';
$route['company-people-add'] 		    				= 'company/company_people_add';
$route['company-people-add-(:any)-(:any)-(:any)'] 		= 'company/company_people_add/$1/$2/$3';
$route['company-people-edit-(:any)-(:any)'] 			= 'company/company_people_edit/$1/$2';
$route['company-delete-(:any)']							= 'company/company_delete/$1';
$route['company-people-detail-(:any)']					= 'company/company_people_detail/$1';
$route['account-list'] 		    						= 'company/account_list';
$route['account-getlist'] 		    					= 'company/account_getlist';
$route['company-activity-detail-(:any)']				= 'company/company_activity_detail/$1';


$route['event-dashboard'] 		= 'event/event_dashboard';
$route['event-list'] 		    	= 'event/event_list';
$route['event-add'] 		   		= 'event/event_add';
$route['event-people-add'] 						= 'event/event_people_add';
$route['event-people-add-(:any)-(:any)-(:any)'] 		    = 'event/event_people_add/$1/$2/$3';
$route['event-people-edit-(:any)'] 		    = 'event/event_people_edit/$1';
$route['event-details-(:any)'] 		= 'event/event_details/$1';
$route['event-edit-(:any)'] 		= 'event/event_edit/$1';
$route['event-getlist'] = 'event/getEventDataTableList';
$route['eventppl-getlist-(:any)'] = 'event/getEventPplDataTableList/$1';
$route['people-lead-getdetail-(:any)'] 	    = 'people/peopleLeadDataTablelist/$1';
$route['people-candidate-getlist-(:any)'] 	    = 'people/peopleCandidateDataTablelist/$1';
$route['people-client-getlist-(:any)'] = 'people/peopleClientDataTablelist/$1';
$route['people-vendor-getlist-(:any)'] = 'people/peopleVendorDataTablelist/$1';
$route['event-people-detail-(:any)']			= 'event/event_people_detail/$1';
// ****** People Sub Module List ******//

// Team
$route['team-list']  	= 'team/team_list';
$route['team-add']  	= 'team/team_add';
$route['team-add-(:any)-(:any)']  	= 'team/team_add/$1/$2';
$route['team-edit-(:any)']  	= 'team/team_edit/$1';
$route['team-details-(:any)']  	= 'team/team_details/$1';
$route['team-getlist'] 			= 'team/team_getlist';


$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;

// function calls
$route['login-user'] 			= 'login/login_user';
$route['logout-user'] 			= 'login/logout';
//gallery set
$route['gallery-set-list'] 		    = 'gallerySet/gallery_set_list';
$route['gallery-set-add'] 		    = 'gallerySet/gallery_set_add';
$route['gallery-set-edit-(:any)']   = 'gallerySet/gallery_set_edit/$1';
$route['gallery-getlist']         	= 'gallerySet/getGallerytDataTableList';
// general Parameter

$route['general-parameter-add-(:any)']           = 'genParameter/general_parameter_add/$1';
$route['general-parameter-edit-(:any)']  		 = 'genParameter/general_parameter_edit/$1';
$route['general-parameter-list']                               = 'genParameter/general_parameter_list';
$route['general-parameter-list-(:any)-(:any)-(:any)']          = 'genParameter/general_parameter_list/$1/$2/$3';
$route['gen-getlist-(:any)']                                   =   'genParameter/getGenDataTableList/$1';
$route['blank_page']                               = 'genparameter/blankpage';
$route['blank-page-add-(:any)-(:any)-(:any)']           = 'genParameter/blankparameter/$1/$2/$3';


// business parameter

$route['business-parameter']  = 'businessParam/business_parameter';
$route['bsn-getlist']         =   'businessParam/getBsnDataTableList';

// menu master and sub menu master

$route['menu-master-list']  			          = 'setting/menu_master_list';
$route['menu-master-add']  				          = 'setting/menu_master_add';
$route['menu-master-edit-(:any)']  				  = 'setting/menu_master_edit/$1';
$route['submenu-master-add']  			        = 'setting/submenu_master_add';
$route['submenu-master-edit-(:any)']  		  = 'setting/submenu_master_edit/$1';
$route['submenu-master-list']  			        = 'setting/submenu_master_list';
$route['menu-master-detail-(:any)']         = 'setting/menu_master_detail/$1';
$route['submenu-master-detail-(:any)']  		= 'setting/submenu_master_detail/$1';
// $route['submenu-master-detail']  		        = 'setting/submenu_master_detail';
$route['mnu-getlist']                       = 'setting/getMnuDataTableList';
$route['submnu-getlist']                    = 'setting/getSubMnuDataTableList';

//people Tags

$route['tags']                              = 'tags/people_tags';
$route['tag-getlist']                       = 'tags/getTagDataTableList';
$route['tag-getlist-(:any)']                = 'tags/getTagDataTableList/$1';
$route['tag-people-list-(:any)-(:any)']     = 'tags/tag_people_list/$1/$2';
$route['tag-company-list-(:any)-(:any)']    = 'tags/tag_company_list/$1/$2';
$route['tag-type-getlist-(:any)']           = 'tags/getTagDetailByType/$1';
$route['tag-type-getlist-(:any)']           = 'tags/getTagDetailByType/$1';





// Candidate
$route['candidate-list']  			= 'candidate/candidate_list';
$route['candidate-add']  			= 'candidate/candidate_add';
$route['candidate-add-(:any)-(:any)']  			= 'candidate/candidate_add/$1/$2';
$route['candidate-edit-(:any)']  	= 'candidate/candidate_edit/$1';
$route['candidate-details-(:any)']  = 'candidate/candidate_details/$1';
$route['candidate-getlist'] 		= 'candidate/candidate_getlist';
//CLient
$route['client-dashboard'] 			= 'client/client_dashboard';
$route['client-list'] 		    		= 'client/client_list';
$route['client-getlist'] 		    	= 'client/client_getlist';
$route['client-add'] 		    		= 'client/client_add';
$route['client-edit-(:any)'] 			= 'client/client_edit/$1';
$route['client-details-(:any)'] 		= 'client/client_details/$1';
$route['client-people-list-(:any)'] 	= 'client/client_people_list/$1';
$route['client-people-add'] 		    		= 'client/client_people_add';
$route['client-people-add-(:any)-(:any)'] 		= 'client/client_people_add/$1/$2';
$route['client-people-edit-(:any)-(:any)'] 	= 'client/client_people_edit/$1/$2';
$route['client-delete-(:any)']					= 'client/client_delete/$1';
$route['client-people-detail-(:any)']			= 'client/client_people_detail/$1';
$route['client-account-list'] 		    		= 'client/client_account_list';
$route['client-account-detail'] 		    	= 'client/client_account_detail';


// ***** CASHBOOK MODULES End *******//

/*Account Module Start */

$route['account'] 								= 'account/list_account';
// $route['account-list'] 							= 'account/list_account';
$route['account-add'] 							= 'account/add_account';
$route['account-edit-(:any)'] 					= 'account/edit_account/$1';
$route['account-delete-(:any)'] 				= 'account/delete_account/$1';
$route['account-default-(:any)'] 				= 'account/default_account/$1';
$route['account-detail-(:any)'] 				= 'account/detail_account/$1';
$route['getaccountlist'] 						= 'account/accountDataTablelist';

/*Account Module End */

/*Cashbook Category Module Start */

$route['cashbook-category'] 					= 'cashbook_category/list_cashbook_category';
$route['cashbook-category-list'] 				= 'cashbook_category/list_cashbook_category';
$route['cashbook-category-add'] 				= 'cashbook_category/add_cashbook_category';
$route['cashbook-category-edit-(:any)'] 		= 'cashbook_category/edit_cashbook_category/$1';
$route['cashbook-category-delete-(:any)'] 		= 'cashbook_category/delete_cashbook_category/$1';
$route['getcashbook_categorylist'] 				= 'cashbook_category/cashbook_categoryDataTablelist';

/*Cashbook Category Module End */

/*Cashbook Sub Category Module Start */

$route['cashbook-sub-category'] 				= 'cashbook_sub_category/list_cashbook_sub_category';
$route['cashbook-sub-category-list'] 			= 'cashbook_sub_category/list_cashbook_sub_category';
$route['cashbook-sub-category-add'] 			= 'cashbook_sub_category/add_cashbook_sub_category';
$route['cashbook-sub-category-edit-(:any)'] 	= 'cashbook_sub_category/edit_cashbook_sub_category/$1';
$route['cashbook-sub-category-delete-(:any)'] 	= 'cashbook_sub_category/delete_cashbook_sub_category/$1';
$route['getcashbook_sub_categorylist'] 			= 'cashbook_sub_category/cashbook_sub_categoryDataTablelist';

/*Cashbook Sub Category Module End */


/*Cashbook Module Start */

$route['cashbook'] 								= 'cashbook/list_cashbook';
$route['cashbook-list'] 						= 'cashbook/list_cashbook';
$route['cashbook-delete-(:any)'] 				= 'cashbook/delete_cashbook/$1';
$route['cashbook-detail-(:any)'] 				= 'cashbook/detail_cashbook/$1';
$route['cashbook-approve'] 						= 'cashbook/approve_cashbook';
$route['cashbook-reject'] 						= 'cashbook/reject_cashbook';
$route['getcashbooklist'] 						= 'cashbook/cashbookDataTablelist';

/*Cashbook Module End */

/*Expense Module Start */

$route['expense-add'] 							= 'expense/add_expense';
$route['expense-edit-(:any)'] 					= 'expense/edit_expense/$1';
$route['user-expense'] 							= 'expense/list_user_expense';
$route['user-expense-list'] 					= 'expense/list_user_expense';
$route['getexpenselist'] 						= 'expense/expenseDataTablelist';
$route['user-expense-add'] 						= 'expense/add_user_expense';
$route['user-expense-edit-(:any)'] 				= 'expense/edit_user_expense/$1';
$route['user-expense-detail-(:any)'] 			= 'expense/detail_user_expense/$1';

/*Expense Module End */

/*Income Module Start */

$route['income-add'] 							= 'income/add_income';
$route['income-edit-(:any)'] 					= 'income/edit_income/$1';

/*Income Module End */


// ***** CASHBOOK MODULES END *******//

// ******* Company Profile Starts here  *******//
$route['company-profile'] 						= 'people/company_profile';
$route['company-profile-update-(:any)'] 		= 'people/company_profile_update/$1';
// ******* Company Profile Ends here  *******//

// Product
$route['product-list']  	             = 'product/product_list';
$route['product-add']  	               = 'product/product_add';
$route['product-edit-(:any)']  	       = 'product/product_edit/$1';
$route['product-details-(:any)']       = 'product/product_details/$1';
$route['product-getlist']              = 'product/product_getlist';

//target
$route['target-list'] 		  			= 'target/target_list';
$route['target-add'] 		    		= 'target/target_add';
$route['target-details'] 				= 'target/target_details';
// $route['target-edit-(:any)'] 		    = 'target/target_edit/$1';
// $route['target-detail-(:any)'] 			= 'target/target_detail/$1';
// $route['target-getTargetList'] 			= 'target/getTargetDataTableList';


/*Ticket Module Start */

$route['task-list'] 							= 'task/task_list';
$route['task-add'] 							  = 'task/task_add';
$route['task-getlist'] 						= 'task/task_getlist';
$route['task-getlistbyme'] 			  = 'task/task_getlist_byme';
$route['task-detail-(:any)']			= 'task/task_detail/$1';
$route['task-edit-(:any)']				= 'task/task_edit/$1';
$route['task-delete-(:any)']				= 'task/task_delete/$1';

$route['task-internal-list'] 					= 'ticket/internal_ticket_list';
$route['task-project-list'] 					= 'ticket/client_ticket_list';
$route['task-dashboard']				= "task/task_dashboard";
//$route['task-dashboard']		= "TaskDashboard/task_dashboard_main";

/*Ticket Module End */


//********* Additional Detail Module Start *********//
$route['additional-detail-category-list'] 			= 'Additional_details/adt_category_list';
$route['getadtCatList'] 			                = 'Additional_details/getadtCatList';
$route['additional-detail-master-list'] 			= 'Additional_details/adt_master_list';
$route['getadtMasterList'] 			                = 'Additional_details/getadtMasterList';
$route['additional-detail-master-add'] 			    = 'Additional_details/adt_master_form';
$route['additional-detail-master-edit-(:any)'] 		= 'Additional_details/adt_master_form/$1';
//********* Additional Detail Module End *********//


// ********** Email Template Module start **********//
$route['email-template-list'] 				      = 'emailTemplate/email_template_list';
$route['email-template-add'] 				        = 'emailTemplate/email_template_add';
$route['email-template-detail-(:any)'] 			= 'emailTemplate/email_template_detail/$1';
$route['email-template-edit-(:any)'] 				= 'emailTemplate/email_template_edit/$1';
$route['emailTemp-getlist'] 						    = 'emailTemplate/email_temp_getlist';

// ********** Email Template Module end **********//

// ********** Meeting Module start **********//
$route['meeting-list'] 				= 'meeting/meeting_list';
$route['meeting-add'] 				= 'meeting/meeting_add';
$route['meeting-edit-(:any)']  		= 'meeting/meeting_edit/$1';
$route['meeting-details-(:any)']  	= 'meeting/meeting_detail/$1';
$route['meeting-getlist'] 			= 'meeting/meeting_getlist';
$route['meeting-delete-(:any)']		= 'meeting/meeting_delete/$1';
// ********** Meeting Module end **********//


//redymate module

$route['module-list']				= "Module/module_list";
$route['module-add']				="Module/module_add";
$route['module-details']			="Module/module_details";


//Master Process start here
$route['master-process-list'] 		    	= 'process/master_process_list';
$route['master-process-add'] 		    	= 'process/master_process_add';
$route['master-process-detail'] 		    = 'process/master_process_detail';
$route['master-task-list'] 		    		= 'process/master_task_list';
$route['master-task-add'] 		    		= 'process/master_task_add';
$route['master-task-detail'] 		    	= 'process/master_task_detail';
$route['process-initiate-list'] 		    = 'process/process_initiate_list';
$route['process-initiate-detail'] 		    = 'process/process_initiate_detail';
$route['assign-task-list'] 		    		= 'process/assign_task_list';
$route['my-task-list'] 		    			= 'process/my_task_list';
$route['my-task-edit'] 		    			= 'process/my_task_edit';
$route['my-task-detail'] 		    		= 'process/my_task_detail';
$route['process-assign-task-list'] 		    = 'process/process_assign_task_list';

//Master Process ends here


//invoice and quotation


$route['quotation-add']  = 'quotation/quotation_add';
$route['quotation-add-(:any)']  = 'quotation/quotation_add/$1';
$route['quotation-list']  = 'quotation/quotation_list';
$route['quotation-edit-(:any)']  = 'quotation/quotation_edit/$1';
$route['quotation-details-(:any)']  = 'quotation/quotation_details/$1';
$route['quotation-print-(:any)']  = 'quotation/quotation_printable_form/$1';


$route['invoice-add']  = 'invoice/invoice_add';
$route['invoice-add-(:any)']  = 'invoice/invoice_add/$1';
$route['invoice-list']  = 'invoice/invoice_list';
$route['invoice-edit-(:any)']  = 'invoice/invoice_edit/$1';
$route['invoice-details-(:any)']  = 'invoice/invoice_details/$1';
$route['invoice-print-(:any)']  = 'invoice/invoice_printable_form/$1';



// outstanding
$route['outstanding-list']  				= 'outstanding/outstanding_list';
$route['outstanding-add']  					= 'outstanding/outstanding_add';
$route['outstanding-details-(:any)']  		= 'outstanding/outstanding_details/$1';
$route['outstanding-print-(:any)']  		= 'outstanding/outstanding_print/$1';


// payment
$route['payment-list']  			= 'invoice_payment/payment_list';
$route['payment-add']  				= 'invoice_payment/payment_add';
$route['payment-add-(:any)']  	    = 'invoice_payment/payment_add/$1';
$route['payment-details-(:any)']  	= 'invoice_payment/payment_details/$1';

//target deshboard

$route['target-dashboard']			= 'Target/Target_dashboard';

//Project module

$route['project-list']				='project/project_list';
$route['project-add']				='project/project_add';
$route['project-details-(:any)']	='project/project_details/$1';
$route['project-edit-(:any)']		='project/project_add/$1';

//Milestone module

$route['milestone-list']				='Milestone/milestone_list';
$route['milestone-add']				    ='Milestone/milestone_add';
$route['milestone-details']			    ='Milestone/milestone_details';

//Form access
$route['form-access']            = 'Form_access';
$route['get-form-modules']       = 'Form_access/getModules';

// campaign
$route['campaign-list']				='Campaign/campaign_list';
$route['campaign-add']				='Campaign/campaign_add';
$route['campaign-details']			='Campaign/campaign_details';

// value-addition
$route['value-addition-list']				='valueAddition/value_addition_list';
$route['value-addition-add']				='valueAddition/value_addition_add';
$route['value-addition-details']			='valueAddition/value_addition_details';

// reports
$route['report-80-20']						='Reports/report_80_20';
$route['customer-report-80-20']				='Reports/customer_report_80_20';
$route['top-customer-report-80-20']			='Reports/top_customer_report_80_20';
$route['bottom-customer-report-80-20']		='Reports/bottom_customer_report_80_20';

$route['bottom-customer-report-80-20']		='Reports/bottom_customer_report_80_20';
$route['customer-invoice-report-80-20']		='Reports/customer_invoice_report_80_20';
$route['product-invoice-report-80-20']		='Reports/product_invoice_report_80_20';

$route['product-report-80-20']				='Reports/product_report_80_20';
$route['top-product-report-80-20']			='Reports/top_product_report_80_20';
$route['bottom-product-report-80-20']		='Reports/bottom_product_report_80_20';

$route['team-report-80-20']					='Reports/team_report_80_20';
$route['team-invoice-report-80-20']			='Reports/team_invoice_report_80_20';
$route['business-generation']				='Reports/business_generation';
$route['sales-funnel']						='Reports/sales_funnel';
$route['customer-pie-sales']				='Reports/customer_pie_sales';
$route['product-pie-sales']					='Reports/product_pie_sales';
$route['source-pie-sales']					='Reports/source_pie_sales';
$route['team-pie-sales']					='Reports/team_pie_sales';
$route['sales-dashboard']					='Reports/sales_dashboard';
$route['my-day']							='Reports/my_day';
$route['my-day-(:any)']						='Reports/my_day/$1';
$route['sales-report']						='Reports/sales_report';
$route['invoice-report'] 					='Reports/invoice_report';
// productivity-dashboard
// $route['productivity-dashboard']							='productivity/productivity_dashboard';
// active leads
$route['active-lead-list'] 		    		= 'lead/active_lead_list';
// sales follow up
$route['sales-followup-list'] 		    	= 'followup/sales_followup_list';
// animation
$route['custom-widgets'] 		    		= 'Widgets/custom_widgets';

// notice board
$route['notice-board-list'] 		    	= 'noticeBoard/notice_board_list';
$route['notice-board-add'] 		    		= 'noticeBoard/notice_board_add';

// resource

$route['resources-list'] 		    		= 'Resources/resources_list';
$route['resources-add'] 		    		= 'Resources/resources_add';
$route['resources-details'] 		    	= 'Resources/resources_details';

// Notes
$route['notes-list'] 		    			= 'Notes/notes_list';

// email-preview
$route['email-preview'] 		    		= 'emailPreview/email_preview';
$route['email-sent'] 		    			= 'emailPreview/email_sent';
$route['email-compose'] 		    		= 'emailPreview/email_compose';
$route['email-draft'] 		    			= 'emailPreview/email_draft';



// amc
$route['amc-list'] 		    				= 'Amc/amc_list';
$route['amc-add'] 		    				= 'Amc/amc_add';
$route['amc-details-(:any)'] 		    	= 'Amc/amc_details/$1';
$route['amc-edit-(:any)'] 		    		= 'Amc/amc_edit/$1';
$route['amc-getlist-(:any)']				= 'Amc/amc_getlist/$1';

// testimonials
$route['testimonial-list'] 		    		= 'Testimonial/testimonial_list';
$route['testimonial-getlist'] 		    	= 'Testimonial/getTestimonialtDataTableList';
$route['testimonial-add'] 		    		= 'Testimonial/testimonial_add';
// $route['testimonial-edit'] 		    		= 'Testimonial/testimonial_edit';
$route['testimonial-edit-(:any)']  			= 'Testimonial/testimonial_edit/$1';

// declaration
$route['declaration-list'] 		    		= 'Declaration/declaration_list';
$route['declaration-add'] 		    		= 'Declaration/declaration_add';
$route['declaration-details'] 		    	= 'Declaration/declaration_details';

// Inventory
$route['inventory-list']  					= 'inventory/inventory_list';
$route['inventory-add']  					= 'inventory/inventory_add';
$route['inventory-add-purchase']  			= 'inventory/inventory_add_purchase';
$route['inventory-details-(:any)']  		= 'inventory/inventory_details/$1';
$route['inventory-getlist']  				= 'inventory/getInventoryList';
$route['inventory-detail-list-(:any)']  	= 'inventory/getInventoryDetailList/$1';
$route['inventory-out']  					= 'inventory/inventory_out';
$route['inventory-out-dispatch']  				= 'inventory/inventory_out_dispatch';

// purchase-order
$route['purchase-order-list']  				= 'purchaseOrder/purchase_order_list';
$route['purchase-order-add']  				= 'purchaseOrder/purchase_order_add';
$route['purchase-order-edit-(:any)']  		= 'purchaseOrder/purchase_order_edit/$1';
$route['purchase-order-details-(:any)']  	= 'purchaseOrder/purchase_order_details/$1';
$route['purchase-order-print-(:any)']  		= 'purchaseOrder/purchase_order_print/$1';
$route['purchase-order-getlist']  			= 'purchaseOrder/getPurchaseOrderList';
$route['purchase-order-getinventorylist']  	= 'purchaseOrder/getInventoryList';

// order
$route['order-list']  						= 'order/order_list';
$route['order-add']  						= 'order/order_add';
$route['order-details-(:any)']  			= 'order/order_details/$1';
$route['order-edit-(:any)']  			    = 'order/order_edit/$1';
$route['order-print-(:any)']  				= 'order/order_print/$1';
$route['order-getlist']  				    = 'order/getModuleList';

// Dispatch Order
$route['dispatch-order-list']  				= 'dispatchOrder/dispatch_order_list';
$route['dispatch-order-add']  				= 'dispatchOrder/dispatch_order_add';
$route['dispatch-order-details-(:any)']  	= 'dispatchOrder/dispatch_order_details/$1';
$route['dispatch-order-print-(:any)']  		= 'dispatchOrder/dispatch_order_print/$1';
$route['dispatch-order-edit-(:any)']  		= 'dispatchOrder/dispatch_order_edit/$1';
$route['dispatch-order-getlist']  			= 'dispatchOrder/getModuleList';


//Auto Deployment
	// subscription
$route['subscription-list']  				= 'subscription/subscription_list';
$route['subscription-add']  				= 'subscription/subscription_add';
$route['subscription-details-(:any)']  		= 'subscription/subscription_details/$1';
	// transaction
$route['transaction-list']  				= 'transaction/transaction_list';
$route['transaction-add']  					= 'transaction/transaction_add';
$route['transaction-details']  				= 'transaction/transaction_details';


$route['autodeploy-addclient'] 				= 'autodeployment/createClient';
$route['autodeploy-updateclient']			= 'autodeployment/updateAllClientDatabase';
$route['autodeploy-updatequery']			= 'autodeployment/UpdateQueryToClientDatabase';

// Stock Transfer
$route['stock-transfer-list']  				= 'stockTransfer/stock_transfer_list';
$route['stock-transfer-add']  				= 'stockTransfer/stock_transfer_add';
$route['stock-transfer-getlist']  			= 'stockTransfer/getStockTransferList';
$route['stock-transfer-details-(:any)']  	= 'stockTransfer/stock_transfer_details/$1';
$route['stock-transfer-getinventorylist']  	    = 'stockTransfer/getInventoryList';
