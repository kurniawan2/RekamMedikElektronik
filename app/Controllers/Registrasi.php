<?php

namespace App\Controllers;

use App\Models\UserModel;


class Registrasi extends BaseController
{

    // tampilan default ketika user mengakses registrasi
    public function index()
    {
        helper(['form', 'url']);
        $data = [
            'validation' => \config\Services::validation()
        ];
        echo view('registrasi/view_registrasi', $data);
    }


    // fungsi save digunaka ketika user malakukan registrasi
    public function save()
    {


        helper(['form', 'url']);

        // form validasi di gunakan untuk mengvalidasi inputan user 
        $input = $this->validate([
            'email' => 'required|valid_email|is_unique[users.user_email]',
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[3]',
            'confirmpassword' => 'required|matches[password]'
        ]);

        // deklarasi penggunaan user model
        $formModel = new UserModel();

        // conditional validasi 
        if (!$input) {
            echo view('registrasi/view_registrasi', [
                'validation' => $this->validator
            ]);
        } else {
        // ketika data telah di validasi maka data tersebut akan di simpan di data base
            $formModel->simpan([
                'user_email' => $this->request->getVar('email'),
                'user_name' => $this->request->getVar('username'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'hak_akses' => 'Admin',
                'is_active' => 0,
            ]);

            // mengambil data email 
            $email = $this->request->getVar('email');
            // menyiap kan user token untuk verivikasi email 
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            // user token di simpan 
            $formModel->simpan_token($user_token);
            // system menjalankan fungsi sendEmail untuk pengiriman email untuk validasi pendaftaran
            $this->sendEmail($user_token, 'verify');
            $response = [
                'success' => true,
                'msg' => "User Terbuat",
            ];
            $data['message'] = "Selamat Anda Berhasil Mendaftar";

            return $this->response->setJSON($response);
            //echo view('registrasi/view_registrasi', $data );
            # return $this->response->redirect(site_url('/registrasi', $pesan));
        }
    }

    public function sendEmail($user_token, $type)
    {
       

        // etika parameter yang di bawa adala verify maka akan menjalankan pengiriman email 
        if ($type == 'verify') {
            $to = $user_token['email'];
            $subject = "Account Verification";
            $message = 'Click this link to verify you account : <a href="' . base_url() . '/registrasi/verify?email=' . $user_token['email'] . '&token=' . $user_token['token'] . '">Activate</a>';

            $email = \Config\Services::email();

            $email->setTo($to);
            $email->setFrom('adamkurniawan257@gmail.com', 'Admin');
            $email->setSubject($subject);
            $email->setMessage($message); 



            if ($email->send()) {
                $response = 'Email successfully sent';
            } else {
                $data = $email->printDebugger(['headers']);
                $response = 'Email send failed';
            }
            return redirect()->to(base_url('registrasi'))->with('message', $response);
        }
    }

    // fungsi verifikasi email digunakan untuk menangkap data dari link yang di kirim melalui email 
    public function verify()
    {
        // mengambil data email 
       $email = $this->request->getVar('email');
       // mengambill data token 
       $token = $this->request->getVar('token');
       $model = new UserModel();
       $user = $model->getUserByMail($email);
       $user_token = $model->getToken($token);
       // verifikasi token user pada data base 
           if($user){
               $user_token = $model->getToken($token);
               // jika token benar maka status user menjadi aktif 
            if($user_token['token'] !== null){
                // melakukan update data status user menjadi aktif
                $model->updateStatus($email);
                return redirect()->to( base_url('login'));
            }
           }
    }
}