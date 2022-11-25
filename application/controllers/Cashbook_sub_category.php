<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashbook_sub_category extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('cashbook_sub_category_model');
    }

    public function cashbook_sub_category_dashboard()

	{
		$data['title'] 		=	'Cashbook Sub Category Dashboard';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook Sub Category');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$this->load->view('cashbook/sub_category/cashbook_sub_category_dashboard', $data);
	}
	
	public function list_cashbook_sub_category()
	{
		$data['title'] 		=	'Cashbook Sub Category List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook Sub Category', base_url('cashbook-sub-category-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//
		
		$data['dataTableData'] = $this->cashbook_sub_category_model->getCashbook_sub_categoryList(TABLE_COUNT);

		$this->load->view('cashbook/sub_category/cashbook_sub_category_list', $data);
	}

	public function cashbook_sub_categoryDataTablelist()
    {
    	$dataOptn = $this->input->get();
	    $dataTableData = $this->cashbook_sub_category_model->getCashbook_sub_categoryList(TABLE_RESULT,$dataOptn);
	      // ******** Encrypt Data from multidimensional array ******//
	    $enc_arr['csc_id']    	= 'csc_id_encrypt';
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

	public function add_cashbook_sub_category()
	{
		$data['title'] 		=	'Cashbook Sub Category Add';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook Sub Category', base_url('cashbook-sub-category-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('cashbook-sub-category-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$this->load->view('cashbook/sub_category/cashbook_sub_category_add', $data);
	}

	public function edit_cashbook_sub_category($cashbook_sub_category_id ='')
	{
		$cashbook_sub_category_id 		= 	$this->nextasy_url_encrypt->decrypt_openssl($cashbook_sub_category_id);
		$data['title'] 		=	'Cashbook Sub Category Edit';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook Sub Category', base_url('cashbook-sub-category-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('cashbook-sub-category-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$data['cashbook_sub_category'] =  $this->home_model->detail_data('*,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csc.csc_cbc_id )csc_cbc_name', 'cashbook_sub_category csc', 'csc_id = "'.$cashbook_sub_category_id.'"');

		$this->load->view('cashbook/sub_category/cashbook_sub_category_edit', $data);
	}

	// ***** cashbook Sub category Insert Starts Here ********//
    public function insertCashbook_sub_category()
    {
    	$data_cashbook_sub_category = $this->input->post();
    	$cscId = $this->home_model->save_data('cashbook_sub_category', $data_cashbook_sub_category, 'csc_id');

		if($cscId)
		{
			$success = true;
			$message = 'Cashbook Sub Category Added successfully';
			$linkn   =  base_url('cashbook-sub-category-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook Sub category Insert End Here ********//


    // ***** cashbook Sub category Update Starts Here ********//
    public function updateCashbook_sub_category()
    {
    	$data_cashbook_sub_category = $this->input->post();
    	$cscId = $this->home_model->update_data('cashbook_sub_category', $data_cashbook_sub_category, 'csc_id');

		if($cscId)
		{
			$success = true;
			$message = 'Cashbook Sub Category Update successfully';
			$linkn   =  base_url('cashbook-sub-category-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook Sub category Update End Here ********//

    // ***** cashbook Sub category deleted Starts Here ********//
    public function delete_cashbook_sub_category($cashbook_sub_category_id='')
    {
    	$cashbook_sub_category_id = 	$this->nextasy_url_encrypt->decrypt_openssl($cashbook_sub_category_id);
    	$cscId = $this->home_model->delete_data('cashbook_sub_category', $cashbook_sub_category_id, 'csc_id');

		if($cscId)
		{
			$success = true;
			$message = 'Cashbook Sub Category deleted successfully';
			$linkn   =  base_url('cashbook-sub-category-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook Sub category deleted End Here ********//


    // ***** Cashbook Sub Category Start Here *******//

	public function getCategoryforDropdown()
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->cashbook_sub_category_model->getCategoryforDropdown($search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook Sub Category End Here ********//


}