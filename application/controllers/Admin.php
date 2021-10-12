<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      //user akses
      $this->load->model('Menu_model');
     is_log_in();
  }

    public function index()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      // $data[total] = $this->Arsip_model->jmlmasuk();

      $this->load->model('User_model','pengguna');
      $data['pengguna'] = $this->pengguna->jmlpengguna();

      //sekertaris
      $this->load->model('Agenda_model','jml');
      $data['jml'] = $this->jml->suratbelumbaca();
      $data['jmla'] = $this->jml->suratsudahbaca();
      $data['jl'] = $this->jml->suratbelum();
      $data['jla'] = $this->jml->suratsudah();

      //kapala
      $this->load->model('Kapala_model','jl');
      $data['jmlk'] = $this->jl->suratbelumbaca();
      $data['jmlak'] = $this->jl->suratsudahbaca();

      //Kapala Bidang PP I
      $this->load->model('Bagiani_model','jm');
      $data['jmli'] = $this->jm->suratbelumbaca();
      $data['jmlai'] = $this->jm->suratsudahbaca();

      //Kapala Bidang PP II
      $this->load->model('Bagianii_model','jmll');
      $data['jmlii'] = $this->jmll->suratbelumbaca();
      $data['jmlaii'] = $this->jmll->suratsudahbaca();

      //Kapala Bidang PP III
      $this->load->model('Bagianiii_model','jmlll');
      $data['jmliii'] = $this->jmlll->suratbelumbaca();
      $data['jmlaiii'] = $this->jmlll->suratsudahbaca();

      //Kapala Bidang PP IV
      $this->load->model('Bagianiv_model','jmv');
      $data['jmlv'] = $this->jmv->suratbelumbaca();
      $data['jmlav'] = $this->jmv->suratsudahbaca();

      // var_dump($data['jml']);die;
      $data['judul'] = 'Halaman Admin';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('admin/index',$data);
      $this->load->view('template/footer');
    }

    public function role()
    {
       //mengambil data dari session di controller auth
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

       $data['role'] = $this->db->get('user_role')->result_array();
      
       //   var_dump($data['user']);die;
         $data['judul'] = 'Halaman Role';
         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar',$data);
         $this->load->view('template/topbar',$data);
         $this->load->view('admin/role',$data);
         $this->load->view('template/footer');
    }

    public function ubahrole($id)
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['ubah'] = $this->db->get_where('user_role',['id'=>$id])->row_array();

      $this->form_validation->set_rules('nama','Nama','required',[
        'required' => 'Data Tidak Boleh Kosong !'
      ]);
      

    if($this->form_validation->run()==false){
        $data['judul'] = 'Menu Edit';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('admin/ubahrole',$data);
        $this->load->view('template/footer');
      }else{
         $level = $this->input->post('nama');
         $this->Menu_model->role($id);
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiUbah</div>');
        redirect('admin/role');
      }

    } 



    public function roleaccess($role_id)
    {
       //mengambil data dari session di controller auth
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

       $data['role'] = $this->db->get_where('user_role',['id' => $role_id])->row_array();

       //ngakalin agar menu admin gak tampil pada role administrator krna itu hak penuh dari admin
       $this->db->where('id !=' , 1);
       $this->db->where('id !=' , 5);
       $data['menu'] = $this->db->get('user_menu')->result_array();
      
       //   var_dump($data['user']);die;
         $data['judul'] = 'Halaman Role';
         $this->load->view('template/header',$data);
         $this->load->view('template/sidebar',$data);
         $this->load->view('template/topbar',$data);
         $this->load->view('admin/role-access',$data);
         $this->load->view('template/footer');
    }

    public function ubahaccess()
    {
      $menu_id = $this->input->post('menuid');
      $role_id = $this->input->post('roleid');

      $data = [
        'role_id' => $role_id,
        'menu_id' => $menu_id
      ];

      $result = $this->db->get_where('user_access_menu', $data);

      if($result->num_rows() < 1 ){           //kalau data gak ada
        $this->db->insert('user_access_menu', $data);
      }else{
        $this->db->delete('user_access_menu', $data);
      }

      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Access telah diubah</div>');
    }
}