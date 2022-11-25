<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DispatchOrder extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->mnu_name = 'dispatch-order-list';
		$this->load->model('dispatchOrder_model');
	}

	public function dispatch_order_list()
	{
		$data['title'] 		=	'Dispatch Order List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'list'))
		  {
		  	$data['global_asset_version'] = global_asset_version();
		  	$dataOptn['mnu_name'] = $this->mnu_name;
            $data['dataTableData'] = $this->dispatchOrder_model->getModuleList(TABLE_COUNT,$dataOptn);
            $data['dor_status_group']    = $this->home_model->getGenPrmResultByGroup('dor_dispatch_status','result');
            $data['dor_status_group'][] = (object) array('f1'=>'all','f2'=>'All');
            $data = array_merge($data, checkaccess($this->mnu_name)); 
		    $this->load->view('dispatch-order/dispatch-order-list', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function dispatch_order_add()
	{
		$data['title'] 		=	'Dispatch Order Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('dispatch-order-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	 $data['tax_computation'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_TAX_COMPUTATION)->bpm_value:'0';
	        $data['tax_percent'] = ($this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)) ? $this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)->bpm_value:'0';
            $data['product_tax'] = ($this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)) ? $this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)->bpm_value:'0';
            $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
	      	 $billing_comp = $this->dispatchOrder_model->getCurrentBillingCompany();
            $dispatch_order = new stdClass();
			$dispatch_order->dor_code = $this->home_model->getNewCode(
                                     		array(
                                     	 		'column'	=> 'dor_code',
                                     	 		'table'		=> 'dispatch_order',
                                     	 		'type'		=>  DISPATCH_ORDER_CODE,
                                     	 		'where'		=> ''
                                     		)
                                     	);
			$data['shipping'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_SHIPPING)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_SHIPPING)->bpm_value:'0';
			 $data['dor_transport'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_TRANSPORT)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_TRANSPORT)->bpm_value:'0';
			$dispatch_order->dor_date = date('Y-m-d');
			$dispatch_order->dor_tax_computation = 1;
			if(isset($billing_comp))
			{
				$dispatch_order->dor_billing_cmp = $billing_comp->cmp_id;
				$dispatch_order->dor_billing_cmp_value = $billing_comp->cmp_name;
				$dispatch_order->dor_billing_cmp_state = $billing_comp->cmp_state;
				$dispatch_order->dor_terms = $billing_comp->cmp_payment_terms;
			}
			$data['dispatch_order'] = $dispatch_order;
		    $this->load->view('dispatch-order/dispatch-order-add', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}


	public function dispatch_order_details($module_encrypted_id)
	{
		$data['title'] 		=	'Dispatch Order Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('dispatch-order-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail'))
		  {	
			$data['dor_encrypted_id'] = $module_encrypted_id;
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['menu_name'] = $this->mnu_name;
	        $dor_id = $this->nextasy_url_encrypt->decrypt_openssl($module_encrypted_id);
	        $data['dispatch_order'] = $this->dispatchOrder_model->getDODataById($dor_id,$this->mnu_name);
	        $data['dor_product'] = $this->dispatchOrder_model->getDOProductDataById($dor_id);
	        $data['tax_computation'] = isset($data['dispatch_order']->dor_tax_computation) ? $data['dispatch_order']->dor_tax_computation:'0';
		    $data['tax_percent'] = isset($data['dispatch_order']->dor_gst_percent) ? $data['dispatch_order']->dor_gst_percent:'0';
	        $data['product_tax'] = isset($data['dispatch_order']->dor_product_tax) ? $data['dispatch_order']->dor_product_tax:'0';
	        $data['product_date'] = isset($data['dispatch_order']->dor_date) ? $data['dispatch_order']->dor_date:'';
	        $data['dor_code'] = isset($data['dispatch_order']->dor_code) ? $data['dispatch_order']->dor_code:'';
	        $data['dor_transport'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_TRANSPORT)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_TRANSPORT)->bpm_value:'0';
	        $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
	        $data['shipping'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_SHIPPING)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_SHIPPING)->bpm_value:'0';
	        $data['document_attach']   = $this->dispatchOrder_model->getDocumentAttach($dor_id);
            $data['activity_filter']    = $this->home_model->getGenPrmResultByGroup('dor_apprvl_status','result');
            $data = array_merge($data, checkaccess($this->mnu_name));
	        if(!empty($data['dispatch_order']))
	        {
	        	$data['title'] = isset($data['dispatch_order']->dor_cmp_id_value) ? $data['dispatch_order']->dor_cmp_id_value.(isset( $data['dispatch_order']->dor_code) ?  '-'.$data['dispatch_order']->dor_code:''):$title;

	        }
		    $this->load->view('dispatch-order/dispatch-order-details', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}
	public function deleteDocument()
    {
        $doc = $this->dispatchOrder_model->deleteDocument();
        if($doc != '')
        {
            $success = true;
            $message = 'Document deleted successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
    }

     public function getModuleList()
    {
        log_message('nexlog','Dispatch order::getModuleList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->dispatchOrder_model->getModuleList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['dor_id']          = 'dor_encrypted_id';
        $enc_arr['dor_cmp_id']      = 'dor_cmp_encrypted_id';
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
        log_message('nexlog','Dispatch order::getModuleList << ');
        echo json_encode($dataTableArray);
    }
     public function getCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$dropDownData = array('results'=>$this->dispatchOrder_model->getCompanyDropdown(COMPANY_TYPE_ACCOUNT,$search,$lead));
		echo json_encode($dropDownData);
	}
	public function getProductDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->dispatchOrder_model->getProductDropdown($search));
		echo json_encode($dropDownData);
	}
	public function getProductVariantDropdown()
	{
		$search       = $this->input->get('q');
		$product      = $this->input->get('product');
		$dropDownData = array('results'=>$this->dispatchOrder_model->getProductVariantDropdown($product,$search));
		echo json_encode($dropDownData);
	}
	public function multi_form_data_save()
    {
    	$form_data_save_id = $this->input->post('dor_id');
    	
        $form_data_id = $this->dispatchOrder_model->multi_form_data_save($form_data_save_id);
        if($form_data_id)
        {
            $form_data_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($form_data_id);
            $success = true;
            $message = 'Dispatch Order created successfully';
            if($form_data_save_id !='')
            {
               $message = 'Dispatch Order updated successfully';
            }
            $linkn   = base_url('dispatch-order-details-'.$form_data_encrypted_id);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $genData = array('results'=>$this->dispatchOrder_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($genData);
    }
    public function checkUniqueCode($field,$id='')
    {
        $custom_data = array();
        $custom_data['table']	     = 'dispatch_order';
        $custom_data['unique_col']   = 'dor_id';
        $custom_data['unique_id']    = $id;
        $custom_data['field']	     = $field;
        $custom_data['field_value']  = $this->input->post('value');
      $validate =  $this->home_model->checkUniqueCode($custom_data);
      if($validate->count > 0)
      {
         echo 'false';
      }
      else
      {
         echo 'true';
      }
    }
     public function getBillingCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->dispatchOrder_model->getBillingCompanyDropdown($search));
		echo json_encode($dropDownData);
	}
	 public function getActivity()
    {
        $dor_id = $this->input->post('dor_id');
        
      $data =  $this->dispatchOrder_model->getActivity($dor_id);
        $enc_arr['created_by']          = 'ppl_encrypted_id';
        $data     = encrypt_key_in_array($data,$enc_arr);
        echo json_encode($data);
    }
    public function dispatch_order_edit($module_encrypted_id)
	{
		$data['title'] 		=	'Dispatch Order Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('dispatch-order-list'));
		$data['breadcrumb_data'][] = array('Details', base_url('dispatch-order-details-'.$module_encrypted_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'edit'))
		  {	
			$data['dor_encrypted_id'] = $module_encrypted_id;
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['menu_name'] = $this->mnu_name;
	        $dor_id = $this->nextasy_url_encrypt->decrypt_openssl($module_encrypted_id);
	        $data['dispatch_order'] = $this->dispatchOrder_model->getDODataById($dor_id,$this->mnu_name);
	        $data['dor_product'] = $this->dispatchOrder_model->getDOProductDataById($dor_id);
	        $data['tax_computation'] = isset($data['dispatch_order']->dor_tax_computation) ? $data['dispatch_order']->dor_tax_computation:'0';
		    $data['tax_percent'] = isset($data['dispatch_order']->dor_gst_percent) ? $data['dispatch_order']->dor_gst_percent:'0';
	        $data['product_tax'] = isset($data['dispatch_order']->dor_product_tax) ? $data['dispatch_order']->dor_product_tax:'0';
	        $data['product_date'] = isset($data['dispatch_order']->dor_date) ? $data['dispatch_order']->dor_date:'';
	        $data['dor_code'] = isset($data['dispatch_order']->dor_code) ? $data['dispatch_order']->dor_code:'';
	        $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
	        $data['shipping'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_SHIPPING)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_SHIPPING)->bpm_value:'0';
	         $data['dor_transport'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_TRANSPORT)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_TRANSPORT)->bpm_value:'0';
	        if(!empty($data['dispatch_order']))
	        {
	        	  $data['dispatch_order']->clone_check = '0';
                      if(isset($data['dispatch_order']->dor_billing_addr) && isset($data['dispatch_order']->dor_shipping_addr) && isset($data['dispatch_order']->dor_billing_gst) && isset($data['dispatch_order']->dor_shipping_gst) && isset($data['dispatch_order']->dor_billing_people) && isset($data['dispatch_order']->dor_shipping_people))
                      {
                        if($data['dispatch_order']->dor_billing_addr == $data['dispatch_order']->dor_shipping_addr && $data['dispatch_order']->dor_billing_gst == $data['dispatch_order']->dor_shipping_gst && $data['dispatch_order']->dor_billing_people == $data['dispatch_order']->dor_shipping_people) {  
                          $data['dispatch_order']->clone_check= '1'; 
                        }
                      }
	        	$data['title'] = 'Edit Dispatch Order';

	        }
	        if ($data['dispatch_order']->dor_dispatch_status != DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH) {
	        	 $this->load->view('dispatch-order/dispatch-order-add', $data);
	        }
	        else{
	        	$this->load->view('errors/easynow_404', $data);
	        }
		   
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}
	 public function dispatch_order_print($module_encrypted_id)
	{
		$data['title'] 		=	'Dispatch Order Print';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('dispatch-order-list'));
		$data['breadcrumb_data'][] = array('Details', base_url('dispatch-order-details-'.$module_encrypted_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add'))
		  {	
			$data['dor_encrypted_id'] = $module_encrypted_id;
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['menu_name'] = $this->mnu_name;
	        $dor_id = $this->nextasy_url_encrypt->decrypt_openssl($module_encrypted_id);
	        $data['dispatch_order'] = $this->dispatchOrder_model->getDODataById($dor_id,$this->mnu_name);
	        $data['dor_product'] = $this->dispatchOrder_model->getDOProductDataById($dor_id);
	        $data['tax_computation'] = isset($data['dispatch_order']->dor_tax_computation) ? $data['dispatch_order']->dor_tax_computation:'0';
		    $data['tax_percent'] = isset($data['dispatch_order']->dor_gst_percent) ? $data['dispatch_order']->dor_gst_percent:'0';
	        $data['product_tax'] = isset($data['dispatch_order']->dor_product_tax) ? $data['dispatch_order']->dor_product_tax:'0';
	        $data['product_date'] = isset($data['dispatch_order']->dor_date) ? $data['dispatch_order']->dor_date:'';
	        $data['dor_code'] = isset($data['dispatch_order']->dor_code) ? $data['dispatch_order']->dor_code:'';
	        $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
	        $data['shipping'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_SHIPPING)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_SHIPPING)->bpm_value:'0';
	        $data['dor_transport'] = ($this->home_model->getBusinessParamData(DISPATCH_ORDER_TRANSPORT)) ? $this->home_model->getBusinessParamData(DISPATCH_ORDER_TRANSPORT)->bpm_value:'0';

	        if(!empty($data['dispatch_order']))
	        {
	        	  $data['dispatch_order']->clone_check = '0';
                      if(isset($data['dispatch_order']->dor_billing_addr) && isset($data['dispatch_order']->dor_shipping_addr) && isset($data['dispatch_order']->dor_billing_gst) && isset($data['dispatch_order']->dor_shipping_gst) && isset($data['dispatch_order']->dor_billing_people) && isset($data['dispatch_order']->dor_shipping_people))
                      {
                        if($data['dispatch_order']->dor_billing_addr == $data['dispatch_order']->dor_shipping_addr && $data['dispatch_order']->dor_billing_gst == $data['dispatch_order']->dor_shipping_gst && $data['dispatch_order']->dor_billing_people == $data['dispatch_order']->dor_shipping_people) {  
                          $data['dispatch_order']->clone_check= '1'; 
                        }
                      }
	        	$data['title'] = isset($data['dispatch_order']->dor_cmp_id_value) ? $data['dispatch_order']->dor_cmp_id_value.(isset( $data['dispatch_order']->dor_code) ?  '-'.$data['dispatch_order']->dor_code:''):$title;

	        }
		    $this->load->view('dispatch-order/dispatch-order-print', $data);
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
    	 if(isset($_POST['field']) && $_POST['field'] == 'dor_dispatch_status') 
       {
	       	if($_POST['field_value'] == DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH)
	       	{
	       		$customData = array(
	       		'dor_dispatch_by' => $this->session->userdata(PEOPLE_SESSION_ID),
	       		'dor_dispatch_date' => date('Y-m-d H:i:s')
	       	   );	
	       	}
	       	else
	       	{
	       		$customData = array(
	       		'dor_dispatch_by' => '',
	       		'dor_dispatch_date' => ''
	       	);
       	}
       	

       }
        $custmData = $this->dispatchOrder_model->updateCustomData($customData);
        if($custmData)
        {
        	 if(isset($_POST['field']) && $_POST['field'] == 'dor_dispatch_status') 
            {
        	$customData['dispatch_status_group'] = $this->home_model->getGenPrmResultByValue('dor_dispatch_status',$_POST['field_value'],'row');
            }

        	if(isset($customData['dor_dispatch_date']))
        	{
        		$customData['dor_dispatch_date'] = display_date($customData['dor_dispatch_date']);
        		$customData['dor_dispatch_by_name'] = $this->session->userdata(PEOPLE_SESSION_NAME);
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
   public function getPeopleDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$company     = $this->input->get('company');
		$dropDownData = array('results'=>$this->dispatchOrder_model->getPeopleDropdown($search,$lead,$company));
		echo json_encode($dropDownData);
	}
    
}

?>

	
