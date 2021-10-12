<?php

class Kapala_model extends CI_Model
{
    public function tampil()
    {
        $this->db->order_by('id_sur', 'DESC');
        $query = $this->db->get('tb_kapala');
        return $query->result_array();
    }

    public function suratbelumbaca()
    {
        $query = $this->db->get_where('tb_agenda',['status_kap'=>0, 'ditujukan1'=>'Kapala Bappeda']);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    public function suratsudahbaca()
    {
        $query = $this->db->get_where('tb_agenda',['status_kap'=>1, 'ditujukan1'=>'Kapala Bappeda']);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    // public function histori()
    // {
    //     $query = $this->db->get_where('tb_kapala');
    //     if($query->num_rows() > 0)
    //     {
    //         return $query->num_rows();
    //     }else {
    //        return 0;
    //     }
    // }

    // public function detail($id)
    // {
    //     $query =  $this->db->get_where('tb_kapala',['id_sur'=>$id]);
    //     return $query->row_array();
    // }

    // public function suratbelum()
    // {
    //     $query = $this->db->get_where('tb_kapala',['statusku'=>0]);
    //     if($query->num_rows() > 0)
    //     {
    //         return $query->num_rows();
    //     }else {
    //        return 0;
    //     }
    // }

    // public function suratsudah()
    // {
    //     $query = $this->db->get_where('tb_kapala',['statusku'=>1]);
    //     if($query->num_rows() > 0)
    //     {
    //         return $query->num_rows();
    //     }else {
    //        return 0;
    //     }
    // }
}