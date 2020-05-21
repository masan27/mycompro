<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();        
        $url_pengalihan = str_replace(base_url(), '', current_url());
        $this->session->set_userdata('pengalihan', $url_pengalihan);
        // Ambil check login dari simple_login
		$this->simple_login->check_login();
		$this->log_user->add_log();
        $this->load->model('dasbor_model');
    }

    public function index()
    {
        $data = array('title'    => 'Dashboard');
        $this->load->view('admin/dashboard/index', $data, FALSE);
    }
}
