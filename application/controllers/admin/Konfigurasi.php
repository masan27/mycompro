<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace(base_url(), '', current_url());
		$this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login();
		$this->log_user->add_log();
	}

	//* List
	public function index()
	{
		$data = array(
			'title'		=> 'Web'
		);
		$this->load->view('admin/konfigurasi/index', $data);
	}

	//* Umum
	public function umum()
	{
		$site = $this->konfigurasi_model->listing();

		// Validasi 
		$this->form_validation->set_rules('namaweb', 'Website name website', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');

		if ($this->form_validation->run() === FALSE) {

			$data = array(
				'title'	=> 'Web - Umum',
				'site'	=> $site,
			);
			$this->load->view('admin/konfigurasi/umum', $data);
		} else {
			$i = $this->input;
			$data = array(
				'id_konfigurasi'	=> $i->post('id_konfigurasi'),
				'namaweb'			=> $i->post('namaweb'),
				'email'				=> $i->post('email'),
				'email_cadangan'				=> $i->post('email_cadangan'),
				'alamat'			=> $i->post('alamat'),
				'telepon'			=> $i->post('telepon'),
				'hp'				=> $i->post('hp'),
				'fax'				=> $i->post('fax'),
				'whatsapp'			=> $i->post('whatsapp'),
				'facebook'			=> $i->post('facebook'),
				'twitter'			=> $i->post('twitter'),
				'instagram'			=> $i->post('instagram'),
				'google_map'		=> $i->post('google_map'),
				'id_user'			=> $this->session->id_user
			);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('success', 'Pangaturan Web Umum berhasil diubah');
			redirect(base_url('admin/pengaturan/web'));
		}
	}

	//* New logo
	public function logo()
	{
		$site = $this->konfigurasi_model->listing();

		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required');

		if ($v->run()) {

			$config['upload_path'] 		= './upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo')) {

				$data = array(
					'title'	=> 'Web - Logo',
					'site'	=> $site,
					'error'	=> $this->upload->display_errors()
				);
				$this->load->view('admin/konfigurasi/logo', $data);
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './upload/image/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				if ($site->logo != 'logo_awal.png') {
					unlink('./upload/image/' . $site->logo);
					unlink('./upload/image/thumbs/' . $site->logo);
				}
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(
					'id_konfigurasi' => $i->post('id_konfigurasi'),
					'logo'			=> $upload_data['uploads']['file_name'],
					'id_user'			=> $this->session->userdata('id')
				);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('success', 'Logo changed');
				redirect(base_url('admin/pengaturan/web'));;
			}
		}
		// Default page
		$data = array(
			'title'	=> 'Web - Logo',
			'site'	=> $site
		);
		$this->load->view('admin/konfigurasi/logo', $data);
	}


	//* New Icon
	public function icon()
	{
		$site = $this->konfigurasi_model->listing();

		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required');

		if ($v->run()) {

			$config['upload_path'] 		= './upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|ico';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('icon')) {

				$data = array(
					'title'	=> 'Web - Icon',
					'site'	=> $site,
					'error'	=> $this->upload->display_errors()
				);
				$this->load->view('admin/konfigurasi/icon', $data);
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './upload/image/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				if ($site->icon != 'awal.ico') {
					unlink('./upload/image/' . $site->icon);
					unlink('./upload/image/thumbs/' . $site->icon);
				}
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(
					'id_konfigurasi' => $i->post('id_konfigurasi'),
					'icon'			=> $upload_data['uploads']['file_name'],
					'id_user'			=> $this->session->id_user
				);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('success', 'Icon berhasil diubah');
				redirect(base_url('admin/pengaturan/web'));
			}
		}
		// Default page
		$data = array(
			'title'	=> 'Web - Icon',
			'site'	=> $site
		);
		$this->load->view('admin/konfigurasi/icon', $data);
	}
}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */
