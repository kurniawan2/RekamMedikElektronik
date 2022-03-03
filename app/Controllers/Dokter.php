<?php namespace App\Controllers;
use App\Models\Dokter_model;

use Dompdf\Dompdf;

class Dokter extends BaseController
{
    public function index()
    {
        $model= new Dokter_model();
        $data['dokter'] = $model->getDokter()->getResultArray();
        echo view('dokter/viewdokter', $data);
        // echo "ini adalah halaman class dokter";
    }
    public function edit()
    {
        $model= new Dokter_model();
        $id=$this->request->getPost('iddokter');
        $data=array(
            'nama_dokter' =>$this->request->getPost('namadokter'),
            'nohp_dokter' =>$this->request->getPost('nohpdokter')
        );
        $model->updateDokter($data,$id);
        return redirect()->to('/dokter');
    }
    public function delete()
    {
        $model= new Dokter_model();
        $id=$this->request->getPost('iddokter');
       
        $model->deleteDokter($id);
        return redirect()->to('/dokter');
    }
    

    public function save(){
        $model =new Dokter_model();
        $data= array(
            'id_dokter'=> $this->request->getPost('iddokter'),
            'nama_dokter'=> $this->request->getPost('namadokter'),
            'nohp_dokter'=> $this->request->getPost('nohpdokter')
        );
        if (!$this->validate([
            'iddokter' => [
                'rules' => 'required|is_unique[dokter.id_dokter]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => '{field} Sudah ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            print_r($this->request->getVar());
        }
        $model->saveDokter($data);
        return redirect()->to('/dokter');
        }

        
    // public function biodata(){
    //     echo "ini adalah index biodata ";
    // }

    // public function tampildokter(){
    //     return view('dokter/viewdokter');
    // }

    function generatePDF(){
        $dompdf = new Dompdf();
        $model= new Dokter_model();
        $data['Dokters'] = $model->getDokter()->getResultArray(); //data dari tabel iklan
 
        $dompdf->loadHtml(view('laporan/laporan-dokter', $data));
        $dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
        $dompdf->render();
        $dompdf->stream("laporan-Dokter"); //nama file pdf
 
        return redirect()->to(base_url('Dokter')); //arahkan ke list-iklan setelah laporan di unduh
    }
}


