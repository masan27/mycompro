<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('username') == "") {
			$this->session->set_flashdata('message', 'Silahkan Login terlebih dahulu.');
			redirect(base_url("login"));
		}

		$this->db->select('gambar, nama');
		$this->db->where('id', $this->session->user_id);
		$query = $this->db->get('t_user');
		$update = $query->row();
		$foto = 'anom.png';
		$nama = $this->session->nama;
		if ($update->gambar != NULL) {
			$foto = $update->gambar;			
			$nama = $update->nama;
		}
		$data_session = array(
			'foto' => $foto,
			'nama' => $nama
		);
		$this->session->set_userdata($data_session);
	}
}
