<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if($this->session->userdata(PEOPLE_SESSION_ID))
        //             redirect('dashboard', 'refresh');
        $this->load->model('gallery_set_model');
        $this->load->model('people_model');
    }

	public function index()
	{
        if($this->session->userdata(PEOPLE_SESSION_ID))
    		redirect('dashboard', 'refresh');
		$this->loginView();
	}

	public function loginView()
	{
		if(isset($_COOKIE[PEOPLE_COOKIE_USERNAME]) and isset($_COOKIE[PEOPLE_COOKIE_PASSWORD]))
		{
	    	redirect('dashboard','refresh');
		}
		else
		{
			$data['ref']= base_url().'dashboard';

			$data['title'] 		=	'People Dashboard';

			// ***** Breadcrum Data Starts here *******//
			$data['breadcrumb_data'][] = array('Login');
			$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
			// ***** Breadcrum Data Ends here *******//
			if(isset($_SERVER['HTTP_REFERER']))
			{
				$data['ref']= $_SERVER['HTTP_REFERER'];
			}
			else
			{
				$data['ref']= base_url().'dashboard';
			}

			$data['title'] = "Login";
			$data['global_version'] = global_asset_version();
			$data['ci_asset_versn']      = ci_asset_versn();
			$data['loginGallery'] = $this->gallery_set_model->getLoginGallery();
			$this->load->view('login_page',$data);
		}
	}

	public function checklogin()
	{
		$ref=$this->input->post('ref');
		$rememberme=$this->input->post('rememberme');

		if(isset($_COOKIE[PEOPLE_COOKIE_USERNAME]) and  isset($_COOKIE[PEOPLE_COOKIE_PASSWORD]))
		{
			$username = get_cookie(PEOPLE_COOKIE_USERNAME);
			$pwd   = get_cookie(PEOPLE_COOKIE_PASSWORD);

			$_POST['usr_username'] = $username;
			$_POST['usr_password'] = $pwd;

			$value='1';
		}
		else
		{
			$value='0';
		}

		$arrData = array();
		$arrData['usr_username']	=$this->input->post('usr_username');
		$pwd						=$this->input->post('usr_password');

		if($value=='0')
		{
			$encrypt=$this->nextasy_url_encrypt->encrypt_openssl($pwd);
		}

		elseif($value=='1')
		{
			$encrypt=$pwd;
		}

		$arrData['usr_password'] = $encrypt;
		//$user_data= $this->person_model->getpersonDataByID($arrData);
    // $arrData['usr_password']	= 	$this->input->post('usr_password');
    $department = ''.PEOPLE_LOGIN_DEPT_TEAM;
    
	if(isset($arrData['usr_username']) and !empty($arrData['usr_username']))
    {
    	$people_contact_check = 'select pct_ppl_id from people_contact where pct_value = "'.$arrData['usr_username'].'" and pct_active = 1 and pct_primary = 1 and pct_status = 1';
      switch ($arrData['usr_username']) {
        case is_numeric($arrData['usr_username']):
        		$condition =" (".$people_contact_check." and pct_type='".CONTACT_MOBILE."') and find_in_set('".PEOPLE_LOGIN_TYPE_MOBILE."',ppl_login_type)";
          break;
        case filter_var($arrData['usr_username'], FILTER_VALIDATE_EMAIL):
        		$condition =" (".$people_contact_check." and pct_type='".CONTACT_EMAIL."') and find_in_set('".PEOPLE_LOGIN_TYPE_EMAIL."',ppl_login_type)  ";
               
          break;
        default:
        		$condition =' ppl_username = "'.$arrData['usr_username'].'" ';
                
          break;
      }
      $sqlQuery = 'select *, ifnull((select emp_dept from employee where emp_ppl_id = ppl_id ),0) ppl_dept_id from people where '.$condition.' and ppl_password = "'.$arrData['usr_password'].'"and ppl_login_dept IN ('.$department.') and ppl_status = "'.ACTIVE_STATUS.'" ';
      $user_data = $this->home_model->executeSqlQuery($sqlQuery,'row');
    }


		//////// TESTING END

		if(isset($user_data) && $user_data != ''){
						//Start of Condition to set the coookie in the client browser

			if(!isset($_COOKIE[PEOPLE_COOKIE_USERNAME]) and !isset($_COOKIE[PEOPLE_COOKIE_PASSWORD]))
			{
				if($rememberme == 1)
				{
					set_cookie(PEOPLE_COOKIE_USERNAME, $user_data->ppl_username, 3600*24*30*12*10);
					set_cookie(PEOPLE_COOKIE_PASSWORD, $user_data->ppl_password , 3600*24*30*12*10 );
				}
			}

			$newdata = array(
			    PEOPLE_SESSION_ID 		  	=> $user_data->ppl_id,
  				PEOPLE_SESSION_NAME 	  	=> $user_data->ppl_name,
  				PEOPLE_SESSION_USERNAME 	=> $user_data->ppl_username,
  				PEOPLE_SESSION_STATUS  		=> $user_data->ppl_status,
  				PEOPLE_SESSION_DEPT		  		=> $user_data->ppl_dept_id,
			);

			$this->session->set_userdata($newdata);

			$_SESSION['current_tags'] = '';

			$pos = strrpos($ref, '/');
			$last = $pos === false ? $ref : substr($ref, $pos + 1);

			if($last==base_url() || $last=='logout')
			{
				$ref=base_url().'dashboard';
			}

			if(isset($_COOKIE[PEOPLE_COOKIE_USERNAME]) and  isset($_COOKIE[PEOPLE_COOKIE_PASSWORD]))
			{
        // loginTransaction($this->session->userdata(PEOPLE_SESSION_ID),TRANSACTION_LOGIN);
				echo json_encode(array("success"=>true,"message"=>'Login Sucess' ,'linkn'=>$ref));
        exit;
			}
			else
			{
        // loginTransaction($this->session->userdata(PEOPLE_SESSION_ID),TRANSACTION_LOGIN);
				echo json_encode(array("success"=>true,"message"=>'Login Sucess' ,'linkn'=>$ref));
        exit;
			}
		}
		else
		{
			if(isset($_COOKIE[PEOPLE_COOKIE_USERNAME]) and  isset($_COOKIE[PEOPLE_COOKIE_PASSWORD]))
			{
				return false;
			}
			else
			{
				echo json_encode(array('success'=>false,'message'=>'Username or Password does not Match.'));
        exit;
			}
		}
	}

	public function logout()
	{
    //loginTransaction($this->session->userdata(PEOPLE_SESSION_ID),TRANSACTION_LOGOUT);
		$newdata = array(
		    PEOPLE_SESSION_ID 		  => '',
  			PEOPLE_SESSION_NAME 	  => '',
  			PEOPLE_SESSION_USERNAME => '',
  			PEOPLE_SESSION_STATUS  	=> '',
  			PEOPLE_SESSION_DEPT		  	=> ''
		);
		$this->session->unset_userdata($newdata);

		$this->session->sess_destroy();

		//unset cookie on 'logout controller'

		delete_cookie(PEOPLE_COOKIE_USERNAME);
		delete_cookie(PEOPLE_COOKIE_PASSWORD);

	    redirect('','refresh');
	}

  public function forgotPasswordReset()
	{
		 $data['email'] = $this->input->post('ppl_email');
		 $people_data = $this->home_model->getUserdataForLogin($data);
     // $people_data->email = $data['email'];
		 // print_r($people_data);
     // exit;
		 $fpt_data = array();
		 $fpt_data['fpt_ppl_id']  = $people_data->ppl_id;
		 $fpt_data['fpt_code']    = $this->home_model->generateRandomStringNum(4);
		 $fpt_data['fpt_status']  = FPT_ACTIVE;
		 $fpt_data['fpt_crtd_dt'] = date('Y-m-d H:i:s');
		 $fpt_id = $this->home_model->insert('forgot_password_transaction',$fpt_data);

		 if($fpt_id != '-1')
		 {
		 	$data = $people_data->ppl_id.'-'.$fpt_data['fpt_code'];
		  // $link = get_link('website_link').$this->crm_auth->encrypt_openssl($data);
		  $people_data->link    = base_url('people-reset-password-').$this->nextasy_url_encrypt->encrypt_openssl($data);
      $isSend  = $this->people_model->sendMailForPasswordReset($people_data);
      if($isSend)
      {
        $response = array('success'=>true,'message'=>'Password reset Link has been sent to your email','linkn'=>base_url());
        echo json_encode($response);
      }
		  // $this->communication_model->communication(EUS_TYPE_FORGOT_PASSWORD,$customer_data['led_email_id'],$customer_data['led_name'],$link);

		 }

	}
	public function people_reset_password($pswd_parameter = '',$type = '')
	{
    $data['title'] 		=	'Reset Password';
    // ***** Breadcrumb Data Starts here *******//
    $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
    $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
    $data['breadcrumb_data'][] = array('List',base_url('people-list'));
    $data['breadcrumb_data'][] = array('Reset Password');
    $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
    // ***** Breadcrumb Data Ends here *******//
    // $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($pplencryptedId);
    // $data['people'] = $this->people_model->getPeopledataById($ppl_id);
    $data['cacheVersion'] = global_asset_version();
		if($pswd_parameter != '')
		{
			$data['check'] = '1';
			$data['msg'] = 'Oops !! Sorry No Password Reset Request found';
			$pswd_parameter =$this->nextasy_url_encrypt->decrypt_openssl($pswd_parameter);
			if($pswd_parameter != '')
			{
				$pswd_data = explode('-',$pswd_parameter);

				$fpt_ppl_id = $pswd_data[0];
				$fpt_code = $pswd_data[1];
				$fpt_data = $this->people_model->getForgotpswdTransaction($fpt_ppl_id,$fpt_code);
				if(!empty($fpt_data))
				{
			    $data['check'] = '1';
				  $data['msg'] = 'Link active';
				  $data['ppl_id'] = $fpt_ppl_id;
				}
				else
				{
		      $data['check'] = '0';
				  $data['msg'] = 'Oops !! Sorry your link has expired';
				  $data['ppl_id'] = '';
				}
        if(empty($fpt_code))
        {
          $data['check'] = '1';
          $data['ppl_id'] = $fpt_ppl_id;
          
        }

			}
		}else
		{
			$data['check'] = '0';
			$data['msg'] = 'Oops !! Sorry No Password Reset Request found';
			$data['ppl_id'] = '';
		}
		$this->load->view('people/people_reset_password',$data);
	}

  public function reset_password()
  {
    $ppl_id       = $this->input->post('ppl_id');
    $ppl_password = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('ppl_pass'));
    $resetData    = array(
      'ppl_id'       => $ppl_id,
      'ppl_password' => $ppl_password,
    );
    $isReset      = $this->home_model->update_data('people',$resetData,'ppl_id');
    if($isReset)
    {
      $success = true;
      $message = 'Password reset successfully';
      $linkn    = base_url('people-details-'.$this->nextasy_url_encrypt->encrypt_openssl($ppl_id));
    }
    else
    {
      $success = false;
      $message = 'Oops !! Some error occured';
      $linkn   = '';
    }
    echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
  }

  public function peopleContactValidation($type,$id='')
  {
    $pct_value = $this->input->post('ppl_email');
    switch ($type) {
      case 'mobile':
         $pct_type = CONTACT_MOBILE;
        break;
      case 'email':
         $pct_type = CONTACT_EMAIL;
        break;

      default:
         $pct_type = '';
        break;
    }
    $validate =  $this->people_model->checkPeopleContact($pct_type,$pct_value,$id);
    // print_r($validate);
    if($validate->count > 0)
    {
       echo 'true';
    }
    else
    {
       echo 'false';
    }
  }

  // public function people_reset_password($pplencryptedId = '')
  // {
  //   $data['title'] 		=	'Reset Password';
  //
  //   // ***** Breadcrumb Data Starts here *******//
  //   $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
  //   $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
  //   $data['breadcrumb_data'][] = array('List',base_url('people-list'));
  //   $data['breadcrumb_data'][] = array('Reset Password');
  //   $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
  //   // ***** Breadcrumb Data Ends here *******//
  //   $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($pplencryptedId);
  //   // $data['people'] = $this->people_model->getPeopledataById($ppl_id);
  //   $data['cacheVersion'] = global_asset_version();
  //   $this->load->view('people/people_reset_password', $data);
  // }

  function crypt($x, $y)
  {
  	if($x == 'enc')
  		echo $this->nextasy_url_encrypt->encrypt_openssl($y);
  	else if($x == 'dec')
  		echo $this->nextasy_url_encrypt->encrypt_openssl($y);
  }


  	public function customer_login()
	{
	    $data['title']      =   'Login';
	    // ***** Breadcrumb Data Ends here *******//
	    // $data['global_asset_version'] = global_asset_version();
	    $data['global_asset_version'] = global_asset_version();
	    $this->load->view('customer-login', $data);
	}

}

?>
