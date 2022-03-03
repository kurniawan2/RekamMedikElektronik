<?php

namespace App\Controllers;
use App\Models\Home_model;
use App\Models\Rawatinap_model;
class Home extends BaseController
{
    public function index()
    {   
        $model= new Home_model();
        $data['dokter'] = $model->dataDokter();
        $data['pasien'] = $model->dataPasien();
        $data['poli'] = $model->dataPoli();
        $data['rawatinap'] = $model->dataRawatInap();
        $chart = new Rawatinap_model();
        $record = $chart->chartdata()->getresultArray();
        $data['grafik'] = ($record);  
        echo view('layout/beranda', $data);
    }
    
}

