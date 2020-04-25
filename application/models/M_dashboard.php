<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function berita()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('berita');
		$query = $this->db->get();
		return $query->row();
	}	

	// Total download
	public function download()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('download');
		$query = $this->db->get();
		return $query->row();
	}

	// Total galeri
	public function galeri()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('galeri');
		$query = $this->db->get();
		return $query->row();
	}

	// Total user
	public function user()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('users');
		$query = $this->db->get();
		return $query->row();
	}

	// Total video
	public function video()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('video');
		$query = $this->db->get();
		return $query->row();
	}


	// Total kunjungan
	public function kunjungan()
	{
		$this->db->select('hari, COUNT(*) AS total');
		$this->db->from('kunjungan');
		$this->db->group_by('hari');
		$this->db->order_by('hari', 'desc');
		$this->db->limit(14);
		$query = $this->db->get();
		return $query->result();
	}
}
