<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_kelas extends CI_Model
{
  private $_table = "t_kelas";

  public $id;
  public $kelas;
  public $hari;
  public $dosen;
  public $jam_mulai;
  public $jam_selesai;
  public $matkul;
  public $sks;

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
        'field' => 'matkul',
        'label' => 'Mata Kuliah',
        'rules' => 'required'
      ],
      [
        'field' => 'hari',
        'label' => 'Hari',
        'rules' => 'required'
      ],
      [
        'field' => 'jam_mulai',
        'label' => 'Jam Mulai',
        'rules' => 'required'
      ],
      [
        'field' => 'jam_selesai',
        'label' => 'Jam Selesai',
        'rules' => 'required'
      ],
      [
        'field' => 'sks',
        'label' => 'SKS',
        'rules' => 'required'
      ]
    ];
  }

  public function get_data_kelas($id = FALSE)
  {
    $this->db->select('
      kelas.id as id, 
      kelas.hari as kode, 
      kelas.matkul as matkul, 
      kelas.kelas as kelas, 
      kelas.dosen as dosen,
      kelas.jam_mulai as jam_mulai,
      kelas.jam_selesai as jam_selesai,
      kelas.sks as sks,
      hari.nama as hari
    ');
    $this->db->from('t_kelas as kelas');
    $this->db->join('m_hari as hari', 'hari.id = kelas.hari');
    $this->db->order_by('id', 'ASC');
    $this->db->group_by('id', 'ASC');
    if ($id === FALSE) {
      $query = $this->db->get($this->_table);
      return $query->result();
    }

    $query = $this->db->get_where($this->_table, array('kelas.id' => $id));
    return $query->row();
  }

  public function get_hari()
  {
    $query = $this->db->get('m_hari');
    return $query->result();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->kelas = $post['kelas'];
    $this->matkul = $post['matkul'];
    $this->hari = $post['hari'];
    $this->dosen = $post['dosen'];    
    $this->jam_mulai = str_replace('.', ':', $post['jam_mulai']) . ':00';
    $this->jam_selesai = str_replace('.', ':', $post['jam_selesai']) . ':00';
    $this->sks = $post['sks'];
    $this->db->insert($this->_table, $this);
  }

  public function edit($id)
  {
    $post = $this->input->post();
    $this->id = $id;
    $this->kelas = $post['kelas'];
    $this->matkul = $post['matkul'];
    $this->hari = $post['hari'];
    $this->dosen = $post['dosen'];
    $this->jam_mulai = str_replace('.', ':', $post['jam_mulai']);
    $this->jam_selesai = str_replace('.', ':', $post['jam_selesai']);
    $this->sks = $post['sks'];
    $this->db->where('id', $this->id);
    $this->db->update($this->_table, $this);
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id" => $id));
  }
}
