<?php

namespace App\Models;

use CodeIgniter\Model;

class Poli_model extends Model
{
    public function getPoli()
    {
        $bulder = $this->db->table('poli');
        return $bulder->get();
    }
}