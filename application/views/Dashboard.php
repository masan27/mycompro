<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
        $url_pengalihan = str_replace(base_url(), '', current_url());
        $this->session->set_userdata('pengalihan', $url_pengalihan);

        $this->load->model('m_dashboard');
    }

    public function index()
    {
        $data = array('title'    => 'Dashboard');
        $this->load->view('admin/dashboard/index', $data, FALSE);
    }
}
