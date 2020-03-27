<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Topik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_topik');
        $this->load->model('m_absen');
    }

    public function index()
    {
        $topik = $this->m_topik;
        $cek = $this->m_absen->cek_absen();
        if (isset($this->session->cek_id)) {
            $id = $this->session->cek_id;
        } else {
            $id = $cek->id;
        }
        $data['topik'] = $topik->get_topik($id);
        $this->load->view('admin/topik/index', $data);
    }

    public function update()
    {
        $topik = $this->m_topik;
        $cek = $this->m_absen->cek_absen();
        if (isset($this->session->cek_id)) {
            $id = $this->session->cek_id;
        } else {
            $id = $cek->id;
        }
        if ($this->session->cek_ket == null) {
            $this->session->set_flashdata('error', 'Silahkan absen masuk terlebih dahulu');

            $this->load->view('admin/absen/index');
        } elseif ($this->session->cek_ket == "N") {
            $topik->update($id);

            $this->session->set_flashdata('success', 'Topik berhasil disimpan');

            redirect(base_url('admin/topik'));
        }
    }
}
