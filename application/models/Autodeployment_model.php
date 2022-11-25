<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Autodeployment_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function checkDatabaseExist($database_name)
    {
        return $this->db->query('SHOW DATABASES LIKE "'.$database_name.'"')->row();
    }

    function insertSubscriptionData($data)
    {
        return $this->home_model->insert('xsubscription', $data);
    }

    function insertSubscriptionTransactionData($data)
    {
        return $this->home_model->insert('xsubscription_transaction', $data);
    }

    function insertPeopleData($new_database, $data)
    {
        $ppl_data = array(
            'ppl_name'          => $data[AD_CLIENT_NAME],
            'ppl_login_type'    => '1,2',
            'ppl_title_id'      => '1',
            'ppl_username'      => 'admin',
            'ppl_password'      => $this->nextasy_url_encrypt->encrypt_openssl($data[AD_CLIENT_PASSWORD]),
            'ppl_login_dept'    => PEOPLE_ADMIN,
            'ppl_status'        => ACTIVE_STATUS
        );

        return $this->home_model->insert('`'.$new_database.'`.people', $ppl_data);
    }

    function insertPeopleContactData($new_database, $ppl_id, $data)
    {
        $ppl_contact_data_email     = array('pct_ppl_id' => $ppl_id, 'pct_type' => CONTACT_EMAIL, 'pct_value' => $data[AD_CLIENT_EMAIL], 'pct_status' => ACTIVE_STATUS, 'pct_active' => ACTIVE_STATUS, 'pct_primary' => ACTIVE_STATUS);

        $this->home_model->insert('`'.$new_database.'`.people_contact', $ppl_contact_data_email);

        $ppl_contact_data_mobile    = array('pct_ppl_id' => $ppl_id, 'pct_type' => CONTACT_MOBILE, 'pct_value' => $data[AD_CLIENT_MOBILE], 'pct_status' => ACTIVE_STATUS, 'pct_active' => ACTIVE_STATUS, 'pct_primary' => ACTIVE_STATUS);

        return $this->home_model->insert('`'.$new_database.'`.people_contact', $ppl_contact_data_mobile);
    }

    function insertCompanyData($new_database, $data)
    {
        $cmp_data = array(
            'cmp_type_id'   => COMPANY_TYPE_COMPANY,
            'cmp_name'      => $data[AD_CLIENT_COMPANY],
            'cmp_status'    => ACTIVE_STATUS,
        );

        return $this->home_model->insert('`'.$new_database.'`.company', $cmp_data);
    }

    function insertCompanyPeopleData($new_database, $cmp_id, $ppl_id)
    {
        $cpl_data = array(
            'cpl_cmp_id'    => $cmp_id,
            'cpl_ppl_id'    => $ppl_id,
            'cpl_status'    => ACTIVE_STATUS,
        );

        return $this->home_model->insert('`'.$new_database.'`.cmp_people', $cpl_data);
    }

    function insertEmployeeData($new_database, $cmp_id, $ppl_id)
    {
        $emp_data = array(
            'emp_cmp_id'    => $cmp_id,
            'emp_ppl_id'    => $ppl_id,
            'emp_code'      => 'EMP'.$this->randomstring(),
            'emp_dept'      => PEOPLE_ADMIN_DEPT,
            'emp_status'    => ACTIVE_STATUS,
        );

        return $this->home_model->insert('`'.$new_database.'`.employee', $emp_data);
    }

    function insertEasynowPeopleData($base_database, $data)
    {
        if($data[AD_CLIENT_PPL_ID])
            return $data[AD_CLIENT_PPL_ID];

        $ppl_data = array(
            'ppl_name'          => $data[AD_CLIENT_NAME],
            'ppl_login_type'    => '1,2',
            'ppl_title_id'      => '1',
            'ppl_username'      => 'admin',
            'ppl_password'      => $this->nextasy_url_encrypt->encrypt_openssl($data[AD_CLIENT_PASSWORD]),
            'ppl_login_dept'    => PEOPLE_ADMIN,
            'ppl_status'        => ACTIVE_STATUS
        );

        return $this->home_model->insert('`'.$base_database.'`.people', $ppl_data);
    }

    function insertEasynowCompanyData($base_database, $data)
    {
        if($data[AD_CLIENT_CMP_ID])
            return $data[AD_CLIENT_CMP_ID];

        $cmp_data = array(
            'cmp_type_id'   => COMPANY_TYPE_COMPANY,
            'cmp_name'      => $data[AD_CLIENT_COMPANY],
            'cmp_status'    => ACTIVE_STATUS,
        );

        return $this->home_model->insert('`'.$base_database.'`.company', $cmp_data);
    }

    function copyBaseData($new_database, $client_data)
    {
        $sql = 'select * from xdatabasestructure where dbs_copydata = "Y"';
        $table_data = $this->db->query($sql)->result();

        foreach ($table_data as $table)
        {
            $udpateSelectQuery = 'select * from '.$table->dbs_tablename.';';

            if($table->dbs_copy_column != '')
                $udpateSelectQuery = 'select * from '.$table->dbs_tablename.' where '.$table->dbs_copy_column.' in ('.$table->dbs_copy_value.');';

            $this->db->query('insert into `'.$new_database.'`.'.$table->dbs_tablename.' '.$udpateSelectQuery);
        }

        $this->copyGenPrm($new_database, $client_data);
    }

    function copyGenPrm($new_database, $client_data)
    {
        $table_data = $this->db->query('select dbs_tablename, dbs_copy_value from xdatabasestructure where dbs_tablename = "gen_prm"')->row();
        $udpateSelectQuery = 'select * from gen_prm where gnp_group not in ('.$table_data->dbs_copy_value.') group by gnp_group';

        $this->db->query('insert into `'.$new_database.'`.'.$table_data->dbs_tablename.' '.$udpateSelectQuery);
        $this->db->query('update `'.$new_database.'`.gen_prm set gnp_value = "" where gnp_group not in ('.$table_data->dbs_copy_value.')');

        $this->copyBsnPrm($new_database, $client_data);
    }

    function copyBsnPrm($new_database, $client_data)
    {
        $this->db->query('update `'.$new_database.'`.bsn_prm set bpm_value = "'.$client_data[AD_CLIENT_EMAIL]     .'" where bpm_name = "admin_email";');
        $this->db->query('update `'.$new_database.'`.bsn_prm set bpm_value = "'.$client_data[AD_CLIENT_COMPANY]   .'" where bpm_name = "company_name";');
        $this->db->query('update `'.$new_database.'`.bsn_prm set bpm_value = "'.$client_data[AD_CLIENT_EMAIL]     .'" where bpm_name = "email_cc";');
        $this->db->query('update `'.$new_database.'`.bsn_prm set bpm_value = "'.$client_data[AD_CLIENT_EMAIL]     .'" where bpm_name = "email_reply_to";');
    }

    function randomstring()
    {
        return $this->home_model->generateRandomStringNum(3);
    }

    function getPeopleforDropdown($search, $manage = '')
    {
        $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (" . ACTIVE_STATUS . ")";
        if ($manage == 'manage')
        {
          $peopleSqlQuery.= " and ppl_id IN (SELECT emp_ppl_id from employee where emp_status = '" . ACTIVE_STATUS . "')";
        }
        else
        {
          $peopleSqlQuery.= " and ppl_id NOT IN (SELECT emp_ppl_id from employee where emp_dept != '" . PEOPLE_ADMIN_DEPT . "')";
        }

        if ($search != '')
        {
          $peopleSqlQuery.= " and ppl_name LIKE '%" . $search . "%' ";
        }

        $peopleSqlQuery.= "  ORDER BY ppl_crdt_dt ASC";

        // ***** It is used to reset value of select2 ****** //

        $resetResult = array(
          'id' => '0',
          'text' => 'Please Select People'
        );
        $queryResult = $this->home_model->executeSqlQuery($peopleSqlQuery, 'result');
            if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }

        // ***** It is used to reset value of select2 ****** //

        return $queryResult;
    }

    function getCompanyforDropdown($search, $manage = '')
    {
        $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (" . ACTIVE_STATUS . ") ";
        if ($search != '')
        {
          $CompanySqlQuery.= " and cmp_name LIKE '%" . $search . "%' ";
        }

        $CompanySqlQuery.= "  ORDER BY cmp_name ASC";

        // ***** It is used to reset value of select2 ****** //

        $queryResult = $this->home_model->executeSqlQuery($CompanySqlQuery, 'result');
        if(count($queryResult) > 0)
          $resetResult = array('id' => '0', 'text' => 'Please Select Company');
        else
          $resetResult = array('id' => '0', 'text' => 'Please Enter Name to Add New Company');

            if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }

        // ***** It is used to reset value of select2 ****** //

        return $queryResult;
    }
    public

    function getGenPrmforDropdown($genPrmGroup, $search)
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='" . $genPrmGroup . "' and gnp_status IN (" . ACTIVE_STATUS . ") ";
        if ($search != '')
        {
          $genPrmSqlQuery.= " and gnp_name LIKE '%" . $search . "%' ";
        }

        $genPrmSqlQuery.= "  ORDER BY gnp_order ASC";

        // ***** It is used to reset value of select2 ****** //

        $resetResult = array(
          'id' => '0',
          'text' => 'Please Select'
        );
        $queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery, 'result');
            if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }

        // ***** It is used to reset value of select2 ****** //

        return $queryResult;
    }

    function getPeopleDataByID($ppl_id)
    {
        $ppl_mobile = $this->db->query('SELECT ifnull(pct_value, "") pct_value FROM people_contact WHERE pct_ppl_id = '.$ppl_id.' AND pct_type = '.CONTACT_MOBILE.' AND pct_active = '.ACTIVE_STATUS.' AND pct_primary = '.ACTIVE_STATUS)->row()->pct_value;

        $ppl_email  = $this->db->query('SELECT ifnull(pct_value, "") pct_value FROM people_contact WHERE pct_ppl_id = '.$ppl_id.' AND pct_type = '.CONTACT_EMAIL.' AND pct_active = '.ACTIVE_STATUS.' AND pct_primary = '.ACTIVE_STATUS)->row()->pct_value;
        
        return (object)array('ppl_mobile' => $ppl_mobile, 'ppl_email' => $ppl_email);
    }
}