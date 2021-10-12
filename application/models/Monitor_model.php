<?php

class Monitor_model extends CI_Model
{
    public function tampil()
    {
        $query = "SELECT n.nosurat, n.track1, i.track2, i.track3, i.track4 FROM tb_agenda AS n INNER JOIN tb_tracking AS i on n.nosurat = i.nosurat ORDER BY i.id DESC ";
        return $this->db->query($query)->result_array();
    }
}