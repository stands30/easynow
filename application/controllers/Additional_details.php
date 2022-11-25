<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Additional_details extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		check_logged();
        $this->load->model('Additional_details_model');
        $this->sbm_mnu_name1 = 'additional-detail-category';
        $this->sbm_mnu_name2 = 'additional-detail-master';
    }

    public function adt_category_list()
    {
        $data['title']             = 'Additional Details Category List';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array(
            'Home',
            base_url('dashboard')
        );
        $data['breadcrumb_data'][] = array(
            'Additional Details '
        );
        $data['breadcrumb_data'][] = array(
            'Category'
        );
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//

        if (checkaccess($this->sbm_mnu_name1, 'list')) {
            $data['global_asset_version'] = global_asset_version();
            $data['dataTableData']        = $this->Additional_details_model->getadtCatList(TABLE_COUNT);
            $data                         = array_merge($data, checkaccess($this->sbm_mnu_name1));
            $this->load->view('additional_details/category_list', $data);
        } else
            $this->load->view('errors/easynow_404', $data);
    }
    public function getadtCatList()
    {
        log_message('nexlog', 'Additional_details::getadtCatList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog', 'dataOptn >> ' . json_encode($dataOptn));
        $dataTableData = $this->Additional_details_model->getadtCatList(TABLE_RESULT, $dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        /*$enc_arr['ppl_id']         = 'ppl_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);*/

        $dataTableArray['data'] = $dataTableData;

        for ($i = 0; $i < count($dataTableData); $i++) {
            $enc_arr['adc_id']      = 'adc_id_encrypt';
            $dataTableArray['data'] = encrypt_key_in_array($dataTableArray['data'], $enc_arr);
        }

        // ******** Encrypt Data from multidimensional array ******//
        if (isset($dataOptn['columns'])) {
            // *********** Get Data Count **********//
            $dataTableArray['draw']            = $dataOptn['draw'];
            $dataTableArray['recordsTotal']    = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered'] = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog', 'Additional_details::getadtCatList << ');
        echo json_encode($dataTableArray);
    }
    public function adt_master_list()
    {
        $data['title']             = 'Additional Details Master List';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array(
            'Home',
            base_url('dashboard')
        );
        $data['breadcrumb_data'][] = array(
            'Additional Details '
        );
        $data['breadcrumb_data'][] = array(
            'Master List'
        );
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//

        // print_r($data['dataTableData']);


        if (checkaccess($this->sbm_mnu_name2, 'list')) {
            $data['global_asset_version'] = global_asset_version();
            $data['dataTableData']        = $this->Additional_details_model->getadtCatList(TABLE_COUNT);
            $data                         = array_merge($data, checkaccess($this->sbm_mnu_name2));
            $this->load->view('additional_details/master_list', $data);
        } else
            $this->load->view('errors/easynow_404', $data);
    }
    public function getadtMasterList()
    {
        log_message('nexlog', 'Additional_details::getadtMasterList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog', 'dataOptn >> ' . json_encode($dataOptn));
        $dataTableData          = $this->Additional_details_model->getadtMasterList(TABLE_RESULT, $dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['adm_id']      = 'adm_id_encrypted';
        $dataTableArray['data'] = encrypt_key_in_array($dataTableData, $enc_arr);
        $dataTableArray['data'] = $dataTableData;
        // ******** Encrypt Data from multidimensional array ******//
        if (isset($dataOptn['columns'])) {
            // *********** Get Data Count **********//
            $dataTableArray['draw']            = $dataOptn['draw'];
            $dataTableArray['recordsTotal']    = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered'] = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog', 'Additional_details::getadtMasterList << ');
        echo json_encode($dataTableArray);
    }
    public function getGenPrmforDropdown($genPrmGroup)
    {
        $search = $this->input->get('q');
        $result = array(
            'results' => $this->Additional_details_model->getGenPrmforDropdown($genPrmGroup, $search)
        );
        echo json_encode($result);
    }
    public function adt_master_form($adm_encrypted_id = '')
    {
        $title   = '';
        $adm_id  = '';
        $admData = '';
        if ($adm_encrypted_id != '') {
            $adm_id = $this->nextasy_url_encrypt->decrypt_openssl($adm_encrypted_id);
            $title  = ' Update';
            $data['title']                = ' Additional Details Master ' . $title;
            // ***** Breadcrumb Data Starts here *******//
            $data['breadcrumb_data'][]    = array(
                'Home',
                base_url('dashboard')
            );
            $data['breadcrumb_data'][]    = array(
                'Additional Details '
            );
            $data['breadcrumb_data'][]    = array(
                'Master List',
                base_url('additional-detail-master-list')
            );
            $data['breadcrumb_data'][]    = array(
                'Master ' . $title
            );
            $data['breadcrumb']           = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
            if (checkaccess($this->sbm_mnu_name2, 'edit')) {
                $data['global_asset_version']   = global_asset_version();
                $data['ci_asset_versn'] = ci_asset_versn();
                $data['dataTableData']        = $this->Additional_details_model->getadtMasterList(TABLE_COUNT);
                $admData = $this->Additional_details_model->getadtMasterData($adm_id);
                $data['admData'] = $admData;
                $data                   = array_merge($data, checkaccess($this->sbm_mnu_name2));

            } else
                $this->load->view('errors/easynow_404', $data);
        } else {

            $title = ' Add ';
            $data['title']                = ' Additional Details Master ' . $title;
            // ***** Breadcrumb Data Starts here *******//
            $data['breadcrumb_data'][]    = array(
                'Home',
                base_url('dashboard')
            );
            $data['breadcrumb_data'][]    = array(
                'Additional Details '
            );
            $data['breadcrumb_data'][]    = array(
                'Master List',
                base_url('additional-detail-master-list')
            );
            $data['breadcrumb_data'][]    = array(
                'Master ' . $title
            );
            $data['breadcrumb']           = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
            if (checkaccess($this->sbm_mnu_name2, 'add')) {
                $data['global_asset_version']   = global_asset_version();
                $data['ci_asset_versn'] = ci_asset_versn();
                $data['dataTableData']        = $this->Additional_details_model->getadtMasterList(TABLE_COUNT);
                $admData = $this->Additional_details_model->getadtMasterData($adm_id);
                $data['admData'] = $admData;
                $data                   = array_merge($data, checkaccess($this->sbm_mnu_name2));
            } else
                $this->load->view('errors/easynow_404', $data);
        }

        // ***** Breadcrumb Data Ends here *******//


        $this->load->view('additional_details/master_form', $data);
    }
    public function getAdtCategory()
    {
        $search = $this->input->get('q');
        $result = array(
            'results' => $this->Additional_details_model->getAdtCategory($search)
        );
        echo json_encode($result);
    }
    public function getGenPrmGroupName()
    {
        $search = $this->input->get('q');
        $result = array(
            'results' => $this->Additional_details_model->getGenPrmGroupName($search)
        );
        echo json_encode($result);
    }
    public function masterUpdate()
    {
        $admId = $this->Additional_details_model->masterUpdate();
        if ($admId) {
            $success = true;
            $message = 'Details Saved successfully';
            $linkn   = base_url('additional-detail-master-list');
        } else {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array(
            'success' => $success,
            'message' => $message,
            'linkn' => $linkn
        ));
    }

    function saveAdtCategory()
    {
        $data  = $this->input->post();
        $admId = $this->Additional_details_model->saveAdtCategory($data);

        if ($admId) {
            $success = true;
            $message = 'Category Saved successfully';
            $linkn   = base_url('additional-detail-category-list');
        } else {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array(
            'success' => $success,
            'message' => $message,
            'linkn' => $linkn
        ));
    }

    function deleteAdtCategory()
    {
        $adc_id = $this->nextasy_url_encrypt->decrypt_openssl($this->input->post('adc_id'));

        $check = $this->Additional_details_model->deleteAdtCategory($adc_id);
        if ($check) {
            $response = array(
                'success' => true,
                'message' => 'Category removed successfully',
                'linkn' => base_url('additional-detail-category-list')
            );
            echo json_encode($response);
        }
    }

    function getNextOrder($adc_id)
    {
        echo $this->Additional_details_model->getNextOrder($adc_id);
    }

    function deleteMaster()
    {
        $evt_encrypt_id = $this->nextasy_url_encrypt->decrypt_openssl($this->input->post('evt_encrypt_id'));

        $check = $this->Additional_details_model->deleteMaster($evt_encrypt_id);

        if ($check) {
            $response = array(
                'success' => true,
                'message' => 'Detail removed successfully',
                'linkn' => base_url('additional-detail-category-list')
            );
            echo json_encode($response);
        }
    }
}