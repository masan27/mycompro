<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_profil extends CI_Model
{
  // private $_table = "t_jadwal";

  public function __construct()
  {
    parent::__construct();
  }

  public function rules()
  {
    return [
      [
        'field' => 'gambar',
        'label' => 'Gambar Baru',
        'rules' => 'required'
      ]
    ];
  }

  public function save_img()
  { }

  public function edit($id)
  {
    // $config['upload_path'] = './img/';
    // $config['allowed_types'] = 'gif|jpg|png|jpeg';
    // $config['max-size'] = 2048;
    // $config['file_name'] = $this->session->nama . '-' . date('H.m.s');

    $config['upload_path'] = './assets/upload/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '2048';
    $config['file_name'] = 'gambar' . time();

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
      $image = $this->upload->data(); 
    $this->db->set('gambar1', $image['file_name']);
    $this->db->where('id', $id);
    $this->db->update('t_user');
    }
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
