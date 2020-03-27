<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_absen extends CI_Model
{
	private $_table = "t_absen";

	public $id;
	public $astur;
	public $tanggal;
	public $jadwal;
	// public $jam_masuk;
	// public $jam_keluar;
	public $topik;
	public $ket;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_jadwal($id = FALSE)
	{
		$this->db->where('astur_id', $this->session->user_id);
		$this->db->where('kode_hari', date('N'));
		$this->db->order_by('mulai', 'ASC');
		if ($id === FALSE) {
			$query = $this->db->get('v_jadwal');
			return $query->result();
		}
		$this->db->where('id', $id);
		$query = $this->db->get('v_jadwal');
		return $query->row();
	}

	public function get_dari_izin()
	{
		$this->db->where('dari', $this->session->user_id);
		$this->db->where('tanggal', date('Y-m-d'));
		$query = $this->db->get('v_izin');
		return $query->result();
	}

	public function get_data_izin()
	{
		$this->db->where('astur_id', $this->session->user_id);
		$this->db->where('tanggal', date('Y-m-d'));
		$query = $this->db->get('v_izin');
		return $query->result();
	}

	// public function checking($id)
	// {
	// 	$this->db->where('jadwal', $id);
	// 	$query = $this->db->get('v_absen');
	// 	return $query->row();
	// }

	public function cek_absen($id)
	{
		$this->db->select_max('id');
		$this->db->where('astur', $this->session->user_id);
		$this->db->where('jadwal', $id);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function checking($id)
	{
		$this->db->select('ket, tanggal');
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function save($id)
	{
		$post = $this->input->post();
		$this->astur = $this->session->user_id;
		$this->tanggal = date('Y-m-d');
		$this->jadwal = $id;
		// $this->jam_masuk = date('H:i:s');
		// $this->jam_keluar = date('H:i:s');
		$this->topik = "";
		$this->ket = "N";
		$this->db->insert($this->_table, $this);
	}

	public function end($id)
	{
		$this->db->set('ket', "Y");
		$this->db->where('id', $id);
		$this->db->update('t_absen');
	}

	public function change($id)
	{
		$this->db->set('ket', "Y");
		$this->db->where('id', $id);
		$this->db->update('t_absen');
	}
}
