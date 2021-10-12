<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      //user akses
     is_log_in();
  }


    public function index()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
    //   var_dump($data['user']);die;
      $data['judul'] = 'Halaman User';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('user/index',$data);
      $this->load->view('template/footer');
    }

    public function edit()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      //validasi data dari form di view
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
      
    //   var_dump($data['user']);die;
      if($this->form_validation->run() == false){
        $data['judul'] = 'Edit User';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('user/edit',$data);
        $this->load->view('template/footer');
      }else{
        
        $id = $this->input->post('id');
        $name = $this->input->post('nama');
        $email = $this->input->post('email');

        //cek gambar yg di upload
        $upload_image = $_FILES['image']['name'];

        if($upload_image){
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size']     = '2048';
          $config['upload_path'] = './assets/img/profile/';
          $this->load->library('upload', $config);

          if($this->upload->do_upload('image')){

            //cek jika name gambar default jagan di hapus
            $old_image = $data['user']['image'];
            if($old_image != 'default.jpg'){
              unlink(FCPATH . 'assets/img/profile/' . $old_image);
            }

            $new_images = $this->upload->data('file_name');
            $this->db->set('image', $new_images);
          }else{
            echo $this->upload->display_errors();
          }
        }

        $this->db->set('nama', $name);
        $this->db->set('email', $email);
        $this->db->where('id', $id);
        $this->db->update('user');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil DiEdit</div>');
            redirect('user');

      }
      
    }


    public function changepassword()
    {
       //mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
    //   var_dump($data['user']);die;
      $data['judul'] = 'Halaman Ubah Password';

      $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|min_length[3]',[
            'required' => 'Password Harus Diisi',
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu Pendek !'
        ]);
      $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]',[
            'required' => 'Password Harus Diisi',
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu Pendek !'
        ]);
      $this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|matches[new_password1]',[
        'required' => 'Password Harus Diisi',
         'matches' => 'Password baru tidak sama !'
      ]);


      if($this->form_validation->run()==false){
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('user/changepassword',$data);
        $this->load->view('template/footer');
      }else{
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');
        //cek inputan password lama ke dalam database
        if(!password_verify($current_password,$data['user']['password'])){

          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Maaf Password Lama Anda Salah</div>');
          redirect('user/changepassword');

        }else{

          if($current_password == $new_password){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Maaf Password Baru Anda tidak boleh sama dengan Password Lama</div>');
            redirect('user/changepassword');

          }else{

              //jika password sudah oke maka password terlebih dahulu di hash/acak baru disimpan
              $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

              //kemudian password di set sesuai dengan data session user (email)
              $this->db->set('password', $password_hash);
              $this->db->where('email', $this->session->userdata('email'));     //data di sesuikan dengan sessionuser(email)
              $this->db->update('user');    //kemudian data user baru bisa di edit passwordnya

               $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Anda Berhasil Diubah</div>');
              redirect('user/changepassword');
          }
        }
      }
    }
}