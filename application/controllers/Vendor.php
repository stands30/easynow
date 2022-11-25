<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('client_model');
	}

	public

	function client_dashboard()
	{
		$data['title'] = 'Vendor Dashboard';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		$data['breadcrumb_data'][] = array(
			'Vendor'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-dashboard', $data);
	}

	public

	function client_list()
	{
		$data['title'] = 'Vendor List';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		// $data['breadcrumb_data'][] = array(
		// 	'Vendor',
		// 	base_url('client-dashboard')
		// );
		$data['breadcrumb_data'][] = array(
			'List'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-list', $data);
	}

	public

	function client_add()
	{
		$data['title'] = 'Vendor Add';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		// $data['breadcrumb_data'][] = array(
		// 	'Vendor',
		// 	base_url('client-dashboard')
		// );
		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-list')
		);
		$data['breadcrumb_data'][] = array(
			'Add'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-add', $data);
	}

	public

	function client_people_add($cmp_id = '',$cmp_name = '')
	{
		$data['cmp_id']   = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
		$data['cmp_id_encrypt']   = $cmp_id;
		$data['cmp_name'] = $this->nextasy_url_encrypt->decrypt_openssl($cmp_name);
		$data['title'] = 'Vendor People Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		// $data['breadcrumb_data'][] = array(
		// 	'Vendor',
		// 	base_url('client-dashboard')
		// );
		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-details-'.$cmp_id)
		);
		$data['breadcrumb_data'][] = array(
			'Add'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-people-add', $data);
	}

	public function client_people_edit($cpl_id = '',$cmp_id = '')
	{

		$data['title'] 		=	'Vendor People Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Event', base_url('client-dashboard'));
    $data['breadcrumb_data'][] = array('List',base_url('client-details-'.$cmp_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
    $data['cacheVersion'] = global_asset_version();
		// ***** Breadcrumb Data Ends here *******//
    $cpl_id = $this->nextasy_url_encrypt->decrypt_openssl($cpl_id);
    $data['clientPplDetail'] = $this->client_model->getCompPplById($cpl_id);
		$data['clientPplDetail']->cmp_id_encrypt = $cmp_id;
    // print_r($data['clientPplDetail']);
    // exit;
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-people-edit', $data);
	}

	public

	function client_edit($slug)
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);

		$data['title'] = 'Vendor Edit';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);

		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-list')
		);
		$data['breadcrumb_data'][] = array(
			'Edit'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//

		$data['clientdata'] = $this->client_model->getVendorById($slug);
		$data['clientdata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_id);
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-edit', $data);
	}

	public

	function client_details($slug)
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['title'] = 'Vendor Details';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		// $data['breadcrumb_data'][] = array(
		// 	'Vendor',
		// 	base_url('client-dashboard')
		// );
		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-list')
		);
		$data['breadcrumb_data'][] = array(
			'Details'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//

		$data['clientdata'] = $this->client_model->getVendorById($slug);
		// print_r($data['clientdata']);
		// exit;
		$data['clientdata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_id);
		$data['clientdata']->cmp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_name);
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-details', $data);
	}

	public

	function client_people_detail($slug)
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['title'] = 'Vendor People Details';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		// $data['breadcrumb_data'][] = array(
		// 	'Vendor',
		// 	base_url('client-dashboard')
		// );
		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-list')
		);
		$data['breadcrumb_data'][] = array(
			'People Details'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//

		$data['clientdata'] = $this->client_model->getVendorById($slug);
		// print_r($data['clientdata']);
		// exit;
		$data['clientdata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_id);
		$data['clientdata']->cmp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_name);
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-people-details', $data);
	}

	public

	function client_insert()
	{
		$compData    = $this->input->post();
		$clientData  = array();
		$compData['cmp_status'] = '1';

		if(isset($_FILES['cmp_logo']['name']))
		{
	        $sourcePath 		= $_FILES['cmp_logo']['tmp_name'];
	        $data['cmp_logo']   = $_FILES['cmp_logo']['name'];
	        $targetPath 		= 'assets/client/img/'.$data['cmp_logo'];
	        $check 				= move_uploaded_file($sourcePath,$targetPath);

			if(!$check)
			{
	            $response  = array('success' => false , 'message' => 'Error in Uploading Logo');
	            echo json_encode($response);
	            exit();
			}

			$compData['cmp_logo'] 	= $data['cmp_logo'];
		}

		$compData['cmp_status'] 	= '1';
		$compData['cmp_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$compData['cmp_crdt_dt'] 	= date("Y-m-d H:i:s");

		$inserted_id = $this->home_model->insert('company', $compData);

		if ($inserted_id)
		{
			$clientData['cli_cmp_id']  = $inserted_id;
			$clientData['cli_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
			$clientData['cli_crdt_dt'] = date("Y-m-d H:i:s");
			$client_id = $this->home_model->insert('client', $clientData);
			$response = array(
				'success' => true,
				'message' => 'Vendor Added successfully',
				'linkn' => base_url('client-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Vendor'
			);
			echo json_encode($response);
		}
	}

	public

	function client_update()
	{
		$compData = $this->input->post();

		if(isset($_FILES['cmp_logo']['name']))
		{
	        $sourcePath 		= $_FILES['cmp_logo']['tmp_name'];
	        $data['cmp_logo']   = $_FILES['cmp_logo']['name'];
	        $targetPath 		= 'assets/client/img/'.$data['cmp_logo'];
	        $check 				= move_uploaded_file($sourcePath,$targetPath);

			if(!$check)
			{
	            $response  = array('success' => false , 'message' => 'Error in Uploading Logo');
	            echo json_encode($response);
	            exit();
			}

			$compData['cmp_logo'] 	= $data['cmp_logo'];
		}

		$compData['cmp_status'] = '1';
		$compData['cmp_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$compData['cmp_updt_dt'] = date("Y-m-d H:i:s");

		$updated = $this->home_model->update('cmp_id', $compData['cmp_id'], $compData, 'company');

		if ($updated)
		{
			$cmp_id = $compData['cmp_id'];
			$response = array(
				'success' => true,
				'message' => 'Vendor Updated successfully',
				'linkn' => base_url('client-details-' . $this->nextasy_url_encrypt->encrypt_openssl($cmp_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Vendor'
			);
			echo json_encode($response);
		}
	}

	public

	function client_delete($cmp_id)
	{
		$cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
		$check = $this->home_model->delete('cmp', $cmp_id, 'client');
		if ($check)
		{
			$response = array(
				'success' => true,
				'message' => 'Vendor Deleted successfully',
				'linkn' => base_url('client-list')
			);
			echo json_encode($response);
		}
	}

	function getCode($string)
	{
		return str_replace(' ', '-',$string);
	}

	function client_getlist()
	{
		$obj['data'] = $this->client_model->client_getlist();

		// print_r($obj['data']);
		//
		// exit;
		for($i = 0; $i < count($obj['data']); $i++)
		{
			$obj['data'][$i]->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->cmp_id);
		}

		echo json_encode($obj);
	}

	public function client_people_insert()
  {


      $clientData = array(

		  		'cpl_ppl_id'            => $this->input->post('cpl_ppl_id'),
          'cpl_designation'       => $this->input->post('cpl_designation'),
		  		'cpl_cmp_id'            => $this->input->post('cpl_cmp_id'),
		  		'cpl_status'            => '1',
          'cpl_crdt_dt'           => date("Y-m-d H:i:s"),
          'cpl_crdt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),

	  		);
			$inserted_id = $this->home_model->insert('cmp_people',$clientData);
			if($inserted_id)
			{
					$cmp_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('cpl_cmp_id'));
  				$response  = array('success' => True , 'message' => 'Vendor People Details added successfully','linkn'=>base_url('client-people-detail-'.$cmp_encrypt_id));
    	    echo json_encode($response);
    	    exit();
			}
      else
      {
        $response  = array('success' => false , 'message' => '1');
                echo json_encode($response);
                exit();
      }

  }

	public function client_people_update()
  {

      $cpl_id = $this->input->post('cpl_id');
			$cmp_id = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('cpl_cmp_id'));
      $copmayData = array(

				'cpl_ppl_id'            => $this->input->post('cpl_ppl_id'),
				'cpl_cmp_id'            => $this->input->post('cpl_cmp_id'),
				'cpl_designation'       => $this->input->post('cpl_designation'),
				'cpl_status'            => '1',
				'cpl_updt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),

	  		);
			$updated = $this->home_model->update('cpl_id',$cpl_id,$copmayData,'cmp_people');
			if($updated)
			{
  				$response  = array('success' => True , 'message' => 'Vendor People Details updated successfully','linkn' => base_url('client-people-detail-'.$cmp_id));
    	    echo json_encode($response);
    	    exit();
			}
      else
      {
        $response  = array('success' => false , 'message' => '1');
        echo json_encode($response);
        exit();
      }
  }

	function client_people_list($cmp_id)
	{
		$cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
		$obj['data'] = $this->client_model->client_people_list($cmp_id);

		for($i = 0; $i < count($obj['data']); $i++)
		{
			$obj['data'][$i]->cpl_ppl_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->cpl_ppl_id);
		}
		for($i = 0; $i < count($obj['data']); $i++)
		{
			$obj['data'][$i]->cpl_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->cpl_id);
		}
		// print_r($obj['data']);
		// exit;
		echo json_encode($obj);
	}

	public function getVendorDropdown()
	{
		$search      = $this->input->get('q');
		$clientData = array('results'=>$this->client_model->getVendorDropdown($search));
		echo json_encode($clientData);
	}

	public function getIndustryDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->client_model->getDropdown($search,COMPANY_INDUSTRY));
		echo json_encode($industryData);
	}

	public function getVendorTypeDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->client_model->getDropdown($search,COMPANY_TYPE));
		echo json_encode($industryData);
	}

	public function getVendorAnnualDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->client_model->getDropdown($search,COMPANY_ANNUAL_REV));
		echo json_encode($industryData);
	}

	public function getStateDropdown()
	{
		$search      = $this->input->get('q');
		$stateData = array('results'=>$this->client_model->getStateDropdown($search));
		echo json_encode($stateData);
	}

}

?>
