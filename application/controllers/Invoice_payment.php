<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_Payment extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->mnu_name = 'payment-list';
        $this->load->model('invoice_payment_model');
	}

	public function payment_list()
	{
		$data['title'] 		=	'Payment List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'list'))
		  {
		  	 $data['global_asset_version'] = global_asset_version();
		   $dataOptn['mnu_name']=$this->mnu_name;
           $data['dataTableData'] = $this->invoice_payment_model->invoicePaymentlist(TABLE_COUNT,$dataOptn);
           $data = array_merge($data, checkaccess($this->mnu_name));  
		      $this->load->view('finance/invoice_payment/payment-list', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function payment_add($cmp_encrypted_id='')
	{
		$data['title'] 		=	'Payment Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('payment-list'));
		$data['breadcrumb_data'][] = array('Add');
		if($cmp_encrypted_id !='')
		{
		$data['breadcrumb_data'][] = array('Outstanding List', base_url('outstanding-list'));
		$data['breadcrumb_data'][] = array('Outstanding Details', base_url('outstanding-details-'.$cmp_encrypted_id));
		}
				$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_encrypted_id);
		  	if($cmp_id != '')
		  	{
		  		$company = $this->invoice_payment_model->getCompanyDetailsById($cmp_id);
   			  	$data['closing_bal'] = $this->invoice_payment_model->getInvoicePaymentClosingBalance($cmp_id);
		  		if(!empty($company))
		  		{
   			  		$data['cmp_id'] = $company->cmp_id;
   			  		$data['cmp_name'] = $company->cmp_name;
   			  		$data['cpl_ppl_id'] = $company->cpl_ppl_id;
   			  		$data['cpl_ppl_name'] = $company->cpl_ppl_name;
   			  		$data['on_acc']       = $company->on_acc;
		  		}
		  	}
		  	$data['inv_code']  = $this->input->get('inv_code');
		  	$data['inv_total'] = $this->input->get('inv_total');
		    $data['ipt_date'] = date('Y-m-d');
		  	$data['global_asset_version'] = global_asset_version();
		    $this->load->view('finance/invoice_payment/payment-add', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function payment_details($ipt_encrypted_id)
	{
		$data['title'] 		=	'Payment Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail'))
		  {	
		  	$ipt_id = $this->nextasy_url_encrypt->decrypt_openssl($ipt_encrypted_id);
		  	$data['inv_payment'] = $this->invoice_payment_model->getInvoicePaymentDataById($this->mnu_name,$ipt_id);
		  	$data['global_asset_version'] = global_asset_version();
		  	$cmp_encryted_id = isset($data['inv_payment']->ipt_cmp_id) ? $this->nextasy_url_encrypt->encrypt_openssl($data['inv_payment']->ipt_cmp_id):'';
		  	if($cmp_encryted_id != '')
		  	{

		   $data['breadcrumb_data'][] = array('Outstanding List', base_url('outstanding-list'));
		   $data['breadcrumb_data'][] = array('Outstanding Details', base_url('outstanding-details-'.$cmp_encryted_id));
		  	}
		   $data['breadcrumb_data'][] = array(' Payment Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
			$data['title'] = isset($data['inv_payment']->cmp_name) ? $data['inv_payment']->cmp_name.' - '.(isset($data['inv_payment']->ipt_code) ? $data['inv_payment']->ipt_code:''):'';	
		  $dataOptn['invoice'] = 	isset($data['inv_payment']->ipt_invoice) ? $data['inv_payment']->ipt_invoice:'';  	
           $data['dataTableData'] = $this->invoice_payment_model->getInvoiceListByInvoiceId(TABLE_COUNT,$dataOptn);
           $data = array_merge($data, checkaccess($this->mnu_name));  
		    $this->load->view('finance/invoice_payment/payment-details', $data);
		  }
	    else 
	     {
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}
	public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $genData = array('results'=>$this->invoice_payment_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($genData);
    }
    public function getCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$dropDownData = array('results'=>$this->invoice_payment_model->getCompanyDropdown(COMPANY_TYPE_ACCOUNT,$search,$lead));
		echo json_encode($dropDownData);
	}
	public function getPeopleDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$company     = $this->input->get('company');
		$dropDownData = array('results'=>$this->invoice_payment_model->getPeopleDropdown($search,$lead,$company));
		echo json_encode($dropDownData);
	}
	public function getInvoiceDataByCompany()
	{
		$cmp_id     = $this->input->post('cmp_id');
		$data = array('results'=>$this->invoice_payment_model->getInvoiceDataByCompany($cmp_id));
		echo json_encode($data);
	}
	public function invoice_payment_data_save()
    {
    	
        $ipt_id = $this->invoice_payment_model->invoice_payment_data_save();
        if($ipt_id)
        {
            $ipt_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($ipt_id);
            $success = true;
            $message = 'Payment details addedd successfully';
            /*if($ipt_id !='')
            {
               $message = 'Quotation updated successfully';
            }*/
            $linkn   = base_url('payment-details-'.$ipt_encrypted_id);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
     public function invoicePaymentDataTablelist()
    {
        log_message('nexlog','invoice::invoicePaymentDataTablelist >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->invoice_payment_model->invoicePaymentlist(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['ipt_id']          = 'ipt_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['ipt_ppl_id']          = 'ppl_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['ipt_cmp_id']          = 'cmp_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['ipt_managed_by']          = 'ipt_managed_by_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
            $dataTableArray['draw']             = $dataOptn['draw'];
            $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog','invoice::invoicePaymentDataTablelist << ');
        echo json_encode($dataTableArray);
    }
    public function updateCustomData()
    {
        $custmData = $this->invoice_payment_model->updateCustomData();
        if($custmData)
        {
            $success = true;
            $message = 'Details saved successfully';
            $response ='';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $response = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'response'=>$response));
    }
        public function getInvoiceListByInvoiceId()
    {
        log_message('nexlog','invoice::getInvoiceListByInvoiceId >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->invoice_payment_model->getInvoiceListByInvoiceId(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['inv_id']          = 'inv_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
            $dataTableArray['draw']             = $dataOptn['draw'];
            $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog','invoice::getInvoiceListByInvoiceId << ');
        echo json_encode($dataTableArray);
    }
}

?>
