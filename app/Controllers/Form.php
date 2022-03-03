<?php

namespace App\Controllers;

use App\Models\Form_model;

class Form extends BaseController
{

    public function index()
    {
        helper(['form','url']);
        $data = [
            'validation' => \config\Services::validation()
        ];
        echo view('form/form', $data);
    }
    public function upload(){
        $model =new Form_model();
        if($this->input->post('upload')){
            
            //Check whether Member upload profile_img
            if(!empty($_FILES['profile_img']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['profile_img']['name'];
                
                //Load upload library and initialize here configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('profile_img')){
                    $uploadData = $this->upload->data();
                    $profile_img = $uploadData['file_name'];
                }else{
                    $profile_img = '';
                }
            }else{
                $profile_img = '';
            }
        $data= array(
            'nama_dokter'=> $this->request->getPost('namadokter'),
            'nohp_dokter'=> $this->request->getPost('nohpdokter'),
            'jenis_kelamin'=> $this->request->getPost('jenis_kelamin'),
            'foto' => $profile_img
        );
       
		$model->simpan($data);
		return redirect()->to('/registrasi/tampil');
	}

    // public function save(){
    //     $model =new Dokter_model();
    //     $data= array(
    //         'id_dokter'=> $this->request->getPost('iddokter'),
    //         'nama_dokter'=> $this->request->getPost('namadokter'),
    //         'nohp_dokter'=> $this->request->getPost('nohpdokter')
    //     );
    //     if (!$this->validate([
    //         'iddokter' => [
    //             'rules' => 'required|is_unique[dokter.id_dokter]',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi',
    //                 'is_unique' => '{field} Sudah ada'
    //             ]
    //         ]
    //     ])) {
    //         session()->setFlashdata('error', $this->validator->listErrors());
    //         return redirect()->back()->withInput();
    //     } else {
    //         print_r($this->request->getVar());
    //     }
    //     $model->saveDokter($data);
    //     return redirect()->to('/dokter');
    }
}