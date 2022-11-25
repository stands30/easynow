<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends CI_Controller
{

	  public function __construct()
    {
        parent::__construct();
        check_logged();

        $this->mnu_name = 'quotation-list';        

        $this->load->model('quotation_model');
    }
	public function quotation_add($led_id='')
	{

		$data['title'] 		=	'Add New Quotations';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('quotation-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		  if (checkaccess($this->mnu_name, 'add')) {
		$data['qtn_code'] = $this->home_model->getNewCode(
                                     		array(
                                     	 		'column'	=> 'qtn_code',
                                     	 		'table'		=> 'quotation',
                                     	 		'type'		=> 'quot_code',
                                     	 		'where'		=> ''
                                     		)
                                     	);
		$data['qtn_date'] = date('Y-m-d');
		$billing_comp = $this->quotation_model->getCurrentBillingCompany();
		if(isset($billing_comp))
		{
			$data['qtn_billing_cmp'] = $billing_comp->cmp_id; 
			$data['qtn_billing_cmp_name'] = $billing_comp->cmp_name; 
			$data['qtn_billing_cmp_state'] = $billing_comp->cmp_state; 
			$data['qtn_billing_cmp_payment_terms'] = $billing_comp->cmp_payment_terms; 
		}
		$get_variables = $_GET;
		if(isset($get_variables) && !empty($get_variables) )
		{
		     $led_id = $this->input->get('lead');
			 $data['led_id'] = $this->nextasy_url_encrypt->decrypt_openssl($led_id);
			 if($data['led_id'] != '')
			 {
		       $lead_data = $this->quotation_model->getLeadData($data['led_id']);
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
					$data['qtn_cmp'] = '';
				}
			 }

		}
		// Check for quotation parameters 
        $data['quot_currency'] = ($this->home_model->getBusinessParamData(QUOTATION_CURRENCY)) ? $this->home_model->getBusinessParamData(QUOTATION_CURRENCY)->bpm_value:'0';
        $data['quot_shipping'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING)->bpm_value:'0';
        $data['quot_tax_computation'] = ($this->home_model->getBusinessParamData(QUOTATION_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(QUOTATION_TAX_COMPUTATION)->bpm_value:'0';
        $data['quot_shipping_address'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING_ADDRESS)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING_ADDRESS)->bpm_value:'0';
        $data['finance_tax'] = ($this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)) ? $this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)->bpm_value:'0';
        $data['finance_product_tax'] = ($this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)) ? $this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)->bpm_value:'0';
        $data['finance_product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['finance_product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
		// Check for quotation parameters 
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('finance/quotations/quotations-add', $data);
		 }
        else 
        {
        	$this->load->view('errors/easynow_404', $data);
        }
	}

	public function quotation_list()
	{
		$data['title'] 		=	'Quotations List';
		
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
        $data['dataTableData'] = $this->quotation_model->getQuotationList(TABLE_COUNT,$dataOptn);
        $data['global_asset_version'] = global_asset_version();
        $data = array_merge($data, checkaccess($this->mnu_name));  
		$this->load->view('finance/quotations/quotations-list', $data);
		}
        else 
        {
        	$this->load->view('errors/easynow_404', $data);
        }
	}

	public function quotation_details($qtn_decrypted_id)
	{
		$data['title'] 		=	'Quotation Details';
		$data['qtn_decrypted_id'] 		= $qtn_decrypted_id;
		
		$data['global_asset_version'] = global_asset_version();
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('quotation-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		  if (checkaccess($this->mnu_name, 'detail')) {
		// Check for quotation parameters 
        $data['quot_currency'] = ($this->home_model->getBusinessParamData(QUOTATION_CURRENCY)) ? $this->home_model->getBusinessParamData(QUOTATION_CURRENCY)->bpm_value:'0';
        $data['quot_shipping'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING)->bpm_value:'0';
        $data['quot_tax_computation'] = ($this->home_model->getBusinessParamData(QUOTATION_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(QUOTATION_TAX_COMPUTATION)->bpm_value:'0';
        $data['quot_shipping_address'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING_ADDRESS)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING_ADDRESS)->bpm_value:'0';
        $data['finance_product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['finance_product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
		// Check for quotation parameters 
		$data['menu_name'] = $this->mnu_name;
        $qtn_id = $this->nextasy_url_encrypt->decrypt_openssl($qtn_decrypted_id);
        $data['quotation'] = $this->quotation_model->getQuotationdataById($qtn_id,$this->mnu_name);
        $data['quotation_product'] = $this->quotation_model->getQuotationProductDataById($qtn_id);
        $data['global_asset_version'] = global_asset_version();
       $data = array_merge($data, checkaccess($this->mnu_name));  
        $data['activity_filter']    = $this->home_model->getGenPrmResultByGroup('qtn_approval_status','result');

        $data['title'] = isset($data['quotation']->qtn_title) ? $data['quotation']->qtn_title.' - '.(isset($data['quotation']->qtn_code) ? $data['quotation']->qtn_code:''):$title;
		$this->load->view('finance/quotations/quotation-details', $data);
		}
        else 
        {
        	$this->load->view('errors/easynow_404', $data);
        }
	}

	public function quotation_printable_form($qtn_decrypted_id)
	{

		$title 		=	'Quotation Printing Form';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('quotation-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['quot_currency'] = ($this->home_model->getBusinessParamData(QUOTATION_CURRENCY)) ? $this->home_model->getBusinessParamData(QUOTATION_CURRENCY)->bpm_value:'0';
        $data['quot_shipping'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING)->bpm_value:'0';
        $data['quot_tax_computation'] = ($this->home_model->getBusinessParamData(QUOTATION_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(QUOTATION_TAX_COMPUTATION)->bpm_value:'0';
        $data['quot_shipping_address'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING_ADDRESS)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING_ADDRESS)->bpm_value:'0';
        $data['finance_product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['finance_product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
        $qtn_id = $this->nextasy_url_encrypt->decrypt_openssl($qtn_decrypted_id);
        $data['quotation'] = $this->quotation_model->getQuotationdataById($qtn_id);
        if(!empty($data['quotation']))
        {
        $data['title'] = isset($data['quotation']->qtn_company) ? $data['quotation']->qtn_company.' - '.(isset($data['quotation']->qtn_code) ? $data['quotation']->qtn_code:''):$title;
        }
        $data['quotation_product'] = $this->quotation_model->getQuotationProductDataById($qtn_id);
		$data['global_asset_version'] = global_asset_version();

		$this->load->view('finance/quotations/quotation-print', $data);
	}
	public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $genData = array('results'=>$this->quotation_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($genData);
    }
    public function getCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$dropDownData = array('results'=>$this->quotation_model->getCompanyDropdown(COMPANY_TYPE_ACCOUNT,$search,$lead));
		echo json_encode($dropDownData);
	}
	public function getPeopleDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$company     = $this->input->get('company');
		$dropDownData = array('results'=>$this->quotation_model->getPeopleDropdown($search,$lead,$company));
		echo json_encode($dropDownData);
	}
	public function getLeadDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->quotation_model->getLeadDropdown($search));
		echo json_encode($dropDownData);
	}
	public function getProductDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->quotation_model->getProductDropdown($search));
		echo json_encode($dropDownData);
	}
	public function quotation_data_save()
    {
    	$qtn_save_id = $this->input->post('qtn_id');
    	
        $qtn_id = $this->quotation_model->quotation_data_save();
        if($qtn_id)
        {
            $qtn_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($qtn_id);
            $success = true;
            $message = 'Quotation created successfully';
            if($qtn_save_id !='')
            {
               $message = 'Quotation updated successfully';
            }
            $linkn   = base_url('quotation-details-'.$qtn_encrypted_id);
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
		$dropDownData = array('results'=>$this->quotation_model->getBillingCompanyDropdown($search));
		echo json_encode($dropDownData);
	}
	 public function quotationDataTablelist()
    {
        log_message('nexlog','people::quotationDataTablelist >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->quotation_model->getQuotationList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['qtn_id']          = 'qtn_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['qtn_led_id']      = 'qtn_led_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['qtn_cmp_id']      = 'qtn_cmp_encrypted_id';
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
        log_message('nexlog','people::quotationDataTablelist << ');
        echo json_encode($dataTableArray);
    }
    public function quotation_edit($qtn_decrypted_id)
	{

		$data['title'] 		=	'Edit Quotations';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('quotation-list'));
		$data['breadcrumb_data'][] = array('Detail', base_url('quotation-details-'.$qtn_decrypted_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		  if (checkaccess($this->mnu_name, 'edit')) {
		
		$billing_comp = $this->quotation_model->getCurrentBillingCompany();
		if(isset($billing_comp))
		{
			$data['qtn_billing_cmp'] = $billing_comp->cmp_id; 
			$data['qtn_billing_cmp_name'] = $billing_comp->cmp_name; 
			$data['qtn_billing_cmp_state'] = $billing_comp->cmp_state; 
		}
		// Check for quotation parameters 
        $data['quot_currency'] = ($this->home_model->getBusinessParamData(QUOTATION_CURRENCY)) ? $this->home_model->getBusinessParamData(QUOTATION_CURRENCY)->bpm_value:'0';
        $data['quot_shipping'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING)->bpm_value:'0';
        $data['quot_tax_computation'] = ($this->home_model->getBusinessParamData(QUOTATION_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(QUOTATION_TAX_COMPUTATION)->bpm_value:'0';
        $data['quot_shipping_address'] = ($this->home_model->getBusinessParamData(QUOTATION_SHIPPING_ADDRESS)) ? $this->home_model->getBusinessParamData(QUOTATION_SHIPPING_ADDRESS)->bpm_value:'0';
        $data['finance_product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['finance_product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';

        $qtn_id = $this->nextasy_url_encrypt->decrypt_openssl($qtn_decrypted_id);
        $data['quotation'] = $this->quotation_model->getQuotationdataById($qtn_id);
        if(empty($data['quotation']))
        {
        	$this->load->view('errors/easynow_404', $data);
        }
        $data['qtn_code'] = ($data['quotation']->qtn_code) ? $data['quotation']->qtn_code:'';
        $data['qtn_date'] = ($data['quotation']->qtn_date) ? $data['quotation']->qtn_date:'';
        $data['qtn_billing_cmp'] = ($data['quotation']->qtn_billing_cmp) ? $data['quotation']->qtn_billing_cmp:'';
        $data['qtn_billing_cmp_name'] = ($data['quotation']->qtn_billing_cmp_name) ? $data['quotation']->qtn_billing_cmp_name:'';
        $data['qtn_billing_cmp_state'] = ($data['quotation']->qtn_billing_cmp_state) ? $data['quotation']->qtn_billing_cmp_state:'';
        $data['qtn_billing_cmp_payment_terms'] = ($data['quotation']->qtn_payment_terms) ? $data['quotation']->qtn_payment_terms:'';
        $data['finance_tax'] = ($data['quotation']->qtn_tax_percent) ? $data['quotation']->qtn_tax_percent:'';
        $data['finance_product_tax'] = ($data['quotation']->qtn_product_tax) ? $data['quotation']->qtn_product_tax:'';
        $data['quotation_product'] =  $this->quotation_model->getQuotationProductDataById($qtn_id);
        $data['global_asset_version'] = global_asset_version();
		// Check for quotation parameters 
		$this->load->view('finance/quotations/quotations-add', $data);
		 }
        else 
        {
        	$this->load->view('errors/easynow_404', $data);
        }
	}
	public function updateQuotationCustomData()
    {
    	$response = array();
    	$customData = array();
    	 if(isset($_POST['field']) && $_POST['field'] == 'qtn_apprvl_status') 
       {
	       	if($_POST['field_value'] == QUOTATION_APPROVAL_STATUS_APPROVED)
	       	{
	       		$customData = array(
	       		'qtn_apprvl_by' => $this->session->userdata(PEOPLE_SESSION_ID),
	       		'qtn_apprvl_date' => date('Y-m-d')
	       	   );	
	       	}
	       	else
	       	{
	       		$customData = array(
	       		'qtn_apprvl_by' => '',
	       		'qtn_apprvl_date' => ''
	       	);
       	}
       	

       }
        $custmData = $this->quotation_model->updateQuotationCustomData($customData);
        if($custmData)
        {
        	 if(isset($_POST['field']) && $_POST['field'] == 'qtn_apprvl_status') 
            {
        	$customData['qtn_apprvl_status_name'] = $this->home_model->getGenPrmResultByValue('qtn_approval_status',$_POST['field_value'],'row');
            }

        	if(isset($customData['qtn_apprvl_date']))
        	{
        		$customData['qtn_apprvl_date'] = display_date($customData['qtn_apprvl_date']);
        		$customData['qtn_apprvl_by'] = $this->session->userdata(PEOPLE_SESSION_NAME);
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
     public function checkQuotationUnique($field,$id='')
    {
        $field_value = $this->input->post('value');
        
      $validate =  $this->quotation_model->checkQuotationUnique($field,$field_value,$id);
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
        $qtn_id = $this->input->post('qtn_id');
        
      $data =  $this->quotation_model->checkQuotationActivity($qtn_id);
        $enc_arr['created_by']          = 'ppl_encrypted_id';
        $data     = encrypt_key_in_array($data,$enc_arr);
        echo json_encode($data);
    }
}

?>