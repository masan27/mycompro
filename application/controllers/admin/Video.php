<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('video_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace(base_url(), '', current_url());
		$this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login();
		$this->log_user->add_log();
	}

	// Index
	public function index($id = false)
	{
		$video	= $this->video_model->listing();
		if ($id != false) {
			$edit = $this->video_model->detail($id);
		}
		$valid = $this->form_validation;
		$valid->set_rules('judul', 'Video title', 'required');

		if ($valid->run() === FALSE) {
			// Cancel Proses and Showing Error's

			$data = array(
				'title'	=> 'Video',
				'video'	=> $video
			);

			if ($id != false) {
				$data = array(
					'title'	=> 'Video',
					'video'	=> $video,
					'edit'	=> $edit
				);
			}
			$this->load->view('admin/video/index', $data);
			// Masuk database
		} else {
			if ($id != false) {
				$i = $this->input;
				$url = str_replace('https://www.youtube.com/watch?v=','', $i->post('video'));
				$data = array(
					'id_video'		=> $id,
					'judul'			=> $i->post('judul'),
					'posisi'		=> $i->post('posisi'),
					'keterangan'	=> $i->post('keterangan'),
					'video'			=> $url,
					'id_user'		=> $this->session->userdata('id_user')
				);
				$this->video_model->edit($data);
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect(base_url('admin/video'));
			} else {
				$i = $this->input;
				$url = str_replace('https://www.youtube.com/watch?v=','', $i->post('video'));
				$data = array(
					'judul'			=> $i->post('judul'),
					'posisi'		=> $i->post('posisi'),
					'keterangan'	=> $i->post('keterangan'),
					'video'			=> $url,
					'id_user'		=> $this->session->userdata('id_user')
				);
				$this->video_model->tambah($data);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect(base_url('admin/video'));
			}
		}
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if (isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_videonya		= $inp->post('id_video');

			for ($i = 0; $i < sizeof($id_videonya); $i++) {
				$video 	= $this->video_model->detail($id_videonya[$i]);
				if ($video->gambar != '') {
					unlink('./assets/upload/file/' . $video->gambar);
				}
				$data = array('id_video'	=> $id_videonya[$i]);
				$this->video_model->delete($data);
			}

			$this->session->set_flashdata('success', 'Data telah dihapus');
			redirect(base_url('admin/video'), 'refresh');
			// PROSES SETTING DRAFT
		}
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('judul', 'Video title', 'required');

		if ($v->run() === FALSE) {
			$data = array(
				'title'		=> 'Add Video',
				'isi'		=> 'admin/video/tambah'
			);
			$this->load->view('admin/layout/wrapper', $data);
			// Masuk database
		} else {

			$i = $this->input;
			$data = array(
				'judul'			=> $i->post('judul'),
				'posisi'		=> $i->post('posisi'),
				'keterangan'	=> $i->post('keterangan'),
				'video'			=> $i->post('video'),
				'urutan'		=> $i->post('urutan'),
				'id_user'		=> $this->session->userdata('id_user'),
				'bahasa'		=> $i->post('bahasa')
			);
			$this->video_model->tambah($data);
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect(base_url('admin/video'));
		}
	}

	// Edit
	public function edit($id_video)
	{
		// Dari database
		$video		= $this->video_model->detail($id_video);
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('judul', 'Video title', 'required');

		if ($v->run() === FALSE) {
			$data = array(
				'title'		=> 'Edit Video',
				'video'		=> $video,
				'isi'		=> 'admin/video/edit'
			);
			$this->load->view('admin/layout/wrapper', $data);
			// Masuk database
		} else {
			$i = $this->input;
			$data = array(
				'id_video'		=> $video->id_video,
				'judul'			=> $i->post('judul'),
				'posisi'		=> $i->post('posisi'),
				'keterangan'	=> $i->post('keterangan'),
				'video'			=> $i->post('video'),
				'urutan'		=> $i->post('urutan'),
				'id_user'		=> $this->session->userdata('id_user'),
				'bahasa'		=> $i->post('bahasa')
			);
			$this->video_model->edit($data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect(base_url('admin/video'));
		}
	}

	// Delete
	public function delete($id_video)
	{		
		$data = array('id_video'	=> $id_video);
		$this->video_model->delete($data);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect(base_url('admin/video'));
	}
}
