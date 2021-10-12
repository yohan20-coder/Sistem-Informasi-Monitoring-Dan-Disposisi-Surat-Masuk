<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekertaris extends CI_Controller
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

    $this->load->model('Agenda_model','jml');
    $data['jml'] = $this->jml->suratbelumbaca();
    $data['jmla'] = $this->jml->suratsudahbaca();
    $data['jl'] = $this->jml->suratbelum();
    $data['jla'] = $this->jml->suratsudah();
    
    // var_dump($data['jml']);die;
    $data['judul'] = 'Halaman Sekertaris';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('sekertaris/index',$data);
    $this->load->view('template/footer');
  }

  public function masuk()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Agenda_model','tmp');
    $data['tampil'] = $this->tmp->tampil();


    $data['judul'] = 'Halaman Notifikasi Surat Masuk';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('sekertaris/masuk',$data);
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
      $this->load->view('sekertaris/detaill',$data);
      $this->load->view('template/footer');
      }else{

        $data = [ 
          'ditujukan' => $this->input->post('dis2'),
          'ditujukan1' => $this->input->post('dis1'),
          'ditujukan2' => $this->input->post('dis3'),
          'ditujukan3' => $this->input->post('dis4'),
          'ditujukan4' => $this->input->post('dis5'),
          'catatan' => $this->input->post('ringkas') ,       
          'status' => 1
        ];

        $data2 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis2'),
          'status' => 0
        ];

        $data3 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis3'),
          'status' => 0
        ];
        
        $data4 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis4'),
          'status' => 0
        ];

        $data6 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis5'),
          'status' => 0
        ];

        $data7 = [
          'id_surat' => $this->input->post('id'),
          'track2' =>"Sekertaris Bappeda <br>mengirim surat ke : <br>".$this->input->post('dis1') ."<br>". $this->input->post('dis2')."<br>". $this->input->post('dis3')."<br>". $this->input->post('dis4')."<br>". $this->input->post('dis5') . "<br> Tanggal : ". date('d-m-Y') ,
        ];
 
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_agenda', $data);

        $this->db->insert('tb_statuski', $data2);
        $this->db->insert('tb_statuskii',$data3);
        $this->db->insert('tb_statuskiii',$data4);
        $this->db->insert('tb_statuskiv', $data6);

        $this->db->where('nosurat', $this->input->post('nosurat'));
        $this->db->update('tb_tracking', $data7);

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiKirim</div>');
      redirect('sekertaris/masuk');

      }
    }

    public function edit($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Agenda_model','det');
      $data['detail'] = $this->det->detail($id);
      // var_dump($data['detail']);die;

      // $this->form_validation->set_rules('dis','Dis','required',[
      //   'required' => 'Data Tidak Boleh Kosong !'
      // ]);
     
      $this->form_validation->set_rules('ringkas','Ringkas','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      if($this->form_validation->run()==false){
      $data['judul'] = 'Halaman Detail Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('sekertaris/edit',$data);
      $this->load->view('template/footer');
      }else{

        $data = [ 
          'ditujukan' => $this->input->post('dis2'),
          'ditujukan1' => $this->input->post('dis1'),
          'ditujukan2' => $this->input->post('dis3'),
          'ditujukan3' => $this->input->post('dis4'),
          'ditujukan4' => $this->input->post('dis5'),
          'catatan' => $this->input->post('ringkas')
        ];

        $data2 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis2'),
          'status' => 0
        ];

        $data3 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis3'),
          'status' => 0
        ];

        $data4 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis4'),
          'status' => 0
        ];

        $data5 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis5'),
          'status' => 0
        ];

        $data7 = [
          'id_surat' => $this->input->post('id'),
          'track2' =>"Sekertaris Bappeda <br> mengirim surat ke : <br>".$this->input->post('dis1') ."<br>". $this->input->post('dis2')."<br>". $this->input->post('dis3')."<br>". $this->input->post('dis4')."<br>". $this->input->post('dis5') . "<br> Tanggal : ". date('d-m-Y') ,
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_agenda', $data);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_statuski', $data2);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_statuskii', $data3);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_statuskiii', $data4);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_statuskiv', $data5);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_tracking', $data7);

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiKirim</div>');
      redirect('sekertaris/masuk');

      }
    }

    public function balas()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  
      $this->load->model('Agenda_model','tmp');
      $data['tampil'] = $this->tmp->balas();
  
  
      $data['judul'] = 'Halaman Notifikasi Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('sekertaris/balas',$data);
      $this->load->view('template/footer');
    }

  public function det($id)
  {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Agenda_model','det');
    $data['detail'] = $this->det->detail($id);
  
    // var_dump($data['detail']);die;
    $data['judul'] = 'Halaman Detail Surat Masuk';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/topbar',$data);
    $this->load->view('sekertaris/det',$data);
    $this->load->view('template/footer');

    // $data2 = [ 
    //   'statusku' => 1
    // ];

    // $this->db->where('id_sur',$id);
    // $this->db->update('tb_kapala', $data2);
}

