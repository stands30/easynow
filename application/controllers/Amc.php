<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('amc_model');
		$this->mnu_name = 'amc-list';
	}

	public function amc_list()
	{
		$data['title'] 		=	'AMC List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'list'))
		{
		$data['global_asset_version'] = global_asset_version();
		$data['amcFuture'] = $this->amc_model->amc_getlist('Future',TABLE_COUNT);
		$data['amcDue'] = $this->amc_model->amc_getlist('Due',TABLE_COUNT);
		$data['amcUpcoming'] = $this->amc_model->amc_getlist('Upcoming',TABLE_COUNT);
		$data['amcAll'] = $this->amc_model->amc_getlist('All',TABLE_COUNT);
        $data 					= array_merge($data, checkaccess($this->mnu_name));
        // echo '<pre>';
        // print_r($data);
        // exit;
		$this->load->view('amc/amc-list', $data);
		}
	    else $this->load->view('errors/easynow_404', $data);
	}
	public function amc_add()
	{
		$data['title'] 		=	'AMC Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('amc-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add'))
		{
		$data['global_asset_version'] = global_asset_version();
		$data 					= array_merge($data, checkaccess($this->mnu_name));
		$this->load->view('amc/amc-add', $data);
		}
	    else $this->load->view('errors/easynow_404', $data);
	}

	public function amc_edit($slug = '')
	{
		$data['title'] 		=	'AMC Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('amc-list'));
		$data['breadcrumb_data'][] = array('Detail',base_url('amc-details-'.$slug));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'edit'))
		{
		$data['global_asset_version'] = global_asset_version();
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['amcdata'] = $this->amc_model->getAmcById($slug);
		$data['amcdata']->amc_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['amcdata']->amc_id);
		$data 					= array_merge($data, checkaccess($this->mnu_name));
		$this->load->view('amc/amc-edit', $data);
		}
	    else $this->load->view('errors/easynow_404', $data);
	}


	public function amc_details($slug = '')
	{
		$data['title'] 		=	'AMC Details';
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('amc-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		if (checkaccess($this->mnu_name, 'list'))
		{
		$data['global_asset_version'] = global_asset_version();
		 $slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
			  // echo $slug ;
		$data['amcdata'] = $this->amc_model->getAmcById($slug);
		$data['amcdata']->amc_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['amcdata']->amc_id);
		$data['amcdata']->next_encrypt 	 = $this->nextasy_url_encrypt->encrypt_openssl($data['amcdata']->next);
		$data['amcdata']->prev_encrypt 	 = $this->nextasy_url_encrypt->encrypt_openssl($data['amcdata']->prev);
		$data 					= array_merge($data, checkaccess($this->mnu_name));
		$data['title'] 		=	$data['amcdata']->amc_prd_name." on ".$data['amcdata']->amc_renewal_dt_detail." for ".$data['amcdata']->amc_ppl_name;
		$this->load->view('amc/amc-details', $data);
		}
	    else $this->load->view('errors/easynow_404', $data);
	}

	public function getCompanyDropdown($ppl_id)
	{
		$search      = $this->input->get('q');
		$companyData = array('results'=>$this->amc_model->getCompanyDropdown($search,$ppl_id));
		echo json_encode($companyData);
	}

	public function getProductForDropdown()
	{
		$search   = $this->input->get('q');
		$productData = array('results'=>$this->amc_model->getProductForDropdown($search));
		echo json_encode($productData);
	}

	public function getamcForDropdown()
	{
		$search   = $this->input->get('q');
		$amcData = array('results'=>$this->amc_model->getamcForDropdown($search));
		echo json_encode($amcData);
	}

	public function getPeopleForDropdown()
	{
		$search   = $this->input->get('q');
		$amcData = array('results'=>$this->amc_model->getPeopleForDropdown($search));
		echo json_encode($amcData);
	}

	public function getInvoiceForDropdown()
	{
		$search   = $this->input->get('q');
		$amcData = array('results'=>$this->amc_model->getInvoiceForDropdown($search));
		echo json_encode($amcData);
	}

	public function getGenPrmforDropdown($genPrmGroup)
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->amc_model->getGenPrmforDropdown($genPrmGroup,$search));
		echo json_encode($LeadData);
	}

	public
	function amc_insert()
	{
		$amcData = $this->input->post();
		
		$amcData['amc_start_date']  = mysqldate($amcData['amc_start_date']);
		$amcData['amc_renewal_date']  = mysqldate($amcData['amc_renewal_date']);
		$amcData['amc_status']  	= ACTIVE_STATUS;
		$amcData['amc_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$amcData['amc_crdt_dt'] 	= date("Y-m-d H:i:s");
		
		$inserted_id = $this->home_model->insert('amc', $amcData);
		if ($inserted_id)
		{
			
            
			$response = array(
				'success' => true,
				'message' => 'Amc Added Successfully',
				'linkn' => base_url('amc-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding amc'
			);
			echo json_encode($response);
		}
	}
	public
	function amc_update()
	{
		$amcData = $this->input->post();
	
		// echo '<pre>';
  //       print_r($amcData);
  //       exit;
		$amcData['amc_start_date']  = mysqldate($amcData['amc_start_date']);
		$amcData['amc_renewal_date']  = mysqldate($amcData['amc_renewal_date']);
		$amcData['amc_status']  	= ACTIVE_STATUS;
		$amcData['amc_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$amcData['amc_crdt_dt'] 	= date("Y-m-d H:i:s");
		$updated = $this->home_model->update('amc_id', $amcData['amc_id'], $amcData, 'amc');
		if ($updated)
		{
			$amc_id = $amcData['amc_id'];
			
            
			$response = array(
				'success' => true,
				'message' => 'Amc Updated successfully',
				'linkn' => base_url('amc-details-' . $this->nextasy_url_encrypt->encrypt_openssl($amc_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating amc'
			);
			echo json_encode($response);
		}
	}

	public function updateAmcCustomData()
    {
        $companyData = $this->amc_model->updateAmcCustomData();
        if($companyData)
        {
            $success = true;
            $message = 'Details saved successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
    }

    function amc_getlist($led_list_by)
	{
		// $dataOptn = $this->input->get();
		//    $dataTableArray['data'] = 

		$dataOptn = $this->input->get();
		$dataTableData = $this->amc_model->amc_getlist($led_list_by,TABLE_RESULT,$dataOptn);
		for ($i=0; $i < sizeof($dataTableData); $i++) { 
			   $dataTableData[$i]->amc_type = $led_list_by;
		}
		// ******** Encrypt Data from multidimensional array ******//
		$enc_arr['amc_ppl_id']    = 'amc_ppl_id_encrypt';
		$enc_arr['amc_id']    	= 'amc_id_encrypt';
		$enc_arr['amc_cmp_id']    = 'amc_cmp_id_encrypt';
		$enc_arr['amc_inv_id']    = 'amc_inv_id_encrypt';
		$enc_arr['amc_prd_id']    = 'amc_prd_id_encrypt';
		$dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);

		log_message('nexlog','lead::lead_follow_getlist >>');
		log_message('nexlog',' dataTableData : '.json_encode($dataTableArray));
		log_message('nexlog','lead::lead_follow_getlist <<');
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

	public function deleteAmc()
    {
    	$amc_id = $this->input->post('amc_id');
        $amc_id = $this->nextasy_url_encrypt->decrypt_openssl($amc_id);

        if($this->amc_model->deleteAmc($amc_id))
        {
            $success = true;
            $message = 'Amc Deleted successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message, 'linkn' => base_url('amc-list')));
    }

    function getRenewalDate()
	{
		$amc_start_date = $this->input->post('amc_start_date');
		$duration       = $this->input->post('duration');
		$duration_rad   = ($this->input->post('duration_rad'));
		switch ($duration_rad) {
			case 1:
				$renewal_date = date('m/d/Y',strtotime("+".($duration)." Years ",strtotime($amc_start_date)));
				break;
			case 2:
			    $renewal_date  = date('m/d/Y',strtotime("+".($duration)." Months  ",strtotime($amc_start_date)));
			    break;
			case 3:
			    $renewal_date  = date('m/d/Y',strtotime("+".($duration)." days  ",strtotime($amc_start_date)));
			    break;
			default:
				# code...
				break;
		}

		// echo $renewal_date;
		// exit;
		
		$response = array(
				'renewal_date' => $renewal_date
			);
			echo json_encode($response);
	}
	
}

?>