<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller
{

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('menu_master_model');
				$this->load->model('sub_menu_model');
        check_logged();
    }

	public function menu_master_list()
	{
		$data['title'] 		=	'Menu Master List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['cacheversion'] = global_asset_version();
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('setting/menu-master-list', $data);
	}

	public function menu_master_add()
	{
		$data['title'] 		=	'Menu Master Add';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Setting', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('menu-master-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['cacheversion'] = global_asset_version();
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('setting/menu-master-add', $data);
	}

	public function menu_master_edit($mnu_encrypt_id)
	{
		$data['title'] 		=	'Menu Master Edit';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Setting', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('menu-master-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$mnu_id      			         = $this->nextasy_url_encrypt->decrypt_openssl($mnu_encrypt_id);
		$data['mnu_details']			 = $this->menu_master_model->getMnuById($mnu_id);
		if($data['mnu_details']->mnu_status == MENU_ACTIVE_STATUS)
		{
			$data['mnu_details']->mnu_status_name = 'Active';
		}
		else
		{
			$data['mnu_details']->mnu_status_name = 'In Active';
		}
		$data['cacheversion'] = global_asset_version();
		$this->load->view('setting/menu-master-edit', $data);
	}

	public function submenu_master_edit($sbm_encrypt_id)
	{
		$data['title'] 		=	'Menu Master Edit';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Setting', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('menu-master-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$sbm_id      			         = $this->nextasy_url_encrypt->decrypt_openssl($sbm_encrypt_id);
		$data['sbm_details']			 = $this->sub_menu_model->getSubMnuById($sbm_id);
		if($data['sbm_details']->sbm_status == MENU_ACTIVE_STATUS)
		{
			$data['sbm_details']->sbm_status_name = 'Active';
		}
		else
		{
			$data['sbm_details']->sbm_status_name = 'In Active';
		}
		// print_r($data);
		// exit();
		$data['cacheversion'] = global_asset_version();
		$this->load->view('setting/submenu-master-edit', $data);
	}

	public function submenu_master_list()
	{
		$data['title'] 		=	'Submenu Master List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['cacheversion'] = global_asset_version();
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('setting/submenu-master-list', $data);
	}

	public function submenu_master_add()
	{
		$data['title'] 		=	'Submenu Master Add';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Setting', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('submenu-master-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['cacheversion'] = global_asset_version();
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('setting/submenu-master-add', $data);
	}

	public function menu_master_detail($mnu_encrypt_id)
	{
		$data['title'] 		         =	'Menu Master Details';
	   	// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Setting', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('menu-master-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['mnu_encrypt_id']	 	 = $mnu_encrypt_id;
		// ***** Breadcrum Data Ends here *******//
		$mnu_id      			                = $this->nextasy_url_encrypt->decrypt_openssl($mnu_encrypt_id);
		$data['mnu_details']			        = $this->menu_master_model->getMnuById($mnu_id);
		$data['mnu_details']->mnu_crdt_dt = DisplayDate($data['mnu_details']->mnu_crdt_dt);
		if($data['mnu_details']->mnu_status == MENU_ACTIVE_STATUS)
		{
			$data['mnu_details']->mnu_status_name = 'Active';
		}
		else
		{
			$data['mnu_details']->mnu_status_name = 'In Active';
		}
		$data['cacheversion'] = global_asset_version();
		$this->load->view('setting/menu-master-detail', $data);
	}

	public function submenu_master_detail($sbm_encrypt_id)
	{
		$data['title'] 		=	'Submenu Master Details';
	   	// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Setting', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('submenu-master-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['sbm_encrypt_id']		 = $sbm_encrypt_id;
		// ***** Breadcrum Data Ends here *******//
		$sbm_id      			                = $this->nextasy_url_encrypt->decrypt_openssl($sbm_encrypt_id);
		$data['sbm_details']			        = $this->sub_menu_model->getSubMnuById($sbm_id);
		$data['sbm_details']->sbm_crdt_dt = DisplayDate($data['sbm_details']->sbm_crdt_dt);
		if($data['sbm_details']->sbm_status == MENU_ACTIVE_STATUS)
		{
			$data['sbm_details']->sbm_status_name = 'Active';
		}
		else
		{
			$data['sbm_details']->sbm_status_name = 'In Active';
		}
		$data['cacheversion'] = global_asset_version();
		$this->load->view('setting/submenu-master-detail', $data);
	}

	public function getStatusDropdown()
	{
		$search      = $this->input->get('q');
		$peopleData  = array('results'=>$this->menu_master_model->getStatusforDropdown('active_status'));
		echo json_encode($peopleData);
	}

	public function getMenuDropdown()
	{
		$search      = $this->input->get('q');
		$peopleData  = array('results'=>$this->sub_menu_model->getMenusforDropdown('active_status'));
		echo json_encode($peopleData);
	}

	public function getSubMenuDropdown()
	{
		$search      = $this->input->get();
		$peopleData  = array('results'=>$this->sub_menu_model->getSubMenusforDropdown($search));
		echo json_encode($peopleData);
	}

	// public function deleteMnu()
	// {
	// 	$mnu_id    = $this->input->post('mnu_id');
	// 	$check     = $this->menu_master_model->deleteMnu($bpm_id);
	// 	if($check)
	// 	{
	// 		$response = array('success' => True, 'message'=>'Business Parameter removed successfully');
	// 		echo json_encode($response);
	// 	}
	// }

	  public function getMnuDataTableList()
    {
      $bsnParamList = $this->menu_master_model->getMnuList();
      // ******** Encrypt Data from multidimensional array ******//
      if(!empty($bsnParamList))
      {
        function encryptData(&$item,$key)
        {
          $CI = &get_instance();
					if($key=='mnu_encrypt_id')
					{
							 $item = $CI->nextasy_url_encrypt->encrypt_openssl($item); // Do This!
					}
	         if($key=='mnu_status_name')
	         {

	          if($item == MENU_ACTIVE_STATUS)
	          {
	            $item = 'Active';
	          }
						else
	          {
	            $item = 'InActive';
	          }
	          // $item = $CI->nextasy_url_encrypt->encrypt_openssl($item); // Do This!
	         }
      }
      array_walk_recursive($bsnParamList,'encryptData');
      }
      // ******** Encrypt Data from multidimensional array ******//
    $bsnParamListData['data'] = $bsnParamList;
    echo json_encode($bsnParamListData);
    }

		public function getSubMnuDataTableList()
    {
      $subMnuList = $this->sub_menu_model->getSubMnuList();
      // ******** Encrypt Data from multidimensional array ******//
      if(!empty($subMnuList))
      {
        function encryptData(&$item,$key)
        {
          $CI = &get_instance();
					if($key=='sbm_encrypt_id')
					{
							 $item = $CI->nextasy_url_encrypt->encrypt_openssl($item); // Do This!
					}
	         if($key=='sbm_status_name')
	         {

	          if($item == MENU_ACTIVE_STATUS)
	          {
	            $item = 'Active';
	          }
						else
	          {
	            $item = 'InActive';
	          }
	          // $item = $CI->nextasy_url_encrypt->encrypt_openssl($item); // Do This!
	         }
      }
      array_walk_recursive($subMnuList,'encryptData');
      }
      // ******** Encrypt Data from multidimensional array ******//
    $subMnuListData['data'] = $subMnuList;
    echo json_encode($subMnuListData);
    }



	public function menu_master_insert()
  {
      $mnuPrmData = array(
		  		'mnu_name'              => $this->input->post('mnu_name'),
          'mnu_link'              => $this->input->post('mnu_link'),
					'mnu_icon'              => $this->input->post('mnu_icon'),
					'mnu_order'             => $this->input->post('mnu_order'),
					'mnu_status'            => $this->input->post('mnu_status'),
          'mnu_crdt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
			$inserted_id = $this->home_model->insert('menu_master',$mnuPrmData);
			if($inserted_id)
			{
				  $mnu_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($inserted_id);
  				$response  = array(
						'success' => True ,
						'message' => 'Menu  Added successfully',
						'linkn'   => base_url('menu-master-detail-'.$mnu_encrypt_id));
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

	public function menu_master_update()
  {

      $mnu_id = $this->input->post('mnu_id');
			//$data['user_id'] = $this->session->userdata('mha_prs_id');
      $mnuData = array(
				'mnu_name'              => $this->input->post('mnu_name'),
				'mnu_link'              => $this->input->post('mnu_link'),
				'mnu_icon'              => $this->input->post('mnu_icon'),
				'mnu_order'             => $this->input->post('mnu_order'),
				'mnu_status'            => $this->input->post('mnu_status'),
				'mnu_updt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
      $updated = $this->home_model->update('mnu_id',$mnu_id,$mnuData,'menu_master');
			if($updated)
			{
          $mnu_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($mnu_id);
  				$response  = array(
						'success' => True ,
						'message' => 'Menu  Updated successfully',
						'linkn' => base_url('menu-master-detail-'.$mnu_encrypt_id));
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

	public function sub_menu_insert()
  {

      $subMnuPrmData = array(
		  		'sbm_mnu_id'            => $this->input->post('sbm_mnu_id'),
          'sbm_parent_id'         => $this->input->post('sbm_parent_id'),
					'sbm_name'              => $this->input->post('sbm_name'),
					'sbm_link'              => $this->input->post('sbm_link'),
					'sbm_icon'              => $this->input->post('sbm_icon'),
					'sbm_order'             => $this->input->post('sbm_order'),
					'sbm_status'            => $this->input->post('sbm_status'),
          'sbm_crdt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
			$inserted_id = $this->home_model->insert('sub_menu_master',$subMnuPrmData);
			if($inserted_id)
			{
				  $sbm_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($inserted_id);
  				$response  = array(
						'success' => True ,
						'message' => 'Menu  Added successfully',
						'linkn'   => base_url('submenu-master-detail-'.$sbm_encrypt_id));
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

	public function sub_menu_update()
  {

      $sbm_id = $this->input->post('sbm_id');
			//$data['user_id'] = $this->session->userdata('mha_prs_id');
      $sbmData = array(
				'sbm_mnu_id'            => $this->input->post('sbm_mnu_id'),
				'sbm_parent_id'         => $this->input->post('sbm_parent_id'),
				'sbm_name'              => $this->input->post('sbm_name'),
				'sbm_link'              => $this->input->post('sbm_link'),
				'sbm_icon'              => $this->input->post('sbm_icon'),
				'sbm_order'             => $this->input->post('sbm_order'),
				'sbm_status'            => $this->input->post('sbm_status'),
				'sbm_updt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
      $updated = $this->home_model->update('sbm_id',$sbm_id,$sbmData,'sub_menu_master');
			if($updated)
			{
          $sbm_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($sbm_id);
  				$response  = array('success' => True ,
					'message' => 'Sub Menu  Updated successfully',
					'linkn' => base_url('submenu-master-detail-'.$sbm_encrypt_id));
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

}

?>
