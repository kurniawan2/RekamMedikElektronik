<?php

namespace App\Models;
Use CodeIgniter\model;

class Dokter_model extends model
{
    public function getDokter()
    {
        $bulder= $this->db->table('dokter');
        return $bulder->get();
    }
    public function saveDokter($data)
    {
        $query= $this->db->table('dokter')->insert($data);
        return $query;
    }
    public function updateDokter($data,$id)
    {
        $query= $this->db->table('dokter')->update ($data,array('id_dokter'=>$id));
        return $query; 
    }
    public function deleteDokter($id)
    {
        $query= $this->db->table('dokter')->delete (array('id_dokter'=>$id));
        return $query; 
    }

}