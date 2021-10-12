<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Menu_model');
      $this->load->model('User_model');
      //user akses
     is_log_in();
  }

    public function index()
    {
        //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
      $data['menu'] = $this->db->get('user_menu')->result_array();
      $this->form_validation->set_rules('menu','Menu','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

      if($this->form_validation->run()==false){
        //   var_dump($data['user']);die;
        $data['judul'] = 'Menu Management';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('menu/index',$data);
        $this->load->view('template/footer');
      }else{
        $data = [
          "name" => $this->input->post('name'),
          "menu"=> $this->input->post('menu')
        ];
        $this->db->insert('user_menu',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        redirect('menu');
      }

      
    }

    public function submenu()
    {
      $data['judul'] = 'Submenu Management';
      //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
      $this->load->model('Menu_model','menu');
      $data['submenu'] = $this->menu->getsubmenu();
      $data['menu'] = $this->db->get('user_menu')->result_array();

      //validasi
      $this->form_validation->set_rules('title','Title','required',[
        'required' => 'Data Title Menu Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('menu_id','Menu','required',[
        'required' => 'Data Menu Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('url','Url','required',[
        'required' => 'Data Url Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('icon','Icon','required',[
        'required' => 'Data Icon Tidak Boleh Kosong !'
      ]);


      if($this->form_validation->run()==false){
        
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('menu/submenu',$data);
        $this->load->view('template/footer');
      }else{
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->insert('user_sub_menu',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        redirect('menu/submenu');
      }
      
    }

    public function ubahmenu($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['ubah'] = $this->Menu_model->getUbah($id);

      $this->form_validation->set_rules('nama','Nama','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      $this->form_validation->set_rules('menu','Menu','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);

    if($this->form_validation->run()==false){
        $data['judul'] = 'Menu Edit';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('menu/ubahmenu',$data);
        $this->load->view('template/footer');
      }else{
         $menu = $this->input->post('menu');
         $this->Menu_model->ubah($id);
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiUbah</div>');
        redirect('menu');
      }

    } 

    public function hapus($id)
    {
      $this->Menu_model->hapus($id);
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
      redirect('menu');
    }

    
    public function tampiluser()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //memanggil model user
      $this->load->model('User_model','user');
      // $data['tampil'] = $this->user->tampil();
      $data['role'] = $this->user->getrole();
      
    //  var_dump($data['role']);die;
  
      $data['judul'] = 'Halaman Pengguna Sistem';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('menu/tampil',$data);
      $this->load->view('template/footer');
   
    }

    public function tambahuser()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
      $this->load->model('User_model','user');
      $data['role'] = $this->user->userrole();
    //  var_dump($data['role']);die;


    $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
      'required' => 'Nama Harus Diisi'
  ]);
  $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]',[
      'required' => 'Email Harus Diisi',
      'is_unique' => 'Nip sudah ada'
  ]);
  $this->form_validation->set_rules('user', 'User', 'required|trim',[
    'required' => 'Level Harus Diisi'
]);
  $this->form_validation->set_rules('pass', 'Pass', 'required|trim|min_length[3]',[
      'required' => 'Password Harus Diisi',
      'matches' => 'Password tidak sama !',
      'min_length' => 'Password terlalu Pendek !'
  ]);
 
  if($this->form_validation->run() == FALSE){
      $data['judul'] = 'Halaman Tambah User';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('menu/adduser',$data);
      $this->load->view('template/footer');
  }else{
    $data = [
      'nama' =>htmlspecialchars($this->input->post('nama',true)),              //htmlspecialchars agara tidak di hack
      'email' =>htmlspecialchars($this->input->post('email',true)),
      'image' => 'default.jpg',
      'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
      'role_id' => $this->input->post('user'),
      'is_active' => 1,
      'date_created' => time()
  ];
   $this->db->insert('user',$data);
   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pendaftaran Sukses</div>');
   redirect('menu/tampiluser');
    }
  }


    public function delete($id)
    {
      $this->User_model->hapus($id);
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil DiHapus</div>');
      redirect('menu/tampiluser');
    }
   
}