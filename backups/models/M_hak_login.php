<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_hak_login extends CI_Model
{
  // private $_table = "t_jadwal";

  public $id;
  public $kelas;
  public $astur;  

  public function __construct()
  {
    parent::__construct();
  }

  public function get_data()
  {
    $this->db->where('level', 'astur');
    $query = $this->db->get('t_user');
    return $query->result();
  }

  public function boleh_akses($id)
  {
    $this->db->set('masuk', 'Y');
    $this->db->where('id', $id);
    $this->db->update('t_user');
  }

  public function jangan_akses($id)
  {
    $this->db->set('masuk', 'N');
    $this->db->where('id', $id);
    $this->db->update('t_user');
  }
}