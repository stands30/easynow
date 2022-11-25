<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Form_access_model extends CI_Model 
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getModules()
    {
        $sql_module = 'select mnu_id, mnu_name from menu_master where mnu_status = "Y"';

        $sql_sub_module = 'select mnu_id, mnu_name, ifnull(sbm_id, "0") sbm_id, ifnull(sbm_name, "0") sbm_name from menu_master mm left outer join sub_menu_master smm on mm.mnu_id = smm.sbm_mnu_id order by mnu_order, sbm_order';

        return array(
            'menu'    =>  $this->db->query($sql_module)->result(),
            'submenu' =>  $this->db->query($sql_sub_module)->result()
        );
    }

    function updateAccess($access_data)
    {
        $condition  = ' fma_mnu_id = "'.$access_data['mnu_id'].'" and fma_usr_id = "'.$access_data['usr_id'].'" and fma_sbm_id = "'.$access_data['sbm_id'].'"';

        $select_sql = 'select ifnull(fma_id,0) fma_id from form_access where '.$condition;


        if($this->db->query($select_sql)->row())
        {
            $sql_update = 'update form_access set fma_'.$access_data['type'].' = '.$access_data['val'].' where '.$condition;
            $this->db->query($sql_update);
        }
        else
        {
            $insert_data = array(
                'fma_usr_id' => $access_data['usr_id'],
                'fma_mnu_id' => $access_data['mnu_id'],
                'fma_sbm_id' => $access_data['sbm_id'],
                'fma_'.$access_data['type'] =>  $access_data['val']
            );

            $this->home_model->insert('form_access',$insert_data);
        }
    }

    function getEmployeeforDropdown($search)
    {
        $peopleSqlQuery = "select ppl_id as id, ppl_name as text from people where ppl_status IN (".ACTIVE_STATUS.") and ppl_id in (select emp_ppl_id from employee)";

        if($search !='')
          $peopleSqlQuery.=" and ppl_name LIKE '%".$search."%' ";

        $peopleSqlQuery.=" ORDER BY ppl_crdt_dt ASC";

        return $this->home_model->executeSqlQuery($peopleSqlQuery,'result');
    }

    function getAccessDetail($ppl_id)
    {
        $sql = 'select * from form_access where fma_usr_id = '.$ppl_id;
        return $this->home_model->executeSqlQuery($sql,'result');
    }

    function getMenu()
    {        
        $sql ="select distinct menu_master.MNU_name,menu_master.MNU_id,menu_master.MNU_link,menu_master.MNU_logo from menu_master left join  menu_transaction on menu_master.MNU_id=menu_transaction.MTR_MNU_id left join form_access on menu_master.mnu_id = form_access.fma_mnu_id where menu_transaction.MTR_DPT_id ='".$this->session->userdata(PEOPLE_SESSION_DEPT)."' and menu_master.MNU_Status='Y' and menu_transaction.MTR_Status='Y' and form_access.fma_usr_id = '".$this->session->userdata(PEOPLE_SESSION_ID)."' and form_access.fma_access = '".ACTIVE_STATUS."' and mnu_visible=".ACTIVE_STATUS." order by menu_master.MNU_order";

        $result=$this->db->query($sql);
        return $result;
    }


    function getsubmenu($MNU_id)
    {
        $sql = "select * from sub_menu_master where SBM_Status='Y' and SBM_group='submenu' and SBM_MNU_id=".$MNU_id." and SBM_parent_id=".$MNU_id." and SBM_id in (select FMA_SBM_id from form_access where FMA_Status='Y' and FMA_access='1' and FMA_USR_id='".$this->session->userdata(PEOPLE_SESSION_ID)."' and FMA_MNU_id='".$MNU_id."') and sbm_visible=".ACTIVE_STATUS." order by SBM_order";

        $result=$this->db->query($sql);
        return $result;
    }


    function getpages($pageid,$moduleid)
    {
        $sql="select SBM_MNU_id,SBM_icon,SBM_link as form_name,SBM_name as form_title,SUBSTRING_INDEX(SBM_name,'(',-1) as pgname from sub_menu_master where SBM_Status='Y' and SBM_group='submenu' and SBM_MNU_id='".$moduleid."' and SBM_id in (select FMA_SBM_id from form_access where FMA_Status='Y' and FMA_access='1' and FMA_USR_id='".$this->session->userdata(PEOPLE_SESSION_ID)."' and SBM_parent_id='".$pageid."' and FMA_MNU_id='".$moduleid."') order by SUBSTRING_INDEX(SBM_name,'(',-1)";

        $result=$this->db->query($sql);
        return $result;
    }

}