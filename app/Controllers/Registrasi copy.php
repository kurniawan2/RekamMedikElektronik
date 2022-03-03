<?php

namespace App\Controllers;

use App\Models\UserModel;

class Registrasi extends BaseController
{

    public function index()
    {
        helper(['form','url']);
        $data = [
            'validation' => \config\Services::validation()
        ];
        echo view('registrasi/view_registrasi', $data);
    }
    public function save()
    {
        $rules = [
            'email' => 'required|valid_email|is_unique[users.user_email]',
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[3]',
            'confirmpassword' => 'required|matches[password]'
        ];
        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'user_email' => $this->request->getVar('email'),
                'user_name' => $this->request->getVar('username'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $model->simpan($data);
            return redirect()->to('/registrasi/tampil');
        } else {
            $data['validation'] = $this->validator;
            echo view('registrasi/view_registrasi', $data);
        }
    }
}