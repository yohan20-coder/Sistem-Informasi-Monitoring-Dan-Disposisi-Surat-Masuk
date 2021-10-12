<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      //memanggil model arsipMasuk
      $this->load->model('Arsip_model');
      //user akses
     is_log_in();
  }

    public function suratkel()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
      $this->load->model('Arsip_model','arsip');
      $data['tamkel'] = $this->arsip->tamkel();
    //   var_dump($data['user']);die;
      $data['judul'] = 'Halaman Arsip Surat Keluar';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arskel/index',$data);
      $this->load->view('template/footer');
    }


    public function tambah()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      // $data['ubah'] = $this->Menu_model->getUbah($id);

      $this->form_validation->set_rules('nosurat','Nosurat','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('klasi','Klasi','required',[
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
      $this->form_validation->set_rules('dispos','Dispos','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('instansi','Instansi','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      

      if($this->form_validation->run()==false){
        $data['judul'] = 'Halaman Tambah Surat Masuk';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('arsip/tambah',$data);
        $this->load->view('template/footer');
      }else{

      $surat = $_FILES['surat'];
      if($surat = ''){}else{
        $config['upload_path']  = './assets/surma';
        $config['allowed_types'] = 'jpg|png|gif';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('surat')){
           $surat = $this->upload->data('file_name');
        }
      };

      $lamp1 = $_FILES['lamp1'];
      if($lamp1 = ''){}else{
        $config['upload_path']  = './assets/surma';
        $config['allowed_types'] = 'jpg|png|gif';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('lamp1')){
          $lamp1 = $this->upload->data('file_name');
        }
      };

      $lamp2 = $_FILES['lamp2'];
      if($lamp2 = ''){}else{
        $config['upload_path']  = './assets/surma';
        $config['allowed_types'] = 'jpg|png|gif';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('lamp2')){
          $lamp2 = $this->upload->data('file_name');
        }
      };

      $lamp3 = $_FILES['lamp3'];
      if($lamp3 = ''){}else{
        $config['upload_path']  = './assets/surma';
        $config['allowed_types'] = 'jpg|png|gif';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('lamp3')){
          $lamp3 = $this->upload->data('file_name');
        }
      };

        $data = [
          'nosurat' => $this->input->post('nosurat'),
          'noklasi' => $this->input->post('klasi'),
          'tglsurat' => $this->input->post('tglmasuk'),
          'tglteri' => $this->input->post('tgltrima'),
          'perihal' => $this->input->post('perihal'),
          'isi' => $this->input->post('ringkas'),        
          'disposisi' => $this->input->post('dispos'),
          'instansi' => $this->input->post('instansi'),
          'gbr_surat' => $surat,
          'lamp1' => $lamp1,
          'lamp2' => $lamp2,
          'lamp3' => $lamp3
        ];

        $this->db->insert('arsma',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        redirect('arsip');
      }   
    } 


    public function detail($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubah($id);

      $data['judul'] = 'Halaman Detail Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arsip/detail',$data);
      $this->load->view('template/footer');
    }

    public function edit($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['edit'] = $this->Arsip_model->Ubah($id);

      // $this->load->model('Arsip_model');
      // $data['edit'] = $this->edit->ubah($id);
      // $data['ubah'] = $this->Menu_model->getUbah($id);

      // var_dump($data['edit']);die;
       
      if($this->form_validation->run()==false){
      $data['judul'] = 'Halaman Detail Surat Masuk';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arsip/edit',$data);
      $this->load->view('template/footer');   
      }
}

public function editkel($id)
{
  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['edit'] = $this->Arsip_model->Ubahkel($id);

  // var_dump($data['edit']);die;
   
  $data['judul'] = 'Halaman Edit Surat Keluar';
  $this->load->view('template/header',$data);
  $this->load->view('template/sidebar',$data);
  $this->load->view('template/topbar',$data);
  $this->load->view('arskel/edit',$data);
  $this->load->view('template/footer');   

}
    
