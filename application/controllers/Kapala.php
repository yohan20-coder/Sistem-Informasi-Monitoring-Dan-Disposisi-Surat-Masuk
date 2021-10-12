<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kapala extends CI_Controller
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

    $this->load->model('Kapala_model','jml');
    $data['jml'] = $this->jml->suratbelumbaca();
    $data['jmla'] = $this->jml->suratsudahbaca();
    // $data['histori'] = $this->jml->histori();
    
    // var_dump($data['jml']);die;
    $data['judul'] = 'Halaman Sekertaris';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('kapala/index',$data);
    $this->load->view('template/footer');
  }

  public function masuk()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Agenda_model','tmp');
    $data['tampil'] = $this->tmp->kapala();


    $data['judul'] = 'Notifikasi Surat Masuk Dari Sekertaris Bapeda';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('kapala/masuk',$data);
    $this->load->view('template/footer');
  }

  public function detail($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Agenda_model','det');
    $data['detail'] = $this->det->detail($id);
    // var_dump($data['detail']);die;

    $this->form_validation->set_rules('ringkas','Ringkas','required',[
      'required' => 'Data Tidak Boleh Kosong !'
    ]);

    if($this->form_validation->run()==false){
    $data['judul'] = 'Halaman Detail Surat Masuk';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('kapala/detail',$data);
    $this->load->view('template/footer');
    }else{

      $data = [ 
        'balas'   => $this->input->post('ringkas'),
        'status_kap' => 1,
        'stat' => 1
      ];

      $data2 = [
        'id_surat' => $this->input->post('id'),
        'track3' => "Kapala Bappeda <br> Mengirim Kembali Surat <br> Ke Sekertaris Bappeda"."<br> Tanggal".date('d-m-Y')
      ];

     
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('tb_agenda', $data);

      $this->db->where('id_surat', $this->input->post('id'));
      $this->db->update('tb_tracking', $data2);

      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiEdit</div>');
      redirect('kapala/masuk');
    }
  }


  public function det($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Agenda_model','det');
    $data['detail'] = $this->det->detail($id);
    // var_dump($data['detail']);die;

    $this->form_validation->set_rules('ringkas','Ringkas','required',[
      'required' => 'Data Tidak Boleh Kosong !'
    ]);

    if($this->form_validation->run()==false){
    $data['judul'] = 'Halaman Detail Surat Masuk';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('kapala/det',$data);
    $this->load->view('template/footer');
    }else{

      $data = [ 
        'balas'   => $this->input->post('ringkas'),
        'status_kap' => 1,
        'stat' => 1
      ];

     
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('tb_agenda', $data);

      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiEdit</div>');
      redirect('kapala/masuk');
    }
  }
}