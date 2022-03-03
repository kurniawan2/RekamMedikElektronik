<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {   
        helper(['form']);
        echo view('registrasi/view_login');
    }
    public function ceklogin()
    {

        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('user_name', $username)->first();
        if ($data) {
            $pass = $data['user_password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'user_name'     => $data['user_name'],
                    'user_email'    => $data['user_email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/home');
            } else {
                $session->setFlashdata('msg', 'Maaf anda gagal Login');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    // // $session = session();
    // // $model = new UserModel();
    // // $username = $this->request->getVar('username');
    // // $password = $this->request->getVar('password');
    // // $cek= $model->cek_login($username);
    // // if($cek)
    // // {
    // //     $pass= $cek['user_password'];
    // //     $veryfi= password_veryfi($password,$pass);
    // //     if($veryfi)
    // //     {
    // //         session()->set('username',$cek['user_name']);
    // //         session()->set('hakakses',$cek['hak-akses']);
    // //         return redirect()->to('/login');
    // //     }
    // //     else
    // //     {
    // //         $session->setFlashdata('msg','User Tidak ditemukan');
    // //         return redirect()->to('/login');
    // //     }
    // // }
    // }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
