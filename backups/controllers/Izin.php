<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Izin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
    $this->load->model('m_izin');
  }

  public function index()
  {
    $izin = $this->m_izin;
    $data_session = array(
      'lainnya' => 'izin'
    );
    $this->session->set_userdata($data_session);
    $data['items'] = $izin->get_data_izin();
    $this->load->view('admin/izin/index', $data);
  }

  public function add()
  {
    $izin = $this->m_izin;
    $data['jadwal'] = $izin->get_jadwal();
    $validation = $this->form_validation;
    $validation->set_rules($izin->rules());
    if ($validation->run()) {
      $izin->save();
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
      redirect(base_url('admin/lainnya_izin'));
    }
    $this->load->view('admin/izin/add', $data);
  }

  // public function edit($id)
  // {
  //   if (!isset($id)) show_404();

  //   $izin = $this->m_izin;    
  //   $data['items'] = $izin->get_data_izin($id);
  //   $validation = $this->form_validation;
  //   $validation->set_rules($izin->rules());
  //   if ($validation->run()) {
  //     $izin->edit($id);
  //     $this->session->set_flashdata('success', 'Data berhasil disimpan');
  //     redirect(base_url('admin/lainnya_izin'));
  //   }
  //   $this->load->view('admin/lainnya_izin/edit', $data);
  // }

  public function delete($id)
  {
    if (!isset($id)) show_404();

    if ($this->m_izin->delete($id)) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect(base_url('admin/lainnya_izin'));
    }
  }

  public function acc_list()
  {
    $izin = $this->m_izin;
    $data_session = array(
      'lainnya' => 'bungkus'
    );
    $this->session->set_userdata($data_session);
    $data['items'] = $izin->get_data_izin();
    $this->load->view('admin/izin/acc', $data);
  }

  public function acc_confirm($id)
  {
    $izin = $this->m_izin;
    $cek = $izin->check($id);
    if ($cek->astur == NULL | $cek->astur == "" ) {      
      if  ($izin->acc($id))
      {
        $this->session->set_flashdata('success', 'Data berhasil diperbarui');
        redirect(base_url('admin/lainnya_acc'));
      }
      else {
        $this->session->set_flashdata('error', 'Maaf proses anda gagal, silahkan coba lagi');
      }
    }
    else {
      $this->session->set_flashdata('error', 'Maaf kelas ini sudah di isi');
    }    
    redirect(base_url('admin/lainnya_acc'));
  }

  public function acc_cancel($id)
  {
    $izin = $this->m_izin;
    $cek = $izin->check($id);    
      if ($izin->cancel($id)) {
        $this->session->set_flashdata('success', 'Data berhasil diperbarui');
        redirect(base_url('admin/lainnya_acc'));
      } else {
        $this->session->set_flashdata('error', 'Maaf proses anda gagal, silahkan coba lagi');
      }    
    // $data['items'] = $izin->get_data_izin();
    redirect(base_url('admin/lainnya_acc'));
  }
}
