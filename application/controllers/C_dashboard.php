<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class C_dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('v_header');
        $this->load->view('v_menu');
        $this->load->view('v_dashboard');
        $this->load->view('v_footer');
    }
    public function alif()
    {
        $this->load->view('v_alif');
    }
}

/* End of file C_dashboard.php and path \application\controllers\C_dashboard.php */
