<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class TestEmail extends BaseController
{
    public function index()
    {
        $email = 'dominos@gmail.com';
      
       $model = new UserModel();
       
       $model->updateStatus($email);
            
    }

    public function Testmail(){

        $token = 1231323412424234;
            $to = 'fajrun99@yahoo.com';
            $subject = "Account Verification";
            //$message = "hbd adammm ";
           $message = 'Click this link to verify you account : <a href="' . base_url() . 'registrasi/verify?email=' . $token . '">Activate</a>';
            
            $email = \Config\Services::email();

            
     
            $email->setTo($to);
            $email->setFrom('adamkurniawan257@gmail.com', 'Admin');
            $email->setSubject($subject);
            $email->setMessage($message);
            if ($email->send()) {
                echo "Email successfully sent";
            } 
            else 
            {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
        

    }
}
