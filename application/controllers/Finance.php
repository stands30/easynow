<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller
{

	// Accounts CRUD

	public function accounts_add()
	{
		$data['title'] 		=	'Accounts Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('accounts-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/accounts/accounts-add', $data);
	}

	public function accounts_list()
	{
		$data['title'] 		=	'Accounts List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Mandate', base_url('mandate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/accounts/accounts-list', $data);
	}

	public function account_details()
	{
		$data['title'] 		=	'Account Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('accounts-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/accounts/account-details', $data);
	}

	// Expense CRUD

	public function expense_dashboard()
	{
		$data['title'] 		=	'Expense Dashboard';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('expense-dashboard'));
		$data['breadcrumb_data'][] = array('Expense');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/expense/expense-dashboard', $data);
	}

	public function expense_add()
	{
		$data['title'] 		=	'Expense Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('expense-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/expense/expense-add', $data);
	}

	public function expense_list()
	{
		$data['title'] 		=	'Expense List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Mandate', base_url('mandate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/expense/expense-list', $data);
	}

	public function expense_details()
	{
		$data['title'] 		=	'Expense Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('expense-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/expense/expense-details', $data);
	}

	public function expense_income_reports()
	{
		$data['title'] 		=	'Expense Income Reports';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('expense-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		
		$this->load->view('finance/expense/expense_income_reports', $data);
	}

	public function expense_reports()
	{
		$data['title'] 		=	'Expense Reports';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('expense-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		
		$this->load->view('finance/expense/expense_reports', $data);
	}

	// Purchase CRUD

	public function purchase_add()
	{
		$data['title'] 		=	'Purchase Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('purchase-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/purchase/purchase-add', $data);
	}

	public function purchase_list()
	{
		$data['title'] 		=	'Purchase List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Mandate', base_url('mandate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/purchase/purchase-list', $data);
	}

	public function purchase_details()
	{
		$data['title'] 		=	'Purchase Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('purchase-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/purchase/purchase-details', $data);
	}
	public function purchase_printable_form()
	{
		$data['title'] 		=	'Purchase Printing Form';
		$this->load->view('finance/purchase/purchase-printable-form',$data);
	}



	// Outstanding CRUD

	public function outstanding_add()
	{
		$data['title'] 		=	'Outstanding Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('outstanding-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		
		$this->load->view('finance/outstanding/outstanding-add', $data);
	}

	public function outstanding_list()
	{
		$data['title'] 		=	'Outstanding List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// $data['cache_version'] = cache_version();
		$this->load->view('finance/outstanding/outstanding-list', $data);
	}

	public function outstanding_details()
	{
		$data['title'] 		=	'Outstanding Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('outstanding-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cache_version'] = cache_version();
		$this->load->view('finance/outstanding/outstanding-details', $data);
	}



}

?>