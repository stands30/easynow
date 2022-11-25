<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller
{

	  public function __construct()
    {
        parent::__construct();
        check_logged();

        $this->mnu_name = 'invoice-list';        

        $this->load->model('invoice_model');
    }
	public function invoice_add($led_id='')
	{

		$data['title'] 		=	'Add New Invoice';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('invoice-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		  if (checkaccess($this->mnu_name, 'add')) {
		$data['inv_code'] = $this->home_model->getNewCode(
                                     		array(
                                     	 		'column'	=> 'inv_code',
                                     	 		'table'		=> 'invoice',
                                     	 		'type'		=> 'invoice_code',
                                     	 		'where'		=> ''
                                     		)
                                     	);
		$data['inv_date'] = date('Y-m-d');
		$billing_comp = $this->invoice_model->getCurrentBillingCompany();
		if(isset($billing_comp))
		{
			$data['inv_billing_cmp'] = $billing_comp->cmp_id; 
			$data['inv_billing_cmp_name'] = $billing_comp->cmp_name; 
			$data['inv_billing_cmp_state'] = $billing_comp->cmp_state; 
			$data['inv_billing_cmp_payment_terms'] = $billing_comp->cmp_payment_terms; 
		}
		$get_variables = $_GET;
		if(isset($get_variables) && !empty($get_variables) )
		{
		     $led_id = $this->input->get('lead');
			 $data['led_id'] = $this->nextasy_url_encrypt->decrypt_openssl($led_id);
			 if($data['led_id'] != '')
			 {
		       $lead_data = $this->invoice_model->getLeadData($data['led_id']);
				 if(isset($lead_data) && !empty($lead_data))
				{
					$data['led_title'] = $lead_data->lead_title; 
					$data['led_cmp'] = $lead_data->cmp_id; 
					$data['led_cmp_name'] = $lead_data->cmp_name; 
					$data['led_ppl'] = $lead_data->ppl_id; 
					$data['led_ppl_name'] = $lead_data->ppl_name; 
					$data['led_cmp_address'] = $lead_data->cmp_address; 
					$data['led_cmp_gst_no'] = $lead_data->cmp_gst_no; 
					$data['led_cmp_state'] = $lead_data->cmp_stm_id; 
					$data['led_cmp_payment_terms'] = $lead_data->cmp_payment_terms; 
				}
				else
				{
					$data['inv_cmp'] = '';
				}
			 }

		}
		// Check for quotation parameters 
        $data['invoice_currency'] = ($this->home_model->getBusinessParamData(QUOTATION_CURRENCY)) ? $this->home_model->getBusinessParamData(QUOTATION_CURRENCY)->bpm_value:'0';
        $data['invoice_shipping'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING)->bpm_value:'0';
        $data['invoice_tax_computation'] = ($this->home_model->getBusinessParamData(INVOICE_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(INVOICE_TAX_COMPUTATION)->bpm_value:'0';
        $data['invoice_shipping_address'] = ($this->home_model->getBusinessParamData(INVOICE_SHIPPING_ADDRESS)) ? $this->home_model->getBusinessParamData(INVOICE_SHIPPING_ADDRESS)->bpm_value:'0';
        $data['finance_tax'] = ($this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)) ? $this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)->bpm_value:'0';
        $data['finance_product_tax'] = ($this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)) ? $this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)->bpm_value:'0';
        $data['finance_product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['finance_product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
		// Check for quotation parameters 
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('finance/invoice/invoice-add', $data);
		 }
        else 
        {
        	$this->load->view('errors/easynow_404', $data);
        }
	}

	public function invoice_list()
	{
		$data['title'] 		=	'Invoice List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Mandate', base_url('mandate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		  if (checkaccess($this->mnu_name, 'list')) {
		 $dataOptn['mnu_name']=$this->mnu_name;
		 $get_variables = $_GET;
		if(isset($get_variables) && !empty($get_variables) )
		{
		     $led_id = $this->input->get('lead');
			 $dataOptn['lead'] = $this->nextasy_url_encrypt->decrypt_openssl($led_id);
		     $data['led_id'] =  $dataOptn['lead'];
		}
        $data['dataTableData'] = $this->invoice_model->getInvoiceList(TABLE_COUNT,$dataOptn);
        $data['global_asset_version'] = global_asset_version();
        $data = array_merge($data, checkaccess($this->mnu_name));  
		$this->load->view('finance/invoice/invoice-list', $data);
		}
        else 
        {
        	$this->load->view('errors/easynow_404', $data);
        }
	}

	public function invoice_details($inv_decrypted_id)
	{
		$data['title'] 		=	'Invoice Details';
		$data['inv_decrypted_id'] 		= $inv_decrypted_id;
		
		$data['global_asset_version'] = global_asset_version();
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('invoice-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		  if (checkaccess($this->mnu_name, 'detail')) {
		// Check for quotation parameters 
       $data['invoice_currency'] = ($this->home_model->getBusinessParamData(QUOTATION_CURRENCY)) ? $this->home_model->getBusinessParamData(QUOTATION_CURRENCY)->bpm_value:'0';
        $data['invoice_shipping'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING)->bpm_value:'0';
        $data['invoice_tax_computation'] = ($this->home_model->getBusinessParamData(INVOICE_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(INVOICE_TAX_COMPUTATION)->bpm_value:'0';
        $data['invoice_shipping_address'] = ($this->home_model->getBusinessParamData(INVOICE_SHIPPING_ADDRESS)) ? $this->home_model->getBusinessParamData(INVOICE_SHIPPING_ADDRESS)->bpm_value:'0';
        $data['finance_product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['finance_product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
		// Check for quotation parameters 
		$data['menu_name'] = $this->mnu_name;
        $inv_id = $this->nextasy_url_encrypt->decrypt_openssl($inv_decrypted_id);
        $data['invoice'] = $this->invoice_model->getinvoicedataById($inv_id,$this->mnu_name);
        $data['invoice_product'] = $this->invoice_model->getInvoiceProductDataById($inv_id);
        $data['inv_payment'] = $this->invoice_model->getInvoicePaymentDataByInvoice($inv_id);
        $data['global_asset_version'] = global_asset_version();
        $data = array_merge($data, checkaccess($this->mnu_name));  
        $data['activity_filter']    = $this->home_model->getGenPrmResultByGroup(INVOICE_STATUS,'result');
         if(!empty($data['invoice']))
        {
        	$data['title'] = isset($data['invoice']->inv_title) ? $data['invoice']->inv_title.(isset( $data['invoice']->inv_code) ?  '-'.$data['invoice']->inv_code:''):$title;

        }
		$this->load->view('finance/invoice/invoice-details', $data);
		}
        else 
        {
        	$this->load->view('errors/easynow_404', $data);
        }
	}

	public function invoice_printable_form($inv_decrypted_id)
	{

		$title 		=	'Invoice Printing Form';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('invoice-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
	  $data['invoice_currency'] = ($this->home_model->getBusinessParamData(QUOTATION_CURRENCY)) ? $this->home_model->getBusinessParamData(QUOTATION_CURRENCY)->bpm_value:'0';
        $data['invoice_shipping'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING)->bpm_value:'0';
        $data['invoice_tax_computation'] = ($this->home_model->getBusinessParamData(INVOICE_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(INVOICE_TAX_COMPUTATION)->bpm_value:'0';
        $data['invoice_shipping_address'] = ($this->home_model->getBusinessParamData(INVOICE_SHIPPING_ADDRESS)) ? $this->home_model->getBusinessParamData(INVOICE_SHIPPING_ADDRESS)->bpm_value:'0';
        $data['finance_product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['finance_product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
        $inv_id = $this->nextasy_url_encrypt->decrypt_openssl($inv_decrypted_id);
        $data['invoice'] = $this->invoice_model->getinvoicedataById($inv_id);
        if(!empty($data['invoice']))
        {
        	 $data['title'] = isset($data['invoice']->inv_company) ? $data['invoice']->inv_company.' - '.(isset($data['invoice']->inv_code) ? $data['invoice']->inv_code:''):$title;
        }
        $data['invoice_product'] = $this->invoice_model->getInvoiceProductDataById($inv_id);
		$data['global_asset_version'] = global_asset_version();

		$this->load->view('finance/invoice/invoice-print', $data);
	}
	public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $genData = array('results'=>$this->invoice_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($genData);
    }
    public function getCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$dropDownData = array('results'=>$this->invoice_model->getCompanyDropdown(COMPANY_TYPE_ACCOUNT,$search,$lead));
		echo json_encode($dropDownData);
	}
	public function getPeopleDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$company     = $this->input->get('company');
		$dropDownData = array('results'=>$this->invoice_model->getPeopleDropdown($search,$lead,$company));
		echo json_encode($dropDownData);
	}
	public function getLeadDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->invoice_model->getLeadDropdown($search));
		echo json_encode($dropDownData);
	}
	public function getProductDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->invoice_model->getProductDropdown($search));
		echo json_encode($dropDownData);
	}
	public function invoice_data_save()
    {
    	$inv_save_id = $this->input->post('inv_id');
    	
        $inv_id = $this->invoice_model->invoice_data_save();
        if($inv_id)
        {
            $inv_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($inv_id);
            $success = true;
            $message = 'Invoice created successfully';
            if($inv_save_id !='')
            {
               $message = 'Invoice updated successfully';
            }
            $linkn   = base_url('invoice-details-'.$inv_encrypted_id);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    public function getBillingCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$dropDownData = array('results'=>$this->invoice_model->getBillingCompanyDropdown($search));
		echo json_encode($dropDownData);
	}
	 public function invoiceDataTablelist()
    {
        log_message('nexlog','invoice::quotationDataTablelist >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->invoice_model->getInvoiceList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['inv_id']          = 'inv_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['inv_led_id']      = 'inv_led_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['inv_cmp_id']      = 'inv_cmp_encrypted_id';
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
        log_message('nexlog','invoice::quotationDataTablelist << ');
        echo json_encode($dataTableArray);
    }
    public function invoice_edit($inv_decrypted_id)
	{

		$data['title'] 		=	'Edit Invoice';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('invoice-list'));
		$data['breadcrumb_data'][] = array('Detail', base_url('invoice-details-'.$inv_decrypted_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		  if (checkaccess($this->mnu_name, 'edit')) {
		
		$billing_comp = $this->invoice_model->getCurrentBillingCompany();
		if(isset($billing_comp))
		{
			$data['inv_billing_cmp'] = $billing_comp->cmp_id; 
			$data['inv_billing_cmp_name'] = $billing_comp->cmp_name; 
			$data['inv_billing_cmp_state'] = $billing_comp->cmp_state; 
		}
		// Check for quotation parameters 
        $data['invoice_currency'] = ($this->home_model->getBusinessParamData(QUOTATION_CURRENCY)) ? $this->home_model->getBusinessParamData(QUOTATION_CURRENCY)->bpm_value:'0';
        $data['invoice_shipping'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING)->bpm_value:'0';
        $data['invoice_tax_computation'] = ($this->home_model->getBusinessParamData(INVOICE_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(INVOICE_TAX_COMPUTATION)->bpm_value:'0';
        $data['invoice_shipping_address'] = ($this->home_model->getBusinessParamData(INVOICE_SHIPPING_ADDRESS)) ? $this->home_model->getBusinessParamData(INVOICE_SHIPPING_ADDRESS)->bpm_value:'0';
        $data['finance_product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['finance_product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
        $inv_id = $this->nextasy_url_encrypt->decrypt_openssl($inv_decrypted_id);
        $data['invoice'] = $this->invoice_model->getinvoicedataById($inv_id);
        if(empty($data['invoice']))
        {
        	$this->load->view('errors/easynow_404', $data);
        }
        $data['inv_code'] = ($data['invoice']->inv_code) ? $data['invoice']->inv_code:'';
        $data['inv_date'] = ($data['invoice']->inv_date) ? $data['invoice']->inv_date:'';
        $data['inv_billing_cmp'] = ($data['invoice']->inv_billing_cmp) ? $data['invoice']->inv_billing_cmp:'';
        $data['inv_billing_cmp_name'] = ($data['invoice']->inv_billing_cmp_name) ? $data['invoice']->inv_billing_cmp_name:'';
        $data['inv_billing_cmp_state'] = ($data['invoice']->inv_billing_cmp_state) ? $data['invoice']->inv_billing_cmp_state:'';
        $data['finance_tax'] = ($data['invoice']->inv_tax_percent) ? $data['invoice']->inv_tax_percent:'';
        $data['finance_product_tax'] = ($data['invoice']->inv_product_tax) ? $data['invoice']->inv_product_tax:'';
        $data['inv_billing_cmp_payment_terms'] = ($data['invoice']->inv_payment_terms) ? $data['invoice']->inv_payment_terms:'';
        $data['invoice_product'] =  $this->invoice_model->getInvoiceProductDataById($inv_id);
        $data['global_asset_version'] = global_asset_version();
		// Check for quotation parameters 
		$this->load->view('finance/invoice/invoice-add', $data);
		 }
        else 
        {
        	$this->load->view('errors/easynow_404', $data);
        }
	}
	public function updateCustomData()
    {
    	$response = array();
    	$customData = array();
    	 if(isset($_POST['field']) && $_POST['field'] == 'inv_apprvl_status') 
       {
	       	if($_POST['field_value'] == INVOICE_APPROVAL_STATUS_APPROVED)
	       	{
	       		$customData = array(
	       		'inv_apprvl_by' => $this->session->userdata(PEOPLE_SESSION_ID),
	       		'inv_apprvl_date' => date('Y-m-d')
	       	   );	
	       	}
	       	else
	       	{
	       		$customData = array(
	       		'inv_apprvl_by' => '',
	       		'inv_apprvl_date' => ''
	       	);
       	}
       	

       }
        $custmData = $this->invoice_model->updateCustomData($customData);
        if($custmData)
        {
        	 if(isset($_POST['field']) && $_POST['field'] == 'inv_apprvl_status') 
            {
        	$customData['inv_apprvl_status_name'] = $this->home_model->getGenPrmResultByValue(INVOICE_STATUS,$_POST['field_value'],'row');
            }

        	if(isset($customData['inv_apprvl_date']))
        	{
        		$customData['inv_apprvl_date'] = display_date($customData['inv_apprvl_date']);
        		$customData['inv_apprvl_by'] = $this->session->userdata(PEOPLE_SESSION_NAME);
        	}
        	// print_r($customData);
            $success = true;
            $message = 'Details saved successfully';
            $response = array_merge($response,$customData);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $response = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'response'=>$response));
    }
     public function checkinvoiceUnique($field,$id='')
    {
        $field_value = $this->input->post('value');
        
      $validate =  $this->invoice_model->checkinvoiceUnique($field,$field_value,$id);
      if($validate->count > 0)
      {
         echo 'false';
      }
      else
      {
         echo 'true';
      }
    }
      public function getActivity()
    {
        $inv_id = $this->input->post('inv_id');
        
      $data =  $this->invoice_model->getActivity($inv_id);
        $enc_arr['created_by']          = 'ppl_encrypted_id';
        $data     = encrypt_key_in_array($data,$enc_arr);
        echo json_encode($data);
    }


   

}

?>