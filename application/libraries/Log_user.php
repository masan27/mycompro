<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_user
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->model('m_kunjungan');
        $this->CI->load->model('m_user');
	}

	// Inser user log
	public function add_log() {
		if($this->CI->uri->segment(1)=="admin")
		{
			$url_log	= str_replace('index.php/','',current_url());
			if($this->CI->session->userdata('id_user') != "") {
				$id_log			= $this->CI->session->userdata('id_user');
				$user_log 		= $this->CI->m_user->detail($id_log);
				$username_log 	= $user_log->username;
				$akses_level = $this->CI->session->userdata('akses_level');
			}else{
				$id_log			= 0;
				$username_log 	= '-';
			}
			$data_log = array(	'ip_address'	=> $this->CI->input->ip_address(),
								'id_user'		=> $id_log,
								'username'		=> $username_log,
								'url'			=> $url_log,
								'akses_level'	=> $akses_level
							);
			$this->CI->m_kunjungan->data_log($data_log);
		}elseif($this->CI->uri->segment(1)=="login")
		{
			$url_log	= str_replace('index.php/','',current_url());

			if($this->CI->session->userdata('id_user') != "") {
				$id_log			= $this->CI->session->userdata('id_user');
				$user_log 		= $this->CI->m_user->detail($id_log);
				$username_log 	= $user_log->username;
			}else{
				$id_log			= 0;
				$username_log 	= '-';
			}
			$data_log = array(	'ip_address'	=> $this->CI->input->ip_address(),
								'id_user'		=> $id_log,
								'username'		=> $username_log,
								'url'			=> $url_log
							);
			$this->CI->m_kunjungan->data_log($data_log);
		}
	}

}

/* End of file Log_user.php */
/* Location: ./application/libraries/Log_user.php */
