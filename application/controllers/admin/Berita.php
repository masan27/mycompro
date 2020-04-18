<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_model');
		$this->load->model('download_model');
		$this->load->model('galeri_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace(base_url(), '', current_url());
		$this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login();
	}

	// Halaman berita
	public function index()
	{
		$berita = $this->berita_model->listing();
		$site 	= $this->konfigurasi_model->listing();

		$data = array(
			'title'			=> 'Konten (' . count($berita) . ')',
			'berita'		=> $berita,
			'site'			=> $site
		);
		$this->load->view('admin/berita/index', $data, FALSE);
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if (isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_beritanya		= $inp->post('id_berita');

			for ($i = 0; $i < sizeof($id_beritanya); $i++) {
				$berita 	= $this->berita_model->detail($id_beritanya[$i]);
				if ($berita->gambar != '') {
					unlink('./assets/upload/berita/' . $berita->gambar);
					unlink('./assets/upload/berita/thumbs/' . $berita->gambar);
				}
				$data = array('id_berita'	=> $id_beritanya[$i]);
				$this->berita_model->delete($data);
			}

			$this->session->set_flashdata('success', 'Data telah dihapus');
			redirect(base_url('admin/berita'), 'refresh');
			// PROSES SETTING DRAFT
		} elseif (isset($_POST['draft'])) {
			$inp 				= $this->input->post();
			$id_beritanya		= $inp['id_berita'];

			// echo json_encode($id_beritanya);

			for ($i = 0; $i < count($id_beritanya); $i++) {
				$berita 	= $this->berita_model->detail($id_beritanya[$i]);
				$data = array(
					'id_berita'		=> $id_beritanya[$i],
					'status_berita'	=> 'Draft'
				);
				$this->berita_model->edit($data);
			}

			$this->session->set_flashdata('success', 'Data telah diset untuk tidak dipublikasikan');
			redirect(base_url('admin/berita'), 'refresh');
			// PROSES SETTING PUBLISH
		} elseif (isset($_POST['publish'])) {
			$inp 				= $this->input;
			$id_beritanya		= $inp->post('id_berita');

			for ($i = 0; $i < sizeof($id_beritanya); $i++) {
				$berita 	= $this->berita_model->detail($id_beritanya[$i]);
				$data = array(
					'id_berita'		=> $id_beritanya[$i],
					'status_berita'	=> 'Publish',
					'tanggal_publish' => date('Y-m-d H:i:s')
				);
				$this->berita_model->edit($data);
			}

			$this->session->set_flashdata('success', 'Data telah dipublikasikan');
			redirect(base_url('admin/berita'), 'refresh');
		}
	}


	// Tambah berita
	public function tambah()
	{
		// $this->session->set_userdata('upload_image_file_manager',true);
		$kategori = $this->kategori_model->listing();
		$this->session->set_userdata('upload_image_file_manager', true);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'judul_berita',
			'Judul',
			'required',
			array('required'	=> 'Judul harus diisi')
		);

		$valid->set_rules(
			'isi',
			'Isi',
			'required',
			array('required'	=> 'Isi berita harus diisi')
		);

		if ($valid->run()) {
			if (!empty($_FILES['gambar']['name'])) {
				$img_path = './upload/image/';
				$config['upload_path']   = $img_path;
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB  (MAX 12MB)
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// End validasi

					$data = array(
						'title'			=> 'Tambah Konten',
						'kategori'		=> $kategori,
						'error'    		=> $this->upload->display_errors()
					);
					$this->load->view('admin/berita/tambah', $data, FALSE);
					// Masuk database
				} else {
					$upload_data        		= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= $img_path . $upload_data['uploads']['file_name'];
					$config['new_image']     	= $img_path . 'thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       	= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       		= 360; // Pixel
					$config['height']       	= 360; // Pixel
					$config['x_axis']       	= 0;
					$config['y_axis']       	= 0;
					$config['thumb_marker']   	= '';
					$this->load->library('image_lib', $config);
					if (!$this->image_lib->resize()) {
						$data = array(
							'title'			=> 'Tambah Konten',
							'kategori'		=> $kategori,
							'error'    		=> $this->image_lib->display_errors()
						);
						$this->load->view('admin/berita/tambah', $data, FALSE);
					}
				}

				if ($this->upload->do_upload('gambar') && $this->image_lib->resize()) {

					$i 		= $this->input;
					$slug 	= url_title($i->post('judul_berita'), 'dash', TRUE);

					$data = array(
						'id_kategori'	=> $i->post('id_kategori'),
						'id_user'		=> $this->session->userdata('id_user'),
						'slug_berita'	=> $slug,
						'judul_berita'	=> $i->post('judul_berita'),
						'isi'			=> $i->post('isi'),
						'jenis_berita'	=> $i->post('jenis_berita'),
						'status_berita'	=> $i->post('status_berita'),
						'gambar'		=> $upload_data['uploads']['file_name'],
						'icon'			=> $i->post('icon'),
						'keywords'		=> $i->post('keywords'),
						'tanggal_publish' => date('Y-m-d', strtotime($i->post('tanggal_publish'))) . ' ' . $i->post('jam_publish'),
						// 'tanggal_mulai'		=> $i->post('tanggal_mulai'),
						// 'tanggal_selesai'		=> $i->post('tanggal_selesai'),
						'urutan'	=> $i->post('urutan'),
						'tanggal_post'	=> date('Y-m-d H:i:s'),
					);
					$this->berita_model->tambah($data);
					$this->session->set_flashdata('success', 'Data telah ditambah');
					redirect(base_url('admin/berita'), 'refresh');
				}
			} else {
				$i 		= $this->input;
				$slug 	= url_title($i->post('judul_berita'), 'dash', TRUE);

				$data = array(
					'id_kategori'	=> $i->post('id_kategori'),
					'id_user'		=> $this->session->userdata('id_user'),
					'slug_berita'	=> $slug,
					'judul_berita'	=> $i->post('judul_berita'),
					'isi'			=> $i->post('isi'),
					'jenis_berita'	=> $i->post('jenis_berita'),
					'status_berita'	=> $i->post('status_berita'),
					'icon'			=> $i->post('icon'),
					'keywords'		=> $i->post('keywords'),
					'tanggal_publish' => date('Y-m-d', strtotime($i->post('tanggal_publish'))) . ' ' . $i->post('jam_publish'),
					// 'tanggal_mulai'		=> $i->post('tanggal_mulai'),
					// 'tanggal_selesai'		=> $i->post('tanggal_selesai'),
					'urutan'	=> $i->post('urutan'),
					'tanggal_post'	=> date('Y-m-d H:i:s'),
				);
				$this->berita_model->tambah($data);
				$this->session->set_flashdata('success', 'Data telah ditambah');
				redirect(base_url('admin/berita/jenis_berita/' . $i->post('jenis_berita')), 'refresh');
			}
		} else {
			// End masuk database
			$data = array(
				'title'			=> 'Tambah Konten',
				'kategori'		=> $kategori
			);
			$this->load->view('admin/berita/tambah', $data, FALSE);
		}
	}

	// Edit berita
	public function edit($id_berita)
	{
		$this->session->set_userdata('upload_image_file_manager', true);
		$kategori 	= $this->kategori_model->listing();
		$berita 	= $this->berita_model->detail($id_berita);
		$this->session->set_userdata('upload_image_file_manager', true);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'judul_berita',
			'Judul',
			'required',
			array('required'	=> 'Judul harus diisi')
		);

		$valid->set_rules(
			'isi',
			'Isi',
			'required',
			array('required'	=> 'Isi berita harus diisi')
		);

		if ($valid->run()) {

			if (!empty($_FILES['gambar']['name'])) {

				$config['upload_path']   = './assets/upload/image/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB  
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// End validasi

					$data = array(
						'title'			=> 'Edit Konten',
						'kategori'		=> $kategori,
						'berita'		=> $berita,
						'error'    		=> $this->upload->display_errors()
					);
					$this->load->view('admin/berita/edit', $data, FALSE);
					// Masuk database
				} else {
					$upload_data        		= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
					$config['new_image']     	= './assets/upload/image/thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       	= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       		= 360; // Pixel
					$config['height']       	= 360; // Pixel
					$config['x_axis']       	= 0;
					$config['y_axis']       	= 0;
					$config['thumb_marker']   	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if (!$this->image_lib->resize()) {
						$data = array(
							'title'			=> 'Edit Konten',
							'kategori'		=> $kategori,
							'error'    		=> $this->image_lib->display_errors()
						);
						$this->load->view('admin/berita/edit', $data, FALSE);
					}
				}

				if ($this->upload->do_upload('gambar') && $this->image_lib->resize()) {

					//Hapus gambar
					if ($berita->gambar != "") {
						unlink('./assets/upload/image/' . $berita->gambar);
						unlink('./assets/upload/image/thumbs/' . $berita->gambar);
					}
					// End hapus

					$i 		= $this->input;
					$slug 	= url_title($i->post('judul_berita'), 'dash', TRUE);

					$data = array(
						'id_berita'		=> $id_berita,
						'id_kategori'	=> $i->post('id_kategori'),
						'id_user'		=> $this->session->userdata('id_user'),
						'slug_berita'	=> $slug,
						'judul_berita'	=> $i->post('judul_berita'),
						'isi'			=> $i->post('isi'),
						'jenis_berita'	=> $i->post('jenis_berita'),
						'status_berita'	=> $i->post('status_berita'),
						'icon'			=> $i->post('icon'),
						'gambar'		=> $upload_data['uploads']['file_name'],
						'keywords'		=> $i->post('keywords'),
						'tanggal_publish' => date('Y-m-d', strtotime($i->post('tanggal_publish'))) . ' ' . $i->post('jam_publish'),
						// 'tanggal_mulai'		=> $i->post('tanggal_mulai'),
						// 'tanggal_selesai'		=> $i->post('tanggal_selesai'),
						'urutan'	=> $i->post('urutan'),
					);
					$this->berita_model->edit($data);
					$this->session->set_flashdata('success', 'Data telah diedit');
					redirect(base_url('admin/berita/jenis_berita/' . $i->post('jenis_berita')), 'refresh');
				}
			} else {
				$i 		= $this->input;
				$slug 	= url_title($i->post('judul_berita'), 'dash', TRUE);

				$data = array(
					'id_berita'		=> $id_berita,
					'id_kategori'	=> $i->post('id_kategori'),
					'id_user'		=> $this->session->userdata('id_user'),
					'slug_berita'	=> $slug,
					'judul_berita'	=> $i->post('judul_berita'),
					'isi'			=> $i->post('isi'),
					'jenis_berita'	=> $i->post('jenis_berita'),
					'status_berita'	=> $i->post('status_berita'),
					'icon'			=> $i->post('icon'),
					'keywords'		=> $i->post('keywords'),
					'tanggal_publish' => date('Y-m-d', strtotime($i->post('tanggal_publish'))) . ' ' . $i->post('jam_publish'),
					// 'tanggal_mulai'		=> $i->post('tanggal_mulai'),
					// 'tanggal_selesai'		=> $i->post('tanggal_selesai'),
					'urutan'	=> $i->post('urutan'),
				);
				$this->berita_model->edit($data);
				$this->session->set_flashdata('success', 'Data telah diedit');
				redirect(base_url('admin/berita'), 'refresh');
			}
		}
		// End masuk database
		$data = array(
			'title'			=> 'Edit Konten',
			'kategori'		=> $kategori,
			'berita'		=> $berita
		);
		$this->load->view('admin/berita/edit', $data, FALSE);
	}


	// Delete
	public function delete($id_berita)
	{
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);


		$berita = $this->berita_model->detail($id_berita);
		// Proses hapus gambar
		if ($berita->gambar != "") {
			unlink('./assets/upload/image/' . $berita->gambar);
			unlink('./assets/upload/image/thumbs/' . $berita->gambar);
		}
		// End hapus gambar
		$data = array('id_berita'	=> $id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('success', 'Data telah dihapus');
		redirect(base_url('admin/berita'), 'refresh');
	}

	// Index Kategori
	public function kategori($id = false)
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_kategori',
			'Nama kategori',
			'required|is_unique[kategori.nama_kategori]',
			array(
				'required'		=> 'Nama kategori harus diisi',
				'is_unique'		=> 'Nama kategori sudah ada. Buat Nama kategori baru!'
			)
		);

		if ($valid->run() === FALSE) {
			// End validasi			

			$data = array(
				'title'		=> 'Kategori Konten',
				'kategori'	=> $this->kategori_model->listing()
			);
			
			// jika edit			
			if ($id != false) {
				$data = array(
					'title'		=> 'Kategori Konten',
					'kategori'	=> $this->kategori_model->listing(),
					'edit' => $this->kategori_model->detail($id)
				);
			}			
			$this->load->view('admin/kategori_berita/index', $data, FALSE);
			// Proses masuk ke database
		} else {
			//jika edit
			if ($id != false) {
				$i 	= $this->input;
				$slug 	= url_title($i->post('nama_kategori'), 'dash', TRUE);

				$data = array(
					'id_kategori'	=> $id,
					'id_user'		=> $this->session->userdata('id_user'),
					'nama_kategori'	=> $i->post('nama_kategori'),
					'slug_kategori'	=> $slug
				);
				$this->kategori_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('admin/kategori'), 'refresh');
			}
			// jika tambah
			else {
				$i 	= $this->input;
				$slug 	= url_title($i->post('nama_kategori'), 'dash', TRUE);

				$data = array(
					'id_user'		=> $this->session->userdata('id_user'),
					'nama_kategori'	=> $i->post('nama_kategori'),
					'slug_kategori'	=> $slug
				);

				$this->kategori_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/kategori'), 'refresh');
			}
		}
		// End proses masuk database		
	}
}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */
