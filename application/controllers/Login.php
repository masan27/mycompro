<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	// Login page
	public function index()
	{
		// Validasi input
		$model = $this->m_kelas;
		$validation = $this->form_validation;
		$validation->set_rules($model->rules());

		if ($this->form_validation->run()) {
			$post = $this->input->post();

			$user = $post('username');
			$pass = $post('password');
			// Proses ke simple login
			$this->simple_login->login($user, $pass);
		}
		// End validasi

		$data = array('title'		=> 'Halaman Login');
		$this->load->view('login/list', $data, FALSE);
	}

	// Logout
	public function logout()
	{
		// Panggil library logout
		$this->simple_login->logout();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
