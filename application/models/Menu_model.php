<?php

class Menu_model extends CI_model
{
    public function getsubmenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

    return $this->db->query($query)->result_array();
    }

    public function getUbah($id)
    {
    	$query =  $this->db->get_where('user_menu',['id'=>$id]);
        return $query->row_array();
    }

    public function ubah($id)
    {
        $data = array(
            "name" => $this->input->post('nama',true),
            "menu" => $this->input->post('menu',true)       //true diguanakan utk mengamankan data dri injection
    );
    
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_menu', $data);
    }

    public function role($id)
    {
        $data = array(
            "role" => $this->input->post('nama',true)      //true diguanakan utk mengamankan data dri injection
    );
    
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_role', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

}