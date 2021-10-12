<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidangiv extends CI_Controller
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

    $this->load->model('Bagianiv_model','jml');
    $data['jml'] = $this->jml->suratbelumbaca();
    $data['jmla'] = $this->jml->suratsudahbaca();
    
    // var_dump($data['jml']);die;
    $data['judul'] = 'Halaman Sekertaris';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('bidangiv/index',$data);
    $this->load->view('template/footer');
  }

  public function masuk()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Agenda_model','tmp');
    $data['tampil'] = $this->tmp->statuskiv();


    $data['judul'] = 'Notifikasi Surat Masuk Dari Sekertaris Bapeda';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('bidangiv/masuk',$data);
    $this->load->view('template/footer');
  }

  public function detail($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Agenda_model','det');
    $data['detail'] = $this->det->detail($id);
    // var_dump($data['detail']);die;

    $data['judul'] = 'Halaman Detail Surat Masuk';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('bidangiv/detail',$data);
    $this->load->view('template/footer');

    $data = [ 
      'status' => 1
    ];

    $this->db->where('id_surat', $id);
    $this->db->update('tb_statuskiv', $data);
  
  }
}