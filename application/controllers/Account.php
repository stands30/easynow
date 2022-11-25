<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('account_model');
    }

    public function account_dashboard()

	{
		$data['title'] 		=	'Account Dashboard';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Account');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$this->load->view('cashbook/account/account_dashboard', $data);
	}
	
	public function list_account()
	{
		$data['title'] 		=	'Account List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Account', base_url('account-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$data['dataTableData'] = $this->account_model->getAccountList(TABLE_COUNT);
		
		$this->load->view('cashbook/account/account_list', $data);
	}

	public function accountDataTablelist()
    {

		$dataOptn = $this->input->get();
	    $dataTableData = $this->account_model->getAccountList(TABLE_RESULT,$dataOptn);
	      // ******** Encrypt Data from multidimensional array ******//
	    $enc_arr['acc_id']    	= 'acc_id_encrypt';
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

	public function add_account()
	{
		$data['title'] 		=	'Account Add';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Account', base_url('account-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('account-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//


		$this->load->view('cashbook/account/account_add', $data);
	}

	public function edit_account($account_id ='')
	{
		$account_id 		= 	$this->nextasy_url_encrypt->decrypt_openssl($account_id);
		$data['title'] 		=	'Account Edit';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Account', base_url('account-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('account-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$data['account'] =  $this->home_model->detail_data('*', 'account', 'acc_id = "'.$account_id.'"');

		$this->load->view('cashbook/account/account_edit', $data);
	}

	// ***** Account Insert Starts Here ********//
    public function insertAccount()
    {
    	$data_account = $this->input->post();
    	$accId = $this->home_model->save_data('account', $data_account, 'acc_id');

		if($accId)
		{
			$success = true;
			$message = 'Account Added successfully';
			$linkn   =  base_url('account-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** Account Insert End Here ********//


    // ***** Account Update Starts Here ********//
    public function updateAccount()
    {
    	$data_account = $this->input->post();
    	$accId = $this->home_model->update_data('account', $data_account, 'acc_id');

		if($accId)
		{
			$success = true;
			$message = 'Account Update successfully';
			$linkn   =  base_url('account-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** Account Update End Here ********//

    // ***** Account deleted Starts Here ********//
    public function delete_account($account_id='')
    {
    	$account_id = 	$this->nextasy_url_encrypt->decrypt_openssl($account_id);
    	$accId = $this->home_model->delete_data('account', $account_id, 'acc_id');

		if($accId)
		{
			$success = true;
			$message = 'Account deleted successfully';
			$linkn   =  base_url('account-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** Account deleted End Here ********// 

    // ***** Account default Starts Here ********//
    public function default_account($account_id='')
    {
    	$account_id = 	$this->nextasy_url_encrypt->decrypt_openssl($account_id);
    	$accId = $this->account_model->changeToDefault($account_id);

		if($accId)
		{
			$success = true;
			$message = 'Default Account updated successfully';
			$linkn   =  base_url('account-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** Account default End Here ********//


     // ***** Account detail Starts Here ********//
    public function detail_account($account_id='')
    {
    	$account_id = 	$this->nextasy_url_encrypt->decrypt_openssl($account_id);

    	$data['account_details'] = $this->home_model->detail_data('acc.*,(select SUM(cashbook.csb_amount) from cashbook where cashbook.csb_type= "'.CASHBOOK_INCOME.'" and acc.acc_id = cashbook.csb_acc_id and cashbook.csb_approve = "'.CASHBOOK_APPROVED.'" ) total_income,(select COUNT(cashbook.csb_id) from cashbook where cashbook.csb_type= "'.CASHBOOK_INCOME.'" and acc.acc_id = cashbook.csb_acc_id and cashbook.csb_approve = "'.CASHBOOK_APPROVED.'" ) total_income_trans,(select SUM(cashbook.csb_amount) from cashbook where cashbook.csb_type= "'.CASHBOOK_EXPENSE.'" and acc.acc_id = cashbook.csb_acc_id and cashbook.csb_approve = "'.CASHBOOK_APPROVED.'" ) total_expense ,(select COUNT(cashbook.csb_id) from cashbook where cashbook.csb_type= "'.CASHBOOK_EXPENSE.'" and acc.acc_id = cashbook.csb_acc_id and cashbook.csb_approve = "'.CASHBOOK_APPROVED.'" ) total_expense_trans ,(select SUM(cashbook.csb_amount) from cashbook where cashbook.csb_type= "'.CASHBOOK_INCOME.'" and
       acc.acc_id = cashbook.csb_acc_id and cashbook.csb_approve = "'.CASHBOOK_PENDING.'" ) total_pending_income,(IFNULL((select MIN(acc_id) from account where acc_id > "'.$account_id.'"),(SELECT MIN(acc_id) from account))) next,(IFNULL((select MAX(acc_id) from account where acc_id < "'.$account_id.'"),(SELECT MAX(acc_id) from account))) prev,
       (select COUNT(cashbook.csb_id) from cashbook where cashbook.csb_type= "'.CASHBOOK_INCOME.'" and acc.acc_id = cashbook.csb_acc_id and cashbook.csb_approve = "'.CASHBOOK_PENDING.'" ) total_pending_income_trans,(select SUM(cashbook.csb_amount) from cashbook where cashbook.csb_type= "'.CASHBOOK_EXPENSE.'" and acc.acc_id = cashbook.csb_acc_id and cashbook.csb_approve = "'.CASHBOOK_PENDING.'" ) total_pending_expense,(select COUNT(cashbook.csb_id) from cashbook where cashbook.csb_type= "'.CASHBOOK_EXPENSE.'" and acc.acc_id = cashbook.csb_acc_id and cashbook.csb_approve = "'.CASHBOOK_PENDING.'" ) total_pending_expense_trans', 'account acc', 'acc.acc_id = "'.$account_id.'"');

    	$category_all_income = $this->home_model->list_data(' SUM(csb_amount) as total_amount,(select cashbook_category.cbc_name from cashbook_category where cashbook_category.cbc_id = cashbook.csb_cbc_id)category_name', 'cashbook', 'csb_acc_id = "'.$account_id.'" and csb_type = "'.CASHBOOK_INCOME.'" group by csb_cbc_id order by total_amount desc');

    	$category_income = $this->home_model->list_data(' SUM(csb_amount) as total_amount,(select cashbook_category.cbc_name from cashbook_category where cashbook_category.cbc_id = cashbook.csb_cbc_id)category_name', 'cashbook', 'csb_acc_id = "'.$account_id.'" and csb_type = "'.CASHBOOK_INCOME.'" group by csb_cbc_id order by total_amount desc limit 5 ');

    	$user_all_income = $this->home_model->list_data(' SUM(csb_amount) as total_amount,(select people.ppl_name from people where people.ppl_id = cashbook.csb_ppl_id)people_name', 'cashbook', 'csb_acc_id = "'.$account_id.'" and csb_type = "'.CASHBOOK_INCOME.'" group by csb_ppl_id order by total_amount desc ');

    	$user_income = $this->home_model->list_data(' SUM(csb_amount) as total_amount,(select people.ppl_name from people where people.ppl_id = cashbook.csb_ppl_id)people_name', 'cashbook', 'csb_acc_id = "'.$account_id.'" and csb_type = "'.CASHBOOK_INCOME.'" group by csb_ppl_id order by total_amount desc limit 5 ');

    	$category_all_expense = $this->home_model->list_data(' SUM(csb_amount) as total_amount,(select cashbook_category.cbc_name from cashbook_category where cashbook_category.cbc_id = cashbook.csb_cbc_id)category_name', 'cashbook', 'csb_acc_id = "'.$account_id.'" and csb_type = "'.CASHBOOK_EXPENSE.'" group by csb_cbc_id order by total_amount desc');

    	$category_expense = $this->home_model->list_data(' SUM(csb_amount) as total_amount,(select cashbook_category.cbc_name from cashbook_category where cashbook_category.cbc_id = cashbook.csb_cbc_id)category_name', 'cashbook', 'csb_acc_id = "'.$account_id.'" and csb_type = "'.CASHBOOK_EXPENSE.'" group by csb_cbc_id order by total_amount desc limit 5 ');

    	$user_all_expense = $this->home_model->list_data(' SUM(csb_amount) as total_amount,(select people.ppl_name from people where people.ppl_id = cashbook.csb_ppl_id)people_name', 'cashbook', 'csb_acc_id = "'.$account_id.'" and csb_type = "'.CASHBOOK_EXPENSE.'" group by csb_ppl_id order by total_amount desc ');

    	$user_expense = $this->home_model->list_data(' SUM(csb_amount) as total_amount,(select people.ppl_name from people where people.ppl_id = cashbook.csb_ppl_id)people_name', 'cashbook', 'csb_acc_id = "'.$account_id.'" and csb_type = "'.CASHBOOK_EXPENSE.'" group by csb_ppl_id order by total_amount desc limit 5 ');

    	$data['category_income'] = $category_all_income;

    	$data['category_income_json'] = json_encode($category_income);

    	$data['user_income'] = $user_all_income;

    	$data['user_income_json'] = json_encode($user_income);

    	$data['category_expense'] = $category_all_expense;

    	$data['category_expense_json'] = json_encode($category_expense);

    	$data['user_expense'] = $user_all_expense;

    	$data['user_expense_json'] = json_encode($user_expense);

    	
    	$data['title'] 		=	$data['account_details']['acc_name'].' Detail';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Account', base_url('account-dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('account-list'));
		$data['breadcrumb_data'][] = array('Detail');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
    $data['account_details']['next_encrypt'] 	= $this->nextasy_url_encrypt->encrypt_openssl($data['account_details']['next']);
		$data['account_details']['prev_encrypt']  	= $this->nextasy_url_encrypt->encrypt_openssl($data['account_details']['prev']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		// echo "<pre>";
		// print_r($data);
		// exit;

		$this->load->view('cashbook/account/account_details', $data);
    }
    // ***** Account detail End Here ********//


}