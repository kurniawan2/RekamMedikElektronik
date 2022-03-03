<?php namespace App\Controllers;
use App\Models\Pasien_model;

use Dompdf\Dompdf;

class Pasien extends BaseController
{
    public function index()
    {
        $model= new Pasien_model();
        $data['pasien'] = $model->getPasien()->getResultArray();
        echo view('pasien/v_pasien', $data);
        // echo "ini adalah halaman class dokter";
    }
    public function edit()
    {
        $model= new Pasien_model();
        $id=$this->request->getPost('id_pasien');
        $data=array(
            'nama_pasien' =>$this->request->getPost('nama_pasien'),
            'alamat_pasien' =>$this->request->getPost('alamat_pasien'),
            'no_rm_pasien' =>$this->request->getPost('no_rm_pasien'),
            'nohp_pasien' =>$this->request->getPost('nohp_pasien')
        );
        $model->updatePasien($data,$id);
        return redirect()->to('/pasien');
    }
    public function delete()
    {
        $model= new Pasien_model();
        $id=$this->request->getPost('id_pasien');
       
        $model->deletePasien($id);
        return redirect()->to('/Pasien');
    }
    

    public function save(){
        $model =new Pasien_model();
        $data= array(
            'id_pasien'=> $this->request->getPost('id_pasien'),
            'nama_pasien'=> $this->request->getPost('nama_pasien'),
            'alamat_pasien'=> $this->request->getPost('alamat_pasien'),
            'no_rm_pasien'=> $this->request->getPost('no_rm_pasien'),
            'nohp_pasien'=> $this->request->getPost('nohp_pasien'),
        );
        if (!$this->validate([
            'id_pasien' => [
                'rules' => 'required|is_unique[pasien.id_pasien]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => '{field} Sudah ada'
                ]
            ],
            'no_rm_pasien' => [
                'rules' => 'required|is_unique[pasien.no_rm_pasien]',
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
        $model->savePasien($data);
        return redirect()->to('/pasien');
        }

        
    // public function biodata(){
    //     echo "ini adalah index biodata ";
    // }

    // public function tampildokter(){
    //     return view('dokter/viewdokter');
    // }

    function generatePDF(){
        $dompdf = new Dompdf();
        $model= new Pasien_model();
        $data['pasiens'] = $model->getPasien()->getResultArray(); //data dari tabel iklan
 
        $dompdf->loadHtml(view('laporan/laporan-pasien', $data));
        $dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
        $dompdf->render();
        $dompdf->stream("laporan-Pasien"); //nama file pdf
 
        return redirect()->to(base_url('Pasien')); //arahkan ke list-iklan setelah laporan di unduh
    }
}


