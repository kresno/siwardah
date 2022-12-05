<?php
/**
 *
 */
class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_Dokumen');
    $this->load->model('M_Transaksi');
    $this->load->model('M_Opd');
    $this->load->model('M_Retribusi');
    // $this->load->library('Auth');
  }


  public function dashboard()
  {
    // $admin_log = $this->auth->is_login_admin();

    // $header['admin_log'] = $admin_log;

    $this->load->view('layout_admin/partial_admin/header');
    $this->load->view('layout_admin/partial_admin/sidebar');
    $this->load->view('admin/dashboard/content');
    $this->load->view('layout_admin/partial_admin/footer');
  }


  public function transaksi_all()
  {
    $data['transaksi'] = $this->M_Transaksi->get_all_transaksi();

    $this->load->view('layout_admin/partial_admin/header');
    $this->load->view('layout_admin/partial_admin/sidebar');
    $this->load->view('admin/transaksi/index', $data);
    $this->load->view('layout_admin/partial_admin/footer');
  }

  public function transaksi_pending()
  {
    $data['transaksi'] = $this->M_Transaksi->get_transaksi_pending();

    $this->load->view('layout_admin/partial_admin/header');
    $this->load->view('layout_admin/partial_admin/sidebar');
    $this->load->view('admin/transaksi/index_pending', $data);
    $this->load->view('layout_admin/partial_admin/footer');
  }

  public function pengaturan_pd()
  {
    $data['pd'] = $this->M_Opd->get_all_opd();

    $this->load->view('layout_admin/partial_admin/header');
    $this->load->view('layout_admin/partial_admin/sidebar');
    $this->load->view('admin/pengaturan/pd/index', $data);
    $this->load->view('layout_admin/partial_admin/footer');
  }

  public function pengaturan_retribusi()
  {
    $data['retribusi'] = $this->M_Retribusi->get_all_retribusi();

    $this->load->view('layout_admin/partial_admin/header');
    $this->load->view('layout_admin/partial_admin/sidebar');
    $this->load->view('admin/pengaturan/retribusi/index', $data);
    $this->load->view('layout_admin/partial_admin/footer');
  }

  public function pengaturan_dokumen()
  {

  }
}


 ?>
