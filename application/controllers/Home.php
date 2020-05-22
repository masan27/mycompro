<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('berita_model');
		$this->load->model('galeri_model');
		$this->load->model('video_model');
		$this->load->model('nav_model');
	}

	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();
		$slider 		= $this->galeri_model->slider();
		$popup 			= $this->galeri_model->popup_aktif();
		$headline		= $this->berita_model->listing_headline();
		$galeri 		= $this->galeri_model->galeri_home();
		$kategori_galeri = $this->galeri_model->kategori();
		$video 			= $this->video_model->homepage();		
		$layanan 		= $this->nav_model->nav_layanan();
		$profil 		= $this->nav_model->nav_profil();		
		$berita 	= $this->berita_model->newest();

		$data = array(
			'title'				=> 'Beranda',
			'deskripsi'			=> 'Pembuatan Aplikasi WEB',
			'keywords'			=> 'Web Programming',
			'site'				=> $site,
			'slider'			=> $slider,
			'headline'			=> $headline,
			'berita'			=> $berita,
			'popup'				=> $popup,
			'galeri'			=> $galeri,
			'video'				=> $video,
			'kategori_galeri'	=> $kategori_galeri,			
			'layanan'			=> $layanan,
			'profil'			=> $profil,
			'isi'				=> 'home/list'
		);
		$this->load->view('layout/wrapper', $data);
	}

	// Oops
	public function oops()
	{
		$site 			= $this->konfigurasi_model->listing();

		$data = array(
			'title'				=> 'Not found',
			'deskripsi'			=> '404',
			'keywords'			=> '404',
			'site'				=> $site,
			'isi'				=> 'home/oops'
		);

		$this->load->view('404');
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
