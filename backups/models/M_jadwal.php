<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_jadwal extends CI_Model
{
  private $_table = "t_jadwal";

  public $id;
  public $kelas;
  public $astur;  

  public function __construct()
  {
    parent::__construct();
  }

  public function rules()
  {
    return [
      [
        'field' => 'kelas',
        'label' => 'Kelas',
        'rules' => 'required'
      ],
      [
        'field' => 'astur',
        'label' => 'Asisten Dosen',
        'rules' => 'required'
      ]
    ];
  }

  public function get_data_jadwal($id = FALSE)
  {
    $this->db->select('
      jadwal.id as id, 
      jadwal.kelas as kelas, 
      jadwal.astur as astur, 
      kelas.kelas as nama_kelas,
      kelas.jam_mulai as mulai,
      kelas.jam_selesai as selesai,
      kelas.matkul as matkul,      
      user.nama as nama_astur,
      hari.nama as hari,
      hari.id as hari_id
    ');
    $this->db->from('t_jadwal as jadwal');
    $this->db->join('t_kelas as kelas', 'kelas.id = jadwal.kelas');
    $this->db->join('t_user as user', 'user.id = jadwal.astur');
    $this->db->join('m_hari as hari', 'hari.id = kelas.hari');
    $this->db->order_by('id', 'ASC');
    $this->db->group_by('id', 'ASC');
    if ($id === FALSE) {
      $query = $this->db->get($this->_table);
      return $query->result();
    }

    $query = $this->db->get_where($this->_table, array('jadwal.id' => $id));
    return $query->row();
  }

  public function get_kelas()
  {    
    $query = $this->db->get('v_kelas');
    return $query->result();
  }

  public function get_astur()
  {
    $this->db->where('level', 'astur');
    $query = $this->db->get('t_user');
    return $query->result();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->kelas = $post['kelas'];
    $this->astur = $post['astur'];
    $this->db->insert($this->_table, $this);
  }

  public function edit($id)
  {    
    $post = $this->input->post();
    $this->id = $id;
    $this->kelas = $post['kelas'];
    $this->astur = $post['astur'];
    $this->db->where('id', $this->id);
    $this->db->update($this->_table, $this);
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id" => $id));
  }
}