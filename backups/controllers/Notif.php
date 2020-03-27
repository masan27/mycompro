<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notif extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_notif');
  }

  public function index()
  {
    $data = $this->m_notif->get_notif();   
    // $data = false;
    echo json_encode($data);
  }
}