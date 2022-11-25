<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(FCPATH.'/application/config/easynow_cli.php');
	ob_start();

	/* -------------------------------------------------- Init Easynow -------------------------------------------------- */

	initEasynow();

	/* -------------------------------------------------- Init Easynow End -------------------------------------------------- */

	/* -------------------------------------------------- Server Functions -------------------------------------------------- */

	function initEasynow()
	{
		global $setting, $sub_domain;

		$sub_domain = getSubdomain();
		$setting 	= loadClientSettings($sub_domain);

		setProjectVersion();
		setCRMVersion();
		setDatabaseEnvironment();
		setSessionUrlConstants();
		setDatabaseConstants();
		defineUserConstants();
	}

	function getSubdomain()
	{
		if($_SERVER['HTTP_HOST'] == 'localhost' || filter_var($_SERVER['HTTP_HOST'], FILTER_VALIDATE_IP ) || $_SERVER['HTTP_HOST'] == 'user-pc')
			//return 'nextasy_technologies';
			return 'easynow';
		else
		{
		    /*$subdir = array_values(array_filter(explode('/',$_SERVER['REQUEST_URI'])))[0];
		    if(isset($subdir))
		        return $subdir;
		    else*/
			    return explode('.',$_SERVER['HTTP_HOST'])[0];
		}
	}

	function setProjectVersion()
	{
		global $host, $website_link, $crm_link, $uri_array, $folder, $version, $sub_domain;

		$admin_panel 	= 'crm';

		$host 			= $_SERVER['HTTP_HOST'];
		$servername 	= $_SERVER['SERVER_NAME'];
		$root 			= $_SERVER['DOCUMENT_ROOT'];
		$uri 			= $_SERVER['SCRIPT_NAME'];

		$website_link 	= str_replace('/index.php', '', str_replace('/'.$admin_panel, '', 'http://'.$servername.$uri));
		$crm_link 		= str_replace('/index.php', '', str_replace('/'.$admin_panel, '', 'http://'.$servername.$uri).$admin_panel);

		$uri_array 		= explode('/', $uri);
		$folder 		=	$uri_array[1];
		$version 		=	$uri_array[2];
	}

	function setCRMVersion()
	{
		global $uri_array, $uri_array, $folder, $version, $crm_cookie, $crm_version;

		if(isset($uri_array[3]))
		{
			$crm_cookie 	= 	$folder.'/'.$version;
			$crm_version 	= 	$uri_array[3];
		}
	}

	function setDatabaseEnvironment()
	{
		global $setting, $host, $hostname, $username, $password, $database, $folder, $version, $crm_cookie, $crm_version;

		$db_name 		= $setting['scr_database'];
		$client_name 	= $setting['scr_domain'];
		
		if(ENVIRONMENT == 'development')
		{
			if($host == 'localhost'  || filter_var($host, FILTER_VALIDATE_IP) || $host == 'user-pc')
			{
				$hostname = 'localhost';
				$username = 'root';
				$password = '';
				$database = $db_name;
			}
			else
			{
				$hostname = 'localhost';
				$username = 'root';
				$password = '';
				$database = $db_name;
			}

			define('PROJECT_SESSION_COOKIE_NAME', 'ci_session_'.$version.'_'.$client_name);
			define('PROJECT_SESSION_COOKIE_PATH', '/'.$folder.($version ? '/'.$version.'/' : ''));
			define('PROJECT_CRM_SESSION_COOKIE_NAME', 'ci_session_'.$crm_version.'_'.$client_name);
			define('PROJECT_CRM_SESSION_COOKIE_PATH', '/'.$crm_cookie.($crm_version ? '/'.$crm_version.'/' : ''));
		}
		else if(ENVIRONMENT == 'production')
		{
			$hostname = 'localhost';
			$username = 'easyn7mj_surjeet';
			$password = 'Nexta@12#$';
			$database = $db_name;

			define('PROJECT_SESSION_COOKIE_NAME', 'ci_session_'.$client_name.'');
			define('PROJECT_SESSION_COOKIE_PATH', '/');
			define('PROJECT_CRM_SESSION_COOKIE_NAME', 'ci_session_'.$client_name.'_crm');
			define('PROJECT_CRM_SESSION_COOKIE_PATH', '/crm');
		}
	}

	function setSessionUrlConstants()
	{
		global $website_link, $crm_link;

		define('WEBSITE_LINK'	, $website_link);
		define('SITE_LINK'		, $website_link);
		define('CRM_LINK'		, $crm_link);
	}

	function setDatabaseConstants()
	{
		global $hostname, $username, $password, $database;

		define('HOSTNAME', $hostname);
		define('USERNAME', $username);
		define('PASSWORD', $password);
		define('DATABASE', $database);	
	}

	/* -------------------------------------------------- Server Functions Ends -------------------------------------------------- */

	function defineUserConstants()
	{
		/* -------------------------------------- Status Code -------------------------------------- */

		define('ACTIVE_STATUS', '1');
		define('IN_ACTIVE_STATUS', '2');
		define('INACTIVE_STATUS', '2');	
		define('DELETE_STATUS', '0');
		define('DISABLE_STATUS','2');
		define('ENABLE_STATUS','1');
		define('MENU_ACTIVE_STATUS', 'Y');
		define('MENU_INACTIVE_STATUS', 'N');

		/* ------------------ Status Code ------------------ */

		/* -------------------------------------- Project -------------------------------------- */

		define('TITLE_POSTFIX', 'Easy Now');
		define('PROJECT_TITLE', 'Easy Now');
		define('PROJECT_DESCRIPTION',' Developed By Easy Now Team');

		/* ------------------ Project ------------------ */

		/* -------------------------------------- Encryption -------------------------------------- */

		define('KEY', 'EASYNOW');
		define('CIPHER', 'AES-128-ECB');

		/* ------------------ Encryption ------------------ */

		/* -------------------------------------- Project Login -------------------------------------- */

		define('PEOPLE_SESSION_ID', 'easy_now_demo_ppl_id');
		define('PEOPLE_SESSION_NAME', 'easy_now_demo_ppl_name');
		define('PEOPLE_SESSION_USERNAME', 'easy_now_demo_ppl_username');
		define('PEOPLE_SESSION_STATUS', 'easy_now_demo_ppl_status');
		define('PEOPLE_SESSION_DEPT', 'easy_now_demo_ppl_dept');
		define('PEOPLE_COOKIE_USERNAME', 'easy_now_demo_cookie_ppl_username');
		define('PEOPLE_COOKIE_PASSWORD', 'easy_now_demo_cookie_ppl_password');
		define('TRANSACTION_LOGIN', 1);
		define('TRANSACTION_LOGOUT', 2);
		define('REMOTE_ADDR','remote_addr');

		/* ------------------ Project Login ------------------ */

		/* -------------------------------------- Email constants -------------------------------------- */

		define('EMAIL_PROTOCOL', 'smtp');
		define('EMAIL_HOST', 'mail.nexdemo.in');
		define('EMAIL_PORT', 587);
		define('EMAIL_USERNAME', 'nextest@nexdemo.in');
		define('EMAIL_PASSWORD', 'Nexta@12#$');
		define('EMAIL_TYPE', 'html');
		define('EMAIL_CHARSET', 'iso-8859-1');
		define('EMAIL_WORDWRAP', TRUE);
		define('PEOPLE_ADMIN_EMAIL','lancylotdsouza@gmail.com');
		define('EASYNOW_REPLY_TO_EMAIL','nextasytech@gmail.com');
		define('PROJECT_NAME_FOR_EMAIL','Easy Now');
		define('ADMIN_EMAIL','admin_email');
		define('REPLY_TO_EMAIL','email_reply_to');

		/* ------------------ Email constants ------------------ */

		/* -------------------------------------- Cache version -------------------------------------- */

		define('GLOBAL_CACHE_VERSION_DATE',"20180901");

		/* ------------------ Cache version ------------------ */

		/* -------------------------------------- Footer Bar -------------------------------------- */

		define('VIEW_TYPE_ADD', 'add');
		define('VIEW_TYPE_EDIT', 'edit');

		/* ------------------ Footer Bar ------------------ */

		/* -------------------------------------- Easynow Settings -------------------------------------- */

		define('DISPLAY_DATE_FORMAT', 'dS M, Y');

		/* ------------------ Easynow Settings ------------------ */
	}
