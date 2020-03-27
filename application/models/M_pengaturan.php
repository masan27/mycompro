<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function new_smt()
  {
    if ($this->session->level == 'admin') {
      $this->db->trans_start();
      $this->db->empty_table('t_absen');
      $this->db->empty_table('t_izin');
      $this->db->empty_table('t_jadwal');
      $this->db->empty_table('t_kelas');
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        return FALSE;
      } else {
        $this->db->trans_commit();
        return TRUE;
      }
    }
  }
}
