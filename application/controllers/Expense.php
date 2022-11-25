<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('expense_model');
    }

   

	public function add_expense()
	{
		$data['title'] 		=	'Expense Add';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook', base_url('cashbook-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('cashbook-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$data['account'] = $this->home_model->detail_data('acc.*', 'account acc', 'acc.acc_default = "'.ACCOUNT_DEFAULT.'" ');

		$this->load->view('cashbook/expense/expense_add', $data);
	}

	public function edit_expense($expense_id ='')
	{
		$expense_id 		= 	$this->nextasy_url_encrypt->decrypt_openssl($expense_id);
		$data['title'] 		=	'Expense Edit';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook', base_url('cashbook-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('cashbook-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$data['expense'] =  $this->home_model->detail_data('csb.*,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = "cashbook_type" ) csb_type_name,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_approve and gnp_group = "approval_status" ) csb_approve_name,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csb.csb_cbc_id ) csb_cbc_name ,(select csc_name from cashbook_sub_category where cashbook_sub_category.csc_id = csb.csb_csc_id ) csb_csc_name ,(select ppl_name from people where people.ppl_id = csb.csb_ppl_id ) csb_ppl_name,(select acc_name from account where account.acc_id = csb.csb_acc_id ) csb_acc_name', 'cashbook csb', 'csb_id = "'.$expense_id.'"');

		$this->load->view('cashbook/expense/expense_edit', $data);
	}

	// ***** Expense Insert Starts Here ********//
    public function insertExpense()
    {
    	$data_expense = $this->input->post();
    	$csbId = $this->home_model->save_data('cashbook', $data_expense, 'csb_id');
    	$expense_id = 	$this->nextasy_url_encrypt->encrypt_openssl($csbId);

		if($csbId)
		{
			$success = true;
			$message = 'Expense Added successfully';
			$linkn   =  base_url('cashbook-detail-'.$expense_id);
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** Expense Insert End Here ********//


    // ***** Expense Update Starts Here ********//
    public function updateExpense()
    {
    	$data_expense = $this->input->post();
    	$csbId 		  = $this->home_model->update_data('cashbook', $data_expense, 'csb_id');
    	$expense_id   = $this->nextasy_url_encrypt->encrypt_openssl($csbId);

		if($csbId)
		{
			$success = true;
			$message = 'Expense Update successfully';
			$linkn   =  base_url('cashbook-detail-'.$expense_id);
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** Expense Update End Here ********//

     // ***** Cashbook Approval Start Here *******//

	public function getGenPrmforDropdown($genPrmGroup)
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->expense_model->getGenPrmforDropdown($genPrmGroup,$search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook Approval End Here ********//

    // ***** Cashbook  Category Start Here *******//

	public function getCategoryforDropdown()
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->expense_model->getCategoryforDropdown($search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook  Category End Here ********//


     // ***** Cashbook Sub Category Start Here *******//

	public function getSubCategoryforDropdown($category_id = '')
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->expense_model->getSubCategoryforDropdown($search,$category_id));
		echo json_encode($LeadData);
	}

    // *****  Cashbook Sub Category End Here ********//




    // ***** Cashbook People Start Here *******//

	public function getPersonforDropdown()
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->expense_model->getPersonforDropdown($search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook People End Here ********//


    // ***** Cashbook Account Start Here *******//

	public function getAccountforDropdown()
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->expense_model->getAccountforDropdown($search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook Account End Here ********//


    // ******* User Expense Starts here *******//


    public function add_user_expense()
	{
		$data['title'] 		=	'Expense Add';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('user-expense-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$data['account'] = $this->home_model->detail_data('acc.*', 'account acc', 'acc.acc_default = "'.ACCOUNT_DEFAULT.'" ');

		$this->load->view('cashbook/expense/user_expense_add', $data);
	}

	public function edit_user_expense($expense_id ='')
	{
		$expense_id 		= 	$this->nextasy_url_encrypt->decrypt_openssl($expense_id);
		$data['title'] 		=	'Expense Edit';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('user-expense-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$data['expense'] =  $this->home_model->detail_data('csb.*,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = "cashbook_type" ) csb_type_name,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_approve and gnp_group = "approval_status" ) csb_approve_name,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csb.csb_cbc_id ) csb_cbc_name ,(select csc_name from cashbook_sub_category where cashbook_sub_category.csc_id = csb.csb_csc_id ) csb_csc_name ,(select ppl_name from people where people.ppl_id = csb.csb_ppl_id ) csb_ppl_name,(select acc_name from account where account.acc_id = csb.csb_acc_id ) csb_acc_name', 'cashbook csb', 'csb_id = "'.$expense_id.'"');

		$this->load->view('cashbook/expense/user_expense_edit', $data);
	}

	// ***** User Expense Insert Starts Here ********//
    public function insertUserExpense()
    {
    	$data_expense = $this->input->post();
    	$csbId = $this->home_model->save_data('cashbook', $data_expense, 'csb_id');
    	$expense_id = 	$this->nextasy_url_encrypt->encrypt_openssl($csbId);

		if($csbId)
		{
			$success = true;
			$message = 'Expense Added successfully';
			$linkn   =  base_url('user-expense-detail-'.$expense_id);
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** User Expense Insert End Here ********//


    // ***** User Expense Update Starts Here ********//
    public function updateUserExpense()
    {
    	$data_expense = $this->input->post();
    	$csbId 		  = $this->home_model->update_data('cashbook', $data_expense, 'csb_id');
    	$expense_id   = $this->nextasy_url_encrypt->encrypt_openssl($csbId);

		if($csbId)
		{
			$success = true;
			$message = 'Expense Update successfully';
			$linkn   =  base_url('user-expense-detail-'.$expense_id);
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** Expense Update End Here ********//

    public function list_user_expense()
	{
		$data['title'] 		=	'User Expense List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//
		$data['cashbookList']        = $this->home_model->list_data('csb.*', 'cashbook csb', 'csb_status <> "'.IN_ACTIVE_STATUS.'" and csb_transaction_type = "'.CASHBOOK_USER.'" ');
        $data['dataTableData'] = $this->expense_model->getUserExpenseList(TABLE_COUNT);
		$this->load->view('cashbook/expense/user_expense_list', $data);
	}

	public function expenseDataTablelist()
    {
		  $dataOptn = $this->input->get();
	      $dataTableData = $this->expense_model->getUserExpenseList(TABLE_RESULT,$dataOptn);
	      // ******** Encrypt Data from multidimensional array ******//
	      $enc_arr['cashbook_id']    = 'csb_id_encrypt';
	      $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
	      // ******** Encrypt Data from multidimensional array ******//
	      if(isset($dataOptn['columns']))
	        {
	           // *********** Get Data Count **********//
	              $dataTableArray['draw']             = $dataOptn['draw'];
	              $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
	              $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
	          // *********** Get Data Count **********//
	      }
	      echo json_encode($dataTableArray);
    }

    public function detail_user_expense($cashbook_id='')
    {
    	$cashbook_id = 	$this->nextasy_url_encrypt->decrypt_openssl($cashbook_id);

    	$data['cashbook_details'] 		= $this->home_model->detail_data('csb.*,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = "cashbook_type" ) csb_type_name,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_approve and gnp_group = "approval_status" ) csb_approve_name,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csb.csb_cbc_id ) csb_cbc_name ,(select csc_name from cashbook_sub_category where cashbook_sub_category.csc_id = csb.csb_csc_id ) csb_csc_name ,(select ppl_name from people where people.ppl_id = csb.csb_ppl_id ) csb_ppl_name,(IFNULL((select MIN(csb_id) from cashbook where csb_id > "'.$cashbook_id.'"),(SELECT MIN(csb_id) from cashbook))) next,(IFNULL((select MAX(csb_id) from cashbook where csb_id < "'.$cashbook_id.'"),(SELECT MAX(csb_id) from cashbook))) prev,
      (select acc_name from account where account.acc_id = csb.csb_acc_id ) csb_acc_name', 'cashbook csb', 'csb_id = "'.$cashbook_id.'"');

		$data['type'] = strtolower($data['cashbook_details']['csb_type_name']);

    	$data['title'] 		=	$data['cashbook_details']['csb_particular'].'-'.$data['cashbook_details']['csb_type_name'].' Cashbook Detail';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('user-expense-list'));
		$data['breadcrumb_data'][] = array('Detail');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
    $data['cashbook_details']['next_encrypt'] 	= $this->nextasy_url_encrypt->encrypt_openssl($data['cashbook_details']['next']);
		$data['cashbook_details']['prev_encrypt']  	= $this->nextasy_url_encrypt->encrypt_openssl($data['cashbook_details']['prev']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$this->load->view('cashbook/expense/user_expense_details', $data);
    }

     // ******* User Expense Starts here *******//

}