<?php

namespace App\Models;

use CodeIgniter\Model;

class Ruangan_model extends Model
{
    public function getRuangan()
    {
        $bulder = $this->db->table('ruangan');
        return $bulder->get();
    }
    public function saveRuangan($data)
    {
        $query = $this->db->table('ruangan')->insert($data);
        return $query;
    }
    public function deleteRuangan($id)
    {
        $query = $this->db->table('ruangan')->delete(array('id_ruangan' => $id));
        return $query;
    }
    public function updateRuangan($data, $id)
    {
        $query = $this->db->table('ruangan')->update($data, array('id_ruangan' => $id));
        return $query;
    }
}