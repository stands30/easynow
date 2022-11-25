<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model

{
    /**
     * Instanciar o CI
     */
    function __construct()
    {

        // Call the Model constructor

        parent::__construct();
    }

    public

    function getGenPrmResultByGroup($gpm_group, $returntype)
    {
        $genPrmQueryBenchmarkStart = $this->benchmark->mark('genPrmQueryBenchmarkStart');
        $sqlQuery = "SELECT  gnp_value as f1,gnp_name as f2,gnp_description as f3 FROM gen_prm where gnp_group ='" . $gpm_group . "' and gnp_status='" . ACTIVE_STATUS . "' and gnp_visible='" . ACTIVE_STATUS . "' order by gnp_order";
        $result = $this->executeSqlQuery($sqlQuery, $returntype);
        $genPrmQueryBenchmarkEnd = $this->benchmark->mark('genPrmQueryBenchmarkEnd');
        return $result;
    }

    public

    function getGenPrmResultByValue($gpm_group, $value, $returntype)
    {
        $genPrmQueryBenchmarkStart = $this->benchmark->mark('genPrmQueryBenchmarkStart');
        $sqlQuery = "SELECT * FROM gen_prm where gnp_group ='" . $gpm_group . "' and gnp_value = '".$value."' order by gnp_order";
        $result = $this->executeSqlQuery($sqlQuery, $returntype);
        $genPrmQueryBenchmarkEnd = $this->benchmark->mark('genPrmQueryBenchmarkEnd');
        return $result;
    }

    public

    function executeSqlQuery($sqlQuery, $resType)
    {

        // echo  ' last sqlQuery : '.$sqlQuery;

        $query = $this->db->query($sqlQuery);
        switch ($resType)
        {
        case 'row':
            $result = $query->row();
            break;

        case 'result':
            $result = $query->result();
            break;

        case 'result_array':
            $result = $query->result_array();
            break;

        case 'row_array':
            $result = $query->row_array();
            break;

        case 'update':
            $result = 'true';
            break;

        default:
            $result = '';
            break;
        }

        // echo ' last query : '.$this->db->last_query();

        return $result;
    }

    public

    function executeDataTableSqlQuery($sqlQuery, $dataType, $dataOptn = '')
    {
        switch ($dataType)
        {

            // ,IF(table_data_count >table_server_limit,'true','false') table_server_status

        case 'count':
            $sqlQuery = "SELECT *,IF(table_data_count >table_server_limit,true,false) table_server_status from (SELECT (SELECT bpm_value from bsn_prm where bpm_name ='" . TABLE_SERVER_LIMIT . "') table_server_limit,(SELECT IFNULL(COUNT(*),0) from (" . $sqlQuery . ") tbl ) table_data_count) result";
            $resType = 'row';
            break;

        case 'result':
            if (isset($dataOptn['columns']))
            {
                $search_query = array();
                $query_optn = '';
                for ($i = 0; $i < count($dataOptn['columns']); $i++)
                {
                    if ($dataOptn['columns'][$i]['searchable'] == 'true') array_push($search_query, $dataOptn['columns'][$i]['data'] . " like '%" . $dataOptn['search']['value'] . "%'");
                }

                $qry_string = preg_replace('/\s+/', ' ', strtolower($sqlQuery));
                if (strpos($qry_string, 'order by') != '')
                {
                    $query_optn = substr($qry_string, strpos($qry_string, 'order by') , strlen($qry_string));
                }

                $sqlQuery = "select * from (" . $sqlQuery . ") tbl where " . join(" or ", $search_query) . " " . $query_optn;
                if ($dataOptn['length'] != '-1' && $dataOptn['search']['value'] == '')
                {
                    $sqlQuery.= " LIMIT " . $dataOptn['start'] . "," . $dataOptn['length'];
                }
            }

            $resType = 'result';
            break;
        }

        $query = $this->db->query($sqlQuery);
        switch ($resType)
        {
        case 'row':
            $result = $query->row();
            break;

        case 'result':
            $result = $query->result();
            break;

        case 'result_array':
            $result = $query->result_array();
            break;

        case 'row_array':
            $result = $query->row_array();
            break;

        case 'update':
            $result = 'true';
            break;

        default:
            $result = '';
            break;
        }

        return $result;
    }

    function insert($table, $array)
    {
        $this->db->insert($table, $array);
        $id = $this->db->insert_id();
        return $id;
    }

    function update($field, $id, $array, $table)
    {
        $this->db->where($field, $id);
        $this->db->update($table, $array);
        return $id;
    }

    public

    function getFileName($name)
    {
        $splitTimeStamp = explode(".", $name);
        $name = $splitTimeStamp[0];
        $ext = '.' . $splitTimeStamp[1];
        return $name . '-' . $this->generateRandomStringNum(4) . $ext;
    }

    function generateRandomStringNum($length)
    {
        $characters = '0123456789';
        $randomNo = '';
        for ($i = 0; $i < $length; $i++)
        {
            $randomNo.= $characters[rand(0, strlen($characters) - 1) ];
        }

        return $randomNo;
    }

    public

    function getImageName($id, $type = '')
    {
        $sqlQuery = "select gls_image from " . $type . " where gls_id = " . $id . " and gls_status = '" . ACTIVE_STATUS . "'";
        $row = $this->executeSqlQuery($sqlQuery, 'row');
        return $row;
    }

    public

    function sendMail($email_data)
    {
        $email_notifiy = $this->getBusinessParamData('email_flag');
        if (!empty($email_notifiy) && $email_notifiy->bpm_value)
        {
            log_message('nexlog', 'Sending Email to ' . $email_data['email'] . ' || Subject: ' . $email_data['subject'] . '||  Message: ' . $email_data['message'] . ',  || TEMPLATE: ' . $email_data['template']);
            log_message('nexlog', 'Email configurations -- ' . EMAIL_PROTOCOL . ' -- ' . EMAIL_HOST . ' -- ' . EMAIL_USERNAME . ' -- ' . EMAIL_PASSWORD . ' -- ' . EMAIL_TYPE . ' -- ' . EMAIL_CHARSET . ' -- ' . EMAIL_WORDWRAP);
            log_message('nexlog', ' email data : ' . json_encode($email_data));
            $projectBsnPrmDetails = $this->getBusinessParamData(COMPANY_NAME);
            $projectName = $projectBsnPrmDetails->bpm_value;

            // $pw_source=$this->get_admin_from_pw();

            $list = '' . $email_data['email'] . '';
            $email_msg = $email_data['message'];
            if ($email_data['email'] != '')
            {
                $email_config = Array(
                    'protocol' => EMAIL_PROTOCOL,
                    'smtp_host' => EMAIL_HOST,
                    'smtp_port' => EMAIL_PORT,
                    'smtp_user' => EMAIL_USERNAME,
                    'smtp_pass' => EMAIL_PASSWORD,
                    'mailtype' => EMAIL_TYPE,
                    'charset' => EMAIL_CHARSET,
                    'wordwrap' => EMAIL_WORDWRAP
                );
                $this->load->library('email');
                $this->email->initialize($email_config);
                $this->email->clear(TRUE);
                $this->email->set_newline("\r\n");
                $this->email->from(EMAIL_USERNAME, $projectName);
                $this->email->subject($email_data['subject']);
                $this->email->to($email_data['email']);
                $this->email->cc($email_data['email_cc']);
                if (isset($email_data['attachment']) && !empty($email_data['attachment']))
                {
                    $this->email->attach($email_data['attachment']);
                }

                if ($email_data['template'] != '')
                {
                    $data['data'] = $email_data;
                    $email_msg = $this->load->view($email_data['template'], $data, true);
                }

                if (isset($email_data['reply_to']) && !empty($email_data['reply_to']))
                {
                    $this->email->reply_to($email_data['reply_to']);
                }

                if (!empty($email_data['doc_attach']))
                {
                    foreach($email_data['doc_attach'] as $company_profile_attachKey)
                    {
                        log_message('nexlog', 'attachment : ' . $email_data['doc_attach_path'] . $company_profile_attachKey->doc_name);
                        $this->email->attach($email_data['doc_attach_path'] . $company_profile_attachKey->doc_name);
                    }
                }

                log_message('nexlog', 'CRIMINAL SUBJECT' . $email_data['email'] . ' || MESSAGE : ' . $email_msg);
                $this->email->message($email_msg);
                log_message('nexlog', 'CRIMINAL EMAIL' . json_encode($this->email));
                if (!$this->email->send())
                {

                    // echo $this->email->print_debugger();

                    log_message('error', 'error occured in people insert Communication_model/send_mail' . $this->email->print_debugger());

                    // show_error($this->email->print_debugger());

                }
            }

            return true;
        }
    }

    function save_data($table_name, $data, $where_column = '')
    {
        $column_prefix = explode('_', $where_column) [0];
        $data[$column_prefix . '_crdt_by'] = 1; //$this->session->userdata('prs_id');
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }

    function update_data($table_name, $data, $where_column = '')
    {
        $column_prefix = explode('_', $where_column) [0];
        if ($where_column && $data[$where_column])
        {
            $data[$column_prefix . '_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID); //$this->session->userdata('prs_id');
            $this->db->where($where_column, $data[$where_column]);
            if ($this->db->update($table_name, $data)) return $data[$where_column];
            else return 'false';
        }
    }

    function delete_data($table_name, $id, $where_column)
    {
        $column_prefix = explode('_', $where_column) [0];
        $data = array();
        $data[$column_prefix . '_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID); //$this->session->userdata('prs_id');
        $data[$column_prefix . '_status'] = 2;
        $this->db->where($where_column, $id);
        return $this->db->update($table_name, $data);
    }

    function erase_data($table_name, $id, $where_column)
    {
        $column_prefix = explode('_', $where_column) [0];
        $data[$column_prefix . '_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID); //$this->session->userdata('prs_id');
        $this->db->where($where_column, $id);
        if ($this->db->delete($table_name)) return 'true';
        else return 'false';
    }

    function detail_data($fields, $table_name, $where_condition = '', $order_by = '')
    {
        $sql = 'select ' . $fields . ' from ' . $table_name;
        if ($where_condition) $sql.= ' where ' . $where_condition;
        if ($order_by) $sql.= ' ' . $order_by;
        return $this->db->query($sql)->row_array();
    }

    function list_data($fields, $table_name, $where_condition = '', $order_by = '')
    {
        $sql = 'select ' . $fields . ' from ' . $table_name;
        if ($where_condition) $sql.= ' where ' . $where_condition;
        if ($order_by) $sql.= ' ' . $order_by;
        return $this->db->query($sql)->result_array();
    }

    function field_data($field, $table_name, $id = '')
    {
        $prefix = explode("_", $field) [0];
        $sql = 'select ' . $field . ' retfield from ' . $table_name . ' where ' . $prefix . '_id = ' . $id;
        return $this->db->query($sql)->row()->retfield;
    }

    public

    function getBusinessParamData($busParamname)
    {
        $businessParamSql = "SELECT * FROM bsn_prm where bpm_status != '" . DELETE_STATUS . "' and bpm_name='" . $busParamname . "' ";
        $result = $this->home_model->executeSqlQuery($businessParamSql, 'row');
        return $result;
    }

    public

    function getUserdataForLogin($data = array())
    {
        $sqlQuery = "SELECT pct_ppl_id as ppl_id FROM people_contact where pct_status='" . ACTIVE_STATUS . "' and pct_type='" . CONTACT_EMAIL . "' and pct_value='" . $data['email'] . "' and pct_primary='" . ACTIVE_STATUS . "'";
        $row = $this->home_model->executeSqlQuery($sqlQuery, 'row');
        return $row;
    }

    public

    function getDataCountByField($data = array())
    {
        $sqlQuery = "SELECT IFNULL(COUNT(" . $data['column'] . "),0) as col_count FROM " . $data['table'];
        if (isset($data['where']) && $data['where'] != '')
        {
            $sqlQuery.= " " . $data['where'];
        }

        // echo $sqlQuery;

        $row = $this->executeSqlQuery($sqlQuery, 'row');
        return $row->col_count;
    }

    /* getNewCode() ----- Parameter : array(column, table, code, where (optional)) ----- */
    public

    function getNewCode($data)
    {
        $type = $this->getBusinessParamData($data['type']);
        if (!isset($type->bpm_name)) return '';
         $column_prefix = explode('_', $data['column']) [0];
         $code = 0;
        if (isset($type->bpm_default_value) && $type->bpm_default_value != '')
        {
            $code = $type->bpm_default_value;
        }
          $sqlQuery = "select IFNULL(" . $data['column'] . ",0) newcode from " . $data['table'] . " where " . $column_prefix . "_status = '" . ACTIVE_STATUS . "'";
            if (isset($data['where']) && $data['where'] != '') $sqlQuery.= " and " . $data['where'];
            $sqlQuery.= " order by " . $column_prefix . "_id desc limit 1";
            $result = $this->executeSqlQuery($sqlQuery, 'row');
             $code = $type->bpm_value.$code;
             // echo 'new code : '.$result->newcode.' || code : '.$code;
            if (!empty($result) && $result->newcode >= $code)
            {
               $code = $result->newcode;
             $generated_code =  $type->bpm_value.str_pad((str_replace($type->bpm_value, '', $code) + 1) , 4, '0', 0);
            }
            else
            {
              $generated_code = $code;
            }
        return $generated_code;
    }

    function getDefaultvalue($gnp_group)
    {
        $default_values = array();

        if(isset($gnp_group))
        {
            for($i = 0; $i < count($gnp_group); $i++) 
            {
                $sql = 'select gnp_value, gnp_name from gen_prm where gnp_group = "'.$gnp_group[$i].'" and gnp_default = '.ACTIVE_STATUS;
                $data = $this->executeSqlQuery($sql, 'row');
                $default_values[$gnp_group[$i]]['value'] = $data->gnp_value;
                $default_values[$gnp_group[$i]]['name'] = $data->gnp_name;
            }

            return $default_values;
        }
        else
            return false;
    }
    public function deleteMultipleData($table_name,$column,$value,$delete)
    {
         $column_prefix = explode('_', $column)[0];
    if($delete !='' || $delete != true)
    {
      $sql = "DELETE from ".$table_name."  where ".$column." in (".$value.") ";
    }else
    {
      $sql = "Update ".$table_name." set ".$column_prefix . '_status'."= '0' and ".$column_prefix . '_updt_by'." = '".$this->session->userdata(PEOPLE_SESSION_ID) ."' where ".$column." in (".$value.") ";  
    }  
        
        $res = $this->db->query($sql);
        return true;
    }

     public function getContactForList($resType,$type,$dataOptn='')
    {
        
        $sqlQuery = "Select *,(DATE_FORMAT(cnt_crdt_dt, '%d/%m/%Y')) cnt_crdt_date,
                              (DATE_FORMAT(cnt_date, '%D %M, /%Y')) cnt_date_format
                                from contact_us where cnt_status = '".ACTIVE_STATUS."' and cnt_type = ".$type;
        $result = $this->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
        return $result;
    }
    public function checkUniqueCode($custom_data)
   {
        log_message('nexlog', 'home_model::checkUniqueCode >>');
         $column_prefix = explode('_', $custom_data['field'])[0];
        $sqlQuery = "SELECT COUNT(*) as count FROM ".$custom_data['table']." where ".$column_prefix."_status='" . ACTIVE_STATUS . "' and  ".$custom_data['field'].'= \''. $custom_data['field_value']."' ";
        if ($custom_data['unique_id'] != '')
        {
          $sqlQuery.= " and ".$custom_data['unique_col']." !='" . $custom_data['unique_id'] . "'";
        }
         if (isset($custom_data['custom_where']) && $custom_data['custom_where'] != '')
        {
          $sqlQuery.= $custom_data['custom_where'];
        }

        log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery, 'row');
        log_message('nexlog', ' row : ' . json_encode($row));
        log_message('nexlog', 'home_model::checkUniqueCode <<');
        return $row;
   }
}

?>
