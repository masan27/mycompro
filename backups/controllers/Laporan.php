<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
	}

	public function index()
	{
		$laporan = $this->m_laporan;
		$data['absen'] = $laporan->get_data_absen();
		$data['sks'] = $laporan->cek_sks();
		$this->load->view('admin/lap_absen/index', $data);
	}

	public function print()
	{
		$this->load->library('Pdf');
		$laporan = $this->m_laporan;
		$data['absen'] = $laporan->get_data_absen();
		$data['sks'] = $laporan->cek_sks();
		$this->load->view('admin/lap_absen/print', $data);
	}
}