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
				'rules' => 'required'
			]
		];
	}

	public function login($username,$password)
	{
		$this->db->select('users.*,
							bagian.nama_bagian');
		$this->db->from('users');
		// join
		$this->db->join('bagian', 'bagian.id_bagian = users.id_bagian', 'left');
		// End join
		// where
		$this->db->where(array(	'username'	=> $username,
								'password'	=> sha1('thecroc '.$password)
							));
		$this->db->order_by('users.id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function cek_user($table, $where)
	{		
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
