<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_jadwal');
  }

  public function index()
  {
    $jadwal = $this->m_jadwal;
    $data['items'] = $jadwal->get_data_jadwal();    
    $this->load->view('admin/jadwal/index', $data);
  }

  public function add()
  {
    $jadwal = $this->m_jadwal;
    $validation = $this->form_validation;
    $validation->set_rules($jadwal->rules());
    $data['kelas'] = $jadwal->get_kelas();
    $data['astur'] = $jadwal->get_astur();

    if ($validation->run()) {
      $jadwal->save();
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
      redirect(base_url('admin/jadwal'));
    }

    $this->load->view('admin/jadwal/add', $data);
  }

  public function edit($id)
  {
    if (!isset($id)) show_404();

    $jadwal = $this->m_jadwal;
    $validation = $this->form_validation;
    $validation->set_rules($jadwal->rules());
    $data['items'] = $jadwal->get_data_jadwal($id);
    $data['kelas'] = $jadwal->get_kelas();
    $data['astur'] = $jadwal->get_astur();

    if ($validation->run()) {
      $jadwal->edit($id);
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect(base_url('admin/jadwal'));
    }

    $this->load->view('admin/jadwal/edit', $data);
  }

  public function delete($id = null)
  {
    if (!isset($id)) show_404();

    if ($this->m_jadwal->delete($id)) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect(base_url('admin/jadwal'));
    }
  }
}