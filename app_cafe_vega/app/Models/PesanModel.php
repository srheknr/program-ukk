<?php 
namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model{
    protected $table      = 'pesan';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedField = ['id_user','tanggal','total_harga','no_meja','status','nama_pemesan'];
}