public function editkelproses()
{    
  $id = $this->uri->segment(3);

  $surat = $_FILES['surat'];
  // var_dump($surat); die;
  if($surat = ''){}else{
  $config['upload_path']         = './assets/surkel/';  // foler upload 
  $config['allowed_types']        = 'pdf'; // jenis file
  $config['max_size']             = 50000;
  // $config['max_width']            = 1024;
  // $config['max_height']           = 768;

  $this->load->library('upload', $config);
  
  if ( ! $this->upload->do_upload('surat')){
        //tampung data dari form
      $nosurat = $this->input->post('nosurat');
      $file = $this->upload->data();
      $tglsurat = $this->input->post('tglmasuk');
      $ringkasan = $this->input->post('ringkasan');
      $pengelolah = $this->input->post('pengelolah');        
      $kepada = $this->input->post('kepada');
      $keterangan = $this->input->post('keterangan');
  
      $this->Arsip_model->updatekel(array(
          'nosurat' => $nosurat,
          'tglsurat' =>  $tglsurat,
          'ringkasan' => $ringkasan,
          'pengelolah' => $pengelolah,
          'kepada' => $kepada,
          'keterangan' => $keterangan
          ), array('id' => $this->input->post('id')
              )
      );
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiEdit</div>');
      redirect('arsip/suratkel');
  }
  else
  {

        $id = $this->input->post('id');
          $data = $this->Arsip_model->ubahkel($id);
          $gambar1 ='./assets/surkel/'.$data['surat'];

        if($data['surat']){
          is_readable($gambar1) && unlink($gambar1);
        };
   
        //tampung data dari form
      $nosurat = $this->input->post('nosurat');
      $file = $this->upload->data();
      $tglsurat = $this->input->post('tglmasuk');
      $ringkasan = $this->input->post('ringkasan');
      $pengelolah = $this->input->post('pengelolah');        
      $kepada = $this->input->post('kepada');
      $keterangan = $this->input->post('keterangan');
  
      $this->Arsip_model->updatekel(array(
          'nosurat' => $nosurat,
          'tglsurat' =>  $tglsurat,
          'ringkasan' => $ringkasan,
          'pengelolah' => $pengelolah,
          'kepada' => $kepada,
          'keterangan' => $keterangan,
          'surat' => $file['file_name']
          ), array('id' => $this->input->post('id')
              )
      );
      $this->session->set_flashdata('msg','data berhasil di update');
      redirect('arsip/suratkel');
  }
}
}



    public function hapus($id)
    {   
      //menghapus gambar pada folder 
      $data = $this->Arsip_model->ubah($id);
      $gambar1 ='./assets/surma/'.$data['gbr_surat'];
      $gambar2 ='./assets/surma/'.$data['lamp1'];
      $gambar3 ='./assets/surma/'.$data['lamp2'];
      $gambar4 ='./assets/surma/'.$data['lamp3'];

      if($data['gbr_surat'] || $data['lamp1'] || $data['lamp2'] || $data['lamp3']){
        is_readable($gambar1) && unlink($gambar1);
        is_readable($gambar2) && unlink($gambar2);
        is_readable($gambar3) && unlink($gambar3);
        is_readable($gambar4) && unlink($gambar4);
        $this->Arsip_model->hapus($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
        redirect('arsip');
       }else{
         $this->Arsip_model->hapus($id);
         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
         redirect('arsip');
       }
    }

    public function cetak()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model arsip
      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tampil();
      
    //  var_dump($data['tampil']);die;
      $this->load->view('arsip/cetak',$data);
    }

    public function print($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubah($id);

      $data['judul'] = 'Halaman print';
      $this->load->view('arsip/print',$data);
    }

    public function print2($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubah($id);

      $data['judul'] = 'Halaman print';
      $this->load->view('arsip/print2',$data);
    }

    public function print3($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubah($id);

      $data['judul'] = 'Halaman print';
      $this->load->view('arsip/print3',$data);
    }

    public function print4($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubah($id);

      $data['judul'] = 'Halaman print';
      $this->load->view('arsip/print4',$data);
    }

    //export pdf
    public function pdfm()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->library('dompdf_gen');

      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tampil();

      // var_dump($data['ubah']); die();
      $data['judul'] = 'Halaman print';
      $this->load->view('arsip/pdfm',$data);

      $paper_size = 'A4';
      $orientation = 'landscape';
      $html = $this->output->get_output();

      $this->dompdf->set_paper($paper_size, $orientation);

      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("print out", array('Attachment' => 0));
    }


