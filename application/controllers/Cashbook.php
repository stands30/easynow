<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashbook extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('cashbook_model');
    }

    public function cashbook_dashboard()

	{
		$data['title'] 		=	'Cashbook Dashboard';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$this->load->view('cashbook/cashbook_dashboard', $data);
	}
	
	public function list_cashbook()
	{
		$data['title'] 		=	'Cashbook List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook', base_url('cashbook-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		 $data['dataTableData'] = $this->cashbook_model->getCashbookList(TABLE_COUNT);
		
		$this->load->view('cashbook/cashbook_list', $data);
	}

	public function cashbookDataTablelist()
    {
    	$dataOptn = $this->input->get();
	    $dataTableData = $this->cashbook_model->getCashbookList(TABLE_RESULT,$dataOptn);
	      // ******** Encrypt Data from multidimensional array ******//
	    $enc_arr['csb_id']    	= 'csb_id_encrypt';
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

    public function detail_cashbook($cashbook_id='')
    {
    	$cashbook_id = 	$this->nextasy_url_encrypt->decrypt_openssl($cashbook_id);

    	$data['cashbook_details'] 		= $this->home_model->detail_data('csb.*,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = "cashbook_type" ) csb_type_name,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_approve and gnp_group = "approval_status" ) csb_approve_name,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csb.csb_cbc_id ) csb_cbc_name ,(select csc_name from cashbook_sub_category where cashbook_sub_category.csc_id = csb.csb_csc_id ) csb_csc_name ,(IFNULL((select MIN(csb_id) from cashbook where csb_id > "'.$cashbook_id.'"),(SELECT MIN(csb_id) from cashbook))) next,(IFNULL((select MAX(csb_id) from cashbook where csb_id < "'.$cashbook_id.'"),(SELECT MAX(csb_id) from cashbook))) prev,
      (select ppl_name from people where people.ppl_id = csb.csb_ppl_id ) csb_ppl_name,(select acc_name from account where account.acc_id = csb.csb_acc_id ) csb_acc_name', 'cashbook csb', 'csb_id = "'.$cashbook_id.'"');

		$data['type'] = strtolower($data['cashbook_details']['csb_type_name']);

    	$data['title'] 		=	$data['cashbook_details']['csb_particular'].'-'.$data['cashbook_details']['csb_type_name'].' Cashbook Detail';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook', base_url('cashbook-dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('cashbook-list'));
		$data['breadcrumb_data'][] = array('Detail');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
    $data['cashbook_details']['next_encrypt'] 	= $this->nextasy_url_encrypt->encrypt_openssl($data['cashbook_details']['next']);
		$data['cashbook_details']['prev_encrypt']  	= $this->nextasy_url_encrypt->encrypt_openssl($data['cashbook_details']['prev']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$this->load->view('cashbook/cashbook_details', $data);
    }

    // ***** cashbook deleted Starts Here ********//
    public function delete_cashbook($cashbook_id='')
    {
    	$cashbook_id = 	$this->nextasy_url_encrypt->decrypt_openssl($cashbook_id);
    	$csbId = $this->home_model->delete_data('cashbook', $cashbook_id, 'csb_id');

		if($csbId)
		{
			$success = true;
			$message = 'Cashbook deleted successfully';
			$linkn   =  base_url('cashbook-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook deleted End Here ********//


    // ***** cashbook Approve Starts Here ********//
    public function approve_cashbook()
    {
    	$chkId = $this->input->post('chkId');
    	if($chkId)
		{
		    $this->cashbook_model->update_cashbook_to_approved($chkId);
		}


		/*if($chkId)
		{*/
			$success = true;
			$message = 'Cashbook Updated successfully';
			$linkn   =  base_url('cashbook-list');
		/* }
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}*/
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook Approve End Here ********//

     // ***** cashbook Disapprove Starts Here ********//
    public function reject_cashbook()
    {
    	$chkId = $this->input->post('chkId');
    	if($chkId)
		{
		    $this->cashbook_model->update_cashbook_to_reject($chkId);
		}


		/*if($csbId)
		{*/
			$success = true;
			$message = 'Cashbook Updated successfully';
			$linkn   =  base_url('cashbook-list');
		/*}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}*/
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook Disapprove End Here ********//


}