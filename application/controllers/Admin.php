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
    $data['dokumen'] = $this->M_Dokumen->get_file_dokumen();

    $this->load->view('layout_admin/partial_admin/header');
    $this->load->view('layout_admin/partial_admin/sidebar');
    $this->load->view('admin/pengaturan/dokumen/index', $data);
    $this->load->view('layout_admin/partial_admin/footer');
  }

  public function create_transaksi()
  {
    $data['pd'] = $this->M_Opd->get_all_opd();
    $data['retribusi'] = $this->M_Retribusi->get_all_retribusi();

    $this->load->view('layout_admin/partial_admin/header');
    $this->load->view('layout_admin/partial_admin/sidebar');
    $this->load->view('admin/transaksi/create', $data);
    $this->load->view('layout_admin/partial_admin/footer');
  }

  public function store_transaksi()
  {
    $config['upload_path'] = './public/upload/';
    $config['allowed_types'] = 'gif|jpg|png|pdf|docx';
    $config['max_size'] = 2000;
    $config['max_width'] = 1500;
    $config['max_height'] = 1500;
    $config['encrypt_name']			= TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('bukti')) {
      $error = array('error' => $this->upload->display_errors());

      echo "<script>alert('Gagal Membuat Transaksi') ; window.location.href = 'create_transaksi' </script>";
    } else {
      $data['id_opd'] = $this->input->post('id_opd');
      $data['id_jenis_retribusi'] = $this->input->post('id_jenis_retribusi');
      $data['nominal'] = $this->input->post('nominal');
      $data['bukti'] = $this->upload->data('file_name');
      $data['tanggal_upload'] = $this->input->post('tanggal');
      $this->db->insert('transaksi', $data);
      
      echo "<script>alert('Berhasil Membuat Transaksi') ; window.location.href = 'transaksi_all' </script>";
    }
  }


  public function validasi_transaksi($id)
  {
    $data = $this->M_Transaksi->update_transaksi($id);

    if($data)
    {
      echo "<script>alert('Berhasil Menyetujui Transaksi') ; window.location.href = '../transaksi_all' </script>";
    }
  }

  public function tolak_transaksi($id)
  {
    $data = $this->M_Transaksi->tolak_transaksi($id);

    if($data)
    {
      echo "<script>alert('Berhasil Menolak Transaksi') ; window.location.href = '../transaksi_all' </script>";
    }
  }
}


 ?>
