<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller
{

public function __construct()
  {
      parent::__construct();
      $this->load->model('Agenda_model');
     is_log_in();
  }

    public function index()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Agenda_model','jml');
      $data['jml'] = $this->jml->suratbelumbaca();
      $data['jmla'] = $this->jml->suratsudahbaca();
      
      // var_dump($data['jml']);die;
      $data['judul'] = 'Halaman Admin';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('agenda/index',$data);
      $this->load->view('template/footer');
    }

    public function add()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      // $data['ubah'] = $this->Menu_model->getUbah($id);

      $this->form_validation->set_rules('nosurat','Nosurat','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
     
      $this->form_validation->set_rules('tglmasuk','Tglmasuk','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('tgltrima','Tgltrima','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('perihal','Perihal','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('ringkas','Ringkas','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
     
      $this->form_validation->set_rules('instansi','Instansi','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      $tanggal = date('d-m-Y');

      if($this->form_validation->run()==false){
        $data['judul'] = 'Halaman Tambah Surat Masuk';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('agenda/tambah',$data);
        $this->load->view('template/footer');
      }else{

      $surat = $_FILES['surat'];
      if($surat = ''){}else{
        $config['upload_path']  = './assets/surma';
        $config['allowed_types'] = 'pdf';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('surat')){
           $surat = $this->upload->data('file_name');
        }
      };

        $data = [
          'nosurat' => $this->input->post('nosurat'),
          'tglsurat' => $this->input->post('tglmasuk'),
          'tglteri' => $this->input->post('tgltrima'),
          'perihal' => $this->input->post('perihal'),
          'isi' => $this->input->post('ringkas'),        
          'instansi' => $this->input->post('instansi'),
          'file_surat' => $surat,
          'status' => 0,
          'track1'=> "Surat telah Terkirim <br> Ke Sekertaris Bappeda"."<br> Tanggal :".$tanggal 
        ];

        $data7 = [
          'nosurat' => $this->input->post('nosurat'),
        ];

        $this->db->insert('tb_agenda',$data);
        $this->db->insert('tb_tracking', $data7);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dikirim</div>');
        redirect('agenda/add');
      }   
    } 


    public function surma()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Agenda_model','jml');
      $data['tampil'] = $this->jml->tampil();
      
      // var_dump($data['jml']);die;
      $data['judul'] = 'Halaman Master Data Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('agenda/surma',$data);
      $this->load->view('template/footer');
    }

    public function edit($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Agenda_model','det');
      $data['edit'] = $this->det->detail($id);
      // var_dump($data['detail']);die;
      $data['judul'] = 'Halaman Detail Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('agenda/edit',$data);
      $this->load->view('template/footer');
     
      
    }

    public function editproses()
    {
      $id = $this->uri->segment(3);

      $surat = $_FILES['surat'];
      // var_dump($surat); die;
      if($surat = ''){}else{
      $config['upload_path']         = './assets/surma/';  // foler upload 
      $config['allowed_types']        = 'pdf'; // jenis file
      // $config['max_size']             = 50000;
      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('surat')){
        $nosurat = $this->input->post('nosurat');
        $tglsurat = $this->input->post('tglmasuk');
        $tglteri = $this->input->post('tgltrima');
        $perihal = $this->input->post('perihal');
        $isi = $this->input->post('ringkas');       
        $instansi = $this->input->post('instansi');
        $file = $this->upload->data();

        $this->Agenda_model->update(array(
          'nosurat' =>$nosurat,
          ' tglsurat' =>$tglsurat,
           'tglteri' => $tglteri,
          ' perihal' => $perihal,
           'isi' => $isi,       
          ' instansi' => $instansi,
          ), array('id' => $this->input->post('id')
              )
      );
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiEdit</div>');
          redirect('agenda/surma');
        }else{
          $id = $this->input->post('id');
          $data = $this->Agenda_model->detail($id);
          $gambar1 ='./assets/surma/'.$data['file_surat'];

        if($data['file_surat']){
          is_readable($gambar1) && unlink($gambar1);
        };

          $nosurat = $this->input->post('nosurat');
          $tglsurat = $this->input->post('tglmasuk');
          $tglteri = $this->input->post('tgltrima');
          $perihal = $this->input->post('perihal');
          $isi = $this->input->post('ringkas');       
          $instansi = $this->input->post('instansi');
          $file = $this->upload->data();

          $this->Agenda_model->update(array(
            'nosurat' =>$nosurat,
            ' tglsurat' =>$tglsurat,
             'tglteri' => $tglteri,
            ' perihal' => $perihal,
             'isi' => $isi,       
            ' instansi' => $instansi,
            'file_surat' => $file['file_name']
            ), array('id' => $this->input->post('id')
                )
        );
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiEdit</div>');
            redirect('agenda/surma');

        }
     

      }
    }


    public function hapus($id)
    {   
      //menghapus gambar pada folder 
      $data = $this->Agenda_model->detail($id);
      $gambar1 ='./assets/surma/'.$data['file_surat'];

      if($data['file_surat']){
        is_readable($gambar1) && unlink($gambar1);
        $this->Agenda_model->hapuss($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
        redirect('agenda/surma');
       }else{
        $this->Agenda_model->hapuss($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
        redirect('agenda/surma');
       }
    }

    public function cetak()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Agenda_model','jml');
      $data['tampil'] = $this->jml->tampil();
      
    //  var_dump($data['tampil']);die;
      $this->load->view('agenda/cetak',$data);
    }

}