<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_profil');
  }

  public function index($id)
  {
    $this->load->view('admin/profil/edit');
  }

  public function edit($id)
  {
    $profil = $this->m_profil;
    // $validation = $this->form_validation;
    // $validation->set_rules($profil->rules());
    // $validation =  $this->form_validation->set_rules('userfile', 'Gambar Baru', 'required');

    // if ($validation->run()) {
    // else {          
    if ($profil->edit($id)) {      
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect(base_url('dashboard'));
    } else {
      $this->session->set_flashdata('error', 'Gagal, tidak memenuhi syarat gambar');
      $this->load->view('admin/profil/edit');
    }
    // }
  }

  public function do_upload()
  {
    $config['upload_path']          = './img/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 5000;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
      $error = array('error' => $this->upload->display_errors());

      $this->load->view('admin/profil/error', $error);
    } else {
      $data = array('upload_data' => $this->upload->data());

      $this->load->view('admin/profil/success', $data);
    }
  }
}
