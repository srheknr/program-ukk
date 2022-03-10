<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailpesanModel extends Model{
    protected $table      = 'detailpesan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedField = ['id_pesan','id_menu','jumlah','harga'];
}