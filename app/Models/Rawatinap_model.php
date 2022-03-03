<?php
namespace App\Models;
use CodeIgniter\Model;

class Rawatinap_model extends Model
{
    public function getRawatinap()
    {
        $bulder = $this->db->table('rawat_inap');
        return $bulder->get();
    }
    public function getDokter()
    {
        $bulder = $this->db->table('dokter');
        return $bulder->get();
    }
    public function getPasien()
    {
        $bulder = $this->db->table('pasien');
        return $bulder->get();
    }
    public function getRuangan()
    {
        $bulder = $this->db->table('ruangan');
        return $bulder->get();
    }
    public function getPoli()
    {
        $bulder = $this->db->table('poli');
        return $bulder->get();
    }
    public function saveRawatinap($data)
    {
        $query = $this->db->table('rawat_inap')->insert($data);
        return $query;
    }

    public function getAll(){
        $bulder = $this->db->table('rawat_inap');
        $bulder->select(' rawat_inap.id_rawatinap, dokter.nama_dokter, pasien.nama_pasien, poli.nama_poli, ruangan.nama_ruangan, rawat_inap.tglmasuk, rawat_inap.tglkeluar, rawat_inap.catatanmedis');
        $bulder->join('dokter', 'rawat_inap.id_dokter = dokter.id_dokter');
        $bulder->join('pasien','rawat_inap.idpasien = pasien.id_pasien');
        $bulder->join('poli','rawat_inap.id_poli = poli.id_poli');
        $bulder->join('ruangan','ruangan on rawat_inap.idruangan = ruangan.id_ruangan');
        return $bulder->get();
    }

    public function chartdata(){
        $bulder = $this->db->table('rawat_inap');
        $bulder->select(' poli.nama_poli, count(*) as total');
        $bulder->join('poli','rawat_inap.id_poli = poli.id_poli');
        $bulder->groupBy('poli.nama_poli');
        return $bulder->get();
    }
}