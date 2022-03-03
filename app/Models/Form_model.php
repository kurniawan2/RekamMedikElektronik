<?php

namespace App\Models;
Use CodeIgniter\model;

class Form_model extends Model{
    function __construct() {
        $this->tableName = 'members';
        $this->primaryKey = 'id';
    }
    
    public function simpan($data){
        $query= $this->db->table('members')->insert($data);
        return $query;
        }
}
