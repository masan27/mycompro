<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
  // private $_table = "t_jadwal";

  public $id;
  public $kelas;
  public $astur;

  public function __construct()
  {
    parent::__construct();
  }

  public function get_data_jadwal()
  {
    if ($this->session->level == 'astur') {
      $this->db->where('astur_id', $this->session->user_id);
    }
    $this->db->order_by('kode_hari, mulai, kelas', 'ASC');
    $query = $this->db->get('v_jadwal');
    return $query->result();
  }

  public function refesh_img()
  {
    $this->db->select('gambar');
    $this->db->where('id', $this->session->user_id);
    $query = $this->db->get('t_user');    
    return $query->row();
  }
}
