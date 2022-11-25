<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashbook_category extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('cashbook_category_model');
    }

    public function cashbook_category_dashboard()

	{
		$data['title'] 		=	'Cashbook Category Dashboard';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook Category');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$this->load->view('cashbook/category/cashbook_category_dashboard', $data);
	}
	
	public function list_cashbook_category()
	{
		$data['title'] 		=	'Cashbook Category List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook Category', base_url('cashbook-category-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//
		
		$data['dataTableData'] = $this->cashbook_category_model->getCashbook_categoryList(TABLE_COUNT);

		$this->load->view('cashbook/category/cashbook_category_list', $data);
	}

	public function cashbook_categoryDataTablelist()
    {
    	$dataOptn = $this->input->get();
	    $dataTableData = $this->cashbook_category_model->getCashbook_categoryList(TABLE_RESULT,$dataOptn);
	      // ******** Encrypt Data from multidimensional array ******//
	    $enc_arr['cbc_id']    	= 'cbc_id_encrypt';
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

	public function add_cashbook_category()
	{
		$data['title'] 		=	'Cashbook Category Add';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook Category', base_url('cashbook-category-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('cashbook-category-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$this->load->view('cashbook/category/cashbook_category_add', $data);
	}

	public function edit_cashbook_category($cashbook_category_id ='')
	{
		$cashbook_category_id 		= 	$this->nextasy_url_encrypt->decrypt_openssl($cashbook_category_id);
		$data['title'] 		=	'Cashbook Category Edit';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Cashbook Category', base_url('cashbook-category-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('cashbook-category-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// ***** Cache Version Starts here *******//
		$data['global_asset_version'] = global_asset_version();
		// ***** Cache Version Ends here *******//

		$data['cashbook_category'] =  $this->home_model->detail_data('*,(select gnp_name from gen_prm where gen_prm.gnp_value = cbc.cbc_type and gnp_group = "cashbook_type" )cbc_types', 'cashbook_category cbc', 'cbc_id = "'.$cashbook_category_id.'"');

		$this->load->view('cashbook/category/cashbook_category_edit', $data);
	}

	// ***** cashbook category Insert Starts Here ********//
    public function insertCashbook_category()
    {
    	$data_cashbook_category = $this->input->post();
    	$cbcId = $this->home_model->save_data('cashbook_category', $data_cashbook_category, 'cbc_id');

		if($cbcId)
		{
			$success = true;
			$message = 'Cashbook Category Added successfully';
			$linkn   =  base_url('cashbook-category-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook category Insert End Here ********//


    // ***** cashbook category Update Starts Here ********//
    public function updateCashbook_category()
    {
    	$data_cashbook_category = $this->input->post();
    	$cbcId = $this->home_model->update_data('cashbook_category', $data_cashbook_category, 'cbc_id');

		if($cbcId)
		{
			$success = true;
			$message = 'Cashbook Category Update successfully';
			$linkn   =  base_url('cashbook-category-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook category Update End Here ********//

    // ***** cashbook category deleted Starts Here ********//
    public function delete_cashbook_category($cashbook_category_id='')
    {
    	$cashbook_category_id = 	$this->nextasy_url_encrypt->decrypt_openssl($cashbook_category_id);
    	$cbcId = $this->home_model->delete_data('cashbook_category', $cashbook_category_id, 'cbc_id');

		if($cbcId)
		{
			$success = true;
			$message = 'Cashbook Category deleted successfully';
			$linkn   =  base_url('cashbook-category-list');
		}
		else
		{
			$success = false;
			$message = 'Oops !! Some error occured';
			$linkn   = '';
		}
		echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** cashbook category deleted End Here ********//


    // ***** Cashbook Type Start Here *******//

	public function getGenPrmforDropdown($genPrmGroup)
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->cashbook_category_model->getGenPrmforDropdown($genPrmGroup,$search));
		echo json_encode($LeadData);
	}

    // *****  Cashbook Type End Here ********//


}