public function dett($id)
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
    $this->load->view('sekertaris/det',$data);
    $this->load->view('template/footer');
    }else{
      $data = [
        'ditujukan' => $this->input->post('dis2'),
        'ditujukan2' => $this->input->post('dis3'),
        'ditujukan3' => $this->input->post('dis4'),
        'ditujukan4' => $this->input->post('dis5'),
        'catatan'   => $this->input->post('ringkas'),
        'stat_balas' => 1
      ];

    $data2 = [
      'id_surat' =>$id,
      'ditujukan' => $this->input->post('dis2'),
      'status' => 0
    ];

    $data3 = [
      'id_surat' => $id,
      'ditujukan' => $this->input->post('dis3'),
      'status' => 0
    ];

    $data4 = [
      'id_surat' =>$id,
      'ditujukan' => $this->input->post('dis4'),
      'status' => 0
    ];

    $data5 = [
      'id_surat' => $id,
      'ditujukan' => $this->input->post('dis5'),
      'status' => 0
    ];

    $data7 = [
      'id_surat' => $this->input->post('id'),
      'track4' =>"Sekertaris Bappeda <br> Mengirim Surat Ke : <br>".$this->input->post('dis2')."<br>". $this->input->post('dis3')."<br>". $this->input->post('dis4')."<br>". $this->input->post('dis5') . "<br> Tanggal : ". date('d-m-Y') ,
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tb_agenda', $data);

    $this->db->where('id_surat', $this->input->post('id'));
    $this->db->update('tb_statuski', $data2);

    $this->db->where('id_surat', $this->input->post('id'));
    $this->db->update('tb_statuskii', $data3);

    $this->db->where('id_surat', $this->input->post('id'));
    $this->db->update('tb_statuskiii', $data4);

    $this->db->where('id_surat', $this->input->post('id'));
    $this->db->update('tb_statuskiv', $data5);

    $this->db->where('id_surat', $this->input->post('id'));
    $this->db->update('tb_tracking', $data7);

    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiKirim</div>');
      redirect('sekertaris/balas');
    }
}

    public function add()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['judul'] = 'Halaman Detail Surat Masuk';
   
    
    $data = [
        'ditujukan' => $this->input->post('dis2'),
        'ditujukan2' => $this->input->post('dis3'),
        'ditujukan3' => $this->input->post('dis4'),
        'ditujukan4' => $this->input->post('dis5'),
        'catatan'   => $this->input->post('ringkas'),
        'stat_balas' => 1
      ];

      $data2 = [
        'id_surat' => $data['id'],
        'ditujukan' => $this->input->post('dis2'),
        'status' => 0
      ];

      $data3 = [
        'id_surat' => $this->input->post('id'),
        'ditujukan' => $this->input->post('dis3'),
        'status' => 0
      ];

      $data4 = [
        'id_surat' => $this->input->post('id'),
        'ditujukan' => $this->input->post('dis4'),
        'status' => 0
      ];

      $data5 = [
        'id_surat' => $this->input->post('id'),
        'ditujukan' => $this->input->post('dis5'),
        'status' => 0
      ];

     

      $this->db->insert('tb_agenda',$data);

      $this->db->insert('tb_statuski', $data2);

      $this->db->insert('tb_statuskii', $data3);

      $this->db->insert('tb_statuskiii', $data4);

      $this->db->insert('tb_statuskiv', $data5);

      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dikirim</div>');
      redirect('sekertaris/balas');
  
  }

  public function editt($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Agenda_model','det');
      $data['detail'] = $this->det->detail($id);
      // var_dump($data['detail']);die;

      // $this->form_validation->set_rules('dis','Dis','required',[
      //   'required' => 'Data Tidak Boleh Kosong !'
      // ]);
     
      $this->form_validation->set_rules('ringkas','Ringkas','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      if($this->form_validation->run()==false){
      $data['judul'] = 'Halaman Detail Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('sekertaris/editt',$data);
      $this->load->view('template/footer');
      }else{

        $data = [ 
          'ditujukan' => $this->input->post('dis2'),
          'ditujukan2' => $this->input->post('dis3'),
          'ditujukan3' => $this->input->post('dis4'),
          'ditujukan4' => $this->input->post('dis5'),
          'catatan' => $this->input->post('ringkas')
        ];

        $data2 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis2'),
          'status' => 0
        ];

        $data3 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis3'),
          'status' => 0
        ];

        $data4 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis4'),
          'status' => 0
        ];

        $data5 = [
          'id_surat' => $this->input->post('id'),
          'ditujukan' => $this->input->post('dis5'),
          'status' => 0
        ];

        $data7 = [
          'id_surat' => $this->input->post('id'),
          'track4' =>"Sekertaris Bappeda <br> Mengirim Surat Ke : <br>".$this->input->post('dis2')."<br>". $this->input->post('dis3')."<br>". $this->input->post('dis4')."<br>". $this->input->post('dis5') . "<br> Tanggal : ". date('d-m-Y') ,
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_agenda', $data);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_statuski', $data2);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_statuskii', $data3);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_statuskiii', $data4);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_statuskiv', $data5);

        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_tracking', $data7);

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiKirim</div>');
      redirect('sekertaris/balas');

      }
    }

}