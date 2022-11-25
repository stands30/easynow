<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GallerySet extends CI_Controller
{
  function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('gallery_set_model');
        $this->sbm_mnu_name = 'gallery-set-list';
        check_logged();
    }

    public function gallery_set_list()
	{
		$data['title'] 		=	'Gallery Set List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('list');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrum Data Ends here *******//
    if (checkaccess($this->sbm_mnu_name, 'list'))
    {
        $data['global_asset_version']      = global_asset_version();
        $data['ci_asset_versn']    = ci_asset_versn();
        $data['dataTableData']       = $this->gallery_set_model->getGalleryForList(TABLE_COUNT);
        $data                         = array_merge($data, checkaccess($this->sbm_mnu_name));
        $this->load->view('gallery-set/gallery-set-list', $data);
    }
    else $this->load->view('errors/easynow_404', $data);



	}



	public function gallery_set_add()
	{
		$data['title'] 		=	'Gallery Set Add';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('gallery-set-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrum Data Ends here *******//
    if (checkaccess($this->sbm_mnu_name, 'add')) {
      $data['global_asset_version']      = global_asset_version();
      $data['ci_asset_versn']    = ci_asset_versn();
      $data = array_merge($data, checkaccess($this->sbm_mnu_name));
      $this->load->view('gallery-set/gallery-set-add', $data);
    }
    else
        $this->load->view('errors/easynow_404', $data);

	}


  public function gallery_set_edit($slug='')
	{
		$data['title'] 		=	'Gallery Set Edit';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('gallery-set-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrum Data Ends here *******//

    if (checkaccess($this->sbm_mnu_name, 'edit')) {
        $gls_id              = $this->nextasy_url_encrypt->decrypt_openssl($slug);
        $data['galleryEdit'] = $this->gallery_set_model->getGalleryForEdit($gls_id);
        $data['global_asset_version']      = global_asset_version();
        $data['ci_asset_versn']    = ci_asset_versn();
        $data = array_merge($data, checkaccess($this->sbm_mnu_name));
        $this->load->view('gallery-set/gallery-set-edit', $data);
    }
    else $this->load->view('errors/easynow_404', $data);

	}



  public function gallery_set_insert()
  {
    $data['img_name']  = '';


		$this->form_validation->set_rules('gls_name', 'Gallery Name', 'required');

		if($this->form_validation->run() == TRUE)
		{

			if(isset($_FILES['img']['name'])) //profile image upload
			{
        $sourcePath = $_FILES['img']['tmp_name']; // Storing source path of the file in a variable
        $data['img_name']       = $_FILES['img']['name'];
        $targetPath = GALLERY_SET_IMAGE_PATH.$data['img_name']; // Target path where file is to be stored
        $check = move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				if(!$check)
				{
            $response  = array('success' => false , 'message' => '1');
            echo json_encode($response);
            exit();
				}
			}
			//$data['user_id'] = $this->session->userdata('mha_prs_id');
      $galleryData = array(

		  		'gls_type'              => $this->input->post('gls_type'),
		  		'gls_name'              => $this->input->post('gls_name'),
		  		'gls_order_by'          => $this->input->post('gls_order_by'),
		  		'gls_status'            => ACTIVE_STATUS,
		  		'gls_crdt_dt'           => date("Y-m-d"),
		  		'gls_image'             => $data['img_name'],
	  		);
			$inserted_id = $this->home_model->insert('gallery_set',$galleryData);
			if($inserted_id)
			{
  				$response  = array('success' => True , 'message' => 'Gallery Set Added successfully','linkn' => base_url('gallery-set-list'));
    	    echo json_encode($response);
    	    exit();
			}

		}
		else
		{
			$response  = array('success' => false , 'message' => '2');
        	    echo json_encode($response);
        	    exit();
		}
  }

  public function gallery_set_update()
	{
		$gls_id = $this->input->post('gls_id');


    if(isset($_FILES['img']['name']))
		{

      $deleteOldImage = GALLERY_SET_IMAGE_PATH.$this->input->post('old_img');
      if($this->input->post('old_img') != '')
      {
        if (file_exists($deleteOldImage))
        {
           $data['imgname']=unlink($deleteOldImage);
        }
      }
      else
      {
        $data['imgname']= '';
      }
      $sourcePath = $_FILES['img']['tmp_name']; // Storing source path of the file in a variable
      $data['imgname']    = $_FILES['img']["name"];
      $targetPath = GALLERY_SET_IMAGE_PATH.$data['imgname']; // Target path where file is to be stored
      move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
		}
		else
		{
			$data['imgname'] = $this->input->post('old_img');
		}

    $galleryData = array(

        'gls_type'              => $this->input->post('gls_type'),
        'gls_name'              => $this->input->post('gls_name'),
        'gls_order_by'          => $this->input->post('gls_order_by'),
        'gls_status'            => ACTIVE_STATUS,
        'gls_image'             => $data['imgname'],
      );
    $updated = $this->home_model->update('gls_id',$gls_id,$galleryData,'gallery_set');
    // echo $updated;
    // exit;
    if($updated)
		{
			$response  = array('success' => True , 'message' => 'Gallery Set Updated successfully', 'linkn' => base_url('gallery-set-list'));
        	    echo json_encode($response);
        	    exit();
		}
		else
		{
			$response  = array('success' => false , 'message' => 'Something went wrong');
        	    echo json_encode($response);
        	    exit();
		}


	}

  public function getGalleryDropdown()
	{
		$search      = $this->input->get('q');
		$GalleryData = array('results'=>$this->gallery_set_model->getGenPrmforDropdown('gallery_type'));
		echo json_encode($GalleryData);
	}

  public function deleteGallery()
  {
    $gls_id    = $this->input->post('gls_id');
    $img_name  = $this->home_model->getImageName($gls_id,'gallery_set');
    $del_image = GALLERY_SET_IMAGE_PATH.$img_name->gls_image;
    $del_image = UnlinkFile($del_image);
    $check = $this->gallery_set_model->galleryDelete($gls_id);
    if($check and $del_image)
    {
      $response = array('success' => True, 'message'=>'Gallery Set Removed successfully', 'linkn'=>base_url('gallery-set-list'));
      echo json_encode($response);
    }
  }


    public function getGallerytDataTableList()
    {
      $dataOptn = $this->input->get();
      $dataTableData = $this->gallery_set_model->getGalleryForList(TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['gls_id']    = 'gls_encrypt_id';
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

}

?>
