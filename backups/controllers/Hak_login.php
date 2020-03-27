<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hak_login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_hak_login');
  }

  public function index()
  {
    $hak_login = $this->m_hak_login;
    $data['items'] = $hak_login->get_data();
    $this->load->view('admin/hak_login/index', $data);
  }

  public function boleh($id)
  {
    $hak_login = $this->m_hak_login;

    $hak_login->boleh_akses($id);
      $this->session->set_flashdata('success', 'Akses login berhasil diubah');
      redirect(base_url('admin/hak_login'));
    
  }

  public function jangan($id)
  {
    $hak_login = $this->m_hak_login;

    $hak_login->jangan_akses($id);
      $this->session->set_flashdata('success', 'Akses login berhasil diubah');
      redirect(base_url('admin/hak_login'));    
  }
}
