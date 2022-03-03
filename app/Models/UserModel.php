<?php

namespace App\Models;
Use CodeIgniter\model;

class UserModel extends model
{
    protected $table = 'users';
    protected $allowedFields = ['user_name','user_email','user_password','user_created_at', 'hak_akses'];

    public function simpan($data){
    $query= $this->db->table('users')->insert($data);
    return $query;
    }
    public function cek_login($username){
        return $this->db->table('users')
        ->where(array('user_name'=>$username))
        ->get()->getRowArray();
    }
    public function simpan_token($data){
        $query= $this->db->table('user_token')->insert($data);
        return $query;
    }

    public function getUserByMail($email){
        return $this->db->table('users')
        ->where(array('user_email'=>$email))
        ->get()->getRowArray();
    }
    public function getToken($token){
        return $this->db->table('user_token')
        ->where(array('token'=>$token))
        ->get()->getRowArray();
    }

    public function updateStatus($email){
         $update = ["is_active"=> 1];
        // $query = $this->db->table('users')->where('email', $email)->update($update);
        // return $query;
        return $this->db->table('users')->where(array('user_email'=>$email))->update($update);
    }

}


