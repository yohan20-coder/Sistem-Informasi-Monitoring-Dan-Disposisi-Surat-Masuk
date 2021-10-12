<?php

class Bagianiii_model extends CI_Model
{
    public function suratbelumbaca()
    {
        $query = $this->db->get_where('tb_statuskiii',['status'=>0, 'ditujukan'=>'Kapala Bidang PP III']);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    public function suratsudahbaca()
    {
        $query = $this->db->get_where('tb_statuskiii',['status'=>1, 'ditujukan'=>'Kapala Bidang PP III']);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }
}