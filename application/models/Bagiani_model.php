<?php

class Bagiani_model extends CI_Model
{
    public function suratbelumbaca()
    {
        $query = $this->db->get_where('tb_statuski',['status'=>0, 'ditujukan'=>'Kapala Bidang PP I']);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    public function suratsudahbaca()
    {
        $query = $this->db->get_where('tb_statuski',['status'=>1, 'ditujukan'=>'Kapala Bidang PP I']);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }
}