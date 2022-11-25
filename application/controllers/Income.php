<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('income_model');
    }

	public function add_income()
	{
		$data['title'] 		=	'Income Add';

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

		$this->load->view('cashbook/income/income_add', $data);
	}

	public function edit_income($income_id ='')
	{
		$income_id 		= 	$this->nextasy_url_encrypt->decrypt_openssl($income_id);
		$data['title'] 		=	'Income Edit';

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

		$data['income'] =  $this->home_model->detail_data('csb.*,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = "cashbook_type" ) csb_type_name,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_approve and gnp_group = "approval_status" ) csb_approve_name,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csb.csb_cbc_id ) csb_cbc_name ,(select csc_name from cashbook_sub_category where cashbook_sub_category.csc_id = csb.csb_csc_id ) csb_csc_name ,(select ppl_name from people where people.ppl_id = csb.csb_ppl_id ) csb_ppl_name,(select acc_name from account where account.acc_id = csb.csb_acc_id ) csb_acc_name', 'cashbook csb', 'csb_id = "'.$income_id.'"');

		$this->load->view('cashbook/income/income_edit', $data);
	}

	// ***** income Insert Starts Here ********//
    public function insertincome()
    {
    	$data_income = $this->input->post();
    	$csbId = $this->home_model->save_data('cashbook', $data_income, 'csb_id');
    	$income_id = 	$this->nextasy_url_encrypt->encrypt_openssl($csbId);

		if($csbId)
		{
			$success = true;
			$message = 'Income Added successfully';
			$linkn   =  base_url('cashbook-detail-'.$income_id);
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** income Insert End Here ********//


    // ***** income Update Starts Here ********//
    public function updateincome()
    {
    	$data_income = $this->input->post();
    	$csbId 		  = $this->home_model->update_data('cashbook', $data_income, 'csb_id');
    	$income_id   = $this->nextasy_url_encrypt->encrypt_openssl($csbId);

		if($csbId)
		{
			$success = true;
			$message = 'Income Update successfully';
			$linkn   =  base_url('cashbook-detail-'.$income_id);
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** income Update End Here ********//

     // ***** Cashbook Approval Start Here *******//

	public function getGenPrmforDropdown($genPrmGroup)
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->income_model->getGenPrmforDropdown($genPrmGroup,$search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook Approval End Here ********//

    // ***** Cashbook  Category Start Here *******//

	public function getCategoryforDropdown()
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->income_model->getCategoryforDropdown($search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook  Category End Here ********//


     // ***** Cashbook Sub Category Start Here *******//

	public function getSubCategoryforDropdown($category_id = '')
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->income_model->getSubCategoryforDropdown($search,$category_id));
		echo json_encode($LeadData);
	}

    // *****  Cashbook Sub Category End Here ********//




    // ***** Cashbook People Start Here *******//

	public function getPersonforDropdown()
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->income_model->getPersonforDropdown($search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook People End Here ********//


    // ***** Cashbook Account Start Here *******//

	public function getAccountforDropdown()
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->income_model->getAccountforDropdown($search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook Account End Here ********//

}