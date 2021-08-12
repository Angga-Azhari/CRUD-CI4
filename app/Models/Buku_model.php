<?php
 
 namespace App\Models;

 use CodeIgniter\Model;
use PhpParser\Node\Stmt\Return_;

class Buku_model extends Model
 {
     public function getdata()
     {
         $query = $this->db->query("SELECT * FROM buku ORDER BY buku ASC");

         return $query->getResult();
     }

     function simpanData($table,$data){
         $this->db->table($table)->insert($data);
         return true;
     }
 }