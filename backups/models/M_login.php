<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{
	private $_table = 't_user';

	public $id;
	public $username;	
	public $password;
	public $nama;

	public function __construct()
	{
		parent::__construct();
	}

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Nomor Induk Mahasiswa',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[6]'
			],
			[
				'field' => 'konfirmasi',
				'label' => 'Konfirmasi Kata Sandi',
				'rules' => 'required|matches[password]'
			]
		];
	}

	public function cek_user($table, $where)
	{
		$this->db->select('username, nama, id, level, masuk, gambar');
		$query = $this->db->get_where($table, $where);
		return $query->row();
	}

	public function validasi($id)
	{
		$this->db->set('masuk', 'N');
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}	
	
}
