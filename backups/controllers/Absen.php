<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_absen');
		$this->load->model('m_libur');
		$this->load->model('m_auth');
	}

	public function index()
	{
		$absen = $this->m_absen;
		$data['items'] = $absen->get_jadwal();
		$data['izin'] = $absen->get_data_izin();
		$data['dr_izin'] = $absen->get_dari_izin();
		$data['merah'] = $this->m_libur->get_data(); 
		$this->load->view('admin/absen/index', $data);
	}

	public function absen($id)
	{
		$absen = $this->m_absen;
		$cek = $this->m_absen->cek_absen($id);
		$check = $this->m_absen->checking($cek->id);
		if ($check == NULL) {
			$data_session = array(
				'keluar' => 'Y'
			);
			$this->session->set_userdata($data_session);
		} else {
			if ($check->tanggal == date('Y-m-d')) {
				if ($check->ket == 'N') {
					$data_session = array(
						'keluar' => 'N',
						'cek_ket' => "N",
						'lihat_topik' => "Y"
					);
				} else {
					$data_session = array(
						'keluar' => 'O',
						'cek_ket' => "N",
						'lihat_topik' => "Y"
					);
				}
			}
			else {				
				$data_session = array(
					'keluar' => 'Y'
				);
			}
		}
		$this->session->set_userdata($data_session);
		$jadwal = 'asli';
		$data['items'] = $absen->get_jadwal($id, $jadwal);

		$isi = $absen->get_jadwal($id);
		$data_session = array(
			'selesai' => $isi->selesai
		);
		$this->session->set_userdata($data_session);
		$this->load->view('admin/absen/astur', $data);
	}

	public function backup($id)
	{
		$absen = $this->m_absen;
		$cek = $this->m_absen->cek_absen($id);
		$check = $this->m_absen->checking($cek->id);
		if ($check == NULL) {
			$data_session = array(
				'keluar' => 'Y'
			);
			$this->session->set_userdata($data_session);
		} else {
			if ($check->ket == 'N') {
				$data_session = array(
					'keluar' => 'N',
					'cek_ket' => "N",
					'lihat_topik' => "Y"
				);
				$this->session->set_userdata($data_session);
			} else {
				$data_session = array(
					'keluar' => 'O',
					'cek_ket' => "N",
					'lihat_topik' => "Y"
				);
				$this->session->set_userdata($data_session);
			}
		}

		$jadwal = 'backup';
		$data['items'] = $absen->get_jadwal($id, $jadwal);
		$isi = $absen->get_jadwal($id);
		$data_session = array(
			'selesai' => $isi->selesai
		);
		$this->session->set_userdata($data_session);
		$this->load->view('admin/absen/astur', $data);
	}

	public function masuk($id)
	{
		$absen = $this->m_absen;

		$absen->save($id);
		$cek = $this->m_absen->cek_absen($id);

		$data_session = array(
			'cek_id' => $cek->id,
			'cek_ket' => "N"
		);
		$this->session->set_userdata($data_session);
		$this->session->set_flashdata('success', 'Berhasil masuk');

		redirect(base_url('admin/absen/astur/' . $id));
	}

	public function keluar($id)
	{
		$selesai = date('H:i', strtotime('-15 minutes', strtotime($this->session->selesai)));
		if (date('H:i') >= $selesai) {
			$absen = $this->m_absen;
			$absen->end($id);
			$this->session->unset_userdata('cek_ket');
			$this->session->unset_userdata('cek_id');
			$this->session->unset_userdata('lihat_topik');
			$this->session->set_flashdata('success', 'Berhasil keluar');
		} else {
			$this->session->set_flashdata('error', 'Maaf sepertinya belum saatnya anda absen keluar');
		}

		$data_session = array(
			'keluar' => 'Y'
		);
		$this->session->set_userdata($data_session);

		redirect(base_url('admin/absen/astur/' . $id));
	}
}
