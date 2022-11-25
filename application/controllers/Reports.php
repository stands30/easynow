<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        check_logged();
		$this->load->model('report_model');
		$this->load->model('dashboard_model');
    }
	public function report_80_20()
	{
		$data['title'] 		=	'80 20 Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/report-80-20', $data);
	}

	public function customer_report_80_20()
	{
		$data['title'] 		=	'80 20 Customer Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/customer-report-80-20', $data);
	}

	public function top_customer_report_80_20()
	{
		$data['title'] 		=	'Top Customer Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/top-customer-report-80-20', $data);
	}

	public function bottom_customer_report_80_20()
	{
		$data['title'] 		=	'Bottom Customer Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/bottom-customer-report-80-20', $data);
	}

	public function product_report_80_20()
	{
		$data['title'] 		=	'80 20 Product Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/product-report-80-20', $data);
	}

	public function top_product_report_80_20()
	{
		$data['title'] 		=	'80 20 Product Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/top-product-report-80-20', $data);
	}

	public function bottom_product_report_80_20()
	{
		$data['title'] 		=	'80 20 Product Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/bottom-product-report-80-20', $data);
	}


	public function team_report_80_20()
	{
		$data['title'] 		=	'80 20 Team Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/team-report-80-20', $data);
	}

	public function customer_invoice_report_80_20()
	{
		$data['title'] 		=	'80 20 Customer Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/customer-invoice-report-80-20', $data);
	}

	public function product_invoice_report_80_20()
	{
		$data['title'] 		=	'80 20 Product Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/product-invoice-report-80-20', $data);
	}

	public function team_invoice_report_80_20()
	{
		$data['title'] 		=	'80 20 Team Reports';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/team-invoice-report-80-20', $data);
	}

	public function business_generation()
	{
		$data['title'] 		=	'Business Generation';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/business-generation', $data);
	}

	public function sales_funnel()
	{
		$data['title'] 		=	'Sales Funnel';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/sales-funnel', $data);
	}


	public function customer_pie_sales()
	{
		$data['title'] 		=	'Customer Pie Sales';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/customer-pie-sales', $data);
	}

	public function product_pie_sales()
	{
		$data['title'] 		=	'Product Pie Sales';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/product-pie-sales', $data);
	}

	public function source_pie_sales()
	{
		$data['title'] 		=	'Source Pie Sales';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/source-pie-sales', $data);
	}

	public function team_pie_sales()
	{
		$data['title'] 		=	'Team Pie Sales';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        
		$this->load->view('reports/team-pie-sales', $data);
	}

	public function sales_dashboard()
	{
		$data['title'] 		=	'Sales Dashboard';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$data['lead_stages'] = $this->dashboard_model->getLeadStage();
		$data['lead_sales'] = $this->dashboard_model->getLeadSalesDetail();
		$data['today_sales'] = $this->dashboard_model->getWonLeads('today');
		$data['week_sales'] = $this->dashboard_model->getWonLeads('week');
		$data['month_sales'] = $this->dashboard_model->getWonLeads('month');
		$data['year_sales'] = $this->dashboard_model->getWonLeads('year');
		$this->load->view('reports/sales-dashboard', $data);
	}
	
	public function my_day($date='')
	{
		$data['title'] 		=	'My Day';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		if($date== '')
		{
			$date = date('Y-m-d');
		}
        $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);

		$data['myday_date'] = $date;
		$data['follow_up_due'] = $this->report_model->getFollowUpDataByDay(LEAD_FOLLOWUP_STATUS_PENDING,$data['myday_date'], $ppl_id);
		$data['follow_up_completed'] = $this->report_model->getFollowUpDataByDay(LEAD_FOLLOWUP_STATUS_DONE,$data['myday_date'], $ppl_id);
		$data['task_pending'] = $this->report_model->getTaskDataByDay(TASK_PENDING,$data['myday_date'], $ppl_id);
		$data['task_completed'] = $this->report_model->getTaskDataByDay(TASK_DONE,$data['myday_date'], $ppl_id);
		$data['new_people'] = $this->report_model->getNewPeopleDataByDay($data['myday_date'], $ppl_id);
		$data['new_lead'] = $this->report_model->getNewLeadDataByDay($data['myday_date'], $ppl_id);
		$data['new_account'] = $this->report_model->getNewAccountDataByDay($data['myday_date'], $ppl_id);
		$data['my_task'] = $this->report_model->getMyTaskDataByDay($data['myday_date'], $ppl_id);
        
		$this->load->view('reports/my-day', $data);
	}

	public function sales_report()
	{
		$data['title'] 		=	'Sales Report';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();

        $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);

        $data['lead_stage'] = $this->report_model->getLeadStageDashboard();
        $data['quotation_status'] = $this->report_model->getQuotationDashboard();
        $data['invoice_status'] = $this->report_model->getInvoiceDashboard();
        $data['followup_status'] = $this->report_model->getLeadFollowUpDashboard();

		$this->load->view('reports/sales-report', $data);

	}

	 public function invoice_report()
	{
		$data['title'] 		=	'Invoice Report';
		$data['global_asset_version'] = global_asset_version();
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Mandate', base_url('mandate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$this->load->view('reports/invoice-report', $data);
	}
}

?>
