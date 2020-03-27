<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_data_absen()
	{
		$this->db->select('*');
		$this->db->from('v_absen');
		if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {				
			$tgl_dari = $_REQUEST['tgl_dari'];
			$tgl_samp = $_REQUEST['tgl_samp'];
		} else {
			$tgl_dari = date('Y-m-d');
			$tgl_samp = date('Y-m-d');		
	  } 
		$this->db->where("tanggal BETWEEN '" . $tgl_dari . "' AND '" . $tgl_samp . "'");
		$query = $this->db->get();
		return $query->result();
	}

	// public function get_jumlah_absen()
	// {
	// 	$this->db->select('COUNT(DISTINCT tanggal) AS jumlah');
	// 	$this->db->from('t_absen');
	// 	$this->db->where('user', $this->session->username);
	// 	if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {				
	// 		$tgl_dari = $_REQUEST['tgl_dari'];
	// 		$tgl_samp = $_REQUEST['tgl_samp'];
	// 	} else {
	// 		$tgl_dari = date('Y-m-d');
	// 		$tgl_samp = date('Y-m-d');		
	//   }		
	// 	$this->db->where("tanggal BETWEEN '" . $tgl_dari . "' AND '" . $tgl_samp . "'");		
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	// public function count_baris($tgl)
	// {
	// 	$this->db->select('COUNT(tanggal) AS jumlah');
	// 	$this->db->from('t_absen');
	// 	$this->db->where('user', $this->session->username);		
	// 	$this->db->where('tanggal', $tgl);		
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	public function cek_sks()
	{
		$this->db->select('sum(sks) as sks , nama');
		if (isset($_REQUEST['tgl_dari']) && isset($_REQUEST['tgl_samp'])) {
			$tgl_dari = $_REQUEST['tgl_dari'];
			$tgl_samp = $_REQUEST['tgl_samp'];
		} else {
			$tgl_dari = date('Y-m-d');
			$tgl_samp = date('Y-m-d');
		}
		$this->db->where("tanggal BETWEEN '" . $tgl_dari . "' AND '" . $tgl_samp . "'");
		$this->db->group_by('astur_id', 'ASC');
		$query = $this->db->get('v_absen');
		return $query->result();
	}
}