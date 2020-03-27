<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model
{
  private $_table = "t_user";

  public $id;
  public $username;
  public $nama;
  public $password;  
  // public $repassword;
  public $level;

  public function __construct()
  {
    parent::__construct();
  }

  public function rules()
  {
    return [
      [
        'field' => 'username',
        'label' => 'NIM / NIK',
        'rules' => 'required'
      ],
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'required'
      ],
      [
        'field' => 'password',
        'label' => 'Kata Sandi',
        'rules' => 'required|min_length[6]'
      ],
      [
        'field' => 'repassword',
        'label' => 'Ulangi Kata Sandi',
        'rules' => 'required|matches[password]'
      ]
    ];
  }

  public function rules2()
  {
    return [
      [
        'field' => 'username',
        'label' => 'NIM / NIK',
        'rules' => 'required'
      ],
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'required'
      ],
      [
        'field' => 'password',
        'label' => 'Kata Sandi Baru',
        'rules' => 'required|min_length[6]'
      ],
      [
        'field' => 'password1',
        'label' => 'Kata Sandi Lama',
        'rules' => 'required'
      ],
      [
        'field' => 'repassword',
        'label' => 'Ulangi Kata Sandi',
        'rules' => 'required|matches[password1]'
      ]
    ];
  }

  public function get_data_user($id = FALSE, $level)
  {    
    $this->db->order_by('id', 'ASC');
    $this->db->group_by('id', 'ASC');
    $this->db->where('level', $level);
    if ($id === FALSE) {
      $query = $this->db->get($this->_table);
      return $query->result();
    }

    $query = $this->db->get_where($this->_table, array('id' => $id));
    return $query->row();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->username = $post['username'];
    $this->nama = $post['nama'];
    $this->password = sha1('thecroc ' . $post['password']);
    $this->level = $post['level'];
    $this->db->insert($this->_table, $this);
  }

  public function edit($id)
  {
    $post = $this->input->post();
    $this->id = $id;
    $this->username = $post['username'];
    $this->nama = $post['nama'];
    $this->password = sha1('thecroc ' . $post['password']);
    $this->level = $post['level'];
    $this->db->where('id', $this->id);
    $this->db->update($this->_table, $this);
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id" => $id));
  }
}