<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_berita extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// Listing data
	public function listing()
	{
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('users', 'users.id_user = berita.id_user', 'LEFT');
		// End join
		$this->db->order_by('id_berita', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}
