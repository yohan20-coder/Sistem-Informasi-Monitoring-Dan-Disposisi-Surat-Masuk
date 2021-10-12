<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pengguna extends CI_Controller
{
	public function ___construct()
	{
		 parent::__construct();
      	//user akses
     	is_log_in();
	}

	public function index()
	{
		//mengambil data dari session di controller auth
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       // var_dump($data['user']);die;

       $data['judul'] = 'Management Pengguna';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar',$data);
      $this->load->view('template/topbar',$data);
      $this->load->view('pengguna/index',$data);
      $this->load->view('template/footer');
	}
}