<?php

namespace App\Controllers;

use App\Models\Dokter_model;
use App\Models\Pasien_model;
use App\Models\Ruangan_model;
use App\Models\Poli_model;
use App\Models\Rawatinap_model;

class Rawatinap extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        $model = new Dokter_model();
        $model1 = new Pasien_model();
        $model2 = new Poli_model();
        $model3 = new Ruangan_model();
        $data['dokter'] = $model->getDokter()->getresultArray();
        $data['pasien'] = $model1->getPasien()->getresultArray();
        $data['poli'] = $model2->getPoli()->getresultArray();
        $data['ruangan'] = $model3->getRuangan()->getresultArray();
        echo view('rawatinap/view_rawat_inap', $data);
    }
    public function simpan()
    {
        $model = new Dokter_model();
        $model1 = new Pasien_model();
        $model2 = new Poli_model();
        $model3 = new Ruangan_model();
        $modelrawatinap = new Rawatinap_model();

        $data = array(
            'id_rawatinap' => $this->request->getVar('idrawat'),
            'id_dokter' => $this->request->getVar('kodedokter'),
            'idpasien' => $this->request->getVar('kodepasien'),
            'id_poli' => $this->request->getVar('kodepoli'),
            'idruangan' => $this->request->getVar('koderuangan'),
            'tglmasuk' => $this->request->getVar('tglmasuk'),
            'tglkeluar' => $this->request->getVar('tglkeluar'),
            'catatanmedis' => $this->request->getVar('cttmedis')
        );

        $modelrawatinap->saveRawatInap($data);
        return redirect()->to('/rawatinap');
    }

    public function semua()
    {

        $model = new Rawatinap_model();
        $chart = new Rawatinap_model();
        $record = $chart->chartdata()->getresultArray();
        // $grafik = [array(
        //             'nama_poli'   => $record['nama_poli'],
        //             'total' => floatval($record['total'])
        //         )];

        // foreach($record as $row) {
        //     $grafik[] = (array
        //         'poli'   => $row->nama_poli,
        //         'total' => floatval($row->total)
        //     );

        // }
        $data['semua'] = $model->getAll()->getresultArray();
        $data['grafik'] = ($record);  
        echo view('rawatinap/semua_data', $data);

    }
}