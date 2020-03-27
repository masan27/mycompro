<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_kelas');
  }

  public function index()
  {
    $kelas = $this->m_kelas;
    $data['items'] = $kelas->get_data_kelas();

    $this->load->view('admin/kelas/index', $data);
  }

  public function add()
  {
    $kelas = $this->m_kelas;
    $validation = $this->form_validation;
    $validation->set_rules($kelas->rules());
    $data['hari'] = $kelas->get_hari();

    if ($validation->run()) {
      $kelas->save();
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
      redirect(base_url('admin/kelas'));
    }

    $this->load->view('admin/kelas/add', $data);
  }

  public function edit($id)
  {
    $kelas = $this->m_kelas;
    $validation = $this->form_validation;
    $validation->set_rules($kelas->rules());
    $data['hari'] = $kelas->get_hari();
    $data['items'] = $kelas->get_data_kelas($id);

    if ($validation->run()) {
      $kelas->edit($id);
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect(base_url('admin/kelas'));
    }

    $this->load->view('admin/kelas/edit', $data);
  }

  public function delete($id = null)
  {
    if (!isset($id)) show_404();

    if ($this->m_kelas->delete($id)) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect(base_url('admin/kelas'));
    }
  }
}
