<?php

namespace App\Models;
Use CodeIgniter\model;

class Obat_model extends model
{
    public function getObat()
    {
        $bulder= $this->db->table('obat');
        return $bulder->get();
    }
    public function saveObat($data)
    {
        $query= $this->db->table('obat')->insert($data);
        return $query;
    }
    public function updateObat($data,$id)
    {
        $query= $this->db->table('obat')->update ($data,array('id_obat'=>$id));
        return $query; 
    }
    public function deleteObat($id)
    {
        $query= $this->db->table('obat')->delete (array('id_obat'=>$id));
        return $query; 
    }

}