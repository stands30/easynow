<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
        $this->mnu_name = 'Target-list';
	}

	public function target_list()
	{
		$data['title'] 		         =	'Target List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
	    if (checkaccess($this->mnu_name, 'list'))
	    {
	        $data['ci_asset_version']          	  = ci_asset_versn();
	        $data['global_asset_version']      	  = global_asset_version();
	        $data = array_merge($data, checkaccess($this->mnu_name));
	        $this->load->view('target/target-list', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
	}

	public function target_add()
	{
		$data['title'] 		=	'Target Add';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('target-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//

	    if (checkaccess($this->mnu_name, 'add')) {
	      $data['ci_asset_version']          = ci_asset_versn();
	      $data['global_asset_version']    = global_asset_version();
	      $data = array_merge($data, checkaccess($this->mnu_name));
	      $this->load->view('target/target-add', $data);
	    }
	    else
	        $this->load->view('errors/easynow_404', $data);
	}


	public function target_details()
	{
		$data['title'] 		=	'Target Detail';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('target-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
	    if (checkaccess($this->mnu_name, 'detail'))
	    {
	        
    		$data['ci_asset_version']        = ci_asset_versn();
    		$data['global_asset_version']    = global_asset_version();
    		$this->load->view('target/target-details', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
	}

	public function target_detail($tgt_encrypted_id = '')
	{
		$data['title'] 		=	'Target Detail';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('target-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
	    if (checkaccess($this->mnu_name, 'detail'))
	    {
	        
    		$data['ci_asset_version']        = ci_asset_versn();
    		$data['global_asset_version']    = global_asset_version();
    		$this->load->view('target/target-details', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
	}


	public function target_edit($tgt_encrypted_id = '')
	{

		$data['title'] 		=	'Target Edit';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Target', base_url('target-list'));
		$data['breadcrumb_data'][] = array('List',base_url('target-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn']       = ci_asset_versn();
		$tgt_id                = $this->nextasy_url_encrypt->decrypt_openssl($tgt_encrypted_id);
		$data['targetEdit']    = $this->target_model->getTargetForEdit($tgt_id);
		$data['target_type1']  = json_encode($this->target_model->getTargetType($data['targetEdit']->tgt_id,TARGET_TYPE_USER));
		$data['target_type2']  = json_encode($this->target_model->getTargetType($data['targetEdit']->tgt_id,TARGET_TYPE_STAGE));
		$data['target_type3']  = json_encode($this->target_model->getTargetType($data['targetEdit']->tgt_id,TARGET_TYPE_PRODUCT));
		$data['target_type4']  = json_encode($this->target_model->getTargetType($data['targetEdit']->tgt_id,TARGET_TYPE_SOURCE));
		$this->load->view('target/target-edit', $data);

	}

	public function getTargetDropdowns($type='')
	{
		$search      = $this->input->get('q');
		$targetData = array('results'=>$this->target_model->getGenPrmforDropdown($type,$search));
		echo json_encode($targetData);
	}

	public function getDurabilityDropdown()
	{
		$search      = $this->input->get('q');
		$type        = 'durability';
		$targetData = array('results'=>$this->target_model->getGenPrmforDropdown($type,$search));
		echo json_encode($targetData);
	}

	public function getTargetDataTableList()
    {
    	$targetList = $this->target_model->getTargetForList();
    	// ******** Encrypt Data from multidimensional array ******//
    	if(!empty($targetList))
    	{
	    	function encryptData(&$item,$key)
	    	{
	    	  $CI = &get_instance();
			   if($key=='tgt_encrypt_id'){
			        $item = $CI->nextasy_url_encrypt->encrypt_openssl($item); // Do This!
			   }

			}
			array_walk_recursive($targetList,'encryptData');
    	}
    	// ******** Encrypt Data from multidimensional array ******//
		$targetListData['data'] = $targetList;
		echo json_encode($targetListData);
    }

	public function insertTarget()
	{
		$sbt_id1  = -1;
		$sbt_id2  = -1;
		$sbt_id3  = -1;
		$sbt_id4  = -1;

		$target_type1 = json_decode($this->input->post('target_type1'));
		$target_type2 = json_decode($this->input->post('target_type2'));
		$target_type3 = json_decode($this->input->post('target_type3'));
		$target_type4 = json_decode($this->input->post('target_type4'));

		$targetData   = array(
			'tgt_title'       => $this->input->post('tgt_title'),
			'tgt_durability'  => $this->input->post('tgt_durability'),
			'tgt_from_dt'     => mysqldate($this->input->post('tgt_from_dt')),
			'tgt_to_dt'    	  => mysqldate($this->input->post('tgt_to_dt')),
			'tgt_qty'         => $this->input->post('tgt_qty'),
			'tgt_volume'      => $this->input->post('tgt_volume'),
			'tgt_crdt_by'     => $this->session->userdata(PEOPLE_SESSION_ID),
			'tgt_crdt_dt'     => date("Y-m-d H-i-s"),
			'tgt_status'      => '1',
	    );

		$tgt_id = $this->home_model->insert('target',$targetData);

		if(isset($target_type1) and !empty($target_type1) and $tgt_id > 0)
		{
			foreach ($target_type1 as $t1key)
      		{
		        $target1Data = array(
					'sbt_tgt_id'     => $tgt_id,
					'sbt_title'      => $t1key->sbt_title,
					'sbt_type'       => TARGET_TYPE_USER,
					'sbt_type_id'    => $t1key->sbt_type_id,
					'sbt_durability' => $t1key->sbt_durability,
					'sbt_from_dt'    => mysqldate($t1key->sbt_from_dt),
					'sbt_to_dt'      => mysqldate($t1key->sbt_to_dt),
					'sbt_qty'        => $t1key->sbt_qty,
					'sbt_volume'     => $t1key->sbt_volume,
					'sbt_crdt_by'    => $this->session->userdata(PEOPLE_SESSION_ID),
					'sbt_status'     => '1',
					'sbt_crdt_dt'    => date("Y-m-d H-i-s"),
				);
				$sbt_id1 = $this->home_model->insert('sub_target', $target1Data);
			}
		}
		if(isset($target_type2) and !empty($target_type2) and $tgt_id > 0)
		{
			foreach ($target_type2 as $t2key)
      {
        $target2Data = array(
					'sbt_tgt_id'     => $tgt_id,
          'sbt_title'      => $t2key->sbt_title,
          'sbt_type'       => TARGET_TYPE_STAGE,
          'sbt_type_id'    => $t2key->sbt_type_id,
          'sbt_durability' => $t2key->sbt_durability,
					'sbt_qty'        => $t2key->sbt_qty,
          'sbt_volume'     => $t2key->sbt_volume,
					'sbt_from_dt'    => mysqldate($t1key->sbt_from_dt),
					'sbt_to_dt'      => mysqldate($t1key->sbt_to_dt),
          'sbt_crdt_by'    => $this->session->userdata(PEOPLE_SESSION_ID),
					'sbt_status'     => '1',
          'sbt_crdt_dt'    => date("Y-m-d H-i-s"),
        );
        $sbt_id2 = $this->home_model->insert('sub_target', $target2Data);
      }
		}
		if(isset($target_type3) and !empty($target_type3) and $tgt_id > 0)
		{
			foreach ($target_type3 as $t3key)
      {
	        $target3Data = array(
						'sbt_tgt_id'     => $tgt_id,
	          'sbt_title'      => $t3key->sbt_title,
	          'sbt_type'       => TARGET_TYPE_PRODUCT,
	          'sbt_type_id'    => $t3key->sbt_type_id,
	          'sbt_durability' => $t3key->sbt_durability,
						'sbt_qty'        => $t3key->sbt_qty,
	          'sbt_volume'     => $t3key->sbt_volume,
						'sbt_from_dt'    => mysqldate($t1key->sbt_from_dt),
						'sbt_to_dt'      => mysqldate($t1key->sbt_to_dt),
	          'sbt_crdt_by'    => $this->session->userdata(PEOPLE_SESSION_ID),
						'sbt_status'     => '1',
	          'sbt_crdt_dt'    => date("Y-m-d H-i-s"),
	        );
        $sbt_id3 = $this->home_model->insert('sub_target', $target3Data);
      }
		}
		if(isset($target_type4) and !empty($target_type4) and $tgt_id > 0)
		{
			foreach ($target_type4 as $t4key)
      {
        $target4Data = array(
					'sbt_tgt_id'     => $tgt_id,
          'sbt_title'      => $t4key->sbt_title,
          'sbt_type'       => TARGET_TYPE_SOURCE,
          'sbt_type_id'    => $t4key->sbt_type_id,
          'sbt_durability' => $t4key->sbt_durability,
					'sbt_qty'        => $t4key->sbt_qty,
          'sbt_volume'     => $t4key->sbt_volume,
					'sbt_from_dt'    => mysqldate($t1key->sbt_from_dt),
					'sbt_to_dt'      => mysqldate($t1key->sbt_to_dt),
          'sbt_crdt_by'    => $this->session->userdata(PEOPLE_SESSION_ID),
					'sbt_status'     => '1',
          'sbt_crdt_dt'    => date("Y-m-d H-i-s"),
        );
        $sbt_id4 = $this->home_model->insert('sub_target', $target4Data);
      }
		}

			if($sbt_id4 > -1 or $sbt_id3 > -1 or $sbt_id2 > -1 or $sbt_id1 > -1 or $tgt_id > -1)
			{
  				$response  = array('success' => True , 'message' => 'target Added successfully','linkn' => base_url('target-detail-'.$this->nextasy_url_encrypt->encrypt_openssl($tgt_id)));
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

	public function updateTarget()
	{

		$i = 0;
		$sbt_ids_type  = array();

		$tgt_id         = $this->input->post('tgt_id');
		$target_type1 = json_decode($this->input->post('target_type1'));
		$target_type2 = json_decode($this->input->post('target_type2'));
		$target_type3 = json_decode($this->input->post('target_type3'));
		$target_type4 = json_decode($this->input->post('target_type4'));

		$targetData  = array(
			'tgt_title'       => $this->input->post('tgt_title'),
			'tgt_durability'  => $this->input->post('tgt_durability'),
			'tgt_qty'         => $this->input->post('tgt_qty'),
			'tgt_volume'      => $this->input->post('tgt_volume'),
			'tgt_from_dt'     => mysqldate($this->input->post('tgt_from_dt')),
			'tgt_to_dt'    	  => mysqldate($this->input->post('tgt_to_dt')),
			'tgt_updt_by'     => $this->session->userdata(PEOPLE_SESSION_ID),
			'tgt_status'      => '1',
	    );

		$updated = $this->home_model->update('tgt_id',$tgt_id,$targetData,'target');

		if(isset($target_type1) && !empty($target_type1) && $updated)
		{

			foreach ($target_type1 as $t1key)
       		{
				$target1Data = array(
				'sbt_tgt_id'     => $tgt_id,
				'sbt_title'      => $t1key->sbt_title,
				'sbt_type'       => TARGET_TYPE_USER,
				'sbt_type_id'    => $t1key->sbt_type_id,
				'sbt_durability' => $t1key->sbt_durability,
				'sbt_qty'        => $t1key->sbt_qty,
				'sbt_volume'     => $t1key->sbt_volume,
				'sbt_from_dt'    => mysqldate($t1key->sbt_from_dt),
				'sbt_to_dt'      => mysqldate($t1key->sbt_to_dt),
				'sbt_crdt_by'    => $this->session->userdata(PEOPLE_SESSION_ID),
				'sbt_status'     => '1',
				'sbt_crdt_dt'    => date("Y-m-d H-i-s"),
        	);
				if(empty($t1key->sbt_id))
				{
	        $sbt_ids_type[$i] = $this->home_model->insert('sub_target', $target1Data);
					$i++;
				}
				else
				{
					$updated = $this->home_model->update('sbt_id',$t1key->sbt_id,$target1Data,'sub_target');
					$sbt_ids_type[$i] = $t1key->sbt_id;
					$i++;
				}
      }
			// $checkDelProd1 = $this->target_model->deleteTargetProduct($sbt_ids_type,$est_id);
		}

		if(isset($target_type2) && !empty($target_type2) && $updated)
		{

			foreach ($target_type2 as $t2key)
      {
				$target2Data = array(
					'sbt_tgt_id'     => $tgt_id,
					'sbt_title'      => $t2key->sbt_title,
					'sbt_type'       => TARGET_TYPE_STAGE,
					'sbt_type_id'    => $t2key->sbt_type_id,
					'sbt_durability' => $t2key->sbt_durability,
					'sbt_qty'        => $t2key->sbt_qty,
					'sbt_volume'     => $t2key->sbt_volume,
					'sbt_from_dt'    => mysqldate($t1key->sbt_from_dt),
					'sbt_to_dt'      => mysqldate($t1key->sbt_to_dt),
					'sbt_crdt_by'    => $this->session->userdata(PEOPLE_SESSION_ID),
					'sbt_status'     => '1',
					'sbt_crdt_dt'    => date("Y-m-d H-i-s"),
				);
				if(empty($t2key->sbt_id))
				{
	        $sbt_ids_type[$i] = $this->home_model->insert('sub_target', $target2Data);
					$i++;
				}
				else
				{
					$updated = $this->home_model->update('sbt_id',$t2key->sbt_id,$target2Data,'sub_target');
					$sbt_ids_type[$i] = $t2key->sbt_id;
					$i++;
				}
      }
			// $checkDelProd2 = $this->target_model->deleteTargetProduct($sbt_ids_type,$est_id);
		}

		if(isset($target_type3) && !empty($target_type3) && $updated)
		{

			foreach ($target_type3 as $t3key)
      {
				$target3Data = array(
					'sbt_tgt_id'     => $tgt_id,
          'sbt_title'      => $t3key->sbt_title,
          'sbt_type'       => TARGET_TYPE_PRODUCT,
          'sbt_type_id'    => $t3key->sbt_type_id,
          'sbt_durability' => $t3key->sbt_durability,
					'sbt_qty'        => $t3key->sbt_qty,
          'sbt_volume'     => $t3key->sbt_volume,
					'sbt_from_dt'    => mysqldate($t1key->sbt_from_dt),
					'sbt_to_dt'      => mysqldate($t1key->sbt_to_dt),
          'sbt_crdt_by'    => $this->session->userdata(PEOPLE_SESSION_ID),
					'sbt_status'     => '1',
          'sbt_crdt_dt'    => date("Y-m-d H-i-s"),
        );
				if(empty($t3key->sbt_id))
				{
	        $sbt_ids_type[$i] = $this->home_model->insert('sub_target', $target3Data);
					$i++;
				}
				else
				{
					$updated = $this->home_model->update('sbt_id',$t3key->sbt_id,$target3Data,'sub_target');
					$sbt_ids_type[$i] = $t3key->sbt_id;
					$i++;
				}
      }
			// $checkDelProd3 = $this->target_model->deleteTargetProduct($sbt_ids_type,$est_id);
		}

		if(isset($target_type4) && !empty($target_type4) && $updated)
		{

			foreach ($target_type4 as $t4key)
      {
				$target4Data = array(
					'sbt_tgt_id'     => $tgt_id,
          'sbt_title'      => $t4key->sbt_title,
          'sbt_type'       => TARGET_TYPE_SOURCE,
          'sbt_type_id'    => $t4key->sbt_type_id,
          'sbt_durability' => $t4key->sbt_durability,
					'sbt_qty'        => $t4key->sbt_qty,
          'sbt_volume'     => $t4key->sbt_volume,
					'sbt_from_dt'    => mysqldate($t1key->sbt_from_dt),
					'sbt_to_dt'      => mysqldate($t1key->sbt_to_dt),
          'sbt_crdt_by'    => $this->session->userdata(PEOPLE_SESSION_ID),
					'sbt_status'     => '1',
          'sbt_crdt_dt'    => date("Y-m-d H-i-s"),
        );
				if(empty($t4key->sbt_id))
				{
	        $sbt_ids_type[$i] = $this->home_model->insert('sub_target', $target4Data);
					$i++;
				}
				else
				{
					$updated = $this->home_model->update('sbt_id',$t4key->sbt_id,$target4Data,'sub_target');
					$sbt_ids_type[$i] = $t4key->sbt_id;
					$i++;
				}
      }
			// $checkDelProd4 = $this->target_model->deleteTargetProduct($sbt_ids_type,$est_id);
		}

			// print_r($sbt_ids_type);
			// exit;

		$checkDelProd = $this->target_model->deleteTargetProduct($sbt_ids_type,$tgt_id);


			if($updated)
			{
  				$response  = array('success' => True , 'message' => 'target updated  successfully','linkn' => base_url('target-detail-'.$this->nextasy_url_encrypt->encrypt_openssl($tgt_id)));
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


	 public function Target_dashboard()

	{
		$data['title'] 		=	'Target Dashboard';

		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Target');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		/*$data['dashboard_detail']  = $this->target_model->dashboard_detail();*/
		// ***** Breadcrumb Data Ends here *******//
		// $data['global_asset_version'] = global_asset_version();
		/*$data['global_asset_version'] = global_asset_version();*/
		$this->load->view('target/target-dashboard', $data);
	}



}

?>
