<?php

class Arsip_model extends CI_Model
{
    
    //update arskel
    public function updatekel($data, $where)
    {
        // $this->db->where('id', $id);
        return $this->db->update('arske',$data,$where);
    }

    public function tamkel()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('arske');
        return $query->result_array();
    }

    //jumlah arsip keluar
    public function jmlkeluar()
    {
        $query = $this->db->get('arske');
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    //detail keluar
    
    //model detail
    public function ubahkel($id)
    {
    	$query =  $this->db->get_where('arske',['id'=>$id]);
        return $query->row_array();
    }

    //model hapus arsip keluar
    public function hapuskel($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('arske');
    }
}