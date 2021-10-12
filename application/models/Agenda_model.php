<?php

class Agenda_model extends CI_Model
{
    public function suratbelumbaca()
    {
        $query = $this->db->get_where('tb_agenda',['status'=>0]);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    public function suratsudahbaca()
    {
        $query = $this->db->get_where('tb_agenda',['status'=>1]);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    public function suratbelum()
    {
        $query = $this->db->get_where('tb_agenda',['stat_balas'=>0,'ditujukan1'=>'Kapala Bappeda']);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    public function suratsudah()
    {
        $query = $this->db->get_where('tb_agenda',['stat_balas'=>1, 'ditujukan1'=>'Kapala Bappeda']);
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else {
           return 0;
        }
    }

    public function tampil()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tb_agenda');
        return $query->result_array();
    }

    public function detail($id)
    {
        $query =  $this->db->get_where('tb_agenda',['id'=>$id]);
        return $query->row_array();
    }

    public function update($data, $where)
    {
        // $this->db->where('id', $id);
        return $this->db->update('tb_agenda',$data,$where);
    }

    public function bidangi()
    {

        $query = $this->db->get_where('tb_agenda', ['ditujukan' => 'Kapala Bidang PP I']);
        return $query->result_array();
    }

    public function statuski()
    {
        $query = "SELECT n.nosurat, n.perihal, n.instansi, n.tglteri, i.status, n.id FROM tb_agenda AS n INNER JOIN tb_statuski AS i on n.id = i.id_surat WHERE n.ditujukan = 'Kapala Bidang PP I' ORDER BY n.id DESC ";
        return $this->db->query($query)->result_array();
    }

    public function statuskii()
    {
        $query = "SELECT n.nosurat, n.perihal, n.instansi, n.tglteri, i.status, n.id FROM tb_agenda AS n INNER JOIN tb_statuskii AS i on n.id = i.id_surat WHERE n.ditujukan2 = 'Kapala Bidang PP II' ORDER BY n.id DESC ";
        return $this->db->query($query)->result_array();
    }

    public function statuskiii()
    {
        $query = "SELECT n.nosurat, n.perihal, n.instansi, n.tglteri, i.status, n.id FROM tb_agenda AS n INNER JOIN tb_statuskiii AS i on n.id = i.id_surat WHERE n.ditujukan3 = 'Kapala Bidang PP III' ORDER BY n.id DESC ";
        return $this->db->query($query)->result_array();
    }

    public function statuskiv()
    {
        $query = "SELECT n.nosurat, n.perihal, n.instansi, n.tglteri, i.status, n.id FROM tb_agenda AS n INNER JOIN tb_statuskiv AS i on n.id = i.id_surat WHERE n.ditujukan4 = 'Kapala Bidang PP IV' ORDER BY n.id DESC ";
        return $this->db->query($query)->result_array();
    }

    // public function balas()
    // {
    //     $query = "SELECT n.nosurat, n.status_kap, n.perihal, n.instansi, i.id_sur, i.statusku, i.tglsurat, i.tglteri, i.catatan, n.id FROM tb_agenda AS n INNER JOIN tb_kapala AS i on n.id = i.id_surat WHERE i.stat = 0 ORDER BY n.id DESC ";
    //     return $this->db->query($query)->result_array();
    // }

    public function balas()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('tb_agenda', ['stat'=> 1]);
        return $query->result_array();
    }

    public function kapala()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('tb_agenda',['ditujukan1'=>'Kapala Bappeda']);
        return $query->result_array();
    }

    public function hapuss($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_agenda');
    }

}