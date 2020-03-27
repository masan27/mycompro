<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
	}

	function index()
	{
		redirect(base_url('dashboard'));
	}
}
