<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model');
		$this->load->model('kategori_galeri_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace(base_url(), '', current_url());
		$this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login();
		$this->log_user->add_log();
	}

	// Halaman galeri
	public function index($id = false)
	{
		$kategori_galeri = $this->kategori_galeri_model->listing();
		$galeri = $this->galeri_model->listing();
		if ($id != false) {
			$edit = $this->galeri_model->detail($id);
		}

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'judul_galeri',
			'Judul',
			'required',
			array('required'	=> 'Judul harus diisi')
		);

		if ($valid->run() === FALSE) {
			// Cancel Proses and Showing Error's			

			$data = array(
				'title'				=> 'Galeri',
				'kategori_galeri'	=> $kategori_galeri,
				'galeri'			=> $galeri
			);

			// jika edit			
			if ($id != false) {
				$data = array(
					'title'				=> 'Galeri',
					'galeri'			=> $galeri,
					'kategori_galeri'	=> $kategori_galeri,
					'edit'				=> $edit
				);
			}
			$this->load->view('admin/galeri/index', $data, FALSE);
		} // Proses masuk ke database
		else {
			if ($id != false) {
				if (!empty($_FILES['gambar']['name'])) {

					$img_path = './upload/image/';
					$config['upload_path']   = $img_path;
					$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
					$config['max_size']      = '12000'; // KB  
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('gambar')) {
						// Cancel Proses and Showing Error's

						$data = array(
							'title'				=> 'Galeri',
							'kategori_galeri'	=> $kategori_galeri,
							'galeri'			=> $galeri,
							'edit'				=> $edit,
							'error'    			=> $this->upload->display_errors(),
						);
						$this->load->view('admin/galeri/index', $data, FALSE);
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
						$this->image_lib->resize();
						if (!$this->image_lib->resize()) {
							$data = array(
								'title'				=> 'Galeri',
								'kategori_galeri'	=> $kategori_galeri,
								'galeri'			=> $galeri,
								'edit'				=> $edit,
								'error'    			=> $this->image_lib->display_errors()
							);
							$this->load->view('admin/galeri/index', $data, FALSE);
						}

						if ($this->upload->do_upload('gambar') && $this->image_lib->resize()) {

							// Proses hapus gambar
							if ($galeri->gambar != "") {
								unlink('./upload/image/' . $galeri->gambar);
								unlink('./upload/image/thumbs/' . $galeri->gambar);
							}
							// End hapus gambar

							$i 		= $this->input;

							$data = array(
								'id_galeri'			=> $id,
								'id_kategori_galeri' => $i->post('id_kategori_galeri'),
								'id_user'			=> $this->session->userdata('id_user'),
								'judul_galeri'		=> $i->post('judul_galeri'),								
								'jenis_galeri'		=> $i->post('jenis_galeri'),
								'gambar'			=> $upload_data['uploads']['file_name']								
							);
							$this->galeri_model->edit($data);
							$this->session->set_flashdata('success', 'Data berhasil diubah');
							redirect(base_url('admin/galeri'), 'refresh');
						}
					}
				} else {
					$i 		= $this->input;

					$data = array(
						'id_galeri'			=> $id,
						'id_kategori_galeri' => $i->post('id_kategori_galeri'),
						'id_user'			=> $this->session->userdata('id_user'),
						'judul_galeri'		=> $i->post('judul_galeri'),						
						'jenis_galeri'		=> $i->post('jenis_galeri')						
					);
					$this->galeri_model->edit($data);
					$this->session->set_flashdata('success', 'Data berhasil diubah');
					redirect(base_url('admin/galeri'), 'refresh');
				}
			} else {
				$img_path = './upload/image/';
				$config['upload_path']   = $img_path;
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB  
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// Cancel Proses and Showing Error

					$data = array(
						'title'				=> 'Galeri',
						'galeri'			=> $galeri,
						'kategori_galeri'	=> $kategori_galeri,
						'error'    			=> $this->upload->display_errors(),
					);
					$this->load->view('admin/galeri/index', $data, FALSE);
				} else {
					$upload_data        		= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= $img_path . $upload_data['uploads']['file_name'];
					$config['new_image']     	= $img_path . 'thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       	= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       		= 500; // Pixel
					$config['height']       	= 500; // Pixel
					$config['x_axis']       	= 0;
					$config['y_axis']       	= 0;
					$config['thumb_marker']   	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					if (!$this->image_lib->resize()) {
						// Cancel Proses and Showing Error

						$data = array(
							'title'				=> 'Galeri',
							'galeri'			=> $galeri,
							'kategori_galeri'	=> $kategori_galeri,
							'error' 	   		=> $this->image_lib->display_errors()
						);
						$this->load->view('admin/galeri/index', $data, FALSE);
					}
				}

				// Masuk database
				if ($this->upload->do_upload('gambar') && $this->image_lib->resize()) {

					$i 		= $this->input;

					$data = array(
						'id_kategori_galeri' => $i->post('id_kategori_galeri'),
						'id_user'			=> $this->session->userdata('id_user'),
						'judul_galeri'		=> $i->post('judul_galeri'),						
						'jenis_galeri'		=> $i->post('jenis_galeri'),
						'gambar'			=> $upload_data['uploads']['file_name']						
					);
					$this->galeri_model->tambah($data);
					$this->session->set_flashdata('success', 'Data berhasil disimpan');
					redirect(base_url('admin/galeri'), 'refresh');
				}
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
			$id_galerinya		= $inp->post('id_galeri');

			for ($i = 0; $i < sizeof($id_galerinya); $i++) {
				$galeri 	= $this->galeri_model->detail($id_galerinya[$i]);
				if ($galeri->gambar != '') {
					unlink('./upload/galeri/' . $galeri->gambar);
					unlink('./upload/galeri/thumbs/' . $galeri->gambar);
				}
				$data = array('id_galeri'	=> $id_galerinya[$i]);
				$this->galeri_model->delete($data);
			}

			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect(base_url('admin/galeri'), 'refresh');
			// PROSES SETTING DRAFT
		}
	}

	// Delete
	public function delete($id_galeri)
	{
		$galeri = $this->galeri_model->detail($id_galeri);
		// Proses hapus gambar
		if ($galeri->gambar == "") {
		} else {
			unlink('./upload/image/' . $galeri->gambar);
			unlink('./upload/image/thumbs/' . $galeri->gambar);
		}
		// End hapus gambar
		$data = array('id_galeri'	=> $id_galeri);
		$this->galeri_model->delete($data);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect(base_url('admin/galeri'), 'refresh');
	}

	// Kategori
	public function kategori($id = false)
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_kategori_galeri',
			'Nama kategori_galeri',
			'required|is_unique[kategori_galeri.nama_kategori_galeri]',
			array(
				'required'		=> 'Nama kategori_galeri harus diisi',
				'is_unique'		=> 'Nama kategori_galeri sudah ada. Buat Nama kategori_galeri baru!'
			)
		);

		if ($valid->run() === FALSE) {
			// Cancel Proses and Showing Error's			

			$data = array(
				'title'				=> 'Kategori Galeri',
				'kategori_galeri'	=> $this->kategori_galeri_model->listing()
			);

			if ($id != false) {
				$data = array(
					'title'				=> 'Kategori Galeri',
					'kategori_galeri'	=> $this->kategori_galeri_model->listing(),
					'edit'				=> $this->kategori_galeri_model->detail($id)
				);
			}
			$this->load->view('admin/kategori_galeri/index', $data, FALSE);
			// Proses masuk ke database
		} else {
			if ($id != false) {
				$i 	= $this->input;
				$slug 	= url_title($i->post('nama_kategori_galeri'), 'dash', TRUE);

				$data = array(
					'id_kategori_galeri'	=> $id,
					'nama_kategori_galeri'	=> $i->post('nama_kategori_galeri'),
					'slug_kategori_galeri'	=> $slug,
					'urutan'		=> $i->post('urutan'),
				);
				$this->kategori_galeri_model->edit($data);
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect(base_url('admin/galeri/kategori'), 'refresh');
			} else {
				$i 	= $this->input;
				$slug 	= url_title($i->post('nama_kategori_galeri'), 'dash', TRUE);

				$data = array(
					'nama_kategori_galeri'	=> $i->post('nama_kategori_galeri'),
					'slug_kategori_galeri'	=> $slug,
				);
				$this->kategori_galeri_model->tambah($data);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect(base_url('admin/galeri/kategori'), 'refresh');
			}
		}
	}

	// Delete user
	public function hapus_kategori($id_kategori_galeri)
	{

		$data = array('id_kategori_galeri'	=> $id_kategori_galeri);
		$this->kategori_galeri_model->delete($data);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect(base_url('admin/galeri/kategori'), 'refresh');
	}
}

/* End of file Galeri.php */
/* Location: ./application/controllers/admin/Galeri.php */