//function arsip keluar
   
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
     
      $this->form_validation->set_rules('pengelolah','Pengelolah','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('ringkas','Ringkas','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('kepada','Kepada','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('keterangan','Keterangan','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      

      if($this->form_validation->run()==false){
        $data['judul'] = 'Halaman Tambah Surat Keluar';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('arskel/tambah',$data);
        $this->load->view('template/footer');
      }else{

      $surat = $_FILES['surat'];
      if($surat = ''){}else{
        $config['upload_path']  = './assets/surkel';
        $config['allowed_types'] = 'pdf';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('surat')){
           $surat = $this->upload->data('file_name');
        }
      };



        $data = [
          'nosurat' => $this->input->post('nosurat'),  
          'ringkasan' => $this->input->post('ringkas'), 
          'pengelolah' => $this->input->post('pengelolah'),
          'tglsurat' => $this->input->post('tglmasuk'),   
          'kepada' => $this->input->post('kepada'),        
          'keterangan' => $this->input->post('keterangan'),
          'surat' => $surat
        ];

        $this->db->insert('arske',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        redirect('arsip/suratkel');
      }   
    }

    public function detkel($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubahkel($id);

      $data['judul'] = 'Halaman Detail Surat Keluar';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('arskel/detail',$data);
      $this->load->view('template/footer');
    }

    public function prinkel($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubahkel($id);

      $data['judul'] = 'Halaman print';
      $this->load->view('arskel/print',$data);
    }

    public function prinkel2($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubahkel($id);

      $data['judul'] = 'Halaman print';
      $this->load->view('arskel/print2',$data);
    }

    public function prinkel3($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubahkel($id);

      $data['judul'] = 'Halaman print';
      $this->load->view('arskel/print3',$data);
    }

    public function prinkel4($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Arsip_model','arsip');
      $data['ubah'] = $this->arsip->ubahkel($id);

      $data['judul'] = 'Halaman print';
      $this->load->view('arskel/print4',$data);
    }

    public function pdfm2()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->library('dompdf_gen');

      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tamkel();

      // var_dump($data['ubah']); die();
      $data['judul'] = 'Halaman print';
      $this->load->view('arskel/pdfm',$data);

      $paper_size = 'A4';
      $orientation = 'landscape';
      $html = $this->output->get_output();

      $this->dompdf->set_paper($paper_size, $orientation);

      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("print out", array('Attachment' => 0));
    }

    public function cetak2()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model arsip
      $this->load->model('Arsip_model','arsip');
      $data['tampil'] = $this->arsip->tamkel();
      
    //  var_dump($data['tampil']);die;
      $this->load->view('arskel/cetak',$data);
    }

    public function delete($id)
    {   
      //menghapus gambar pada folder 
      $data = $this->Arsip_model->ubahkel($id);
      $gambar1 ='./assets/surkel/'.$data['surat'];
      $gambar2 ='./assets/surkel/'.$data['lamp1'];
      $gambar3 ='./assets/surkel/'.$data['lamp2'];
      $gambar4 ='./assets/surkel/'.$data['lamp3'];

      if($data['surat'] || $data['lamp1'] || $data['lamp2'] || $data['lamp3']){
        is_readable($gambar1) && unlink($gambar1);
        is_readable($gambar2) && unlink($gambar2);
        is_readable($gambar3) && unlink($gambar3);
        is_readable($gambar4) && unlink($gambar4);
        $this->Arsip_model->hapuskel($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
        redirect('arsip');
       }else{
         $this->Arsip_model->hapuskel($id);
         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
         redirect('arsip/suratkel');
       }
    }
}