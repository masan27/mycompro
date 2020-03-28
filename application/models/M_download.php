<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_download extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// Listing data
	public function listing() {
		$this->db->select('download.*, kategori_download.nama_kategori_download, users.nama');
		$this->db->from('download');
		// Join dg 2 tabel
		$this->db->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
		$this->db->join('users','users.id_user = download.id_user','LEFT');
		// End join
		$this->db->order_by('id_download','DESC');
		$query = $this->db->get();
		return $query->result();
	}
}
