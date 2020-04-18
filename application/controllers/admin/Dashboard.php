<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace(base_url(), '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->load->model('m_auth');
		$this->load->model('client_model');
		$this->load->model('staff_model');
		$this->load->model('client_model');
		$this->load->model('staff_model');
		$this->load->model('dasbor_model');
	}

	// Halaman dasbor
	public function index()
	{
		$client 				= $this->client_model->listing();
		$staff 					= $this->staff_model->listing();

		$data = array(	'title'					=> 'Halaman Dashboard',
						'client'				=> $client,
						'staff'					=> $staff
					);
		$this->load->view('admin/dashboard/index', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */