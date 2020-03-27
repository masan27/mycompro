<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_user');
  }

  public function admin()
  {
    $user = $this->m_user;
    $data['items'] = $user->get_data_user($id = FALSE, 'admin');
    $data_session = array(
      'user' => 'admin'
    );
    $this->session->set_userdata($data_session);
    $this->load->view('admin/user/index', $data);
  }

  public function astur()
  {
    $user = $this->m_user;
    $data['items'] = $user->get_data_user($id = FALSE, 'astur');
    $data_session = array(
      'user' => 'astur'
    );
    $this->session->set_userdata($data_session);
    $this->load->view('admin/user/index', $data);
  }

  public function add()
  {
    $user = $this->m_user;
    $validation = $this->form_validation;
    $validation->set_rules($user->rules());

    if ($validation->run()) {
      $user->save();
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
      redirect(base_url('admin/user/'.$this->session->user));
    }

    $this->load->view('admin/user/add');
  }

  public function edit($id)
  {
    if (!isset($id)) show_404();

    $user = $this->m_user;
    $validation = $this->form_validation;
    $validation->set_rules($user->rules());
    $data['items'] = $user->get_data_user($id, $this->session->user);

    if ($validation->run()) {
      $user->edit($id);
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect(base_url('admin/user/' . $this->session->user));
    }

    $this->load->view('admin/user/edit', $data);
  }

  public function delete($id = null)
  {
    if (!isset($id)) show_404();

    if ($this->m_user->delete($id)) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect(base_url('admin/user/' . $this->session->user));
    }
  }
}
