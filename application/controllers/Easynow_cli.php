<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Easynow_cli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Easynow_cli_model');
    }
}

?>