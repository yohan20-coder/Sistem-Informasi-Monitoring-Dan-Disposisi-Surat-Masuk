<?php

function is_log_in()
{

    $ci = get_instance();       //cara instansiasikan fungsi helper agar dikenali CI

    //cara untuk memblok user yg masuk tanpa login
    if(!$ci->session->userdata('email')){   
        $ci->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Maaf anda tidak berhak mengakses halaman Ini<br>Silakan Daftar jadi Member !</div>');          
        redirect('auth');                                 // dialihkan ke login
      }else{
        //cara memblock role menu yg dpt diakses(user tak dpt masuk ke admin lwat url)
        $role_id = $ci->session->userdata('role_id');
        //cara mngambil url pada CI(uri->segment)
        $menu = $ci->uri->segment(1);

        //mencocokan data dari url ke database(cek role_id nya)
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        //kemudian ambil cukup data id nya
        $menu_id = $queryMenu['id'];

        //cek data role_id nya ke tbl user_menu ada gak ?
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if($userAccess->num_rows() < 1 ){
            redirect('auth/blocked');
        }
      }
}

function check_acess($role_id, $menu_id)
{
  $ci = get_instance();

  $ci->db->where('role_id', $role_id);
  $ci->db->where('menu_id', $menu_id);
  $result = $ci->db->get('user_access_menu');

  if($result->num_rows() > 0 ){
      return "checked='checked'";
  }
}