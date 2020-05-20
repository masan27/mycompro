<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_auth');
  }

  public function index()
  {
    $data['title'] = 'Aplikasi';
    $this->load->view('admin/pengaturan/index', $data);
  }

  public function list()
  {
    $data['title'] = 'Pengaturan';
    $this->load->view('admin/pengaturan/list', $data);
  }

  public function light()
  {
    delete_cookie('txt');
    delete_cookie('txt_wr');
    delete_cookie('bg_s');
    delete_cookie('bg_d');
    delete_cookie('bg_l');
    delete_cookie('bg_wr');
    delete_cookie('b_gd');
    delete_cookie('btn_d');
    delete_cookie('btn_wr');
    delete_cookie('tbl_drk');
    redirect(base_url('admin/pengaturan'));
  }

  public function dark()
  {
    set_cookie('txt', 'text-light', time() + (86400 * 30 * 6));
    set_cookie('txt_wr', 'text-warning', time() + (86400 * 30 * 6));
    set_cookie('bg_s', 'bg-secondary', time() + (86400 * 30 * 6));
    set_cookie('bg_d', 'bg-dark', time() + (86400 * 30 * 6));
    set_cookie('bg_l', 'bg-light', time() + (86400 * 30 * 6));
    set_cookie('bg_wr', 'bg-warning', time() + (86400 * 30 * 6));
    set_cookie('b_gd', 'bg-gradient-dark', time() + (86400 * 30 * 6));
    set_cookie('btn_d', 'btn-dark', time() + (86400 * 30 * 6));
    set_cookie('btn_wr', 'btn-warning', time() + (86400 * 30 * 6));
    set_cookie('tbl_drk', 'table-dark', time() + (86400 * 30 * 6));
    redirect(base_url('admin/pengaturan'));
  }

}
