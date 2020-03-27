<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		// echo ' sessionya'.$_COOKIE['user'];
		if (isset($_COOKIE['user']) && isset($_COOKIE['pw'])) {
			$where = array(
				'username' => $_COOKIE['user'],
				'password' => sha1('thecroc ' . $_COOKIE['pw'])
			);
			$login = $this->m_login->cek_user("t_user", $where);
			$data_session = array(
				'username' => $login->username,
				'nama' => $login->nama,
				'status' => "login",
				'level' => $login->level,
				'user_id' => $login->id
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('admin'));
		}
		$this->load->view('v_login');
	}

	public function proses_login()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$where = array(
			'username' => $user,
			'password' => sha1('thecroc ' . $pass)
		);
		$login = $this->m_login->cek_user("t_user", $where);



		//? login berhasil??
		if ($login != NULL) {				
			//? cek sudah login di device lain?
			if ($login->masuk == 'Y') {
				$data_session = array(
					'username' => $login->username,
					'nama' => $login->nama,
					'status' => "login",
					'level' => $login->level,
					'user_id' => $login->id
				);
				if ($login->level == 'astur') {
					$this->m_login->validasi($login->id);
				}
				set_cookie('user', $user, time() + (86400 * 30));
				set_cookie('pw', $pass, time() + (86400 * 30));
				$this->session->set_userdata($data_session);
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('message', 'Maaf akun anda masih terhubung di perangkat lain..');
				$this->session->sess_destroy();
				delete_cookie('user');
				delete_cookie('pw');
				$data_session = array(
					'nama' => $login->nama,
					'gagal' => 'Y'
				);
				$this->session->set_userdata($data_session);
				$this->load->view('v_login');
			}
		} else {
			// login gagal 
			$this->session->set_flashdata('message', 'Username atau Password Salah!');
			redirect(base_url('login'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		delete_cookie('user');
		delete_cookie('pw');
		redirect(base_url('login'));
	}
}
