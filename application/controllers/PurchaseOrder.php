<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrder extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->mnu_name = 'purchase-order-list';
		$this->load->model('purchaseOrder_model');
	}

	public function purchase_order_list()
	{
		$data['title'] 		=	'Purchase Order List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'list'))
		  {
		    $dataOptn['mnu_name']=$this->mnu_name;
		  	$data['global_asset_version'] = global_asset_version();
            $data['dataTableData'] = $this->purchaseOrder_model->getPurchaseOrderList(TABLE_COUNT,$dataOptn);
            $data = array_merge($data, checkaccess($this->mnu_name)); 
            $data['por_status_group']    = $this->home_model->getGenPrmResultByGroup('por_received_status','result');
            $data['por_status_group'][] = (object) array('f1'=>'all','f2'=>'All');
		    $this->load->view('purchase-order/purchase-order-list', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function purchase_order_add()
	{
		$data['title'] 		=	'Purchase Order Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('purchase-order-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
            $data['tax_computation'] = ($this->home_model->getBusinessParamData(PURCHASE_ORDER_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(PURCHASE_ORDER_TAX_COMPUTATION)->bpm_value:'0';
            $data['tax_percent'] = ($this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)) ? $this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)->bpm_value:'0';
            $data['product_tax'] = ($this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)) ? $this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)->bpm_value:'0';
            $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
            $billing_comp = $this->purchaseOrder_model->getCurrentBillingCompany();
			$purchase_order = new stdClass();
			$purchase_order->por_code = $this->home_model->getNewCode(
                                     		array(
                                     	 		'column'	=> 'por_code',
                                     	 		'table'		=> 'purchase_order',
                                     	 		'type'		=>  PURCHASE_ORDER_CODE,
                                     	 		'where'		=> ''
                                     		)
                                     	);
			$purchase_order->por_date = date('Y-m-d');
			$purchase_order->por_tax_computation = 1;
		if(isset($billing_comp))
		{
			$purchase_order->por_billing_cmp = $billing_comp->cmp_id;
			$purchase_order->por_billing_cmp_value = $billing_comp->cmp_name;
			$purchase_order->por_billing_cmp_state = $billing_comp->cmp_state;
			$purchase_order->por_terms = $billing_comp->cmp_payment_terms;
			$data['purchase_order'] = $purchase_order;
		}
		    $this->load->view('purchase-order/purchase-order-add', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}
	 public function getCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$dropDownData = array('results'=>$this->purchaseOrder_model->getCompanyDropdown(COMPANY_TYPE_ACCOUNT,$search,$lead));
		echo json_encode($dropDownData);
	}
	public function getProductDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->purchaseOrder_model->getProductDropdown($search));
		echo json_encode($dropDownData);
	}
	public function getProductVariantDropdown()
	{
		$search       = $this->input->get('q');
		$product      = $this->input->get('product');
		$dropDownData = array('results'=>$this->purchaseOrder_model->getProductVariantDropdown($product,$search));
		echo json_encode($dropDownData);
	}
	public function multi_form_data_save()
    {
    	$form_data_save_id = $this->input->post('por_id');
    	
        $form_data_id = $this->purchaseOrder_model->multi_form_data_save($form_data_save_id);
        if($form_data_id)
        {
            $form_data_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($form_data_id);
            $success = true;
            $message = 'Purchase Order created successfully';
            if($form_data_save_id !='')
            {
               $message = 'Purchase Order updated successfully';
            }
            $linkn   = base_url('purchase-order-details-'.$form_data_encrypted_id);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
	
    public function purchase_order_details($module_encrypted_id)
	{
		$data['title'] 		=	'Purchase Order Details';
		$data['por_encrypted_id'] = $module_encrypted_id;
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('purchase-order-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
			$data['menu_name'] = $this->mnu_name;
	        $por_id = $this->nextasy_url_encrypt->decrypt_openssl($module_encrypted_id);
	        $data['purchase_order'] = $this->purchaseOrder_model->getPODataById($por_id,$this->mnu_name);
	        $data['por_product'] = $this->purchaseOrder_model->getPOProductDataById($por_id);
	        $data['tax_computation'] = isset($data['purchase_order']->por_tax_computation) ? $data['purchase_order']->por_tax_computation:'0';
		    $data['tax_percent'] = isset($data['purchase_order']->por_gst_percent) ? $data['purchase_order']->por_gst_percent:'0';
	        $data['product_tax'] = isset($data['purchase_order']->por_prod_tax) ? $data['purchase_order']->por_prod_tax:'0';
	        $data['product_date'] = isset($data['purchase_order']->por_date) ? $data['purchase_order']->por_date:'';
	        $data['por_code'] = isset($data['purchase_order']->por_code) ? $data['purchase_order']->por_code:'';
            $data['activity_filter']    = $this->home_model->getGenPrmResultByGroup('por_apprvl_status','result');
            $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
            if(!empty($data['purchase_order']))
	        {
	        	$data['title'] = isset($data['purchase_order']->por_subject) ? $data['purchase_order']->por_subject.(isset( $data['purchase_order']->por_code) ?  '-'.$data['purchase_order']->por_code:''):$title;

	        }
	        $data = array_merge($data, checkaccess($this->mnu_name));
		    $this->load->view('purchase-order/purchase-order-details', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}
    public function purchase_order_print($module_encrypted_id)
	{
		$data['title'] 		=	'Purchase Order Print';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('purchase-order-list'));
		$data['breadcrumb_data'][] = array('Print');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$data['menu_name'] = $this->mnu_name;
        $por_id = $this->nextasy_url_encrypt->decrypt_openssl($module_encrypted_id);
        $data['purchase_order'] = $this->purchaseOrder_model->getPODataById($por_id,$this->mnu_name);
        $data['por_product'] = $this->purchaseOrder_model->getPOProductDataById($por_id);
        $data['tax_computation'] = ($this->home_model->getBusinessParamData(PURCHASE_ORDER_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(PURCHASE_ORDER_TAX_COMPUTATION)->bpm_value:'0';
        $data['tax_percent'] = isset($data['purchase_order']->por_gst_percent) ? $data['purchase_order']->por_gst_percent:'0';
        $data['product_tax'] = isset($data['purchase_order']->por_prod_tax) ? $data['purchase_order']->por_prod_tax:'0';
        $data['product_date'] = isset($data['purchase_order']->por_date) ? $data['purchase_order']->por_date:'';
        $data['por_code'] = isset($data['purchase_order']->por_code) ? $data['purchase_order']->por_code:'';
        $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        if(!empty($data['purchase_order']))
	        {
	        	$data['title'] = isset($data['purchase_order']->por_subject) ? $data['purchase_order']->por_subject.(isset( $data['purchase_order']->por_code) ?  '-'.$data['purchase_order']->por_code:''):$title;

	        }
        
		$this->load->view('purchase-order/purchase-order-print', $data);
	}
	public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $genData = array('results'=>$this->purchaseOrder_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($genData);
    }
    public function checkUniqueCode($field,$id='')
    {
        $custom_data = array();
        $custom_data['table']	     = 'purchase_order';
        $custom_data['unique_col']   = 'por_id';
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
     public function getPurchaseOrderList()
    {
        log_message('nexlog','purchase order::getPurchaseOrderList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->purchaseOrder_model->getPurchaseOrderList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['por_id']          = 'por_encrypted_id';
        $enc_arr['por_vdr_id']      = 'por_vdr_encrypted_id';
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
        log_message('nexlog','purchase order::getPurchaseOrderList << ');
        echo json_encode($dataTableArray);
    }

     public function purchase_order_edit($module_encrypted_id)
	{
		$data['title'] 		=	'Purchase Order Edit';
		$data['por_encrypted_id'] = $module_encrypted_id;
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('purchase-order-list'));
		$data['breadcrumb_data'][] = array('Details', base_url('purchase-order-details-'.$module_encrypted_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'edit'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
			$data['menu_name'] = $this->mnu_name;
	        $por_id = $this->nextasy_url_encrypt->decrypt_openssl($module_encrypted_id);
	        $data['purchase_order'] = $this->purchaseOrder_model->getPODataById($por_id,$this->mnu_name);
	        $data['por_product'] = $this->purchaseOrder_model->getPOProductDataById($por_id);
            $data['tax_computation'] = ($this->home_model->getBusinessParamData(PURCHASE_ORDER_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(PURCHASE_ORDER_TAX_COMPUTATION)->bpm_value:'0';
	        $data['tax_percent']  = isset($data['purchase_order']->por_gst_percent) ? $data['purchase_order']->por_gst_percent:'0';
	        $data['product_tax']  = isset($data['purchase_order']->por_prod_tax) ? $data['purchase_order']->por_prod_tax:'0';
	      	 $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
	      	if(!empty($data['purchase_order']))
	        {
	        	$data['title'] = isset($data['purchase_order']->por_subject) ? $data['purchase_order']->por_subject.(isset( $data['purchase_order']->por_code) ?  '-'.$data['purchase_order']->por_code:''):$title;

	        }
	        if ($data['purchase_order']->por_received_status != PURCHASE_ORDER_RECEIVED_STATUS_RECEIVED) {
	        	$this->load->view('purchase-order/purchase-order-add', $data);
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
	public function updateCustomData()
    {
    	$response = array();
    	$customData = array();
    	 if(isset($_POST['field']) && $_POST['field'] == 'por_apprvl_status') 
       {
	       	if($_POST['field_value'] == PURCHASE_ORDER_STATUS_APPROVED)
	       	{
	       		$customData = array(
	       		'por_apprvl_by' => $this->session->userdata(PEOPLE_SESSION_ID),
	       		'por_apprvl_date' => date('Y-m-d')
	       	   );	
	       	}
	       	else
	       	{
	       		$customData = array(
	       		'por_apprvl_by' => '',
	       		'por_apprvl_date' => ''
	       	);
       	}
       	

       }
        $custmData = $this->purchaseOrder_model->updateCustomData($customData);
        if($custmData)
        {
        	 if(isset($_POST['field']) && $_POST['field'] == 'por_apprvl_status') 
            {
        	$customData['module_apprvl_status_name'] = $this->home_model->getGenPrmResultByValue('por_apprvl_status',$_POST['field_value'],'row');
            }

        	if(isset($customData['por_apprvl_date']))
        	{
        		$customData['por_apprvl_date'] = display_date($customData['por_apprvl_date']);
        		$customData['por_apprvl_by_name'] = $this->session->userdata(PEOPLE_SESSION_NAME);
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
     public function getBillingCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->purchaseOrder_model->getBillingCompanyDropdown($search));
		echo json_encode($dropDownData);
	}
	 public function getActivity()
    {
        $por_id = $this->input->post('por_id');
        
      $data =  $this->purchaseOrder_model->checkPOActivity($por_id);
        $enc_arr['created_by']          = 'ppl_encrypted_id';
        $data     = encrypt_key_in_array($data,$enc_arr);
        echo json_encode($data);
    }
      public function getInventoryList()
    {
        log_message('nexlog','inventory ::getInventoryList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->purchaseOrder_model->getInventoryList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['piv_id']          = 'piv_encrypted_id';
        $enc_arr['piv_prd_id']      = 'piv_prd_encrypted_id';
        $enc_arr['piv_managed_by']  = 'piv_managed_by_encrypted_id';
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
        log_message('nexlog','inventory ::getInventoryList << ');
        echo json_encode($dataTableArray);
    }
}

?>

	
