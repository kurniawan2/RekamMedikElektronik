<?php

namespace App\Models;

use CodeIgniter\Model;

class Pasien_model extends Model
{
    public function getPasien()
    {
        $bulder = $this->db->table('pasien');
        return $bulder->get();
    }
    public function savePasien($data)
    {
        $query = $this->db->table('pasien')->insert($data);
        return $query;
    }
    public function deletePasien($id)
    {
        $query = $this->db->table('pasien')->delete(array('id_pasien' => $id));
        return $query;
    }
    public function updatePasien($data, $id)
    {
        $query = $this->db->table('pasien')->update($data, array('id_pasien' => $id));
        return $query;
    }
}