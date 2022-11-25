<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autodeployment extends CI_Controller
{
	private $path;
    private	$base_database 	= AD_BASE_DATABASE;
    private $client_data 	= array();

	public function __construct()
    {
        parent::__construct();
        $this->load->model('autodeployment_model');
    }

    function createClient()
    {
    	$data = $this->input->post();

        $this->client_data = array(
            AD_CLIENT_PPL_ID      	=> $data['cli_ppl_id'],
            AD_CLIENT_CMP_ID      	=> $data['cli_cmp_id'],
            AD_CLIENT_NAME      	=> $data['cli_name'],
            AD_CLIENT_EMAIL     	=> $data['cli_email'],
            AD_CLIENT_MOBILE    	=> $data['cli_mobile'],
            AD_CLIENT_COMPANY   	=> $data['cli_company'],
            AD_CLIENT_DOMAIN    	=> $data['cli_domain'],

			AD_CLIENT_PASSWORD 		=> isset($data['cli_password']) ? $data['cli_password'] : AD_DEFAULT_PASSWORD,
			AD_CLIENT_INDUSTRY 		=> isset($data['cli_industry']) ? $data['cli_industry'] : AD_DEFAULT_INDUSTRY,
			AD_CLIENT_CURRENCY 		=> isset($data['cli_billing_currency']) ? $data['cli_billing_currency'] : AD_DEFAULT_BILLING_COMPANY,
			AD_CLIENT_PEOPLE_COUNT 	=> isset($data['cli_people_count']) ? $data['cli_people_count'] : AD_DEFAULT_PEOPLE_COUNT
        );

    	echo $this->createDomainFolders($this->client_data[AD_CLIENT_DOMAIN]);
    }

    //************************************************************************************************************************//


    // Create File Structure - START 

    function createDomainFolders($domain_name = '')
	{
		$database = $this->autodeployment_model->checkDatabaseExist($domain_name);

		if(isset($database))
		{
			echo 'Database already Exist';
			return;
		}

		if(!$domain_name)
			return;

		$client_modules_dir = FCPATH.'client_modules';
		$domain_path = $client_modules_dir.'/'.$domain_name;

    	if (!file_exists($domain_path))
    	{
		    mkdir($domain_path, 0777, true);
		    $this->createFolders($domain_name, $domain_path);
		    echo true;
		}
		else
		    echo 'Folder already exist';
    }

    function createFolders($domain_name, $domain_path)
    {
    	$all_paths = array();

	    $folders = $this->db->query("SELECT fls_id, fls_name FROM xfilestructure order by fls_id asc")->result();

	    foreach ($folders as $folder)
			$this->getFolder($folder->fls_id);

	    $path_arr = explode('|', $this->path);

	    foreach ($path_arr as $path_arr_key)
	    {
	    	$path = $domain_path.'/'.implode('/', array_reverse(explode('/', $path_arr_key)));

	    	if (!file_exists($path))
		    	mkdir($path);
	    }

	    $this->getBaseTables($domain_name);
    }

    function getFolder($fls_parent_id = '')
    {
		$folders = $this->db->query("SELECT fls_id, fls_name, fls_parent_id FROM xfilestructure where fls_id = ".$fls_parent_id)->row();

    	if(isset($folders->fls_parent_id))
    	{
			$this->path .= '/'.$folders->fls_name;
	    	$this->getFolder($folders->fls_parent_id);
    	}
    	else
			$this->path .= '|';
    }

    // Create File Structure - END


    //************************************************************************************************************************// 


    // Create Database Structure - START

    function getBaseTables($domain_name)
    {
    	$new_database	= $domain_name;

    	$db_created = $this->db->query('create database `'.$new_database.'`');

    	if($db_created)
    	{
			$base_tables = $this->db->query('SELECT dbs_tablename FROM '.$this->base_database.'.xdatabasestructure WHERE dbs_status = 1;')->result();

			foreach ($base_tables as $tables) 
			{
				$new_table = $tables->dbs_tablename;
				$sql_create_table = 'CREATE TABLE `'.$new_database.'`.'.$new_table.' LIKE '.$this->base_database.'.'.$new_table;
				$this->db->query($sql_create_table);
			}

			$this->insertBaseData($new_database);
    	}
    }

    function insertBaseData($new_database)
    {
    	$data = $this->client_data;

    	$ppl_id = $pct_id = $cmp_id = $cpl_id = $emp_id = 0;

    	$ppl_id = $this->autodeployment_model->insertPeopleData($new_database, $data);
    	
    	$new_client_ids = $this->InsertBaseDataToEasynow($data);

    	if($ppl_id > 0)
    	{
    		$this->db->trans_begin();

    		$pct_id = $this->autodeployment_model->insertPeopleContactData($new_database, $ppl_id, $data);

	    	$cmp_id = $this->autodeployment_model->insertCompanyData($new_database, $data);

	    	if($ppl_id > 0 && $cmp_id > 0)
	    	{
		    	$cpl_id = $this->autodeployment_model->insertCompanyPeopleData($new_database, $cmp_id, $ppl_id);

		    	$emp_id = $this->autodeployment_model->insertEmployeeData($new_database, $cmp_id, $ppl_id);
	    	}

	    	if($ppl_id > 0 && $pct_id > 0 && $cmp_id > 0 && $cpl_id > 0 && $emp_id > 0)
	    	{    	
				$this->autodeployment_model->copyBaseData($new_database, $this->client_data);
		        $this->db->trans_commit();

		    	$newclient = array(
		    		'scr_client_id' 	=> $new_client_ids->ppl_id,
		    		'scr_account_id' 	=> $new_client_ids->cmp_id,
		    		'scr_uniquekey' 	=> $this->randomstring(),
		    		'scr_domain' 		=> $new_database,
		    		'scr_database' 		=> $new_database,
		    		'scr_status' 		=> ACTIVE_STATUS
		    	);

		    	$scr_id = $this->autodeployment_model->insertSubscriptionData($newclient);

		    	$today_date		=	date('Y-m-d');
				$plan_exp_date	=	date('y:m:d', strtotime("+".AD_TRIAL_DAYS." days"));

		    	$subscription_transaction = array(
					'str_scr_id'			=> $scr_id,
					'str_pln_id'			=> EASYNOW_PLAN_TRIAL,
					'str_start_date'		=> $today_date,
					'str_end_date'			=> $plan_exp_date,
					'str_users'				=> $this->client_data[AD_CLIENT_PEOPLE_COUNT],
					'str_price'				=> 'FREE', // Pls change
					'str_price_currency'	=> $this->client_data[AD_CLIENT_CURRENCY],
				);
				
				$this->autodeployment_model->insertSubscriptionTransactionData($subscription_transaction);

		        echo true;
	    	}
		    else
		    {
		        $this->db->trans_rollback();
		        echo 'There was and Error Adding this Account';
		    }
    	}
    	else
    		echo 'Error Adding People';
    }

    function InsertBaseDataToEasynow($data)
    {
		$ppl_id = $this->autodeployment_model->insertEasynowPeopleData($this->base_database, $data);
		$cmp_id = $this->autodeployment_model->insertEasynowCompanyData($this->base_database, $data);
		$this->autodeployment_model->insertPeopleContactData($this->base_database, $ppl_id, $data);
		$this->autodeployment_model->insertCompanyPeopleData($this->base_database, $cmp_id, $ppl_id);
		$this->autodeployment_model->insertEmployeeData($this->base_database, $cmp_id, $ppl_id);

		return (object)array(
			'ppl_id' => $ppl_id,
			'cmp_id' => $cmp_id
		);
    }

    function randomstring()
    {
    	return $this->home_model->generateRandomStringNum(4);
    }

    // Create Database Structure - END

    //************************************************************************************************************************//

    // Update Query Functionality - START

    function updateAllClientDatabase()
    {
    	$this->load->view('updtview');
    }

    function UpdateQueryToClientDatabase()
    {
    	$query_string 	= $this->input->post('query');
    	$qryarr 		= explode(';', $query_string);

    	$clientlist = $this->db->query('select scr_database from xsubscription')->result();

    	foreach ($clientlist as $client)
    	{
    		$config = array(
				'hostname' => HOSTNAME,
				'username' => USERNAME,
				'password' => PASSWORD,
				'dbdriver' => 'mysqli',
	    		'database' => $client->scr_database,
	    	);

			$newdb = $this->load->database($config, TRUE);

			foreach ($qryarr as $qry) {
				if($qry != '')
	    			$newdb->query($qry);
			}
    	}
    }

    // Update Query Functionality - END

    //************************************************************************************************************************//

    // Dropdown - START

    function getPeopleDataByID($ppl_id)
    {
        echo json_encode($this->autodeployment_model->getPeopleDataByID($ppl_id));
    }

    public function getPeopleforDropdown($manage='')
    {
        $search     = $this->input->get('q');
        $peopleData = array('results'=>$this->autodeployment_model->getPeopleforDropdown($search,$manage));
        echo json_encode($peopleData);
    }

    public function getCompanyforDropdown($manage='')
    {
        $search     = $this->input->get('q');
        $peopleData = array('results'=>$this->autodeployment_model->getCompanyforDropdown($search,$manage));
        echo json_encode($peopleData);
    }

    public function getSubscriptionStatus($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $LeadData = array('results'=>$this->autodeployment_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($LeadData);
    }

    // Dropdown - END
}