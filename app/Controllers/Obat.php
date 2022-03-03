<?php namespace App\Controllers;
use App\Models\Obat_model;

use Dompdf\Dompdf;

class Obat extends BaseController
{
    public function index()
    {
        $model= new Obat_model();
        $data['obat'] = $model->getObat()->getResultArray();
        echo view('obat/viewObat', $data);
        // echo "ini adalah halaman class dokter";
    }
    public function edit()
    {
        $model= new Obat_model();
        $id=$this->request->getPost('id_obat');
        $data=array(
            'nama_obat' =>$this->request->getPost('nama_obat'),
            'jenis_obat' =>$this->request->getPost('jenis_obbat'),
            'stok' =>$this->request->getPost('stock'),
            'harga' =>$this->request->getPost('harga'),
        );
        $model->updateDokter($data,$id);
        return redirect()->to('/obat');
    }
    public function delete()
    {
        $model= new Obat_model();
        $id=$this->request->getPost('id_obat');
       
        $model->deleteDokter($id);
        return redirect()->to('/obat');
    }
    

    public function save(){
        $model =new Obat_model();
        $data= array(
            'id_obat' =>$this->request->getPost('id_obat'),
            'nama_obat' =>$this->request->getPost('nama_obat'),
            'jenis_obat' =>$this->request->getPost('jenis_obat'),
            'stok' =>$this->request->getPost('stok'),
            'harga' =>$this->request->getPost('harga')
        );
        if (!$this->validate([
            'id_obat' => [
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
        $model->saveObat($data);
        return redirect()->to('/obat');
        }

        
    // public function biodata(){
    //     echo "ini adalah index biodata ";
    // }

    // public function tampildokter(){
    //     return view('dokter/viewdokter');
    // }

    function cetakpdff(){
        $dompdf = new Dompdf();
        $model= new Obat_model();
        $data['Obats'] = $model->getObat()->getResultArray(); //data dari tabel iklan
 
        $dompdf->loadHtml(view('laporan/laporan-obat', $data));
        $dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
        $dompdf->render();
        $dompdf->stream("laporan-obat"); //nama file pdf
 
        return redirect()->to(base_url('Obat')); //arahkan ke list-iklan setelah laporan di unduh
    }
}


