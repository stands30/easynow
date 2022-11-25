<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailPreview extends CI_Controller
{

	
	public function email_preview()
	{
		$data['title'] 		=	'Email Preview';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Preview');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('email/email-preview/email-preview', $data);
		
	}

	public function email_sent()
	{
		$data['title'] 		=	'Email Sent';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Sent');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('email/email-preview/email-sent', $data);
		
	}

	public function email_compose()
	{
		$data['title'] 		=	'Email Compose';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Compose');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('email/email-preview/email-compose', $data);
		
	}

	public function email_draft()
	{
		$data['title'] 		=	'Email Draft';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Draft');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('email/email-preview/email-draft', $data);
		
	}



}

?>
