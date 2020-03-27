<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class libur extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_libur');
  }

  public function index()
  {
    $libur = $this->m_libur;
    $data['items'] = $libur->get_data();

    $this->load->view('admin/libur/index', $data);
  }

  public function add()
  {
    $libur = $this->m_libur;
    $validation = $this->form_validation;
    $validation->set_rules($libur->rules());

    if ($validation->run()) {
      $libur->save();
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
      redirect(base_url('admin/libur'));
    }

    $this->load->view('admin/libur/add');
  }

  public function edit($id)
  {
    $libur = $this->m_libur;
    $validation = $this->form_validation;
    $validation->set_rules($libur->rules());

    $data['items'] = $libur->get_data($id);

    if ($validation->run()) {
      $libur->update($id);
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect(base_url('admin/libur'));
    }

    $this->load->view('admin/libur/edit', $data);
  }

  public function delete($id = null)
  {
    if (!isset($id)) show_404();

    if ($this->m_libur->delete($id)) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect(base_url('admin/libur'));
    }
  }
}