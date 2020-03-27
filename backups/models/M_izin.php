<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_izin extends CI_Model
{
  private $_table = "t_izin";

  public $id;
  public $tanggal;
  public $jadwal;
  public $astur;
  public $dari;

  public function __construct()
  {
    parent::__construct();
  }

  public function rules()
  {
    return [
      [
        'field' => 'jadwal',
        'label' => 'Kelas',
        'rules' => 'required'
      ]
    ];
  }

  public function get_data_izin($id = FALSE)
  {
    if ($id === FALSE) {
      if ($this->session->lainnya == 'izin') {
        $this->db->where('dari', $this->session->user_id);
      } else {
        $this->db->where('dari !=', $this->session->user_id);
      }
      $this->db->where('tanggal >=', date('Y-m-d'));
      $query = $this->db->get('v_izin');
      return $query->result();
    }    
    $query = $this->db->get_where('v_izin', array('id' => $id));
    return $query->row();
  }

  public function get_jadwal($id = FALSE)
  {
    if (isset($_REQUEST['tanggal'])) {
      $tanggal = date('N', strtotime($_REQUEST['tanggal']));
      if ($_REQUEST['tanggal'] == "") {
        $tanggal = date('N', strtotime(date('Y-m-d')));
      }
    } else {
      $tanggal = date('N', strtotime(date('Y-m-d')));
    }
    $this->db->where('astur_id', $this->session->user_id);
    $this->db->where('kode_hari', $tanggal);
    $query = $this->db->get('v_jadwal');
    return $query->result();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->tanggal = $post['tanggal'];
    $this->jadwal = $post['jadwal'];
    $this->astur = 0;
    $this->dari = $this->session->user_id;
    $this->db->insert($this->_table, $this);
  }

  // public function edit($id)
  // {
  //   $post = $this->input->post();
  //   $this->id = $id;
  //   $this->tanggal = $post['tanggal'];
  //   $this->jadwal = $post['jadwal'];
  //   $this->astur = '';
  //   $this->db->where('id', $this->id);
  //   $this->db->update($this->_table, $this);
  // }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id" => $id));
  }

  public function check($id)
  {
    $this->db->select('astur');
    $this->db->where('id', $id);
    $this->db->get($this->_table);
  }

  public function acc($id)
  {
    $this->db->set('astur', $this->session->user_id);
    $this->db->where('id', $id);
    $this->db->update($this->_table);
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function cancel($id)
  {
    $this->db->set('astur', NULL);
    $this->db->where('id', $id);
    $this->db->update($this->_table);
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
