<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_dashboard');
  }

  public function index()
  {
    $dashboard = $this->m_dashboard;
    $data['items'] = $dashboard->get_data_jadwal();    
    $this->load->view('admin/dashboard', $data);
  }

  public function refresh()
  {
    $dashboard = $this->m_dashboard;
    $img = $dashboard->refesh_img();
    $foto = 'anom.png';
    if ($img->gambar != NULL) {
      $foto = $img->gambar;
    }
    $data_session = array(
      'foto' => $foto,
    );
    $this->session->set_userdata($data_session);
  }
}