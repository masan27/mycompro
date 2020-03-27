<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('username') == "") {
			$this->session->set_flashdata('message', 'Silahkan Login terlebih dahulu.');
			redirect(base_url("login"));
		}
	}
}
