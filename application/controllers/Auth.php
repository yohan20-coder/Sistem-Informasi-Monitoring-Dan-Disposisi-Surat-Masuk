<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        //session agar mencegah tidak bisa auth lewat url
      if($this->session->userdata('email')){
        redirect('user');
      }

        $this->form_validation->set_rules('email', 'Email', 'required|trim',[
            'required' => 'Nip Harus Diisi',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]',[
            'required' => 'Password Harus Diisi',
            'min_length' => 'Password terlalu Pendek !'
        ]);

       if($this->form_validation->run() == false){
        $data['judul'] = 'Halaman Login';
        $this->load->view('template/auth_header',$data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
       }else{
          //validasi sukses
          $this->_login();
       }
      
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //mencari kecocokan data email dalam database
        $user = $this->db->get_where('user', ['email' => $email ])->row_array();         //row_array untuk mendapatkan 1 data array
        
        //cek data dlm database pada saat login
        //jika data user ada
        if($user){
            //jika data user aktif
            if($user['is_active'] == 1 ){

                //cek data password dari login dgn password di database
                if(password_verify($password, $user['password'])){

                    $data =[
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    //session pengambil data user
                    $this->session->set_userdata($data);
                   //cek role data admin atau kah user
                   if($user['role_id'] == 1){
                       redirect('admin');
                   }else{
                    redirect('user');
                   }

                }else{
                    //jika data password tidak cocok
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Login Gagal<br>Password Yang Anda Masukan Salah</div>');
                    redirect('auth');
                }

            }else{
            //jika data user tidak aktivasi
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Login Gagal<br> Email Belum di Aktivasi</div>');
            redirect('auth');
            }
        }else{
            //jika data user tidak ada / aktif
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Login Gagal<br> Email Belum Pernah Terdaftar</div>');
            redirect('auth');
        }
    }

    public function registration()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Nama Harus Diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'required' => 'Email Harus Diisi',
            'valid_email' => 'Email Tidak Valid',
            'is_unique' => 'Emailnya sudah ada'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'required' => 'Password Harus Diisi',
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu Pendek !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == FALSE)
        {
            $data['judul'] = 'Halaman Registration';
            $this->load->view('template/auth_header',$data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        }else{
           $data = [
               'nama' =>htmlspecialchars($this->input->post('nama',true)),              //htmlspecialchars agara tidak di hack
               'email' =>htmlspecialchars($this->input->post('email',true)),
               'image' => 'default.jpg',
               'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
               'role_id' => 2,
               'is_active' => 1,
               'date_created' => time()
           ];
            $this->db->insert('user',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pendaftaran Sukses</div>');
            redirect('auth');
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda Berhasil logout</div>');
        redirect('auth');
    }

    public function blocked()
    {
       $this->load->view('auth/blocked');
    }
}