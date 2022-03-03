<?php

namespace App\Models;
Use CodeIgniter\model;

class Home_model extends model
{
    public function dataDokter()
    {
        $bulder= $this->db->table('dokter');
        return $bulder->countAllResults(false);
    }
    public function dataPasien()
    {
        $bulder= $this->db->table('pasien');
        return $bulder->countAllResults(false);
    }
    public function dataPoli()
    {
        $bulder= $this->db->table('poli');
        return $bulder->countAllResults(false);
    }
    public function dataRawatInap()
    {
        $bulder= $this->db->table('rawat_inap');
        return $bulder->countAllResults(false);
    }

}