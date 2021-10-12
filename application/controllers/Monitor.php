<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller
{

public function __construct()
  {
      parent::__construct();
     is_log_in();
  }

    public function index()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Monitor_model','jml');
      $data['tampil'] = $this->jml->tampil();
      
    //   var_dump($data['tampil']);die;
      $data['judul'] = 'Halaman Monitoring Disposisi Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('monitor/index',$data);
      $this->load->view('template/footer');
    }
}